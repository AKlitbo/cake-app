<?php
$this->assign('title', __('Roles') . ' | ' . __('Cake Application'));
$this->set('title', __('Roles'));
$this->set('icon', 'fa-id-card');

$sort   = $this->Paginator->sortKey();
$dir    = $this->Paginator->sortDir() === 'asc' ? 'up' : 'down';
$escape = ['escape' => false];
?>
<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group">
                <a href="/admin/roles/add" class="btn btn-metis-4">
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
                <th scope="col"><?= $this->Paginator->sort('id', $this->Link->pagiArrow('Roles.id', __('Id'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', $this->Link->pagiArrow('Roles.name', __('Name'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', $this->Link->pagiArrow('Roles.created', __('Created'), $sort, $dir), $escape) ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified', $this->Link->pagiArrow('Roles.modified', __('Modified'), $sort, $dir), $escape) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= $this->Number->format($role->id) ?></td>
                    <td><?= h($role->name) ?></td>
                    <td><?= isset($role->created) ? h($role->created->nice()) : '' ?></td>
                    <td><?= isset($role->modified) ? h($role->modified->nice()) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator', ['paginator' => $this->Paginator]); ?>
</div>
