@extends('layouts.app')

    @section('title', 'Despacho App')

    @section('content')
        <!-- page content -->
        <div class="right_col" role="main">
          
          
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph x_panel">
                  <div class="row x_title">
                    <div class="col-md-6">
                      <h3><small>Movimeintos mensuales</small></h3>
                    </div>
                    <div class="col-md-6">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>Septiembre 30, 2020 - Octubre 28, 2020</span> <b class="caret"></b>
                      </div>
                    </div>
                  </div>
                  <div class="x_content">
                    <div class="demo-container" style="height:250px">
                      <div id="chart_plot_03" class="demo-placeholder"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <!-- /page content -->

    @endsection