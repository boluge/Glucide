@extends('templates/default')

@section('title')
    Home page
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="mdl-grid">
            <div class="card-notice card-notice-success mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
                {{ Session::get('success') }}
            </div>
        </div>
    @elseif(Session::has('error'))
        <div class="mdl-grid">
            <div class="card-notice card-notice-error mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
                {{ Session::get('error') }}
            </div>
        </div>
    @endif
    <div class="mdl-grid">
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Glucide</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Mauris sagittis pellentesque lacus eleifend lacinia...</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus expedita hic ipsa magnam,
                    maiores neque nobis omnis quos sapiente similique tempora unde vel vitae! Aut dolore eum facere
                    impedit ipsa.</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, autem beatae consequuntur cum
                    cupiditate deleniti, est eum fuga illo illum ipsum neque placeat porro quaerat sed suscipit tempora
                    veniam voluptates!</p>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    Créer un compte
                </a>
            </div>
        </div>
    </div>
@endsection