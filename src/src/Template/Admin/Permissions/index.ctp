<?php
$this->assign('title', __('Permissions') . ' | ' . __('Cake Application'));
$this->set('title', __('Permissions'));
$this->set('icon', 'fa-eye');

$sort   = $this->Paginator->sortKey();
$dir    = $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
$escape = ['escape' => false];
?>
<div>   
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group">
                <a href="/admin/permissions/add" class="btn btn-metis-4">
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
                <th scope="col"><?= $this->Paginator->sort('id', $this->Link->pagiArrow('Permissions.id', __('Id'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('prefix', $this->Link->pagiArrow('Permissions.prefix', __('Prefix'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('controller', $this->Link->pagiArrow('Permissions.controller', __('Controller'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('action', $this->Link->pagiArrow('Permissions.action', __('Action'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('description', $this->Link->pagiArrow('Permissions.description', __('Description'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', $this->Link->pagiArrow('Permissions.created', __('Created'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', $this->Link->pagiArrow('Permissions.modified', __('Modified'), $sort, $dir), $escape) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissions as $permission): ?>
                <tr>
                    <td><?= $this->Number->format($permission->id) ?></td>
                    <td><?= h($permission->prefix) ?></td>
                    <td><?= h($permission->controller) ?></td>
                    <td><?= h($permission->action) ?></td>
                    <td><?= h($permission->description) ?></td>
                    <td><?= isset($permission->created) ? h($permission->created->nice()) : '' ?></td>
                    <td><?= isset($permission->modified) ? h($permission->modified->nice()) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permission->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator', ['paginator' => $this->Paginator]); ?>
</div>
