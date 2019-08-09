 <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <img src="<?php echo base_url(); ?>assets/images/conferences/inside/ispsminside.jpg" class="img-responsive proceedings" alt="">
           </div>
  </div>
  <section class="page-title video-page">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <span class="text-left ml-4">Day 1, 19<sup>th</sup> April 2019</span>
    </div>
    <div class="col-md-6 col-sm-12">
      <span class="text-center">Home / Conference / ISPSM <?php echo ucfirst($this->uri->segment(4)); ?></span>
    </div>
  </div>
</section>
<div class="row">
  <div class="col-md-7  col-sm-12">
      <div class="row">
        <?php foreach ($get_conferences_video as $row): ?>
         <div class="col-md-12" style="margin-top: 15px;">
          <div class="bg-grey ml-4 mt-2 mb-2 p-2">
               <p>
               <a href="<?= base_url();?>programs/topic/<?= $row->url; ?>" title="<?= $row->title ?>"><img src="<?= base_url();?>assets/images/programs/<?= $row->image ?>" alt="<?= $row->title ?>" class="left_pic proceedings-image" style="height: 100px"/>
               </a>
                 <?= $row->title ?>
            </p>
          <?php if ($row->speaker == "") { ?>

            <?php } else { ?>
              <p><strong>Speaker :</strong> <?= $row->speaker ; ?></p>
            <?php } ?>

            <?php if ($row->moderator == "") { ?>

            <?php } else { ?>
              <p><strong>Moderator :</strong> <?= $row->moderator ; ?></p>
            <?php } ?>
          <a href="<?= base_url();?>programs/topic/<?= $row->url; ?>" class=""><img src="<?php echo base_url(); ?>assets/images/conferences/inside/watch.jpg" alt="" style="width:100px;"></a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
  </div>
  
  <div class="col-md-3  col-sm-12 ml-2 mt-3">
   <?php $this->load->view('days'); ?>
  </div>
</div>




 