<?php


namespace BookStore\Controller\Admin;



use BookStore\Controller\BookStoreBaseController;
use BookStore\Entity\Admin\AuthorEntity;
use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\MediaModel;
use Ninja\NinjaException;
use Ninja\NJTrait\Jsonable;

class AuthorController extends BookStoreBaseController
{ 
    use Jsonable;
    
    private $author_model;
    private $media_model; 

    public function __construct(AuthorModel $author_model, MediaModel $media_model)
    {
        $this->author_model = $author_model;
        $this->media_model = $media_model;
    }

    public function index()
    {
        $author_all = $this->author_model->get_all_author();
        $this->view_handler->render('admin/author/index.html.php',
            [
                'author_all'=>$author_all,
            ]);
    }

    public function create()
    {
        $this->view_handler->render('admin/author/create.html.php');
    }
    
    public function store()
    {
        try {
            $author = $_POST;
//            var_dump($_FILES);

            if (isset($_FILES['file_upload'])) {
                $new_media = $this->media_model->create_new_media($_FILES);
                $media_id = $new_media->id;
                $author[AuthorEntity::KEY_MEDIA_ID] = $media_id;
            }

            $this->author_model->create_new_author($author);

            $this->route_redirect('/admin/author');
        } catch (NinjaException $e) {
            // Xử lý lỗi do mình tự ném ra

            $this->view_handler->render('admin/author/create.html.php', [
                'name' => $_POST['name'] ?? null,
                'description' => $_POST['description'] ?? null,
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        } catch (Exception $e) {
            // Xử lý lỗi từ hệ thống server / PHP
        }
    }
    
    public function edit()
    {
        $id = $_GET['id'];
        $author = $this->author_model->get_by_id_author($id);
        $this->view_handler->render('admin/author/edit.html.php',[
            'author' => $author,
        ]);
    }
    
    public function update()
    {
        try {
            $author = $_POST;
            $id = $_POST['id'];

            if (!empty($_FILES['file_upload']['name'])) {
                // Người dùng cập nhật ảnh mới

                $new_media = $this->media_model->create_new_media($_FILES);
                $media_id = $new_media->id;
                $author[AuthorEntity::KEY_MEDIA_ID] = $media_id;
                $this->author_model->update_author($id, $author);
            } else {
                // Người dùng chỉ cập nhật thông tin cơ bản
                $this->author_model->update_author($id, $author);
            }


            $this->route_redirect('/admin/author');
        } catch (NinjaException $e) {
            // Xử lý lỗi do mình tự ném ra

            $this->view_handler->render('admin/author/edit.html.php', [
                'name' => $_POST['name'] ?? null,
                'description' => $_POST['description'] ?? null,
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        } catch (Exception $e) {
            // Xử lý lỗi từ hệ thống server / PHP
        }
    }
    
    public function delete()
    {
        $id = $_GET['id'];
        $this->author_model->delete_author($id);
        $this->route_redirect('/admin/author');
    }
    
    public function store_api()
    {
        try {
            $author = $_POST;
            
            if (isset($_FILES['file_upload'])) {
                $new_media = $this->media_model->create_new_media($_FILES);
                $media_id = $new_media->id;
                $author[AuthorEntity::KEY_MEDIA_ID] = $media_id;
            }

            $new_author = $this->author_model->create_new_author($author);
            
            // Phản hồi người dùng mới ở dạng JSON về cho client
            $this->response_json($new_author, 200);
            
        } catch (NinjaException $e) {
            // Phản hồi JSON lỗi về cho client để client hiển thị lỗi lên cho người dùng
            $this->response_json($e->getMessage(), 400);
        } catch (Exception $e) {
            // Phản hồi JSON lỗi về cho client để client hiển thị lỗi lên cho người 
            $this->response_json("Server xảy ra lỗi không xác định, vui lòng thử lại sau", 500);
        }
    }
    
    public function get_all()
    {
        $author_all = $this->author_model->get_all_author();
        $this->response_json($author_all,200);
    }
}
