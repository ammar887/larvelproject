<x-app-layout :title="'Update School'">
    <div class="container w-50 p-4">
        <h2 class="text-center">Update School</h2>
        <form action="{{ url('schools', $school->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="inputSchoolName">School Name</label>
                <input type="text" name="school" value="{{ old('school', $school->name) }}" class="form-control"
                    id="inputSchoolName" placeholder="School Name">
                <span class="text-danger">
                    @error('school')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="CityName">Select City</label>
                <select class="form-control" id="CityName" name="city">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @if ($school->city_id == $city->id) selected @endif>
                            {{ $city->name }}</option>
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
                    
                </select>
                <span class="text-danger">
                    @error('area')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Update School</button>
            <a class="btn btn-danger" href="{{ route('schools.index') }}">Back</a>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            var city_id = $("#CityName").val();
            var data = {
                'city_id': city_id,
            }

            displayArea(city_id ,data);
            

            
            $('#CityName').change(function() {
                var city_id = $(this).val();
                var data = {
                    'city_id': city_id,
                }
                displayArea(city_id ,data);
        
            });



            function displayArea(city_id, data) {
                $.ajax({
                    url: '/get_area',
                    type: 'get',
                    data: data,
                    success: function(response) {
                        if (response) {

                            $('#AreaName').empty();
                            $('#AreaName').append('<option hidden>Choose Area</option>');
                            $.each(response, function(key, area) {
                                if (area.city_id == city_id)
                                    $('#AreaName').append('<option value="' + area.id +
                                        '" selected>' +
                                        area.name + '</option>');
                            });
                        } else {
                            $('#AreaName').empty();
                        }
                    }
                });
            }
        });
    </script>

<x-app-layout>
