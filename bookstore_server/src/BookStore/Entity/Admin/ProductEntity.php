<?php


namespace BookStore\Entity\Admin;


use BookStore\Model\Admin\AuthorModel;
use BookStore\Model\Admin\CategoryModel;
use BookStore\Model\Admin\MediaModel;
use BookStore\Model\Admin\ProductModel;

class ProductEntity
{
    const PRIMARY_KEY = 'id';
    const TABLE = 'products';
    const CLASS_NAME = '\\BookStore\\Entity\\Admin\\ProductEntity';
    
    const KEY_ID = 'id';
    const KEY_NAME = 'name';
    const KEY_AUTHOR_ID = 'author_id';
    const KEY_CATEGORY_ID = 'category_id';
    const KEY_SALE_PRICE = 'sale_price';
    const KEY_UNIT_PRICE = 'unit_price';
    const KEY_QUANTITY = 'quantity';
    const KEY_DESCRIPTION = 'description';
    const KEY_MEDIA_ID = 'media_id';
    const KEY_CREATED_AT = 'created_at';
    
    public $id;
    public $name;
    public $author_id;
    public $category_id;
    public $sale_price;
    public $unit_price;
    public $quantity;
    public $description;
    public $media_id;
    public $created_at;
    
    private $media_model;
    private $product_model;
    private $category_model;
    private $author_model;
    
    public function __construct(MediaModel $media_model, ProductModel $product_model, CategoryModel $category_model, AuthorModel $author_model)
    {
        $this->media_model = $media_model;
        $this->product_model = $product_model;
        $this->category_model = $category_model;
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
    
    public function get_category_name()
    {
        if (!$this->category_id) return null;
        
        return $this->category_model->get_by_id_category($this->category_id)->{CategoryEntity::KEY_NAME};
    }

    public function get_author_name()
    {
        if (!$this->author_id) return null;

        return $this->author_model->get_by_id_author($this->author_id)->{AuthorEntity::KEY_NAME};
    }
    
}
