@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h1 class="mt-4">Supervisors</h1>
        @if ($supervisors==null)
            No Supervisors

        @else
            <table class="table">
                <thead>
                <tr><th scope="col">User Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>

                </tr>
                </thead>
                <tbody>
                @foreach($supervisors as $supervisor)
                    <tr>
                        <th scope="row">  {{$supervisor->id}}</th>
                        <td>{{$supervisor->name}}</td>
                        <td>{{$supervisor->email}}</td>
                        <td>{{$supervisor->username}}</td>

{{--                        <td>--}}
{{--                            <a href="" class="btn btn-outline-info" disabled>--}}
{{--                                Delete--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                        <td>--}}
{{--                            <a href="" class="btn btn-outline-info" disabled>--}}
{{--                                Update--}}
{{--                            </a>--}}
{{--                        </td>--}}

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
