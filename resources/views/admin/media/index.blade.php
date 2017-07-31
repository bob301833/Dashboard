@extends('layouts.admin')


@section('content')
    <h1>Media</h1>

    <form action="/delete/media" method="post" class="form-inline">

        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="delete">Delete</option>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn-primary">
        </div>

        <table class="table">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
                @if($photos)
                    @foreach($photos as $photo)
                        <tr>
                            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                            <td>{{$photo->id}}</td>
                            <td><img height=50 src="{{$photo->file}}" alt=""></td>
                            <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                            <td>
                                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                                
                                    <div class="form-group">
                                        {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
                                    </div>
                                
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    
    </form>
    
@endsection