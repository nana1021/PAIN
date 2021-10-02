@extends('layouts.admin')

@section('content')
<div class="container mt-3" style="max-width: 720px;">
  <div class="text-right">
  <a href="{{ url('/admin/recipe/create') }}">< 戻る</a>
  </div>

  <form action="{{ route('category.update', [ 'category' => $category->id ]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="categoryAdd" class="font-weight-bold">カテゴリー編集</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="categoryAdd" name="name" value="{{ $category->name }}" />
      @error('name')
       <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">編集</button>
  </form>

  <div class="my-4">
    <a href="{{ url('/admin/category/') }}">> 一覧ページへ</a>
  </div>
</div>
@endsection