@extends('layouts.helloapp')
@section('title','ユーザ認証')
@section('menubar')
  @parent
  ユーザ認証ページ
@endsection

@section('content')
<p>{{$message}}</p>

@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
