<script>
  function deleteHousing(id) {
    count = <?php echo json_encode($row_count)?>;
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
      url: "/admin/housing" + '/' + delete_id,
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
  <h6 class="card-title"><strong>商品住宅一覧</strong></h6>
  <div class="float-right card-tools d-inline-flex">
    <span class="mt-1 mr-2">全<span
        class="count">{{$row_count}}</span>件</span>{{$housings->links()}}
  </div>
</div>
<div class="card-body">
  @if( count($housings)>0 )
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
      @foreach ( $housings as $housing )
      <tr class="row" id="{{$housing->id}}">
        <td class="col-sm-1">{{ $housing->id }}</td>
        <td class="col-sm-3">{{ $housing->title }}</td>
        <td class="col-sm-4">
          @if( $housing->public_status == 0 )
            非公開
          @else
            公開
          @endif
        </td>
        <td class="col-sm-4">
          <div class="float-sm-right">
            <a href="/house/{{$housing->id}}" class="mr-2">
              <button class="btn btn-primary btn-sm viewHousing" data-id="{{$housing->id}}" type="button">
                <i class="fa fa-external-link-alt"></i>
                表示
              </button>
            </a>
            <a href="/admin/housing/{{$housing->id}}/edit" class="mr-2">
              <button class="btn btn-info btn-sm editHousing" type="button" data-id="{{$housing->id}}">
                <i class="ml-1 mr-1 fa fa-pencil-alt"></i>
                編集
              </button>
            </a>
            <button class="btn btn-danger btn-sm deleteHousing" data-id="{{$housing->id}}" onclick="deleteHousing({{$housing->id}})">
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
        class="count">{{$row_count}}</span>件</span>{{$housings->links()}}
  </div>
</div>
