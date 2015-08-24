@include('../includes/header')

@if(Session::has('success'))
    <div class="mdl-grid">
        <div class="card-notice card-notice-success mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
@if (count($errors) > 0)
    <div class="mdl-grid">
        <div class="card-notice card-notice-error mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@yield('content')

@include('../includes/footer')