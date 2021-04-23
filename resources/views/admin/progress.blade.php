@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Approved</h1>
        @if ($accepted==null)
            NOFILES

        @else
            <table class="table">
                <thead>
                <tr><th scope="col">Thesis</th>
                    <th scope="col">File Name</th>
                    <th scope="col">Student</th>
                    <th scope="col">Supervisor</th>
                    <th scope="col">Supervisor Status</th>
                    <th scope="col">Chairman Status</th>
                    <th scope="col">Admin Approval Date</th>


                </tr>
                </thead>
                <tbody>
                @foreach($accepted as $file)
                    <?php
                    $supervisor = \App\User::find($file->supervisor_id);
                    $student = \App\User::find($file->student_id);
                    $uploaded_file=\App\students\File::find($file->file_id);

                    ?>
                    <tr>
                        <th scope="row">  {{$file->thesis}}</th>
                        <td>{{$uploaded_file->original_file_name}}</td>
                        <td>{{$student->username}}</td>
                        <td>{{$supervisor->username}}</td>
                        <td>{{$file->supervisor_status}}</td>
                        <td>{{$file->chairman_status}}</td>
                        <td>{{$file->created_at}}</td>


                        <td>
                            <a href="/admin/accepted_proposals/{{$file->id}}" class="btn btn-outline-info">
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
