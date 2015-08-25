@extends('../templates/default')

@section('title')
    View all food
@endsection

@section('content')
    <div class="mdl-grid relative-pos list-foods">
        <a href="{{ route('category.create') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored button-float-top-right">
            <i class="material-icons">add</i>
        </a>
        <div class="mdl-card mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">All Categories</h2>
            </div>
            <div class="mdl-card__supporting-text auto-width">
                <table class="mdl-data-table mdl-js-data-table full-width table-align-left">
                    <thead>
                    <tr>
                        <th class="mdl-cell--hide-phone">Id</th>
                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="mdl-cell--hide-phone">{{ $category->id }}</td>
                                <td><a class="name-edit-link" href="{{ route('category.edit', ['id' => $category->id]) }}">{{ $category->name }}</a></td>

                                <td>
                                    <a href="{{ route('category.edit', ['id' => $category->id]) }}">
                                        <i class="material-icons">create</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--!! $foods->render() !!-->
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a href="{{ route('food.index') }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    All Foods
                </a>
            </div>
        </div>
    </div>

@endsection