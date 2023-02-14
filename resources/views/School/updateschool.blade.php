@extends('layout.header')
@section('title','Update School')

@section('main-content')
    <div class="container w-50 p-4">
        <h2 class="text-center">Update School</h2>
        <form action="{{url('schools',$school->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="inputSchoolName">School Name</label>
                <input type="text" name="school" value="{{old('school',$school->name)}}" class="form-control" id="inputSchoolName" placeholder="School Name">
                <span class="text-danger">
                    @error('school')
                        {{$message}}
                    @enderror                                           
                </span>
            </div>
            <div class="form-group">
                <label for="CityName">Select City</label>
                <select class="form-control" id="CityName" name="city">
                    @foreach($cities as $city)
                        <option value="{{$city->id}}" @if($school->city_id == $city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('city')
                        {{$message}}
                    @enderror                                           
                </span>
            </div>
            <div class="form-group">
                <label for="AreaName">Select Area</label>
                <select class="form-control" id="AreaName" name="area">
                    @foreach($areas as $area )
                    <option value="{{$area->id}}" @if($school->area_id == $area->id) selected @endif>{{$area->name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('area')
                        {{$message}}
                    @enderror                                           
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Update School</button>
            <a class="btn btn-danger" href="{{url('schools')}}">Back</a>
        </form>
    </div>
@endsection