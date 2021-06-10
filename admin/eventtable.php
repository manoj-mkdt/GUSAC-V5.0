<!-- Start of header -->
<?php include 'header.php'; ?>
<!-- End of header -->
<?php include "ajax_load/connect.php";?>

<!-- -------------------------------Start of Member Dispaly page in admin---------------------- -->
<section class="eventtable">
<div class="container-fluid">
<h2 class="text-center font3">Event table</h2>
<div class="d-flex justify-content-center">
<br>
<a href="eventform.php" ><button type="button" class="btn btn-sm yellow-regular font5">Eventform</button></a>
</div>
<!-------------------------------- Input box for Search Button----------------------------->
<br>

<div class="table-responsive">
  <table id="mytable" class='table table-bordered table-striped'>
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Last Date</th>
            <th>Event Time</th>
            <th>Event Description</th>
            <th>Poster</th>
            <th>form</th>
            <th>Time Stamp</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody id='myTable' class="font7">

        <?php 
        //Displaying members when the status=1
            $query="SELECT `id`, `event_name`, `event_date`, `last_date`, `event_time`, `poster`, `ggform`, `event_description`, `Time_stamp` FROM `eventtable` ";
             $result = $con->query($query);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id=$row['id'];
                $poster=$row['poster'];
            echo "<tr>";
            echo "<td>".$row['event_name']."</td>";
            echo "<td>".$row['event_date']."</td>";
            echo "<td>".$row['last_date']."</td>";
            echo "<td>".$row['event_time']."</td>";
            echo "<td>".$row['event_description']."</td>";
            echo "<td>".$row['poster']."</td>";
            echo "<td>".$row['ggform']."</td>";
            echo "<td>".$row['Time_stamp']."</td>";
            echo "<td><a href='ajax_load/eventtable_upload.php?rn=$id&rn2=$poster'><button type='button' class='btn btn-sm btn-danger flagbtn'>Remove</button></a></td>";
            echo "</tr>";
            }
       }
       echo  "</tbody></table>";
    ?>

</div>
</div>


</section>
<!-- -------------------------------End of Member Dispaly page in admin---------------------->
<!-- Start of footer -->
<?php include 'footer.php'; ?>
<!-- End of footer -->
