@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="pull-left">
                {{ $title }} List
            </h1>
            <span class="pull-right">
                <a href="{{ route($route.'create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> Add new</a>
            </span>
            <p>&nbsp;</p>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('flash')
                    <div class="box box-info">
                        <!-- /.box-header -->
                        <div class="box-body   ">
                            {{--<div class="table-responsive">--}}

                            <table id="datatable1" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th width="50px">Index</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th width="100px">Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach($records as $key => $record)--}}
                                {{--<tr>--}}
                                {{--<td>{{ $record['id'] }}</td>--}}
                                {{--<td>{{ $record['name'] }}</td>--}}
                                {{--<td>{{ $record['created_at']->format('d-m-Y') }}</td>--}}
                                {{--<td>--}}
                                {{--<input class="myswitch" data-toggle="toggle" data-on="Active" data-off="Deactive" data-size="small" type="checkbox" >--}}
                                {{--</td>--}}
                                {{--<td>--}}
                                {{--<a href="{{ route($route.'show',$record['id']) }}"><i class="icon-file-text2"></i> View</a>--}}
                                {{--| <a href="{{ route($route.'edit',$record['id']) }}"><i class="icon-pencil3"></i> Edit</a>--}}
                                {{--| <a href="{{ url('admin/clinic/1') }}" > View </a>--}}
                                {{--</td>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                            {{--</div>--}}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    @endsection

    @section('js')
            <!-- DataTables -->
    <script type="text/javascript">


        $(document).ready(function () {
            var oTable = $('#datatable1').DataTable({
//                responsive: true,
//                autoWidth: false,
                stateSave: true,
                processing: true,
                serverSide: true,
                scrollY: 300,
                ajax: '{{ url('admin/category')  }}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status', searchable: false,orderable : false,className : 'text-center'},
                    {data: 'action', name: 'action', searchable: false, orderable : false,className : 'text-center'},
                ]
            });

            $('#datatable1').on('draw.dt', function () {
                $('.chk_status').each(function () {
                    $(this).bootstrapToggle()
                });
            });
            $("body").on("change", ".chk_status", function () {
                var row_id = $(this).val();
                if ($(this).is(':checked')) {
                    var status = $(this).attr('data-on');     // If checked
                } else {
                    var status = $(this).attr('data-off'); // If not checked
                }

                $.ajax({
                    type: "PUT",
                    url: '{{ url('admin/category') }}/' + row_id ,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": row_id,
                        "status": status,
                    },
                    beforeSend: function () {
                        $('#datatable1').waitMe({effect: 'roundBounce'});
                    },
                    complete: function () {
                        $('#datatable1').waitMe('hide');
                    },
                    error: function (result) {
                    },
                    success: function (result) {
                        //Success Code.
                    }
                });
            });


            $("#datatable1").on('click', '.data-delete', function () {
                var obj = $(this);
                var id = $(this).attr('data-id');

                if (confirm("Are you sure to Delete Data?")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('admin/category')  }}/" + id,
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        beforeSend: function () {
                            $(this).attr('disabled', true);
                            $('.alert .msg-content').html('');
                            $('.alert').hide();
                        },
                        success: function (resp) {
                            oTable.ajax.reload();
                            alert(resp.message);
                        },
                        error: function (e) {
                            alert('Error: ' + e);
                        }
                    });
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            // $('#example1').DataTable();
            $("body").on('change', '.myswitch', function () {
                if ($(this).is(':checked')) {
                    // If checked
                    //alert($(this).val());
                } else {
                    // If not checked
                }
            });

        });

    </script>
@endsection