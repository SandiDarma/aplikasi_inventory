@extends('adminlte::page')
@section('title', 'Aplikasi Inventaris')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="{{ url('/home') }}">Dashboard</a></li>
			<li class="active">Inventaris</li>
		</ul>
		<p>
			<a href="{{ route('inventaris.create') }}" class="btn btn-primary modal-show">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah </a>
			</p>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Inventaris</h2>
				</div>
				<div class="panel-body">
					<table id="datatable" class="table table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Kondisi</th>
								<th>Keterangan</th>
								<th>Jumlah</th>
								<th>Jenis</th>
								<th>Tanggal Register</th>
								<th>Ruang</th>
								<th>Kode Inventaris</th>
								<th>Petugas</th>
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
		ajax: "{{ route('table.inventaris') }}",
		columns: [
		{data: 'DT_RowIndex', name: 'id'},
		{data: 'nama_inventaris', name: 'nama_inventaris'},
		{data: 'kondisi', name: 'kondisi'},
		{data: 'keterangan', name: 'keterangan'},
		{data: 'jumlah', name: 'jumlah'},
		{data: 'jenis.nama_jenis', name: 'jenis.nama_jenis'},
		{data: 'tanggal_register', name: 'tanggal_register'},
		{data: 'ruang.nama_ruang', name: 'ruang.nama_ruang'},
		{data: 'kode_inventaris', name: 'kode_inventaris'},
		{data: 'users.name', name: 'users.name'},
		{data: 'action', name: 'action'}
		]
	});
</script>
@endpush
