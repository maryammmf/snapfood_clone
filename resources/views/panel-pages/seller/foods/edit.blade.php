@extends('layouts.sellerMaster')
@section('panel-seller.content')

    <div class="col-12 grid-margin stretch-card mt-5" style="height: 300px">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="card-title">اصلاح کردن غذا</h4>

                <form class="forms-sample" action="{{ route('food.update' , $food) }}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                        <label for="name">نام</label>
                        <input type="text" name="name" value="{{ $food->name }}" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="material">مواد اولیه</label>
                        <input type="text" name="material" value="{{ $food->material }}" class="form-control" id="material">
                    </div>

                    <div class="form-group">
                        <label for="price">قیمت</label>
                        <input type="text" name="price" value="{{ $food->price }}" class="form-control" id="price">
                    </div>

                    <div class="form-group">
                        <label for="photo">عکس</label>
                        <input type="text" name="photo" value="{{ $food->photo }}" class="form-control" id="photo">
                    </div>

                    <div class="form-group">
                        <label for="food_category_id">دسته بندی</label>
                        <select name="food_category_id" id="food_category_id">
                            <option value="{{ $food->food_category_id }}" selected disabled>{{ $food->food_category_id }}</option>
                            @foreach($foodCategories as $foodCategory)
                                <option value="{{ $foodCategory->id }}">{{ $foodCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2"> ذخیره </button>
                </form>

            </div>
        </div>
    </div>


@endsection
