@extends('admin.layout.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Profile
                <small>Setting</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/home') }}"><i class="fa fa-user"></i> Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Quick Example</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input id="exampleInputFile" type="file">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Password  Reset</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['route' => 'admin.profile.password', 'method' => 'post']) !!}
                            <div class="box-body">
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label">Password <span class="text-danger">*</span></label>
                                    {!! Form::text('password',null, ['class' => 'form-control']) !!}
                                    <span class="help-block" id="error_password"><strong>{{ $errors->first('password') }}</strong></span>
                                </div>
                                
                               <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                   <label class="control-label">Password Confirmation <span class="text-danger">*</span></label>
                                   {!! Form::text('password_confirmation',null, ['class' => 'form-control']) !!}
                                   <span class="help-block" id="error_password_confirmation"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                               </div>
                                

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </section>

    </div>
@endsection