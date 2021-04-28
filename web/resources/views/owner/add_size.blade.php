<div class="row no-gutters form-group size_child">
    <div class="col-6 col-md-2">
        <div class="form-group {!! $errors->has('size') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::number('size', old('size'), [ 'class' => 'form-control',  'placeholder' => 'Size in sft']) !!}
                {!! $errors->first('condition', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group {!! $errors->has('bedroom') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('bedroom', ['1','2','3'],null,array('class'=>'form-control', 'placeholder'=>'Bedroom')) !!}
                {!! $errors->first('bedroom', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group {!! $errors->has('bathroom') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::select('bathroom', ['1','2','3'],null,array('class'=>'form-control', 'placeholder'=>'Bathroom')) !!}
                {!! $errors->first('bathroom', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="form-group {!! $errors->has('price') ? 'error' : '' !!}">
            <div class="controls">
                {!! Form::number('price', old('price'), [ 'class' => 'form-control',  'placeholder' => 'Price']) !!}
                {!! $errors->first('price', '<label class="help-block text-danger">:message</label>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <button class="del_btn btn btn-danger btn-xs">✕</button>
    </div>
</div>
