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
            <li class="nav-item active">
                <a class="nav-link" href="produkPenjualan.php">
                    <i class="fas fa-solid fa-box"></i>
                    <span>Produk Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pemasukan.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Total Pemasukan</span>
                </a>
            </li>
            <li class="nav-item">
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
                <a class="nav-link" href="penjualan_wilayah.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Penjualan Setiap Wilayah</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="laporan-penjualan.php">
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
                                                Produk Terjual</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php  
                                                $host       = "localhost";
                                                $user       = "root";
                                                $password   = "";
                                                $database   = "fp_dwo_9";
                                                $mysqli     = mysqli_connect($host, $user, $password, $database);

                                                $sql = "SELECT COUNT(product_id) as product_id from fact_sales";
                                                $query = mysqli_query($mysqli,$sql);
                                                while($row2=mysqli_fetch_array($query)){
                                                    echo number_format($row2['product_id'],0,".",","). " Pcs";
                                                }
                                                ?>  
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-solid fa-box fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Penjualan Produk Tahun 2012</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT COUNT(fs.product_id) product FROM fact_sales fs JOIN time t ON fs.time_id=t.time_id WHERE t.year='2012'";
                                            $query = mysqli_query($mysqli,$sql);
                                                while($row2=mysqli_fetch_array($query)){
                                                    echo number_format($row2['product'],0,".",","). " Pcs";
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-shopping-basket fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Penjualan Produk Tahun 2013</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT COUNT(fs.product_id) product FROM fact_sales fs JOIN time t ON fs.time_id=t.time_id WHERE t.year='2013'";
                                            $query = mysqli_query($mysqli,$sql);
                                                while($row2=mysqli_fetch_array($query)){
                                                    echo number_format($row2['product'],0,".",","). " Pcs";
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-shopping-basket fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Penjualan Produk Tahun 2014</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            $sql = "SELECT COUNT(fs.product_id) product FROM fact_sales fs JOIN time t ON fs.time_id=t.time_id WHERE t.year='2014'";
                                            $query = mysqli_query($mysqli,$sql);
                                                while($row2=mysqli_fetch_array($query)){
                                                    echo number_format($row2['product'],0,".",","). " Pcs";
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-shopping-basket fa-2x text-gray-300"></i>
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

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Produk Terjual </h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php";?>
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
    
    <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
        }

        // Area Chart Example
        <?php
        $host= "localhost";
        $user= "root";
        $password= "";
        $database= "fp_dwo_9";
        $conn= mysqli_connect($host, $user, $password, $database);
        $bulan = "SELECT CONCAT(MONTHNAME(t.tanggal_lengkap), ' ', YEAR(t.tanggal_lengkap)) bulan FROM fact_sales fs JOIN time t ON fs.time_id=t.time_id GROUP BY t.month ORDER BY t.tanggal_lengkap";
        $product = "SELECT COUNT(fs.product_id) product FROM fact_sales fs JOIN time t ON fs.time_id=t.time_id GROUP BY t.month ORDER BY t.tanggal_lengkap";
        $i=1;
        $query_bulan=mysqli_query($conn, $bulan);
        $jumlah_bulan = mysqli_num_rows($query_bulan);
        $chart_bulan="";
        while($row=mysqli_fetch_array($query_bulan)){
            if ($i<$jumlah_bulan) {
              $chart_bulan.='"';
              $chart_bulan.=$row['bulan'];
              $chart_bulan.='",';
              $i++;
            }else{
              $chart_bulan.='"';
              $chart_bulan.=$row['bulan'];
              $chart_bulan.='"';
            }
        }
        $a=1;
        $query_product = mysqli_query($conn, $product);
        $jumlah_product = mysqli_num_rows($query_product);
        $chart_product="";
        while ($row1=mysqli_fetch_array($query_product)) {
            if ($a<$jumlah_product) {
                $chart_product.=$row1['product'];
                $chart_product.=',';
                $a++;
            }else{
                $chart_product.=$row1['product'];
            }
        }
        ?>
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo $chart_bulan; ?>],
            datasets: [{
            label: "Produk terjual",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php echo $chart_product;?>],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
            },
            scales: {
            xAxes: [{
                time: {
                unit: 'date'
                },
                gridLines: {
                display: false,
                drawBorder: false
                },
                ticks: {
                maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                    return '' + number_format(value);
                }
                },
                gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
                }
            }],
            },
            legend: {
            display: false
            },
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
            }
            }
        }
        });
    </script>
</body>
</html>