<?php
namespace BookStore\Model\Admin;

use Ninja\DatabaseTable;

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
}
