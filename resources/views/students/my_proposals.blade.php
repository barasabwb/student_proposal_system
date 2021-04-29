@extends('layouts.student')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">MY PROPOSALS</h1>
        @if ($my_files==null)
            NOFILES

        @else
            <table class="table">
                <thead>
                <tr><th scope="col">Thesis</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Revisions</th>
                    <th scope="col">Approval Status</th>
                    <th scope="col">Date Uploaded</th>
                </tr>
                </thead>
                <tbody>
        @foreach($my_files as $file)
            <tr>
                <th scope="row">  {{$file->thesis}}</th>
                <td>{{$file->original_file_name}}</td>
                <td>{{$file->revisions}}</td>
                <td>{{$file->approval}}</td>
                <td>{{$file->created_at}}</td>
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
