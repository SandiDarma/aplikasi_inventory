@extends('adminlte::page')
@section('title', 'Aplikasi Inventaris')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="{{ url('/home') }}">Dashboard</a></li>
			<li class="active">Peminjaman</li>
		</ul>
		<p>
			<a href="{{ route('peminjaman.create') }}" class="btn btn-primary modal-show">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah </a>
			</p>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Peminjaman</h2>
				</div>
				<div class="panel-body">
					<table id="datatable" class="table table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Pinjam</th>
								<th>Tanggal Kembali</th>
								<th>Status Pinjaman</th>
								<th>Pegawai</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$('#datatable').DataTable({
		responsive: true,
		processing: true,
		serverSide: true,
		ajax: "{{ route('table.peminjaman') }}",
		columns: [
		{data: 'DT_RowIndex', name: 'id'},
		{data: 'tanggal_pinjam', name: 'tanggal_pinjam'},
		{data: 'tanggal_kembali', name: 'tanggal_kembali'},
		{data: 'status', name: 'status'},
		{data: 'pegawai.nama_pegawai', name: 'pegawai.nama_pegawai'},
		{data: 'action', name: 'action'}
		]
	});
</script>
@endpush