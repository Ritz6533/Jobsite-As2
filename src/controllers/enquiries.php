<?php
namespace src\Controllers;
class enquiries {
    private $enquiriesTable;

    public function __construct($enquiriesTable){
        $this->enquiriesTable = $enquiriesTable;
    }
    //controller which uses enquiry table to display data or to post data 
     // Function to display the about page.
     public function about($errors = []) {
        return [
           
            'template' => 'about.php',
            'variables' => ['errors' => $errors],
            'title' => 'About Us'
        ];
    }
    public function aboutsubmit() {

        $errors = [];
        if ($_POST['name'] == '') {
        $errors[] = 'You must enter a name';
        }
        if ($_POST['phoneNumber'] == '') {
        $errors[] = 'You must enter a phone number';
        }
        if ($_POST['email'] == '') {
        $errors[] = 'You must enter an email';
        }
        if ($_POST['Enquiry'] == '') {
        $errors[] = 'You must add an Enquiry';
        }
        if (count($errors) == 0) {
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
        else {
        return $this->about($errors);
        }}
        //
      
    public function enquiries() {
        $enquiries = $this->enquiriesTable->findAll();
        return [
           
            'template' => 'enquiry.php',
            'variables' => ['enquiries' => $enquiries
                
            ],
            'title' => 'Enquiries'
        ];
    }
    
    
       
    }
