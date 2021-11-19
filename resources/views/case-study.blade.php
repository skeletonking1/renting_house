@include('layouts.header')
<main class="container works-list">
  <section class="content sec-hero">
    <h1>事例</h1>
    <p>ショルダーコピーショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
    </p>
    <div class="works-search-box">
      <input type="checkbox" id="chck1">
      <label class="tab-label" for="chck1">実績を探す</label>
      <form class="search-box-content">
        <div class="search-category">
          <div>地域</div>
          <div>金額</div>
          <div>間取り</div>
        </div>
        <div class="search-list">
          <div class="region-part" id="areas">
            @foreach ($areas as $area)
              <label class="radio-container">{{$area->name}}
                <input type="radio" name="area" value="{{$area->id}}">
                <span class="checkmark"></span>
              </label>
            @endforeach
          </div>
          <div class="budget-part" id="amounts">
            @foreach ($amounts as $amount)
              <label class="radio-container">{{$amount->type}}
                <input type="radio"  name="amount" value="{{$amount->id}}">
                <span class="checkmark"></span>
              </label>
            @endforeach
          </div>
          <div class="plan-part" id="housetypes">
            @foreach ($housetypes as $housetype)
              <label class="radio-container">{{$housetype->type}}
                <input type="radio" name="housetype" value="{{$housetype->id}}">
                <span class="checkmark"></span>
              </label>
            @endforeach
          </div>
        </div>
        <div class="btn-container">
          <button id="searchButton" class="btn hover-spacing-btn">選択して事例を見る</a>
        </div>
      </form>
    </div>
  </section>
  <section class="content search-result">
    @include ('case-study-pagination-data')
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')