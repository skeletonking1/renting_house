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
          <h4 class="m-0"><strong>お知らせ一覧</strong></h4>
        </div>
        <div class="col-sm-3">
          <a href="/admin/news/create" class="btn btn-primary">
            新規追加
          </a>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">お知らせ一覧</li>
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
          <strong>検索</strong>
        </div>
        <div class="card-body">
          <form id="search_form" action="javascript:void(0)">
            <div class="form-group row">
              <label for="search_word" class="col-sm-2 col-form-label">フリーワード</label>
              <input type="text" class="ml-1 col-sm-4 form-control" name="search_word" id="search_word">
            </div>
            <div class="form-group row">
              <label for="check_type" class="col-sm-2 col-form-label">公開状態</label>
              <div class="ml-1 form-check form-check-inline" name="check_type">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="state" value="1">
                <label class="form-check-label" for="inlineCheckbox1">公開</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="state" value="0">
                <label class="form-check-label" for="inlineCheckbox2">非公開</label>
              </div>
            </div>
            <div class="form-group row ">
              <div class="mx-auto ">
                <button class="px-5 pl-2 pr-4 btn btn-block btn-primary" type="submit">
                  検索
                  <i class="ml-2 mr-3 fa fa-search "></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card" id="table_card">
        @include('admin.news.pagination_data')
      </div>

    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  function fetch_data(page, search_word, state) {
    if (search_word === undefined || search_word === '') {
      search_word = null;
    }
    if (state === undefined || state === '') {
      state = null;
    }
    $.ajax({
      url: "/admin/news/show?page=" + page + "&search_word=" + search_word + "&state=" + state,
      method: "GET",
      success: function(data) {
        $('#table_card').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    })
  }
  let search_word = null;
  let state = null;
  $('.viewPost').click(function(e) {
    var id = $(this).data("id");
    $.ajax({
      type: "GET",
      url: "/news" + '/' + id,
    });
  })
  $('.form-check-input').click(function() {
    $('.form-check-input').not(this).prop('checked', false);
  })
  $('#search_form').on('submit', function() {
    let formData = new FormData(this);
    search_word = formData.get('search_word');
    state = formData.get('state');
    page = 1;
    fetch_data(page, search_word, state);
  })
  $(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var test = $(this).attr('href');
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page, search_word, state);
  });
});
let delete_id = 0;
let count = 0;
</script>

@endsection