{**
 * plugins/generic/customView/coverageView.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin coverage view
 *
 *}
 
 <div id="data" >
{if $article->getLocalizedCoverageGeo()}{$article->getLocalizedCoverageGeo()|escape}{assign var=notFirstItem value=1}{/if}{if $article->getLocalizedCoverageChron()}{if $notFirstItem}, <br/>{/if}{$article->getLocalizedCoverageChron()|escape}{assign var=notFirstItem value=1}{/if}{if $article->getLocalizedCoverageSample()}{if $notFirstItem}, <br/>{/if}{$article->getLocalizedCoverageSample()|escape}{assign var=notFirstItem value=1}{/if} 
</div>