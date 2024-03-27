<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Employee> $employees
 */
?>
<div class="employees index content">
    <!-- <?= $this->Html->link(__('New Employee'), ['action' => 'add'], ['class' => 'button float-right mr-2']) ?> -->
    <?= $this->Html->link(__('Activate Employees'), ['action' => 'commit'], ['class' => 'button float-right ml-2', 'id' => 'commit']) ?>
    <h3><?= __('Employees') ?></h3>

    <div class="table-responsive">
        <div class="progress">
            <div class="progress-bar" id="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <table id="employees">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('Status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee) : ?>
                    <tr>
                        <td><?= h($employee->name) ?></td>
                        <td><?= h($employee->email) ?></td>
                        <td><?= h($employee->active == 1 ? "Active" : "Inactive") ?></td>
                        <td><?= h($employee->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $employee->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>

</div>