<?php
$this->assign('title', __('Add Permission') . ' | ' . __('Cake Application'));
$this->set('title', __('Add Permission'));
$this->set('icon', 'fa-eye');
?>
<div class="">
    <?= $this->Form->create($permission) ?>
    <fieldset>
        <?php
        echo $this->Form->input('prefix');
        echo $this->Form->input('controller');
        echo $this->Form->input('action');
        echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
