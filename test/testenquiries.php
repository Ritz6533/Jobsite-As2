<?php

use PHPUnit\Framework\TestCase;
use src\Controllers\Enquiries;

class EnquiriesTest extends TestCase
{
    private $enquiriesTable;
    private $enquiries;

    public function setUp()
    {
        $this->enquiriesTable = $this->createMock(\EnquiriesTable::class);
        $this->enquiries = new Enquiries($this->enquiriesTable);
    }

    public function testAbout()
    {
        $result = $this->enquiries->about();

        $this->assertArrayHasKey('template', $result);
        $this->assertArrayHasKey('variables', $result);
        $this->assertArrayHasKey('title', $result);

        $this->assertEquals('about.php', $result['template']);
        $this->assertEmpty($result['variables']);
        $this->assertEquals('About Us', $result['title']);
    }

    public function testAboutSubmit()
    {
        $_POST['name'] = 'Test User';
        $_POST['email'] = 'testuser@example.com';
        $_POST['phoneNumber'] = '1234567890';
        $_POST['Enquiry'] = 'Test enquiry';

        $this->enquiriesTable->expects($this->once())
            ->method('insert')
            ->with([
                'name' => 'Test User',
                'email' => 'testuser@example.com',
                'phoneNumber' => '1234567890',
                'Enquiry' => 'Test enquiry'
            ]);

        $result = $this->enquiries->aboutsubmit();

        $this->assertArrayHasKey('template', $result);
        $this->assertArrayHasKey('title', $result);
        $this->assertArrayHasKey('variables', $result);

        $this->assertEquals('enquirysuccess.php', $result['template']);
        $this->assertEquals('about', $result['title']);
        $this->assertArrayHasKey('enquiries', $result['variables']);
        $this->assertArrayHasKey('name', $result['variables']['enquiries']);
        $this->assertArrayHasKey('email', $result['variables']['enquiries']);
        $this->assertArrayHasKey('phoneNumber', $result['variables']['enquiries']);
        $this->assertArrayHasKey('Enquiry', $result['variables']['enquiries']);
        $this->assertEquals('Test User', $result['variables']['enquiries']['name']);
        $this->assertEquals('testuser@example.com', $result['variables']['enquiries']['email']);
        $this->assertEquals('1234567890', $result['variables']['enquiries']['phoneNumber']);
        }