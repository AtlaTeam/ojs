{**
 * plugins/importexport/portico/issues.tpl
 *
 * Copyright (c) 2014-2019 Simon Fraser University Library
 * Copyright (c) 2003-2019 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * List of issues to potentially export
 *
 *}
{strip}
{assign var="pageTitle" value="plugins.importexport.portico.selectIssue"}
{assign var="pageCrumbTitle" value="plugins.importexport.portico.selectIssue"}
{include file="common/header.tpl"}
{/strip}

<script type="text/javascript">
{literal}
<!--
function toggleChecked() {
	var elements = document.getElementsByName("issueId[]");
	for (var i=0; i < elements.length; i++) {
			elements[i].checked = true
	}
}
// -->
{/literal}
</script>

{translate key="plugins.importexport.portico.exportDescription"}

<div id="issues">
<form action="{plugin_url path="exportIssues"}" method="post" id="issues">
<table width="100%" class="listing">
	<tr>
		<td colspan="5" class="headseparator">&nbsp;</td>
	</tr>
	<tr class="heading" valign="bottom">
		<td width="5%">&nbsp;</td>
		<td width="40%">{translate key="issue.issue"}</td>
		<td width="15%">{translate key="plugins.importexport.portico.issues.published"}</td>
		<td width="15%">{translate key="plugins.importexport.portico.issues.numOfArticles"}</td>
		<td width="25%" align="right">{translate key="common.action"}</td>
	</tr>
	<tr>
		<td colspan="5" class="headseparator">&nbsp;</td>
	</tr>

	{iterate from=issues item=issue}
	<tr valign="top">
		<td><input type="checkbox" name="issueId[]" value="{$issue->getId()}"/></td>
		<td><a href="{url page="issue" op="view" path=$issue->getId()}" class="action">{$issue->getIssueIdentification()|strip_unsafe_html|nl2br}</a></td>
		<td>{$issue->getDatePublished()|date_format:"$dateFormatShort"|default:"&mdash;"}</td>
		<td>{$issue->getNumArticles()|escape}</td>
		<td align="right"><a href="{plugin_url}exportIssue/{$issue->getId()}" class="action">{translate key="common.export"}</a> | <a href="{plugin_url}ftpIssue/{$issue->getId()}" class="action">{translate key="plugins.importexport.portico.ftpTransfer"}</a></td>
	</tr>
	<tr>
		<td colspan="5" class="{if $issues->eof()}end{/if}separator">&nbsp;</td>
	</tr>
{/iterate}
{if $issues->wasEmpty()}
	<tr>
		<td colspan="5" class="nodata">{translate key="issue.noIssues"}</td>
	</tr>
	<tr>
		<td colspan="5" class="endseparator">&nbsp;</td>
	</tr>
{else}
	<tr>
		<td colspan="2" align="left">{page_info iterator=$issues}</td>
		<td colspan="3" align="right">{page_links anchor="issues" name="issues" iterator=$issues}</td>
	</tr>
{/if}
</table>
{if !$issn}
			<p><strong>{translate key="plugins.importexport.portico.issnWarning" setupUrl=$contextSettingsUrl}</strong></p>
{/if}
{if !$abbreviation}
			<p><strong>{translate key="plugins.importexport.portico.abbreviationWarning" setupUrl=$contextSettingsUrl}</strong></p>
{/if}
<table width="30%">
<tr>
				<td>
					<input type="radio" name="export" value="download" checked="true"/>Download Issues<br />
					<input type="radio" name="export" value="ftp"/> FTP Issues
				</td>
				<td>
					<input type="submit" value="{translate key="common.export"}" class="button defaultButton"/>&nbsp;<input type="button" value="{translate key="common.selectAll"}" class="button" onclick="toggleChecked()" />
				</td>
</tr>
</table>
</form>
</div>
{include file="common/footer.tpl"}
