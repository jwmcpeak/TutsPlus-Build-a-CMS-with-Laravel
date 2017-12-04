@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit {{ $model->name }}</h1>
    <form action="{{ route('users.update', ['user' => $model->id]) }}" method="post">
        {{ method_field('PUT') }}
        {!! csrf_field() !!}

        @foreach ($roles as $role)
        <div class="checkbox">
            <label>
                <input type="checkbox" name="roles[]" 
                    value="{{$role->id}}"
                    {{$model->hasRole($role->name)?'checked':''}} />
                {{$role->name}}
            </label>
        </div>
        @endforeach

        <div class="form-group">
            <input type="submit" class="btn btn-default" value="Submit" />
        </div>

    </form>
</div>


@endsection