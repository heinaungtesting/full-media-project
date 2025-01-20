@extends('admin.layouts.master')
@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">ユーザープロフィール</legend>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            @if (Session::has('updateerror'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session::get('updateerror')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                            @endif

    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <legend class="text-center">ユーザープロフィール</legend>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        @if (Session::has('updatesuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session::get('updatesuccess')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        @if (Session::has('updateerror'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{session::get('updateerror')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                            <form class="form-horizontal" method="post" action="{{route('changepassword')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">古いパスワード</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control @error('name') is-invalid

                                        @enderror" name="oldpassword" id="inputName" placeholder="古いパスワードを入力"
                                            value="{{ old('oldpassword')}}"> @error('name') <div class="text-danger">{{$message}}</div>

                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">新しいパスワード</label></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('newpassword') is-invalid

                                        @enderror" name="newpassword" id="inputEmail" placeholder="新しいパスワードを入力"
                                            value="{{ old('newpassword') }}"> @error('newpassword') <div class="text-danger">{{$message}}</div>

                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">パスワードを認証する</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control @error('conpassword') is-invalid

                                        @enderror" name="conpassword" id="inputName" placeholder="確認用パスワードを入力..."
                                            value="{{ old('conpassword') }}"> @error('conpassword') <div class="text-danger">{{$message}}</div>

                                            @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn bg-dark text-white">パスワードを変更する</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
