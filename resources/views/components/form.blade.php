<?php

$title = get_meta('title');
$description = get_meta('description'); ?>


<div class="clearfix">
	<div class="cont-header">
		<h1>

			@if (! empty($description))
				<small></small>
			@endif
		</h1>
	</div>



	{{--<button type="submit" class="btn btn-primary margin-left15">Status</button>--}}
	{{--<button type="submit" class="btn btn-primary margin-left15">Export</button>--}}
	{{--<button type="submit" class="btn btn-primary margin-left15">Delete</button>--}}
</div>

<h1 class="margintop40 text-center" style=""><strong>{!! $title or '' !!}</strong></h1><hr>
<p  style="text-align: center;">
	{!! $description or '' !!}
</p>

<div class="login">
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
				@if($control->label != null)
				{!! app('form')->label($control->name, $control->label, ['class' => 'col-md-2 control-label']) !!}
				@endif
					<div>{!! $control->getField($row, $control, []) !!}</div>
					@if ($control->inlineHelp)
					<span class="help-inline">{!! $control->inlineHelp !!}</span>
					@endif
					@if ($control->help)
					<p class="help-block">{!! $control->help !!}</p>
					@endif
					{!! $errors->first($control->name, $format) !!}
			</div>
			@endforeach
		</fieldset>
	@endforeach

	<fieldset>
		<p class="submit">
			<input type="submit" class="btn no-radius" value="{!! $submit !!}" />
		</p>
	</fieldset>

	{!! app('form')->close() !!}
</div>
