<div class="navbar user-search">
    <form class="navbar-form">
        <div class="form-group">
            {!! app('form')->text('q', app('request')->input('q', ''), ['placeholder' => 'Search keyword...', 'role' => 'keyword', 'class' => 'form-control']) !!}
            {!! app('form')->select('roles[]', $roles, app('request')->input('roles', []), ['multiple' => true, 'placeholder' => 'Roles', 'role' => 'roles', 'class'=>'form-control select2']) !!}
            {!! app('form')->submit(trans('orchestra/foundation::label.search.button'), ['class' => 'btn btn-primary']) !!}
        </div>
    </form>
</div>
