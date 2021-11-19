@extends('admin.layouts.master')

@section('content')

<style>

  #featured_image {
    opacity: 0;
    position: absolute;
    z-index: -1;
    display: none;
  }
  #author_image {
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
  #author_img_preview {
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
  .dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  width: inherit;
  display: flex;
  height: 70px;
  border-radius: 2px;
}
#author_image_upload_button{
    border: 1px solid;
    border-radius: 2px;
}

.dropzone-desc {
  margin: auto;
  font-size: 16px;
}

.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}

.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}

.preview-zone {
  text-align: center;
}

.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h4 class="m-0"><strong>ブログ新規追加</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">お知らせ新規追加</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="mt-4 mb-2" id="url_string" style="display: none">
        <span class="font-weight-bold mr-2 h6">リンク:
            <span id="created_url">
            </span>
        </span>
        <a id="link_url" class="btn btn-sm btn-default">表示</a>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- alert-->


  <!-- Main content -->

  <div class="content">

    <div class="container-fluid">
        <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>追加しました。</strong>
        </div>
        <form id="blogform" action="javascript:void(0)" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-9">

            <div class="card">
              <div class="card-header">
                <h5 class="card-title">タイトル</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="text" name="title" value="{{$blog->title}}" class="form-control form-control-lg" id="title" placeholder="">
              </div>
              <!-- /.card-body -->
            </div>
            <textarea id="summernote" name="content"></textarea>
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><strong>著者情報</strong></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label for="author_name" class="col-sm-3 col-form-label">著者名</label>
                        <input type="text" class="col-sm-7 form-control ml-1" value="{{$blog->author_name}}" name="author_name" id="author_name">
                    </div>
                    <div class="form-group row">
                        <label for="author_profile" class="col-sm-3 col-form-label">著者プロフィール</label>
                        <textarea rows="4" id="author_profile"  name="author_profile" class="col-sm-7 form-control ml-1" ></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="author_image" id="author_image_preview" class="col-sm-3 col-form-label">著者プロフィール画像</label>
                        <div class="dropzone-wrapper col-sm-7 ml-1">
                            <div class="dropzone-desc">
                              <i class="fa fa-cloud-upload-alt"></i>
                              <span id="author_image_url"></span>
                              <button id="author_image_upload_button">ファイルを選捉</button>
                            </div>
                            <input type="file" name="author_image" class="dropzone">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
          <div class="col-sm-3">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">ステータス</h6>
              </div>
              <div class="card-body">
                <div class="form-group d-flex justify-content-between align-content-end">
                  <label class="font-weight-normal mb-0 text-sm mt-1">公開状態</label>
                  <select name="public_status" id="public_status" class="form-control col-3 form-control-sm p-1">
                    <option value="1">公開</option>
                    <option value="0">非公開</option>
                  </select>
                </div>
                <div class="mt-4 text-sm">公開日:<span id="created_at"></span></div>
                <div class="mt-2 text-sm">更新日:<span id="updated_at"></span></div>
                <div class="mt-3 d-flex justify-content-end">
                  <button type="submit" name='post_save' id='post_save' class="btn btn-sm btn-primary">公開</button>
                </div>
              </div>
            </div>
            <div class="card">
                <div class="card-header">
                  <h6 class="card-title"><strong>カテゴリ</strong></h6>
                </div>
                <div class="card-body">
                     <div class="form-group row">
                        @foreach ($categories as $category)
                        <div class="form-check form-check-inline  ml-1" name="check_type">
                            <input class="category_check" type="checkbox" id="{{$category->id}}" name="category"  value="{{$category->id}}">
                            <label class="form-check-label">{{$category->name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                  <h6 class="card-title"><strong>おすすめ</strong></h6>
                </div>
                <div class="card-body">
                    <input type="checkbox" checked="{{$blog->recommended_flag}}" name="recommended_flag" id="recommended_flag">おすすめに登録する
                </div>
            </div>
            <div class="card">
            <div class="card-header">
                <h6 class="card-title">アイキャッチ画像</h6>
            </div>
            <div class="card-body">
                <label for="featured_image" id="preview">アイキャッチ画像を設定</label>
                <input type="file" name ="featured_image" id="featured_image">
            </div>
            </div>
          </div>
        </div>
      </form>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    let validation_flag = true;
    $('#summernote').summernote({
      height: 450,
    });
    blog = <?php echo json_encode($blog)?>;
    $('#summernote').summernote('pasteHTML',blog.content);
    $('#preview').html('<img src="'+blog.featured_image_url+'"/>');
    $('#public_status').val(blog.public_status);
    var created_at = blog.created_at.substr(0,10);
    var updated_at = blog.updated_at.substr(0,10);
    $('#created_at').html(created_at);
    $('#updated_at').html(updated_at);
    $('#author_profile').html(blog.author_profile);
    $('#author_image_url').html(blog.author_image_url);
    var blog_id = blog.id;
    $("input[name=category][value=" + blog.category + "]").prop('checked', true);
    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    $("#featured_image").change(function () {
      imagePreview(this);
    });
    $('#blogform').on('submit',function(e){
      $('#alert').css('display','none');
      if($('#title').val()==='')
      {
        $('#title').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#title').css('border-color','');
      }
      if($('#author_name').val()===''){
        $('#author_name').css('border-color','red')
        validation_flag = false;
      }
      else{
        $('#author_name').css('border-color','');
      }
      if($('#author_profile').val()===''){
        $('#author_profile').css('border-color','red');

        validation_flag = false;
      }
      else{
        $('#author_profile').css('border-color','');
      }
      if($('#summernote').summernote('code')==='<p><br></p>') {
        $('.note-editor').css('border-color','red');
        validation_flag=false;
      }
      else{
        $('.note-editor').css('border-color','');
      }
      if(validation_flag){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: '/admin/blogs/update/'+blog_id,
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success: function (data) {
                if(data.success){
                  console.log(data.success);
                  $('#notify_string').html('更新しました。');
                  $('#alert').css({'display':'block','border-left-color':'#00a32a', 'color':'black'});
                    var current_date = new Date();
                    var current_year = String(current_date.getFullYear());
                    var current_month = current_date.getMonth() + 1;
                    current_month<10?current_month = '0' + String(current_month) : current_month = String(current_month);
                    var current_day = current_date.getDate();
                    current_day<10?current_day = '0' + String(current_day) : current_day = String(current_day);
                    let updated_at = current_year + '/' + current_month + '/' + current_day;
                    $('#updated_at').html(updated_at);
                }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
        });
      }
      else{
        $('#notify_string').html('入力内容でエラーがあります。');
        $('#alert').css('display','block');
        $('#alert').css('border-left-color','red');
        $('#alert').css('color','red');
      }
    })
    function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        };
        $('#author_image_url').html(input.files[0].name);
        reader.readAsDataURL(input.files[0]);
    }
    }
    $('.category_check').click(function(){
            $('.category_check').not(this).prop('checked',false);
        });

    $(".dropzone").change(function() {
        readFile(this);
    });

    $('.dropzone-wrapper').on('dragover', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });

    $('.dropzone-wrapper').on('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });
});
</script>

@endsection


