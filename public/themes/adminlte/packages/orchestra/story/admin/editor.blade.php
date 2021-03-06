@extends('orchestra/foundation::layouts.main')

@section('content')
<div class="col-md-12">
	@include('orchestra/story::widgets._menu')

	<div class="form-box">
	{!! Form::model($content, ['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) !!}
		{!! Form::hidden('type') !!}
		{!! Form::hidden('format') !!}
			<div class="col-md-12">
				<fieldset>
					<div class="form-group{!! $errors->has('title') ? ' has-error': '' !!}">
						<label class="two columns control-label" for="title">Title</label>
						<div class="ten columns">
							{!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control']) !!}
							{!! $errors->first('title', '<p class="help-block error">:message</p>') !!}
						</div>
					</div>

					<div class="form-group{!! $errors->has('slug') ? ' has-error': ' ' !!}">
						<label class="two columns control-label" for="slug">Slug</label>
						<div class="ten columns">
							{!! Form::text('slug', null, ['role' => 'slug-editor', 'class' => 'form-control']) !!}
							{!! $errors->first('slug', '<p class="help-block error">:message</p>') !!}
						</div>
					</div>

					<div class="form-group{!! $errors->has('content') ? ' has-error': '' !!}">
						<div class="col-md-12">
							{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
							{!! $errors->first('content', '<p class="help-block error">:message</p>') !!}
						</div>
					</div>
				</fieldset>
			</div>

			<div class="col-md-12">
				<button type="submit" name="status" value="publish" class="btn btn-primary">Save as Publish</button>
				<button type="submit" name="status" value="draft" class="btn">Save as Draft</button>
				@if ($content->status === 'publish')
				<a href="{!! $content->link !!}" target="_blank" class="btn btn-link">View Post</a>
				@endif
			</div>
	{!! Form::close() !!}
</div>
</div>
@stop
