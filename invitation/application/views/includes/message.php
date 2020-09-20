<script>
	<?php if($this->session->flashdata('error')){ ?>
		$.alertable.alert('<?php echo $this->session->flashdata('error') ?>');
	<?php }?>
	<?php if($this->session->flashdata('success')){ ?>
		$.alertable.alert('<?php echo $this->session->flashdata('success') ?>');
	<?php }?>
</script>


