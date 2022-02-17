<?php


namespace BookStore\Controller\Client;


use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;
use Ninja\NJBaseController\NJBaseController;

class ProductClientController extends NJBaseController
{
    private $product_model;
    private $category_model;
    private $author_model;
    public function __construct(ProductModel $product_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        $this->product_model = $product_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
    }

    public function render_product_detail_page()
    {
        $id = $_GET['id'];
        $product = $this->product_model->get_by_id_product($id);
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        
        $this->view_handler->render('client/product/product-detail.html.php', [
            'product' => $product,
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
        ]);
    }

}
