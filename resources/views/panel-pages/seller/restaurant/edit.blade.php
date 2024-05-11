@extends('layouts.sellerMaster')
@section('panel-seller.content')
{{--@dd($restaurant->name)--}}
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


<div class="col-12 grid-margin stretch-card mt-5" >
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="card-title">اصلاح کردن رستوران</h4>

            <form class="forms-sample" action="{{ route('restaurant.update' , $restaurant) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf


                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" name="name" value="{{ $restaurant->name }}" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="number">تلفن</label>
                    <input type="text" name="number" value="{{ $restaurant->number }}" class="form-control" id="number">
                </div>

                <div class="card-header mb-3">

                    <div class="form-group ">
                        <label for="address">ادرس</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>

                    <div class="form-group">
                        <label for="latitude">عرض جغرافیایی</label>
                        <input type="number" name="latitude" class="form-control" id="latitude">
                    </div>

                    <div class="form-group">
                        <label for="longitude">طول جغرافیایی</label>
                        <input type="number" name="longitude" class="form-control" id="longitude">
                    </div>
                </div>



                <div class="form-group">
                    <label for="bank_info">اطلاعات بانکی</label>
                    <input type="text" name="bank_info" value="{{ $restaurant->bank_info }}" class="form-control" id="bank_info">
                </div>


                <div class="form-group">
                    <label for="shipping_cost">هزینه ارسال</label>
                    <input type="number" name="shipping_cost" class="form-control" id="shipping_cost">
                </div>

                <div class="form-group">
                    <label for="photo">عکس</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>

                <div class="form-group card-header">
                    <p >رستوران باز هست ؟</p>
                    <label for="open">باز</label>
                    <input type="radio" name="is_open" class="form-control" id="open" value="true">

                    <label for="close">بسته</label>
                    <input type="radio" name="is_open" class="form-control" id="close" value="false" >
                </div>


                <div class="form-group card-header">
                    <p >برنامه کاری رستوران</p>
                    @foreach(['Saturday' , 'Sunday' , 'Monday' , 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday'] as $day)
                        <input type="checkbox" id="{{$day}}" name="days[]" value="{{$day}}">
                        <label for="{{$day}}">{{$day}}</label><br>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="restaurant_category_id">دسته بندی</label>
                    <select name="restaurant_category_id" value="{{ $restaurant->restaurant_category_id }}" id="restaurant_category_id">
                        <option value="" selected disabled>انتخاب کنید</option>
                        @foreach($restaurantCategories as $restaurantCategory)
                            <option value="{{ $restaurantCategory->id }}">{{ $restaurantCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mr-2"> ذخیره </button>
            </form>

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








{{--@extends('layouts.sellerMaster')--}}
{{--@section('panel-seller.content')--}}


{{--@endsection--}}
