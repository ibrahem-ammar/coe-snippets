@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8 mx-auto">
        @forelse ($snippets as $snippet)
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="float-left">{{ $snippet->title }}</h3>
                <span class="float-right">{{ $snippet->updated_at->format('M d, Y h:i a') }}</span>
            </div>
            <div class="card-body">
                <div>
                    <h4>description :</h4>
                    <p>{{ $snippet->description }}</p>
                </div>
                <div style="background-color: black; padding:20px;">
                    <h4 style="color: cornflowerblue">code :</h4>
                    <p style="color: darkgoldenrod">{{ $snippet->code }}</p>
                </div>
                tag : <a href="{{ route('tags.show', ['tag'=>$snippet->tag->title]) }}">{{$snippet->tag->title}}</a><br>
                category : <a href="{{ route('categories.show', ['category'=>$snippet->category->title]) }}">{{$snippet->category->title}}</a>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body">
                <h3>no snippets yet</h3>
            </div>
        </div>
        @endforelse

    </div>
</div>
@endsection
