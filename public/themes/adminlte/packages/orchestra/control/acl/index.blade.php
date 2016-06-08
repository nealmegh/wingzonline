@extends('orchestra/foundation::layouts.page')

#{{ use Orchestra\Support\Str }}

@section('content')
<div class="row">
<div class="col-md-12 white">
	@include('orchestra/control::widgets._menu')

	<div class="navbar user-search hidden-phone">
		{!! Form::open(['url' => app('url')->current(), 'method' => 'GET', 'class' => 'navbar-form']) !!}
			{!! Form::select('name', $collection, $metric, ['class' => 'form-control select2']) !!}&nbsp;
			<button type="submit" class="btn btn-primary">{{ trans('orchestra/foundation::label.submit') }}</button>
		{!! Form::close() !!}
	</div>

	{!! Form::open(['url' => app('url')->current(), 'method' => 'POST']) !!}
	{!! Form::hidden('metric', $metric) !!}

	@foreach($roles as $roleId => $role)

		<div class="box">
			<div class="box-header with-border">
				{{ $role['name'] }}
			</div>
			<div class="box-body">
						<div class="form-group">
							@foreach($actions as $actionId => $action)
								<label for="acl-{!! $roleId !!}-{!! $actionId !!}" >
									{!! Form::checkbox("acl-{$roleId}-{$actionId}", 'yes', $eloquent->check($role['slug'], $action['slug']), [
                                        'id' => "acl-{$roleId}-{$actionId}",
                                        'class' => "flat-red"
                                    ]) !!}
									{{ $action['name'] }}
									&nbsp;&nbsp;&nbsp;
								</label>
							@endforeach
						</div>
			</div>
		</div>


	@endforeach

		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">{{ trans('orchestra/foundation::label.submit') }}</button>
			<a href="{!! handles("orchestra::control/acl/{$metric}/sync", ['csrf' => true]) !!}" class="btn btn-link">
				{{ trans('orchestra/control::label.sync-roles') }}
			</a>
		</div>
	{!! Form::close() !!}
</div>
</div>
@stop
