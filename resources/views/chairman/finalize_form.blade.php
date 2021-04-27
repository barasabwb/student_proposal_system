@extends('layouts.chairman')

@section('content')
    <?php
    $latestrev = \App\students\Revision::latest()->first();

    ?>
    {{$file->id}}
    {{--    {{$latestrev->id}}--}}
    {{--    @foreach ($student as $item)--}}


    {{--    @endforeach--}}
    <div class="container-fluid">
        <h1 class="mt-4">Finalize</h1>

        <form action="{{route('chairman.finalize', $file->id)}}" method="post" class="">
            @csrf
            <select name="status" id="status">
                <option value="Approved by Chairman">Accepted</option>
                <option value="Declined by Chairman">Declined</option>



            </select>

            <div class="form-group">
                <label for="final_comment">Comment</label>
                <input type="text" class="form-control" height="100px" name="final_comment" id="final_comment" >

            </div>


            <button type="submit" name="submit" class="btn-success">Accept</button>





        </form>



    </div>
    </div>

    </div>



@stop
