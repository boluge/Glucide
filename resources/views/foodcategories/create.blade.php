@extends('../templates/default')

@section('title')
    {{ isset($category->id) ? 'Edit a category' : 'Create a new category' }}
@endsection

@section('content')
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
    <div class="mdl-grid">
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">{{ isset($category->id) ? 'Edit a Category' : 'Create a new Category' }}</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <form method="post" action="{{ isset($category->id) ? route('category.update',['id' => $category->id]) : route('category.store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                        <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ $category->name or '' }}"/>
                        <label class="mdl-textfield__label" for="name">Category Name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="slug" name="slug" value="{{ $category->slug or '' }}"/>
                        <label class="mdl-textfield__label" for="slug">Category Slug</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="number" id="parent_id" name="parent_id" value="{{ $category->parent_id or '' }}"/>
                        <label class="mdl-textfield__label" for="slug">Parent Id</label>
                        <select name="parent_id" id="parent_id">
                            <option value="0">Select a Parent</option>
                            @foreach($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                        {{ isset($category->id) ? 'Update this food' : 'Register this food' }}
                    </button>
                </form>
            </div>
            @if(isset($category->id))
                <div class="mdl-card__menu">
                    <a href="{{ route('food.delete', ['id' => $category->id]) }}" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">delete</i>
                    </a>
                </div>
            @endif
        </div>
        <div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--4-col-tablet">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Explains</h2>
            </div>
        </div>
    </div>



@endsection