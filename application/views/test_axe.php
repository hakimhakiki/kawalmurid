<html>
<head>
<title>Test Axe</title>
<!-- Halaman ini hanya untuk keperluan testing tabel menggunakan module axe -->
</head>
<body>
	<?php echo "Table size:". $table_size; ?>
	<table border="1" style="border-width: 1pt">
		<thead>
			<tr>
				<th>NO</th>
				<th>NAME</th>
				<th>BALANCE</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(!is_null($data_list)){
					foreach ($data_list as $ds) {?>
			<tr>
				<td><input type="number" name="no" value="<?php echo $ds['no'];?>"></td>
				<td><input type="text" name="name" value="<?php echo $ds['name'];?>"></td>
				<td><input type="number" name="balance" value="<?php echo $ds['balance']?>"></td>
				<td><a href="#">Ubah</a> <a href="<?php echo base_url('Axe/deleteRow/'. $ds['no'])?>">Hapus</a></td>
			</tr>
			<?php }}?>
			<tr>
				<form method="post" action="<?php echo base_url('Axe/addRow'); ?>">
				<td><input type="number" name="no"></td>
				<td><input type="text" name="name"></td>
				<td><input type="number" name="balance"></td>
				<td><input type="submit" value="Simpan Sementara"></td>
				</form>
			</tr>
		</tbody>
	</table>
</body>
</html>