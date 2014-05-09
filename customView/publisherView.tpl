{**
 * plugins/generic/customView/publisherView.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin publisher view
 *
 *}

<div id="data">
{assign var=pubUrl value=$currentJournal->getSetting('publisherUrl')|escape}
{if $pubUrl}<a target="_new" href="{$pubUrl}">{/if}{$currentJournal->getSetting('publisherInstitution')|escape}{if $pubUrl}</a>{else}-{/if}
</div>