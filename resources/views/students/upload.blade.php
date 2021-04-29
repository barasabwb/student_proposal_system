@extends('layouts.student')

@section('content')
    <div class="container-fluid">
        <h4 class="mt-4">UPLOAD YOUR FILES HERE</h4>

        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
            @csrf
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
            <div class="form-group">
                <label for="file">Please upload your document</label>
                <input type="file" class="form-control-file" name="file" id="chooseFile">
            </div>

            <div class="form-group">
                <label for="thesis">Type your Thesis here(Proposal topic) - Preferred Documents:pdfs and word documents</label>
                <input type="text" class="form-control" height="100px" name="thesis" id="thesis" >

            </div>
            <div class="form-group">
                <label for="description">Write a brief description about your Proposal</label>
                <textarea type="text" style="height: 100px" class="form-control" height="100px" name="description" id="description" wrap="soft" > </textarea>

            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">
                    Upload Proposal
                </button>
            </div>

        </form>

    </div>
    </div>

    </div>


@stop
