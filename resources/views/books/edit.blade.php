@extends('layouts.base')


@section('title')
    Добавить книгу
@endsection

@section('body')
<form method="POST" action="{{route("book.update", $book->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <a onclick="document.getElementById('image').click()">
        <img id="book-image" style="max-width:250px" src="{{asset('storage/covers/'.$book->cover)}}" alt="{{$book->title}}"/>
    </a>
    <input class="file-adding" type="file" id="image" name="image" hidden onchange="readURL(this);"/>
    <input type="text" id="title" name="title" placeholder="Название" value="{{$book->title}}" />
    <input type="text" id="slug" name="slug" placeholder="Слаг" value="{{$book->slug}}" />
    <input type="text" id="author" name="author" placeholder="Автор" value="{{$book->author}}" />
    <input type="text" id="description" name="description" placeholder="Описание" value="{{$book->description}}" />
    <input type="number" step="0.01" id="rating" name="rating" placeholder="Рейтинг" value="{{$book->rating}}" />
    <select id="category_id" name="category_id" placeholder="Категория">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
    <div>
        <button type="submit">Update</button>
    </div>
</form>
<form method="post" action="{{route('book.destroy', $book->id)}}">
    @csrf
            @method('DELETE')
    <button type="submit">Delete</button>

</form>

@endsection
