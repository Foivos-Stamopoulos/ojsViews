{**
 * plugins/generic/customView/statusView.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin status view
 *
 *}
{strip}
{assign var="pageTitle" value="plugins.generic.customView.displayName"}

{/strip}

<div id="data">   
{if $section && $section->getLocalizedIdentifyType()}{$section->getLocalizedIdentifyType()|escape}{else}{translate key="rt.metadata.pkp.peerReviewed"}{/if}
</div>