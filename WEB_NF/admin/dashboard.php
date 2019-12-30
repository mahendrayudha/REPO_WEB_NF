<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script type="text/javascript" src="vendor/chart.js/Chart.js"></script>

  <title>Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper">
      <div class="container-fluid">

        <!-- Grafik Penjualan -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Grafik Pesanan
          </div>
          <!-- <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div> -->
          <div style="width: 800px; margin: 0px auto;">
	          <canvas id="myChart"></canvas>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Grafik -->
  <script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Buah Naga Merah", "Buah Naga Putih", "Jus Buah Naga", "Keripik Buah Naga", "Selai Buah Naga"],
			datasets: [{
				label: '',
				data: [
				<?php 
				$jumlah_buah_naga_merah = mysqli_query($conn,"SELECT detail_jual.ID_PRODUK FROM detail_jual INNER JOIN transaksi ON transaksi.ID_TRANSAKSI = detail_jual.ID_TRANSAKSI WHERE ID_PRODUK='P001'");
				echo mysqli_num_rows($jumlah_buah_naga_merah);
				?>, 
				<?php 
				$jumlah_buah_naga_putih = mysqli_query($conn,"SELECT detail_jual.ID_PRODUK FROM detail_jual INNER JOIN transaksi ON transaksi.ID_TRANSAKSI = detail_jual.ID_TRANSAKSI WHERE ID_PRODUK='P002'");
				echo mysqli_num_rows($jumlah_buah_naga_putih);
				?>, 
				<?php 
				$jumlah_jus = mysqli_query($conn,"SELECT detail_jual.ID_PRODUK FROM detail_jual INNER JOIN transaksi ON transaksi.ID_TRANSAKSI = detail_jual.ID_TRANSAKSI WHERE ID_PRODUK='P003'");
				echo mysqli_num_rows($jumlah_jus);
				?>, 
				<?php 
				$jumlah_keripik = mysqli_query($conn,"SELECT detail_jual.ID_PRODUK FROM detail_jual INNER JOIN transaksi ON transaksi.ID_TRANSAKSI = detail_jual.ID_TRANSAKSI WHERE ID_PRODUK='P004'");
				echo mysqli_num_rows($jumlah_keripik);
				?>,
        <?php 
				$jumlah_selai = mysqli_query($conn,"SELECT detail_jual.ID_PRODUK FROM detail_jual INNER JOIN transaksi ON transaksi.ID_TRANSAKSI = detail_jual.ID_TRANSAKSI WHERE ID_PRODUK='P005'");
				echo mysqli_num_rows($jumlah_selai);
				?>
				],
				backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 206, 86, 0.2)',
				'rgba(75, 192, 192, 0.2)'
				],
				borderColor: [
				'rgba(255,99,132,1)',
				'rgba(54, 162, 235, 1)',
				'rgba(255, 206, 86, 1)',
				'rgba(75, 192, 192, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
