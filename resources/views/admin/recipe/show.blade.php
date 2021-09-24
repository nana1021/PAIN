
@section('title', 'ルセット')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ルセット</h2>
<body>
                <a href="{{ action('Admin\RecipeController@index', ['id' => $recipe->id]) }}">一覧に戻る</a>
 <hr color="#c0c0c0">
    <div class="row">
        <div class="recipes col-md-8 mx-auto mt-3">
            <div class="recipe">
                <div class="row">
                    <div class="text col-md-6">
                        <div class="category_name">
                           <p>カテゴリー:{{ str_limit($recipe->category_name, 150) }}</p>
                         </div>
                         <div class="title">
                           <p>品名:{{ str_limit($recipe->title, 150) }}</p>
                         </div>
                           <div class="image col-md-6 text-right mt-4">
                                @if ($recipe->image_path)
                                    <img src="{{ asset('storage/image/' . $recipe->image_path) }}">
                                @endif
                         </div>
                         <div class="body mt-3">
                           <p>材料:{{ str_limit($recipe->material, 1500) }}</p>
                </div>
                          <div class="body mt-3">
                           <p>作り方:{{ str_limit($recipe->body, 1500) }}</p>
                </div>
            </div> 
        </div>
    </div>
 <hr color="#c0c0c0">
</body>