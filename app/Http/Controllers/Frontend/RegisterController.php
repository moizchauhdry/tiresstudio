<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('frontend.pages.index');
        }

        if ($request->isMethod('post') && $request->ajax()) {

            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed', 'max:32'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ];

            $user = User::create($data);

            return response()->json([
                'status' => 1,
                'title' => 'Register Successfully',
                'icon' => 'success',
                'message' => 'Thankyou, Your Tiresstudio account have been register successfully.',
            ]);
        }

        return view('frontend.pages.register');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post') && $request->ajax()) {

            $rules = [
                'login_email' => ['required', 'email', 'max:50'],
                'login_password' => ['required', 'string', 'min:8', 'max:32'],
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }

            $user = User::where('email', $request->login_email)->first();

            if (isset($user)) {
                $checkPassword = Hash::check(request('login_password'), $user->password);

                if ($checkPassword == TRUE) {

                    Auth::guard('customer')->login($user);

                    if (empty($request->session()->get('redirect_url'))) {
                        $request->session()->put('redirect_url', route('frontend.pages.index'));
                    }

                    $redirect_url = $request->session()->get('redirect_url');

                    return response()->json([
                        'status' => true,
                        'redirect_url' => $redirect_url,
                        'title' => 'Login Successfully',
                        'icon' => 'success',
                        'message' => 'Thankyou, Your Tiresstudio account have been login successfully.',
                    ]);
                } else {
                    $errors = [
                        'login_password' => [
                            '0' => 'The password you entered is incorrect.',
                        ],
                    ];
                    return response()->json([
                        'errors' => $errors,
                    ], 400);
                }
            } else {

                $errors = [
                    'login_email' => [
                        '0' => 'The email address is not valid.',
                    ],
                ];

                return response()->json([
                    'errors' => $errors,
                ], 400);
            }
        }
    }
}
