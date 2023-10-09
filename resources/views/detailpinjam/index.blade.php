@extends('adminlte::page')
@section('title', 'Aplikasi Inventaris')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href="{{ url('/home') }}">Dashboard</a></li>
			<li class="active">Detail Pinjam</li>
		</ul>
		<p>
			<a href="{{ route('detailpinjam.create') }}" class="btn btn-primary modal-show">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah </a>
			</p>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">detailpinjam</h2>
				</div>
				<div class="panel-body">
					<table id="datatable" class="table table-hover" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Inventaris</th>
								<th>Jumlah</th>
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
		ajax: "{{ route('table.detailpinjam') }}",
		columns: [
		{data: 'DT_RowIndex', name: 'id'},
		{data: 'barang.nama_inventaris', name: 'barang.nama_inventaris'},
		{data: 'jumlah', name: 'jumlah'},
		{data: 'action', name: 'action'}
		]
	});
</script>
@endpush
