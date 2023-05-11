@extends('layouts.base')


@section('title')
    Добавить категорию
@endsection

@section('body')
    <form method="POST" action="{{route("category.store")}}" enctype="multipart/form-data">
        @csrf
        <input type="text" id="title" name="title" placeholder="Название" />
        <input type="text" id="slug" name="slug" placeholder="Слаг" />
        <button type="submit">Create</button>
    </form>

@endsection
