<main class="sidebar">

<section class="left">
  <ul>
    <li><a href="/jobs">Jobs</a></li>
    <li><a href="/category">Category</a></li>
    <li>
      <form action="/jobs" method="GET">
        <select name="location">
          <option value="">All Locations</option>
          <?php
            $locations = getUniqueLocations($jobs);
            foreach ($locations as $location) {
              echo '<option value="' . $location . '">' . $location . '</option>';
            }
          ?>
        </select>
        <input type="submit" value="Filter">
      </form>
    </li>
  </ul>
</section>

<section class="right">
  <h1>Jobs</h1>

  <ul class="listing">
    <?php 
      $selectedLocation = isset($_GET['location']) ? $_GET['location'] : '';
      $filteredJobs = filterJobsByLocation($jobs, $selectedLocation);
      $filteredJobs = sortJobsByDate($filteredJobs);
      foreach($filteredJobs as $job) { 
    ?>
      <li>
        <div class="details">
          <h2><?=$job['title']?></h2>
          <h3><?=$job['salary']?></h3>
          <p><?=nl2br($job['description'])?></p>
          <p><?=$job['location']?></p>
          <p><?=$job['date']?></p>
          <a class="more" href="/apply?id='<?=$job['id']?> '">Apply for this job</a>
        </div>
      </li>
      <br>
    <?php } ?>
  </ul>
</section>
</main>
