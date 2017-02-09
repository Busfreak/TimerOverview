        <li <?= $this->app->checkMenuSelection('TimerOverviewController', 'index') ?>>
            <?= $this->url->link(t('Timers'), 'TimerOverviewController', 'index', array('plugin' => 'TimerOverview')) ?>
        </li>