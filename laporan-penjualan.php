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
    <!-- Script Chart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <title>Penjualan Wilayah</title>
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
            <li class="nav-item active">
                <a class="nav-link" href="penjualan-wilayah.php">
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

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pemasukan Setiap Tahun</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Pending Requests Card Example -->
            <div class="col-xl-8 col-lg-7 mb-4">
            </div>
        </div>

        <!-- Content Row -->

        <div class="row col-xl-12">
            <!--nia-->
            <!-- Area Chart -->
            
            <!--nia-->

            <!--tika-->
            <!-- Pie Chart -->
            <div class="col-xl-8 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pemasukan Tiap Tahun</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body-store">
                        <div class="chart-area-store">
                            <!-- <canvas id="myAreaChart"></canvas> -->
                            <?php
                            $host       = "localhost";
                            $user       = "root";
                            $password   = "";
                            $database   = "fp_dwo_9";
                            $mysqli     = mysqli_connect($host, $user, $password, $database);
                            // Chart Pertama 
    
                            // Query Total Semua Amount
                            $sql = "SELECT SUM(line_total) AS line_total FROM fact_sales";
                            $tot = mysqli_query($mysqli, $sql);
                            $tot_amount = mysqli_fetch_row($tot);

                            // Query Data Store dan Total Amountnya

                            $sql = "SELECT CONCAT('name:',t.year) as tahun, CONCAT('y:', SUM(fs.line_total)*100/" . $tot_amount[0] .") as y, CONCAT('drilldown:', t.year) as drilldown 
                            FROM time t
                            JOIN fact_sales fs ON (t.time_id = fs.time_id) 
                            GROUP BY year 
                            ORDER BY y DESC";
                            $all_kat = mysqli_query($mysqli,$sql);
                            while($row = mysqli_fetch_all($all_kat)) {
                                $data[] = $row;
                            }
                            $json_all_kat = json_encode($data);

                            // Chart Kedua

                            // Query SUM(Amount) Semua Kategori Film
                            $sql = "SELECT t.year tahun, sum(fs.line_total) as tot_kat
                            FROM fact_sales fs
                            JOIN time t ON (t.time_id = fs.time_id)
                            GROUP BY tahun";
                            $hasil_kat = mysqli_query($mysqli,$sql);
                            while ($row = mysqli_fetch_all($hasil_kat)) {
                                $tot_all_kat[] = $row;
                            }

                            function cari_tot_kat($kat_dicari, $tot_all_kat){
                                $counter = 0;
                                while ( $counter < count($tot_all_kat[0]) ) {
                                    if ($kat_dicari == $tot_all_kat[0][$counter][0]) {
                                        $tot_kat = $tot_all_kat[0][$counter][1];
                                        return $tot_kat;
                                    }
                                    $counter++;
                                }
                            }

                            // Query untuk ambil total penjualan di kategori berdasarkan bulan
                            $sql = "SELECT t.year tahun, t.month as bulan, SUM(fs.line_total) as pendapatan_kat
                            FROM time t
                            JOIN fact_sales fs ON (t.time_id = fs.time_id)
                            -- JOIN time t ON (t.time_id = fp.time_id)
                            GROUP BY tahun, bulan";
                            $det_kat = mysqli_query($mysqli,$sql);

                            $i = 0;
                            while ($row = mysqli_fetch_all($det_kat)) {
                                $data_det[] = $row;
                            }

                            // DATA DRILL DOWN
                            $i = 0;

                            // Inisiasi String DATA
                            $string_data = "";
                            $string_data .= '{nama:"' . $data_det[0][$i][0] . '", id:"' . $data_det[0][$i][0] . '", data: [';

                            foreach($data_det[0] as $a){
                                if($i < count($data_det[0])-1){
                                    if($a[0] != $data_det[0][$i+1][0]){
                                        $string_data .= '["' . $a[1] . '", ' . $a[2]*100/cari_tot_kat($a[0], $tot_all_kat) . ']]},';
                                        $string_data .= '{name:"' . $data_det[0][$i+1][0] . '", id:"' . $data_det[0][$i+1][0] . '", data: [';
                                    }
                                    else {
                                        $string_data .= '["' . $a[1] . '", ' . $a[2]*100/cari_tot_kat($a[0], $tot_all_kat) . '], ';
                                    }
                                }
                                else {
                                    $string_data .= '["' . $a[1] . '", ' . $a[2]*100/cari_tot_kat($a[0], $tot_all_kat). ']]}';
                                }

                                $i = $i+1;
                            }

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

    <!-- Page level custom scripts -->
    <script type="text/javascript">
    // Create the chart
        Highcharts.chart('container', {
            chart: {
            type: 'pie'
        },
        title: {
            text: 'Persentase Lokasi Penjualan (AdventureWorks)'},
            subtitle: {
                text:'Klik di potongan pie chart untuk melihat detil nilai pemasukan tiap tahunnya'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                },
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                series:{
                    dataLabels: {
                        enabled: true,
                        format:'{point.name}: {point.y:.1f}%'
                    }
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
            },
            series: [
                {
                    name: "Penjualan Setiap Tahun",
                    colorByPoint: true,
                    data:
                        <?php
                        $datanya = $json_all_kat;
                        $data1 = str_replace('["', '{"',$datanya) ;
                        $data2 = str_replace('"]', '"}',$data1) ;
                        $data3 = str_replace('[[', '[', $data2);
                        $data4 = str_replace(']]', ']', $data3);
                        $data5 = str_replace(':', '" : "', $data4);
                        $data6 = str_replace('"name"', 'name', $data5);
                        $data7 = str_replace('"drilldown"', 'drilldown', $data6);
                        $data8 = str_replace('"y"', 'y', $data7);
                        $data9 = str_replace('",', ',', $data8);
                        $data10 = str_replace(',y', '",y', $data9);
                        $data11 = str_replace(',y : "', ',y : ', $data10);
                        echo $data11;
                        ?>
                }
            ],
            drilldown: {
                series: [
                    <?php
                    echo $string_data;
                    ?>
                ]
            }
        });
    </script>
    
</body>
</html>