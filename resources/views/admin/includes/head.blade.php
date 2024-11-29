<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ env('APP_URL') . asset('admin_files/assets/img/logo.png') }}" />
    <link rel="icon" type="image/png" href="{{ env('APP_URL') . asset('admin_files/assets/img/logo.png') }}" />
    <title>Zuli - Dashboard</title>
    <meta name="theme-color" content="#000" />
    <meta name="author" content="Ahmed Eltaroun" />
    <meta name="MobileOptimized" content="320" />
    <meta property="og:title" content="zuli" />
    <meta property="og:type" content="website" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ env('APP_URL') . asset('admin_files/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ env('APP_URL') . asset('admin_files/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ env('APP_URL') . asset('admin_files/assets/css/soft-ui-dashboard.css?v=1.0.3') }}"
        rel="stylesheet" />
    <style>
        .alert {
            position: fixed;
            min-width: 300px;
            opacity: 0.7;
            bottom: 10px;
            z-index: 999;
        }

        table td,
        table th {
            color: #fff !important;
            border: 1px solid #fff !important;
            text-align: center !important;
        }

        .dt-length,
        .dt-search {
            display: flex;
            align-items: baseline;
        }

        .dt-search input {
            width: 250px;
            margin: 0 10px
        }

        .dt-length select {
            width: 57px;
            margin: 0 10px
        }
    </style>
    @stack('style')
</head>
