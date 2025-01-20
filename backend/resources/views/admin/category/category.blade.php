@extends('admin.layouts.master')
@section('content')
<div class="col-4">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white">カテゴリー作成</div>
        <div class="card-body">
            <form action="{{route('createCategory')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">カテゴリー名</label>
                    <input type="text" name="categoryName" id="name" placeholder="カテゴリー名を入力" class="form-control @error('categoryName') is-invalid @enderror">
                    @error('categoryName')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">説明</label>
                    <textarea name="categoryDes" id="description" cols="30" rows="5" class="form-control @error('categoryDes') is-invalid @enderror" placeholder="説明を入力"></textarea>
                    @error('categoryDes')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <input type="submit" value="作成" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<div class="col-7">
    @if (Session::has('deletesuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session::get('deletesuccess') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session::get('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="card border-info">
        <div class="card-header bg-info text-white">
            <h3 class="card-title">カテゴリーリスト</h3>
            <div class="card-tools">
                <form action="{{route('searchCategory')}}" method="post">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="categorySearchkey" class="form-control float-right" value="{{old('categorySearchkey')}}" placeholder="検索">
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
                        <th>カテゴリーID</th>
                        <th>カテゴリー名</th>
                        <th>説明</th>
                        <th>アクション</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                <a href="{{route('categoryeditpage',$item->id)}}" class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></a>
                                <a href="{{route('deleteCategory',$item->id)}}" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
