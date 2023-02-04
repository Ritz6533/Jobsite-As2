<?php

use PHPUnit\Framework\TestCase;
use src\Controllers\Category;

class CategoryTest extends TestCase
{
    private $category;
    private $categoriesTableMock;

    public function setUp()
    {
        $this->categoriesTableMock = $this->createMock(CategoriesTable::class);
        $this->category = new Category($this->categoriesTableMock);
    }

    public function testListCat()
    {
        $categories = [
            ['id' => 1, 'name' => 'Category 1'],
            ['id' => 2, 'name' => 'Category 2']
        ];
        
        $this->categoriesTableMock->expects($this->once())
            ->method('findAll')
            ->willReturn($categories);
        
        $result = $this->category->listcat();
        
        $this->assertArrayHasKey('template', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('variables', $result);
        
        $this->assertEquals('category.php', $result['template']);
        $this->assertEquals('Category List', $result['title']);
        $this->assertArrayHasKey('categories', $result['variables']);
        $this->assertEquals($categories, $result['variables']['categories']);
    }
}
