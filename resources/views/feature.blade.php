@include('layouts.header')
<main class="container feature">
  <section class="content feature-hero sec-hero">
    <h1>安定した<br class="hidden sm:block">収益を得られる<br class="hidden sm:block">不動産投資を</h1>
    <p>ショルダーコピーショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピーショルダーコピーショルダーコピー</p>
    <h2>１分でわかる「〇〇〇〇〇」</h2>
    <video class="feature-video" controls muted poster="https://assets.codepen.io/6093409/river.jpg">
      <source src="https://assets.codepen.io/6093409/river.mp4" type="video/mp4">
    </video>
  </section>
  <section class="content feature-list" id="list">
    <h1>特 徴</h1>
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
          <a href="{{ url('/case-study/1') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
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
          <a href="{{ url('/case-study/1') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
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
          <a href="{{ url('/case-study/1') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
        </div>
    </article>
  </section>
  <section class="content flow feature-flow">
    <h2 class="sec-ttl">ご契約の流れ</h2>
    <div class="flow-content">
      <div class="flow-wrap">
        <img src="{{ URL::asset('images/ico_flow01.png') }}" alt="">
        <h3>1<span>｜</span>ヒアリング</h3>
        <p>
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
      <div class="flow-wrap">
        <img src="{{ URL::asset('images/ico_flow02.png') }}" alt="">
        <h3>2<span>｜</span>ご契約</h3>
        <p>
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
      <div class="flow-wrap">
        <img src="{{ URL::asset('images/ico_flow03.png') }}" alt="">
        <h3>3<span>｜</span>利用開始</h3>
        <p>
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
        </p>
      </div>
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')