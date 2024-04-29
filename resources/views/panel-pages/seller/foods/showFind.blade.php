@extends('layouts.sellerMaster')
@section('panel-seller.content')

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
<h2>Foods</h2>

<table>
    <tr>
        <th>Name</th>
        <th>material</th>
        <th>Price</th>
        <th>photo</th>
        <th>category</th>
        <th>Creat Time</th>
        <th>Actions</th>
    </tr>
{{--    @foreach($foods as $food)--}}
        <tr>
            <td>{{$food->name}}</td>
            <td>{{$food->material}}</td>
            <td>{{$food->price}}</td>
            <td>{{$food->photo}}</td>
            <td>
                @foreach($food->categories as $category)
                {{ $category->name }}
                @endforeach
            </td>
            <td>{{$food->created_at}}</td>
            <td>
                <ul>
                    <li>
                        <form action="{{ route('food.destroy')}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" value="{{ $food->id }}" name="id">
                            <input type="submit" value="Delete" >
                        </form>
                    </li>
{{--                    <li><a href="{{ route('food.edit') }}">Edit</a></li>--}}
                    <li>
                        <form action="{{ route('food.edit' , $food->id)}}" method="post">
                            @csrf
                            @method('GET')
{{--                            <input type="hidden" value="{{ $food->id }}" name="id">--}}
                            <input type="submit" value="Edit" >
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
{{--    @endforeach--}}
</table>
{{--{{ $foods->links() }}--}}

</body>
</html>




@endsection

