@extends('App.layout.admin_layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div>
                @include('App.message.success')
                @include('App.message.error')
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Blank</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="../../index.html">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Extra</a>
                        </li>
                        <li class="breadcrumb-item active">Blank</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Sample</strong> card</h2>
                    </div>
                    <div class="body">
                        <div class="col-lg-4">
                            <select  name="type" class="form-control" id=""  onchange="showChart(this.value);">
                              <option value="column">column</option>
                              <option value="bar">Bar</option>
                              <option value="pie">Pie</option>
                              <option value="pyramid">pyramid</option>
                              <option value="doughnut">Doughnut</option>

                            </select>

                        </div>


                        <script>


                            function showChart(charType){

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2", // "light1", "light2", "dark1", "dark2"
                            title: {
                                text: "Finanace Budget Report in Each Months  "
                            },
                            axisY: {
                                title: "Budget (in AFG )",
                                suffix: "AFG"
                            },
                            axisX: {
                                title: "Budget in the Each Months"
                            },
                            data: [{
                                type: charType,
                                yValueFormatString: "#,##0.0#\"AFG\"",
                                dataPoints: [
                                    { label: "اعاشه", y: {{$type1[0]->type1 }} },
                                    { label: "متفریقه", y: {{$type2[0 ]->type2 }} },
                                    { label: "ټول معاشات", y: {{$type2[0]->type2 }} },
                                    { label: "اوپراتیفی  بودیجه", y: 2.50 },


                                ]
                            }]
                        });
                        chart.render();
                           }
                           window.onload = function () {
                           showChart('column');
                        }
                        </script>

                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script src="{{ asset('assets/js/canvasjs.min.js')}}"></script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
