@include('layouts.header')
<main class="container request">
  <section class="content sec-hero">
    <h1>資料請求</h1>
    <p>
      弊社のサービスに興味を持って頂きありがとうございます。<br>
      サービスの詳細について資料を配信しておりますので下記のフォームよりご請求ください。<br>
      お電話からのご請求も承っておりますのでご連絡ください。
    </p>
  </section>
  <section class="content">
    <div class="request-address">
      お電話でのお問い合わせはこちら
      <span>0123-456-7890</span>
      <span>平日  00:00~00:00</span>
    </div>
    <form action="" class="request-form">
      <div class="input-group">
        <label for="">会社名*</label>
        <input type="text" placeholder="入力してください">
      </div>
      <div class="input-group">
        <label for="">氏名*</label>
        <input type="text" placeholder="入力してください">
      </div>
      <div class="input-group">
        <label for="">メールアドレス*</label>
        <input type="text" placeholder="入力してください">
      </div>
      <div class="input-group">
        <label for="">電話番号*</label>
        <input type="text" placeholder="入力してください">
      </div>
      <div class="input-group">
        <label for="">資料請求の目的を選択してください*</label>
        <div class="radio-group">
          <label class="radio-container">ーーーーに課題がある
            <input type="radio" checked="checked" name="radio">
            <span class="checkmark"></span>
          </label>
          <label class="radio-container">ーーーーに興味がある
            <input type="radio" name="radio">
            <span class="checkmark"></span>
          </label>
          <label class="radio-container">その他
            <input type="radio" name="radio">
            <span class="checkmark"></span>
          </label>              
        </div>
      </div>
      <div class="input-group textarea-group">
        <label for="">ご相談、要望などあればご記入ください</label>
        <textarea name="" id="" placeholder="入力してください"></textarea>
      </div>
      <div class="privacy">
        <div class=""><a href="">プライバシーポリシー</a><br class="hidden sm:block">に同意の上、送信ください。</div>
        <div class="radio-group">
          <label class="radio-container">プライバシーポリシーに同意する
            <input type="radio" name="radio">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>
      <div class="btn-container">
        <button type="submit" class="btn hover-spacing-btn">送信する<img src="{{ URL::asset('images/ico_triangle.png') }}" alt=""></button>
      </div>
    </form>
  </section>
</main>
@include('layouts.footer')