@extends('../templates/default')

@section('title')
    View all Foods
@endsection

@section('content')
    <div class="mdl-grid relative-pos list-users list-foods">
        <a href="{{ route('food.create') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored button-float-top-right">
            <i class="material-icons">add</i>
        </a>
        <div class="mdl-card mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">All foods</h2>
            </div>
            <div class="mdl-card__supporting-text auto-width">
                {!! $foods->render() !!}
            </div>
        </div>
    </div>
@endsection