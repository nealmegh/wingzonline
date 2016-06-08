<?php

$title = get_meta('title');
$description = get_meta('description'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		{!! $title or '' !!}
		@if (! empty($description))
			<small>{!! $description or '' !!}</small>
		@endif
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#" class="active">{!! $title or '' !!}</a></li>
	</ol>
</section>
