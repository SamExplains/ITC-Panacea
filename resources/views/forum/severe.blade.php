@extends('layouts.app')
@section('content')
  @include('forum.navigation')
  @include('forum.minimal', ['highlight' => $severe])
@stop