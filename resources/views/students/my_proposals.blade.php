@extends('layouts.student')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">MY PROPOSALS</h1>
        @if ($my_files==null)
            NOFILES

        @else
        @foreach($my_files as $file)
            {{$file->file_name}}
            <br>

        @endforeach
        @endif

    </div>
    </div>

    </div>


@stop
