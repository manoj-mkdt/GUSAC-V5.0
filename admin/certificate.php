<!-- Start of header -->



<?php include 'header.php'; ?>



<!-- End of header -->

<section id="certificate_page">

  <?php

        include("ajax_load/connect.php");

        $sql = "SELECT * FROM `certificate` WHERE 1 ORDER BY id DESC";

        $check = mysqli_query($con,$sql);

        ?>

  <!--- START OF CERTIFICATE PAGE----->

  <div class="container my-5">

    <h1 class="text-center font4">CERTIFICATES</h1>

    <div class="text-center my-4">

      <button type="button" class="yellow-regular font5" data-toggle="modal" data-target="#AddMoreModal">Add Details</button>

    </div>

    <!---START OF CERTIFICATE TABLE------>

    <div class="table-responsive">

      <table class="table table-bordered table-hover">

        <thead>



        <tr class=" text-black font1">

                <th scope="col"><b>Certificate Number</b></th>

                <th scope="col"><b>Name<b></th>

                <th scope="col"><b>Organization<b></th>

                <th scope="col"><b>Event</b></th>

                <th scope="col"><b>Issued for</b></th>

                <th scope="col"><b>Issued Date</b></th>

                <th scope="col"></th>

              </tr>

        </thead>

        <tbody>

          <?php while($row = mysqli_fetch_array($check)){

            $id=$row['id'];
            $issued_for=strtotime($row["issued_for"]);
            $issued_date=strtotime($row["issued_date"]);

                  ?>

          <tr class="font7">

            <th scope="row"><?php echo($row["certificate_number"]);?></th>

            <td><?php echo($row["name"]);?></td>

            <td><?php echo($row["organisation"]);?></td>

            <td><?php echo($row["event"]);?></td>

            <td><?php echo date('d-m-y',$issued_for);?></td>

            <td><?php echo date('d-m-y',$issued_date);?></td>

            <td>

              <a href="ajax_load/certificate_remove.php?id=<?php echo($id);?>"><input class="btn btn-danger" type="button" id="Remove" name="Remove" value="Remove"></a>

            </td>

          </tr>

        <?php } ?>

        </tbody>

      </table>

      <!------END OF THE CERTIFICATE TABLE------->

    </div>

    <!-----START OF ADD DETAILS MODAL----------->

    <div class="modal fade" id="AddMoreModal" tabindex="-1" aria-labelledby="AddMoreModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header">

            <h3 class="modal-title font4" id="AddMoreModalLabel">Add Certificate Details</h3>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          </div>

          <!---Start of ADD DETAILS MODAL BODY---->

          <div class="modal-body">

            <form name="certificateForm" id="certificateForm">

              <div class="form-group">

                <label for="certificate_no" class="font5">Certificate Number </label>

                <input type="text" id="certificate_no" name="certificateno" class="form-control font2"   value="">

              </div>

              <div class="form-group">

                <label for="name" class="font5">Name</label>

                <input type="text" id="name" name="name" class="form-control font2" value="">

              </div>

              <div class="form-group">

                <label for="organization" class="font5">Organization</label>

                <input type="text" id="organization" name="organization" class="form-control font2" value="">

              </div>

              <div class="form-group">

                <label for="event" class="font5">Event</label>

                <input type="text" id="event" name="event" class="form-control font2" value="">

              </div>

              <div class="form-group">

                <label for="issuedFor" class="font5"> Issued For</label>

                <input type="text" id="issuedFor" name="issuedFor" class="form-control font2" value="">

              </div>

              <div class="form-group">

                <label for="issuedBy" class="font5">Issued Date</label>

                <input type="date" id="issuedBy" placeholder="dd-mm-yyyy" name="issuedBy" class="form-control font2" value="">

              </div>

            </form>

          </div>

          <!---  End of ADD DETAILS MODAL BODY ----->

          <div class="text-center my-4">

            <button type="submit" id="certificateButton" data-toggle="modal" class="yellow-regular font5">Submit</button>

            <!-- data-target="#mailmodal" data-dismiss="modal" -->

          </div>

        </div>

      </div>

    </div>

  </div>

  <!---- END OF CERTIFICATE PAGE -------->

</section>

<!-- Start of footer -->



<?php include 'footer.php'; ?>



<!-- End of footer -->

