@extends('admin.layouts.master')
@section('content')
<div class="col-12">
    <div class="card">
    <div class="card-header">
      <h3 class="card-title">トレンド投稿</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="検索">

        <div class="input-group-append">
          <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
          </button>
        </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap text-center">
        <thead>
        <tr>
          <th>ID</th>
          <th>投稿タイトル</th>
          <th>画像</th>
          <th>閲覧数</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
           @foreach ($data as $item)
           <tr>
            <td>{{$item->post_id}}</td>
            <td>{{$item->title}}</td>
            <td><img class="rounded shadow" width="100px" @if ($item->image)
                src="{{asset('postImage/'.$item->image)}}"

            @else
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvX7ghSY75PvK5S-RvhkFxNz88MWEALSBDvA&s"
            @endif alt=""></td>
            <td><i class="fa-solid fa-eye"></i>{{$item->post_count}}</td>
            >
            <td>
              <a href="{{route('trenddetail',$item->post_id)}}" class="btn btn-sm bg-dark text-white"><i class="fa-solid fa-file-lines"></i></a>

            </td>
          </tr>
           @endforeach

          </tbody>
        </table>
       {{-- <div class="d-flex justify-content-end"> {{$data->links()}}</div> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection
