@extends('../templates/default')

@section('title')
    View all Users
@endsection

@section('content')
    <div class="mdl-grid relative-pos list-users">
        <div class="mdl-card mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">All Users</h2>
            </div>
            <div class="mdl-card__supporting-text auto-width">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
@endsection