<?php
namespace src\Controllers;
class job {
    private $jobsTable;

    public function __construct($jobsTable){
        $this->jobsTable = $jobsTable;
    }

    public function edit(){
        if (isset($_POST['job'])) {
            $date = new \DateTime();

            $job = $_POST['job'];
            $job['jobdate'] = $date->format('Y-m-d H:i:s');
	
            $this->jobsTable->save($job);
        
            header('location: /job/list');
        }
        else {
        
            if (isset($_GET['id'])){
                $result = $this->jobsTable->find('id', $_GET['id']);
                $job = $result[0];
            }
            else { 
                $job = false;
            }
            return [
                'template' => 'editjob.html.php',
                'title' => 'Edit job',
                'variables' => ['job' => $job]
            ];
        }
    }
    
    public function list(){
        $jobs = $this->jobsTable->findAll();

        return ['template' => 'jobs.php',
                'title' => 'job List',
                'variables' => [
                    'jobs' => $jobs
                ]
                ];
    }

    public function delete(){
        $this->jobsTable->delete($_POST['id']);

        header('location: /job/list');
    }

    public function home(){
        $jobs = $this->jobsTable->findAll();

        return [
            'template' => 'home.html.php',
            'title' => 'Internet job Database',
            'variables' => [
                'jobs' => $jobs
            ]
        ];
    }
   // 
    public function addjob() {
      

                return [
                    'template' => 'addjob.php',
                    'title' => 'Add jobs',
                    'variables' => [
                        
                    ]
                ];
            }
    public function editjob() {
      

                return [
                    'template' => 'editjob.php',
                    'title' => 'edit jobs',
                    'variables' => [
                        
                    ]
                ];
            }
            public function deletejob() {
      

                return [
                    'template' => 'deletejob.php',
                    'title' => 'Delete jobs',
                    'variables' => [
                        
                    ]
                ];
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
    public function hr() {
        return [
           
            'template' => 'hr.php',
            'variables' => [
                
            ],
            'title' => 'HR'
        ];
    }
    public function it() {
        return [
           
            'template' => 'it.php',
            'variables' => [
                
            ],
            'title' => 'IT'
        ];
    }
    public function sales() {
        return [
           
            'template' => 'sales.php',
            'variables' => [
                
            ],
            'title' => 'Sales'
        ];
    }
    public function apply() {
        return [
           
            'template' => 'apply.php',
            'variables' => [
                
            ],
            'title' => 'Apply Jobs'
        ];
    }

}
