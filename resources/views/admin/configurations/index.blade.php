@extends('admin')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Configuration</div>
    <div class="panel-body">
        {!!Form::open(['url'=>'admin/configurations'])!!}
        <div class="row">
            @foreach($configurations as $configuration)
            <div class="col-md-4 form-group">
                {!!Form::label($configuration->variable, $configuration->variable, ['class'=>'control-label'])!!}
                {!!Form::text($configuration->variable, $configuration->value, ['class'=>'form-control'])!!}
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {!!Form::submit('Save',['class'=>'btn btn-primary'])!!}
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection
