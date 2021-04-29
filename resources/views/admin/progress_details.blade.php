@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        {{--        <h1 class="mt-4">{{$details->thesis}}</h1>--}}
        <?php
        $file = \App\students\File::find($details->file_id);
        $supervisor = \App\User::find($details->supervisor_id);
        $student = \App\User::find($details->student_id);
        ?>
        <div class="col-sm-12" style="margin-top: 20px">
            <div class="card">
                <div class="card-header">
                    Submission Information - {{$file->original_file_name}}


                </div>
                <div class="card-body">
                    <div class="row flex">

                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Thesis</p></b>
                                    <p class="text-left"> {{$file->thesis}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Date Uploaded</p></b>
                                    <p class="text-left"> {{$file->created_at}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Date Approved</p></b>
                                    <p class="text-left"> {{$details->created_at}}</p>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="row flex" style="margin-top: 10px">

                        <div class="col-sm-12 col-lg-12">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Description</p></b>
                                    <p class="text-left"> {{$file->description}}</p>

                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="row flex" style="margin-top: 10px">

                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Revisions</p></b>
                                    <p class="text-left"> {{$file->revisions}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Admin Approval Status</p></b>
                                    <p class="text-left"> {{$file->approval}}</p>

                                </div>
                            </div>

                        </div>     <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">File</p></b>
                                    <p class="text-left"> {{$file->file_name}}</p>

                                </div>
                            </div>

                        </div>


                    </div>



                </div>


            </div>







        </div>
        <div class="col-sm-12" style="margin-top: 20px">
            <div class="card">
                <div class="card-header">
                    Supervisor Information


                </div>
                <div class="card-body">
                    <div class="row flex">

                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Supervisor Name</p></b>
                                    <p class="text-left"> {{$supervisor->name}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Supervisor Username</p></b>
                                    <p class="text-left"> {{$supervisor->username}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Supervisor Email</p></b>
                                    <p class="text-left"> {{$supervisor->email}}</p>

                                </div>
                            </div>

                        </div>


                    </div>






                </div>


            </div>

        </div>
        <div class="col-sm-12" style="margin-top: 20px">
            <div class="card">
                <div class="card-header">
                    Student Information


                </div>
                <div class="card-body">
                    <div class="row flex">

                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Student Name</p></b>
                                    <p class="text-left"> {{$student->name}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Student Username</p></b>
                                    <p class="text-left"> {{$student->username}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Student Email</p></b>
                                    <p class="text-left"> {{$student->email}}</p>

                                </div>
                            </div>

                        </div>


                    </div>






                </div>


            </div>

        </div>

        <div class="col-sm-12" style="margin-top: 20px">
            <div class="card">
                <div class="card-header">
                    Supervisor Status


                </div>
                <div class="card-body">
                    <div class="row flex">

                        <div class="col-sm-6 col-lg-6">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Supervisor Status</p></b>
                                    <p class="text-left"> {{$details->supervisor_status}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Supervisor Final Comment</p></b>
                                    <p class="text-left"> {{$details->supervisor_final_comment}}</p>

                                </div>
                            </div>

                        </div>



                    </div>






                </div>


            </div>



        </div>
        <div class="col-sm-12" style="margin-top: 20px">
            <div class="card">
                <div class="card-header">
                    Chairman Status


                </div>
                <div class="card-body">
                    <div class="row flex">

                        <div class="col-sm-6 col-lg-6">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Chairman Status</p></b>
                                    <p class="text-left"> {{$details->chairman_status}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Chairman Final Comment</p></b>
                                    <p class="text-left"> {{$details->chairman_final_comment}}</p>

                                </div>
                            </div>

                        </div>



                    </div>






                </div>


            </div>



        </div>

        <div class="col-sm-12" style="margin-top: 20px">
            <div class="card">
                <div class="card-header">
                    Submission Actions and Revisions


                </div>
                <div class="card-body">
                    <div class="row flex">

                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Download Original</p></b>

                                    <form action="{{route('admin.download',$details->file_id)}}" method="post">
                                        @csrf

                                        <button class="btn btn-info text-white"><i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">File</p></b>
                                    <p class="text-left"> {{$file->file_name}}</p>

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">File Path</p></b>
                                    <p class="text-left"> {{$file->file_path}}</p>

                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12 col-lg-12" style="margin-top: 10px">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Revisions</p></b>
                                    <table class="table">
                                        <thead>
                                        <tr><th scope="col">Revision</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col">Download</th>



                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if (!$file_revisions->isEmpty())


                                                @foreach($file_revisions as $rev)
                                                    <tr>
                                                        <th scope="row">  {{$rev->revision_comment}}</th>
                                                        <td>{{$file->created_at}}</td>
                                                        <td>
                                                            <form action="{{route('admin.downloadRevision',$rev->id)}}" method="post">
                                                                @csrf

                                                                <button class="btn btn-info text-white"><i class="fa fa-download" aria-hidden="true"></i>
                                                                </button>
                                                            </form>
                                                        </td>


                                                    </tr>


                                                @endforeach



                                        @else
                                            <p>No Revisions</p>
                                        @endif
                                        </tbody>
                                    </table>





                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12" style="margin-top: 20px">
            <div class="card">
                <div class="card-header">
                    Supervisor Comments

                </div>
                <div class="card-body">
                    <div class="row flex">
                        <div class="col-sm-12 col-lg-12" style="margin-top: 10px">



                            @foreach($comments as $comm)



                                <article>

                                    <li class="list-group-item">


                                        <strong>
                                            <i class="fa fa-user bg" aria-hidden="true">  </i> {{$supervisor->name}}: {{$comm->created_at->diffForHumans() }}

                                        </strong>
                                        <br>
                                        <p style="margin-left: 20px;font-style: italic;">
                                            {{$comm->comment}}



                                        </p>


                                    </li>


                                </article>
                                <br>




                            @endforeach





                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
    </div>

    </div>


@stop
