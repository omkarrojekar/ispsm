<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5><?= $headline; ?></h5>
        </div>
        <div class="card-block">
            <?php
              if (isset($flash)) {

                echo $flash;
              }
            ?>
            <div class="table-responsive">
                <table id="key-act-button" class="display table nowrap table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Conference Name</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $row_count = 1;
                            $this->load->module('timedate');
                            foreach ($query->result() as $row) {
                            $date_created = $this->timedate->get_nice_date($row->date_created,'cool');
                            $delete = base_url()."conference/delete/$row->id";
                          ?>
                        <tr>
                            <td><?= $row_count++ ?></td>
                            <td><?= $row->conference_name ?></td>
                            <td>
                                <?php if ($row->status == 1) { ?>
                                    <a href="#!" class="label theme-bg f-12 text-white">Active</a>
                                <?php } else { ?>
                                    <a href="#!" class="label theme-bg f-12 text-white">Not Active</a>
                                <?php } ?>
                            </td>
                            <td><?= $date_created?></td>
                            <td>
                                <a href="<?= $edit; ?><?= $row->id?>" class="label btn-primary f-12 text-white"><i class="fa fa-eye"></i></a>
                                <a href="" class="label btn-danger f-12 text-white"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url();?>admin_assets/plugins/data-tables/css/datatables.min.css">
<script src="<?= base_url();?>admin_assets/plugins/data-tables/js/datatables.min.js"></script>
<script src="<?= base_url();?>admin_assets/js/pages/tbl-datatable-custom.js"></script>

