@extends('layouts.master', ['title' => 'Sistem Perpustakaan - Daftar User'])

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
        <h4 class="m-0 font-weight-bold text-primary">Daftar User</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Verifikasi</th>
                        <th>Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Email Verifikasi</th>
                        <th>Ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{!!$data->email_verified_at ? $data->email_verified_at->translatedFormat('l, d F Y H:i') :
                            "<span class='text-danger'>Belum Verifikasi Email</span>" !!}
                        </td>
                        <td>{{$data->created_at->translatedFormat('l, d F Y H:i')}}</td>
                        <td>
                            <form class="d-inline form-hapus" action="" method="POST">
                                <button onclick="return confirm ('Yakin Hapus Data ?')" type="submit"
                                    class="btn btn-danger btn-sm btn-hapus" data-id="{{$data->id}}">
                                    <i class="fa fa-eraser" aria-hidden="true"></i> | Hapus </button>
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

@endsection

@push('script')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

<script>
    $(function () {
        $('.btn-hapus').on('click', function (){
            const id = $(this).data('id');

            $('.form-hapus').attr('action', 'users/delete/' + id);
        });
    });
</script>
@endpush
