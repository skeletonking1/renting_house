@include('layouts.header')
<main class="container feature lineup about">
  <section class="content feature-hero sec-hero">
    <h1>プロジェクト概要</h1>
    <p>ショルダーコピーショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
    </p>
  </section>
  <section class="content feature-list about-list" id="list">
    <h1></h1>
    <article>
        <div class="article-left">
          <h2>サービス１〇〇〇〇〇〇</h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>圧倒的なデザイン</h2>
          <p>ショルダーコピーショルダーコピーショルダーコピー<br>
          ショルダーコピーショルダーコピー<br>
          ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
          </p>
          <a href="{{ url('/house/1') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
        </div>
    </article>
    <article>
        <div class="article-left">
          <h2>サービス１〇〇〇〇〇〇</h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>圧倒的なデザイン</h2>
          <p>ショルダーコピーショルダーコピーショルダーコピー<br>
          ショルダーコピーショルダーコピー<br>
          ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
          </p>
          <a href="{{ url('/house/1') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
        </div>
    </article>
    <article>
        <div class="article-left">
          <h2>サービス１〇〇〇〇〇〇</h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>圧倒的なデザイン</h2>
          <p>ショルダーコピーショルダーコピーショルダーコピー<br>
          ショルダーコピーショルダーコピー<br>
          ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
          </p>
          <a href="{{ url('/house/1') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
        </div>
    </article>
  </section>
  <section class="content about-sec">
    <h1>LINE UP</h1>
    <div class="lineup-content">
      <a href="" class="lineup-article">
        <div class="lineup-article-img">
          <img src="{{ URL::asset('images/lineup01.png') }}" alt="">
        </div>
        <div class="lineup-info">
          <h2>Minimal</h2>
          <div>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
        </div>
      </a>
      <a href="" class="lineup-article">
        <div class="lineup-article-img">
          <img src="{{ URL::asset('images/lineup01.png') }}" alt="">
        </div>
        <div class="lineup-info">
          <h2>Minimal</h2>
          <div>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
        </div>
      </a>
      <a href="" class="lineup-article">
        <div class="lineup-article-img">
          <img src="{{ URL::asset('images/lineup01.png') }}" alt="">
        </div>
        <div class="lineup-info">
          <h2>Minimal</h2>
          <div>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
        </div>
      </a>
      <a href="" class="lineup-article">
        <div class="lineup-article-img">
          <img src="{{ URL::asset('images/lineup01.png') }}" alt="">
        </div>
        <div class="lineup-info">
          <h2>Minimal</h2>
          <div>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
        </div>
      </a>
      <a href="" class="lineup-article">
        <div class="lineup-article-img">
          <img src="{{ URL::asset('images/lineup01.png') }}" alt="">
        </div>
        <div class="lineup-info">
          <h2>Minimal</h2>
          <div>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
        </div>
      </a>
      <a href="" class="lineup-article">
        <div class="lineup-article-img">
          <img src="{{ URL::asset('images/lineup01.png') }}" alt="">
        </div>
        <div class="lineup-info">
          <h2>Minimal</h2>
          <div>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
        </div>
      </a>
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')