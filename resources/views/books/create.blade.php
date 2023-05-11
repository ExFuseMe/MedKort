@extends('layouts.base')


@section('title')
    Добавить книгу
@endsection

@section('body')
    <form method="POST" action="{{route("book.store")}}" enctype="multipart/form-data">
        @csrf
        <input class="file-adding" type="file" id="image" name="image" />
        <input type="text" id="title" name="title" placeholder="Название" />
        <input type="text" id="slug" name="slug" placeholder="Слаг" />
        <input type="text" id="author" name="author" placeholder="Автор" />
        <input type="text" id="description" name="description" placeholder="Описание" />
        <input type="number" step="0.01" id="rating" name="rating" placeholder="Рейтинг" />
        <input type="number" step="1" id="category_id" name="category_id" placeholder="Категория" />
        <button type="submit">Create</button>
    </form>

@endsection
