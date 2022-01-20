<?php

namespace BookStore\Controller\Admin;

use Ninja\NJBaseController\NJBaseController;

class DashboardController extends NJBaseController
{
    public function index()
    {
        $this->view_handler->render('admin/dashboard.html.php');
    }
}
