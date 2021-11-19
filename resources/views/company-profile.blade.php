@include('layouts.header')
<main class="container company">
  <section class="sec-hero">
    <div class="content">
      <h1>キャチコピー</h1>
      <p>
        企業メッセージテキストテキストテキストテキストテキストテキストテキスト<br>
        テキストテキストテキストテキストテキストテキストテキスト
      </p>
    </div>
    <div class="content">
      <h1>キャチコピー</h1>
      <p>
        企業メッセージテキストテキストテキストテキストテキストテキストテキスト<br>
        テキストテキストテキストテキストテキストテキストテキスト
      </p>
    </div>
  </section>
  <section class="content company-table">
    <h1>会社概要</h1>
    <table>
      <tr>
        <td>商号</td>
        <td>進和建設工業株式会社</td>
      </tr>
      <tr>
        <td>代表</td>
        <td>代表取締役　西田芳明</td>
      </tr>
      <tr>
        <td>事業内容</td>
        <td>
          テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          テキストテキストテキストテキストテキストテキストテキストテキスト
          テキストテキストテキストテキストテキストテキスト              
        </td>
      </tr>
      <tr>
        <td>設立</td>
        <td>0000年00月00日</td>
      </tr>
      <tr>
        <td>所在地</td>
        <td>〒000-0000 住所テキストテキストテキストテキストテキストテキストテキスト</td>
      </tr>
      <tr>
        <td>アクセス</td>
        <td>テキストテキストテキストテキストテキストテキストテキスト</td>
      </tr>
      <tr>
        <td>TEL</td>
        <td>0000-0000-0000（代表）</td>
      </tr>
      <tr>
        <td>FAX</td>
        <td>0000-0000-0000（代表）</td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td><a href="">info@e-shinwa.net</a></td>
      </tr>
    </table>
  </section>
  <section class="content company-member">
    <h1>役員紹介</h1>
    <div class="company-member-content">
      <div class="company-member-wrap">
        <img src="{{ URL::asset('images/member01.png') }}" alt="">
        <div class="member-info">
          <h2 class="memeber-num">役職役職〇〇〇〇〇〇〇〇〇〇</h2>
          <h3 class="member-name">氏名〇〇 〇〇</h3>
          <p>経歴テキストテキストテキストテキストテキストテキストテキストテキストテキストテキス</p>
          <p>受賞歴<br>
            ・〇〇〇〇〇〇〇〇〇〇<br>
            ・〇〇〇〇〇〇〇〇〇〇〇
          </p>
        </div>
      </div>
      <div class="company-member-wrap">
        <img src="{{ URL::asset('images/member01.png') }}" alt="">
        <div class="member-info">
          <h2 class="memeber-num">役職役職〇〇〇〇〇〇〇〇〇〇</h2>
          <h3 class="member-name">氏名〇〇 〇〇</h3>
          <p>経歴テキストテキストテキストテキストテキストテキストテキストテキストテキストテキス</p>
          <p>受賞歴<br>
            ・〇〇〇〇〇〇〇〇〇〇<br>
            ・〇〇〇〇〇〇〇〇〇〇〇
          </p>
        </div>
      </div>
      <div class="company-member-wrap">
        <img src="{{ URL::asset('images/member01.png') }}" alt="">
        <div class="member-info">
          <h2 class="memeber-num">役職役職〇〇〇〇〇〇〇〇〇〇</h2>
          <h3 class="member-name">氏名〇〇 〇〇</h3>
          <p>経歴テキストテキストテキストテキストテキストテキストテキストテキストテキストテキス</p>
          <p>受賞歴<br>
            ・〇〇〇〇〇〇〇〇〇〇<br>
            ・〇〇〇〇〇〇〇〇〇〇〇
          </p>
        </div>
      </div>
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')