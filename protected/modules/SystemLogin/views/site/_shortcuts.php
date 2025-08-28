<div class="card-body p-0">
    <p class="card-subtitle mb-2"><?php echo $data['data']['totalItem']; ?></p>
    <h4 class="card-amount mt-3"><?php echo 'Rp. ' . number_format($data['data']['total'], 2, ',', '.'); ?></h4>
    <div class="py-2"></div>
    <a href="<?php echo CHtml::normalizeUrl($data['data']['urlDetail']); ?>" class="detail-link btn-sm btn btn-light fs-6 px-0 btn_hov_disable">
        View Detail
        <i class="bi bi-chevron-down"></i>
    </a>
</div>