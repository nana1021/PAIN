@extends('layouts.admin')
@section('title', 'ルセット一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ルセット一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\RecipeController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col text-right">
                <a type="button" href="{{ url('admin/recipe/create/') }}" class="btn btn-primary text-right" role="button"><i class="fas fa-plus"></i> 新規追加</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\RecipeController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-recipe col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th scope="col">カテゴリー</th>
                                <th scope="col">編集</th>
                                <th scope="col">削除</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">process</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $recipe)
                                <tr>
                                    <th>{{ $recipe->id }}</th>
                                    <td>{{ \Str::limit($recipe->title, 100) }}</td>
                                    <td>{{ \Str::limit($recipe->body, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection