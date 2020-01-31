@extends('layouts.helloapp')
@section('title','Person.index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  <table>
    <tr><th>Name</th><th>Mail</th><th>Age</th><th>編集</th><th>削除</th></tr>
    @foreach($items as $item)
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->mail}}</td>
      <td>{{$item->age}}</td>
      <td><a href='/laravelapp/public/hello/edit?id={{$item->id}}'>編集</td>
      <td><a href='/laravelapp/public/hello/del?id={{$item->id}}'>削除</td>
    </tr>
    @endforeach
  </table>
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
