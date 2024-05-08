@extends('layouts.adminMaster')
@section('panel-admin.content')

    <!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin</title>
    <link rel="stylesheet" href="/../../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/../../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="/../../assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="/../../assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="/../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="/../../assets/css/style.css" />
    <link rel="shortcut icon" href="/../../assets/images/favicon.png" />

    <style>
        body,h4 {
            font-family: Vazir !important;
        }

    </style>

</head>
<body>

<h2>Restaurants Category</h2>
<div class="col-lg-12 grid-margin stretch-card m">
    <div class="card">
        <div class="card-body" style="margin-right: 350px; margin-top: 100px">
            <h4 class="card-title">دسته بندی غذا ها</h4>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>نام</th>
                        <th>تاریخ ایجاد</th>
                        <th>اکشن</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at}}</td>
                            <td>
                                <ul>
                                    <li>
                                        <form action="{{ route('delete.category.foods' , $category->id)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" value="{{ $category->id }}" name="id">
                                            <input type="submit" value="Delete" >
                                        </form>
                                    </li>
                                    <li><a href="{{ route('edit.category.foods' , $category->id) }}">Edit</a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<script src="/../../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="/../../assets/vendors/select2/select2.min.js"></script>
<script src="/../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="/../../assets/js/off-canvas.js"></script>
<script src="/../../assets/js/hoverable-collapse.js"></script>
<script src="/../../assets/js/misc.js"></script>
<script src="/../../assets/js/file-upload.js"></script>
<script src="/../../assets/js/typeahead.js"></script>
<script src="/../../assets/js/select2.js"></script>
</body>
</html>

@endsection








{{--    <!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <style>--}}
{{--        table {--}}
{{--            font-family: arial, sans-serif;--}}
{{--            border-collapse: collapse;--}}
{{--            width: 100%;--}}
{{--        }--}}

{{--        td, th {--}}
{{--            border: 1px solid #dddddd;--}}
{{--            text-align: left;--}}
{{--            padding: 8px;--}}
{{--        }--}}

{{--        tr:nth-child(even) {--}}
{{--            background-color: #dddddd;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<h2>Food Category</h2>--}}

{{--<table>--}}
{{--    <tr>--}}
{{--        <th>Name</th>--}}
{{--        <th>Creat Time</th>--}}
{{--        <th>Actions</th>--}}
{{--    </tr>--}}
{{--    @foreach($categories as $category)--}}
{{--        <tr>--}}
{{--            <td>{{$category->name}}</td>--}}
{{--            <td>{{$category->created_at}}</td>--}}
{{--            <td>--}}
{{--                <ul>--}}
{{--                    <li><a href="{{ route('delete.category.foods' , $category->id) }}">Delete</a></li>--}}
{{--                    <li>--}}
{{--                        <form action="{{ route('delete.category.foods' , $category->id)}}" method="post">--}}
{{--                            @method('DELETE')--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" value="{{ $category->id }}" name="id">--}}
{{--                            <input type="submit" value="Delete" >--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                    <li><a href="{{ route('edit.category.foods' , $category->id) }}">Edit</a></li>--}}
{{--                    <li>--}}
{{--                        <form action="{{ route('edit.category.foods')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <input type="hidden" value="{{ $category->id }}" name="id">--}}
{{--                            <input type="submit" value="Edit" >--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </td>--}}
{{--        </tr>--}}

{{--    @endforeach--}}
{{--</table>--}}

{{--</body>--}}
{{--</html>--}}


