<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Category;

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
        $path = $request->file('image')->store('public/image');//storeはどこのフォルダにファイルを保存するか、パスを指定するメソッド
        $recipe->image_path = basename($path);//basenameはパスではなくファイル名だけ取得するメソッド
      } else {
        $recipe->image_path = null;
    }
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      $recipe->fill($form);
      $recipe->save();
      
      return redirect('admin/recipe/create');
    }
    public function index(Request $request)
  {
      $cond_title = $request->cond_title; //$cond_titleに値を代入、なければnull 下の行の$cond_title
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Recipe::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Recipe::all();
      }
      return view('admin.recipe.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
}
