<div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
    <header class="mdl-layout__header mdl-layout__header--img">
        <div class="mdl-layout-icon"></div>

        <div class="mdl-layout__header-row">
            <h1 class="mdl-layout-title">@yield('title', 'Glucide')</h1>
            <div class="mdl-layout-spacer"></div>
        </div>

        <div class="mdl-layout__header-row mdl-layout--large-screen-only">
            @include('../includes/navigation')
        </div>

        @if( Auth::check() )
            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored btn-add-header">
                <i class="material-icons">add</i>
            </button>
        @endif

    </header>
    <div class="mdl-layout__drawer mdl-layout--small-screen-only">
        <span class="mdl-layout-title">@yield('title')</span>
        @include('../includes/navigation')
    </div>