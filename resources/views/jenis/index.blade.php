@extends('adminlte::page')
@section('title', 'Aplikasi Inventaris')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="{{ url('/home') }}">Dashboard</a></li>
			<li class="active">Jenis</li>
		</ul>
		<p>
			<a href="{{ route('jenis.create') }}" class="btn btn-primary modal-show">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah </a>
			</p>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Jenis</h2>
				</div>
				<div class="panel-body">
					<table id="datatable" class="table table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Jenis</th>
								<th>Kode Jenis</th>
								<th>Keterangan</th>
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
		ajax: "{{ route('table.jenis') }}",
		columns: [
		{data: 'DT_RowIndex', name: 'id'},
		{data: 'nama_jenis', name: 'nama_jenis'},
		{data: 'kode_jenis', name: 'kode_jenis'},
		{data: 'keterangan', name: 'keterangan'},
		{data: 'action', name: 'action'}
		]
	});
</script>
@endpush