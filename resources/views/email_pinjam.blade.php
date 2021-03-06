@component('mail::message')
# Anda Meminjam Buku dari Perpustakaan Bisa

Pinjaman :
- judul : {{$data->title}}

Terimakasih, jangan lupa kembalikan bukunya<br>
{{ config('app.name') }}
@endcomponent
