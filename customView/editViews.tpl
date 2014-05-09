{**
 * plugins/generic/customView/editViews.tpl
 *
 * Copyright (c) 2014 Sotirios-Fivos Stamopoulos
 *
 * Custom view edit view under plugin management.
 *
 *}
 
{strip}
{assign var="pageTitle" value="plugins.generic.customView.manager.editViews"}
{include file="common/header.tpl"}
{/strip}

<form id="customView" method="post" action="{plugin_url path="update"}">
{if $viewId}
<input type="hidden" name="viewId" value="{$viewId|escape}" />
{/if}

{include file="common/formErrors.tpl"}

<div id="editViews">
<table id="general" class="data" width="100%">
	<tr>
		<td><div class="headseparator">&nbsp;</div></td>
	</tr>	
        <tr class="heading" valign="bottom">
		<td width="30%" class="label">{translate key="plugins.generic.customView.manager.metadata"}</td>
		<td width="30%" class="label">{translate key="plugins.generic.customView.manager.display"}</td>
		<td width="30%" class="value">{translate key="plugins.generic.customView.manager.label"}</td>
	</tr>
        	<tr>
		<td colspan="3"><div class="separator">&nbsp;</div></td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label">{fieldLabel name="title" required="true" key="plugins.generic.customView.form.title"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayTitle" id="displayTitle" value="1" {if $displayTitle}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="titleLabel" id="titleLabel" value="{$titleLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        	<tr valign="top">
		<td width="30%" class="label">{fieldLabel name="creator" required="true" key="plugins.generic.customView.form.creator"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayCreator" id="displayCreator" value="1" {if $displayCreator}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="creatorLabel" id="creatorLabel" value="{$creatorLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="subject" required="true" key="plugins.generic.customView.form.subject"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displaySubject" id="displaySubject" value="1" {if $displaySubject}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="subjectLabel" id="subjectLabel" value="{$subjectLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>   
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="keywords" required="true" key="plugins.generic.customView.form.keywords"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayKeywords" id="displayKeywords" value="1" {if $displayKeywords}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="keywordsLabel" id="keywordsLabel" value="{$keywordsLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="description" required="true" key="plugins.generic.customView.form.description"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayDescription" id="displayDescription" value="1" {if $displayDescription}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="descriptionLabel" id="descriptionLabel" value="{$descriptionLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="publisher" required="true" key="plugins.generic.customView.form.publisher"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayPublisher" id="displayPublisher" value="1" {if $displayPublisher}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="publisherLabel" id="publisherLabel" value="{$publisherLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="contributor" required="true" key="plugins.generic.customView.form.contributor"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayContributor" id="displayContributor" value="1" {if $displayContributor}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="contributorLabel" id="contributorLabel" value="{$contributorLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="date" required="true" key="plugins.generic.customView.form.date"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayDate" id="displayDate" value="1" {if $displayDate}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="dateLabel" id="dateLabel" value="{$dateLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label">{fieldLabel name="status" required="true" key="plugins.generic.customView.form.status"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayStatus" id="displayStatus" value="1" {if $displayStatus}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="statusLabel" id="statusLabel" value="{$statusLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>        
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="type" required="true" key="plugins.generic.customView.form.type"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayType" id="displayType" value="1" {if $displayType}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="typeLabel" id="typeLabel" value="{$typeLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label">{fieldLabel name="format" required="true" key="plugins.generic.customView.form.format"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayFormat" id="displayFormat" value="1" {if $displayFormat}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="formatLabel" id="formatLabel" value="{$formatLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td width="30%" class="label">{fieldLabel name="identifier" required="true" key="plugins.generic.customView.form.identifier"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayIdentifier" id="displayIdentifier" value="1" {if $displayIdentifier}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="identifierLabel" id="identifierLabel" value="{$identifierLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>  
	<tr valign="top">
		<td width="30%" class="label">{fieldLabel name="source" required="true" key="plugins.generic.customView.form.source"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displaySource" id="displaySource" value="1" {if $displaySource}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="sourceLabel" id="sourceLabel" value="{$sourceLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>        
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="language" required="true" key="plugins.generic.customView.form.language"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayLanguage" id="displayLanguage" value="1" {if $displayLanguage}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="languageLabel" id="languageLabel" value="{$languageLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="relation" required="true" key="plugins.generic.customView.form.realtion"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayRelation" id="displayRelation" value="1" {if $displayRelation}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="relationLabel" id="relationLabel" value="{$relationLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>
        <tr valign="top">
		<td width="30%" class="label">{fieldLabel name="coverage" required="true" key="plugins.generic.customView.form.coverage"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayCoverage" id="displayCoverage" value="1" {if $displayCoverage}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="coverageLabel" id="coverageLabel" value="{$coverageLabel|escape}" size="30" maxlength="255" class="textField" /></td>    
	</tr>
	<tr valign="top">
		<td width="30%" class="label">{fieldLabel name="rights" required="true" key="plugins.generic.customView.form.rights"}</td>
		<td width="30%" class="label"><input type="checkbox" name="displayRights" id="displayRights" value="1" {if $displayRights}checked="checked" {/if}/></td>
		<td width="80%" class="value"><input type="text" name="rightsLabel" id="rightsLabel" value="{$rightsLabel|escape}" size="30" maxlength="255" class="textField" /></td>
	</tr>        
</table>
</div>

<p><input type="submit" value="{translate key="common.save"}" class="button defaultButton" /><input type="button" value="{translate key="common.cancel"}" class="button" onclick="history.go(-1);" /></p>

</form>

<p><span class="formRequired">{translate key="common.requiredField"}</span></p>

{include file="common/footer.tpl"}
