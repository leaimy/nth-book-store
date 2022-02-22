<?php


namespace BookStore\Controller\Admin;


use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\ProductModel;
use BookStore\Model\Admin\UserModel;
use Ninja\NJBaseController\NJBaseController;

class UserController extends NJBaseController
{
    private $user_model;
    private $category_model;
    private $author_model;
    private $product_model;
    public function __construct(UserModel $user_model, CategoryModel $category_model, AuthorModel $author_model, ProductModel $product_model)
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        
        $this->user_model = $user_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
        $this->product_model = $product_model;
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
        $user = $this->user_model->signin($email, $password);
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);

        $product_all = $this->product_model->get_all_product();
        $product2 = $this->product_model->random_product(2);
        $product8 = $this->product_model->random_product(8);
        $category_random4 = $this->category_model->random_category(4);
        $author_random4 = $this->author_model->random_author(4);
        
        $product_author = $this->product_model->random_product_by_author( $author_random4[0]->id,4);
        
        if ($user == null) {
            $this->view_handler->render('client/user/signin.html.php',[
                'is_error' => true,
                'error_message' => 'Thông tin đăng nhập không hợp lệ',
                'category_random10' => $category_random10,
                'author_random10' => $author_random10,
                
            ]);
        }
        else {
            
            $_SESSION['user'] = $user;
            
            $this->route_redirect("/");
        }
    }
}
