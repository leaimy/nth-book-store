<?php


namespace BookStore\Controller\Admin;


use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;
use BookStore\Model\Admin\UserModel;
use Ninja\Authentication;
use Ninja\NJBaseController\NJBaseController;

class UserController extends NJBaseController
{
    private $user_model;
    private $category_model;
    private $author_model;
    private $product_model;
    private $authentication_helper;
    
    public function __construct(UserModel $user_model, CategoryModel $category_model, AuthorModel $author_model, ProductModel $product_model, Authentication $authentication_helper)
    {
        parent::__construct();
        
        $this->user_model = $user_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
        $this->product_model = $product_model;
        $this->authentication_helper = $authentication_helper;
    }

    public function store()
    {
        $users = $_POST;
        
        $this->user_model->create_new_user($users);
        
        $this->route_redirect('/signin');
    }
    
    public function signin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $is_login = $this->authentication_helper->login($email, $password);
        
        if ($is_login == true) {
            $this->route_redirect("/");
        }
        else {
            $this->route_redirect("/signin?error=1");
        }
    }
}
