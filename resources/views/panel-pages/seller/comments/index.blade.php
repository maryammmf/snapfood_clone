@extends('layouts.sellerMaster')
@section('panel-seller.content')

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin</title>
    <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="../../../assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="../../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/css/style.css" />
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />


    <style>
        body,h4 {
            font-family: Vazir !important;
        }

    </style>

</head>
<body>

<h2>نظرات</h2>
<div class="col-lg-12 grid-margin stretch-card m">
    <div class="card">
        <div class="card-body" style="margin-right: 350px; margin-top: 100px">
            <h4 class="card-title ">نمایس تمام نظرات این سفارش</h4>
            <div class="table-responsive">
                <table class="table table-striped mt-3">
                    <tr>
                        <th>کاربر</th>
                        <th>امتیاز</th>
                        <th>متن پیام</th>
                        <th>پاسخ</th>
                        <th>تاریخ ثبت نظر</th>
                        <th>ارسال پاسخ</th>
                        <th>وضعیت نظر</th>
                        <th>درخواست حذف</th>
                    </tr>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->score}}</td>
                            <td>{{$comment->message}}</td>
                            <td>{{$comment->response}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>
                                <form action="{{ route('comment.response' ,$orderId) }}" method="post">
                                    @csrf
                                        <input type="text" name="message" placeholder="پاسخ خود را اینجا بنویسید">
                                        <input type="submit" value="ارسال">
                                </form>
                            </td>

                            <td>
                                <form action="{{ route('comment.approve' , $comment->id) }}" method="post">
                                    @csrf
                                    <input type="submit" name="true" value="تایید نظر">
                                </form>
                            </td>

                            <td>
                                <form action="{{ route('comment.delete' , $comment->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="درخواست حذف نظر">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{$comments->links()}}
            </div>
        </div>
    </div>
</div>


<script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../../../assets/vendors/select2/select2.min.js"></script>
<script src="../../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
<script src="../../../assets/js/off-canvas.js"></script>
<script src="../../../assets/js/hoverable-collapse.js"></script>
<script src="../../../assets/js/misc.js"></script>
<script src="../../../assets/js/file-upload.js"></script>
<script src="../../../assets/js/typeahead.js"></script>
<script src="../../../assets/js/select2.js"></script>
</body>
</html>

@endsection



