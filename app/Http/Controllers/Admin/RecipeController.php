<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Category;
use App\User;
use Auth;
use Storage;

class RecipeController extends Controller
{
   
    public function add()
    {
        return view('admin.recipe.create');
    }
    public function create(Request $request)
    {
       $this->validate($request, Recipe::$rules);//Recipe.phpのrules変数呼び出し
       $recipe = new Recipe;//newはModelからインスタンス（レコード）を生成するメソッド
       $form = $request->all();
       
        if (isset($form['image'])) { //issetは引数の中にデータがあるかないかを判断するメソッド
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $recipe->image_path = Storage::disk('s3')->url($path);
        
      } else {
        $recipe->image_path = null;
    }
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      $recipe->fill($form);
      dd($recipe);
      $recipe->save();
      
      return redirect('admin/recipe');
    }
    
    public function index(Request $request)
    {
      $user_id = $request->user_id;
      $cond_title = $request->cond_title;//$cond_titleに値を代入、なければnull 下の行の$cond_title
        if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $recipes = Recipe::where('user_id', Auth::id())->where('title', $cond_title)->paginate(5);
        }
        else {
          $recipes = Recipe::where('user_id', Auth::id())->paginate(5);   //ログインユーザーが投稿したもののみにページ表示
        }
      return view('admin.recipe.index',['recipes' => $recipes, 'cond_title' => $cond_title, 'user_id' => $user_id]);
    }

    public function edit(Request $request)
  {
      // Modelからデータを取得する
      $recipe = Recipe::find($request->id);
      if (empty($recipe)) {
        abort(404);    
      }
      return view('admin.recipe.edit', ['recipe_form' => $recipe]);
  }
  
  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Recipe::$rules);
      // Modelからデータを取得する
      $recipe = Recipe::find($request->id);
      // 送信されてきたフォームデータを格納する
      $recipe_form = $request->all();
      if ($request->remove == 'true') {
          $recipe_form['image_path'] = null;
      } elseif ($request->file('image')) {
        $path = Storage::disk('s3')->putFile('/',$recipe_form['image'],'public');
        $recipe->image_path = Storage::disk('s3')->url($path);
      } else {
          $recipe_form['image_path'] = $recipe->image_path;
      }
      unset($recipe_form['image']);
      unset($recipe_form['remove']);
      unset($recipe_form['_token']);
      // 該当するデータを上書きして保存する
      $recipe->fill($recipe_form)->save();
        
      return redirect('/admin/recipe')->with('message','ルセットが更新されました。');
  }
  
  public function destroy($id)
  {
      // 該当するModelを取得
      $recipe = Recipe::find($id);
      // 削除する
      $recipe->delete();
      return redirect('/admin/recipe')->with('message','ルセットが削除されました。');
  }
    
  public function show(Request $request,$id,Recipe $recipe)
  {
      $recipe = Recipe::find($id);
      return view('admin.recipe.show',['recipe'=>$recipe]);
  }
  
  
    
}