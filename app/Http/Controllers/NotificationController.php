<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationController extends Controller
{
    public function storeToken(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->update(['device_token'=>$request->token]);
        return response()->json(['Token successfully stored.']);
    }

    public function getNotifications(Request $request)
    {
        if($request->ajax()){
            $admin = getAdmin();
            if($admin->id == '1')
            {
                $notifications = $admin->unreadNotifications;
                $response['adminNotifications'] = $notifications;
                $html = view('admin.include._top-notifications')->with($response)->render();
                return response()->json(['htmlView' => $html]);
            }
        }
    }

    public function readNotifications(Request $request){
        if($request->ajax()){
            $admin = getAdmin();
            if($admin->id == '1')
            {
                if($request->has('markAsRead')){
                    $admin->unreadNotifications->markAsRead();
                    return response()->json(['status' => 2]);
                }else{
                    $notification = $admin->unreadNotifications()->where(['id'=>$request->id])->first();
                    $notification->markAsRead();
                    return response()->json(['status' => 1]);
                }
            }
        }
    }
}
