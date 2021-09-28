{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ルセット新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ルセット投稿</h2>
                <form action="{{ action('Admin\RecipeController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="title">完成写真</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                
                    <div class="form-group row" style="margin-bottom: 40px">
                        <label for="category" class="col-md-2">カテゴリー</label>
                      <select class="form-control @error('category') is-invalid @enderror col-md-10" id="category" name="category_name">
                        <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->name }}" @if($category->id == $category->category_id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                      </select>
                    @error('category')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                       <div class="text-right mt-2">
                    <a type="button" href="{{ url('/admin/category/create') }}" class="btn btn-outline-secondary py-1" role="button">新規追加</a>
                    <a type="button" href="{{ url('/admin/category') }}" class="btn btn-outline-secondary py-1" role="button">編集</a>
                       </div>
                    </div>
                
                    <div class="form-group row">
                        <label class="col-md-2" for="title">品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
               {{--     <label class="col-md-2" for="title">材料名</label>
                            <div class="form-group material-box ">
                                <input class="material-input" type="text" name="material_0">
                                <input class="volume-input" type="text" name="volume_0">
                                <select class="unit-select" id="unit" name="unit_0">
                                    <option value="1">g</option>
                                    <option value="2">個</option>
                                    <option value="3">適量</option>
                                </select>
                                <div id="form_area"></div>
                            </div>

                            <input class="form-plus" id="addInput" type="button" value="+">
                            <input class="form-plus" type="button" id="deleteInput" value="-">  --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="body">材料</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="material" rows="5">{{ old('material') }}</textarea>
                        </div>
                    </div>  
                  　
                  　
                  　<div class="form-group row">
                        <label class="col-md-2" for="body">作り方</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                        </div>
                    </div>
                     <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection