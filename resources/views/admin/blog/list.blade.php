@extends('admin.layouts.master')

@section('content')

<style>

  #upload-image {
    opacity: 0;
    position: absolute;
    z-index: -1;
    display: none;
  }

  #preview {
    cursor: pointer;
    width: 100%;
    height: 150px;
    background-color: rgb(156, 150, 150);
    color: #333;
    display: inline-flex;
    justify-content: center;
    align-items: center;
  }

  #preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-2">
          <h4 class="m-0">ブログ一覧</h4>
        </div>
        <div class="col-sm-3">
            <a href="{{url('admin/blog/create')}}">
                <Button class="btn btn-primary">新規追加</Button>
            </a>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">ブログ一覧</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    @include('admin.layouts.modal_delete')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="p-0.2">検索</div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="search_word" class="col-sm-2 col-form-label">フリーワード</label>
                    <input type="text" class="ml-1 col-sm-4 form-control" name="search_word" id="search_word">
                </div>
                <div class="form-group row">
                    <label for="author_name" class="col-sm-2 col-form-label">著者名</label>
                    <input type="text" class="ml-1 col-sm-4 form-control" name="author_name" id="author_name">
                </div>
                <div class="form-group row" id="category">
                    <label for="check_type" class="col-sm-2 col-form-label">カテゴリ</label>
                    @foreach ($categories as $category)
                    <div class="ml-1 form-check form-check-inline" name="check_type">
                        <input class="form-check-input category_check" type="checkbox" id="{{$category->id}}" name="category"  value="{{$category->id}}">
                        <label class="form-check-label">{{$category->name}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="check_type" class="col-sm-2 col-form-label">公開状態</label>
                    <div class="ml-1 form-check form-check-inline" name="check_type">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="public_status"  value="1">
                        <label class="form-check-label" for="inlineCheckbox1">公開</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="public_status" value="0">
                    <label class="form-check-label" for="inlineCheckbox2">非公開</label>
                    </div>
                </div>
                <div class="form-group row">
                <label for="recommended_flag" class="col-sm-2 col-form-label">おすすめ</label>
                    <div class="ml-1 form-check form-check-inline" name="recommended_flag">
                        <input  type="checkbox" class="recommended_flag" id="inlineCheckbox" name="recommended_flag"  value="true">
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="mx-auto ">
                    <button class="px-5 pl-2 pr-4 btn btn-block btn-primary" id="searchButton">
                        検索
                        <i class="ml-2 mr-3 fa fa-search "></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="table_card">
        @include('admin.blog.pagination_data')
        </div>
    </div>
  </div>
</div>
<script>

$(document).ready(function() {
    let delete_id;
    let page = 1;
    let count = <?php echo json_encode($count)?>;
    let search_word,author_name;
    let category_query='';
    let public_status,recommended_flag;
    function fetch_data(page,search_word,author_name,category_query,public_status,recommended_flag)
    {
        let url = "/admin/blog/search?page="+page;
        url=url+"&search_word=";
        ( typeof(search_word) ==='undefined'||search_word==='' ) ?  url=url+null : url=url+search_word;
        url=url+"&author_name=";
        ( typeof(author_name) ==='undefined'||author_name==='' ) ?  url=url+null : url=url+author_name;
        url=url+"&public_status=";
        ( typeof(public_status) ==='undefined'||public_status==='' ) ? url=url+null : url+=public_status;
        url=url+"&category_query=";
        ( typeof(category_query) ==='undefined'||category_query==='' ) ? url=url+null : url+=category_query;
        url=url+"&recommended_flag=";
        ( typeof(recommended_flag) ==='undefined'||recommended_flag==='' ) ? url=url+null : url+=recommended_flag;
        $.ajax({
            url: url,
            method:"GET",
            success:function(data){
                $('#table_card').html(data);
                },
            error:function(err){
                console.log(err);
                }
        })
    }
    $('.viewBlog').click(function(e){
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "/news"+'/'+id,
        });
    })
    $('.editBlog').click(function(e){
        var id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "/admin/blog/edit/"+id,
        });
    })
    $('#searchButton').click(function(e){
        var index = 0;
        search_word = $('#search_word').val();
        author_name = $('#author_name').val();
        var selected = new Array();
        $("#category input[type=checkbox]:checked").each(function () {
            selected.push(this.value);
        });
        category_query = selected.toString();        
        $('.form-check-input:checked').each(function(){
            public_status = $(this).val();
        }); 
        $('.recommended_flag:checked').each(function(){
            recommended_flag = $(this).val();
        });
        page = 1;
        fetch_data(page,search_word,author_name,category_query,public_status,recommended_flag)
    })
    $('.form-check-input').click(function(){
        $('.form-check-input').not(this).prop('checked',false);
    })
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page,search_word,author_name,category_query,public_status,recommended_flag);
    });
});
</script>

@endsection


