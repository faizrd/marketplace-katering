<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        
        <section class="content-header">
            <h1>
            Dashboard
            <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Home</li>
            </ol>
        </section>

        
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo e($pendingOrder); ?></h3>
                            <p>Pending Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('pending-order')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo e($completeOrder); ?></h3>
                            <p>Complete Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo e(route('all-order')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo e($userCount); ?></h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo e(route('customer.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo e($menuCount); ?></h3>
                            <p>Menu Available</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-navicon-round"></i>
                        </div>
                        <a href="<?php echo e(route('food-menu.index')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>