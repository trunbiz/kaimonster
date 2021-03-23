@extends('admin.base')
@section('title','Kai - facebook')
@section('main')
    <style>
        body{
            margin:0px !important;
            padding:0px !important;
            overflow:hidden !important;
        }
    </style>
    <iframe src="{{asset('/admin')}}" frameborder="0" style="overflow:hidden;height:500px;width:100%" height="100%" width="100%"></iframe>
@stop
