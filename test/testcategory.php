<?php

use PHPUnit\Framework\TestCase;
use src\Controllers\Category;

class CategoryTest extends TestCase
{
    public function testListCat()
    {
        $categoriesTableMock = $this->createMock(\src\Models\CategoriesTable::class);
        $categoriesTableMock->expects($this->once())
            ->method('findAll')
            ->willReturn([]);

        $category = new Category($categoriesTableMock);

        $result = $category->listCat();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('template', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('variables', $result);

        $this->assertEquals('category.php', $result['template']);
        $this->assertEquals('Category List', $result['title']);
        $this->assertIsArray($result['variables']);
        $this->assertArrayHasKey('categories', $result['variables']);
        $this->assertIsArray($result['variables']['categories']);
    }

    public function testDeleteCategory()
    {
        $categoriesTableMock = $this->createMock(\src\Models\CategoriesTable::class);
        $categoriesTableMock->expects($this->once())
            ->method('delete')
            ->with(1);

        $category = new Category($categoriesTableMock);

        $_POST['delete'] = true;
        $_POST['id'] = 1;

        $category->deleteCategory();
    }

    public function testEditCategory()
    {
        $categoriesTableMock = $this->createMock(\src\Models\CategoriesTable::class);
        $categoriesTableMock->expects($this->once())
            ->method('find')
            ->with('id', 1)
            ->willReturn([]);

        $category = new Category($categoriesTableMock);

        $_GET['id'] = 1;

        $result = $category->editCategory();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('template', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('variables', $result);

        $this->assertEquals('editcategory.php', $result['template']);
        $this->assertEquals('Edit Category', $result['title']);
        $this->assertIsArray($result['variables']);
        $this->assertArrayHasKey('categories', $result['variables']);
        $this->assertIsArray($result['variables']['categories']);


    }
        public function testEditCategorySubmit()
        {
            // create a mock for the categoriesTable
            $categoriesTable = $this->createMock(\src\Models\DatabaseTable::class);
    
            // expect the save method to be called once and with the correct parameters
            $categoriesTable->expects($this->once())
                ->method('save')
                ->with([
                    'id' => 1,
                    'name' => 'Testing Category'
                ]);
    
            // create an instance of the Category class with the mock categoriesTable
            $controller = new Category($categoriesTable);
    
            // simulate the $_GET and $_POST arrays
            $_GET = ['id' => 1];
            $_POST = [
                'editcategory' => true,
                'name' => 'Testing Category'
            ];
    
            // call the editCategorySubmit method
            $controller->editCategorySubmit();
        }
    }