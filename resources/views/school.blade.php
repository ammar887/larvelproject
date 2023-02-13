<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>School</title>
</head>

<body>

    <div class="container w-50 p-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" >School id</th>
                    <th scope="col" >School Name</th>
                    <th scope="col" >Area Name</th>
                    <th scope="col" >City Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schools as $school )
                <tr>
                    <th scope="row">{{$school->id}}</th>
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
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>