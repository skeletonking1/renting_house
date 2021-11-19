@extends('admin.layouts.master')

@section('content')
@include('admin.layouts.modal_delete')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->
      <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong id="notify_string"></strong>
      </div>
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h4 class="m-0"><strong>カテゴリ編集</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href='admin/results_amount'>カテゴリ</a></li>
            <li class="breadcrumb-item">カテゴリ編集</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><strong>カテゴリ編集</strong></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label"><strong>カテゴリ名</strong></label>
                        <input type="text" class="col-sm-7 form-control ml-1" name="category" value="{{$category->name}}" id="category">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title"><strong>ステータス</strong></h6>
              </div>
              <div class="card-body">
                <div class=" d-flexs">
                    <button class="btn btn-danger" id="category_delete" style="background-color:white;color:red;border:none">削除する</button>
                    <button  name='save' id='save' class="btn btn-sm btn-primary float-sm-right">更新</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- /.row -->
    </div><!--/.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    const current_category =<?php echo json_encode($category);?>;
    $('#category_delete').click(function(e){
      $('#deleteModal').modal();
      $('#deleteButton').html('<a class="btn btn-danger">削除</a>');
    })
    $('#deleteButton').click(function(e){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "DELETE",
        url: "/admin/blogs/category/delete"+'/'+current_category.id,
        success: function (data) {
            window.location = ('/admin/blogs_category');
        },
        error: function (data) {
            console.log('Error:', data);
        }
      })
    });
    $('#save').click(function(e){
        let name = $('#category').val();
        console.log(name);
        if(name === ''){
          $('#notify_string').html('入力内容でエラーがあります。');
          $('#alert').css({'display':'block','border-left-color':'red','color':'red'});
        }
        else{
          let formdata = new FormData();
          formdata.append('name',name);
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:"POST",
              url: '/admin/blogs/category/update/'+current_category.id,
              data: formdata,
              cache:false,
              contentType:false,
              processData:false,
              success: function (data) {
                  $('#notify_string').html('更新しました。');
                  $('#alert').css({'display':'block','border-left-color':'#00a32a', 'color':'black'});
              },
              error: function (data) {
              }
          });
        }
        
    });
});
</script>
@endsection
