@extends('layouts.admin')

@section('content')
    {{$file->id}}
{{--    @foreach ($student as $item)--}}


{{--    @endforeach--}}
    <div class="container-fluid">
        <h1 class="mt-4">Assign Supervisors</h1>
        <form action="{{route('admin.approve', $file->id)}}" method="post" class="">
            @csrf
            <select name="supervisor" id="supervisor">
                @foreach ($supervisors as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>


                @endforeach

            </select>


            <button type="submit" name="submit" class="btn-success">Approve</button>





        </form>



    </div>
    </div>

    </div>



@stop
