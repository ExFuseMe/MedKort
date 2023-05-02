@extends('layouts.base')

@section('body')
<div class="container">
    @foreach($categories as $category)
    <div>{{$category}}</div>
    @endforeach
</div>
@endsection
