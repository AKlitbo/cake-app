<?php
$this->assign('title', __('Edit Role') . ' | ' . __('Cake Application'));
$this->set('title', __('Edit Role'));
$this->set('icon', 'fa-id-card');
?>
<div class="">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <?php
        echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
