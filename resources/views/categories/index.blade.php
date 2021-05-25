@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8 mx-auto">

        @forelse ($categories as $category)
        <div class="card mt-2">
            <div class="card-body">
                <a href="{{ route('categories.show', ['category'=>$category->title]) }}">{{$category->title}}</a><br>
                <a href="{{ route('categories.edit', ['category'=>$category->title]) }}" class="btn btn-sm btn-primary">edit</a><br>

                <form action="{{ route('categories.destroy', ['category'=>$category->title]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete" class="btn btn-sm btn-danger">
                </form>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body">
                <h3>no Categories yet</h3>
            </div>
        </div>
        @endforelse

    </div>
</div>
@endsection
