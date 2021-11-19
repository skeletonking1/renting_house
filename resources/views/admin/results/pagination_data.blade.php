<script>
  function deleteResult(id) {
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
      url: "/admin/results" + '/' + delete_id,
      success: function(data) {
        $('.deleteHousing').each(function() {
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
    <h6 class="card-title">お知らせ一覧</h6>

    <div class="card-tools float-right d-inline-flex"><span class="mt-1 mr-2">全<span class="count">{{$count}}</span>件</span>
    {{$results->links()}}
    </div>
</div>
<div class="card-body">
    @if(count($results)>0)
        <table class="table table-striped">
            <thead>
            <tr class="row">
                <th class="col-sm-1">ID</th>
                <th class="col-sm-2">タイトル</th>
                <th class="col-sm-1">地域</th>
                <th class="col-sm-2">金額</th>
                <th class="col-sm-1">間取り</th>
                <th class="col-sm-2">公開状態</th>
                <th class="col-sm-3 float-right">カテゴリ</th>
            </tr>
            </thead>
            <tbody id="resultrows">
                @foreach ($results as $result)
                    <tr class="row" id="{{$result->id}}">
                        <td class="col-sm-1">{{$result->id}}</td>
                        <td class="col-sm-2">{{$result->title}}</td>
                        <td class="col-sm-1">{{$result->name}}</td>
                        <td class="col-sm-2">{{$result->type}}</td>
                        <td class="col-sm-1">{{$result->type}}</td>
                        <td class="col-sm-2">
                            @if($result->public_status=='0')
                                非公開
                            @else
                                公開
                            @endif
                        </td>
                        <td class="col-sm-3">
                            <div class="float-sm-right">
                                <a href="/case_study/{{$result->id}}" class="mr-2">
                                    <button class="btn btn-primary btn-sm viewResult" data-id="{{$result->id}}"  type="button">
                                        <i class="fa fa-external-link-alt"></i>
                                        表示
                                    </button>
                                </a>
                                <a href="/admin/results/{{$result->id}}/edit" class="mr-2">
                                    <button class="btn btn-info btn-sm editResult" type="button" data-id="{{$result->id}}">
                                        <i class="fa fa-pencil-alt ml-1 mr-1"></i>
                                        編集
                                    </button>
                                </a>
                                <button  class="btn btn-danger btn-sm deleteResult" id="deleteresult" data-id="{{$result->id}}">
                                    <i class="fa fa-trash ml-1 mr-1"></i>削除
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
            <th class="col-sm-2">タイトル</th>
            <th class="col-sm-1">地域</th>
            <th class="col-sm-2">金額</th>
            <th class="col-sm-1">間取り</th>
            <th class="col-sm-2">公開状態</th>
            <th class="col-sm-3 float-right">カテゴリ</th>
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
    <div class="card-tools float-right d-inline-flex"><span class="m-2">全<span class="count">{{$count}}</span>件</span>{{$results->links()}}</div>
</div>