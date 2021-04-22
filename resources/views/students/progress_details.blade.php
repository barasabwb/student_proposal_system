@extends('layouts.student')

@section('content')

    <div class="container-fluid">
{{--        <h1 class="mt-4">{{$details->thesis}}</h1>--}}
        <?php
        $file = \App\students\File::find($details->file_id);
        $supervisor = \App\User::find($details->supervisor_id);
        ?>

        <h3 class="mt-4"><b>File Name:</b>{{$file->original_file_name}}</h3>
        <br>
        <h5><b>Thesis:</b>{{$details->thesis}}</h5>
        <br>


        <h5><b>Description:</b>{{$file->description}}</h5>
        <br>
        <h5><b>Supervisor:</b>{{$supervisor->name}}</h5>
        <br>
        <h5><b>Supervisor:</b>{{$supervisor->email}}</h5>
        <br>
        <h5><b>Supervisor Approval Status:</b>{{$details->supervisor_status}}</h5>
        <br>
        <h5><b>Chairman Approval Status:</b>{{$details->chairman_status}}</h5>
        <br>
        <h5><b>Supervisor Final Comment:</b>{{$details->supervisor_final_comment}}</h5>
        <br>
        <h5><b>Chairman Final Comment:</b>{{$details->chairman_final_comment}}</h5>
        <br>

        <h5></h5>
        <br>
        {{--        <form action="{{ route('myproposals.destroy', $viewed_file->id }}" method="POST">--}}
        {{--            @method('DELETE')--}}
        {{--            @csrf--}}
        {{--            <button>Delete User</button>--}}
        {{--        </form>--}}
{{--        <form action="{{route('myproposals.destroy', $details->id)}}" method="post">--}}
{{--            @method('DELETE')--}}
{{--            @csrf--}}
{{--            <button class="btn btn-danger">Delete</button>--}}
{{--        </form>--}}
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (!$file_revisions->isEmpty())

            @foreach($file_revisions as $rev)

                {{$rev->revision_comment}}

                <button>delete</button>
                <button>download</button>

            @endforeach

        @else
            <p>No Revisions</p>
        @endif


        <br>

        <button class="btn btn-info" id="formButton">Make a Revision</button>
        <br>
        <br>
        <form id="form1" action="{{route('uploadRevision')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="file">Upload Your Revision</label>
                <input type="file" class="form-control-file" name="file" id="chooseFile">
            </div>
            <input type="text" hidden class="form-control" height="100px" name="file_id" id="file_id" value="{{$details->file_id}}" >


            <div class="form-group">
                <label for="comment">Revision Comment</label>
                <input type="text" class="form-control" height="100px" name="revision_comment" id="revision_comment" >

            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">
                    Upload Files
                </button>
            </div>

        </form>






    </div>
    </div>

    </div>


@stop
