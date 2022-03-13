<?php

namespace BookStore\Controller;

use Ninja\NJBaseController\NJBaseController;

class BookStoreBaseController extends NJBaseController
{
    public function handle_on_invalid_authentication(array $args)
    {
        $this->view_handler->render('client/auth/sign_in.html.php');
    }

    public function handle_on_invalid_permission($args)
    {
        $this->view_handler->render('403.html.php');
    }

    public function handle_on_page_not_found($args)
    {
        $this->view_handler->render('404.html.php');
    }
}
