<?php if (!empty($data)): ?>
    <div class="data_list">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                <th>Tanggal</th>
                <th>Nilai Uang</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php foreach ($data as $key => $value) { 
                $value = (object)$value;
                ?>
                <?php $total += $value->amount; ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value->date; ?></td>
                    <td><?php echo number_format($value->amount); ?></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><b>Total</b></td>
                <td><?php echo number_format($total); ?></td>
            </tr>
        </tfoot>
    </table>
    <div class="card-footer">
        <a href="<?php echo $urlDetail; ?>" class="btn btn-sm btn-link">Lihat Detail</a>
    </div>
</div>
<?php else: ?>
    <div class="data_list">
        <p>Tidak ada data</p>
    </div>
<?php endif; ?>