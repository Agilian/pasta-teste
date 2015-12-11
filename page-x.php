<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package sparkling
 */

get_header(); ?>
	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">
			<?php 
			$dir1 = '../../../ConteudoAplicativo/noticias/';
			$i = 'wp-content/themes/sparkling/z/noticias/f2.jpg';
			$c = 0;
			$imgfinal =  'ConteudoAplicativo/noticias/'?> 
				<?php query_posts("category_name=noticias&showposts=9&paged=$paged&order=DESC"); ?> 
              <?php if (have_posts()): while (have_posts()) : the_post();?>	
			  
			  
			  
			  
			  					
								<?php if(has_post_thumbnail()) {
									switch ($c) {
										case 0:
											$i = 'wp-content/themes/sparkling/z/noticias/f1.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t1.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n1.php";
											echo $c;
											break;
										case 1:
											$i = 'wp-content/themes/sparkling/z/noticias/f2.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t2.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n2.php";
											break;
										case 2:
											$i = 'wp-content/themes/sparkling/z/noticias/f3.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t3.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n3.php";
											break;
										case 3:
											$i = 'wp-content/themes/sparkling/z/noticias/f4.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t4.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n4.php";
											break;
										case 4:
											$i = 'wp-content/themes/sparkling/z/noticias/f5.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t5.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n5.php";
											break;
										case 5:
											$i = 'wp-content/themes/sparkling/z/noticias/f6.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t6.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n6.php";
											break;
										case 6:
											$i = 'wp-content/themes/sparkling/z/noticias/f7.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t7.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n7.php";
											break;
										case 7:
											$i = 'wp-content/themes/sparkling/z/noticias/f8.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t8.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n8.php";
											break;
										case 8:
											$i = 'wp-content/themes/sparkling/z/noticias/f9.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t9.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n9.php";
											break;
										case 9:
											$i = 'wp-content/themes/sparkling/z/noticias/f10.jpg';
											$arquivo = "wp-content/themes/sparkling/z/noticias/t10.txt";
											$arquivo2 = "wp-content/themes/sparkling/z/noticias/n10.php";
											break;
									}
									$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'post-image-app' );
									 echo '<img src="' . $image_src[0]  . '" width="100%"  />';
									 copy($image_src[0], $i);
									 
									 
									 

							
							
							$texto = get_the_title();
							$texto2 = "
							<!DOCTYPE html><html>	<head>	<link rel=\"stylesheet\" href=\"s.css\">	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">		<meta charset=\"UTF-8\">	</head>	<body style=\"width: 95%; margin-left: 5%;\" >		<header>					</header>			<div style=\"width: 95%; \">					
<h1>
".get_the_title()."
</h1><p style=\"width: 95%; text-align: justify;\">
".get_the_content()."
</p></div></body></html>

							";
							
							

							if(is_writable($arquivo)) {
								$manipular = fopen("$arquivo", "w");

								if(!$manipular) {
									echo "Erro<br /><br />Não foi possível abrir o arquivo.";
								}
								if(!fwrite($manipular, $texto)) {
									echo "Erro<br /><br />Não foi possível gravar as informações no arquivo.";
								}
								echo "ok";

								fclose($manipular);
							}
							else {
								echo "O $arquivo não tem permissões de leitura e/ou escrita.";
							}
							
							
							if(is_writable($arquivo2)) {
								$manipular2 = fopen("$arquivo2", "w");

								if(!$manipular2) {
									echo "Erro<br /><br />Não foi possível abrir o arquivo.";
								}
								if(!fwrite($manipular2, $texto2)) {
									echo "Erro<br /><br />Não foi possível gravar as informações no arquivo.";
								}
								echo "ok";

								fclose($manipular2);
							}
							else {
								echo "O $arquivo não tem permissões de leitura e/ou escrita.";
							}
							 
									 
									 
									 
									 
									 $c++;
									 
									 
									 
									 
								}  ?>
						</br>
						</br>
			<?php endwhile; ?>
			<?php wp_pagenavi(); ?>
			<?php
				wp_reset_query();  // Restore global post data
			?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
