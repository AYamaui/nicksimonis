@extends('admin')
@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Series</div>
    <div class="panel-body">
        <table class="table table-striped table-condensed table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Photos</th>
                    <th>Thumbnail</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($series as $serie)
                <tr>
                    <td>{{$serie->title}}</td>
                    <td>{{$serie->description}}</td>
                    <td>{{$serie->photos()->count()}}</td>
                    <td>{!!HTML::image($serie->thumbnail_source)!!}</td>
                    <td><a href="{{url('admin/series/delete/'.$serie->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                {!!HTML::link('admin/series/pullflickr/all',"Fetch All", ['class'=>'btn btn-primary'])!!}
                {!!HTML::link('admin/series/pullflickr/update',"Update Existing", ['class'=>'btn btn-primary'])!!}
            </div>
        </div>
    </div>
</div>
@endsection
