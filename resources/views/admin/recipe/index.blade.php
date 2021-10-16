@extends('layouts.admin')
@section('title', 'ルセット一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-primary">ルセット一覧</h1>
        </div>
        <div class="row">
            <div class="col text-left">
                <a type="button" href="{{ url('admin/recipe/create/') }}" class="btn btn-success text-right btn-sm" role="button"><i class="fas fa-plus"></i> 新規追加</a>
            </div>
            
            <form action="{{ action('Admin\RecipeController@index') }}" method="get">
                <div class="form-group row">
                <select class="form-select form-select-sm col-md-3" aria-label=".form-select-sm example">
                    <option selected>--販売状況選択--</option>
                    <option value="1">販売中</option>
                    <option value="2">休止中</option>
                    <option value="3">どちらでもない</option>
                </select>
                <div class="col-md-7">
                <input type="text" class="form-control" name="cond_title" placeholder="品名を入力してください" value="{{ $cond_title }}">
                </div>
                <div class="col-md-2">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-warning btn-sm" value="検索">
                </div>
                @if (session('message'))
                <div  class="alert alert-danger" role="alert">{{ session('message') }}</div>
                @endif
            </form> 
               </div>
            </div>
        </div> 
        <div class="row">
            <div class="list-recipe col-md-8 mx-auto">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="6%"></th>
                                <th width="9%"></th>
                                <th width="11%"></th>
                                <th width="24%"></th>
                                <th width="25%"></th>
                              {{--  <th width="50%">process</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if($recipes != null)
                            @foreach($recipes as $recipe)
                                <tr>
                                    <th>{{ $recipe->id }}
                                    <p class=border>{{ \Str::limit($recipe->sales_status) }}</p>
                                    </th>
                                    <td>{{ \Str::limit($recipe->image, 10) }}
                                      <img src="{{ $recipe->image_path }}"class="rounded"></td>
                                    <td><p>作成日<br>{{ $recipe->created_at->format('Y/m/d') }}</p>
                                        <p>最終編集日<br>{{ $recipe->updated_at->format('Y/m/d') }}</p></td>
                                    <td><p>{{ \Str::limit($recipe->category_name, 20) }}</p>
                                        <p><font size="6">{{ \Str::limit($recipe->title, 25) }}</p></td>
                              
                                    <td class="btn-group">
                                    <div>
                                      <a href="{{ action('Admin\RecipeController@show', ['id' => $recipe->id]) }}">
                                      <button type="button" class="btn btn-outline-success btn-sm"> ルセット詳細</button></a>
                                    </div>
                                    <div>
                                      <a href="{{ action('Admin\RecipeController@edit', ['id' => $recipe->id]) }}">
                                      <button type="button" class="btn btn-outline-danger btn-sm"><i class="far fa-edit"></i> 編集</button></a>
                                    </div>
                                    <div class="btn-toolbar">
                                      <a><button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$recipe->id}}"><i class="far fa-trash-alt"></i> 削除</button></a>
            
                                  <!--Modal-->
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
                                  </td>  
                                </tr> 
                            @endforeach
                            @else
                            <h3>まだ投稿されていません</h3>
                            @endif
                        </tbody>
                    </table>
                     {{ $recipes->links() }}
                </div>
            </div>
        </div>  
@endsection