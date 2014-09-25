<repeat group="{{ @data }}" value="{{ @item }}">

<div class="uk-article">

	<h1 class="uk-article-title">{{ @item.title }}</h1>

	<p class="uk-article-meta">Written by {{ @item.username }} on {{ @item.date_created }}. </p>

	<p class="uk-article-lead"> {{ @item.content }}</p>

</div>
</repeat>