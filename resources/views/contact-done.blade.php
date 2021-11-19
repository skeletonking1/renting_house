@include('layouts.header')
  <main class="container request request-thanks">
    <section class="content sec-hero">
      <h1>お問い合わせ</h1>
      <p>
        お問い合わせいただき<br class="hidden sm:block">
        ありがとうございます<br>
        内容を確認した後、<br class="hidden sm:block">
        担当者よりご連絡いたします
      </p>
    </section>
    <section class="content">
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