@extends('layouts.master', ['title' => 'Sistem Perpustakaan - Daftar Authors'])

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h4 class="m-0 font-weight-bold text-primary">Daftar Penulis</h4>
        <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#modalTambahPenulis"> Tambah
            Penulis </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->created_at->translatedFormat('l, d F Y H:i')}}</td>
                        <td>
                            <span class="btn btn-warning btn-sm"> Edit </span>
                            <span class="btn btn-danger btn-sm"> Hapus </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahPenulis" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Penulis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.authors.strote')}}" method="post">
                    <div class="form-group">
                        <label>Nama Penulis : </label>
                        <input type="text" class="form-control" placeholder="Nama Penulis ...">
                    </div>

                    <div class="form-group d-flex justify-content-end mt-4 mb-1">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-start">
                <small class="text-primary"> Silahkan tekan save jika anda sudah yakin </small>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

@endsection
