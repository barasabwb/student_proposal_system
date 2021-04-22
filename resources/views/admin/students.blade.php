@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="mt-4">Students</h1>
        @if ($students==null)
            No Students

        @else
            <table class="table">
                <thead>
                <tr><th scope="col">User Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>

                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <th scope="row">  {{$student->id}}</th>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->username}}</td>

                        <td>
                            <a href="" class="btn btn-outline-info">
                                Delete
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-outline-info">
                                Update
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
