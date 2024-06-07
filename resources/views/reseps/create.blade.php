@extends('template')

@section('content')
    <h1>Tambah Resep</h1>
    <form action="{{ action('App\Http\Controllers\ResepController@store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" placeholder="Description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
