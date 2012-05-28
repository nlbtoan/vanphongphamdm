<?php
/*======================================================================*\
|| #################################################################### ||
|| # vBulletin Blog 4.0.7 - Vietvbb team
|| # ---------------------------------------------------------------- # ||
|| # Copyright �2000-2010 vBulletin Solutions Inc. All Rights Reserved. ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- VBULLETIN IS NOT FREE SOFTWARE ---------------- # ||
|| # http://www.vbulletin.com | http://www.vbulletin.com/license.html # ||
|| #################################################################### ||
\*======================================================================*/

if (!isset($GLOBALS['vbulletin']->db))
{
	exit;
}

// Check if blog is disabled, if so send off to forum home. Alternatively, show a "Blog is disabled" error message?
if (!$vbulletin->products['vbblog'])
{
	exec_header_redirect($vbulletin->options['forumhome'] . '.php');
}

// Init vbblog array into the registry
$vbulletin->vbblog = array();
$onload = '';

if (!$vbulletin->userinfo['userid'])
{
	prepare_blog_category_permissions($vbulletin->userinfo);
}

if (!$vbulletin->options['enablehooks'] OR defined('DISABLE_HOOKS'))
{
	standard_error(fetch_error('product_requires_plugin_system'));
}

// Check that the user can use the blog
if (!($vbulletin->userinfo['permissions']['vbblog_general_permissions'] & $vbulletin->bf_ugp_vbblog_general_permissions['blog_canviewothers']))
{
	if (!defined('VBBLOG_SKIP_PERMCHECK') AND (!$vbulletin->userinfo['userid'] OR !($vbulletin->userinfo['permissions']['vbblog_general_permissions'] & $vbulletin->bf_ugp_vbblog_general_permissions['blog_canviewown'])))
	{
		if (defined('DIE_QUIETLY'))
		{
			exit;
		}
		else
		{
			print_no_permission();
		}
	}
}

// remove alpha/beta/RC from the vB version as it causes issues with version_compare()
preg_match('#^(\d+\.\d+.\d+)#', $vbulletin->options['templateversion'], $matches);
$show['blog_38_compatible'] = version_compare($matches[1], '3.8.0', '>=');

/*======================================================================*\
|| ####################################################################
|| # Downloaded: Vietvbb team
|| # SVN: $Revision: 32878 $
|| ####################################################################
\*======================================================================*/
?>