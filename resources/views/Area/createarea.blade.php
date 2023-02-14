@extends('layout.header')
@section('title','Create Area')

@section('main-content')
    <div class="container w-50 p-4">
        <h2 class="text-center">Create Area</h2>
        <form action="{{url('areas')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="inputAreaName">Area</label>
                <input type="text" name="area" class="form-control" id="inputAreaName" aria-describedby="emailHelp" placeholder="Enter Area Name">
                <span class="text-danger">
                    @error('area')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="CityName">Select City</label>
                <select class="form-control" id="CityName" name="city">
                    <option value=" ">Select City</option>
                    @foreach($cities as $city )
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('city')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-danger" href="{{url('areas')}}">Back</a>
        </form>
    </div>
@endsection