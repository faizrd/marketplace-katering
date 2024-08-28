<aside class="main-sidebar">
    <section class="sidebar">
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span><strong>Dashboard</strong></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-circle-o"></i> Home</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span><strong>Order</strong></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo e(route('pending-order')); ?>">
                            <i class="fa fa-circle-o"></i> Pending Orders
                            <span class="pull-right-container">
                                <?php if($count1 != 0): ?>
                                    <span class="label label-info pull-right"><?php echo e($count1); ?></span>
                                <?php endif; ?>
                                <?php if($count0 != 0): ?>
                                    <span class="label label-warning pull-right"><?php echo e($count0); ?></span>
                                <?php endif; ?>
                            </span>
                        </a>
                    </li>
                    <li><a href="<?php echo e(route('all-order')); ?>"><i class="fa fa-circle-o"></i> Completly Orders</a></li>
                </ul>
            </li>
            <li><a href="<?php echo e(route('customer.index')); ?>"><i class="fa fa-user"></i> <span><strong>Customer</strong></span></a></li>
            <li><a href="<?php echo e(route('food-menu.index')); ?>"><i class="fa fa-cog"></i> <span><strong>Food Menu</strong></span></a></li>
            
        </ul>
    </section>
</aside>