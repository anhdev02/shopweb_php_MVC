<?php
    foreach($data['all_new'] as $value):
?>

					<div class="box box-vertical box-text-bottom box-blog-post has-hover" style = "width = 30%; display: inline;">
						<div class="box-text text-left">
							<div class="box-text-inner blog-post-inner">
								<a href="<?= URL ?>index.php/frontend/detailnew/<?= $value['id']?>"><h5 class="post-title is-large "><?php echo $value['title']; ?></h5></a>
								<div class="meta-post-danhmuc"><span class="fa fa-folder"></span><span class="danh-muc-post">Tin tức </span><span class="fa fa-user"></span><span class="tac-gia"> </span> ninhbinhweb.net</div>
								<div class="is-divider"></div>
								<p class="from_the_blog_excerpt "><?php echo $value['short_description']; ?></p>
							</div>
						</div>
					</div> 
	<?php	endforeach;	?>