{**
 * plugins/generic/customView/rightsView.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin rights view
 *
 *}
 
 <div id="data">
{if $currentJournal->getLocalizedSetting('copyrightNotice')|nl2br}{else}-{/if}
 </div>