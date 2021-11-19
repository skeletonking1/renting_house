@include('layouts.header')
<main class="container news-page">
  <section class="content news-content sec-hero">
    <h1 class="news-ttl">{{ $post->title ?? '' }}</h1>
    <div class="news-date">{{$post->updated_at??''}}</div>
    <div class="news-info">
        {!!$post->content??''!!}
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')
