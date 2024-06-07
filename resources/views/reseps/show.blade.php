@extends('template')

@section('content')
    <a href="/dashboard" class="btn btn-secondary" style="margin-left: 200px;"> Kembali</a>
    <div style="width: 100%; overflow-x: auto;">
        <div style="width: 1040px; height: 300px; border-radius: 16px; overflow: hidden; display: inline-flex; justify-content: center; align-items: center; margin-left: 200px;">
            <img style="width: 1040px; height: 693px" src="/storage/images/{{ $resep->image }}">
        </div>
    </div>
    <h1 style="margin-left: 200px;">{{ $resep->title }}</h1>
    <p style="margin-left: 200px;">{{ $resep->description }}</p>
    <a href="/reseps/{{ $resep->id }}/edit" class="btn btn-primary" style="margin-left: 200px;">Edit</a>
    <form action="{{ action('App\Http\Controllers\ResepController@destroy', $resep->id) }}" method="POST" class="float-right">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" style="margin-left: 200px;">Delete</button>
    </form>
@endsection
