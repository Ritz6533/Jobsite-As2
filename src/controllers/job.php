<?php
namespace src\Controllers;
class job {
    private $jobsTable;
//use of job table to access of database 
    public function __construct($jobsTable){
        $this->jobsTable = $jobsTable;
    }

    public function list() {
        $location = $_GET['location'] ?? null;
        $jobs = $this->jobsTable->find('location',$location);
    
        if (empty($jobs)) {
            $jobs = $this->jobsTable->findAll();
            return [
                'template' => 'jobs.php',
                'title' => 'job List',
                'variables' => [
                    'jobs' => $jobs

                ]
            ];
        }
    
        return [
            'template' => 'jobs.php',
            'title' => 'job List',
            'variables' => [
                'jobs' => $jobs
                ]
        ];
    }


    public function home(){
        $jobs = $this->jobsTable->findAllWithCategories();


        return [
            'template' => 'home.html.php',
            'title' => 'Internet job Database',
            'variables' => [
                'jobs' => $jobs
            ]
        ];
    }
    
   // 
   
    public function addjobsubmit() {
                if (array_key_exists('addjob', $_POST)) {
                    $addjob = [
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'salary' => $_POST['salary'],
                        'location' => $_POST['location'],
                        'categoryId' => $_POST['categoryId'],
                        'closingDate' => $_POST['closingDate'],
                    ];
                    $this->jobsTable->insert($addjob);

                }
                return [
                    'template' => 'enquirysuccess.php',
                    'title' => 'about',
                    'variables' => ['addjob' => $addjob ?? []]
                ];
            }

            public function editjob() {
                $Id = $_GET['id'] ?? null;
                $jobs = $this->jobsTable->find('id',$Id);
            
                if (empty($jobs)) {
                    return [
                        'template' => 'error.php',
                        'title' => 'Error',
                        'variables' => []
                    ];
                }
            
                return [
                    'template' => 'editjob.php',
                    'title' => 'Edit Jobs',
                    'variables' => [
                        'jobs' => $jobs
                    ]
                ];
            }
            public function editjobsubmit() {
                if (array_key_exists('editjob', $_POST)) {
                    $id = $_GET['id'] ?? null;
                    $jobs = [
                        'id' => $id,
                        'title' => $_POST['title'],
                        'description' => $_POST['description'],
                        'salary' => $_POST['salary'],
                        'location' => $_POST['location'],
                        'closingDate' => $_POST['closingDate']
                    ];
                    
                    if ($id === null) {
                        return [
                            'template' => 'error.php',
                            'title' => 'Error',
                            'variables' => []
                        ];
                    }
                    
                    $this->jobsTable->save($jobs);
                    header('location: /joblist');
                }
            }
            
            public function joblist() {
                $jobs = $this->jobsTable->findAll();

                return ['template' => 'joblist.php',
                        'title' => 'job List',
                        'variables' => [
                            'jobs' => $jobs
                        ]
                        ];
                    }
                    public function joblistsubmit() {
                        
                        if (array_key_exists('delete', $_POST)) {
                                $this->jobsTable->delete($_POST['id']);
                        
                                header('location: /joblist');
                            }
                        }
 //
 //
 //
     // Function to display the about page.
     public function about() {
        return [
           
            'template' => 'about.php',
            'variables' => [
                
            ],
            'title' => 'About Us'
        ];
    }
    

    // Function to display the FAQs page.
    public function faq() {
        return [
        
            'template' => 'faqs.php',
            'title' => 'FAQSS',
            'variables' => [
                
            ]
        ];
    }
    
    
    public function apply() {
        $id = $_GET['id'] ?? null;
        $jobs = $this->jobsTable->find('id',$id);
    
        if (empty($jobs)) {
            header('location: /jobs');
        }
    
        return [
            'template' => 'apply.php',
            'title' => 'Apply Job',
            'variables' => [
                'jobs' => $jobs
                ]
        ];
    }
    
    public function viewjob(){
        
        $categoryId = $_GET['categoryId'] ?? null;
        $jobs = $this->jobsTable->findwithCategories($categoryId);
    
        if (empty($jobs)) {
            return ['template' => 'error.php',
                    'title' => 'Error',
                    'variables' => [
                        
                    ]
            ];
        }
    
        return ['template' => 'viewjob.php',
                'title' => 'Job List',
                'variables' => [
                    'jobs' => $jobs
                ]
        ];
    }
    public function error() {
        return [
           
            'template' => '403.php',
            'variables' => [
                
            ],
            'title' => '403'
        ];
    }
}
