{**
 * plugins/generic/customView/formatView.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin format view
 *
 *}
{strip}
{assign var="pageTitle" value="plugins.generic.customView.displayName"}
{/strip}

<div id="data">   
{foreach from=$article->getGalleys() item=galley name=galleys}
	{$galley->getGalleyLabel()|escape}{if !$smarty.foreach.galleys.last}, {/if}
{/foreach}
</div>