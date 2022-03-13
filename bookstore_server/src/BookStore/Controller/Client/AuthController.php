<?php


namespace BookStore\Controller\Client;



use BookStore\Entity\Admin\UserEntity;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\UserModel;
use BookStore\Controller\BookStoreBaseController;
use Ninja\Authentication;
use Ninja\NinjaException;

class AuthController extends BookStoreBaseController
{
    private $authentication_helper;
    private $user_model;
    private $category_model;
    private $author_model;

    public function __construct(Authentication $authentication_helper, UserModel $user_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        parent::__construct();

        $this->authentication_helper = $authentication_helper;
        $this->user_model = $user_model;
        $this->category_model = $category_model;
        $this->author_model = $author_model;
    }
    
    public function sign_in()
    {
        $is_error = $_GET['error'] ?? null;
        $error_message = '';

        if ($is_error == 1) {
            $error_message = 'Thông tin đăng nhập không hợp lệ';
        }

        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        $this->view_handler->render('client/auth/signin.html.php',[
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
            'is_error' => $is_error,
            'error_message' => $error_message
        ]);
    }

    public function sign_up()
    {
        $category_random10 = $this->category_model->random_category(10);
        $author_random10 = $this->author_model->random_author(10);
        $this->view_handler->render('client/auth/signup.html.php',[
            'category_random10' => $category_random10,
            'author_random10' => $author_random10,
        ]);
    }

    public function process_sign_in()
    {
        try {
            $user_name = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;

            if (is_null($user_name))
                throw new NinjaException('Vui lòng nhập thông tin đăng nhập');

            if (is_null($password))
                throw new NinjaException('Vui lòng nhập mật khẩu');

            $succeed = $this->authentication_helper->login($user_name, $password);

            if (!$succeed)
                throw new NinjaException('Thông tin đăng nhập không hợp lệ');

            $this->route_redirect('/');
        } catch (\Exception $e) {
            // TODO: Handle login error
            die($e->getMessage());
        }
    }

    public function process_register()
    {
        try {
//            $first_name = $_POST['first_name'] ?? null;
//            $last_name = $_POST['last_name'] ?? null;
//            $user_name = $_POST['user_name'] ?? null;
//            $password = $_POST['password'] ?? null;
//           
//
//            if (is_null($first_name) || is_null($last_name) || is_null($user_name) || is_null($password) || is_null($repassword))
//                throw new NinjaException('Vui lòng điền đầy đủ thông tin');

           $user = $_POST;

            $this->user_model->create_new_user($user);

            $this->route_redirect('/auth/sign-in');
        }
        catch (NinjaException $exception) {
            // TODO: Handle register user error
            die($exception->getMessage());
        }
    }

    public function log_user_out()
    {
        $this->authentication_helper->logout();
        $this->route_redirect('/');
    }
}
