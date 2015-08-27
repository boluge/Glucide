<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Glucide | @yield('title')</title>
    @include('../includes/favicon')
    <meta name="description" content="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <script src="{{ URL::asset('js/app.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
<!--[if lt IE 8]> <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p> <![endif]-->
    <div class="layout-transparent mdl-layout mdl-js-layout">
        <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title"><a href="{{ route('home') }}" class="home-link">Glucide</a></span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation -->
                <nav class="mdl-navigation mdl-cell--hide-tablet mdl-cell--hide-tablet mdl-cell--hide-phone">
                    @include('../includes/navigation')
                </nav>
                @include('../includes/admin')
                @include('../includes/usermenu')
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title mdl-color--accent mdl-color-text--grey-50">Glucide</span>
            <nav class="mdl-navigation">
                @include('../includes/navigation')
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="container">
