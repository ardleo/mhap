<div class="uk-container uk-container-center">

<div class="uk-grid  uk-margin-top">
	<div class="uk-width-10-10">
		<?php echo $this->render('./front/breadcrumb.php',$this->mime,get_defined_vars()); ?>
	</div>
</div>

<div id="left-panel" class="uk-grid uk-margin-small-top uk-margin-bottom">
	 <div class="uk-width-7-10">
		
		<div class="uk-grid">
			<div class="uk-width-10-10">
				<div class="uk-panel uk-panel-box uk-panel-space">
					<?php echo $this->render($mainPanel,$this->mime,get_defined_vars()); ?>					
				</div>
			</div>
		</div>
		
		<div class="uk-grid">
			<div class="uk-width-5-10">
			<div class="uk-panel uk-panel-box">
				<h3 class="uk-panel-title">Document</h3>
				<hr>
				<ul class="uk-nav uk-nav-side" data-uk-nav="">
					
				<li class="uk-parent">
					<a href="#">Parent</a>
					<ul class="uk-nav-sub">
						<li><a href="">Sub item</a></li>
						<li><a href="">Sub item</a></li>
					</ul>
				</li>
					
				</ul>
			</div>
			</div>
		
			<div class="uk-width-5-10">
			<div class="uk-panel uk-panel-box">			
				<h3 class="uk-panel-title">Event n info</h3>
				<hr>
			</div>
			</div>
		</div>
		
    </div>
    <div class="uk-width-3-10">
		<div class="uk-panel uk-panel-box uk-panel-space">
				
		</div>
		
        <div class="uk-panel uk-panel-box">
			
			<h3 class="uk-panel-title">Pooling</h3>
			<hr>
		</div>
    </div>
</div>

</div>