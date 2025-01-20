@extends('admin.layouts.master')
@section('content')
<div class="container w-50">
    <h1 class="text-center">Edit Category</h1>
    <a href="{{route('category')}}"><i class="fa fa-arrow-left"></i>back</a>
    <form action="{{route('categoryupdate')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" class="form-control" id="categoryName" value="{{old('categoryName',$category->title)}}" name="categoryName" required>
        </div>
        <div class="form-group">
            <label for="categoryDescription">Description</label>
            <textarea class="form-control" id="categoryDescription"  name="categoryDes" rows="4" required>{{old('categoryDes',$category->description)}}</textarea>
        </div>

        <input type="hidden" name="id" value="{{$category->id}}">

        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </form>
</div>
@endsection
