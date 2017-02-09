<?php

namespace Kanboard\Plugin\TimerOverview\Controller;

use Kanboard\Controller\BaseController;

/**
 * TimerOverview
 *
 * @package controller
 * @author  Martin Middeke
 */
class TimeroverviewController extends BaseController
{
    /**
     * TimerOverview index page
     *
     * @access public
     */
    public function index()
    {
        $user = $this->getUser();

        $this->response->html($this->helper->layout->dashboard('dashboard/subtasks', array(
            'title' => t('Running timers for %s', $this->helper->user->getFullname($user)),
            'paginator' => $this->subtaskPagination->getDashboardPaginator($user['id'], 'subtasks', 50),
            'user' => $user,
        )));
    }
}