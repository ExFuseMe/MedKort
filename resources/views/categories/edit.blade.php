@extends('layouts.base')


@section('title')
    Добавить книгу
@endsection

@section('body')
<form method="POST" action="{{route("category.update", $category->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="text" id="title" name="title" placeholder="Название" value="{{$category->title}}" />
    <input type="text" id="slug" name="slug" placeholder="Слаг" value="{{$category->slug}}" />
    <div>
        <button type="submit">Update</button>
    </div>
</form>
<form method="post" action="{{route('category.destroy', $category->id)}}">
    @csrf
            @method('DELETE')
    <button type="submit">Delete</button>

</form>

@endsection
