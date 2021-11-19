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
.custom-file-input:lang(en) ~ .custom-file-label::after {
  content: "参照";
}
.custom-file-label::after {
  content: "参照";
}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h4 class="m-0"><strong>商品住宅編集</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">商品住宅編集</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="mt-4 mb-2" id="url_string" style="display: none">
        <span class="mr-2 font-weight-bold h6">リンク:
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
            <strong>更新しました。</strong>
        </div>
        <form id="housingform" action="javascript:void(0)" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-9">

            <div class="card">
              <div class="card-header">
                <h5 class="card-title">タイトル</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="text" name="title" value="{{$housing->title}}" class="form-control form-control-lg" id="title" placeholder="">
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><strong>商品住宅登録</strong></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">動画（ファーストビュー）</label>
                        <div class="ml-1 custom-file col-sm-7">
                            <input type="file" class="custom-file-input" id="video_file" name="video_file">
                            <label class="custom-file-label" id="video_file_url" for="video_file">動画をアップロード</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ow_image" class="col-sm-4 col-form-label">画像（圧倒的なデザイン）<br>
                        <small>※3枚までアップロード可能</small></label>
                        <div class="ml-1 dropzone-wrapper col-sm-7">
                            <div class="dropzone-desc">
                              <i class="fa fa-cloud-upload-alt"></i>
                              <span id="ow_image_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                              <button id="ow_image_upload_button">ファイルを選捉</button>
                            </div>
                            <input type="file" name="ow_images[]" id="ow_dropzone" class="dropzone" multiple="multiple">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="book" class="col-sm-4 col-form-label">本文（圧倒的なデザイン）</label>
                        <textarea rows="4" id="book" name="book" class="ml-1 col-sm-7 form-control" ></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="gallery_image_upload" class="col-sm-4 col-form-label">画像(GALLERY)<br>
                            <small>※制限なし</small></label>
                        <div class="ml-1 dropzone-wrapper col-sm-7">
                            <div class="dropzone-desc">
                              <i class="fa fa-cloud-upload-alt"></i>
                              <span id="gallery_image_url">画像をドラッグ&ドロップまたは</span>
                              <button id="gallery_image_upload_button">ファイルを選捉</button>
                            </div>
                            <input type="file" name="gallery_images[]" class="dropzone" id="gallery_dropzone" multiple>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">動画（ファーストビュー）</label>
                        <div class="ml-1 custom-file col-sm-7">
                            <input type="file" class="custom-file-input" id="voice_file" name="voice_file">
                            <label class="custom-file-label" id="voice_file_url" for="voice_file">動画をアップロード</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url_input" class="col-sm-4 col-form-label">URL</label>
                        <input type="text" class="ml-1 col-sm-7 form-control" name="url_input" id="url_input">
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
                  <label class="mt-1 mb-0 text-sm font-weight-normal">公開状態</label>
                  <select name="public_status" id="public_status" class="p-1 form-control col-3 form-control-sm">
                    <option value="1">公開</option>
                    <option value="0">非公開</option>
                  </select>
                </div>
                <div class="mt-4 text-sm">公開日:<span id="created_at"></span></div>
                <div class="mt-2 text-sm">更新日:<span id="updated_at"></span></div>
                <div class="mt-3 d-flex justify-content-end">
                  <button type="submit" name='post_save' id='post_save' class="btn btn-sm btn-primary">更新</button>
                </div>
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
    
    let housing = <?php echo json_encode($housing)?>;

    $('#video_file_url').html(housing.video_url);
    $('#ow_image_url').html(housing.ow_image_urls);
    $('#ow_image_upload_button').css('display','none');
    $('#book').html(housing.book);
    $('#gallery_image_url').html(housing.gallery_image_urls);
    $('#gallery_image_upload_button').css('display','none');
    $('#voice_file_url').html(housing.voice_url);
    $('#url_input').val(housing.url);
    $('#public_status').val(housing.public_status);
    $('#preview').html('<img src="'+housing.featured_image_url+'"/>');
    var created_at = housing.created_at.substr(0,10);
    var updated_at = housing.updated_at.substr(0,10);
    $('#created_at').html(created_at);
    $('#updated_at').html(updated_at);
    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    function upload_files_list(input) {
        let list_string = '';
        let temp_index = 0;
        for(file of input.files){
            if(temp_index>0){
                list_string = list_string +','+file.name;
            }
            else{
                list_string = file.name;
            }
            temp_index++;
        }
        return list_string;
    }
    $("#featured_image").change(function () {
      imagePreview(this);
    });
    $('#title').change(function(event){
        title = event.target.value;
    })
    $('#housingform').on('submit',function(e){
      $('#alert').css('display','none');      
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      e.preventDefault();
      var formData = new FormData(this);
      type = 'post';
      var current_date = new Date();
      var current_year = String(current_date.getFullYear());
      var current_month = current_date.getMonth() + 1;
      current_month<10?current_month = '0' + String(current_month) : current_month = String(current_month);
      var current_day = current_date.getDate();
      current_day<10?current_day = '0' + String(current_day) : current_day = String(current_day);
      let created_at = current_year + '/' + current_month + '/' + current_day;
      $('#created_at').html(created_at);
      $('#updated_at').html(created_at);
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: type,
        url: '/admin/housing/update/'+housing.id,
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success: function (data) {
          if(data.success){
              $('#alert').css('display','block');
              $('#created_url').html(data.url);
              $('#url_string').css('display','block');
              $('#link_url').attr('href',data.url).css('display','inline');
          }
          },
            error: function (data) {
                console.log('Error:', data);
            }
          });
    })

    $("#ow_dropzone").change(function() {
        $('#ow_image_url').html(upload_files_list(this));
        $('#ow_image_upload_button').css('display','none');
    });
     $("#gallery_dropzone").change(function() {
        $('#gallery_image_url').html(upload_files_list(this));
        $('#gallery_image_upload_button').css('display','none');
    });
    $('#voice_file').change(function(){
        $('#voice_file_url').html(upload_files_list(this));
    });
    $('#video_file').change(function(){
        $('#video_file_url').html(upload_files_list(this));
    })
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


