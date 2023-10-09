{!!Form::model($ruang, [
	'route' => $ruang->exists ? ['ruang.update', $ruang->id] : 'ruang.store',
	'method' => $ruang->exists ? 'PUT' : 'POST'
])!!}

	<div class="form-group">
		<label for="" class="control-label">Nama Ruang</label>
		{!! Form::text('nama_ruang', null, ['class' => 'form-control', 'id' => 'nama_ruang']) !!}
	</div>

	<div class="form-group">
		<label for="" class="control-label">Kode Ruang</label>
		{!! Form::number('kode_ruang', null, ['class' => 'form-control', 'id' => 'kode_ruang']) !!}
	</div>
	<div class="form-group">
		<label for="" class="control-label">Keterangan</label>
		{!! Form::text('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan']) !!}
	</div>

{!! Form::close() !!}