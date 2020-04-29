<!doctype html>
<html lang="ja">
<head>
  <title> Index</title>
  <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">
  <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body style="padding:10px;">
  <h1>Hello/Index</h1>
  <p>{!!$msg!!}</p>
  <ul>
    @foreach($data as $item)
    <li>{!!$item!!}</li>
    @endforeach
  </ul>
</body>
</html>
