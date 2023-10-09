{!!Form::model($jenis, [
	'route' => $jenis->exists ? ['jenis.update', $jenis->id] : 'jenis.store',
	'method' => $jenis->exists ? 'PUT' : 'POST'
])!!}

	<div class="form-group">
		<label for="" class="control-label">Nama Jenis</label>
		{!! Form::text('nama_jenis', null, ['class' => 'form-control', 'id' => 'nama_jenis']) !!}
	</div>

	<div class="form-group">
		<label for="" class="control-label">Kode Jenis</label>
		{!! Form::number('kode_jenis', null, ['class' => 'form-control', 'id' => 'kode_jenis']) !!}
	</div>
	<div class="form-group">
		<label for="" class="control-label">Keterangan</label>
		{!! Form::text('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan']) !!}
	</div>

{!! Form::close() !!}