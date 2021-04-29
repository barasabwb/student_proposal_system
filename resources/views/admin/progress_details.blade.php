@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        {{--        <h1 class="mt-4">{{$details->thesis}}</h1>--}}
        <?php
        $file = \App\students\File::find($details->file_id);
        $supervisor = \App\User::find($details->supervisor_id);
        $student = \App\User::find($details->student_id);
        ?>

        <h3 class="mt-4"><b>File Name:</b>{{$file->original_file_name}}</h3>
        <br>
        <h5><b>Thesis:</b>{{$details->thesis}}</h5>
        <br>


        <h5><b>Description:</b>{{$file->description}}</h5>
        <br>
        <h5><b>Student:</b>{{$student->name}}</h5>
        <br>
        <h5><b>Student Email:</b>{{$student->email}}</h5>
        <br>
        <h5><b>Supervisor:</b>{{$supervisor->name}}</h5>
        <br>
        <h5><b>Supervisor Email:</b>{{$supervisor->email}}</h5>
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
        <form action="{{route('admin.download',$details->file_id)}}" method="post">
            @csrf

            <button class="btn btn-info">Download Original<i class="fa fa-download" aria-hidden="true"></i>
            </button>
        </form>
        <br>

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


                <form action="{{route('admin.downloadRevision',$rev->id)}}" method="post">
                    @csrf

                    <button class="btn btn-info">Download Revision<i class="fa fa-download" aria-hidden="true"></i>
                    </button>
                </form>

            @endforeach

        @else
            <p>No Revisions</p>
        @endif


        <br>






    </div>
    </div>

    </div>


@stop
