@extends('admin.layouts.master')

@section('content')
<style>
table.sorting-table {cursor: move;}
table tr.sorting-row td {background-color: #8b8;}
table td.sorter {cursor: move;}
</style>
<div class="content">
    <div id="deleteModal" class="modal fade" role='dialog'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>本当に削除しますか？</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                    <span id= 'deleteButton'></span>
                </div>

            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h4 class="m-0"><strong>金額</strong></h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">金額</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="mt-4 mb-2" id="url_string" style="display: none">
                    <span class="mr-2 font-weight-bold h6">リンク:
                        <span id="created_url"></span>
                    </span>
                    <a id="link_url" class="btn btn-sm btn-default">表示</a>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- alert-->


        <!-- Main content -->
        <div class="container-fluid">
            <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong id="notify_string"></strong>
            </div>
            <div class="card">
                <div class="card-header">
                    <form action="/admin/results_amount" id="form" method="POST">
                        @csrf
                        <div class="form-group row">
                            <input type="text" class="ml-1 mr-3 col-sm-3 form-control" name="type_input" id="type_input">
                            <button id="areaAdd" type="submit" class="btn btn-md" style="border:1px solid;">新規作成</button>
                        </div>
                    </form>
                </div>
                <div class="card-body col-8">
                    @if(count($amounts)>0)
                        <table class="table table-striped table-sm" id="dnd" attr-sample="thetable">
                            <thead>
                            <tr class="row">
                                <th class="col-sm-1"></th>
                                <th class="col-sm-2">ID</th>
                                <th class="col-sm-3">金額</th>
                                <th class="float-right col-sm-6"></th>
                            </tr>
                            </thead>
                            <tbody id="amount_table">
                                @foreach ($amounts as $amount)
                                    <tr class="row" id="{{$amount->id}}">
                                        <td class="col-sm-1 sorter"><i class="fa fa-arrows-alt"></i></td>
                                        <td class="col-sm-2">{{$amount->id}}</td>
                                        <td class="col-sm-3" id="td{{$amount->id}}">{{$amount->type}}</td>
                                        <td class="col-sm-6">
                                            <div class="float-sm-right">
                                            <a href='/admin/results_amount/{{$amount->id}}/edit'>
                                                    <button class="btn btn-info btn-sm editAmount" type="button" data-id="{{$amount->id}}">
                                                        <i class="ml-1 mr-1 fa fa-pencil-alt"></i>編集
                                                    </button>
                                                </a>
                                                <button  class="btn btn-danger btn-sm deleteamount"  data-id="{{$amount->id}}">
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
                            <th class="col-sm-1"></th>
                            <th class="col-sm-2">ID</th>
                            <th class="col-sm-3">金額</th>
                            <th class="float-right col-sm-6"></th>
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
                    <label for="ordersave">項目の順番はドラッグ&ドロップで変更可能です</label>
                    <button id="ordersave" name="ordersave" class="ml-3 btn btn-sm" style="border:1px solid;">並び替えを保存</button>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
  <!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    let delete_id;
    let current_amount;
    $('#form').on('submit',function(e){
        let new_name = $('#type_input').val();
        if(new_name === ''){
            $('#notify_string').html('入力内容でエラーがあります。');
            $('#alert').css('display','block');
            $('#alert').css('border-left-color','red');
            $('#alert').css('color','red');
            e.preventDefault();
        }
    });
    var table = document.getElementById("dnd");
    RowSorter('table[attr-sample=thetable]', {
        handler: 'td.sorter',
        onDragStart: function(tbody, row, index)
        {
        
        },
        onDrop: function(tbody, row, new_index, old_index)
        {
        
        }
    });
    $('#ordersave').click(function(){
        let table_data = $('#amount_table');
        let rows_data = table_data[0].children;
        let rows_array = Array.from(rows_data);
        let order = {}
        const order_list = rows_array.map(row=>{
            return {
                id : Number(row.id),
                order_index : row.rowIndex
            }
        })
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type:'post',
            url:'/admin/results_amount/update/order',
            data:{
                order_list : order_list
            },
            success:function(data){
                $('#notify_string').html('項目の順番を更新しました。');
                $('#alert').css('display','block');
            }
            ,error:function(error){
                console.log(error);
            }
        })
    });
    $('.deleteamount').click(function(e){
        delete_id = $(this).data("id");
        $('#deleteModal').modal();
        $('#deleteButton').html('<a class="btn btn-danger">削除</a>');
    });
    $('#deleteButton').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: "/admin/results_amount"+'/'+delete_id,
            success: function (data) {
                $('.deleteamount').each(function(){
                    var id = $(this).data("id");
                    if(id===delete_id){
                        $(this).parents("tr").remove();
                    }
                })
                $('#deleteModal').modal("hide");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        })
    });
});
</script>

@endsection


