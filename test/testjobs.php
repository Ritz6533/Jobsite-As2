<?php
use PHPUnit\Framework\TestCase;
use src\Controllers\Job;

class JobTest extends TestCase {
  private $job;
  private $jobsTableMock;

  public function setUp(): void {
    $this->jobsTableMock = $this->createMock(\src\Tables\JobsTable::class);
    $this->job = new Job($this->jobsTableMock);
  }

  public function testListReturnsArrayWithExpectedTemplate() {
    $jobs = [];
    $this->jobsTableMock->method('findAll')->willReturn($jobs);
    $expectedResult = [
      'template' => 'jobs.php',
      'title' => 'job List',
      'variables' => [
        'jobs' => $jobs
      ]
    ];

    $this->assertEquals($expectedResult, $this->job->list());
  }

  public function testListReturnsArrayWithExpectedTemplateAndVariables() {
    $location = 'Berlin';
    $_GET['location'] = $location;
    $jobs = [];
    $this->jobsTableMock->method('find')->with('location', $location)->willReturn($jobs);
    $expectedResult = [
      'template' => 'jobs.php',
      'title' => 'job List',
      'variables' => [
        'jobs' => $jobs
      ]
    ];

    $this->assertEquals($expectedResult, $this->job->list());
  }

  public function testHomeReturnsArrayWithExpectedTemplateAndVariables() {
    $jobs = [];
    $this->jobsTableMock->method('findAllWithCategories')->willReturn($jobs);
    $expectedResult = [
      'template' => 'home.html.php',
      'title' => 'Internet job Database',
      'variables' => [
        'jobs' => $jobs
      ]
    ];

    $this->assertEquals($expectedResult, $this->job->home());
  }

  public function testEditjobReturnsArrayWithExpectedTemplateAndVariables() {
    $id = 1;
    $_GET['id'] = $id;
    $jobs = [];
    $this->jobsTableMock->method('find')->with('id', $id)->willReturn($jobs);
    $expectedResult = [
      'template' => 'editjob.php',
      'title' => 'Edit Jobs',
      'variables' => [
        'jobs' => $jobs
      ]
    ];

    $this->assertEquals($expectedResult, $this->job->editjob());
  }

  public function testEditjobsubmitSavesJobsArray() {
    $_POST = [
      'editjob' => true,
      'title' => 'Title',
      'description' => 'Description',
      'salary' => 'Salary',
      'location' => 'Location',
      'closingDate' => 'Closing Date'
    ];
    $id = 1;
    $_GET['id'] = $id;
    $jobs = [
