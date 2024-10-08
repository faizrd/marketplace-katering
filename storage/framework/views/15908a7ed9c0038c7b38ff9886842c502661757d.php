<div class="row">
    <div class="col-md-5">
        <img class="img-responsive" src="<?php echo e(asset('assets/pictures/menu/'.$order->menu->pict)); ?>" >
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-5">
                <strong>Menu</strong>
            </div>
            <div class="col-md-7">
                : <?php echo e($order->menu->name); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Jumlah pesanan</strong>
            </div>
            <div class="col-md-7">
                : <?php echo e($order->qty); ?> Porsi
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Total bayar</strong>
            </div>
            <div class="col-md-7">
                : Rp. <?php echo e(number_format($order->total,0,',','.')); ?>,-
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <strong>Untuk tanggal</strong>
            </div>
            <div class="col-md-7">
                : <?php echo e(date('d M Y', strtotime($order->order_for))); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Jam</strong>
            </div>
            <div class="col-md-7">
                : <?php echo e(date('h:i A', strtotime($order->order_for))); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <strong>Pengantaran</strong>
            </div>
            <div class="col-md-7">
                : 
                <?php if($order->delivery == 1): ?>
                <label class="label label-success"> Ya </label>
                <?php else: ?> 
                <label class="label label-danger"> Tidak perlu </label>
                <?php endif; ?>
            </div>
        </div>
        <?php if($order->delivery == 1): ?>
        <div class="row">
            <div class="col-md-5">
                <strong>Antar ke alamat</strong>
            </div>
            <div class="col-md-7">
                : <?php echo e($order->to_addr); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
</div>