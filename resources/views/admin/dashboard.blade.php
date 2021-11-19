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
          <h4 class="m-0"><strong>DashBoard</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">DashBoard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- alert-->


  <!-- Main content -->

  <div class="content">

    <div class="container-fluid">
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

@endsection


