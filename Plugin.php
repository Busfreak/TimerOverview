<?php

namespace Kanboard\Plugin\TimerOverview;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

/**
 * TimerOverview
 *
 * @author  Martin Middeke
 */

class Plugin extends Base
{
    public function initialize()
    {
        // own hook, can be removed, when hook in core
        $this->template->setTemplateOverride('header/title', 'TimerOverview:header/title');
        $this->template->hook->attach('template:layout:header:title', 'TimerOverview:title');
        
        // Route to overview
        $this->route->addRoute('/TimerOverview', 'TimerOverviewController', 'index', 'TimerOverview');

        $this->template->hook->attach('template:dashboard:sidebar', 'TimerOverview:dashboard/sidebar');
        $this->template->hook->attach('template:dashboard:subtasks:header:before-timetracking', 'TimerOverview:subtasks/header');
        $this->template->hook->attach('template:dashboard:subtasks:rows', 'TimerOverview:subtasks/column');
        
        $container = $this->container;
        $this->hook->on('pagination:dashboard:subtask:query', function (\PicoDb\Table &$query) use ($container) {
            $query = $container['timerOverviewModel']->getIDs($query);
        });
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses()
    {
        return array(
            'Plugin\TimerOverview\Model' => array(
                'TimerOverviewModel'
            ),
        );
    }

    public function getHelpers()
    {
        return array(
            'Plugin\TimerOverview\Helper' => array(
                'TimerOverviewHelper'
            )
        );
    }

    public function getPluginName()
    {
        return 'TimerOverview';
    }

    public function getPluginDescription()
    {
        return t('Overview about running timers');
    }

    public function getPluginAuthor()
    {
        return 'Martin Middeke';
    }

    public function getPluginVersion()
    {
        return '0.0.1';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/busfreak/TimerOverview';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.37';
    }
}
