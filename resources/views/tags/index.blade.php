@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8 mx-auto">

        @forelse ($tags as $tag)
        <div class="card mt-2">
            <div class="card-body">
                <a href="{{ route('tags.show', ['tag'=>$tag->title]) }}">{{$tag->title}}</a><br>
                <a href="{{ route('tags.edit', ['tag'=>$tag->title]) }}" class="btn btn-sm btn-primary">edit</a><br>

                <form action="{{ route('tags.destroy', ['tag'=>$tag->title]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete" class="btn btn-sm btn-danger">
                </form>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body">
                <h3>no tags yet</h3>
            </div>
        </div>
        @endforelse

    </div>
</div>
@endsection
