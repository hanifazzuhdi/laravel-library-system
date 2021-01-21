@extends('layouts.master-user')

@section('content')

<div class="container my-5">

    <h2 class="mb-4 pb-3 border-bottom">Daftar Buku Pinjaman</h2>

    <div class="d-flex justify-content-between flex-wrap">
        @forelse ($datas as $data)
        <div class="card mb-4" style="width: 18rem;">
            <img class="card-img-top" src="{{$data->book->cover}}" height="200px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-primary">{{$data->book->title}}</h5>
                <div class="info">
                    <small class="d-block">Penulis : {{$data->book->author->name}}</small>
                    <small class="d-block">ISBN : {{$data->book->isbn}}</small>
                    <hr>
                </div>
                <p class="card-text">{{ Str::substr($data->book->short_description, 0, 70)}} ...</p>
                <small> <span class="text-primary"> Batas Pengembalian </span> :
                    {{$data->returned_at->translatedFormat('d, F Y')}} </small>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <form action="{{route('user.kembalikan', [$data->book->id])}}" method="POST">
                    <button class="btn btn-outline-primary btn-sm btn-pinjam">Kembalikan</button>
                    @csrf
                </form>
            </div>
        </div>
        @empty
        <div class="alert alert-secondary my-5" role="alert">
            Belum Pinjam Buku
        </div>
        @endforelse
    </div>


</div>

@endsection
