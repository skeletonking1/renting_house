@include('layouts.header')
<main class="container news-page">
  <section class="content news-content sec-hero">
    <h1 class="news-ttl">{{ $blog->title ?? '' }}</h1>
    <div class="news-date">{{$blog->updated_at??''}}</div>
    <div class="news-info">
        {!!$blog->content??''!!}
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')
