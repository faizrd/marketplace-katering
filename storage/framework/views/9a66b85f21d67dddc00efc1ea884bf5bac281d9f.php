<div class="row">
    <div class="col-md-5">
        <img src="<?php echo e(asset('assets/pictures/menu/'.$order->menu->pict)); ?>" class="img-responsive" style="margin-bottom: 20px">
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-4">
                <strong>Customer</strong>
            </div>
            <div class="col-md-8">
                : <?php echo e($order->user->name); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Menu</strong>
            </div>
            <div class="col-md-8">
                : <?php echo e($order->menu->name); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>QTY</strong>
            </div>
            <div class="col-md-8">
                : <?php echo e($order->qty); ?> Porsi
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <strong>Date Time</strong>
            </div>
            <div class="col-md-8">
                : <?php echo e(date('d M Y - H:i', strtotime($order->order_for))); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Delivery</strong>
            </div>
            <div class="col-md-8">
                : 
                <?php if($order->delivery == 1): ?>
                    <label class="label label-success"> Yes </label>
                <?php else: ?> 
                    <label class="label label-danger"> No </label>
                <?php endif; ?>
            </div>
        </div>
        <?php if($order->delivery == 1): ?>
            <div class="row">
                <div class="col-md-4">
                    <strong>Address</strong>
                </div>
                <div class="col-md-8">
                    : <?php echo e($order->to_addr); ?>

                </div>
            </div>
        <?php endif; ?>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <strong>Total</strong>
            </div>
            <div class="col-md-8">
                : Rp. <?php echo e(number_format($order->total,0,',','.')); ?>,-
            </div>
        </div>
    </div>
</div>