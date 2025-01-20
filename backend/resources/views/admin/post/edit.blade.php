@extends('admin.layouts.master')
@section('content')
<div class="col-4">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white">投稿を作成</div>
        <span class=""><a href="{{route('post')}}"><i class="fa fa-arrow-left">戻る</i></a></span>
        <div class="card-body">
            <form action="{{route('postupdate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="postid" value="{{$post->id}}">
                <div class="form-group">
                    <label for="name">タイトル</label>
                    <input type="text" name="postTitle" value="{{old('postTitle',$post->title)}}" id="name" placeholder="投稿のタイトルを入力" class="form-control @error('postTitle') is-invalid @enderror">
                    @error('postTitle')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">説明</label>
                    <textarea name="postDes" id="description" cols="30" rows="5" class="form-control @error('postDes') is-invalid @enderror" placeholder="説明を入力">{{old('postDes',$post->description)}}</textarea>
                    @error('postDes')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="font-weight-bold">画像</div>

                   @if ($post->image)
                   <img src="{{asset('postImage/'.$post->image)}}" class="rounded shadow-sm" width="200px">
                   @else
                   <h3 class="text-danger font-bold text-center">画像データがありません</h3>
                   @endif
                   <input type="file" name="postImage" id="image" class="form-control @error('postImage') is-invalid @enderror">

                </div>
                <div class="form-group">
                    <label for="Category">カテゴリー</label>
                   <select name="postCategory" id="" class="form-control">
                    <option value="">カテゴリーを選択</option>
                    @foreach ($category as $item)
                        <option value="{{$item->id}}" @if ($item->id == $post->category_id)
                            selected

                        @endif>{{$item->title}}</option>
                    @endforeach
                   </select>
                    @error('postTitle')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <input type="submit" value="更新" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<div class="col-7">
    @if (Session::has('deletesuccess'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('deletesuccess') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="card border-info">
        <div class="card-header bg-info text-white">
            <h3 class="card-title">カテゴリーリスト</h3>
            <div class="card-tools">
                <form action="" method="post">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="postSearchkey" class="form-control float-right" value="{{old('categorySearchkey')}}" placeholder="検索">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>投稿ID</th>
                        <th>タイトル</th>
                        <th>画像</th>
                        <th>アクション</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allpost as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td><img class="rounded shadow-sm" width="100px" src="{{asset('postImage/'.$item->image)}}" alt=""></td>
                            <td>
                                <a href="{{route('posteditpage',$item->id)}}" class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></a>
                                <a href="{{route('deletePost',$item->id)}}" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
