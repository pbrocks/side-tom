<?php
/**
 * Plugin Name: A Menu Demo
 */


add_shortcode( 'a-menu-demo', 'a_menu_demo_thing' );
function a_menu_demo_thing() {
?>
<style type="text/css">
	.custom-header,
	.sub-menu {
	  display: none;
	}
	ul#main-menu,
	ul.sub-menu {
		list-style: none;
	}
</style>
<section>
	<div>
  <ul id="main-menu">
	<li><a href="#">Main Menu 1</a></li>
	<li><a href="#"> > Main Menu 2</a>
	  <ul class="sub-menu">
		<li><a href="#">Sub Menu 2.1</a></li>
		<li><a href="#">Sub Menu 2.2</a></li>
	  </ul>
	</li>
	<li><a href="#"> > Main Menu 3</a>
	  <ul class="sub-menu">
		<li><a href="#">Sub Menu 3.1</a>
		</li>
		<li><a href="#">Sub Menu 3.2</a>
		</li>
		<li><a href="#">Sub Menu 3.3</a>
		</li>
	  </ul>
	</li>
	<li><a href="#">Main Menu 4</a>
	</li>
	<li><a href="#">Main Menu 5</a>
	</li>
	<li><a href="#"> > Main Menu 6</a>
	  <ul class="sub-menu">
		<li><a href="#">Sub Menu 6.1</a>
		</li>
		<li><a href="#">Sub Menu 6.2</a>
		</li>
		<li><a href="#">Sub Menu 6.3</a>
		</li>
	  </ul>
	</li>
	<li><a href="#"> > Main Menu 7</a>
	  <ul class="sub-menu">
		<li><a href="#">Sub Menu 7.1</a>
		</li>
		<li><a href="#">Sub Menu 7.2</a>
		</li>
		<li><a href="#">Sub Menu 7.3</a>
		</li>
	  </ul>
	</li>
  </ul>
</div>
</section>
<?php
}

add_action( 'wp_enqueue_scripts', 'menu_demo_scripts' );
function menu_demo_scripts() {
	wp_enqueue_script( 'menu-demo', plugins_url( 'menu-demo.js', __FILE__ ), array( 'jquery' ), time() );
}

