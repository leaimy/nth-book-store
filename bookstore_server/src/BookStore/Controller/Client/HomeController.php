<?php

namespace BookStore\Controller\Client;

use BookStore\Model\Admin\ProductModel;
use \Ninja\NJBaseController\NJBaseController;

class HomeController extends NJBaseController
{
    
    private $product_model;
    public function __construct(ProductModel $product_model)
    {
        $this->product_model = $product_model;
    }

    public function render_home_page()
    {
        $product_all = $this->product_model->get_all_product();
        $product2 = $this->product_model->random_product(2);
        $product8 = $this->product_model->random_product(8);
        $this->view_handler->render('client/home.html.php',[
            'product_all' => $product_all,
            'product2' => $product2,
            'product8' => $product8
        ]);
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
