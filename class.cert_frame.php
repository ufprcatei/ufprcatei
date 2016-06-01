<?php
	require_once("class.main_frame.php");
	
	class cert_frame extends main_frame
	{
		var $charset = "";
		var $titleWindow = "";
		var $js = "";
		
		function main_frame()
		{
			parent::main_fram();
		}

		function loadJS()
		{
			parent::loadJS();
			loadResource('resources/js/', 'jquery.progresstimer', 'js');
		}
		
		function loadContent()
		{
			$this->mountHeaderContent();
			$this->mountCertGeneratorContent();
			$this->mountFooterContent();
		}
		
		
		function mountCertGeneratorContent($classColor = "belize-hole")
		{
			global $str;
			
			?>
			<section id="gen-cert" class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2><?=$str[10039];?></h2>
						<div>
							<div class="progress">
								<div class="loading-progress"></div>
							</div>
						</div>
						<div>
							<button id="generate_cert" type="button" class="btn btn-success"><?=$str[10038];?></button>
						</div>
					</div>
				</div>
			</section>
			<?php
			$this->addJS("
				$('#generate_cert').on('click',function()
				{
					var progress = $(\".loading-progress\").progressTimer({
						  timeLimit: 5000,
						  onFinish: function () {
						  alert('completed!');
						}
						});
						$.ajax({
						   url:\"generate_cert.php\"
						  }).error(function(){
						  progress.progressTimer('error', {
						  errorText:'ERROR!',
						  onFinish:function(){
							alert('There was an error processing your information!');
						  }
						});
						}).done(function(){
						  progress.progressTimer('complete');
						});
				 });
			");
		}
	}
?>