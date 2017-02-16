@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 class="pull-left">
                {{ $title }} Form
            </h1>
            <p>&nbsp;</p>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @if(!empty($record))
                        {!! Form::model($record, ['route' => [$route.'update',$record->id],'id'=>'myform', 'method' => 'patch', 'class' => 'ajax_submit']) !!}
                    @else
                        {!! Form::open(['url' => route($route.'store'), 'method' => 'post','id'=>'myform' ,'class' => 'ajax_submit']) !!}
                    @endif
                    <div class="box box-primary">
                        <div class="box-header with-border ">
                            <h3 class="box-title">Enter Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('admin.category.form')
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{ route($route.'index') }}" type="submit"
                               class="btn btn-default pull-left">Back</a>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                            <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

