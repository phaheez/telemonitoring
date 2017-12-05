<!-- Modal -->
<div id="edit-notification<?php echo $notification_id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header"></div>

            <!-- Modal Body -->
            <div class="modal-body" style="font-family:tahoma">
                <div class="row" >
                    <div class="alert alert-info">
                        <strong>Edit Notification</strong>
                    </div>
                    <form role="form" class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="txtNotificationID" id="txtNotificationID" value="<?php echo $notification_id; ?>"/>
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateSubject">Subject:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <input type="text" class="form-control" required name="txtUpdateSubject"
                                        id="txtUpdateSubject" placeholder="Enter Notification Subject" value="<?php echo $row['subject']; ?>"/>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label  class="col-sm-3 col-md-3 control-label" for="txtUpdateDescription">Description:</label>
                                    <div class="col-sm-8 col-md-8">
                                        <textarea type="text" class="form-control" required name="txtUpdateDescription"
                                        id="txtUpdateDescription" placeholder="Enter Notification Description" rows="5" cols="40"><?php echo $row['description']; ?></textarea>
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
                            <button type="submit" name="btnUpdateNotification" class="btn btn-primary">
                                Update Patient
                            </button>

                            <?php
                            if (isset($_POST['btnUpdateNotification'])) {
                                function clean($str) {
                                    $str = @trim($str);
                                    if (get_magic_quotes_gpc()) {
                                        $str = stripslashes($str);
                                    }
                                    return mysql_real_escape_string($str);
                                }

                                $notiID = clean($_POST['txtNotificationID']);

                                $sub = clean($_POST['txtUpdateSubject']);
                                $desc = clean($_POST['txtUpdateDescription']);

                                mysql_query("UPDATE notification SET subject='$sub',description='$desc' WHERE notification_id='$notiID'") or die(mysql_error());

                                    ?>
                                    <script>
                                    alert('Notification Updated Successfully!');
                                    window.location.href='notification.php';
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