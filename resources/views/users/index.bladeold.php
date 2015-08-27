@extends('../templates/default')

@section('title')
    View all Users
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="mdl-grid">
            <div class="card-notice card-notice-success mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="mdl-grid relative-pos list-foods">
        <div class="mdl-card mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">All Users</h2>
            </div>
            <div class="mdl-card__supporting-text auto-width">
                <table class="mdl-data-table mdl-js-data-table full-width table-align-left">
                    <thead>
                    <tr>
                        <th class="mdl-cell--hide-phone">Id</th>
                        <th class="mdl-data-table__cell--non-numeric">Utilisateurs</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-cell--hide-phone">Email</th>
                        <th class="mdl-cell--hide-phone">Roles</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-cell--hide-phone">Date de création</th>
                        <th>Editer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="mdl-cell--hide-phone">{{ $user->id }}</td>
                            <td>{{ $user->name }} {{ $user->firstname }}</td>
                            <td class="mdl-cell--hide-phone">{{ $user->email }}</td>
                            <td class="mdl-cell--hide-phone">
                                @if( $user->roles == 'admin')
                                    <i class="material-icons mdl-color-text--light-green-500">star</i>
                                @else
                                    <i class="material-icons mdl-color-text--grey-300">star_border</i>
                                @endif
                            </td>
                            <td class="mdl-cell--hide-phone">{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('profile', ['id' => $user->id]) }}">
                                    <i class="material-icons">create</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--!! $foods->render() !!-->
            </div>
        </div>
    </div>

@endsection