<?php

 $search_text = __( 'Type to search ...', 'sidetrack' );
 // $search_text = '<i class="fa fa-search" aria-hidden="true"></i>';
	?>
<form method="get" id="searchform"   action="<?php bloginfo( 'url' ); ?>/">
<input type="text" value="<?php echo $search_text; ?>"   name="s" id="s"
onblur="if (this.value == '')   {this.value = '<?php echo $search_text; ?>';}"
onfocus="if (this.value == '<?php echo $search_text; ?>'){this.value = '';}" />
<input type="hidden" id="searchsubmit" />
</form>
