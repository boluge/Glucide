@extends('templates/default')

@section('title')
    Home page
@endsection

@section('content')
    <div class="container">
        <div class="mdl-grid">
            <div class="mdl-card mdl-shadow--2dp mdl-cell--12-col">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Laravel 5</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Mauris sagittis pellentesque lacus eleifend lacinia...</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus expedita hic ipsa magnam,
                        maiores neque nobis omnis quos sapiente similique tempora unde vel vitae! Aut dolore eum facere
                        impedit ipsa.</p>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection