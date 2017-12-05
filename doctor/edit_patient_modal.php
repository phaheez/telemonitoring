<!-- Modal -->
<div id="edit-patient<?php echo $patient_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Patient</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="txtPatientID" id="txtPatientID" value="<?php echo $patient_id; ?>"/>
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateName">Name:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtUpdateName"
                                        id="txtUpdateName" value="<?php echo $row['name']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="ddlUpdateGender">Gender:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <select class="form-control" id="ddlUpdateGender" name="ddlUpdateGender" required>
                                            <?php 
                                            $pGender = $row['gender'];
                                            if ($pGender != "") {
                                                ?>
                                                <option value="<?php echo $pGender; ?>"><?php echo $pGender; ?></option>
                                                <option value="">Please Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <?php
                                            }else {
                                                ?>
                                                <option value="">Please Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdatePhone">Phone No:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtUpdatePhone"
                                        id="txtUpdatePhone" value="<?php echo $row['phone_no']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateEmail">Email:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtUpdateEmail"
                                        id="txtUpdateEmail" value="<?php echo $row['email']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtTemp">Temperature:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtTemp"
                                        id="txtTemp" value="<?php echo $row['temperature']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtPulse">Pulse:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtPulse"
                                        id="txtPulse" value="<?php echo $row['pulse']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtBloodGroup">Blood Group:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtBloodGroup"
                                        id="txtBloodGroup" value="<?php echo $row['blood_group']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtBloodPressure">Blood Pressure:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtBloodPressure"
                                        id="txtBloodPressure" value="<?php echo $row['blood_pressure']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtHeight">Height:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtHeight"
                                        id="txtHeight" value="<?php echo $row['height']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtWeight">Weight:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtWeight"
                                        id="txtWeight" value="<?php echo $row['weight']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtDOB">Date of Birth:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type='text' class="datetimepicker1 form-control" name="txtDOB" 
                                        placeholder="Pick Date of Birth" id="txtDOB" value="<?php echo $row['dob']; ?>" required/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateAddr">Address:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <textarea type="text" class="form-control" required name="txtUpdateAddr"
                                        id="txtUpdateAddr" placeholder="Enter Address" rows="5" cols="40"><?php echo $row['address']; ?></textarea>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" name="btnUpdatePatient" class="btn btn-primary">
                                Update Patient
                            </button>

                            <?php
                            if (isset($_POST['btnUpdatePatient'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $doctID = $_SESSION['doctor_id'];

                                $patID = clean($_POST['txtPatientID']);
                                $nam = clean($_POST['txtUpdateName']);
                                $gen = clean($_POST['ddlUpdateGender']);
                                $phon = clean($_POST['txtUpdatePhone']);
                                $emai = clean($_POST['txtUpdateEmail']);
                                $addr = clean($_POST['txtUpdateAddr']);
                                $temp = clean($_POST['txtTemp']);
                                $puls = clean($_POST['txtPulse']);
                                $bGroup = clean($_POST['txtBloodGroup']);
                                $bPressure = clean($_POST['txtBloodPressure']);
                                $hei = clean($_POST['txtHeight']);
                                $wei = clean($_POST['txtWeight']);
                                $birth = clean($_POST['txtDOB']);

                                mysql_query("UPDATE patient SET 
                                    name='$nam',
                                    gender='$gen',
                                    phone_no='$phon',
                                    email='$emai',
                                    address='$addr',
                                    temperature='$temp',
                                    pulse='$puls',
                                    blood_group='$bGroup',
                                    blood_pressure='$bPressure',
                                    height='$hei',
                                    weight='$wei',
                                    dob='$birth'
                                    WHERE patient_id='$patID'") or die(mysql_error());

                                    ?>
                                    <script>
                                    alert('Profile Updated Successfully!');
                                    window.location.href='patient.php';
                                    </script>
                                    <?php
                                }
                                ob_end_flush();
                                ?>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
    $(function () {
        $('.datetimepicker1').datetimepicker();
    });

    </script>