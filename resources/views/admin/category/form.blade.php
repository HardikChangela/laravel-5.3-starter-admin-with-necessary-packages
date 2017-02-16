<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">Name <span class="text-danger">*</span></label>
            {!! Form::text('name',null, ['class' => 'form-control']) !!}
            <span class="help-block" id="error_name"><strong>{{ $errors->first('name') }}</strong></span>
        </div>
    </div>

</div>


