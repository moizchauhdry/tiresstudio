<?php


namespace App\Services;

use App\Admin;

class FirebaseService
{
    public function sendNotification()
    {
        $firebaseToken = getAdmin()->device_token;


        $SERVER_API_KEY = env('FIREBASE_SERVER_KEY');

        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => "Dummy Mesage by Noaman",
                "body" => "dummy message by Noaman Hahsmi",
            ],
            /*"data" => [
                "chat_id" => $request->chat_id,
                "ios_title" => $user->first_name." sent a message",
                "ios_body" => $request->message,
                "exhibitor_name" => $user->first_name,
                "exhibitor_logo" => $user->profile_url,
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                "screen" => "Chat_Screen",
                "extradata" => ""
            ],*/
            "priority" => "high"
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response['curl'] = curl_exec($ch);
        $response['dataString'] = $dataString;

        return $response;

    }

    public function notifyAdmin1($data)
    {
        $firebaseTokens = Admin::whereNotNull('device_token')->pluck('device_token');
        $response = [];
        foreach ($firebaseTokens as $key => $firebaseToken) {
            $SERVER_API_KEY = env('FIREBASE_SERVER_KEY');
            $data = [
                "to" => $firebaseToken,
                "notification" => [
                    "title" => $data['name'],
                    "body" => $data['message'],
                ],
                "priority" => "high"
            ];
            $dataString = json_encode($data);

            $headers = [
                'Authorization: key=' . $SERVER_API_KEY,
                'Content-Type: application/json',
            ];
            //CURL request to route notification to FCM connection server (provided by Google)
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

            $response[$key]['curl'] = curl_exec($ch);
            $response[$key]['dataString'] = $dataString;


        }

        return $response;
    }

    public function notifyAdmin($data, $token)
    {
        $firebaseToken = $token;

        $SERVER_API_KEY = env('FIREBASE_SERVER_KEY');
        $data = [
            "to" => $firebaseToken,
            "notification" => [
                "title" => $data['name'],
                "body" => $data['message'],
            ],
            "priority" => "high"
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response['curl'] = curl_exec($ch);
        $response['dataString'] = $dataString;


        return $response;
    }
}
