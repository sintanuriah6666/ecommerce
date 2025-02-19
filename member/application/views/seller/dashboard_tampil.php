<div class="container py-5">
    <h1 class="text-center mb-4">Dashboard Penjualan</h1>

    <!-- Date Range Filter -->
    <div class="row mb-4">
    <div class="col-md-12 text-center">
        <form method="get" action="<?= site_url('seller/dashboard') ?>" class="p-3 border rounded shadow-sm bg-light">
            <h5 class="mb-3" style="color: #e91e63;">Filter by Date</h5>

            <div class="form-row justify-content-center">
                <div class="col-md-4 mb-3">
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" style="border-color: #e91e63;">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="end_date" class="form-label">End Date:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" style="border-color: #e91e63;">
                </div>
            </div>

            <button type="submit" class="btn" style="background-color: #f06292; color: white; border: none;">Filter</button>
        </form>
    </div>
</div>

  
<!-- Existing content for charts -->
<div class="row">
    <!-- Total Penjualan per Bulan -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm" style="border: 1px solid #e91e63; background-color: #f8bbd0;">
            <div class="card-body">
                <h3 class="text-center" style="color: #e91e63;">Total Penjualan per Bulan</h3>
                <canvas id="totalPenjualanChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Produk Terlaris -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm" style="border: 1px solid #e91e63; background-color: #f8bbd0;">
            <div class="card-body">
                <h3 class="text-center" style="color: #e91e63;">Produk Terlaris</h3>
                <canvas id="produkTerlarisChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Row for Status Transaksi -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm" style="border: 1px solid #e91e63; background-color: #f8bbd0;">
            <div class="card-body">
                <h3 class="text-center" style="color: #e91e63;">Status Transaksi</h3>
                <canvas id="statusTransaksiChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Pendapatan per Transaksi -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm" style="border: 1px solid #e91e63; background-color: #f8bbd0;">
            <div class="card-body">
                <h3 class="text-center" style="color: #e91e63;">Pendapatan per Transaksi</h3>
                <canvas id="pendapatanTransaksiChart"></canvas>
            </div>
        </div>
    </div>
</div>



<script>
  document.getElementById('applyFilter').addEventListener('click', function () {
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;

    // Sending the date range to the server via AJAX
    $.ajax({
        url: '<?php echo site_url("dashboard/filter"); ?>',  // Your route to filter data
        method: 'POST',
        data: {
            start_date: startDate,
            end_date: endDate
        },
        success: function(response) {
            // Update the charts with the filtered data
            updateCharts(response);
        }
    });
});

function updateCharts(data) {
    const totalPenjualanData = data.total_penjualan;
    const produkTerlarisData = data.produk_terlaris;
    const statusTransaksiData = data.status_transaksi;
    const pendapatanData = data.pendapatan_per_transaksi;

    // Update Total Penjualan Chart
    const months = totalPenjualanData.map(item => item.bulan + '/' + item.tahun);
    const totalPenjualan = totalPenjualanData.map(item => item.total_penjualan);
    updateChart('totalPenjualanChart', months, totalPenjualan);

    // Update Produk Terlaris Chart
    const produkNames = produkTerlarisData.map(item => item.nama_produk);
    const produkSold = produkTerlarisData.map(item => item.jumlah_terjual);
    updateChart('produkTerlarisChart', produkNames, produkSold);

    // Update Status Transaksi Chart
    const statusLabels = statusTransaksiData.map(item => item.status_transaksi);
    const statusCounts = statusTransaksiData.map(item => item.jumlah_transaksi);
    updatePieChart('statusTransaksiChart', statusLabels, statusCounts);

    // Update Pendapatan per Transaksi Chart
    const transaksiKode = pendapatanData.map(item => item.kode_transaksi);
    const totalTransaksi = pendapatanData.map(item => item.total_transaksi);
    updateChart('pendapatanTransaksiChart', transaksiKode, totalTransaksi);
}

function updateChart(chartId, labels, data) {
    new Chart(document.getElementById(chartId), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Data',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });
}

function updatePieChart(chartId, labels, data) {
    new Chart(document.getElementById(chartId), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Data',
                data: data,
                backgroundColor: ['#FF5733', '#33FF57', '#FF33A1', '#3357FF'],
            }]
        }
    });
}

</script>

