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
                            @if (Session::has('updatesuccess'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session::get('updatesuccess')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="閉じる"></button>
                              </div>
                            @endif
                            <form class="form-horizontal" method="post" action="{{route('adminupdate')}}">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">名前</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid

                                        @enderror" name="name" id="inputName" placeholder="名前"
                                            value="{{ $user->name }}"> @error('name') <div class="text-danger">{{$message}}</div>

                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">メール</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid

                                        @enderror" name="email" id="inputEmail" placeholder="メール"
                                            value="{{ $user->email }}"> @error('email') <div class="text-danger">{{$message}}</div>

                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">電話番号</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control @error('phone') is-invalid

                                        @enderror" name="phone" id="inputName" placeholder="電話番号"
                                            value="{{ old('phone',$user->phone) }}"> @error('phone') <div class="text-danger">{{$message}}</div>

                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">住所</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control @error('address') is-invalid

                                        @enderror" name="address" placeholder="住所を入力..." id="" cols="30"
                                            rows="10">{{ old('address',$user->address) }}</textarea> @error('address') <div class="text-danger">{{$message}}</div>

                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">性別</label>
                                    <div class="col-sm-10">
                                        <select name="gender" class="form-control @error('gender') is-invalid

                                        @enderror" id="">
                                            <option value="" @if ($user->gender == '') selected @endif>性別を選択</option>
                                            <option value="male" @if ($user->gender == 'male') selected @endif>男
                                            </option>
                                            <option value="female" @if ($user->gender == 'female') selected @endif>女
                                            </option>

                                        </select> @error('gender') <div class="text-danger">{{$message}}</div>

                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn bg-dark text-white">送信</button>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <a href="{{route('changepasswordpage')}}">パスワードを変更する</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
