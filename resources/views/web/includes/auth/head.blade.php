<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zuli</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ env('APP_URL') . asset('web_files/images/logo.png') }}" />
    <link rel="icon" type="image/png" href="{{ env('APP_URL') . asset('web_files/images/logo.png') }}" />
    <meta name="theme-color" content="#000" />
    <meta name="description" content="{{ $description ?? 'Your go-to platform for hiring top-notch professionals.' }}">
    <meta name="keywords"
        content="{{ $keywords ?? 'creative marketplace, designers, programmers, developers, graphic designer, logo design, branding, creative portfolio ' }}">
    <meta name="author" content="Creative Marketplace">
    <meta name="MobileOptimized" content="320" />
    <meta property="og:title" content="zuli" />
    <meta property="og:type" content="website" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}/web_files/css/auth.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/web_files/vendor/bootstrap-5.1.3/css/bootstrap.min.css">
    <style>
        .alert {
            position: fixed;
            bottom: 11px;
            left: 13px;
            min-width: 24%;
        }

        .alert strong,
        .alert p {
            color: #dc3545
        }
    </style>
</head>

<body>
