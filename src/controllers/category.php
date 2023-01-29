<?php
namespace src\Controllers;
class Category {
    private $categoriesTable;

    public function __construct($categoriesTable){
        $this->categoriesTable = $categoriesTable;
    }

    public function listcat(){
        $categories = $this->categoriesTable->findAll();

        return ['template' => 'category.php',
                'title' => 'Category List',
                'variables' => ['categories' => $categories]
                ];
    }

    public function delete(){
        $this->categoriesTable->delete($_POST['id']);

        header('location: /category/list');
    }

    public function edit(){
        if (isset($_POST['category'])) {

	
            $this->categoriesTable->save($_POST['category']);
        
            header('location: /category/list');
        }
        else {
        
            if (isset($_GET['id'])){
                $result = $this->categoriesTable->find('id', $_GET['id']);
                $category = $result[0];
            }
            else { 
                $category = false;
            }
            return [
                'template' => 'editcategory.php',
                'title' => 'Edit Category',
                'variables' => ['category' => $category]
            ];
        }
    }

    public function add(){
        if (isset($_POST['category'])) {

	
            $this->categoriesTable->save($_POST['category']);
        
            header('location: /category/list');
       
            return [
                'template' => 'addcategory.php',
                'title' => 'Add Category',
                'variables' => ['category' => $category]
            ];
        }
    }
}