<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5><?= $headline; ?></h5>
        </div>
        <div class="card-body">
            <h5>Add Conference</h5>
            <hr>
            <?php
              if (isset($flash)) {

                echo $flash;
              }
            ?>
            <div class="row">
                <div class="col-md-6">
                    <?php echo form_open_multipart(''); ?>
                        <div class="form-group">
                            <label for="conference_name">Enter Conference Name</label>
                            <input type="text" class="form-control" id="conference_name" name="conference_name" placeholder="Enter Category Name" value="<?= $conference_name ?>">
                            <?php echo form_error('conference_name', '<div class="text-danger text-left">', '</div>'); ?>

                        </div>

                        <div class="form-group">
                            <label for="venue">Enter Conference Venue</label>
                            <input type="text" class="form-control" id="venue" name="venue" placeholder="Enter Category Name" value="<?= $venue ?>">
                            <?php echo form_error('venue', '<div class="text-danger text-left">', '</div>'); ?>

                        </div>

                        <div class="form-group">
                            <label for="conference_start_date">Enter Conference Start Date</label>
                            <input type="text" class="form-control" id="conference_start_date" name="conference_start_date" placeholder="Enter Category Name" value="<?= $conference_start_date ?>">
                            <?php echo form_error('conference_start_date', '<div class="text-danger text-left">', '</div>'); ?>

                        </div>

                        <div class="form-group">
                            <label for="conference_end_date">Enter Conference End Date</label>
                            <input type="text" class="form-control" id="conference_end_date" name="conference_end_date" placeholder="Enter Category Name" value="<?= $conference_end_date ?>">
                            <?php echo form_error('conference_end_date', '<div class="text-danger text-left">', '</div>'); ?>

                        </div>
                        <div class="form-group">
                            <label for="userfile">Upload Banner</small></label><br>
                            <input type="file" name="userfile" size="20" />

                        </div>
                        <button type="submit" class="btn btn-warning" name="submit" value="Cancel">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
