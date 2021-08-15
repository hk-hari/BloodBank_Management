<?php
session_start();
include("config.php");
include("admin_function.php");
if (!isset($_SESSION['usertype'])) {
    header("location:admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("admin_head.php"); ?>
</head>

<body>

    <?php include("admin_topnav.php"); ?>
    <div class="container" style='margin-top:70px'>
        <div class="row">
            <div class="col-sm-3">
                <?php include("admin_side_nav.php"); ?>
            </div>
            <div class="col-sm-9">
                <h3 class='text-primary'><i class="fa fa-ambulance"></i> Add blood</h3>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        if (isset($_POST["blood_submit"])) {
                            $sql = "INSERT INTO blood (blood_group,blood_ml,hospital_id) VALUES ('" . $_POST["bloodgroup"] . "','" . $_POST["bloodml"] . "','" . $_POST["hospital_id"] . "')";
                            $con->query($sql);
                        }

                        ?>

                        <p id='out' class='text-success'></p>
                        <label class="control-label text-primary"> HOSPITAL :</label>
                        <?php 
                          $hospital_id=$_GET["id"];
                          $hospital_name=$_GET["hospital_name"];
                           echo $hospital_name;
                          
                         ?>         
                        <form role="form" action="admin_add_blood.php?id=<?php echo $hospital_id;?>&hospital_name=<?php echo $hospital_name; ?>"  method="post">
                            <input type="hidden" name="hospital_id" value="<?php echo $hospital_id ?>">
                            <div class="form-group">
                                <label class="control-label text-primary"> Blood Group</label>
                                <select name="bloodgroup" id="blood" required class="form-control input-sm">
                                    <option value="">Select Blood</option>
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="A1+">A1+</option>
                                    <option value="A2+">A2+</option>
                                    <option value="A1B+">A1B+</option>
                                    <option value="A2B+">A2B+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O-">O-</option>
                                    <option value="AB-">AB-</option>
                                    <option value="A1-">A1-</option>
                                    <option value="A2-">A2-</option>
                                    <option value="A1B">A1B-</option>
                                    <option value="A2B">A2B-</option>


                                </select>
                            </div>
                            <div class="form-group text-primary">
                                <label for="countryname">Blood ml</label>
                                <input id="countryname" required type="text" class="form-control" name="bloodml">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name='blood_submit' value="Add blood">
                            </div>

                        </form>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $sql = "SELECT * FROM `blood` WHERE hospital_id='$hospital_id'";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            echo "<table class='table table-striped' >";
                            echo "<tr>
											<th>Sno</th>
											<th>Blood group</th>
                                            <th>ml</th>
											<th>Delete</th>
										</tr>";
                            $i = 0;
                            while ($row = $result->fetch_assoc()) {
                                $i++;
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>" . $row["blood_group"] . "</td>";
                                echo "<td>" . $row["blood_ml"] . "</td>";
                                echo "<td><a href='admin_del_blood.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }

                        ?>

                        <a href='admin_view_blood.php' class='btn btn-primary'><i class='fa fa-edit'></i> View All</a>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <?php include("admin_footer.php"); ?>

</body>

</html>