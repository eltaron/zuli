<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منظومه حجز العيادات </title>
    <link rel="shortcut icon" href="{{ env('APP_URL') }}web_files/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ env('APP_URL') }}web_files/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}web_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}web_files/css/main.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ env('APP_URL') }}web_files/datatables/dataTables.bootstrap4.min.css">
    <style>
        .alert {
            position: absolute;
            z-index: 9999;
            top: 5%;
            left: 5%;
        }
    </style>
    @stack('styles')
</head>

<body>
