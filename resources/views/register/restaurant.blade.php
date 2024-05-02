<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>

    <style>
        body {
            background-image: url('/form-backgroud.jpg');
            background-size: cover;
            font-weight: bold;
        }

    </style>

</head>
<body>

<h1 class="text-success-emphasis shadow-sm m-4 bc mb-5">REGISTER RESTAURANT FORM</h1>

<main class="shadow-lg" style="width: 1500px ; height: 520px ; margin-left: 80px">
    <form action="{{ route('restaurant.store') }}" method="post" class="m-4 bc">
        @csrf

        <div>
            <input type="hidden" name="seller_id" value="{{ $sellerId }}">
        </div>

        <div class="mb-4">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control shadow-sm  bg-light bg-opacity-75">
            @error('name')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>


        <div class="mb-4">
            <label for="number" class="form-label">number</label>
            <input type="text" name="number" value="{{old('number')}}" id="email" class="form-control shadow-sm  bg-light bg-opacity-75">
            @error('number')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="address" class="form-label ">address</label>
            <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control shadow-sm bg-light bg-opacity-75">
            @error('address')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="bank_info" class="form-label ">bank info</label>
            <input type="text" name="bank_info" id="bank_info" value="{{old('bank_info')}}" class="form-control shadow-sm bg-light bg-opacity-75">
            @error('bank_info')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="restaurant_category_id" class="form-label">restaurant category</label>
            <select name="restaurant_category_id" id="restaurant_category_id">
                <option value="ff" selected disabled>Select a category</option>
                @foreach($restaurantCategories as $restaurantCategory)
                    <option value="{{ $restaurantCategory->id }}">{{ $restaurantCategory->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <input type="submit" name="register" value="Register" id="create" class="btn form-control btn-light btn-outline-warning shadow-sm">
        </div>

    </form>
</main>



</body>
</html>


