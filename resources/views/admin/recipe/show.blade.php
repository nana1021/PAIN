@extends('layouts.admin')
@section('title', 'ルセット')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="category_name">
                    <h5>カテゴリー : {{ str_limit($recipe->category_name, 150) }}</h5>
                </div>
                <div class="title">
                    <h1>{{ str_limit($recipe->title, 150) }}</h1>
                </div>
  <div class="text-right">
  <a href="{{ action('Admin\RecipeController@index', ['id' => $recipe->id]) }}">＜ 一覧に戻る</a>
  </div>
 <hr color="#c0c0c0">
    <div class="row">
        <div class="recipes col-md-8 mx-auto mt-3">
            <div class="recipe">
                <div class="row">
                    <div class="text col-md-8">
                           <div class="image col-md-6 text-right mt-4">
                                @if ($recipe->image_path)
                                    <img src="{{ asset('storage/image/' . $recipe->image_path) }}"class="rounded">
                                @endif
                           </div>
                           <div class="body mt-3">
                           <p>材料 : {{ str_limit($recipe->material, 1500) }}</p>
                           </div>
                          <div class="body mt-3">
                           <p>作り方 : {{ str_limit($recipe->body, 1500) }}</p>
                </div>
            </div> 
        </div>
    </div>
 <hr color="#c0c0c0">
@endsection