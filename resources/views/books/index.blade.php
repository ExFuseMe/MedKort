@extends('layouts.base')

@section('body')
<div class="container">
    @foreach($books as $book)
            <div><a href="{{route('book.show', $book->id)}}">{{$book->id}}</a>{{$book}}</div>
    @endforeach
</div>
<div>
    {{$books->links()}}
</div>
@endsection
