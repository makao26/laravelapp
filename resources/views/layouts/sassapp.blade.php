<html>
<head>
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('/asset/favicon.png') }}">
</head>
<body>
  <header class="header">
    <div class="banner">
      <img class="banner-img" src="{{ asset('/asset/banner.jpg') }}" alt="banner-img">
      <p class="title-in-banner">@yield('title')</p>
    </div>

  </header>
  <nav>
    <ul class="nav">
      <li><a href="https://www.google.com">ダミーリンク01(google)</a></li>
      <li><a href="https://www.yahoo.co.jp">ダミーリンク02(yahoo japan)</a></li>
      <li><a href="https://www.apple.com/jp/">ダミーリンク03(apple)</a></li>
    </ul>
  </nav>
  <main>
    <aside class="side1">
      <h3 class="side-title">カテゴリー</h3>
      <ul class="side-menu">
        <li>ダミーリスト01</li>
        <li>ダミーリスト02</li>
        <li>ダミーリスト03</li>
        <li>ダミーリスト04</li>
      </ul>
    </aside>
    <section class="page_main">
      <div id="content_main">
        <article class="article">
          <figure>
            <img src="{{ asset('/asset/article/article01.jpg') }}">
          </figure>
        </article>
      </div>
    </section>
  </main>
  <!-- <div class="contents">
    <article>
      <header class="post-info">
        <h2 class="post-title">@yield('article-title')</h2>
      </header>
    </article>
    <asiad>
      サイドバーエリア
    </asiad>
  </div> -->
  <footer>
    <div class="footer">
      <p><small>&copy;sass-sample</small></p>
    </div>
  </footer>

  <!-- <h1>@yield('title')</h1>
  @section('menubar')
  <h2 class="menutitle">※メニュー</h2>
  <ul>
    <li>@show</li>
  </ul>
  <hr size="1">
  <div class="content">
    @yield('content')
  </div>
  <div class="footer">
    @yield('footer')
  </div> -->
</body>
</html>
