<!-- Modal -->
<div id="add-doctor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Doctor</strong>
                </div>
                <form role="form" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtName">Name:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtName"
                                    id="txtName" placeholder="Enter Doctor Fullname"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtSpecialization">Specialization:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtSpecialization"
                                    id="txtSpecialization" placeholder="Enter Doctor Specialization"/>
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
                                    id="txtPhoneNo" placeholder="Enter Doctor Phone"/>
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
                                    id="txtEmail" placeholder="Enter Doctor Email"/>
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
                                        id="txtAddress" placeholder="Enter Address" rows="5" cols="40"></textarea>
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
                        <button type="submit" name="btnAddDoctor" class="btn btn-primary">
                            Add Doctor
                        </button>

                        <?php
                        if (isset($_POST['btnAddDoctor'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $name = clean($_POST['txtName']);
                            $specialization = clean($_POST['txtSpecialization']);
                            $gender = clean($_POST['ddlGender']);
                            $phone_no = clean($_POST['txtPhoneNo']);
                            $email = clean($_POST['txtEmail']);
                            $address = clean($_POST['txtAddress']);
                            
                            //Randomized Generated LecturerID
                            for($t = 0; $t < 2; $t++) 
                            {
                                @$intega .= mt_rand(100,300);
                            }
                            $intega = "DOC-" . $intega;

                            //Randomized Generated Password
                            $length = 8;
                            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                            $password = substr(str_shuffle($chars), 0, $length);

                            
                            $sql1 = mysql_query("select doctor_id from doctor where doctor_id='$intega'");

                            if (mysql_num_rows($sql1)> 0) {
                                echo '<script language="javascript">';
                                echo 'alert("Error: DoctorID already exist")';
                                echo '</script>';
                                echo '<meta http-equiv="refresh" content="0;url=doctor.php" />';
                            } else {
                                $sql2 = mysql_query("select email from doctor where email='$email'");
                                if (mysql_num_rows($sql2)> 0) {
                                    echo '<script language="javascript">';
                                    echo 'alert("Error: Email already exist")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=doctor.php" />';
                                } else {
                                    mysql_query("INSERT INTO doctor(doctor_id,name,gender,phone_no,email,address,specialization,password,added_date)
                                     VALUES('$intega','$name','$gender','$phone_no','$email','$address','$specialization','$password',NOW())") or die(mysql_error());
                                    header('location:doctor.php');
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