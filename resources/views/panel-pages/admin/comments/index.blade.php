@extends('layouts.adminMaster')
@section('panel-admin.content')


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
            <h4 class="card-title"> نظرات درخواست  داده شده برای حذف </h4>
            <div class="table-responsive">

                <table class="table table-striped">
                    <tr>
                        <th>سفارش</th>
                        <th>کاربر</th>
                        <th>متن</th>
                        <th>تاریخ ایجاد</th>
                        <th>اکشن</th>
                    </tr>
                    @if($comments->isEmpty())
                        <p class="bg-inverse-icon-warning text-white "> ... در حال حاضر نظری موجود نیست </p>
                    @else
                    @foreach($comments as $comment)
                        <tr>
                            <td>"{{$comment->name}}"</td>
                            <td>{{$userName}}</td>
                            <td>{{$comment->message}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td><a href="{{ route('comment.destroy' , $comment->id) }}">پاک کردن</a></td>
                    @endforeach

                </table>
                {{ $comments->links() }}

                @endif
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

