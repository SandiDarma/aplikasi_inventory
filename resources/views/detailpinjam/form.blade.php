{!!Form::model($detailpinjam, ['route' => $detailpinjam->exists ? ['detailpinjam.update', $detailpinjam->id] : 'detailpinjam.store',
'method' => $detailpinjam->exists ? 'PUT' : 'POST' ])!!}
<div class="form-group">
	<label for="" class="control-label">Nama Inventaris</label>
	<select name="inventaris_id" class="select2 form-control" id="cari" style="width: 100%;">
	</select>
</div>

<div class="form-group">
	<label for="" class="control-label">Jumlah Inventaris</label>
	{!! Form::number('jumlah', null, ['class' => 'form-control', 'id' => 'jumlah']) !!}
</div>

<script type="text/javascript">
	$('#cari').select2({
		placeholder: 'Cari...',
		ajax: {
			url: '/cari/inventaris',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results: $.map(data, function (item) {
						return {
							text: item.nama_inventaris,
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
