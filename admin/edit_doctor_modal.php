<!-- Modal -->
<div id="edit-doctor<?php echo $doctor_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Doctor</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="txtDoctorID" id="txtDoctorID" value="<?php echo $doctor_id; ?>"/>
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
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateSpec">Specialization:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtUpdateSpec"
                                        id="txtUpdateSpec" value="<?php echo $row['specialization']; ?>"/>
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
                                            $dGender = $row['gender'];
                                            if ($dGender != "") {
                                                ?>
                                                <option value="<?php echo $dGender; ?>"><?php echo $dGender; ?></option>
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
                            <button type="submit" name="btnUpdateDoctor" class="btn btn-primary">
                                Update Doctor
                            </button>

                            <?php
                            if (isset($_POST['btnUpdateDoctor'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $doctID = clean($_POST['txtDoctorID']);
                                $nam = clean($_POST['txtUpdateName']);
                                $spec = clean($_POST['txtUpdateSpec']);
                                $gen = clean($_POST['ddlUpdateGender']);
                                $phon = clean($_POST['txtUpdatePhone']);
                                $emai = clean($_POST['txtUpdateEmail']);
                                $addr = clean($_POST['txtUpdateAddr']);

                                mysql_query("UPDATE doctor SET name='$nam',gender='$gen',phone_no='$phon',email='$emai',address='$addr',specialization='$spec' WHERE doctor_id='$doctID'") or die(mysql_error());
                                header('location:doctor.php');
                            }
                            ?>
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->