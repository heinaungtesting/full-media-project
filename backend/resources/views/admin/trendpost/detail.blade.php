@extends('admin.layouts.master')
@section('content')
    <div class="col-6 offset-3 mt-5">
        <a href="{{ route('trend') }}" class="btn btn-dark"><i class="fa fa-arrow-left-long "></i>Back</a>
        <div class="card">
            <div class="card-header"><div class="text-center">
                <img class="rounded shadow" width="400px" @if ($post->image)
                src="{{asset('postImage/'.$post->image)}}"

            @else
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvX7ghSY75PvK5S-RvhkFxNz88MWEALSBDvA&s"
            @endif alt=""></div></div>
            <div class="card-body">
                <h3 class="text-center">{{ $post->title }}</h3>
                <p class="text-start">{{ $post->description }}</p>
            </div>
        </div>
    @endsection
