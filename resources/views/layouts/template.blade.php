<!DOCTYPE html>
<html>
    <head>
      <title>@yield('title')</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      {!! Html::style('css/style.css') !!}
      {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
    </head>
        <body>
            @include('../includes/header')
            <main class="mdl-layout__content">

                <div class="page-content">
                    @yield('content')
                </div>

                <div class="mdl-layout-spacer"></div>
                <footer class="mdl-mini-footer">
                    <div class="mdl-mini-footer__left-section">
                        <div class="mdl-logo">@yield('title')</div>
                        <ul class="mdl-mini-footer__link-list">
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Privacy & Terms</a></li>
                        </ul>
                    </div>
                </footer>
            </main>

            </div>

            {!! Html::script('https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js') !!}
        </body>
</html>
