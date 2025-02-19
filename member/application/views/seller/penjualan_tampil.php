<div class="container py-4">
	<h5>Data Transaksi Penjualan <?php echo $this->session->userdata('nama_member') ?></h5>
	<table class="table table-bordered" id="tabelku">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Total</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($jual as $k => $v): ?>
				
			<tr>
				<td><?php echo $k+1; ?></td>
				<td><?php echo $v['tanggal_transaksi']; ?></td>
				
				<td>Rp <?php echo number_format($v['total_transaksi']) ?><br>
				<b class="text-bold">Resi: <?php echo $v['resi_ekspedisi']; ?></b>
			
				</td>
				<td>
				<span class="badge bg-dark"><?php echo $v['status_transaksi'] ?></span>
				</td>
				<td>
					<a href="<?php echo base_url("seller/penjualan/detail/".$v["id_transaksi"]) ?>" class="btn btn-info">Detail</a>
				</td>
			</tr>

			<?php endforeach ?>
		</tbody>
	</table>
</div>