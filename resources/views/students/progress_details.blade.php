@extends('layouts.student')
@section('content')

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
    <?php
        $file = \App\students\File::find($details->file_id);
        $supervisor = \App\User::find($details->supervisor_id);
        ?>
        <div class="container-fluid">
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
                                        <b><p class="text-left">OriginaL file name</p></b>
                                        <p class="text-left"> {{$file->file_name}}</p>

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
                                                <th scope="col">Delete</th>


                                            </tr>
                                            </thead>
                                            <tbody>

                                            @if (!$file_revisions->isEmpty())
                                                @if ($details->supervisor_status=='Ready for Chairman Review')

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
                                                            <td>
                                                                <form action="{{route('student.deleteRevision', $rev->id)}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger" disabled><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </form>
                                                            </td>

                                                        </tr>


                                                    @endforeach
                                                @else
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
                                                            <td>
                                                                <form action="{{route('student.deleteRevision', $rev->id)}}" method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                </form>
                                                            </td>

                                                        </tr>

                                                    @endforeach


                                                @endif



                                            @else
                                                <p>No Revisions</p>
                                            @endif
                                            </tbody>
                                        </table>





                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-lg-12" style="margin-top: 10px">
                                <div class="card ">

                                    <div class="card-body">
                                        <b><p class="text-left">Make a New Revision</p></b>
                                        @if ($details->supervisor_status=='Ready for Chairman Review')
                                            File has already been submitted to the chairman. You can't delete or add new Revisions
                                        @else <br>
                                        <button class="btn btn-info text-white" id="formButton">Make a Revision</button>
                                        <br>
                                        <form id="form1" action="{{route('uploadRevision')}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="file">Upload Your Revision</label>
                                                <input type="file" class="form-control-file" name="file" id="chooseFile">
                                            </div>
                                            <input type="text" hidden class="form-control" height="100px" name="file_id" id="file_id" value="{{$details->file_id}}" >


                                            <div class="form-group">
                                                <label for="comment">Revision Comment</label>
                                                <input type="text" class="form-control" height="100px" name="revision_comment" id="revision_comment" >

                                            </div>

                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary">
                                                    Upload Files
                                                </button>
                                            </div>

                                        </form>
                                        @endif


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </div>

    </div>


@stop
