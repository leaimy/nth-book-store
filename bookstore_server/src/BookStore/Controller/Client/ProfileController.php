<?php

namespace BookStore\Controller\Client;

use \Ninja\NJBaseController\NJBaseController;

class ProfileController extends NJBaseController
{
    public function render_profile_dashboard_page()
    {
        $this->view_handler->render('client/user/my-profile.html.php');
    }

    public function render_profile_update_page()
    {
        $this->view_handler->render('client/user/my-profile.html.php');
    }

    public function render_profile_order_page()
    {
        $this->view_handler->render('client/user/my-profile.html.php');
    }
}
