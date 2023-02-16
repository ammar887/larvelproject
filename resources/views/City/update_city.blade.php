@extends('layout.header')

@section('title','City')

@section('main-content')
<body>
    <div class="container w-50 p-4">
        <h2 class="text-center">Update City</h2>
        <form action="{{url('citys',$city->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        
            
            <div class="form-group">
                <label for="inputCityName">City</label>
                <input type="text" name="city" value="{{old('city_id',$city->name)}}" class="form-control" id="inputCityName" placeholder="Enter City Name">
                <span class="text-danger">
                    @error('city')
                        {{$message}}
                    @enderror                                           
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Update City</button>
            <a class="btn btn-danger" href="{{route('citys.index')}}">Back</a>
            
        </form>
    </div>
@endsection