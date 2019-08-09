<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5><?= $headline; ?></h5>
        </div>
        <div class="card-body">
            <h5><?= $headline; ?></h5>
            <hr>
            <?php
              if (isset($flash)) {

                echo $flash;
              }
            ?>
            <div class="row">
                <div class="col-md-8 col-sm-offset-2">
                    <?php echo form_open_multipart(''); ?>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="conference_id">Select Conference Name </label>
                            </div>
                            <div class="col-sm-10">
                                <select name="conference_id" id="conference_id" class="form-control">
                                    <option value="">Select Conference</option>
                                    <?php
                                      foreach($get_conferences->result() as $conferences) {
                                    ?>
                                    <option value="<?= $conferences->id ?>" <?php if($conferences->id == $conference_id){ echo 'selected="selected"'; } ?>><?php echo $conferences->conference_name ?></option>
                                    <?php  } ?>
                                </select>
                                <?php echo form_error('conference_id', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>
                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="session_name">Enter Session Name </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="session_name" name="session_name" placeholder="Enter Session Name" value="<?= $session_name ?>">
                                <?php echo form_error('session_name', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="title">Enter Title</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?= $title ?>">
                                <?php echo form_error('title', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="chairpersons">Enter Chairperson</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="chairpersons" name="chairpersons" placeholder="Enter Chairperson" value="<?= $chairpersons ?>">
                                <?php echo form_error('chairpersons', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="video_url">Enter Video URL</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Enter Video URL" value="<?= $video_url ?>">
                                <?php echo form_error('video_url', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="speaker">Enter Speaker Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="speaker" name="speaker" placeholder="Enter Speaker Name" value="<?= $speaker ?>">
                                <?php echo form_error('speaker', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="reviewer">Enter Reviewer Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reviewer" name="reviewer" placeholder="Enter Speaker Name" value="<?= $reviewer ?>">
                                <?php echo form_error('reviewer', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="moderator">Enter Moderator Name</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="moderator" name="moderator" placeholder="Enter Moderator Name" value="<?= $moderator ?>">
                                <?php echo form_error('moderator', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="panelists">Enter Panelist</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="panelists" name="panelists" placeholder="Enter Panelist Name" value="<?= $panelists ?>">
                                <?php echo form_error('panelists', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="team_lead">Enter Team Leads</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="team_lead" name="team_lead" placeholder="Enter Team Leads" value="<?= $team_lead ?>">
                                <?php echo form_error('team_lead', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="team_members">Enter Team Members </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="team_members" name="team_members" placeholder="Enter Team Members" value="<?= $team_members ?>">
                                <?php echo form_error('team_members', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="day">Enter Day </label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="day" name="day" placeholder="Enter Team Members" value="<?= $day ?>">
                                <?php echo form_error('day', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>


                        <div class="row form-group">
                            <div class="col-sm-12">
                                <label for="other">Other </label>
                            </div>
                            <div class="col-sm-12">
                                <textarea name="other" id="other" class="form-control" ><?= $description ?></textarea>
                            </div>

                        </div>

                        <hr>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="description">Enter Meta Description</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter Meta Description" value="<?= $description ?>">
                                <?php echo form_error('description', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="keywords">Enter Meta Keywords</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter Meta Keywords" value="<?= $keywords ?>">
                                <?php echo form_error('keywords', '<div class="text-danger text-left">', '</div>'); ?>
                            </div>

                        </div>


                        
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label for="userfile">Upload Image</small></label><br>
                            </div>
                            <div class="col-sm-10"><input type="file" name="userfile" size="20" /></div>

                        </div>
                        <button type="submit" class="btn btn-warning" name="submit" value="Cancel">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
