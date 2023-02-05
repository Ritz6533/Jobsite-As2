<?php
use src\Controllers\applicants;

require_once __DIR__ . '/src/Controllers/applicants.php';

$applicantsTable = new DatabaseTable($pdo, 'applicants', 'id');
$applicantsController = new applicants($applicantsTable);

// Testing the applySubmit method
$_POST = [
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'details' => 'I am interested in the job',
    'jobId' => 1
];

$result = $applicantsController->applySubmit();

if ($result['template'] === 'enquirysuccess.php') {
    echo "applySubmit method is working correctly";
} else {
    echo "applySubmit method is not working correctly";
}

// Testing the applicantslist method
$result = $applicantsController->applicantslist();

if ($result['template'] === 'applicants.php' && $result['title'] === 'applicants List') {
    echo "applicantslist method is working correctly";
} else {
    echo "applicantslist method is not working correctly";
}
