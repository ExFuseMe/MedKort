@extends('layouts.base')

@section('body')
<div class="container">
    @foreach($categories as $category)
    <div>
        <a href="{{route('category.show', $category)}}">{{$category->id}}</a>{{$category->title}}
    </div>
    @endforeach
</div>
@endsection
