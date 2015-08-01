<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        {!! Html::style('css/style.css') !!}
        {!! Html::style('https://fonts.googleapis.com/icon?family=Material+Icons') !!}
    </head>
      <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
          <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout-icon"></div>

            <div class="mdl-layout__header-row">
              <h1 class="mdl-layout-title">@yield('title')</h1>
              <div class="mdl-layout-spacer"></div>
            </div>

            <div class="mdl-layout__header-row mdl-layout--large-screen-only">
              <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="#">Nav link 1</a>
                <a class="mdl-navigation__link" href="#">Nav link 2</a>
                <a class="mdl-navigation__link" href="#">Nav link 3</a>
              </nav>
            </div>

            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored btn-add-header">
              <i class="material-icons">add</i>
            </button>
          </header>
          <div class="mdl-layout__drawer mdl-layout--small-screen-only">
            <span class="mdl-layout-title">@yield('title')</span>
            <nav class="mdl-navigation">
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
              <a class="mdl-navigation__link" href="">Link</a>
            </nav>
          </div>
      </div>
      {!! Html::script('https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js') !!}
    </body>
</html>
