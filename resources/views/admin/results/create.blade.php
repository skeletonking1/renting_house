@extends('admin.layouts.master')

@section('content')

<style>

  #eyecatch_image {
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
  .dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  width: inherit;
  display: flex;
  height: 70px;
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
          <h4 class="m-0"><strong>施工実績登録</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">施工実績登録</li>
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
          <strong id="notify_string"></strong>
      </div>
      <form id="resultsform" action="javascript:void(0)" enctype="multipart/form-data">
      @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">タイトル</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="text" name="title" class="form-control form-control-lg" id="title" placeholder="">
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>施工実績登録</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                    <label for="firstview" class="col-sm-4 col-form-label">画像(ファーストビュー)</label>
                    <div class="dropzone-wrapper col-sm-7 ml-1">
                        <div class="dropzone-desc">
                          <i class="fa fa-cloud-upload-alt"></i>
                          <span id="firstview_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                          <button id="firstview_upload_button">ファイルを選捉</button>
                        </div>
                        <input type="file" name="firstview" id="firstview_dropzone" class="dropzone">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="instructor_name" class="col-sm-4 col-form-label">導入者氏名</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="instructor_name" id="instructor_name">
                </div>
                <div class="form-group row">
                  <label for="instruction_summary" class="col-sm-4 col-form-label">導入の背景（要約）</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="instruction_summary" id="instruction_summary">
                </div>
                <div class="form-group row">
                  <label for="instruction_effects" class="col-sm-4 col-form-label">導入後の効果(要約)</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="instruction_effects" id="instruction_effects">
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>導入の背景</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="instruction_details" class="col-sm-4 col-form-label">導入の背景（詳細•テキスト）</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="instruction_details" id="instruction_details">
                </div>
                <div class="form-group row">
                    <label for="instructioin_bg" class="col-sm-4 col-form-label">画像(ファーストビュー)</label>
                    <div class="dropzone-wrapper col-sm-7 ml-1">
                        <div class="dropzone-desc">
                          <i class="fa fa-cloud-upload-alt"></i>
                          <span id="instruction_bg_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                          <button id="instruction_bg_upload_button">ファイルを選捉</button>
                        </div>
                        <input type="file" name="instruction_bg" id="instruction_bg_dropzone" class="dropzone">
                    </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>選んだ理由</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="choosing_reason" class="col-sm-4 col-form-label">選んだ理由（詳細•テキスト）</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="choosing_reason" id="choosing_reason">
                </div>
                <div class="form-group row">
                    <label for="choosing_reason" class="col-sm-4 col-form-label">選んだ理由（詳細•画像）</label>
                    <div class="dropzone-wrapper col-sm-7 ml-1">
                        <div class="dropzone-desc">
                          <i class="fa fa-cloud-upload-alt"></i>
                          <span id="choosing_reason_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                          <button id="choosing_reason_upload_button">ファイルを選捉</button>
                        </div>
                        <input type="file" name="choosing_reason_file" id="choosing_reason_dropzone" class="dropzone">
                    </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>導入後の効果</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="post_introduction_details" class="col-sm-4 col-form-label">導入後の効果（詳細•テキスト）</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="post_introduction_details" id="post_introduction_details">
                </div>
                <div class="form-group row">
                    <label for="pi_image" class="col-sm-4 col-form-label">導入後の効果（詳細•画像）</label>
                    <div class="dropzone-wrapper col-sm-7 ml-1">
                        <div class="dropzone-desc">
                          <i class="fa fa-cloud-upload-alt"></i>
                          <span id="pi_image_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                          <button id="pi_upload_button">ファイルを選捉</button>
                        </div>
                        <input type="file" name="pi_image" id="pi_image_dropzone" class="dropzone">
                    </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>今後の展望</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="future_outlook_details" class="col-sm-4 col-form-label">今後の展望（詳細•テキスト）</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="future_outlook_details" id="future_outlook_details">
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">資料ダウンロード</label>
                  <div class="custom-file col-sm-7 ml-1">
                      <input type="file" class="custom-file-input" id="download_material" name="download_material">
                      <label class="custom-file-label" id="download_material_url" for="download_material">資料をアップロード</label>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="url" class="col-sm-4 col-form-label">URL</label>
                  <input type="text" class="col-sm-7 form-control ml-1" name="url" id="url">
                </div>
              </div>
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
                  <button type="submit" name='save' id='save' class="btn btn-sm btn-primary">公開</button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                  <h6 class="card-title">地域</h6>
              </div>
              <div class="card-body">
                @foreach ($areas as $area)
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="area" value="{{$area->id}}">
                    <label class="form-check-label" for="area">
                    {{$area->name}}
                  </div>
                @endforeach
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">金額</h6>
              </div>
              <div class="card-body">
                @foreach ($amounts as $amount)
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="amount" value="{{$amount->id}}">
                    <label class="form-check-label" for="amu$amount">
                    {{$amount->type}}
                  </div>
                @endforeach
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                  <h6 class="card-title">間取り</h6>
              </div>
              <div class="card-body">
                @foreach ($housetypes as $housetype)
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="housetype" value="{{$housetype->id}}">
                    <label class="form-check-label" for="housetype">
                    {{$housetype->type}}
                  </div>
                @endforeach
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                  <h6 class="card-title">アイキャッチ画像</h6>
              </div>
              <div class="card-body">
                  <label for="eyecatch_image" id="preview">アイキャッチ画像を設定</label>
                  <input type="file" name ="eyecatch_image" id="eyecatch_image">
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
</div>
<script>
  $(document).ready(function() {
    let current_id;
    let update_flag = false;
    let validation_flag = true;
    var current_date = new Date();
    var current_year = String(current_date.getFullYear());
    var current_month = current_date.getMonth() + 1;
    current_month<10?current_month = '0' + String(current_month) : current_month = String(current_month);
    var current_day = current_date.getDate();
    current_day<10?current_day = '0' + String(current_day) : current_day = String(current_day);
    let created_at = current_year + '/' + current_month + '/' + current_day;
    $('#created_at').html(created_at);
    $('#updated_at').html(created_at);
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
    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    $("#eyecatch_image").change(function () {
      imagePreview(this);
    });
    $('#resultsform').on('submit',function(e){
      let validation_flag = true;
      $('#alert').css('display','none');
      if($('#title').val()==='')
      {
        $('#title').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#title').css('border-color','');
      }
      if($('#instructor_name').val()===''){
        $('#instructor_name').css('border-color','red')
        validation_flag = false;
      }
      else{
        $('#instructor_name').css('border-color','');
      }
      if($('#instruction_summary').val()===''){
        $('#instruction_summary').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#instruction_summary').css('border-color','');
      }
      if($('#instruction_effects').val()===''){
        $('#instruction_effects').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#instruction_effects').css('border-color','');
      }
      if($('#instruction_details').val()===''){
        $('#instruction_details').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#instruction_details').css('border-color','');
      }
      if($('#choosing_reason').val()===''){
        $('#choosing_reason').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#choosing_reason').css('border-color','');
      }
      if($('#post_introduction_details').val()===''){
        $('#post_introduction_details').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#post_introduction_details').css('border-color','');
      }
      if($('#future_outlook_details').val()===''){
        $('#future_outlook_details').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#future_outlook_details').css('border-color','');
      }
      if($('#url').val()===''){
        $('#url').css('border-color','red');
        validation_flag = false;
      }
      else{
        $('#url').css('border-color','');
      }
      if(validation_flag){
        if(update_flag){
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          e.preventDefault();
          var formData = new FormData(this);
          type = 'post';
          $.ajax({
            type: type,
            url: '/admin/results/update/'+current_id,
            data: formData,
            cache:false,
            contentType:false,
            processData:false,
            success: function (data) {
              console.log(data);
              if(data.success){
                $('#notify_string').html('更新しました。');
                $('#alert').css({'display':'block','border-left-color':'#00a32a', 'color':'black'});
                // $('#created_url').html('http://localhost:8000/results/'+data.id);
                // $('#url_string').css('display','block');
                // $('#link_url').attr('href','http://localhost:8000/blog/'+data.id).css('display','inline');
                update_flag = true;
              }
            },
            error: function (data) {
              console.log('Error:', data);
            }
          });
        }
        else{
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          e.preventDefault();
          var formData = new FormData(this);
          type = 'post';
          $.ajax({
            type: type,
            url: '/admin/results',
            data: formData,
            cache:false,
            contentType:false,
            processData:false,
            success: function (data) {
              console.log(data);
              if(data.success){
                $('#notify_string').html('追加しました。');
                $('#alert').css({'display':'block','border-left-color':'#00a32a', 'color':'black'});
                $('#created_url').html(data.url);
                $('#url_string').css('display','block');
                $('#link_url').attr('href',data.url).css('display','inline');
                $('#save').html('更新');
                update_flag = true;
                current_id = data.id;
                $('#save').html('更新');
              }
            },
            error: function (data) {
              console.log('Error:', data);
            }
          });
        }
      }
      else{
        $('#notify_string').html('入力内容でエラーがあります。');
        $('#alert').css('display','block');
        $('#alert').css('border-left-color','red');
        $('#alert').css('color','red');
      }
    })
    $("#firstview_dropzone").change(function() {
        $('#firstview_url').html(upload_files_list(this));
        $('#firstview_upload_button').css('display','none');
    });
     $("#instruction_bg_dropzone").change(function() {
        $('#instruction_bg_url').html(upload_files_list(this));
        $('#instruction_bg_upload_button').css('display','none');
    });
    $("#choosing_reason_dropzone").change(function() {
        $('#choosing_reason_url').html(upload_files_list(this));
        $('#choosing_reason_upload_button').css('display','none');
    });
    $("#pi_image_dropzone").change(function() {
        $('#pi_image_url').html(upload_files_list(this));
        $('#pi_upload_button').css('display','none');
    });
    $('#download_material').change(function(){
        $('#download_material_url').html(upload_files_list(this));
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


