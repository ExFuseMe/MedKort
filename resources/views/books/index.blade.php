@extends('layouts.base')

@section('body')
<div class="container">
    @foreach($books as $book)
        <div>{{$book}}</div>
    @endforeach
</div>
@endsection
