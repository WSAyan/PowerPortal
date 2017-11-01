<?php
require_once 'model/Crud.php';
require_once 'utils/Redirect.php';
if (isset($_POST['username']) && isset($_POST['password'])) {
    $db = new Crud();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $db->logInAttempt($username, $password);
    if ($user != null) {
        $departments = $db->getAllDepartments();
        $clients = $db->getAllClients(1);
    } else {
        Redirect::loadPage("login.php");
    }
} else {
    Redirect::loadPage("login.php");
}

$selectedDept = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BIPortalDemo</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="view/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="view/plugins/iCheck/all.css">
    <link rel="stylesheet" href="view/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="view/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="view/dist/css/skins/_all-skins.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="admin.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>BI</b>P</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>BI</b>Portal</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that
                                            may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="view/dist/img/avatar04.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">Administrator</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="view/dist/img/avatar04.png" class="img-circle" alt="User Image">

                                <p>
                                    Administrator
                                    <small>Southtech Limited</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="index.php"><i class="fa fa-power-off"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboards</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?PHP
                        $i = 0;
                        foreach ($departments as $dept) {
                            if ($i == 0) {
                                $selectedDept = $dept['deptName'];
                                echo "<li class='active'><a href=\"admin.php\"><i class=\"fa fa-circle-o\"></i>{$dept['deptName']}</a></li>";
                            } /*else {
                                echo "<li><a href=\"admin.php\"><i class=\"fa fa-circle-o\"></i>{$dept['deptName']}</a></li>";
                            }*/
                            $i++;
                        }
                        ?>
                        <!--<li class="active"><a href="admin.php"><i class="fa fa-circle-o"></i> Ascend Financial</a>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Scaled</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> CAB</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Ascend Banking</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Ascend EE</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> S&R</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> HR</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> ITID</a></li>-->
                    </ul>
                </li>

                <li><a href="reports.php"><i class="fa fa-book"></i> <span>Create Report</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?PHP
                echo "{$selectedDept}"
                ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Clients</label>
                        <select id="clientList" class="form-control select2" style="width: 100%;">
                            <option value="0" selected="selected">All Clients</option>
                            <?PHP
                            foreach ($clients as $client) {
                                echo "<option value='{$client['id']}'>{$client['clientName']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Branches</label>
                        <select id="branchesList" class="form-control select2" style="width: 100%;">
                            <option value="0" selected="selected">All Branches</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Reports</label>
                        <select id="reportsList" class="form-control select2" style="width: 100%;">
                            <option value="0" selected="selected">Select Report</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title" id="biHeader"></h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--<iframe style="overflow:hidden;height:600px;width:100%"
                                            src="https://app.powerbi.com/view?r=eyJrIjoiOTRlOTE4YTYtNWUxNy00NmRjLTk5MWMtNDZmMmI1NTVlMjJmIiwidCI6ImQzMTI4N2U3LWZjN2ItNDVhZC04MTMxLThmZDVhY2ExMjNlNCIsImMiOjEwfQ%3D%3D"
                                            frameborder="0" allowFullScreen="true">
                                    </iframe>-->
                                    <iframe id="reportURLFrame"
                                            style="overflow:hidden;height:600px;width:100%"
                                            frameborder="0" allowFullScreen="true">
                                    </iframe>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2016 <a href="www.southtechgroup.com/">Southtech Limited</a>.</strong> All rights
    reserved.
</footer>


</div>

<script src="view/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="view/bootstrap/js/bootstrap.min.js"></script>
<script src="view/plugins/fastclick/fastclick.js"></script>
<script src="view/dist/js/app.min.js"></script>
<script src="view/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="view/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="view/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="view/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="view/plugins/chartjs/Chart.min.js"></script>
<script src="view/dist/js/pages/dashboard2.js"></script>
<script src="view/plugins/input-mask/jquery.inputmask.js"></script>
<script src="view/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="view/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="view/dist/js/demo.js"></script>
<script src="view/plugins/select2/select2.full.min.js"></script>
<script src="view/dist/js/demo.js"></script>
<script>
    $(function () {
        $(".select2").select2();
    });
</script>
<script src="view/dist/js/pages/admin.js"></script>
<script>
    admin.initialize();
</script>
</body>
</html>