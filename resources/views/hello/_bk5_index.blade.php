@extends('layouts.helloapp')
<style>
  .pagination{font-size: 10px;}
  .pagination li{display: inline-block;}
  tr th a:link {color: white;}
  tr th a:visited {color: white;}
  tr th a:hover {color: white;}
  tr th a:active {color: white;}
</style>
@section('title','Index')
@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <p>ここが本文のコンテンツです。</p>
  @if (Auth::check())
  <p>USER: {{$user->name .'('.$user->email.')'}}</p>
  @else
  <p>※ログインしていません。(<a href="/laravelapp/public/login">ログイン</a>|<a href="/laravelapp/public/register">登録</a>)</p>
  @endif
  <table>
    <tr>
      <th><a href="/laravelapp/public/hello?sort=name">name</a></th>
      <th><a href="/laravelapp/public/hello?sort=mail">mail</a></th>
      <th><a href="/laravelapp/public/hello?sort=age">age</a></th>
      <th>編集</th>
      <th>削除</th>
    </tr>
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
  {{$items->appends(['sort'=>$sort])->links()}}
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection
