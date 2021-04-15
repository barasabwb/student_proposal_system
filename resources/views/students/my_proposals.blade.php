@extends('layouts.student')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">MY PROPOSALS</h1>
        @if ($my_files==null)
            NOFILES

        @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">File</th>
                    <th scope="col">Revision</th>

                </tr>
                </thead>
                <tbody>
        @foreach($my_files as $file)
            <tr>
                <th scope="row">  {{$file->original_file_name}}</th>
                <td>{{$file->file_name}}</td>
                <td>{{$file->revision}}</td>
                <td>
                    <a href="/students/myproposals/{{$file->id}}" class="btn btn-outline-info">
                        View
                    </a>
                </td>
            </tr>


        @endforeach
                </tbody>
            </table>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif





    </div>
    </div>

    </div>


@stop
