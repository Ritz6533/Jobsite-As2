<?php
namespace src\Controllers;
class enquiries {
    private $enquiriesTable;

    public function __construct($enquiriesTable){
        $this->enquiriesTable = $enquiriesTable;
    }

     // Function to display the about page.
     public function about() {
        return [
           
            'template' => 'about.php',
            'variables' => [
                
            ],
            'title' => 'About Us'
        ];
    }
    public function aboutsubmit() {
        if (array_key_exists('enquiries', $_POST)) {
            $enquiries = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phoneNumber' => $_POST['phoneNumber'],
                'Enquiry' => $_POST['Enquiry']
            ];
            $this->enquiriesTable->insert($enquiries);
        }
        return [
            'template' => 'enquirysuccess.php',
            'title' => 'about',
            'variables' => ['enquiries' => $enquiries ?? []]
        ];
    }
    
    
    
       
    }
