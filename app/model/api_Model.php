<?php

class iapiModel{

    public static function doIAPI($url, $jsonString) {

        $iapiURL = "https://iapi-" . $iapiName;

        $postData = 'request=' . $jsonString;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $iapiURL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $res = curl_exec($ch);
        

        if ($res != '') {
            $reply_data = json_decode($res);
        }

        if (isset($reply_data)) {
            return $reply_data;
        }

        curl_close($ch);
    }

}