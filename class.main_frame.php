<?php
	require_once("resources/functions.php");
	
	class main_frame
	{
		var $charset = "";
		var $titleWindow = "";
		var $js = "";
		
		function main_frame()
		{
			global $str;
			
			$this->setTitleWindow($str[10000]);
			$this->setCharset("utf-8");
		}
		
		function setTitleWindow($title)
		{
			$this->titleWindow = $title;
		}
		function getTitleWindow()
		{
			return $this->titleWindow;
		}
		
		function setCharset($charset)
		{
			$this->charset = $charset;
		}
		function getCharset()
		{
			return $this->charset;
		}
		
		function addJS($js)
		{
			$this->js = $js;
		}
		function getJS()
		{
			return $this->js;
		}
		
		###########################################################################################
		## 											OUTPUT
		###########################################################################################
		
		function output()
		{
			?>
				<!DOCTYPE html>
				<html lang="pt-br">
					<head>
						<meta charset="<?=$this->getCharset();?>">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<meta name="description" content="">
						<meta name="author" content="">
						<meta property="og:image" content="<?=getImgSrc("slider", "bg1");?>"/>
						<title><?=$this->getTitleWindow();?></title>
						<?php
							$this->loadHeadResource();
							//$this->loadFavIcon();
						?>
					</head>
				<body>
					<?php
						$this->loadContent();
						$this->loadJS();
					?>
				</body>
				</html>
			<?php
		}
		
		###########################################################################################
		## 											HEAD
		###########################################################################################
		
		function loadHeadResource()
		{
			loadResource('resources/css/', 'bootstrap.min', 'css');
			loadResource('resources/css/', 'font-awesome.min', 'css');
			loadResource('resources/css/', 'prettyPhoto', 'css');
			loadResource('resources/css/', 'animate', 'css');
			loadResource('resources/css/', 'main', 'css');
			
			echo "<!--[if lt IE 9]>";
				loadResource('resources/js/', 'html5shiv', 'js');
				loadResource('resources/js/', 'respond.min', 'js');
			echo "<![endif]-->";
		}
		
		function loadFavIcon()
		{
			?>
				<link rel="shortcut icon" href="<?=getImgSrc("ico", "favicon", "ico");?>">
				<link rel="apple-touch-icon-precomposed" sizes="144x144" 	href="<?=getImgSrc("ico", "apple-touch-icon-144-precomposed");?>">
				<link rel="apple-touch-icon-precomposed" sizes="114x114" 	href="<?=getImgSrc("ico", "apple-touch-icon-144-precomposed");?>">
				<link rel="apple-touch-icon-precomposed" sizes="72x72" 		href="<?=getImgSrc("ico", "apple-touch-icon-72-precomposed");?>">
				<link rel="apple-touch-icon-precomposed" 					href="<?=getImgSrc("ico", "apple-touch-icon-57-precomposed");?>">
			<?php
		}
		
		###########################################################################################
		## 											CONTENT
		###########################################################################################
		
		
		function loadContent()
		{
			$this->mountHeaderContent();
			$this->mountSliderContent();
			$this->mountServicesContent();
			$this->mountManagementContent();
			$this->mountMemberContent();
			$this->mountContactContent();
			$this->mountFooterContent();
		}
		
		function mountHeaderContent($classColor = "midnight-blue")
		{
			global $str, $_CONFIG;
			
			?>
			<header class="navbar navbar-inverse navbar-fixed-top <?=$classColor;?>" role="banner">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only"><?=$str[10007];?></span>
							<span class="icon-bar "></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><img src="<?=getImgSrc("logos", "logo_branca");?>" alt="<?=$str[10008];?>" style="max-height:40px"></a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						<?php
							foreach ($_CONFIG['menu'] as $item)
								echo "<li><a href=\"{$item['url']}\">{$item['label']}</a></li>"; 
						?>
						</ul>
					</div>
				</div>
			</header>
			<?php
		}
		
		function mountSliderContent($classColor = "wet-asphalt")
		{
			?>
				<a class="anchor" id="anchor_main-slider"></a>
				<section id="main-slider" class="no-margin">
					<div class="carousel slide <?=$classColor;?>">
						<div class="carousel-inner">
							<div class="item active slider-banner"></div>
						</div>
					</div>
				</section>
			<?php
		}
		
		function mountServicesContent($classColor = "wet-asphalt")
		{
			global $str, $_CONFIG;
			
			?>
				<a class="anchor" id="anchor_services"></a>
				<section id="services" class="<?=$classColor;?>">
					<div class="container">
						<div class="row">
							<?php
								foreach ($_CONFIG['services'] as $item)
								{
									echo "
									<div class=\"col-md-4 col-sm-6\">
										<div class=\"media\">
											<div class=\"pull-left\">
												<i class=\"icon-{$item['icon']} icon-md\"></i>
											</div>
											<div class=\"media-body\">
												<h3 class=\"media-heading\">{$item['label']}</h3>
												<p>{$item['content']}</p>
											</div>					
										</div>
									</div>";
								}
							?>	
						</div>
					</div>
				</section>
			<?php
		}
		
		function mountManagementContent($classColor = "belize-hole")
		{
			global $str, $_CONFIG;
			
			?>
				<a class="anchor" id="anchor_management"></a>
				<section id="about-us" class="<?=$classColor;?>">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<img class="img-responsive" src="<?=$_CONFIG['aboutus']['icon'];?>" alt="<?=$str[10024];?>" >
							</div>
							<div class="col-sm-6">
								<h2><?=$str[10022];?></h2>
								<p><?=$_CONFIG['aboutus']['desc'];?></p>
							</div>
						</div>
					</div>
				</section>
			<?php
		}
		
		function mountMemberContent($classColor = "belize-hole")
		{
			global $str, $_CONFIG;
			
			?>
			<a class="anchor" id="anchor_members"></a>
			<section id="members" class="<?=$classColor;?>">
				<div class="container">
						<div class="col-md-2">
							<h3><?=$str[10004];?></h3>
							<div class="btn-group">
								<a class="btn btn-info" href="#members-scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
								<a class="btn btn-info" href="#members-scroller" data-slide="next"><i class="icon-angle-right"></i></a>
							</div>
							<p class="gap"></p>
						</div>
						<div class="col-md-10">
							<div id="members-scroller" class="carousel">
								<div class="carousel-inner">
								
								<?php
								$isFirst = true;
								foreach ($_CONFIG['members'] as $item)
								{
									$active = $isFirst ? "active" : "";
									$isFirst = false;
									
									$facebook = (!empty($item['facebook']) ? "https://www.facebook.com/".$item['facebook'] : "");
									echo "
										<div class=\"item {$active}\">
											<div class=\"col-md-4\">
													<div class=\"center\">
														<p>
															".(!empty($facebook)? "<a href=\"{$facebook}\" target=\"_blank\">" : "")."
																<img class=\"img-responsive img-circle\" src=\"{$item['photo']}\" alt=\"{$item['name']}\" title=\"{$item['name']}\">
															".(!empty($facebook)? "</a>" : "")."
														</p>
														<h5>{$item['name']}</h5>
														<h5><small class=\"designation muted\">{$item['role']}</small></h5>
													</div>
											</div>
										</div>
									";
								}
								?>	
								</div>
							</div>
						</div>
				</div>
			</section>
			
			<?php
			$this->addJS("
				$('#members').carousel({
				  interval: 5000
				})

				$('.carousel .item').each(function(){
				  var next = $(this).next();
				  if (!next.length) {
					next = $(this).siblings(':first');
				  }
				  next.children(':first-child').clone().appendTo($(this));
				  
				  if (next.next().length>0) {
					next.next().children(':first-child').clone().appendTo($(this));
				  }
				  else {
					$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
				  }
				});
			");
		}
		
		function mountContactContent($classColor = "pomegranate")
		{
			?>
				<?=$this->mountMapContent($classColor);?>
				<a class="anchor" id="anchor_contact-page"></a>
				<?=$this->mountContactPageContent($classColor);?>
			<?php
		}
		
		function mountMapContent($classColor = "pomegranate")
		{
			?>
				<section id="contact-map" class="<?=$classColor;?> no-margin">
					<div id="map">
						<div id="gmap-wrap">
							<div id="gmap"> </div>	 			
						</div>
					</div>
				</section>
				<script>
					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					})(window,document,'script','//www.google-analytics.com/analytics.js','ga');	

					ga('create', 'UA-65051265-1', 'auto');
					ga('send', 'pageview');
				</script>
			<?php
		}
		
		function mountContactPageContent($classColor = "pomegranate")
		{
			global $str;
			
			?>
				<section id="contact-page" class="<?=$classColor;?>">
					<div class="container">
						<div class="row">
							<div class="col-sm-3">
								<div class="contact-text">
									<h2><?=$str[10031];?></h2>
									<p class="gap"></p>
									<address>
										<h4>Setor de Educação Profissional e Tecnológica - SEPT UFPR</h4>
										<p>R. Dr. Alcides Vieira Arcoverde, 1225<br>Jardim das Américas, Curitiba/PR <br>CEP: 81520-260</p>
										<a class="btn btn-social btn-facebook" 	href="https://www.facebook.com/ufprcatei"><i class="icon-facebook"></i></a> 
										<a class="btn btn-social btn-twitter" 	href="mailto:contato@ufprcatei.com.br"><i class="icon-envelope"></i></a> 
									</address>
								</div>
							</div>
							<div class="col-sm-5">
								<div id="contact-section">
									<h2><?=$str[10032];?></h2>
									<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
										<div class="form-group">
											<input type="text" id="name" name="name" class="form-control" required="required" placeholder="<?=$str[10033];?>">
										</div>
										<div class="form-group">
											<input type="email" id="email" name="email" class="form-control" required="required" placeholder="<?=$str[10034];?>">
										</div>
										<div class="form-group">
											<input type="text" id="subject" name="subject" class="form-control" required="required" placeholder="<?=$str[10035];?>">
										</div>
										<div class="form-group">
											<textarea id="message" name="message" required="required" class="form-control" rows="4" placeholder="<?=$str[10036];?>"></textarea>
										</div>                        
										<div class="form-group">
											<button type="submit" class="btn btn-danger pull-right"><?=$str[10037];?></button>
										</div>
									</form>      
								</div>
							</div>
							<div class="col-sm-4">
								<div class="fb-page" data-href="https://www.facebook.com/ufprcatei/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
									<div class="fb-xfbml-parse-ignore">
										<blockquote cite="https://www.facebook.com/ufprcatei/">
											<a href="https://www.facebook.com/ufprcatei/">CATEI - UFPR</a>
										</blockquote>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<div id="fb-root"></div>
				<script>
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
			<?php
		}
		
		function mountFooterContent($classColor = "midnight-blue")
		{
			?>
			<footer id="footer" class="<?=$classColor;?>">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							&copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
						</div>
						<div class="col-sm-6">
							<ul class="pull-right">
								<li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
			<?php
		}
		
		
		###########################################################################################
		## 											FOOTER
		###########################################################################################

		function loadJS()
		{
			loadResource('resources/js/', 'jquery', 'js');
			loadResource('resources/js/', 'bootstrap.min', 'js');
			loadResource('resources/js/', 'bootstrap-notify', 'js');
			loadResource('resources/js/', 'jquery.prettyPhoto', 'js');
			loadResource('resources/js/', 'isotope.pkgd.min', 'js');
			loadResource('http://maps.google.com/maps/api/js?sensor=true', '', 'js');
			loadResource('resources/js/', 'gmaps', 'js');
			loadResource('resources/js/', 'main', 'js');
			
			$js = $this->getJS();
			if(!empty($js))
				echo "<script>$js</script>";
		}
	}
?>