<?php


namespace BookStore\Entity\Admin;


use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\MediaModel;

class AuthorEntity
{
    const PRIMARY_KEY = 'id';
    const TABLE = 'authors';
    const CLASS_NAME = '\\BookStore\\Entity\\Admin\\AuthorEntity';

    const KEY_ID = 'id';
    const KEY_NAME = 'name';
    const KEY_DESCRIPTION = 'description';
    const KEY_MEDIA_ID = 'media_id';
    const KEY_CREATED_AT = 'created_at';

    public $id;
    public $name;
    public $description;
    public $media_id;
    public $created_at;

    // Tạo biến private lưu trữ tham chiếu đến media_model
    private $media_model;
    private $author_model;

    // Truyền media_model thông qua constructor
    public function __construct(MediaModel $media_model, AuthorModel  $author_model)
    {
        $this->media_model = $media_model;
        $this->author_model = $author_model;
    }

    // Viết hàm getter để lấy đối tượng media
    public function get_media_entity()
    {
        if (!$this->media_id) return null;

        return $this->media_model->get_by_id($this->media_id);
    }

    // Viết hàm để lấy media_path nhanh
    public function get_media_path()
    {
        $entity = $this->get_media_entity();
        if ($entity == null) return null;

        return $entity->{MediaEntity::KEY_MEDIA_PATH};
    }

    public function get_media_name()
    {
        $entity = $this->get_media_entity();
        if ($entity == null) return null;

        return $entity->{MediaEntity::KEY_MEDIA_NAME}; 
    }
}
