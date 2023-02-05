<?php
namespace src\Controllers;
class applicants {
    private $applicantsTable;

    public function __construct($applicantsTable){
        $this->applicantsTable = $applicantsTable;
    }
//creating function based on the table applicants where data is either get or post in the site
    public function applySubmit() {
        if (array_key_exists('applicants', $_POST)) {
          
      
          $applicants = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'details' => $_POST['details'],
            'jobId' => $_POST['jobId']
          ];
      
          $this->applicantsTable->insert($applicants);
        }
        return [
            'template' => 'enquirysuccess.php',
            'title' => 'About-Submit',
            'variables' => ['enquiries' => $enquiries ?? []]
        ];
    }
    
    public function applicantslist() {
        $applicants = $this->applicantsTable->findAll();

        return ['template' => 'applicants.php',
                'title' => 'Applicants List',
                'variables' => [
                    'applicants' => $applicants
                ]
                ];
            }
    }
