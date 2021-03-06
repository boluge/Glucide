@extends('../templates/default')

@section('title')
    View all food
@endsection

@section('content')
    <div class="mdl-grid relative-pos list-foods">
        <a href="{{ route('food.create') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored button-float-top-right">
            <i class="material-icons">add</i>
        </a>
        <div class="mdl-card mdl-shadow--6dp mdl-cell mdl-cell--12-col mdl-cell--8-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">All Foods</h2>
            </div>
            <div class="mdl-card__supporting-text auto-width">
                <table class="mdl-data-table mdl-js-data-table full-width table-align-left">
                    <thead>
                    <tr>
                        <th class="mdl-cell--hide-phone">Id</th>
                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                        <th class="mdl-data-table__cell--non-numeric mdl-cell--hide-phone">Category</th>
                        <th class="mdl-cell--hide-phone">Weight</th>
                        <th>Sugar</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $food)
                            <tr>
                                <td class="mdl-cell--hide-phone">{{ $food->id }}</td>
                                <td><a class="name-edit-link" href="{{ route('food.edit', ['id' => $food->id]) }}">{{ $food->name }}</a></td>
                                <td class="mdl-cell--hide-phone">{{ $food->category_id }}</td>
                                <td class="mdl-cell--hide-phone">
                                    @if( $food->weight == 1)
                                        <i class="material-icons mdl-color-text--light-green-400">check</i>
                                    @else
                                        <i class="material-icons mdl-color-text--red-200">close</i>
                                    @endif
                                </td>
                                <td>{{ $food->sugar }} gr</td>
                                <td>
                                    <a href="{{ route('food.edit', ['id' => $food->id]) }}">
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
                <a href="{{ route('category.index') }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    All categories
                </a>
            </div>
        </div>
    </div>

@endsection