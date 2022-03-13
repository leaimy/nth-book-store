<?php


namespace BookStore\Controller\Client;


use BookStore\Controller\BookStoreBaseController;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;

class ProductClientController extends BookStoreBaseController
{
    private $product_model;
    private $category_model;
    private $author_model;
    
    public function __construct(ProductModel $product_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        parent::__construct();
        
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
    
    public function render_product_all_page()
    {
        $product_all = $this->product_model->get_all_product();
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);

        $this->view_handler->render('client/product/product-all.html.php', [
            'product_all' => $product_all,
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
        ]);
    }

    public function render_product_by_category_page()
    {
        $id = $_GET['id'];
        $product_by_category = $this->product_model->product_by_category($id);
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);

        $this->view_handler->render('client/product/product-by-category.html.php', [
            'product_by_category' => $product_by_category,
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
        ]);
    }

    public function render_product_by_author_page()
    {
        $id = $_GET['id'];
        $product_by_author = $this->product_model->product_by_author($id);
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);

        $this->view_handler->render('client/product/product-by-author.html.php', [
            'product_by_author' => $product_by_author,
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
        ]);
    }

}
