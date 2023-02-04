<?php
namespace src\Controllers;
class Category {
    private $categoriesTable;

    public function __construct($categoriesTable){
        $this->categoriesTable = $categoriesTable;
    }
//controller which uses data from the table category
    public function listcat(){
        $categories = $this->categoriesTable->findAll();

        return ['template' => 'category.php',
                'title' => 'Category List',
                'variables' => ['categories' => $categories]
                ];
                
    }


    public function deletecategory() {
                        
        if (array_key_exists('delete', $_POST)) {
                $this->categoriesTable->delete($_POST['id']);
        
                header('location: /category');
            }
        }
        public function editCategory() {
            $Id = $_GET['id'] ?? null;
            $categories = $this->categoriesTable->find('id',$Id);
        
            if (empty($categories)) {
                return [
                    'template' => 'error.php',
                    'title' => 'Error',
                    'variables' => []
                ];
            }
        
            return [
                'template' => 'editcategory.php',
                'title' => 'Edit Category',
                'variables' => [
                    'categories' => $categories
                ]
            ];
        }
        public function editCategorySubmit() {
            if (array_key_exists('editcategory', $_POST)) {
                $id = $_GET['id'] ?? null;
                $categories = [
                    'id' => $id,
                    'name' => $_POST['name']
                ];
                
                if ($id === null) {
                    return [
                        'template' => 'error.php',
                        'title' => 'Error',
                        'variables' => []
                    ];
                }
                
                $this->categoriesTable->save($categories);
                header('location: /category');
            }
        }
        
        
        

    public function addcategory(){

       
            return [
                'template' => 'addcategory.php',
                'title' => 'Add Category',
                'variables' => []
            ];
        }

        public function addcategorysubmit() {
            if (array_key_exists('categories', $_POST)) {
                $categories = [
                    'name' => $_POST['name']
                ];
                 $this->categoriesTable->insert($categories);
                 header('location: /category');
        }}
        public function addjob() {

            $categories = $this->categoriesTable->findAll();
    
    
                    return [
                        'template' => 'addjob.php',
                        'title' => 'Add jobs',
                        'variables' => ['categories' => $categories]
                            
                        
                    ];
                }
    public function categorylist(){
        $categories = $this->categoriesTable->findAll();

        return ['template' => 'categorylist.php',
                'title' => 'Category List',
                'variables' => ['categories' => $categories]
                ];
                
    }
    
    }
    
    
