<?php

if ( ! is_mobile() ) {
	?>
	<style type="text/css">
		/*@media screen  and (min-width: 1025px) {*/
			#content-header {
				height: 6rem;
				/*box-shadow: 0 0 6px #333;*/
				/*width: 80%;*/
			}
		/*}*/
	</style>
	<?php
} else {
	?>
	<style type="text/css">
		#content-header {
			height: 1rem;
			box-shadow: 0 0 6px #333;
			background-color: #ffffff;
		}		
		#content-header > div.page-title {
			text-align: center;
			padding-top: 3rem;
			font-size: 2.2rem;
			color: #A4D05F;
		}
	</style>
	<?php
}
