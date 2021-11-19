<h1>新着一覧</h1>
<div class="result-content">
    @foreach ($results as $result)
    <article>
    <div class="article-left">
        <h2>大阪府内の一等地に</h2>
        <img src="{{$result->eyecatch_image_url}}" alt="">
    </div>
    <div class="article-right">
        <div class="article-date">{{$result->updated_at}}</div>
        <div class="investment">投資用物件</div>
        <p>ショルダーコピーショルダーコピーショルダーコピー<br>
        ショルダーコピーショルダーコピー<br>
        ショルダーコピーショルダーコピーショルダーコピーショルダーコピー
        </p>
        <a href="/case-study/{{$result->id}}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
    </div>
    </article>
    @endforeach
</div>
<div class="article-pagination">
    {!! $results->links('pagination') !!}
</div>