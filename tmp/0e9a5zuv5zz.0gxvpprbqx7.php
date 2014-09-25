
<!-- This is the off-canvas sidebar -->
<div id="left-menu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
		<div class="uk-panel uk-panel-box">
			<h3 class="uk-panel-title"><?php echo $webname; ?></h3>
		</div>
		
		
		
        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="">
			<?php foreach (($menus?:array()) as $item): ?>
				<?php if ($item['parent_id']==null): ?>
				<li> <?php echo $item['label']; ?> <?php echo $item['parent_id']; ?>
					
				</li>
				<?php endif; ?>
			<?php endforeach; ?>
			<li><a href="">Item</a></li>
			<li class="uk-active"><a href="">Active</a></li>

			<li class="uk-parent">
				<a href="#">Parent</a>
				<ul class="uk-nav-sub">
					<li><a href="">Sub item</a></li>
					<li><a href="">Sub item</a>
						<ul>
							<li><a href="">Sub item</a></li>
							<li><a href="">Sub item</a></li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="uk-parent">
				<a href="#">Parent</a>
				<ul class="uk-nav-sub">
					<li><a href="">Sub item</a></li>
					<li><a href="">Sub item</a></li>
				</ul>
			</li>

			<li><a href="">Item</a></li>

			<li class="uk-nav-header">Header</li>
			<li class="uk-parent"><a href=""><i class="uk-icon-star"></i> Parent</a></li>
			<li><a href=""><i class="uk-icon-twitter"></i> Item</a></li>
			<li class="uk-nav-divider"></li>
			<li><a href=""><i class="uk-icon-rss"></i> Item</a></li>
		</ul>

    </div>
</div>

<a class="uk-navbar-brand" href="#" data-uk-offcanvas="{target:'#left-menu'}">mDMS</a>

<div class="uk-navbar-content uk-navbar-flip  uk-hidden-small">
	<div class="uk-button-group">
		<button class="uk-button uk-button-danger">Sign Out</button>
	</div>
</div>


<div class="uk-navbar-content uk-navbar-flip uk-hidden-small">
	<form class="uk-form uk-margin-remove uk-display-inline-block">
		<input type="text" placeholder="Search">
		<button class="uk-button uk-button-primary">Submit</button>
	</form>
</div>


