<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HNMHP</title>

    @section('estilos')
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{asset('assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{asset('assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @show
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                        <!--
                            <img alt="image" class="img-circle" src="{{asset('assets/img/profile_small.jpg')}}" />
                            -->
                            <img alt="image" class="img-circle" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Grupo # 12</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Perfil</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}">Cerrar Sesion</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            HNMHP
                        </div>
                    </li>
                    <li class="active">
                        <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span> </a>
                    </li>
                    
                    <li>
                        <a href="layouts.html"><i class="fa fa-wheelchair"></i> <span class="nav-label">Paciente</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="graph_flot.html">Ingreso de paciente</a></li>
                            <li><a href="graph_morris.html">otros</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-medkit"></i> <span class="nav-label">Medicamentos</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="graph_flot.html">Ingreso de medicamento</a></li>
                            <li><a href="graph_morris.html">Ingreso de proveedores</a></li>
                        </ul>
                   
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Bienhechores</span>  <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/bienhechor/index')}}">Listado bienhechor</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-group"></i> <span class="nav-label">Empleado</span>  <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{url('/empleado/index')}}">Listado</a></li>
                            <li><a href="{{url('/empleado/add')}}">Ingreso empleado</a></li>
                            <li><a href="{{url('/empleado/index')}}">Ingreso antecedentes</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Usuario</span>  <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{url('/seguridad/index')}}">Listado</a></li>
                            <li><a href="javascript:void(0);" onclick="cargarmodalempleado(1);">Ingreso Usuario</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <!--
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                        -->
                    </div>

                    <!-- COLOCAR COLOR AL NAV -->
                    <ul class="nav navbar-top-links navbar-right ">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenido a HNMHP.</span>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}">
                                <i class="fa fa-sign-out"></i> Cerrar Sesion
                            </a>
                        </li>
                        <li>
                            <a class="right-sidebar-toggle">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <div class="row">
                <div class="wrapper wrapper-content">
                    @yield('contenido')
                    
                </div>

                <div class="footer">
                    <div class="pull-right">
                        <strong>AC.LL.LR.CR.</strong>
                    </div>
                    <div>
                        <strong>Copyright</strong> Grupo # 12 &copy; Control y Gestión Hermano Pedro
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('seguridad.usuario.create')
    

    <input type="hidden"  id="url_raiz_proyecto" value="{{ url("/") }}" />


    <!-- Mainly scripts -->
    @section('fin')
    <script src="{{asset('assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/js/plugins/flot/jquery.flot.pie.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('assets/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('assets/js/inspinia.js')}}"></script>
    <script src="{{asset('assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- GITTER -->
    <script src="{{asset('assets/js/plugins/gritter/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('assets/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('assets/js/demo/sparkline-demo.js')}}"></script>

    <!-- ChartJS-->
    <script src="{{asset('assets/js/plugins/chartJs/Chart.min.js')}}"></script>

    <!-- Toastr -->
    <script src="{{asset('assets/js/plugins/toastr/toastr.min.js')}}"></script>

    <!--rutas del empleado-->
    <meta name="_token" content="{!! csrf_token() !!}" />

    <script src="{{asset('assets/js/empleado/modal.js')}}"></script>
    <script src="{{asset('assets/js/empleado/usuario.js')}}"></script>


    <script src="{{asset('assets/js/plugins/validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/validate/jquery.validate.js')}}"></script>
    



    <script>
        $(document).ready(function() {
            /*
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.info('bienvenido a HNMHP');

            }, 1300);*/


            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            /*
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );
            */

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };

            /*
            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});
            */

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };
            
            /*var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});*/
        });
    </script>
    @show
</body>
</html>
