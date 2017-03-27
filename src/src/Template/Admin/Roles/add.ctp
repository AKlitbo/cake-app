<?php
$this->assign('title', __('Add Role') . ' | ' . __('Cake Application'));
$this->set('title', __('Add Role'));
$this->set('icon', 'fa-eye');
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
