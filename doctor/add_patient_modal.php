<!-- Modal -->
<div id="add-patient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Patient</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtName">Name:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtName"
                                    id="txtName" placeholder="Enter Patient Fullname"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="ddlGender">Gender:</label>
                                <div class="col-sm-8 col-md-8">
                                    <select class="form-control" id="ddlGender" name="ddlGender" required>
                                        <option value="">Please Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtPhoneNo">Phone No:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtPhoneNo"
                                    id="txtPhoneNo" placeholder="Enter Patient Phone"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtEmail">Email:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtEmail"
                                    id="txtEmail" placeholder="Enter Patient Email"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtAddress">Address:</label>
                                <div class="col-sm-8 col-md-8">
                                    <textarea type="text" class="form-control" required name="txtAddress"
                                        id="txtAddress" placeholder="Enter Patient Address" rows="5" cols="40"></textarea>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="btnAddPatient" class="btn btn-primary">
                            Add Patient
                        </button>

                        <?php
                        if (isset($_POST['btnAddPatient'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $name = clean($_POST['txtName']);
                            $gender = clean($_POST['ddlGender']);
                            $phone_no = clean($_POST['txtPhoneNo']);
                            $email = clean($_POST['txtEmail']);
                            $address = clean($_POST['txtAddress']);

                            $doctID = $_SESSION['doctor_id'];
                            
                            //Randomized Generated LecturerID
                            for($t = 0; $t < 2; $t++) 
                            {
                                @$intega .= mt_rand(100,300);
                            }
                            $intega = "PAT-" . $intega;

                            //Randomized Generated Password
                            $length = 8;
                            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                            $password = substr(str_shuffle($chars), 0, $length);

                            
                            $sql1 = mysql_query("SELECT patient_id FROM patient WHERE patient_id='$intega'");

                            if (mysql_num_rows($sql1)> 0) {
                                echo '<script language="javascript">';
                                echo 'alert("Error: PatientID already exist")';
                                echo '</script>';
                                echo '<meta http-equiv="refresh" content="0;url=patient.php" />';
                            } else {
                                $sql2 = mysql_query("SELECT email FROM patient WHERE email='$email'");
                                if (mysql_num_rows($sql2)> 0) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Error: Email already exist")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=patient.php" />';
                                } else {
                                    mysql_query("INSERT INTO patient(patient_id,name,gender,phone_no,email,address,password,doctor_id,created_date)
                                     VALUES('$intega','$name','$gender','$phone_no','$email','$address','$password','$doctID',NOW())") or die(mysql_error());
                                    header('location:patient.php');
                                }
                            }
                        }
                        ?>
                    </div>
                </form>
            </div>

        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->