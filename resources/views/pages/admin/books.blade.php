@extends('layouts.master', ['title' => 'Sistem Perpustakaan - Daftar Buku'])

@section('content')


<div class="container ">

    <div class="header my-5 d-flex justify-content-between">
        <h2 class="text-primary">Daftar Buku</h2>
        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalBuku">
            <i class="fa fa-book" aria-hidden="true"></i> | Tambah Buku
        </button>
    </div>

    <div class="d-flex justify-content-between flex-wrap">
        @foreach ($datas as $data)
        <div class="card mb-3" style="width: 18rem;">
            <img class="card-img-top" src="{{$data->cover}}" height="200px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-primary">{{$data->title}}</h5>
                <div class="info">
                    <small class="d-block">ISBN : {{$data->isbn}}</small>
                    <small class="d-block">Penulis : {{$data->author->name}}</small>
                    <small class="d-block">Jumlah Buku : {{$data->jumlah}}</small>
                    <hr>
                </div>
                <p class="card-text">{{ Str::substr($data->short_description, 0, 100)}} ...</p>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                <form class="d-inline form-hapus" action="" method="POST">
                    <button onclick="return confirm ('Yakin Hapus Data ?')" type="submit"
                        class="btn btn-danger btn-sm btn-hapus" data-id="{{$data->id}}">
                        Hapus </button>
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-2 d-flex justify-content-end">
        {{$datas->links()}}
    </div>
</div>

@include('components.modal-books')

@endsection

@push('script')

<script>
    $(function () {
        $('.btn-hapus').on('click', function (){
            const id = $(this).data('id');

            $('.form-hapus').attr('action', 'books/delete/' + id);
        });
    });
</script>

@endpush
