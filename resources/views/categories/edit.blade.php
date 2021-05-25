@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8 mx-auto">
        <div class="card mt-2">
            <div class="card-header">
                <h2>edit category</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update',['category'=>$category->title]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" value="{{ old( 'title' , $category->title ) }}" name="title" id="title" class="form-control" required>
                    </div>
                    <input type="submit" value="add">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
