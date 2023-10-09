{!!Form::model($inventaris, ['route' => $inventaris->exists ? ['inventaris.update', $inventaris->id] : 'inventaris.store',
'method' => $inventaris->exists ? 'PUT' : 'POST' ])!!}

<div class="form-group">
	<label for="" class="control-label">Nama</label>
	{!! Form::text('nama_inventaris', null, ['class' => 'form-control', 'id' => 'nama_inventaris']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Kondisi</label>
	{!! Form::text('kondisi', null, ['class' => 'form-control', 'id' => 'kondisi']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Keterangan</label>
	{!! Form::text('keterangan', null, ['class' => 'form-control', 'id' => 'keterangan']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Jumlah</label>
	{!! Form::number('jumlah', null, ['class' => 'form-control', 'id' => 'jumlah']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Jenis</label>
	<select name="jenis_id" class="select2 form-control" id="cariJenis" style="width: 100%;">
	</select>
</div>

<div class="form-group">
	<label for="" class="control-label">Tanggal Register</label>
	{!! Form::date('tanggal_register', null, ['class' => 'form-control', 'id' => 'tanggal_register']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Ruang</label>
	<select name="ruang_id" class="select2 form-control" id="cariRuang" style="width: 100%;">
	</select>
</div>

<div class="form-group">
	<label for="" class="control-label">Kode Inventaris</label>
	{!! Form::number('kode_inventaris', null, ['class' => 'form-control', 'id' => 'kode_inventaris']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Petugas</label>
	<select name="users_id" class="select2 form-control" id="cariUsers" style="width: 100%;">
	</select>
</div>

<script type="text/javascript">
	$('#cariUsers').select2({
		placeholder: 'Cari...',
		ajax: {
			url: '/cari/users',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.name,
							id: item.id
						}
					})
				};
			},
			cache: true
		}
	});
</script>
<script type="text/javascript">
	$('#cariRuang').select2({
		placeholder: 'Cari...',
		ajax: {
			url: '/cari/ruang',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.nama_ruang,
							id: item.id
						}
					})
				};
			},
			cache: true
		}
	});
</script>

<script type="text/javascript">
	$('#cariJenis').select2({
		placeholder: 'Cari...',
		ajax: {
			url: '/cari/jenis',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.nama_jenis,
							id: item.id
						}
					})
				};
			},
			cache: true
		}
	});
</script>
{!! Form::close() !!}
