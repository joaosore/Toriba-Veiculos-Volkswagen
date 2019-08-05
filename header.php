<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jd
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="<?php echo get_bloginfo(); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M9JK7D7');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9JK7D7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script type="text/javascript">
	let get_template_directory_uri = '<?php echo get_template_directory_uri(); ?>';
</script>
	<?php 
		echo get_component('loading');
	?>

	<header>
		<div class="box-menu"></div>
		<div class="menus">
			<div class="container">
				<nav class="navbar navbar-expand-lg justify-content-center">
					<div class="box-btn-menu">
						<object id="menu-svg" type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/dist/assets/menu-open-close.svg" alt="Abrir ou Fechar Menu"></object>
					</div>

					<a class="navbar-brand" href="<?php echo get_home_url(); ?>" aria-label="<?php echo get_bloginfo(); ?>">
						<img src="<?php echo wp_get_attachment_url(59309); ?>" width="85" height="31" class="d-inline-block align-top" alt="Logo <?php echo get_bloginfo(); ?>">
					</a>

					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item d-block d-lg-none d-xl-none">
								<a class="nav-link" href="/agende-seu-servico/">Agende seu serviço</a>
							</li>
							<?php echo get_menu(); ?>
						</ul>
					</div>

					<a class="btns-a" href="/agende-seu-servico/">
						<div class="button-1-inverse d-none d-lg-flex d-xl-flex">
							<span>Agende seu serviço</span>
						</div>
					</a>

					<div class="box-btn-balao">
						<object id="balao-svg" type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/dist/assets/menu-balao-close.svg" alt="Abrir ou Fechar Formulário"></object>
					</div>
				</nav>
				<?php 
					echo get_component('formulario-flutuante');
				?>
			</div>
		</div>
		<div class="bar-phones">
			<div class="container-fluid">
				<div class="dados">
					<?php 
						$atendimento_aos_domingos = get_atendimento_domingos('convert');
					?>
					<div class="owl-carousel owl-theme bar-phones-carroussel">
						<?php if($atendimento_aos_domingos): ?>
						    <div class="item">
						    	<span>Atendimento no próximo domingo:</span>
						    	<p><?php echo $atendimento_aos_domingos .' '. get_lojas_abertas(get_atendimento_domingos());  ?></p>
						    </div>
						<?php endif; ?>
					    <div class="item">
					    	<span>Central de agendamento:</span>
					    	<p>
					    		<?php 
					    			foreach (get_central_de_atendimento() as $key => $value)
					    			{
					    				if($key != 0)
					    				{
					    					echo ' | ';
					    				}
					    				if($value['tipo'] == 'Whatsapp')
					    				{
					    					echo '<a href="https://api.whatsapp.com/send?phone=55'.$value['telefone'].'" target="_blank" class="phonemask">'.$value['telefone'].'</a>';
					    				}
					    				else if($value['tipo'] == 'Telefone')
					    				{
					    					echo '<a href="tel:'.$value['telefone'].'" target="_blank" class="phonemask">'.$value['telefone'].'</a>';
					    				}
					    			}
					    		?>
					    	</p>
					    </div>
					    <?php 
					    	foreach (get_lojas('telefones') as $key => $loja) {
					    		echo '<div class="item">';
					    		echo '	<span>Unidade '.$loja['nome'].':</span>';
					    		echo '	<p>';
					    		$Telefones = 0;
					    		foreach ($loja['telefones'] as $keyTelefones => $telefone) {
					    			if($keyTelefones != 0)
				    				{
				    					echo ' | ';
				    				}
				    				echo '<a href="tel:'.$telefone['numero'].'" target="_blank" class="phonemask">'.$telefone['numero'].'</a>';
				    				$Telefones = $Telefones + 1;
					    		}
					    		foreach ($loja['whatsapp'] as $keyWhatsapp => $whatsapp) {
					    			if($keyWhatsapp != 0 || $Telefones != 0)
				    				{
				    					echo ' | ';
				    				}
				    				echo '<a href="https://api.whatsapp.com/send?phone=55'.$whatsapp['numero'].'" target="_blank" class="phonemask">'.$whatsapp['numero'].'</a>';

					    		}
					    		echo '	</p>';
					    		echo '</div>';
					    	}
					    ?>
					</div>
				</div>
			</div>
		</div>
	</header>
<div id="barba-wrapper">