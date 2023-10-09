{!!Form::model($peminjaman, ['route' => $peminjaman->exists ? ['peminjaman.update', $peminjaman->id] : 'peminjaman.store',
'method' => $peminjaman->exists ? 'PUT' : 'POST' ])!!}

<div class="form-group">
	<label for="" class="control-label">Tanggal Pinjam</label>
	{!! Form::date('tanggal_pinjam', null, ['class' => 'form-control', 'id' => 'tanggal_pinjam']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Tanggal Kembali</label>
	{!! Form::date('tanggal_kembali', null, ['class' => 'form-control', 'id' => 'tanggal_kembali']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Status Peminjaman</label>
	{!! Form::text('status', null, ['class' => 'form-control', 'id' => 'status']) !!}
</div>

<div class="form-group">
	<label for="" class="control-label">Pegawai</label>
	<select name="pegawai_id" class="select2 form-control" id="cari" style="width: 100%;">
	</select>
</div>

<script type="text/javascript">
	$('#cari').select2({
		placeholder: 'Cari...',
		ajax: {
			url: '/cari/pegawai',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.nama_pegawai,
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