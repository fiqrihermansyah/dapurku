@extends('template')

@section('content')
    <h1>Resep</h1>
    <a href="/reseps/create" class="btn btn-primary">Tambah Resep</a>
    @if(count($reseps) > 0)
        @foreach($reseps as $resep)
            <div class="card mb-3">
                <img style="width:100%" src="/storage/images/{{ $resep->image }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $resep->title }}</h3>
                    <p class="card-text">{{ $resep->description }}</p>
                    <a href="/reseps/{{ $resep->id }}" class="btn btn-primary">Lihat Resep</a>
                </div>
            </div>
        @endforeach
    @else
        <p>No recipes found</p>
    @endif
@endsection
