<?php
/* @var $this yii\web\View */

use common\models\Tasks;
use common\models\Employee;

//echo Tasks::getCountVerifiedTask();
//exit();
$this->title = 'รายงานการใช้ระบบแจ้งงาน';
?>
<div class="site-index">

    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue-gradient"><i class="fa fa-sticky-note-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">การแจ้งงาน</span>
                        <span class="info-box-number"><?php echo Tasks::getCountTask(); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red-gradient"><i class="fa fa-thumbs-o-down"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">งานที่ยังไม่แก้ไข</span>
                        <span class="info-box-number"><?php echo Tasks::getCountPendingTask(); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green-gradient"><i class="fa fa-thumbs-o-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">งานที่แก้ไขเสร็จ</span>
                        <span class="info-box-number"><?php echo Tasks::getCountVerifiedTask(); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow-gradient"><i class="fa fa-check-square-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">รอตรวจสอบจากผู้แจ้ง</span>
                        <span class="info-box-number"><?php echo Tasks::getCountCompleteTask() ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red-gradient"><i class="fa fa-close"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">ไม่ผ่านการตรวจสอบ</span>
                        <span class="info-box-number"><?php echo Tasks::getCountRejectTask(); ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-6">
                <!-- MAP & BOX PANE -->

                <!-- /.box -->
                <div class="row">

                    <!-- /.col -->


                </div>
                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">5 อันดับผู้ใช้ที่แจ้งงานมากที่สุด</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>อันดับที่</th>
                                        <th>ชื่อ</th>
                                        <th>จำนวนงานที่แจ้ง</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">1</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="label label-danger">Shipped</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">2</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="label label-danger">Shipped</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">3</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="label label-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">4</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="label label-info">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">5</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="label label-success">Processing</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <!-- MAP & BOX PANE -->

                <!-- /.box -->
                <div class="row">

                    <!-- /.col -->


                </div>
                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">5 อันดับผู้ใช้ที่แจ้งงานมากที่สุด</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>อันดับที่</th>
                                        <th>ชื่อ</th>
                                        <th>จำนวนงานที่แจ้ง</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">1</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="label label-danger">Shipped</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">2</a></td>
                                        <td>Call of Duty IV</td>
                                        <td><span class="label label-danger">Shipped</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">3</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="label label-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">4</a></td>
                                        <td>iPhone 6 Plus</td>
                                        <td><span class="label label-info">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td><a href="pages/examples/invoice.html">5</a></td>
                                        <td>Samsung Smart TV</td>
                                        <td><span class="label label-success">Processing</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-blue-gradient">
                        <div class="widget-user-image">
                            <img class="img-circle" src="uploads/employee/Chaiwat.jpg" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">Chaiwat Sisawang</h3>
                        <h5 class="widget-user-desc">IT</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">การแจ้งงาน <span class="pull-right badge bg-aqua">31</span></a></li>
                            <li><a href="#">รอการตรวจสอบจากผู้แจ้ง <span class="pull-right badge bg-yellow">5</span></a></li>
                            <li><a href="#">งานที่แก้ไขเสร็จ <span class="pull-right badge bg-green">12</span></a></li>
                            <li><a href="#">งานที่ยังไม่แก้ <span class="pull-right badge bg-red">842</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->
            <div class="col-md-3">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <div class="widget-user-image">
                            <img class="img-circle" src="uploads/employee/Chaiwat.jpg" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">Chaiwat Sisawang</h3>
                        <h5 class="widget-user-desc">IT</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">การแจ้งงาน <span class="pull-right badge bg-aqua">31</span></a></li>
                            <li><a href="#">รอการตรวจสอบจากผู้แจ้ง <span class="pull-right badge bg-yellow">5</span></a></li>
                            <li><a href="#">งานที่แก้ไขเสร็จ <span class="pull-right badge bg-green">12</span></a></li>
                            <li><a href="#">งานที่ยังไม่แก้ <span class="pull-right badge bg-red">842</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-3">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <div class="widget-user-image">
                            <img class="img-circle" src="uploads/employee/Chaiwat.jpg" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">Chaiwat Sisawang</h3>
                        <h5 class="widget-user-desc">IT</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">การแจ้งงาน <span class="pull-right badge bg-aqua">31</span></a></li>
                            <li><a href="#">รอการตรวจสอบจากผู้แจ้ง <span class="pull-right badge bg-yellow">5</span></a></li>
                            <li><a href="#">งานที่แก้ไขเสร็จ <span class="pull-right badge bg-green">12</span></a></li>
                            <li><a href="#">งานที่ยังไม่แก้ <span class="pull-right badge bg-red">842</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            <div class="col-md-3">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <div class="widget-user-image">
                            <img class="img-circle" src="uploads/employee/Chaiwat.jpg" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">Chaiwat Sisawang</h3>
                        <h5 class="widget-user-desc">IT</h5>
                    </div>
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">การแจ้งงาน <span class="pull-right badge bg-aqua">31</span></a></li>
                            <li><a href="#">รอการตรวจสอบจากผู้แจ้ง <span class="pull-right badge bg-yellow">5</span></a></li>
                            <li><a href="#">งานที่แก้ไขเสร็จ <span class="pull-right badge bg-green">12</span></a></li>
                            <li><a href="#">งานที่ยังไม่แก้ <span class="pull-right badge bg-red">842</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div>
    </section>
</div>