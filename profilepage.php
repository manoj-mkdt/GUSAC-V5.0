<?php include 'header.php';

  if (!isset($_SESSION['reg']) && !isset($_SESSION['token'])) {
    header("Location: ajax_load/logout.php");
  }
  
  include 'ajax_load/connect.php';
?>
<style type="text/css">

</style>
<section id="profilePage">
   <div class="container my-5">
      <div class="row">
         <div id="bioImgCard" class="col-md-12 col-lg-4 my-2">
            <?php
               
               $sid=$_SESSION['sid'];
               $sql = "select * from register_member where id=$sid";
               $check=mysqli_query($con,$sql);
               if ($check) {
                  while ($rows=mysqli_fetch_array($check)) {
                    ?>
                      <div class="card"  style="width: 18rem;">
                         <div class="circle align-self-center my-2 circular--portrait">
                          <?php if (!empty($rows['profile_pic'])) {
                          ?>
                          <img class="profile-pic" src="uploads/profilePic/<?php echo($rows['profile_pic']); ?>">
                          <?php
                          }
                          else{
                            ?>
                              <img class="profile-pic" src="https://t4.ftcdn.net/jpg/04/10/43/77/360_F_410437733_hdq4Q3QOH9uwh0mcqAhRFzOKfrCR24Ta.jpg" id="profileImage">;
                              <?php
                          }
                          ?>
                             <!-- User Profile Image -->
                             <!-- Default Image -->
                             <!-- <i class="fa fa-user fa-5x"></i> -->
                         </div>
                         <form class="align-self-center" id="profilePicSave">
                           <div class="p-image">
                               <i class="fa fa-camera upload-button"></i>
                                <input class="file-upload" type="file" name="profilePic" id="profilePic" accept="image/*" />
                           </div>
                           
                         </form>
                        <div class="card-body text-center">
                          <h3><?php echo $rows['first_name']." ". $rows['last_name']; ?></h3>
                          <?php
                            $query="select `team_status`,`team` from team_recruit where sid=$sid";
                             $count=0;
                            if($result=mysqli_query($con,$query)){
                             
                              while($getTeam=mysqli_fetch_array($result)){
                                // echo $getTeam['status'];
                                if($getTeam['team_status']==1){
                                  $count++;
                                  ?>
                                  <div class="customBox mx-4 my-2">
                                    <?php echo $getTeam['team']; ?><br>
                                  </div>
                                  <?php
                                }
                                
                            }
                            if ($count==0) {
                                  ?>
                                  <a href="teamRegister.php"><button class="yellow-pill">Join Team</button></a>
                                  <?php  
                                }
                          }
                          ?>
                          
                        </div>
                      </div>
                   </div>
               <!-- Modal for profile pic crop -->
              <div class="modal fade" id="profile_pic_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="max-width: 1000px !important" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Crop Image Before Upload</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="img-container">
                              <div class="row">
                                  <div class="col-md-8">
                                      <img src="" id="profile_pic_image" />
                                  </div>
                                  <div class="col-md-4">
                                      <div class="profile_pic_preview"></div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="profile_pic_crop" class="yellow-regular">Crop</button>
                          <button type="button" class="orange-regular" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                  </div>
                </div> 
              <!-- Edit details form -->
               <div class="col-lg-8 col-md-12 my-2">
                  <div class="border rounded">
                     <div class="px-4 my-2">
                        <div class="d-flex flex-row my-2">
                           <h3><i class="fas fa-user fa-xs">&nbsp Profile Details </i></h3>
                              <button type="button" class="yellow-pill ml-auto" data-toggle="modal" data-target="#modelEditProfile" onclick="fillForm()">Edit Profile</button>
                        </div>
                           <table class="table table-bordered">
                             <tr>
                               <th width="30%">Register No</th>
                               <td><?php echo $rows['registration_number']; ?></td>
                             </tr>
                             <tr>
                               <tr>
                                   <th width="30%">Email Address</th>
                                   <td><?php echo $rows['email']; ?></td>
                               </tr>
                               <tr>
                                  <th width="30%">Year of study</th>
                                  <td><?php
                                      $stream=$rows['stream']; 
                                      if ($stream=="B.Tech"){
                                        // $a=4-($rows['yop']-date("Y"));
                                        // 2025-2021
                                        $a="IV";
                                      }
                                      else if(($stream=="BBA") || ($stream=="B.Sc") ||($stream=="Phd")){
                                        // $a=3-($rows['yop']-date("Y"));
                                        $a="III";
                                      }
                                      else if(($stream=="M.Tech") || ($stream=="MBA") ||($stream=="M.Sc")){
                                        // $a=2-($rows['yop']-date("Y"));
                                        $a="II";
                                      }
                                      else{
                                        $a='Data does not exist';
                                      }
                                      echo $a; 
                                      $a=0
                                      ?>
                                  </td>
                               </tr>
                             </tr>
                             <tr>
                               <tr>
                                 <th width="30%">Stream</th>
                                 <td><?php echo $rows['stream']; ?></td>
                               </tr>
                               <tr>
                                 <th width="30%">Branch</th>
                                 <td><?php echo $rows['branch']; ?></td>
                               </tr>
                               <tr>
                                 <th width="30%">Phone</th>
                                 <td><?php echo $rows['number']; ?></td>
                               </tr>
                               <tr>
                                 <th>Password</th>
                                 <th><button class="orange-pill" id="change_pwd" data-toggle="modal" data-target="#change_pwd_modal">Change Password</button></th>
                               </tr>
                            </tr>
                           </table>
                        </div>
                    </div>
                <?php
               }
            } 
          ?>
        </div>
    </div>

    <!-- Password change modal -->
    <div class="modal fade" id="change_pwd_modal" tabindex="-1" role="dialog" aria-labelledby="change_pwd_modal" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="change_pwd_modal">Change Password</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <!--Registration Form-->
               <form name="pwd_changeForm" id="pwd_changeForm">
               <!-- Message / status  -->
                  <!-- <h4 class="mt-4 text-center mb-4">Register to join the CLUB</h4> -->
                     <div class="form-group">                        
                        <input type="Password" id="old_pwd" class="form-control" placeholder="Old Password*"required>
                     </div>
                     <div class="form-group">
                        <input type="Password" id="new_pwd" class="form-control" placeholder="New Password*"required>
                     </div>
                     <div class="form-group">
                        <input type="Password" id="confirm_new_pwd" class="form-control" placeholder="New Password*" required>
                     </div>
                     <div id="notMatching" style="display: none;"></div>
                     <div class="text-center mt-4 mb-1">
                        <button type="button" class="yellow-regular" id="change_pwd_save">Save</button>
                    </div>
                  </form>
                  
               </div>
            </div>
         </div>
   </div>
    <!---------- end of password change modal-------------->


    <div class="mt-3">
        <div class="d-flex flex-row">
          <h3><i class="fas fa-address-card fa-xs"></i>&nbsp Project Details</h3>
          <a href="projectform.php" class="ml-3 yellow-pill ml-auto ">Upload</a>
        </div>
    </div>
    <div class="row">
      <?php 
        $sql="select * from `projectdetails` where sid=$sid";
        $check=mysqli_query($con,$sql);
        while ($row=mysqli_fetch_array($check)) {
          $id=$row['project_id'];
          ?>
          <div class="col-md-6 my-2" >
            <div class="card px-3" id="profilePic_prjt_details">
              <div class="d-flex flex-row my-2">
               <h3><?php echo $row['project_name'];?></h3>
               <div class="ml-auto mt-2">
                  <span class="customBox" >
                     <?php  if ($row['project_status']==1){echo "Approved"; }
                            else if ($row['project_status']==-1) {echo "Rejected"; }
                            else { echo "Pending";}
                     ?>
                   </span>
                </div>   
            </div>
            <div class="row my-3">
             <div class="col-md-6 text-center">
                <img width="100%" src="uploads/projects/<?php echo $row['project_pic_path'];?>">
             </div>
             <div class="col-md-6">
                <div class="text-center mt-3" id="teamDetails">
                <?php echo $row['description'];?>.<br>
                   <h6><b>Team Name:</b></h6><h6> <?php echo $row['team_name'];?></h6><br><br>
                   <h6><b>Team Member:</b></h6><h6><b><?php echo $row['team_leader'];?></b>,<?php echo $row['team_members'];?>.</h6><br><br>
                   <h6><b>Projects Link:</b></h6><a href="<?php echo $row['project_links'];?>" target="_tab"><h6> Click here</h6></a><br><br>
                   <span title="edit"> <a href="projectform.php?rn=<?php echo $id ?>"> <i class="fa fa-edit"></i></a></span>
                  <span title="delete"><a href="ajax_load/project_upload.php?rn=<?php echo $id ?>" ><i class="fa fa-trash" ></i></a></span>   
                   
                </div>
             </div>
            </div>  
          </div>
        </div>
          
         <?php
        }
     ?> 
  </div>


   
  
      

    <?php 
    $query="SELECT * FROM `register_member` WHERE id=$sid";
    $result = $con->query($query);
    if($row = $result->fetch_assoc()) {
    ?>
    <script>
    function fillForm() {
       $("#first_Name").val("<?php echo $row['first_name']; ?>");
       $("#last_Name").val("<?php echo $row['last_name']; ?>");
       $("#mrNum").val("<?php echo $row['registration_number']; ?>");
       $("#stream").val("<?php echo $row['stream']; ?>");
       $("#branch").val("<?php echo $row['branch']; ?>");
       $("#yop").val("<?php echo $row['yop']; ?>");
       $("#code").val("<?php echo $row['country']; ?>");
       $("#mpnumber").val("<?php echo $row['number']; ?>");
       $("#email").val("<?php echo $row['email']; ?>");
    }
    </script>
    <?php } ?>

   <!-- Model for Edit button -->
   <div class="modal fade" id="modelEditProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="editProfile">Edit Profile</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <!--Registration Form-->
               <form name="edit_memberForm" id="edit_memberForm">
               <!-- Message / status  -->
                  <!-- <h4 class="mt-4 text-center mb-4">Register to join the CLUB</h4> -->
                     <div class="form-group">
                        <div class="row">
                           <div class="col">
                              <input type="text" id="first_Name" class="form-control" placeholder="First name*"required>
                           </div>
                           <div class="col">
                              <input type="text" id="last_Name" class="form-control" placeholder="Last name*"required>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <input type="number" class="form-control" id="mrNum" placeholder="Register number" disabled="" required>
                     </div>
                         <div class="form-group">
                            <div class="row">
                               <div class="col">
                                 <select class="custom-select" name="stream" id="stream" required>
                                   <option selected disabled>Stream*</option>
                                   <option value="BBA">BBA</option>
                                   <option value="B.Sc">B.Sc</option>
                                   <option value="B.Tech">B.Tech</option>
                                   <option value="M.Tech">M.Tech</option>
                                   <option value="MBA">MBA</option>
                                   <option value=">M.Sc">M.Sc</option>
                                   <option value="Phd">Phd</option>
                                 </select>
                               </div>
                              <div class="col">
                                 <select class="custom-select" id="branch" required>
                                   <option selected disabled>Branch</option>
                                   <option value="CSE">CSE</option>
                                   <option value="ECE">ECE</option>
                                   <option value="EEE">EEE</option>
                                   <option value="Mech">Mech</option>
                                 </select>
                               </div>
                           </div>
                        </div>
                         <div class="form-group">
                           <select class="custom-select" name="Year of Passing" id="yop" required>
                            <option selected disabled>Year of Passing*</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                        </select>
                         </div>
                         <div class="form-group">
                           <div class="row g-3">
                               <div class="col-sm-4">
                                 <select class=" custom-select"  name="countryCode" id="code" required>
                                 <option data-countryCode="GB" value="91" Selected>India (+91)</option>
                                 <optgroup label="Other countries">
                                 <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                 <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                 <option data-countryCode="AO" value="244">Angola (+244)</option>
                                 <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                 <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                 o<option data-countryCode="AR" value="54">Argentina (+54)</option>
                                 <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                 <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                 <option data-countryCode="AU" value="61">Australia (+61)</option>
                                 <option data-countryCode="AT" value="43">Austria (+43)</option>
                                 <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                 <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                 <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                 <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                 <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                 <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                 <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                 <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                 <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                 <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                 <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                 <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                 <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                 <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                 <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                 <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                 <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                 <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                 <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                 <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                 <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                 <option data-countryCode="CA" value="1">Canada (+1)</option>
                                 <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                 <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                 <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                 <option data-countryCode="CL" value="56">Chile (+56)</option>
                                 <option data-countryCode="CN" value="86">China (+86)</option>
                                 <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                 <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                 <option data-countryCode="CG" value="242">Congo (+242)</option>
                                 <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                 <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                 <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                 <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                 <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                 <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                 <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                 <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                 <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                 <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                 <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                 <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                 <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                 <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                 <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                 <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                 <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                 <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                 <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                 <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                 <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                 <option data-countryCode="FI" value="358">Finland (+358)</option>
                                 <option data-countryCode="FR" value="33">France (+33)</option>
                                 <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                 <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                 <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                 <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                 <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                 <option data-countryCode="DE" value="49">Germany (+49)</option>
                                 <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                 <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                 <option data-countryCode="GR" value="30">Greece (+30)</option>
                                 <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                 <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                 <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                 <option data-countryCode="GU" value="671">Guam (+671)</option>
                                 <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                 <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                 <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                 <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                 <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                 <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                 <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                 <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                 <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                 <option data-countryCode="IN" value="91">India (+91)</option>
                                 <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                 <option data-countryCode="IR" value="98">Iran (+98)</option>
                                 <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                 <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                 <option data-countryCode="IL" value="972">Israel (+972)</option>
                                 <option data-countryCode="IT" value="39">Italy (+39)</option>
                                 <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                 <option data-countryCode="JP" value="81">Japan (+81)</option>
                                 <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                 <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                 <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                 <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                 <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                 <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                 <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                 <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                 <option data-countryCode="LA" value="856">Laos (+856)</option>
                                 <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                 <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                 <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                 <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                 <option data-countryCode="LY" value="218">Libya (+218)</option>
                                 <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                 <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                 <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                 <option data-countryCode="MO" value="853">Macao (+853)</option>
                                 <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                 <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                 <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                 <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                 <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                 <option data-countryCode="ML" value="223">Mali (+223)</option>
                                 <option data-countryCode="MT" value="356">Malta (+356)</option>
                                 <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                 <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                 <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                 <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                 <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                 <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                 <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                 <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                 <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                 <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                 <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                 <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                 <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                 <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                 <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                 <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                 <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                 <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                 <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                 <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                 <option data-countryCode="NE" value="227">Niger (+227)</option>
                                 <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                 <option data-countryCode="NU" value="683">Niue (+683)</option>
                                 <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                 <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                 <option data-countryCode="NO" value="47">Norway (+47)</option>
                                 <option data-countryCode="OM" value="968">Oman (+968)</option>
                                 <option data-countryCode="PW" value="680">Palau (+680)</option>
                                 <option data-countryCode="PA" value="507">Panama (+507)</option>
                                 <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                 <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                 <option data-countryCode="PE" value="51">Peru (+51)</option>
                                 <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                 <option data-countryCode="PL" value="48">Poland (+48)</option>
                                 <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                 <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                 <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                 <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                 <option data-countryCode="RO" value="40">Romania (+40)</option>
                                 <option data-countryCode="RU" value="7">Russia (+7)</option>
                                 <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                 <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                 <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                 <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                 <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                 <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                 <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                 <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                 <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                 <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                 <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                 <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                 <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                 <option data-cuntryCode="ZA" value="27">South Africa (+27)</option>
                                 <option data-countryCode="ES" value="34">Spain (+34)</option>
                                 <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                 <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                 <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                 <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                 <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                 <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                 <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                 <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                 <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                 <option data-countryCode="SI" value="963">Syria (+963)</option>
                                 <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                 <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                 <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                 <option data-countryCode="TG" value="228">Togo (+228)</option>
                                 <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                 <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                 <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                 <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                 <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                 <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                 <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                 <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                 <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                 <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                 <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                 <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                 <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                 <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                 <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                 <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                 <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                 <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                 <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                 <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                 <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                 <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                 <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                 <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                  </optgroup>
                              </select>
                           </div>
                           <div class="col">
                              <input type="number" class="form-control" id="mpnumber" placeholder="Phone number*"  required>
                            </div>
                        </div>
                     </div>
                     <div class="form-group">
                         <input type="email" class="form-control" id="email" placeholder="GITAM mail Id*" required>
                     </div>
                     <div class="text-center mt-4 mb-1">
                        <button type="button" class="yellow-regular" id="profilePageSave">Save</button>
                    </div>
                  </form>
                  
               </div>
            </div>
         </div>
   </div>
   <!-- End of model -->


</section>
<?php include 'footer.php' ;?>