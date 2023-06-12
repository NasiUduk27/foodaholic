@extends('layouts.template')
@section('sidebar')
@include('layouts.sidebar', array('level' => 'admin'))
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" id="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <script>
                  var user=<?php echo json_encode($user) ?>;
                  console.log(Highcharts)
                  Highcharts.chart('container',{
                    title:{
                      text:'User'
                    },
                    xAxis:{
                      categories:['May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
                    },
                    yAxis:{
                      title:{
                        text:'Number of User'
                      }
                    },
                    series:[{
                      name:'User',
                      data:user
                    }]
                  });
                </script>
                
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

@endsection
