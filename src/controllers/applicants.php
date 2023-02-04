<?php
namespace src\Controllers;
class applicants {
    private $applicantsTable;

    public function __construct($applicantsTable){
        $this->applicantsTable = $applicantsTable;
    }

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
            'title' => 'about',
            'variables' => ['enquiries' => $enquiries ?? []]
        ];
    }
    
    public function applicantslist() {
        $applicants = $this->applicantsTable->findAll();

        return ['template' => 'applicants.php',
                'title' => 'applicants List',
                'variables' => [
                    'applicants' => $applicants
                ]
                ];
            }
    }
