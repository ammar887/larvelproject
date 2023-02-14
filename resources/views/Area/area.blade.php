@extends('layout.header')
@section('title','Area')

@section('main-content')

@include('layout.navbar') 
<div class="container w-50 p-4">
    <h2 class="text-center">Area Details</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" Area ID>Area id</th>
                <th scope="col" Area Name>Area Name</th>
                <th scope="col" Area Name>City Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sr =1;
            @endphp
            @foreach($areas as $area )
            <tr>
                <th scope="row">{{$sr}}</th>
                @php($sr++)
                <td>{{$area->name}}</td>
                <td>{{$area->city->name}}</td>
                <td class="d-flex"><a href="{{url('areas/'.$area->id.'/edit')}}" class="btn btn-primary btn-sm px-3">Edit</a>
                    <form class="ml-1" action="{{ route('areas.destroy',  $area->id) }}" method="POST">
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
    <a href="{{url('areas/create')}}" class="btn btn-primary">Create</a>
</div>

@endsection