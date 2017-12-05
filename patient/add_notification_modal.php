<!-- Modal -->
<div id="add-notification" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header"></div>

        <!-- Modal Body -->
        <div class="modal-body" style="font-family:tahoma">
            <div class="row" >
                <div class="alert alert-info">
                    <strong>Add New Notification</strong>
                </div>
                <form role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtSubject">Subject:</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="text" class="form-control" required name="txtSubject"
                                    id="txtSubject" placeholder="Enter Notification Subject"/>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="txtDescription">Description:</label>
                                <div class="col-sm-8 col-md-8">
                                    <textarea type="text" class="form-control" required name="txtDescription"
                                    id="txtDescription" placeholder="Enter Notification Description" rows="5" cols="40"></textarea>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="col-sm-3 col-md-3 control-label" for="video">Video(If Available):</label>
                                <div class="col-sm-8 col-md-8">
                                    <input type="file" id="video" name="video" class="form-control" required>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-3 col-md-3"></div>
                                <div class="text-center text-danger col-sm-8 col-md-8">
                                    <i>Upload only (.mp4 file)<br>
                                        Maximum file size <strong>200MB</strong>
                                    </i>   
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
                        <button type="submit" name="btnAddNotification" class="btn btn-primary">
                            Add Notification
                        </button>

                        <?php
                        if (isset($_POST['btnAddNotification'])) {
                            function clean($str) {
                                $str = @trim($str);
                                if (get_magic_quotes_gpc()) {
                                    $str = stripslashes($str);
                                }
                                return mysql_real_escape_string($str);
                            }
                            
                            $patID = $_SESSION['patient_id'];
                            $subject = clean($_POST['txtSubject']);
                            $description = clean($_POST['txtDescription']);
                            $status = "No-reply";

                            $videoname = $_FILES['video']['name'];
                            $videoname = preg_replace("/[^a-zA-Z0-9.]/", "-", $videoname);
                            $videoname = rand(1000,100000)."-".$videoname;
                            $videoname_loc = $_FILES['video']['tmp_name'];
                            $videoname_size = $_FILES['video']['size'];
                            $videoname_type = $_FILES['video']['type'];
                            $videoLocation = "my_videos/";

                            if ($videoname_type == "video/mp4") {
                                $new_video = strtolower($videoname);
                                if ($videoname_size > (209715200)) {
                                    ?>
                                    <script>
                                    alert('Error: Video size must not exceed 200MB.');
                                    window.location.href='notification.php';
                                    </script>
                                    <?php
                                } else {
                                    $new_video_name = str_replace(' ', '-', $new_video);

                                    if (move_uploaded_file($videoname_loc, $videoLocation.$new_video_name)) {
                                        mysql_query("INSERT INTO notification(patient_id,subject,description,video_name,status,created_date)
                                           VALUES('$patID','$subject','$description','$new_video_name','$status',NOW())") or die(mysql_error());
                                           ?>
                                           <script>
                                           alert('Notification Successfully Sent!');
                                           window.location.href='notification.php';
                                           </script>
                                           <?php
                                       } else {
                                        ?>
                                        <script>
                                        alert('Error while uploading video');
                                        window.location.href='notification.php';
                                        </script>
                                        <?php
                                    }
                                } 
                            }else {
                                ?>
                                <script>
                                alert('Error: Only (mp4) video format required!');
                                window.location.href='notification.php';
                                </script>
                                <?php
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