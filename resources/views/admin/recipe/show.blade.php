@extends('layouts.admin')
@section('title', 'ルセット一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2><label class="col-md-2">品名</label></h2>
            <div class="col-md-8">
            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
            </div>
            </div>
            </div>