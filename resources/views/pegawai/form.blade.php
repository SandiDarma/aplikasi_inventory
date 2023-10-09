{!!Form::model($pegawai, [
	'route' => $pegawai->exists ? ['pegawai.update', $pegawai->id] : 'pegawai.store',
	'method' => $pegawai->exists ? 'PUT' : 'POST'
])!!}

	<div class="form-group">
		<label for="" class="control-label">Nama Pegawai</label>
		{!! Form::text('nama_pegawai', null, ['class' => 'form-control', 'id' => 'nama_pegawai']) !!}
	</div>

	<div class="form-group">
		<label for="" class="control-label">NIP</label>
		{!! Form::text('nip', null, ['class' => 'form-control', 'id' => 'nip']) !!}
	</div>
	<div class="form-group">
		<label for="" class="control-label">Alamat</label>
		{!! Form::text('alamat', null, ['class' => 'form-control', 'id' => 'alamat']) !!}
	</div>

{!! Form::close() !!}