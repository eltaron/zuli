<?php

use App\Models\HomePageDetail;

function GetLanguage()
{
    return app()->getLocale();
}

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}
if (!function_exists('aurl')) {
    function aurl($url)
    {
        return url('/admin/' . $url);
    }
}
if (!function_exists('home')) {
    function home()
    {
        return HomePageDetail::first();
    }
}
if (!function_exists('lang')) {
    function lang()
    {
        if (session()->has('lang')) {
            return session()->get('lang');
        } else {
            session()->put('lang', 'ar');
            return 'ar';
        }
    }
}
