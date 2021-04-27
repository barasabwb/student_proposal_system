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
        <a class="btn btn-success" href="/admin/approve/{{$file->id}}">Approve and Assign Supervisor</a>
        <br>
        <br>




        <br>
        <form action="{{route('admin.reject', $file->id)}}" method="post">
            @csrf

            <button class="btn btn-danger">Reject</button>
        </form>
        <br>


{{--        <form action="{{route('files.destroy', $file->id)}}" method="post">--}}
{{--            @method('DELETE')--}}
{{--            @csrf--}}
{{--            <button class="btn btn-danger">Delete</button>--}}
{{--        </form>--}}
{{--        <br>--}}
{{--        @if ($message = Session::get('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                <strong>{{ $message }}</strong>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        @if (count($errors) > 0)--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        @if (!$file_revisions->isEmpty())--}}

{{--            @foreach($file_revisions as $rev)--}}

{{--                {{$rev->revision_comment}}--}}
{{--                <br>--}}

{{--            @endforeach--}}

{{--        @else--}}
{{--            <p>No Revisions</p>--}}
{{--        @endif--}}


{{--        <br>--}}

{{--        <button class="btn btn-info" id="formButton">Make a Revision</button>--}}
{{--        <br>--}}
{{--        <br>--}}
{{--        <form id="form1" action="{{route('uploadRevision')}}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <div class="form-group">--}}
{{--                <label for="file">Upload Your Revision</label>--}}
{{--                <input type="file" class="form-control-file" name="file" id="chooseFile">--}}
{{--            </div>--}}
{{--            <input type="text" hidden class="form-control" height="100px" name="file_id" id="file_id" value="{{$file->id}}" >--}}


{{--            <div class="form-group">--}}
{{--                <label for="comment">Revision Comment</label>--}}
{{--                <input type="text" class="form-control" height="100px" name="revision_comment" id="revision_comment" >--}}

{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <button type="submit" name="submit" class="btn btn-primary">--}}
{{--                    Upload Files--}}
{{--                </button>--}}
{{--            </div>--}}

{{--        </form>--}}






    </div>
    </div>

    </div>


@stop
