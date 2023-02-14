@extends('layout.header')
@section('title','School')

@section('main-content')
@include('layout.navbar') 
<div class="container w-50 p-4">
    <h2 class="text-center">School Details</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">School id</th>
                <th scope="col">School Name</th>
                <th scope="col">Area Name</th>
                <th scope="col">City Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sr =1;
            @endphp
            @foreach($schools as $school )
            <tr>
                <th scope="row">{{$sr}}</th>
                @php($sr++)
                <td>{{$school->name}}</td>
                <td>{{$school->area->name}}</td>
                <td>{{$school->city->name}}</td>
                <td class="d-flex"><a href="{{url('schools/'.$school->id.'/edit')}}" class="btn btn-primary btn-sm px-3">Edit</a>
                    <form class="ml-1" action="{{ route('schools.destroy',  $school->id) }}" method="POST">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                <td></td>
                </form>

                </td>


            </tr>
            @endforeach
        </tbody>

    </table>
    <a href="{{url('schools/create')}}" class="btn btn-primary">Create</a>
</div>
@endsection