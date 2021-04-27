@extends('layouts.chairman')

@section('content')

    <div class="container-fluid">
{{--        <h1 class="mt-4">{{$details->thesis}}</h1>--}}
        <?php
        $file = \App\students\File::find($details->file_id);
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
            <h5>Final Revision</h5>
            <br>
        {{$file->revisions}}
            <br>
            {{$final_revision->revision_name}}
            <br>
            <button>Download Final Revision</button>



        @else
            <p>No Revisions</p>
            <br>
            <button>Download Document</button>
        @endif



        <br>
        <br>
{{--        @if (!$comments->isEmpty())--}}

{{--            @foreach($comments as $com)--}}

{{--                {{$com->comment}}--}}

{{--            @if (auth()->user()->id==$com->supervisor_id)--}}
{{--                    <button>delete</button>--}}
{{--                    <button><i class="fa fa-pencil-square-o"></i>edit</button>--}}


{{--            @endif--}}



{{--            @endforeach--}}

{{--        @else--}}
{{--            <p>No Comments</p>--}}
{{--        @endif--}}
        <br>



        <br>
        <a href="{{route('chairman.finalizeForm',$details->id)}}" class="btn btn-info">Finalize</a>





    </div>
    </div>

    </div>


@stop
