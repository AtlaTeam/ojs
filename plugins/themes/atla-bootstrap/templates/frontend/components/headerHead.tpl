{**
 * templates/frontend/components/headerHead.tpl
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * Common site header <head> tag and contents.
 *}
<head>
	<meta charset="{$defaultCharset|escape}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		{$pageTitleTranslated|strip_tags}
		{* Add the journal name to the end of page titles *}
		{if $requestedPage|escape|default:"index" != 'index' && $currentContext && $currentContext->getLocalizedName()}
			| {$currentContext->getLocalizedName()}
		{/if}
	</title>
	<!-- CookiePro Cookies Consent Notice start for atla-tl.com -->
	<script type="text/javascript" src="https://cookie-cdn.cookiepro.com/consent/b2250761-da6d-42e6-a4f3-93a8d7e4d949/OtAutoBlock.js" ></script>
	<script src="https://cookie-cdn.cookiepro.com/scripttemplates/otSDKStub.js"  type="text/javascript" charset="UTF-8" data-domain-script="b2250761-da6d-42e6-a4f3-93a8d7e4d949" ></script>
	<script type="text/javascript">
		function OptanonWrapper() { }
	</script>
	{load_header context="frontend"}
	{load_stylesheet context="frontend"}
</head>
