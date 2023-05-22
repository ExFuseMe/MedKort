@extends('layouts.base')


@section('title')
    Обновить базу данных
@endsection

@section('body')
<form method="POST" action="{{route("update.store")}}" enctype="multipart/form-data">
    @csrf
    <input class="file-adding" type="file" id="data" name="data" />
    <button type="submit">Create</button>
</form>

@endsection
