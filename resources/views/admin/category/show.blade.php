@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="pull-left">
                {{ $title }} Details
            </h1>
            <p>&nbsp;</p>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="30%">Name</th>
                                    <td width="70%">{{ $record['name'] }}</td>
                                </tr>

                                <tr>
                                    <th width="30%">Status</th>
                                    <td width="70%">{{ $record['status'] }}</td>
                                </tr>

                                </thead>

                            </table>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="{{ route($route.'index') }}" type="submit" class="btn btn-default pull-left">Back</a>
                        </div>
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
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#example1').DataTable();
        });
    </script>
@endsection