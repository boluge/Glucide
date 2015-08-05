@extends('../templates/default')

@section('title')
    Create a new food
@endsection

@section('content')
    <form action="{{ route('food.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="name" name="name" />
            <label class="mdl-textfield__label" for="name">Food Name</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="slug" name="slug" />
            <label class="mdl-textfield__label" for="slug">Food Slug</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-label" for="category">Food Category</label>
            <select name="category" id="category">
                <option value="id">Name of category</option>
            </select>
        </div>

        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Add this food
        </button>
    </form>
@endsection