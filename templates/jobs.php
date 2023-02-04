<main class="sidebar">

<section class="left">
  <ul>
    <li><a href="/jobs">Jobs</a></li>
    <li><a href="/categorylist">Category</a></li>
    
      <form action="" method="GET"">
      <li><select name="location">
          <option value="">All Locations</option>
          <?php
          //removing duplicate location values
      $uniqueLocations = [];
      foreach ($jobs as $job) {
    if (!in_array($job['location'], $uniqueLocations)) {
        echo '<option value="' . $job['location'] . '">' . $job['location'] . '</option>';
        $uniqueLocations[] = $job['location'];
    }
}
?>

          
        </select></li><br>

         <li style="margin-left: -220px;"><input type="submit" value="location"></li>
      </form>
   
  
  </ul>
</section>

<section class="right">
  <h1>Jobs</h1>

  <ul class="listing">
    <?php 
      foreach($jobs as $job) { 
    ?>
      <li>
        <div class="details">
          <h2><?=$job['title']?></h2>
          <h3><?=$job['salary']?></h3>
          <p><?=nl2br($job['description'])?></p>
          <p><?=$job['location']?></p>
          <p><?=$job['closingDate']?></p>
          <p><a href="/apply?id=<?=$job['id']?>">Apply for this job</a><p>
        </div>
      </li>
      <br>
    <?php } ?>
  </ul>
</section>
</main>
