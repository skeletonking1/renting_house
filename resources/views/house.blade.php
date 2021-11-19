@include('layouts.header')
<main class="container feature lineup">
  <section class="content lineup-hero sec-hero">
    <h1>商品住宅一覧</h1>
    <p>ショルダーコピーショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピー<br>
      ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
    </p>
    <div class="lineup-content">
      @foreach ($houses as $house)
        <a href="/house/{{$house->id}}" class="lineup-article">
          <div class="lineup-article-img">
            <img src="{{ $house->featured_image_url }}" alt="">
          </div>
          <div class="lineup-info">
            <h2>{{$house->title}}</h2>
            <div>{{$house->book}}</div>
          </div>
        </a>
      @endforeach
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')