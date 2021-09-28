@extends('layouts.admin')
@section('title', 'ルセット一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ルセット一覧</h2>
        </div>
        <div class="row">
            <div class="col text-left">
                <a type="button" href="{{ url('admin/recipe/create/') }}" class="btn btn-danger text-right" role="button"><i class="fas fa-plus"></i> 新規追加</a>
            </div>
                    <div class="form-group row">
                        <label class="col-md-2">品名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-danger" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-recipe col-md-8 mx-auto">
                <div class="row">
                    <table class="table table-info">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">写真</th>
                                <th scope="20%">カテゴリー</th>
                                <th width="30%">品名</th>
                              -{{--  <th width="50%">process</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $recipe)
                                <tr>
                                    <th>{{ $recipe->id }}</th>
                                    <td>{{ \Str::limit($recipe->image, 100) }}
                                      <img src="{{ asset('storage/image/' . $recipe->image_path) }}"class="rounded-circle"></td>
                                    <td>{{ \Str::limit($recipe->category_name, 70) }}</td>
                                    <td>{{ \Str::limit($recipe->title, 100) }}</td>
                              {{--      <td>{{ \Str::limit($recipe->body, 250) }}</td> --}}
                                <td>
                                       {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">  
                                    
                                    <td>
                                    <div class="btn-group" role="group" aria-label="ボタングループ">   
                                    <div>
                                      <a href="{{ action('Admin\RecipeController@show', ['id' => $recipe->id]) }}">
                                      <button type="button" class="btn btn-outline-success"><i class="far fa-edit"></i> ルセット詳細</button></a>
                                    </div>
                                    <div>
                                      <a href="{{ action('Admin\RecipeController@edit', ['id' => $recipe->id]) }}">
                                      <button type="button" class="btn btn-outline-danger"><i class="far fa-edit"></i> 編集</button></a>
                                    </div>
                                      
                                     <div class="btn-toolbar">
                                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$recipe->id}}"><i class="far fa-trash-alt"></i> 削除</button>
          {{-- <button type="button" class="btn btn-outline-primary"><i class="far fa-trash-alt"></i> 削除</button> 
           <!-- Button trigger modal -->  --}}
                                 <!-- Modal -->
                                      <div class="modal fade" id="exampleModal{{$recipe->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <form action="{{ route('recipe.destroy', [ 'recipe' => $recipe->id ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <div class="modal-content">
                                        <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ルセット削除</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-primary">本当に削除しますか？</p>
                                        </div>
                                   <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                   <button type="submit" class="btn btn-primary">削除</button>
                                             </div>
                                            </div>
                                          </form>
                                        </div>
                                       </div>
                                       
                                    </div>
                                    </div>
                                    </td>
                                   </td>   
                                </tr> 
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection