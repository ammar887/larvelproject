
<x-app-layout :title="'Cities'">
<div class="container w-50 p-4">
    <h2 class="text-center">City Details</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">City Id</th>
                <th scope="col">City Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sr =1;
            @endphp
            @foreach($cities as $city )
            <tr>
                <th scope="row">{{$sr}}</th>
                @php($sr++)
                <td>{{$city->name}}</td>
                <td class="d-flex"><a href="{{route('citys.edit',$city->id)}}" class="btn btn-primary btn-sm px-3">Edit</a>
                    <form class="ml-1" action="{{ route('citys.destroy',  $city->id) }}" method="POST">
                        @csrf

                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                {{-- <td></td> --}}
                

                </td>


            </tr>
            @endforeach
        </tbody>

    </table>
    <a href="{{route('citys.create')}}" class="btn btn-primary">Add City</a>
</div>

{{-- @stop --}}
</x-app-layout>