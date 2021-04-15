@extends('layouts.student')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{$viewed_file->original_file_name}}</h1>
{{--        <form action="{{ route('myproposals.destroy', $viewed_file->id }}" method="POST">--}}
{{--            @method('DELETE')--}}
{{--            @csrf--}}
{{--            <button>Delete User</button>--}}
{{--        </form>--}}
        <form action="{{route('myproposals.destroy', $viewed_file->id)}}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>

    </div>
    </div>

    </div>


@stop
