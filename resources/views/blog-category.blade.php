@include('layouts.header')
<main class="container works-list blog-list">
  <section class="content sec-hero">
    <div class="blog-list-ttl">
      <h1>ブログ</h1>
      <div class="category-group">
        <a href="{{ url('/blog') }}">新着</a>
        <span></span>
        <a href="{{ url('/blog/recommend') }}">おすすめ</a>
        <span></span>
        <a href="{{ url('/blog/category') }}" class="active">カテゴリ1</a>
        <span></span>
        <a href="{{ url('/blog/category') }}">カテゴリ２</a>
        <span></span>
        <a href="{{ url('/blog/category') }}">カテゴリ3</a>
      </div>
    </div>
  </section>
  <section class="content search-result">
    <h1>新着一覧</h1>
    <div class="result-content">
      <article>
          <div class="article-left">
            <h2>大阪府内の一等地に</h2>
            <img src="{{ URL::asset('images/feature01.png') }}" alt="">
          </div>
          <div class="article-right">
            <div class="article-date">2021.01.01</div>
            <div class="investment article-blog-category">カテゴリ</div>
            <p>ショルダーコピーショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
            </p>
            <a href="{{ url('/blog/') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
      </article>
      <article>
          <div class="article-left">
            <h2>大阪府内の一等地に</h2>
            <img src="{{ URL::asset('images/feature01.png') }}" alt="">
          </div>
          <div class="article-right">
            <div class="article-date">2021.01.01</div>
            <div class="investment article-blog-category">カテゴリ</div>
            <p>ショルダーコピーショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
            </p>
            <a href="{{ url('/blog/') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
      </article>
      <article>
          <div class="article-left">
            <h2>大阪府内の一等地に</h2>
            <img src="{{ URL::asset('images/feature01.png') }}" alt="">
          </div>
          <div class="article-right">
            <div class="article-date">2021.01.01</div>
            <div class="investment article-blog-category">カテゴリ</div>
            <p>ショルダーコピーショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
            </p>
            <a href="{{ url('/blog/') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
      </article>
      <article>
          <div class="article-left">
            <h2>大阪府内の一等地に</h2>
            <img src="{{ URL::asset('images/feature01.png') }}" alt="">
          </div>
          <div class="article-right">
            <div class="article-date">2021.01.01</div>
            <div class="investment article-blog-category">カテゴリ</div>
            <p>ショルダーコピーショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
            </p>
            <a href="{{ url('/blog/') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
      </article>
      <article>
          <div class="article-left">
            <h2>大阪府内の一等地に</h2>
            <img src="{{ URL::asset('images/feature01.png') }}" alt="">
          </div>
          <div class="article-right">
            <div class="article-date">2021.01.01</div>
            <div class="investment article-blog-category">カテゴリ</div>
            <p>ショルダーコピーショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
            </p>
            <a href="{{ url('/blog/') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
      </article>
    </div>
    <div class="article-pagination">
      <ul>
        <li class="last-prev"><a href="">＜ 最初</a></li>
        <li class="prev"><a href="" class="btn">前の10件へ</a></li>
        <li class="page-num">1/3</li>
        <li class="next active"><a href="" class="btn">次の10件へ</a></li>
        <li class="last-next"><a href="">最後 ＞</a></li>
      </ul>
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')