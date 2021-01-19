@extends('layouts.master', ['title' => 'Sistem Perpustakaan - Daftar Authors'])

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Daftar Penulis</h4>
        <button class="btn btn-sm btn-outline-primary btn-tambah" data-toggle="modal" data-target="#modalPenulis">
            Tambah
            Penulis </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->created_at->translatedFormat('l, d F Y H:i')}}</td>
                        <td>
                            <span class="btn btn-warning btn-sm btn-edit" data-id="{{$data->id}}" data-toggle="modal"
                                data-target="#modalPenulis"> Edit
                            </span>
                            <form class="d-inline form-hapus" action="" method="POST">
                                <button onclick="return confirm ('Yakin Hapus Data ?')" type="submit"
                                    class="btn btn-danger btn-sm btn-hapus" data-id="{{$data->id}}">
                                    Hapus </button>
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{$datas->links()}}
            </div>
        </div>
    </div>
</div>

@include('components.modal-penulis')

@endsection

@push('script')

<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

<script>
    $(function () {
        $('.btn-tambah').on('click', function (){
            $('.modal-title').html('Tambah Data Penulis')
            $('.modal-body form').attr('action', '/admin/authors/create');

            $('.name').val('');
        });

        $('.btn-edit').on('click', function (){
            const id = $(this).data('id');
            console.log(id);

            $('.modal-title').html('Ubah Data Penulis')
            $('.modal-body form').attr('action', '/admin/authors/update/' + id);

            $.ajax({
                url: 'authors/show/' + id,
                method: 'get',
                dataType: 'json',
                success: function (data){
                console.log(data);
                    $('.name').val(data.name);
                }
            });
        });

        $('.btn-hapus').on('click', function (){
            const id = $(this).data('id');

            $('.form-hapus').attr('action', '/admin/authors/delete/' + id );
        });
    });
</script>

@endpush
