<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <title>Penjualan</title>
</head>
<body id="page-top">
    <div id="wrapper">

    <!-- Sidebar -->
        <ul class="navbar-nav bg-orange sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Kelompok 9<sup>B</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Grafik Penjualan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="produkPenjualan.php">
                    <i class="fas fa-solid fa-box"></i>
                    <span>Produk Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pemsukan.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Total Pemasukan</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="wilayah.php">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Wilayah</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Penjualan Setiap Wilayah</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Penjualan Setiap Tahun</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include "navbar.php";?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Wilayah</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php  
                                                    $host       = "localhost";
                                                    $user       = "root";
                                                    $password   = "";
                                                    $database   = "fp_dwo_9";
                                                    $mysqli     = mysqli_connect($host, $user, $password, $database);

                                                    $sql = "SELECT COUNT(DISTINCT(territory_id)) as jumlah_wilayah from territory";
                                                        $query = mysqli_query($mysqli,$sql);
                                                            while($row2=mysqli_fetch_array($query)){
                                                                echo number_format($row2['jumlah_wilayah'],0,".",".");
                                                            }
                                                ?>  
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- <div class="row">
                        <iframe src="http://localhost:8080/mondrian/" style="height:1000px; width:100%; border:none; align-content:center"> </iframe>
                    </div> -->
                    <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Kategori Wilayah dengan Transaksi terbanyak</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body-store">
                                    <div class="chart-area-store">
                                        <div id="canvas-holder" style="width:100%">
                                            <canvas id="chart-area"></canvas>
                                        </div>
                                        <!-- <canvas id="myAreaChart"></canvas> -->
                                        <?php
                                            $host       = "localhost";
                                            $user       = "root";
                                            $password   = "";
                                            $database   = "fp_dwo_9";
                                            $mysqli     = mysqli_connect($host, $user, $password, $database);
                                            $wilayah = mysqli_query($mysqli,"SELECT DISTINCT(territory_name), COUNT(fs.product_id) as total FROM fact_sales fs JOIN territory tr ON fs.territory_id = tr.territory_id GROUP BY tr.territory_name ORDER BY total DESC");
                                            while($row = mysqli_fetch_array($wilayah)){
                                                $jenis_wilayah[] = $row['territory_name'];

                                                $query = mysqli_query($mysqli,"SELECT COUNT(fs.product_id) as total FROM fact_sales fs JOIN territory tr ON fs.territory_id = tr.territory_id WHERE tr.territory_name='".$row['territory_name']."'");
                                                $row = $query->fetch_array();
                                                $total[] = $row['total'];
                                            };        
                                        ?>
                                        <figure class="highcharts-figure">
                                            <div id="container"></div>
                                            <p class="highcharts-description"></p>
                                        </figure>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script>
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data:<?php echo json_encode($total); ?>,
                    backgroundColor: [
                    '#191970',
                    '#0000CD',
                    '#0000FF',
                    '#4169E1',
                    '#4682B4',
                    '#912CEE',
                    '#7B68EE',
                    '#6495ED',
                    '#00BFFF',
                    '#87CEFA',
                    '#B0C4DE',
                    '#48D1CC',
                    '#7FFFD4',
                    '#AFEEEE',
                    '#E0FFFF',
                    ],
                    label: 'Presentase wilayah customer terbanyak'
                }],
                labels: <?php echo json_encode($jenis_wilayah); ?>},
            options: {
                responsive: true
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('chart-area').getContext('2d');
            window.myPie = new Chart(ctx, config);
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myPie.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var newDataset = {
                backgroundColor: [],
                data: [],
                label: 'New dataset ' + config.data.datasets.length,
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());

                var colorName = colorNames[index % colorNames.length];
                var newColor = window.chartColors[colorName];
                newDataset.backgroundColor.push(newColor);
            }

            config.data.datasets.push(newDataset);
            window.myPie.update();
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            config.data.datasets.splice(0, 1);
            window.myPie.update();
        });
    </script>



    
</body>
</html>