@extends('layouts.sellerMaster')
@section('panel-seller.content')


    <!DOCTYPE html>
<html>
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

{{--index table--}}
<div class="col-lg-12 grid-margin stretch-card ">
    <div class="card">
        <div class="card-body" style="margin-top: 100px">
            <h4 class="card-title"> لیست تمام غذاها </h4>
            <div class="table-responsive">

                {{-- serch form--}}
                <h4>سرچ غذا</h4>

                <form action="{{ route('find.foods.by.name') }}" method="get">
                    <input type="text" name="name" id="search" placeholder="اسم غذا">
                    <input type="submit" value="جستجو">
                </form>

                <form action="{{ route('find.foods.by.category') }}" method="post">
                    @csrf
                    <select name="food_category_id" id="food_category_id">
                        <option value="" selected disabled>دسته بندی</option>
                        @foreach($foodCategories as $foodCategory)
                            <option value="{{ $foodCategory->id }}">{{ $foodCategory->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="جستجو">
                </form>

                <table class="table table-striped">
                    <tr>
                        <th>نام</th>
                        <th>مواد اولیه</th>
                        <th>قیمت</th>
                        <th>عکس</th>
                        <th>دسته بندی</th>
                        <th>تخفیف</th>
                        <th>تاریخ ایجاد</th>
                        <th>اکشن</th>
                    </tr>
                    @foreach($foods as $food)
                        <tr>
                            <td>{{$food->name}}</td>
                            <td>{{$food->material}}</td>
                            <td>{{$food->price}}</td>
                            <td>
                                <img src="{{ asset('images/' . $food->photo) }}" alt="{{ $food->name }}">
                            </td>
                            <td>
                                @foreach($food->foodcategories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </td>

                            <td>{{ optional($food->discount)->name }}</td>
                            <td>{{$food->created_at}}</td>
                            <td>
                                <ul>
                                    <li>
                                        <form action="{{ route('foods.destroy')}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" value="{{ $food->id }}" name="id">
                                            <input type="submit" value="Delete" >
                                        </form>
                                    </li>
                                    {{--                    <li><a href="{{ route('foods.edit') }}">Edit</a></li>--}}
                                    <li>
                                        <form action="{{ route('foods.edit' , $food->id)}}" method="post">
                                            @csrf
                                            @method('GET')
                                            {{--                            <input type="hidden" value="{{ $foods->id }}" name="id">--}}
                                            <input type="submit" value="Edit" >
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach

                </table>
                {{ $foods->links() }}

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

