<?php
namespace BookStore\Model\Admin;

use BookStore\Entity\Admin\CategoryEntity;
use Ninja\DatabaseTable;
use Ninja\NinjaException;

class CategoryModel
{
    private $category_table;

    public function __construct(DatabaseTable $category_table)
    {
        $this->category_table = $category_table;
    }

    public function get_all_category()
    {
        return $this->category_table->findAll();
    }
    
    public function get_by_id_category($id)
    {
        return $this->category_table->findById($id);
    }
    
    public function create_new_category($args)
    {
        if (empty($args[CategoryEntity::KEY_NAME]))
            throw new NinjaException('Vui lòng nhập tên thể loại');
        
        return $this->category_table->save([
            CategoryEntity::KEY_NAME => $args[CategoryEntity::KEY_NAME],
            CategoryEntity::KEY_DESCRIPTION => $args[CategoryEntity::KEY_DESCRIPTION] ?? null,
        ]);
    }
}
