
<a class="uk-navbar-brand" href="#">mDMS</a>

<ul class="uk-navbar-nav">
	<li class="uk-parent uk-active" data-uk-dropdown="">
		<a href=""><i class="uk-icon-home"></i> Level1</a>

		<div class="uk-dropdown uk-dropdown-navbar">
			<ul class="uk-nav uk-nav-navbar">
				<li><a href="#">Item</a></li>
				<li><a href="#">Another item</a></li>
				<li class="uk-nav-header">Header</li>
				<li><a href="#">Item</a></li>
				<li><a href="#">Another item</a></li>
				<li class="uk-nav-divider"></li>
				<li><a href="#">Separated item</a></li>
			</ul>
		</div>

	</li>

</ul>

<ul class="uk-navbar-nav">


<repeat group="{{ @menus }}" value="{{ @item }}">
	<li class="uk-parent uk-active" data-uk-dropdown="">
		<a href=""><i class="uk-icon-home"></i> {{ trim(@item.label) }}</a>
	</li>
</repeat>
</ul>


<div class="uk-navbar-content">Some <a href="#">link</a>.</div>

<div class="uk-navbar-content uk-hidden-small">
	<form class="uk-form uk-margin-remove uk-display-inline-block">
		<input type="text" placeholder="Search">
		<button class="uk-button uk-button-primary">Submit</button>
	</form>
</div>

<div class="uk-navbar-content uk-navbar-flip  uk-hidden-small">
	<div class="uk-button-group">
		<button class="uk-button uk-button-danger">Sign Out</button>
	</div>
</div>

