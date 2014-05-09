{**
 * plugins/generic/customView/views.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Custom View plugin views
 *
 *}
{strip}
{assign var="pageTitle" value="plugins.generic.customView.displayName"}
{include file="common/header.tpl"}
{/strip}
<div id="description">{translate key="plugins.generic.customView.description"}</div>
<div class="separator">&nbsp;</div>

<h3>{translate key="plugins.generic.customView.views"}</h3>	

<br/><br/>

<div id="views">

<table width="100%" class="listing">
	<tr>
		<td colspan="3" class="headseparator">&nbsp;</td>
	</tr>
	<tr class="heading" valign="bottom">
		<td width="40%">{translate key="plugins.generic.customView.metadataTitle"}</td>
		<td width="45%">{translate key="plugins.generic.customView.Display"}</td>
		<td width="10%">{translate key="common.action"}</td>
	</tr>
	<tr>
		<td colspan="3" class="headseparator">&nbsp;</td>
	</tr>
{iterate from=views item=view}
<tr>
<td width="48%">&nbsp; Title</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayTitle()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Creator</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayCreator()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Subject</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplaySubject()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>  
        <tr>
<td width="48%">&nbsp; Keywords</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayKeywords()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr> 
<tr>
<td width="48%">&nbsp; Description</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayDescription()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr> 
        <tr>
<td width="48%">&nbsp; Publisher</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayPublisher()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Contributor</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayContributor()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>  
<tr>
<td width="48%">&nbsp; Date</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayDate()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr> 
<tr>
<td width="48%">&nbsp; Status</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayStatus()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>        
<tr>
<td width="48%">&nbsp; Type</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayType()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr> 
<tr>
<td width="48%">&nbsp; Format</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayFormat()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Identifier</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayIdentifier()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr> 
        <tr>
<td width="48%">&nbsp; Source</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplaySource()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Language</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayLanguage()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Relation</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayRelation()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Coverage</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayCoverage()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>
        <tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
<tr>
<td width="48%">&nbsp; Rights</td>
<td width="43%" class="drag">&nbsp;&nbsp;&nbsp;{if $view->getDisplayRights()}<img src="{$baseUrl}/templates/images/icons/checked.gif"/>{else}<img src="{$baseUrl}/templates/images/icons/unchecked.gif"/>{/if}</td>
<td width="09%"><a href="{plugin_url path="editViews" id=$view->getId()}" class="action">{translate key="common.edit"}</a></td>
</tr>	
{/iterate}


</table>
<br/>
</div>
{include file="common/footer.tpl"}
