{{--@extends('layouts.adminMaster')--}}
{{--@section('panel-login.content')--}}

{{--    dd--}}

{{--@endsection--}}

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

<h2>Restaurants Category</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Creat Time</th>
        <th>Actions</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <ul>
{{--                    <li><a href="{{ route('delete.category.restaurant' , $category->id) }}">Delete</a></li>--}}
                    <li>
                        <form action="{{ route('delete.category.restaurant' , $category->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            {{--                            <input type="hidden" value="{{ $category->id }}" name="id">--}}
                            <input type="submit" value="Delete" >
                        </form>
                    </li>
                    <li><a href="{{ route('edit.category.restaurant' , $category->id) }}">Edit</a></li>
                </ul>
            </td>
        </tr>

    @endforeach
</table>

</body>
</html>


