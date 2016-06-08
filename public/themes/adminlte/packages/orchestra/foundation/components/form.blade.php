<?php

$title = get_meta('title');
$description = get_meta('description'); ?>


<div class="clearfix">
	<div class="cont-header">
		<h1>
			{!! $title or '' !!}
			@if (! empty($description))
				<small>{!! $description or '' !!}</small>
			@endif
		</h1>
	</div>
	<div style="width: 30%; float: left; padding: 10px; text-align: right;">

		{{--<div class="btn-group table-btn">--}}
			{{--<button type="button" class="btn btn-default"></button>--}}
			{{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
				{{--Export--}}
				{{--<span class="fa fa-angle-down"></span>--}}
				{{--<span class="sr-only">Toggle Dropdown</span>--}}
			{{--</button>--}}
			{{--<ul class="dropdown-menu" role="menu">--}}
				{{--<li><a href="#">Action</a></li>--}}
				{{--<li><a href="#">Another action</a></li>--}}
				{{--<li><a href="#">Something else here</a></li>--}}
				{{--<li class="divider"></li>--}}
				{{--<li><a href="#">Separated link</a></li>--}}
			{{--</ul>--}}
		{{--</div>--}}

		{{--<div class="btn-group table-btn">--}}
			{{--<button type="button" class="btn btn-default"></button>--}}
			{{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
				{{--Filter--}}
				{{--<span class="fa fa-angle-down"></span>--}}
				{{--<span class="sr-only">Toggle Dropdown</span>--}}
			{{--</button>--}}
			{{--<ul class="dropdown-menu" role="menu">--}}
				{{--<li><a href="#">Action</a></li>--}}
				{{--<li><a href="#">Another action</a></li>--}}
				{{--<li><a href="#">Something else here</a></li>--}}
				{{--<li class="divider"></li>--}}
				{{--<li><a href="#">Separated link</a></li>--}}
			{{--</ul>--}}
		{{--</div>--}}
		{{--<div class="btn-group table-btn">--}}
			{{--<button type="button" class="btn btn-default"></button>--}}
			{{--<a href="#"><i class="fa fa-th-large"></i></a>--}}
			{{--<a href="#" class="active"><i class="fa fa-th-list"></i> </a>--}}

		{{--</div>--}}
	</div>


	{{--<button type="submit" class="btn btn-primary margin-left15">Status</button>--}}
	{{--<button type="submit" class="btn btn-primary margin-left15">Export</button>--}}
	{{--<button type="submit" class="btn btn-primary margin-left15">Delete</button>--}}
</div>

<div class="form-box">
	{!! app('form')->open(array_merge($form, ['class' => 'form-horizontal'])) !!}

	@if ($token)
	{!! app('form')->token() !!}
	@endif

	@foreach ($hiddens as $hidden)
	{!! $hidden !!}
	@endforeach

	@foreach ($fieldsets as $fieldset)
		<fieldset{!! app('html')->attributes($fieldset->attributes ?: []) !!}>
			@if ($fieldset->name)
			<legend>{!! $fieldset->name or '' !!}</legend>
			@endif

			@foreach ($fieldset->controls() as $control)
			<div class="form-group{!! $errors->has($control->name) ? ' has-error' : '' !!}">
				{!! app('form')->label($control->name, $control->label, ['class' => 'col-md-2 control-label']) !!}

				<div class="col-md-5">
					<div>{!! $control->getField($row, $control, []) !!}</div>
					@if ($control->inlineHelp)
					<span class="help-inline">{!! $control->inlineHelp !!}</span>
					@endif
					@if ($control->help)
					<p class="help-block">{!! $control->help !!}</p>
					@endif
					{!! $errors->first($control->name, $format) !!}
				</div>
			</div>
			@endforeach
		</fieldset>
	@endforeach
	<hr/>
	<fieldset>
		<div class="row">
			{{-- Fixed row issue on Bootstrap 3 --}}
		</div>
		<div class="row">
			<div class="col-md-9 offset-by-three">
				<button type="submit" class="btn btn-primary">
					{!! $submit !!}
				</button>
			</div>
		</div>
	</fieldset>

	{!! app('form')->close() !!}
</div>
