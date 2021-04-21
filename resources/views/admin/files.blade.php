@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Submitted Documents</h1>
        @if ($files==null)
            NOFILES

        @else
            <table class="table">
                <thead>
                <tr><th scope="col">Thesis</th>
                    <th scope="col">File Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Approval Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <th scope="row">  {{$file->thesis}}</th>
                        <td>{{$file->original_file_name}}</td>
                        <td>{{$file->username}}</td>
                        <td>{{$file->approval}}</td>

                        <td>
                            <a href="/admin/files/{{$file->id}}" class="btn btn-outline-info">
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
