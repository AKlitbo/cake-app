<?php
$this->assign('title', __('Edit User') . ' | ' . __('Cake Application'));
$this->set('title', __('Edit User'));
$this->set('icon', 'fa-user');
?>
<div class="">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
        echo $this->Form->input('display_name');
        echo $this->Form->input('username', ['label' => __('Email')]);
        echo $this->Form->input('role_id', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
