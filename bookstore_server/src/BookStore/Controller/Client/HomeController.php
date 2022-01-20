<?php

namespace BookStore\Controller\Client;

use \Ninja\NJBaseController\NJBaseController;

class HomeController extends NJBaseController
{
    public function render_home_page()
    {
        $this->view_handler->render('client/home.html.php');
    }

    public function render_product_detail_page()
    {
        $this->view_handler->render('client/home.html.php');
    }

    public function render_cart_page()
    {
        $this->view_handler->render('client/home.html.php');
    }
}
