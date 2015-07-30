<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        {!! Html::style('css/style.css') !!}
    </head>
    <body>
      <!-- Always shows a header, even in smaller screens. -->
      <div class="mdl-layout mdl-js-layout">
        <div class="layout-transparent mdl-layout mdl-js-layout">
          <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
              <!-- Title -->
              <span class="mdl-layout-title">@yield('title')</span>
              <!-- Add spacer, to align navigation to the right -->
              <div class="mdl-layout-spacer"></div>
              <!-- Navigation -->
              <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
              </nav>
            </div>
          </header>
          <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">@yield('title')</span>
            <nav class="mdl-navigation">
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
            </nav>
          </div>
          <main class="mdl-layout__content">
            @yield('header')
          </main>
        </div>
        <div class="container">
          @yield('content')
        </div>
    </body>
</html>
