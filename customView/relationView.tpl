{**
 * plugins/generic/customView/relationView.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin relation view
 *
 *}
 
{if $journalRt->getSupplementaryFiles()}

		{foreach from=$article->getSuppFiles() item=suppFile}
			<a href="{url page="article" op="downloadSuppFile" path=$articleId|to_array:$suppFile->getBestSuppFileId($currentJournal)}">{$suppFile->getSuppFileTitle()|escape}</a> ({$suppFile->getNiceFileSize()})<br />
		{/foreach}	
{/if}