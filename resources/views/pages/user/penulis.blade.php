@extends('layouts.master-user')

@section('content')

<div class="container my-5">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center bg-light py-3">
            <h4> Daftar Penulis </h4>
        </li>

        @foreach ($datas as $data)
        @if ($data->books->count())
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <p>ID Penulis : {{$data->id}}</p>
                <p>Nama Penulis : {{$data->name}}</p>
                <p>Jumlah Buku Terbitan : {{ $data->books->count() }}</p>
            </div>
            <button class="btn badge badge-primary badge-pill p-2">Detail</button>
        </li>
        @endif
        @endforeach
    </ul>
</div>

@endsection
