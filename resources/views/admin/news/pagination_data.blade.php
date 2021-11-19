<script>
  function deleteNews(id) {
    count = <?php echo json_encode($count)?>;
    delete_id = id;
    $('#deleteModal').modal();
    $('#deleteButton').html('<a class="btn btn-danger">削除</a>');
  }
  $('#deleteButton').click(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: "/admin/news" + '/' + delete_id,
      success: function(data) {
        $('.deletePost').each(function() {
          var id = $(this).data("id");
          if (id === delete_id) {
            $(this).parents("tr").remove();
          }
        })
        $('#deleteModal').modal("hide");
        count--;
        $('.count').html(count);
      },
      error: function(data) {
        console.log('Error:', data);
      }
    })
  });
</script>
<div class="card-header">
  <h6 class="card-title"><strong>お知らせ一覧</strong></h6>
  <div class="float-right card-tools d-inline-flex"><span class="mt-1 mr-2">全<span
        class="count">{{$count}}</span>件</span>{{$posts->links()}}</div>
</div>
<div class="card-body">
  @if(count($posts)>0)
  <table class="table table-striped">
    <thead>
      <tr class="row">
        <th class="col-sm-1">ID</th>
        <th class="col-sm-3">タイトル</th>
        <th class="col-sm-4">公開状能</th>
        <th class="float-right col-sm-4"></th>
      </tr>
    </thead>
    <tbody id="tbody">
      @foreach ($posts as $post)
      <tr class="row" id="{{$post->id}}">
        <td class="col-sm-1">{{$post->id}}</td>
        <td class="col-sm-3">{{$post->title}}</td>
        <td class="col-sm-4">
          @if($post->state=='0')
          非公開
          @else
          公開
          @endif
        </td>
        <td class="col-sm-4">
          <div class="float-sm-right">
            <a href="/news/{{$post->id}}" class="mr-2">
              <button class="btn btn-primary btn-sm viewPost" data-id="{{$post->id}}" type="button">
                <i class="fa fa-external-link-alt"></i>
                表示
              </button>
            </a>
            <a href="/admin/news/edit/{{$post->id}}" class="mr-2">
              <button class="btn btn-info btn-sm editPost" type="button" data-id="{{$post->id}}">
                <i class="ml-1 mr-1 fa fa-pencil-alt"></i>
                編集
              </button>
            </a>
            <button class="btn btn-danger btn-sm deletePost" onclick="deleteNews({{$post->id}})" data-id="{{$post->id}}">
              <i class="ml-1 mr-1 fa fa-trash"></i>削除
            </button>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <table class="table table-striped">
    <thead>
      <tr class="row">
        <th class="col-sm-1">ID</th>
        <th class="col-sm-3">タイトル</th>
        <th class="col-sm-4">公開状能</th>
        <th class="float-right col-sm-4"></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
  <div style="height: 200px; width:inherit;display: flex;justify-content: center;align-items: center;">
    <div>データがありません。</div>
  </div>
  @endif
</div>
<div class="card-footer">
  <div class="float-right card-tools d-inline-flex"><span class="m-2">全<span
        class="count">{{$count}}</span>件</span>{{$posts->links()}}</div>
</div>