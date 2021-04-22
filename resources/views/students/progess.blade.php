@extends('layouts.student')

@section('content')

    <div class="container-fluid">
        <h1 class="mt-4">Accepted Proposals</h1>
        @if ($my_accepted_files==null)
            NOFILES

        @else
            <table class="table">
                <thead>
                <tr><th scope="col">Thesis</th>
                    <th scope="col">Supervisor</th>
                    <th scope="col">Supervisor Status</th>
                    <th scope="col">Chairman Status</th>
                    <th scope="col">File</th>
                    <th scope="col">Revisions</th>

                    <th scope="col">Date Approved</th>





                </tr>
                </thead>
                <tbody>
                @foreach($my_accepted_files as $file)
                    <?php
                    $user = \App\User::find($file->student_id);
                    $document = \App\students\File::find($file->file_id)

                    ?>
                    <tr>
                        <th scope="row">  {{$file->thesis}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$file->supervisor_status}}</td>
                        <td>{{$file->chairman_status}}</td>
                        <td>{{$document->original_file_name}}</td>
                        <td>{{$document->revisions}}</td>




                        <td>{{$file->created_at}}</td>
                        <td>
                            <a href="/students/accepted_proposals/{{$file->id}}" class="btn btn-outline-info">
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
