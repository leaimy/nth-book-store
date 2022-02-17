<?php


namespace BookStore\Controller\Client;


use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;
use Ninja\NJBaseController\NJBaseController;

class ProductClientController extends NJBaseController
{
    private $product_model;
    private $category_model;
    public function __construct(ProductModel $product_model, CategoryModel $category_model)
    {
        $this->product_model = $product_model;
        $this->category_model = $category_model;
    }

    public function render_product_detail_page()
    {
        $id = $_GET['id'];
        $product = $this->product_model->get_by_id_product($id);
        
        $this->view_handler->render('client/product/product-detail.html.php', [
            'product' => $product,
        ]);
    }

}
