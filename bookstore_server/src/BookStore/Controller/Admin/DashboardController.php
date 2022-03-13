<?php

namespace BookStore\Controller\Admin;

use BookStore\Controller\BookStoreBaseController;

class DashboardController extends BookStoreBaseController
{
    public function index()
    {
        $this->view_handler->render('admin/dashboard.html.php');
    }
}
