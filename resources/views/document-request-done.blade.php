@include('layouts.header')
<main class="container request request-thanks">
  <section class="content sec-hero">
    <h1>資料請求</h1>
    <p>
      弊社のサービスに興味を持って頂きありがとうございます<br>
      資料は下記のボタン、またはメールよりダウンロードください
    </p>
  </section>
  <section class="content">
    <div class="btn-container">
      <a href="" class="btn hover-spacing-btn">資料をダウンロード<img src="{{ URL::asset('images/ico_triangle.png') }}" alt=""></a>
    </div>
    <div class="request-banner">
      <a href="" class="btn">
        <h1>サービス紹介</h1>
        <p>テキストテキストテキテキストテ</p>
      </a>
      <a href="" class="btn">
        <h1>事例</h1>
        <p>テキストテキストテキテキストテ</p>
      </a>
      <a href="" class="btn">
        <h1>セミナー</h1>
        <p>テキストテキストテキテキストテ</p>
      </a>
    </div>
    <div class="btn-container">
      <a href="" class="btn hover-spacing-btn hover-spacing-outline-btn">ホームへ戻る<img src="{{ URL::asset('images/ico_triangle_blue.png') }}" alt=""></a>
    </div>
  </section>
</main>
@include('layouts.footer')