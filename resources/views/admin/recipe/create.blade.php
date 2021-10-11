{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ルセット新規投稿')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class=box>
            <div class="col-md-8 mx-auto">
                <h1>ルセット作成</h1>
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
                    
                    <div class="form-inline">
                    <p class="control-label">販売状況</p>
                    <div>
                    <label class="radio-inline">
                     <input type="radio" name="sales_status" value="販売中" id="sale" {{ old('sales_status') === '販売中' ? 'checked' : '' }} />販売中
                    </label>
                    </div>
                    <div>
                   <label class="radio-inline">
                    <input type="radio" name="sales_status" value="休止中" id="rest" {{ old('sales_status') === '休止中' ? 'checked' : '' }} />休止中
                   </label>
                  </div>
                  </div>                
                    <div class="form-group row" style="margin-bottom: 40px">
                        <label for="category" class="col-md-2">カテゴリー</label>
                      <select class="form-control @error('category') is-invalid @enderror col-md-10" id="category" name="category_name">
                        <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>
                    @foreach(App\Category::all() as $category)
                        <option value="{{ $category->name }}" @if( old('category_name') == $category->name) selected @endif>{{ $category->name }}</option>
                    @endforeach
                      </select>
                    @error('category')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                       <div class="text-right mt-1">
                    <a type="button" href="{{ url('/admin/category/create') }}" class="btn btn-outline-warning py-1" role="button">新規追加</a>
                    <a type="button" href="{{ url('/admin/category') }}" class="btn btn-outline-danger py-1" role="button">編集</a>
                       </div>
                    </div>
                
                    <div class="form-group row">
                        <label class="col-md-2" for="title">品名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
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
                    <div class="form-group row">
                        <label class="col-md-2" for="memo">メモ</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="memo" rows="5">{{ old('memo') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                     <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                     <input type="submit" class="btn btn-light" value="更新">
                </form>
            </div>
        </div>
    </div>
    </dev>
@endsection
