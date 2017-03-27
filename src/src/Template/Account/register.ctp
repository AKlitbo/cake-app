<div class="form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
        echo $this->Form->input('display_name');
        echo $this->Form->input('username', ['label' => __('Email')]);
        echo $this->Form->input('password');
        echo $this->Form->input('confirm_password', ['label' => __('Confirm Password'), 'type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
