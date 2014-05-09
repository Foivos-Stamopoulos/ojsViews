{**
 * plugins/generic/customView/sourceView.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin source view
 *
 *}
 
 <div id="data">
{$currentJournal->getLocalizedTitle()|escape}{if $issue}; {$issue->getIssueIdentification()|strip_unsafe_html|nl2br}{else}-{/if}
 </div>