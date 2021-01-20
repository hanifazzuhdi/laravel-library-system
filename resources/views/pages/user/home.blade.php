@extends('layouts.master-user')

@section('content')

<div class="container my-5">

    <div class="d-flex justify-content-between border-bottom mb-4 pb-3">
        <h2 class="text-header">Daftar Buku</h2>

        <div class="search-filter">

            <form class="form-inline my-2 my-lg-0 d-inline" action="{{route('user.cari')}}" method="POST">
                <input class="form-control mr-sm-2" type="text" placeholder="cari judul, penulis, isbn ..."
                    name="keyword">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"
                        aria-hidden="true"></i></button>
                @csrf
            </form>

        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap">
        @foreach ($datas as $data)
        <div class="card mb-4" style="width: 18rem;">
            <img class="card-img-top" src="{{$data->cover}}" height="200px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-primary">{{$data->title}}</h5>
                <div class="info">
                    <small class="d-block">ISBN : {{$data->isbn}}</small>
                    <small class="d-block">Penulis : {{$data->author->name}}</small>
                    <small class="d-block">Buku Tersedia : {{$data->jumlah}}</small>
                    <hr>
                </div>
                <p class="card-text">{{ Str::substr($data->short_description, 0, 100)}} ...</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="#" class="btn btn-outline-primary btn-sm mr-2">Detail</a>
                <a href="#" class="btn btn-outline-success btn-sm btn-pinjam" data-target="#modalPinjam"
                    data-toggle="modal" data-id="{{$data->id}}">Pinjam</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end mt-3">
        {{$datas->links()}}
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalPinjam" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pinjam Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Judul Buku : </label>
                        <input type="text" class="form-control" name="title" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">ISBN : </label>
                        <input type="text" class="form-control" name="isbn" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Maks.Pinjam : </label>
                        <input type="text" class="form-control" value="1" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Pinjam : </label>
                        <input class="form-control" type="text" value="{{date('d-m-Y')}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Kembalikan : </label>
                        <input type="date" class="form-control" name="returned_at" min="{{date('Y-m-d')}}"
                            max="{{date('Y-m-d', time() + 60 * 60 * 24 * 7)}}">
                    </div>
                    <div class="form-group d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button class="btn btn-outline-primary" type="submit">Pinjam</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="modal-footer d-block text-primary">
                <small class="d-block">*Batas peminjaman buku hanya 7 Hari</small>
                <small>*Batas peminjaman Buku dengan judul yang sama hanya 1</small>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

<script>
    $(function () {
        $('.btn-pinjam').on('click', function (){
            const id = $(this).data('id');
            console.log(id);

            $('.modal-body form').attr('action', 'user/pinjam/' + id);

            $.ajax({
                url: 'book/show/' + id,
                method: 'get',
                dataType: 'json',
                success: function (data){
                    console.log(data);
                    $('input[name=title]').val(data.title);
                    $('input[name=isbn]').val(data.isbn);
                }
            });
        });
    });
</script>

@endpush
