@extends('../templates/default')

@section('title')
    View all food
@endsection

@section('content')
    <a href="{{ route('food.create') }}" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">add</i>
    </a>
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
        <tr>
            <th>Id</th>
            <th class="mdl-data-table__cell--non-numeric">Name</th>
            <th class="mdl-data-table__cell--non-numeric">Category</th>
            <th>Weight</th>
            <th>Sugar</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
            @foreach($foods as $food)
                <tr>
                    <td>{{ $food->id }}</td>
                    <td><a href="{{ route('food.edit', ['id' => $food->id]) }}">{{ $food->name }}</a></td>
                    <td>{{ $food->category_id }}</td>
                    <td>
                        @if( $food->weight == 1)
                            <i class="material-icons">check</i>
                        @else
                            <i class="material-icons">close</i>
                        @endif
                    </td>
                    <td>{{ $food->sugar }} gr</td>
                    <td>
                        <a href="{{ route('food.edit', ['id' => $food->id]) }}">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('food.edit', ['id' => $food->id]) }}">
                            <i class="material-icons">create</i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection