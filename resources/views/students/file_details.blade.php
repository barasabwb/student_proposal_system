@extends('layouts.student')

@section('content')
    <?php
    $progress = \App\ProposalProgress::all()->where('file_id',$file->id)->first();

    ?>
    <div class="container-fluid">
    <div class="col-sm-12" style="margin-top: 20px">
        <div class="card">
            <div class="card-header">
                Submission Information


            </div>
            <div class="card-body">
                <div class="row flex">

                        <div class="col-sm-6 col-lg-6">
                            <div class="card ">

                                <div class="card-body">
                           <b><p class="text-left">Thesis</p></b>
                                <p class="text-left"> {{$file->thesis}}</p>

                        </div>
                            </div>

                    </div>
               <div class="col-sm-6 col-lg-6">
                        <div class="card ">

                            <div class="card-body">
                                <b><p class="text-left">Date Uploaded</p></b>
                                <p class="text-left"> {{$file->created_at}}</p>

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
                    Submission Actions


                </div>
                <div class="card-body">
                    <div class="row flex">

                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Delete File</p></b>
                                    @if ($file->approval=='pending'||$file->approval=='rejected')
                                        <form action="{{route('myproposals.destroy', $file->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger text-white">Delete</button>
                                        </form>


                                    @else
                                        <p class="text-center">Your Proposal has been accepted. You're no longer able to delete it.</p>






                                    @endif

                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Download</p></b>
                                    <form  action="{{route('admin.download',$file->id)}}" method="post">
                                        @csrf

                                        <button class="btn btn-info text-white">Download<i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>     <div class="col-sm-4 col-lg-4">
                            <div class="card ">

                                <div class="card-body">
                                    <b><p class="text-left">Progress</p></b>
                                    @if ($file->approval=='pending'||$file->approval=='rejected')
                                        Once approved by the administrators, you'll be assigned a supervisor and will be able to check your progress

                                    @else


                                        <a class="btn btn-info text-white " href="/students/accepted_proposals/{{$progress->id}}">Check Progress</a>


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
