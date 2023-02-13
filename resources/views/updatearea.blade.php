<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Update Area</title>
</head>

<body>
    <div class="container w-50 p-4">
        <h2 class="text-center">Update Area</h2>
        <form action="{{url('areas',$areas->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        
            <div class="form-group">
                <label for="inputCityId">Area Id</label>
                <input type="text" name="area_id" value="{{old('area_id',$areas->id)}}" class="form-control" id="inputCityId" placeholder="City Id">
            </div>
            <div class="form-group">
                <label for="inputAreaName">Area Name</label>
                <input type="text" name="area_name" value="{{old('area_id',$areas->name)}}" class="form-control" id="inputCityName" placeholder="Enter City Name">
            </div>
            <div class="form-group">
                <label for="CityName">Select City</label>
                <select class="form-control" id="CityName" name="city_id" >
                    <option>Select City</option>
                    @foreach($cities as $city )
                    <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Area</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>