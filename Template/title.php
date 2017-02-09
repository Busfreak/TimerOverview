<?php if ($this->TimerOverviewHelper->countRunningTimers() > 0 and !$this->TimerOverviewHelper->itsMyController()): ?>
    <?= $this->url->link('[' . t('running timers: %d', $this->TimerOverviewHelper->countRunningTimers()) . ']', 'TimerOverviewController', 'index', array('plugin' => 'TimerOverview'), false, t('running timers: ')) ?>
<?php endif ?>