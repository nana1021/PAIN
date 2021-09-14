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
                
                    <div class="form-group row" style="margin-bottom: 30px">
                        <label for="category" class="col-md-2">カテゴリー</label>
                      <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->id }}" @if($category->id == $category->category_id) selected @endif>{{ $category->name }}</option>
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
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">process</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection