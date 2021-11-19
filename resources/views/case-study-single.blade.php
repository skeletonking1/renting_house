@include('layouts.header')
<main class="container works-list works">
  <section class="content works-sec sec-hero">
    <h1>大阪府内の一等地に</h1>
    <div class="works-info">
      <div class="works-info-left">
        <div class="works-investment">投資用物件</div>
        <div class="client-name">S.N様</div>
      </div>
      <div class="works-date">2021.01.01</div>
    </div>
    <figure id="firstview">
      <img id="" src="{{ URL::asset('images/works_single.png') }}" alt="">
    </figure>
    <div class="works-content">
      <h2>お名前：S.N様</h2>
      <table>
        <tr>
          <td>導入の背景：</td>
          <td>テキストテキストテキストテキストテキスト</td>
        </tr>
        <tr>
          <td>導入後の効果１：</td>
          <td>テキストテキストテキストテキストテキスト</td>
        </tr>
        <tr>
          <td>導入後の効果２：</td>
          <td>テキストテキストテキストテキストテキスト</td>
        </tr>
      </table>
    </div>
  </section>
  <section class="content works-list-sec">
    <article class="article">
      <div class="article-left" id="instruction_bg">
        <img src="{{ URL::asset('images/works_single.png') }}" alt="">
      </div>
      <div class="article-right">
        <h1>導入の背景</h1>
        <h2>テキストテキストテキストテキストテキストテキスト</h2>
        <p>本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
    </article>
    <article class="article">
      <div class="article-left" id="post_introduction_bg">
        <img src="{{ URL::asset('images/works_single.png') }}" alt="">
      </div>
      <div class="article-right">
        <h1>導入の背景</h1>
        <h2>テキストテキストテキストテキストテキストテキスト</h2>
        <p>本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
    </article>
    <article class="article">
      <div class="article-left" id="eyecatch_image">
        <img src="{{ URL::asset('images/works_single.png') }}" alt="">
      </div>
      <div class="article-right">
        <h1>導入の背景</h1>
        <h2>テキストテキストテキストテキストテキストテキスト</h2>
        <p>本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
      </div>
    </article>
  </section>
  <section class="content works-social">
    <h1>導入後の効果</h1>
    <h2>テキストテキストテキストテキストテキストテキスト</h2>
    <p>本文テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
    <img src="{{ URL::asset('images/social.png') }}" alt="">
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')