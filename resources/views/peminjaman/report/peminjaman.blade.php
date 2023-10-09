@extends('layouts.report')                                                                                                                                                                   
@section('content')
<table class="table table-howver">
    <thead>
        <tr colspan="2">                                            
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status Pinjaman</th>
            <th>Pegawai</th>
        </tr>
    </thead>
    <tbody>                                                                
        <tr colspan="2">                                                        
            <td>{{ $peminjaman->tanggal_pinjam }}</td>
            <td>{{ $peminjaman->tanggal_kembali }}</td>
            <td>{{ $peminjaman->status }}</td>
            <td>{{ $peminjaman->pegawai_id}}</td>
    </tbody>
</table>
@endsection         