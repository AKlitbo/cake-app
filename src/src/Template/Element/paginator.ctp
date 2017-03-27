<div class="row paginator">
    <div class="col-sm-6">
        <p><?= $paginator->counter(['format' => __('Displaying {{start}} to {{end}} of {{count}} record(s).')]) ?></p>
    </div>
    <div class="col-sm-6">
        <ul class="pagination pull-right">
            <?= $paginator->first('<i class="fa fa-angle-double-left"></i> ' . __('First'), ['escape' => false]) ?>
            <?= $paginator->prev('<i class="fa fa-angle-left"></i> ' . __('Previous'), ['escape' => false]) ?>
            <?= $paginator->numbers() ?>
            <?= $paginator->next(__('Next') . ' <i class="fa fa-angle-right"></i>', ['escape' => false]) ?>
            <?= $paginator->last(__('Last') . ' <i class="fa fa-angle-double-right"></i>', ['escape' => false]) ?>
        </ul>   
    </div>
</div>