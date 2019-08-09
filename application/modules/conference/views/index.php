<div class="page-title page-title-style-02 bkg-img09">
           <div class="pt-mask-light"></div>
       </div>
<div class="page-content">

    <div class="container">

        <div class="row portfolio-items-holder">

            <!-- Show all Conferences -->
            <?php
              foreach($get_conferences->result() as $conferences) {
            ?>

            <a href="<?= base_url();?>conference/view/<?= $conferences->slug?>"><img src="<?= base_url();?>assets/images/conferences/<?= $conferences->image?>" alt="<?= $conferences->conference_name?>" style="width: 100%;"></a> <br>

            <?php } ?>

        </div>

    </div>
</div>
