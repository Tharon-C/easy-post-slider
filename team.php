

<div class="clear" id="carousel">
	
	<div class="clear" id="slides"> 
		<ul>
			<?php
	$args = array('post_type' => 'team', 'posts_per_page' => 10, 'order'=> 'ASC', 'orderby' => 'date' );
	$postslist = get_posts( $args );
	foreach ( $postslist as $post ) :
	  setup_postdata( $post ); ?>
			<li><a class="person" data-name="<?php echo $post->post_name;?>">ffff
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('thumbnail');
					} 
				else  {  
					echo '<img src="' . plugins_url( 'img/default-post-img.jpg', __FILE__ ) . '" > ';
					} ?>
			</a>
			</li>	
			<?php
	endforeach; 
	wp_reset_postdata();
?>
		</ul>
		<div class="clear"></div>
	</div>
<div id="buttons">
		<a href="#" id="prev"><i class="fa fa-angle-left"></i></a>
		<a href="#" id="next"><i class="fa fa-angle-right"></i></a>
		<div class="clear"></div>
	</div>
</div>

<div class="" id="team-detail">
	<?php
	$args = array('post_type' => 'team', 'posts_per_page' => 10, 'order'=> 'ASC', 'orderby' => 'date' );
	$postslist = get_posts( $args );
	foreach ( $postslist as $post ) :
	  setup_postdata( $post ); ?> 

		<div id="<?php echo $post->post_name;?>" class="detail pad-50px clear">
			<div class="p-l blog-thumb">
			<a href="<?php the_permalink(); ?>">
			<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				the_post_thumbnail('medium');
					} 
				else  { ?> 
				<img class="img-1 p-l" src="<?php echo get_template_directory_uri();?>/img/default-post-img.jpg" alt="Logo"> 
				<?php } ?>
			</a>
			</div>
			
			<div class="p-l pad-l-20px col-3-5">
				<a  href="<?php the_permalink(); ?>" class="txt-grey-7">
				<h2 class="title-2"><?php the_title(); ?></h2>
				</a>  
				<?php the_date(); ?>
				<p><?php the_excerpt(); ?></p>
			</div>
		</div>
	<?php
	endforeach; 
	wp_reset_postdata();
?>

</div>

