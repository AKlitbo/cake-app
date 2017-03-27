<?php
$this->assign('title', __('Users') . ' | ' . __('Cake Application'));
$this->set('title', __('Users'));
$this->set('icon', 'fa-users');

$sort   = $this->Paginator->sortKey();
$dir    = $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
$escape = ['escape' => false];
?>
<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group">
                <a href="/admin/users/add" class="btn btn-metis-4">
                    <i class="fa fa-plus"></i>&nbsp;Add
                </a>
            </div>    
            <div class="pull-right">   
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-metis-6" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', $this->Link->pagiArrow('Users.id', __('Id'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('username', $this->Link->pagiArrow('Users.username', __('Email'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_name', $this->Link->pagiArrow('Users.display_name', __('Name'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id', $this->Link->pagiArrow('Users.role_id', __('Role'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified', $this->Link->pagiArrow('Users.verified', __('Verified'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_login', $this->Link->pagiArrow('Users.last_login', __('Last Login'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', $this->Link->pagiArrow('Users.created', __('Created'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', $this->Link->pagiArrow('Users.modified', __('Modified'), $sort, $dir), $escape) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= h($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->display_name) ?></td>
                    <td><?= $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) ?></td>
                    <td><?= $user->verified ? 'Yes' : 'No' ?></td>
                    <td><?= isset($user->last_login) ? h($user->last_login->nice()) : '' ?></td>
                    <td><?= isset($user->created) ? h($user->created->nice()) : '' ?></td>
                    <td><?= isset($user->modified) ? h($user->modified->nice()) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>                
    </table> 
    <?= $this->element('paginator', ['paginator' => $this->Paginator]); ?>
</div>
