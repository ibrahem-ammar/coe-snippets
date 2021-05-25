@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8 mx-auto">
        <div class="card mt-2">
            <div class="card-header">
                <h2>add tag</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">title:</label>
                        <input type="text" value="{{ old('title') }}" name="title" id="title" class="form-control" required>
                    </div>
                    <input type="submit" value="add">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
