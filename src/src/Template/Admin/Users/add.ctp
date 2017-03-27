<?php
$this->assign('title', __('Add User') . ' | ' . __('Cake Application'));
$this->set('title', __('Add User'));
$this->set('icon', 'fa-user');
?>
<div class="">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
        echo $this->Form->input('display_name');
        echo $this->Form->input('username', ['label' => __('Email')]);
        echo $this->Form->input('password');
        echo $this->Form->input('confirm_password', ['label' => __('Confirm Password'), 'type' => 'password']);
        echo $this->Form->input('role_id', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
