@extends('layout.header')
@section('title', 'Create School')

@section('main-content')
    <div class="container w-50 p-4">
        <h2 class="text-center">Create School</h2>
        <form action="{{ url('schools') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="inputSchoolName">School</label>
                <input type="text" name="school" class="form-control" id="inputSchoolName" placeholder="Enter School Name">
                <span class="text-danger">
                    @error('school')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="CityName">Select City</label>
                <select class="form-control" id="CityName" name="city">
                    <option value="">Select City</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('city')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <label for="AreaName">Select Area</label>
                <select class="form-control" id="AreaName" name="area">
                    <option disabled>Please Select City First</option>
                </select>
                <span class="text-danger">
                    @error('area')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn btn-danger" href="{{ route('schools.index') }}">Back</a>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#CityName').change(function() {
                var city_id = $(this).val();
                var data = {
                    'city_id': city_id,
                }
                $.ajax({
                    url: '/get_area',
                    type: 'get',
                    data: data,
                    success: function(response) {
                        if(response){
                            $('#AreaName').empty();
                            $('#AreaName').append('<option hidden>Choose Area</option>');
                            $.each(response, function(key, area){
                                $('#AreaName').append('<option value="'+ area.id +'">' + area.name+ '</option>');
                            });
                        }else{
                            $('#AreaName').empty();
                        }
                    }
                });
            });
        });
    </script>
@endsection
