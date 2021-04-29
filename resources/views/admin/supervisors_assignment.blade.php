@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <h4 class="mt-4">Assign Supervisor</h4>
        <form action="{{route('admin.approve', $file->id)}}" method="post" class="form-control">
            @csrf
            <label for="supervisor">Choose a supervisor</label>
            <select  name="supervisor" id="supervisor">
                @foreach ($supervisors as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>


                @endforeach

            </select>
            <br>
            <br>


            <button type="submit" name="submit" class="btn btn-success">Approve</button>





        </form>



    </div>
    </div>

    </div>



@stop
