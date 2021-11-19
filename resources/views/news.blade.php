@include('layouts.header')
<main class="container news-list">
  <section class="content sec-hero">
    <h1>NEWS一覧</h1>
    <div class="news-list-content">
      <table>
        @foreach ($posts as $post)
            <tr>
              <td>{{substr($post->created_at,0,10)}}</td>
              <td><a href='{{url('/news/'.$post->id)}}'><span>{{$post->title}}</span></a></td>
            <tr>
        @endforeach
      </table>

      <div class="article-pagination">
        {!! $posts->links('pagination') !!}
      </div>
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')
