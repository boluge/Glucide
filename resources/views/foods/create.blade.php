@extends('../templates/default')

@section('title')
    {{ isset($food->name) ? 'Edit a food' : 'Create a new food' }}
@endsection

@section('content')
    <form method="post" action="{{ route('food.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
            <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ $food->name or '' }}"/>
            <label class="mdl-textfield__label" for="name">Food Name</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="slug" name="slug" value="{{ $food->slug or '' }}"/>
            <label class="mdl-textfield__label" for="slug">Food Slug</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-label" for="category_id">Food Category</label>
            <select name="category_id" id="category_id">
                <option value="1" {{ isset($food->name) ? ($food->category_id == 1 ? 'selected="selected"' : '') : '' }}>Un</option>
                <option value="2" {{ isset($food->name) ? ($food->category_id == 2 ? 'selected="selected"' : '') : '' }}>Deux</option>
                <option value="3" {{ isset($food->name) ? ($food->category_id == 3 ? 'selected="selected"' : '') : '' }}>Trois</option>
                <option value="4" {{ isset($food->name) ? ($food->category_id == 4 ? 'selected="selected"' : '') : '' }}>Quatre</option>
            </select>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="weight" value="1" {{ isset($food->name) ? ($food->weight == 1 ? 'checked' : '') : '' }}/>
                <span class="mdl-radio__label">100 gr</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="weight" value="0" {{ isset($food->name) ? ($food->weight == 0 ? 'checked' : '') : '' }}/>
                <span class="mdl-radio__label">Unit</span>
            </label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="sugar" name="sugar" value="{{ $food->sugar or '' }}"/>
            <label class="mdl-textfield__label" for="sugar">Food Sugar</label>
        </div>
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
            Add this food
        </button>
    </form>
@endsection