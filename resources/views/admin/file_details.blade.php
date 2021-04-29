@extends('layouts.admin')

@section('content')



    <div class="container-fluid">
        <h3 class="mt-4"><b>File Name:</b>{{$file->original_file_name}}</h3>
        <br>
        <h5><b>Thesis:</b>{{$file->thesis}}</h5>
        <br>

        <h5><b>Username:</b>{{$file->username}}</h5>
        <br>
        <h5><b>Description:</b>{{$file->description}}</h5>
        <br>
        <h5><b>Approval:</b>{{$file->approval}}</h5>
        <br>
        <h5></h5>
        <br>

{{--        <form action="{{ route('myproposals.destroy', $viewed_file->id }}" method="POST">--}}
{{--            @method('DELETE')--}}
{{--            @csrf--}}
{{--            <button>Delete User</button>--}}
{{--        </form>--}}

        <form action="{{route('admin.download',$file->id)}}" method="post">
            @csrf

            <button class="btn btn-info">Download<i class="fa fa-download" aria-hidden="true"></i>
            </button>
        </form>
        <br>





        <br>
        @if ($file->approval=="rejected"||$file->approval=="accepted")


        @else
            <br>
            <a class="btn btn-success" href="/admin/approve/{{$file->id}}">Approve and Assign Supervisor</a>
            <br>
            <br>
            <form action="{{route('admin.reject', $file->id)}}" method="post">
                @csrf

                <button class="btn btn-danger">Reject</button>
            </form>
            <br>

        @endif





    </div>
    </div>

    </div>


@stop
