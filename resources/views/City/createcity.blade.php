@extends('layout.header')

@section('title','City')

@section('main-content')
    <div class="container w-50 p-4">
        <h2 class="text-center">Create City</h2>
        <form action="{{url('citys')}}" method="post">
        @csrf
            <div class="form-group">
                <label for="inputCityName">City</label>
                <input type="text" name="city" class="form-control" id="inputCityName"   placeholder="Enter City Name" >
                <span class="text-danger">
                    @error('city')
                        {{$message}}
                    @enderror                                           
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-danger" href="{{url('citys')}}">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection