@extends('anavel::layouts.master')

@section('body-classes')
    sidebar-collapse
@stop

@section('content-header')
<h1>
    Anavel
    <small>CMS for Laravel applications</small>
</h1>
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
</ol>
@stop

@section('content')
    <p>Welcome to the Anavel dashboard page! This is a default page. You can customize this page with any content you want.</p>
@stop