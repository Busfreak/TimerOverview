<?php

namespace Kanboard\Plugin\TimerOverview\Helper;

use Kanboard\Core\Base;

/**
 * TimerOverview Helper
 *
 * @package helper
 * @author  Martin Middeke
 */
class TimerOverviewHelper extends Base
{
    /**
     * Count running timers
     *
     * @access public
     * @return integer
     */
     public function countRunningTimers()
    {
        return $this->timerOverviewModel->countRunningTimers();
    }

    /**
     * check if current controller is TimerOverviewController
     *
     * @access public
     * @return bool
     */
     public function itsMyController()
    {
        return $this->router->getController() === 'TimerOverviewController';
    }
}