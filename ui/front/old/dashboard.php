<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="uk-height-1-1">
<head>
	<include href="{{ @header }}" />
</head>
<body>
<nav class="uk-navbar">
	<include href="{{ @nav }}" />
</nav>

<main>
<div class="uk-grid uk-margin-top" data-uk-grid-match="{target:'.uk-panel'}">
     <div class="uk-width-1-10">&nbsp;</div>
	 <div class="uk-width-2-10">
        <div class="uk-panel uk-panel-box uk-panel-space">
			<h3>First Box</h3>
		</div>
    </div>
    <div class="uk-width-6-10">
			<div class="uk-grid">
				<div class="uk-width-1-3">
					<div class="uk-panel uk-panel-box uk-panel-box-primary">
						 <div class="uk-panel-badge uk-badge">40</div>
						 <h3 class="uk-panel-title">New uploaded file</h3>
					</div>
				</div>
				<div class="uk-width-1-3">
				<div class="uk-panel uk-panel-box  uk-panel-box-secondary"><h3>new uploaded file</h3></div>
				</div>
				<div class="uk-width-1-3">
					<div class="uk-panel uk-panel-box  uk-panel-box-secondary"><h3>new uploaded file</h3></div>
				</div>
			</div>
    </div>
	<div class="uk-width-1-10">&nbsp;</div>
</div>

<div class="uk-grid">
	<div class="uk-width-1-10">&nbsp;</div>
     <div class="uk-width-2-10">
        <div class="uk-panel uk-panel-box">
			
			<div id="upload-drop" class="uk-placeholder uk-text-center">
				<i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i> 
				Attach binaries by dropping them here or <a class="uk-form-file">selecting one<input id="upload-select" type="file"></a>.
			</div>
			

		</div>
    </div>
    <div class="uk-width-6-10">
			<ul class="uk-breadcrumb">
				<li><a href="">Home</a></li>
				<li><a href="">View</a></li>
				<li><span>File</span></li>
				<li class="uk-active"><span>Hot</span></li>
			</ul>
			
			<ul class="uk-comment-list">
				<li>
					<article class="uk-comment">
						<header class="uk-comment-header">
							<img class="uk-comment-avatar" src="./ui/front/images/placeholder_avatar.svg" alt="">
							<h4 class="uk-comment-title">File name</h4>
							<ul class="uk-comment-meta uk-subnav uk-subnav-line">
								<li>uploaded date</li>
								<li>downloads : 2003</li>
								<li>online</li>
							</ul>
						</header>
					</article>
				</li>
				<li>
					<article class="uk-comment">
						<header class="uk-comment-header">
							<img class="uk-comment-avatar" src="./ui/front/images/placeholder_avatar.svg" alt="">
							<h4 class="uk-comment-title">File name</h4>
							<ul class="uk-comment-meta uk-subnav uk-subnav-line">
								<li>uploaded date</li>
								<li>downloads : 2003</li>
								<li>online</li>
							</ul>
						</header>
					</article>
				</li>

			</ul>
			
			<ul class="uk-pagination">
				<li><a href="">1</a></li>
				<li class="uk-active"><span>2</span></li>
				<li class="uk-disabled"><span>3</span></li>
				<li><span>..</span></li>
				<li><a href="">>></a></li>
			</ul>
    </div>	
	<div class="uk-width-1-10">&nbsp;</div>
	</div>

</main>


<footer>
	<include href="{{ @footer }}" />
</footer>
</body>
</html>


