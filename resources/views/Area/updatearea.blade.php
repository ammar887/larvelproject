<x-app-layout :title="'Update Area'">
    <div class="container w-50 p-4">
        <h2 class="text-center">Update Area</h2>
        <form action="{{url('areas',$areas->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')


            <div class="form-group">
                <label for="inputAreaName">Area</label>
                <input type="text" name="area" value="{{old('area_id',$areas->name)}}" class="form-control" id="inputCityName" placeholder="Enter City Name">
                <span class="text-danger">
                    @error('area')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="CityName">Select City</label>
                <select class="form-control" id="CityName" name="city">
                    @foreach($cities as $city )
                    <option value="{{$city->id}}" @if($areas->city_id == $city->id) selected @endif>{{$city->name}}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('city')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Update Area</button>
            <a class="btn btn-danger" href="{{route('areas.index')}}">Back</a>
        </form>
    </div>
</x-app-layout >