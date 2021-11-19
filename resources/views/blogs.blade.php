@include('layouts.header')
<main class="container works-list blog-list">
  <section class="content sec-hero">
    <div class="blog-list-ttl">
      <h1>ブログ</h1>
      <div class="category-group">
        <a href="{{ url('/blog') }}" class="active">新着</a>
        <span></span>
        <a href="{{url('/blog/recommend')}}">おすすめ</a>
        @foreach ($categories as $category)
          <span></span>
          <a href="{{url('/blog/category/'.$category->id)}}" id="{{$category->id}}">{{$category->name}}</a>
        @endforeach
      </div>
    </div>
  </section>
  <section class="content search-result">
    <h1>新着一覧</h1>
    <div class="result-content">
      @foreach ($blogs as $blog)
        <article>
          <div class="article-left">
            <h2>{{$blog->title}}</h2>
            <img src="{{ URL::asset($blog->featured_image_url) }}" alt="">
          </div>
          <div class="article-right">
              <div class="article-date">{{$blog->created_at}}</div>
              <div class="investment article-blog-category">{{$blog->category}}</div>
              <p>{{$blog->content}}
              </p>
              <a href="{{url('/blog/'.$blog->id)}}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
        </article>
      @endforeach
    </div>
    <div class="article-pagination">
      {!! $blogs->links('pagination') !!}
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')