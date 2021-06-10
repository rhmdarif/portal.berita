<x-admin-layout>

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 id="visitor_today">150</h3>

                                <p>Pengunjung Hari ini</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3 id="visitor">53</h3>

                                <p>Total Pengunjung</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3 id="post_today">44</h3>

                                <p>Kiriman Hari ini</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-send-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="post">65</h3>

                                <p>Total Kiriman</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-send"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <!-- /.nav-tabs-custom -->
                        <div class="box box-info">
                            <div class="box-header">
                                <h5 class="box-title">Pengunjung</h5>
                            </div>
                            <div class="box-body">
                                <div id="revenue-chart"
                                    style="position: relative; height: 300px;"></div>
                            </div>
                        </div>

                    </section>
                    <!-- /.Left col -->
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
        <x-slot name="js">
            <script>
                $(document).ready(() => {
                    loadDashboard()
                    loadChart()
                })

                function loadDashboard() {
                    $.get("{{ route('admin.data.dashboard') }}", (result) => {
                        console.log(result);
                        $('#visitor_today').text(result.visitor_today)
                        $('#visitor').text(result.visitor)
                        $('#post_today').text(result.post_today)
                        $('#post').text(result.post)
                    });
                }

                function loadChart() {
                    // Sales chart
                    $.get("{{ route('admin.data.dashboard.chart') }}", (result) => {
                        console.log(result);
                        var area = new Morris.Area({
                            element   : 'revenue-chart',
                            resize    : true,
                            data      : result,
                            xkey      : 'y',
                            ykeys     : ['post', 'visitor'],
                            labels    : ['Kiriman', 'Pengunjung'],
                            lineColors: ['#a0d0e0', '#3c8dbc'],
                            hideHover : 'auto'
                        });
                    });

                }
            </script>
        </x-slot>
</x-admin-layout>
