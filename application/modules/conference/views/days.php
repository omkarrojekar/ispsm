<?php foreach ($days as $row): ?>
	<?php $conference_slug = $this->uri->segment(3); ?>
   <a href="<?= base_url();?>conference/view/<?= $conference_slug ?>/<?= $row->day; ?>"><button class="btn btn-info <?php if($this->uri->segment(4) == $row->day){echo "active";}?>"><?php echo $row->day; ?></button></a>
    <?php endforeach; ?>