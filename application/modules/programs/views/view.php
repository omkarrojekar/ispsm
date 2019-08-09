 <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <img src="<?php echo base_url(); ?>assets/images/conferences/inside/ispsminside.jpg" class="img-responsive proceedings" alt="">
           </div>
  </div>
 
<div class="row">
  <div class="col-md-7 col-sm-12 ml-4">
      <h3 class="mt-3"><?php echo $session_name ?></h3>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe src="https://player.vimeo.com/video/<?php echo $video_url ?>" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
      <h5 class="mt-3"><?php echo $title ?></h5>
      <hr>

      <p class="video-desc"><strong>Chairpersons :</strong> <span class="doctor-desc"><?php echo $chairpersons ?></span></p>

      <?php if ($speaker == ""){ ?>

        <?php } else { ?>
          
              <p class="video-desc"><strong>Speaker :</strong> <?php echo $speaker ?></p>
          
        <?php } ?>

        <!-- Reviewer -->
        <?php if ($reviewer == ""){ ?>

        <?php } else { ?>

        
            <p class="video-desc"><strong>Reviewer :</strong> <?php echo $reviewer ?></p>
        

        <?php } ?>

        <!-- Moderator -->
        <?php if ($moderator == ""){ ?>

        <?php } else { ?>

        
            <p class="video-desc"><strong>Moderator :</strong> <?php echo $moderator ?></p>
        

        <?php } ?>

        <!-- Panelists -->

        <?php if ($panelists == ""){ ?>

        <?php } else { ?>

        
            <p class="video-desc"><strong>Panelists :</strong> <?php echo $panelists ?></p>
       

        <?php } ?>

        <!-- Team Leads -->

        <?php if ($team_lead == ""){ ?>

        <?php } else { ?>

        
            <p class="video-desc"><strong>Team Leads :</strong> <?php echo $team_lead ?></p>
        

        <?php } ?>

        <!-- Team Members -->

        <?php if ($team_members == ""){ ?>

        <?php } else { ?>

        
            <p class="video-desc"><strong>Team Members :</strong> <?php echo $team_members ?></p>
        

        <?php } ?>

        <!-- Others -->
        <?php if ($other == ""){ ?>

        <?php } else { ?>

        <?php echo $other ?>

        <?php } ?>

      <hr>
  </div>
  
  <div class="col-md-3  col-sm-12 ml-2">
   
  </div>
</div>

