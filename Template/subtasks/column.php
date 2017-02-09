<?php if ($this->TimerOverviewHelper->itsMyController()): ?>
<?php $editable = true ?>
            <td>
                <ul class="no-bullet">
                    <?php if ($editable && $subtask['user_id'] == $this->user->getId()): ?>
                    <li>
                        <?php if ($subtask['is_timer_started']): ?>
                            <?= $this->url->icon('pause', t('Stop timer'), 'SubtaskStatusController', 'timer', array('timer' => 'stop', 'project_id' => $subtask['project_id'], 'task_id' => $subtask['task_id'], 'subtask_id' => $subtask['id']), false, 'subtask-toggle-timer') ?>
                            (<?= $this->dt->age($subtask['timer_start_date']) ?>)
                        <?php else: ?>
                            <?= $this->url->icon('play-circle-o', t('Start timer'), 'SubtaskStatusController', 'timer', array('timer' => 'start', 'project_id' => $task['project_id'], 'task_id' => $subtask['task_id'], 'subtask_id' => $subtask['id']), false, 'subtask-toggle-timer') ?>
                        <?php endif ?>
                    </li>
                    <?php endif ?>
                </ul>
            </td>
<?php endif ?>