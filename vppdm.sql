/*
MySQL Data Transfer
Source Host: localhost
Source Database: vppdm
Target Host: localhost
Target Database: vppdm
Date: 9/24/2011 9:56:12 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for jos_banner
-- ----------------------------
DROP TABLE IF EXISTS `jos_banner`;
CREATE TABLE `jos_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_bannerclient
-- ----------------------------
DROP TABLE IF EXISTS `jos_bannerclient`;
CREATE TABLE `jos_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_bannertrack
-- ----------------------------
DROP TABLE IF EXISTS `jos_bannertrack`;
CREATE TABLE `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_categories
-- ----------------------------
DROP TABLE IF EXISTS `jos_categories`;
CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_components
-- ----------------------------
DROP TABLE IF EXISTS `jos_components`;
CREATE TABLE `jos_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_contact_details
-- ----------------------------
DROP TABLE IF EXISTS `jos_contact_details`;
CREATE TABLE `jos_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_content
-- ----------------------------
DROP TABLE IF EXISTS `jos_content`;
CREATE TABLE `jos_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_content_frontpage
-- ----------------------------
DROP TABLE IF EXISTS `jos_content_frontpage`;
CREATE TABLE `jos_content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_content_rating
-- ----------------------------
DROP TABLE IF EXISTS `jos_content_rating`;
CREATE TABLE `jos_content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_core_acl_aro
-- ----------------------------
DROP TABLE IF EXISTS `jos_core_acl_aro`;
CREATE TABLE `jos_core_acl_aro` (
  `id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_core_acl_aro_groups
-- ----------------------------
DROP TABLE IF EXISTS `jos_core_acl_aro_groups`;
CREATE TABLE `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_core_acl_aro_map
-- ----------------------------
DROP TABLE IF EXISTS `jos_core_acl_aro_map`;
CREATE TABLE `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_core_acl_aro_sections
-- ----------------------------
DROP TABLE IF EXISTS `jos_core_acl_aro_sections`;
CREATE TABLE `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_core_acl_groups_aro_map
-- ----------------------------
DROP TABLE IF EXISTS `jos_core_acl_groups_aro_map`;
CREATE TABLE `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_core_log_items
-- ----------------------------
DROP TABLE IF EXISTS `jos_core_log_items`;
CREATE TABLE `jos_core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_core_log_searches
-- ----------------------------
DROP TABLE IF EXISTS `jos_core_log_searches`;
CREATE TABLE `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_groups
-- ----------------------------
DROP TABLE IF EXISTS `jos_groups`;
CREATE TABLE `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_menu
-- ----------------------------
DROP TABLE IF EXISTS `jos_menu`;
CREATE TABLE `jos_menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_menu_types
-- ----------------------------
DROP TABLE IF EXISTS `jos_menu_types`;
CREATE TABLE `jos_menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_messages
-- ----------------------------
DROP TABLE IF EXISTS `jos_messages`;
CREATE TABLE `jos_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_messages_cfg
-- ----------------------------
DROP TABLE IF EXISTS `jos_messages_cfg`;
CREATE TABLE `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_migration_backlinks
-- ----------------------------
DROP TABLE IF EXISTS `jos_migration_backlinks`;
CREATE TABLE `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_modules
-- ----------------------------
DROP TABLE IF EXISTS `jos_modules`;
CREATE TABLE `jos_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_modules_menu
-- ----------------------------
DROP TABLE IF EXISTS `jos_modules_menu`;
CREATE TABLE `jos_modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_newsfeeds
-- ----------------------------
DROP TABLE IF EXISTS `jos_newsfeeds`;
CREATE TABLE `jos_newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `rtl` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_plugins
-- ----------------------------
DROP TABLE IF EXISTS `jos_plugins`;
CREATE TABLE `jos_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_poll_data
-- ----------------------------
DROP TABLE IF EXISTS `jos_poll_data`;
CREATE TABLE `jos_poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_poll_date
-- ----------------------------
DROP TABLE IF EXISTS `jos_poll_date`;
CREATE TABLE `jos_poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_poll_menu
-- ----------------------------
DROP TABLE IF EXISTS `jos_poll_menu`;
CREATE TABLE `jos_poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_polls
-- ----------------------------
DROP TABLE IF EXISTS `jos_polls`;
CREATE TABLE `jos_polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_sections
-- ----------------------------
DROP TABLE IF EXISTS `jos_sections`;
CREATE TABLE `jos_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_session
-- ----------------------------
DROP TABLE IF EXISTS `jos_session`;
CREATE TABLE `jos_session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_stats_agents
-- ----------------------------
DROP TABLE IF EXISTS `jos_stats_agents`;
CREATE TABLE `jos_stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_templates_menu
-- ----------------------------
DROP TABLE IF EXISTS `jos_templates_menu`;
CREATE TABLE `jos_templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_users
-- ----------------------------
DROP TABLE IF EXISTS `jos_users`;
CREATE TABLE `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_vm_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_auth_group`;
CREATE TABLE `jos_vm_auth_group` (
  `group_id` int(11) NOT NULL auto_increment,
  `group_name` varchar(128) default NULL,
  `group_level` int(11) default NULL,
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Holds all the user groups';

-- ----------------------------
-- Table structure for jos_vm_auth_user_group
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_auth_user_group`;
CREATE TABLE `jos_vm_auth_user_group` (
  `user_id` int(11) NOT NULL default '0',
  `group_id` int(11) default NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps the user to user groups';

-- ----------------------------
-- Table structure for jos_vm_auth_user_vendor
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_auth_user_vendor`;
CREATE TABLE `jos_vm_auth_user_vendor` (
  `user_id` int(11) default NULL,
  `vendor_id` int(11) default NULL,
  KEY `idx_auth_user_vendor_user_id` (`user_id`),
  KEY `idx_auth_user_vendor_vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a user to a vendor';

-- ----------------------------
-- Table structure for jos_vm_cart
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_cart`;
CREATE TABLE `jos_vm_cart` (
  `user_id` int(11) NOT NULL,
  `cart_content` text NOT NULL,
  `last_updated` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores the cart contents of a user';

-- ----------------------------
-- Table structure for jos_vm_category
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_category`;
CREATE TABLE `jos_vm_category` (
  `category_id` int(11) NOT NULL auto_increment,
  `vendor_id` int(11) NOT NULL default '0',
  `category_name` varchar(128) NOT NULL default '',
  `category_description` text,
  `category_thumb_image` varchar(255) default NULL,
  `category_full_image` varchar(255) default NULL,
  `category_publish` char(1) default NULL,
  `cdate` int(11) default NULL,
  `mdate` int(11) default NULL,
  `category_browsepage` varchar(255) NOT NULL default 'browse_1',
  `products_per_row` tinyint(2) NOT NULL default '1',
  `category_flypage` varchar(255) default NULL,
  `list_order` int(11) default NULL,
  PRIMARY KEY  (`category_id`),
  KEY `idx_category_vendor_id` (`vendor_id`),
  KEY `idx_category_name` (`category_name`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='Product Categories are stored here';

-- ----------------------------
-- Table structure for jos_vm_category_xref
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_category_xref`;
CREATE TABLE `jos_vm_category_xref` (
  `category_parent_id` int(11) NOT NULL default '0',
  `category_child_id` int(11) NOT NULL default '0',
  `category_list` int(11) default NULL,
  PRIMARY KEY  (`category_child_id`),
  KEY `category_xref_category_parent_id` (`category_parent_id`),
  KEY `idx_category_xref_category_list` (`category_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Category child-parent relation list';

-- ----------------------------
-- Table structure for jos_vm_country
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_country`;
CREATE TABLE `jos_vm_country` (
  `country_id` int(11) NOT NULL auto_increment,
  `zone_id` int(11) NOT NULL default '1',
  `country_name` varchar(64) default NULL,
  `country_3_code` char(3) default NULL,
  `country_2_code` char(2) default NULL,
  PRIMARY KEY  (`country_id`),
  KEY `idx_country_name` (`country_name`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8 COMMENT='Country records';

-- ----------------------------
-- Table structure for jos_vm_coupons
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_coupons`;
CREATE TABLE `jos_vm_coupons` (
  `coupon_id` int(16) NOT NULL auto_increment,
  `coupon_code` varchar(32) NOT NULL default '',
  `percent_or_total` enum('percent','total') NOT NULL default 'percent',
  `coupon_type` enum('gift','permanent') NOT NULL default 'gift',
  `coupon_value` decimal(12,2) NOT NULL default '0.00',
  PRIMARY KEY  (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Used to store coupon codes';

-- ----------------------------
-- Table structure for jos_vm_creditcard
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_creditcard`;
CREATE TABLE `jos_vm_creditcard` (
  `creditcard_id` int(11) NOT NULL auto_increment,
  `vendor_id` int(11) NOT NULL default '0',
  `creditcard_name` varchar(70) NOT NULL default '',
  `creditcard_code` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`creditcard_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Used to store credit card types';

-- ----------------------------
-- Table structure for jos_vm_csv
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_csv`;
CREATE TABLE `jos_vm_csv` (
  `field_id` int(11) NOT NULL auto_increment,
  `field_name` varchar(128) NOT NULL default '',
  `field_default_value` text,
  `field_ordering` int(3) NOT NULL default '0',
  `field_required` char(1) default 'N',
  PRIMARY KEY  (`field_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='Holds all fields which are used on CVS Ex-/Import';

-- ----------------------------
-- Table structure for jos_vm_currency
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_currency`;
CREATE TABLE `jos_vm_currency` (
  `currency_id` int(11) NOT NULL auto_increment,
  `currency_name` varchar(64) default NULL,
  `currency_code` char(3) default NULL,
  PRIMARY KEY  (`currency_id`),
  KEY `idx_currency_name` (`currency_name`)
) ENGINE=MyISAM AUTO_INCREMENT=159 DEFAULT CHARSET=utf8 COMMENT='Used to store currencies';

-- ----------------------------
-- Table structure for jos_vm_export
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_export`;
CREATE TABLE `jos_vm_export` (
  `export_id` int(11) NOT NULL auto_increment,
  `vendor_id` int(11) default NULL,
  `export_name` varchar(255) default NULL,
  `export_desc` text NOT NULL,
  `export_class` varchar(50) NOT NULL,
  `export_enabled` char(1) NOT NULL default 'N',
  `export_config` text NOT NULL,
  `iscore` tinyint(3) NOT NULL default '0',
  PRIMARY KEY  (`export_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Export Modules';

-- ----------------------------
-- Table structure for jos_vm_function
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_function`;
CREATE TABLE `jos_vm_function` (
  `function_id` int(11) NOT NULL auto_increment,
  `module_id` int(11) default NULL,
  `function_name` varchar(32) default NULL,
  `function_class` varchar(32) default NULL,
  `function_method` varchar(32) default NULL,
  `function_description` text,
  `function_perms` varchar(255) default NULL,
  PRIMARY KEY  (`function_id`),
  KEY `idx_function_module_id` (`module_id`),
  KEY `idx_function_name` (`function_name`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8 COMMENT='Used to map a function alias to a ''real'' class::function';

-- ----------------------------
-- Table structure for jos_vm_manufacturer
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_manufacturer`;
CREATE TABLE `jos_vm_manufacturer` (
  `manufacturer_id` int(11) NOT NULL auto_increment,
  `mf_name` varchar(64) default NULL,
  `mf_email` varchar(255) default NULL,
  `mf_desc` text,
  `mf_category_id` int(11) default NULL,
  `mf_url` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`manufacturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Manufacturers are those who create products';

-- ----------------------------
-- Table structure for jos_vm_manufacturer_category
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_manufacturer_category`;
CREATE TABLE `jos_vm_manufacturer_category` (
  `mf_category_id` int(11) NOT NULL auto_increment,
  `mf_category_name` varchar(64) default NULL,
  `mf_category_desc` text,
  PRIMARY KEY  (`mf_category_id`),
  KEY `idx_manufacturer_category_category_name` (`mf_category_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Manufacturers are assigned to these categories';

-- ----------------------------
-- Table structure for jos_vm_module
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_module`;
CREATE TABLE `jos_vm_module` (
  `module_id` int(11) NOT NULL auto_increment,
  `module_name` varchar(255) default NULL,
  `module_description` text,
  `module_perms` varchar(255) default NULL,
  `module_publish` char(1) default NULL,
  `list_order` int(11) default NULL,
  PRIMARY KEY  (`module_id`),
  KEY `idx_module_name` (`module_name`),
  KEY `idx_module_list_order` (`list_order`)
) ENGINE=MyISAM AUTO_INCREMENT=12844 DEFAULT CHARSET=utf8 COMMENT='VirtueMart Core Modules, not: Joomla modules';

-- ----------------------------
-- Table structure for jos_vm_order_history
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_order_history`;
CREATE TABLE `jos_vm_order_history` (
  `order_status_history_id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL default '0',
  `order_status_code` char(1) NOT NULL default '0',
  `date_added` datetime NOT NULL default '0000-00-00 00:00:00',
  `customer_notified` int(1) default '0',
  `comments` text,
  PRIMARY KEY  (`order_status_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all actions and changes that occur to an order';

-- ----------------------------
-- Table structure for jos_vm_order_item
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_order_item`;
CREATE TABLE `jos_vm_order_item` (
  `order_item_id` int(11) NOT NULL auto_increment,
  `order_id` int(11) default NULL,
  `user_info_id` varchar(32) default NULL,
  `vendor_id` int(11) default NULL,
  `product_id` int(11) default NULL,
  `order_item_sku` varchar(64) NOT NULL default '',
  `order_item_name` varchar(64) NOT NULL default '',
  `product_quantity` int(11) default NULL,
  `product_item_price` decimal(15,5) default NULL,
  `product_final_price` decimal(12,2) NOT NULL default '0.00',
  `order_item_currency` varchar(16) default NULL,
  `order_status` char(1) default NULL,
  `cdate` int(11) default NULL,
  `mdate` int(11) default NULL,
  `product_attribute` text,
  PRIMARY KEY  (`order_item_id`),
  KEY `idx_order_item_order_id` (`order_id`),
  KEY `idx_order_item_user_info_id` (`user_info_id`),
  KEY `idx_order_item_vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all items (products) which are part of an order';

-- ----------------------------
-- Table structure for jos_vm_order_payment
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_order_payment`;
CREATE TABLE `jos_vm_order_payment` (
  `order_id` int(11) NOT NULL default '0',
  `payment_method_id` int(11) default NULL,
  `order_payment_code` varchar(30) NOT NULL default '',
  `order_payment_number` blob,
  `order_payment_expire` int(11) default NULL,
  `order_payment_name` varchar(255) default NULL,
  `order_payment_log` text,
  `order_payment_trans_id` text NOT NULL,
  KEY `idx_order_payment_order_id` (`order_id`),
  KEY `idx_order_payment_method_id` (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='The payment method that was chosen for a specific order';

-- ----------------------------
-- Table structure for jos_vm_order_status
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_order_status`;
CREATE TABLE `jos_vm_order_status` (
  `order_status_id` int(11) NOT NULL auto_increment,
  `order_status_code` char(1) NOT NULL default '',
  `order_status_name` varchar(64) default NULL,
  `order_status_description` text NOT NULL,
  `list_order` int(11) default NULL,
  `vendor_id` int(11) default NULL,
  PRIMARY KEY  (`order_status_id`),
  KEY `idx_order_status_list_order` (`list_order`),
  KEY `idx_order_status_vendor_id` (`vendor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='All available order statuses';

-- ----------------------------
-- Table structure for jos_vm_order_user_info
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_order_user_info`;
CREATE TABLE `jos_vm_order_user_info` (
  `order_info_id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `address_type` char(2) default NULL,
  `address_type_name` varchar(32) default NULL,
  `company` varchar(64) default NULL,
  `title` varchar(32) default NULL,
  `last_name` varchar(32) default NULL,
  `first_name` varchar(32) default NULL,
  `middle_name` varchar(32) default NULL,
  `phone_1` varchar(32) default NULL,
  `phone_2` varchar(32) default NULL,
  `fax` varchar(32) default NULL,
  `address_1` varchar(64) NOT NULL default '',
  `address_2` varchar(64) default NULL,
  `city` varchar(32) NOT NULL default '',
  `state` varchar(32) NOT NULL default '',
  `country` varchar(32) NOT NULL default 'US',
  `zip` varchar(32) NOT NULL default '',
  `user_email` varchar(255) default NULL,
  `extra_field_1` varchar(255) default NULL,
  `extra_field_2` varchar(255) default NULL,
  `extra_field_3` varchar(255) default NULL,
  `extra_field_4` char(1) default NULL,
  `extra_field_5` char(1) default NULL,
  `bank_account_nr` varchar(32) NOT NULL default '',
  `bank_name` varchar(32) NOT NULL default '',
  `bank_sort_code` varchar(16) NOT NULL default '',
  `bank_iban` varchar(64) NOT NULL default '',
  `bank_account_holder` varchar(48) NOT NULL default '',
  `bank_account_type` enum('Checking','Business Checking','Savings') NOT NULL default 'Checking',
  PRIMARY KEY  (`order_info_id`),
  KEY `idx_order_info_order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores the BillTo and ShipTo Information at order time';

-- ----------------------------
-- Table structure for jos_vm_orders
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_orders`;
CREATE TABLE `jos_vm_orders` (
  `order_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `vendor_id` int(11) NOT NULL default '0',
  `order_number` varchar(32) default NULL,
  `user_info_id` varchar(32) default NULL,
  `order_total` decimal(15,5) NOT NULL default '0.00000',
  `order_subtotal` decimal(15,5) default NULL,
  `order_tax` decimal(10,2) default NULL,
  `order_tax_details` text NOT NULL,
  `order_shipping` decimal(10,2) default NULL,
  `order_shipping_tax` decimal(10,2) default NULL,
  `coupon_discount` decimal(12,2) NOT NULL default '0.00',
  `coupon_code` varchar(32) default NULL,
  `order_discount` decimal(12,2) NOT NULL default '0.00',
  `order_currency` varchar(16) default NULL,
  `order_status` char(1) default NULL,
  `cdate` int(11) default NULL,
  `mdate` int(11) default NULL,
  `ship_method_id` varchar(255) default NULL,
  `customer_note` text NOT NULL,
  `ip_address` varchar(15) NOT NULL default '',
  PRIMARY KEY  (`order_id`),
  KEY `idx_orders_user_id` (`user_id`),
  KEY `idx_orders_vendor_id` (`vendor_id`),
  KEY `idx_orders_order_number` (`order_number`),
  KEY `idx_orders_user_info_id` (`user_info_id`),
  KEY `idx_orders_ship_method_id` (`ship_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Used to store all orders';

-- ----------------------------
-- Table structure for jos_vm_payment_method
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_payment_method`;
CREATE TABLE `jos_vm_payment_method` (
  `payment_method_id` int(11) NOT NULL auto_increment,
  `vendor_id` int(11) default NULL,
  `payment_method_name` varchar(255) default NULL,
  `payment_class` varchar(50) NOT NULL default '',
  `shopper_group_id` int(11) default NULL,
  `payment_method_discount` decimal(12,2) default NULL,
  `payment_method_discount_is_percent` tinyint(1) NOT NULL,
  `payment_method_discount_max_amount` decimal(10,2) NOT NULL,
  `payment_method_discount_min_amount` decimal(10,2) NOT NULL,
  `list_order` int(11) default NULL,
  `payment_method_code` varchar(8) default NULL,
  `enable_processor` char(1) default NULL,
  `is_creditcard` tinyint(1) NOT NULL default '0',
  `payment_enabled` char(1) NOT NULL default 'N',
  `accepted_creditcards` varchar(128) NOT NULL default '',
  `payment_extrainfo` text NOT NULL,
  `payment_passkey` blob NOT NULL,
  PRIMARY KEY  (`payment_method_id`),
  KEY `idx_payment_method_vendor_id` (`vendor_id`),
  KEY `idx_payment_method_name` (`payment_method_name`),
  KEY `idx_payment_method_list_order` (`list_order`),
  KEY `idx_payment_method_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='The payment methods of your store';

-- ----------------------------
-- Table structure for jos_vm_product
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product`;
CREATE TABLE `jos_vm_product` (
  `product_id` int(11) NOT NULL auto_increment,
  `vendor_id` int(11) NOT NULL default '0',
  `product_parent_id` int(11) NOT NULL default '0',
  `product_sku` varchar(64) NOT NULL default '',
  `product_s_desc` varchar(255) default NULL,
  `product_desc` text,
  `product_thumb_image` varchar(255) default NULL,
  `product_full_image` varchar(255) default NULL,
  `product_publish` char(1) default NULL,
  `product_weight` decimal(10,4) default NULL,
  `product_weight_uom` varchar(32) default 'pounds.',
  `product_length` decimal(10,4) default NULL,
  `product_width` decimal(10,4) default NULL,
  `product_height` decimal(10,4) default NULL,
  `product_lwh_uom` varchar(32) default 'inches',
  `product_url` varchar(255) default NULL,
  `product_in_stock` int(11) NOT NULL default '0',
  `product_available_date` int(11) default NULL,
  `product_availability` varchar(56) NOT NULL default '',
  `product_special` char(1) default NULL,
  `product_discount_id` int(11) default NULL,
  `ship_code_id` int(11) default NULL,
  `cdate` int(11) default NULL,
  `mdate` int(11) default NULL,
  `product_name` varchar(64) default NULL,
  `product_sales` int(11) NOT NULL default '0',
  `attribute` text,
  `custom_attribute` text NOT NULL,
  `product_tax_id` int(11) default NULL,
  `product_unit` varchar(32) default NULL,
  `product_packaging` int(11) default NULL,
  `child_options` varchar(45) default NULL,
  `quantity_options` varchar(45) default NULL,
  `child_option_ids` varchar(45) default NULL,
  `product_order_levels` varchar(45) default NULL,
  PRIMARY KEY  (`product_id`),
  KEY `idx_product_vendor_id` (`vendor_id`),
  KEY `idx_product_product_parent_id` (`product_parent_id`),
  KEY `idx_product_sku` (`product_sku`),
  KEY `idx_product_ship_code_id` (`ship_code_id`),
  KEY `idx_product_name` (`product_name`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COMMENT='All products are stored here.';

-- ----------------------------
-- Table structure for jos_vm_product_attribute
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_attribute`;
CREATE TABLE `jos_vm_product_attribute` (
  `attribute_id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL default '0',
  `attribute_name` char(255) NOT NULL default '',
  `attribute_value` char(255) NOT NULL default '',
  PRIMARY KEY  (`attribute_id`),
  KEY `idx_product_attribute_product_id` (`product_id`),
  KEY `idx_product_attribute_name` (`attribute_name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Stores attributes + their specific values for Child Products';

-- ----------------------------
-- Table structure for jos_vm_product_attribute_sku
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_attribute_sku`;
CREATE TABLE `jos_vm_product_attribute_sku` (
  `product_id` int(11) NOT NULL default '0',
  `attribute_name` char(255) NOT NULL default '',
  `attribute_list` int(11) NOT NULL default '0',
  KEY `idx_product_attribute_sku_product_id` (`product_id`),
  KEY `idx_product_attribute_sku_attribute_name` (`attribute_name`),
  KEY `idx_product_attribute_list` (`attribute_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Attributes for a Parent Product used by its Child Products';

-- ----------------------------
-- Table structure for jos_vm_product_category_xref
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_category_xref`;
CREATE TABLE `jos_vm_product_category_xref` (
  `category_id` int(11) NOT NULL default '0',
  `product_id` int(11) NOT NULL default '0',
  `product_list` int(11) default NULL,
  KEY `idx_product_category_xref_category_id` (`category_id`),
  KEY `idx_product_category_xref_product_id` (`product_id`),
  KEY `idx_product_category_xref_product_list` (`product_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps Products to Categories';

-- ----------------------------
-- Table structure for jos_vm_product_discount
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_discount`;
CREATE TABLE `jos_vm_product_discount` (
  `discount_id` int(11) NOT NULL auto_increment,
  `amount` decimal(12,2) NOT NULL default '0.00',
  `is_percent` tinyint(1) NOT NULL default '0',
  `start_date` int(11) NOT NULL default '0',
  `end_date` int(11) NOT NULL default '0',
  PRIMARY KEY  (`discount_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Discounts that can be assigned to products';

-- ----------------------------
-- Table structure for jos_vm_product_download
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_download`;
CREATE TABLE `jos_vm_product_download` (
  `product_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `order_id` int(11) NOT NULL default '0',
  `end_date` int(11) NOT NULL default '0',
  `download_max` int(11) NOT NULL default '0',
  `download_id` varchar(32) NOT NULL default '',
  `file_name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`download_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Active downloads for selling downloadable goods';

-- ----------------------------
-- Table structure for jos_vm_product_files
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_files`;
CREATE TABLE `jos_vm_product_files` (
  `file_id` int(19) NOT NULL auto_increment,
  `file_product_id` int(11) NOT NULL default '0',
  `file_name` varchar(128) NOT NULL default '',
  `file_title` varchar(128) NOT NULL default '',
  `file_description` mediumtext NOT NULL,
  `file_extension` varchar(128) NOT NULL default '',
  `file_mimetype` varchar(64) NOT NULL default '',
  `file_url` varchar(254) NOT NULL default '',
  `file_published` tinyint(1) NOT NULL default '0',
  `file_is_image` tinyint(1) NOT NULL default '0',
  `file_image_height` int(11) NOT NULL default '0',
  `file_image_width` int(11) NOT NULL default '0',
  `file_image_thumb_height` int(11) NOT NULL default '50',
  `file_image_thumb_width` int(11) NOT NULL default '0',
  PRIMARY KEY  (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Additional Images and Files which are assigned to products';

-- ----------------------------
-- Table structure for jos_vm_product_mf_xref
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_mf_xref`;
CREATE TABLE `jos_vm_product_mf_xref` (
  `product_id` int(11) default NULL,
  `manufacturer_id` int(11) default NULL,
  KEY `idx_product_mf_xref_product_id` (`product_id`),
  KEY `idx_product_mf_xref_manufacturer_id` (`manufacturer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a product to a manufacturer';

-- ----------------------------
-- Table structure for jos_vm_product_price
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_price`;
CREATE TABLE `jos_vm_product_price` (
  `product_price_id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL default '0',
  `product_price` decimal(12,5) default NULL,
  `product_currency` char(16) default NULL,
  `product_price_vdate` int(11) default NULL,
  `product_price_edate` int(11) default NULL,
  `cdate` int(11) default NULL,
  `mdate` int(11) default NULL,
  `shopper_group_id` int(11) default NULL,
  `price_quantity_start` int(11) unsigned NOT NULL default '0',
  `price_quantity_end` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`product_price_id`),
  KEY `idx_product_price_product_id` (`product_id`),
  KEY `idx_product_price_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COMMENT='Holds price records for a product';

-- ----------------------------
-- Table structure for jos_vm_product_product_type_xref
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_product_type_xref`;
CREATE TABLE `jos_vm_product_product_type_xref` (
  `product_id` int(11) NOT NULL default '0',
  `product_type_id` int(11) NOT NULL default '0',
  KEY `idx_product_product_type_xref_product_id` (`product_id`),
  KEY `idx_product_product_type_xref_product_type_id` (`product_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps products to a product type';

-- ----------------------------
-- Table structure for jos_vm_product_relations
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_relations`;
CREATE TABLE `jos_vm_product_relations` (
  `product_id` int(11) NOT NULL default '0',
  `related_products` text,
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_vm_product_reviews
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_reviews`;
CREATE TABLE `jos_vm_product_reviews` (
  `review_id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL default '0',
  `comment` text NOT NULL,
  `userid` int(11) NOT NULL default '0',
  `time` int(11) NOT NULL default '0',
  `user_rating` tinyint(1) NOT NULL default '0',
  `review_ok` int(11) NOT NULL default '0',
  `review_votes` int(11) NOT NULL default '0',
  `published` char(1) NOT NULL default 'Y',
  PRIMARY KEY  (`review_id`),
  UNIQUE KEY `product_id` (`product_id`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_vm_product_type
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_type`;
CREATE TABLE `jos_vm_product_type` (
  `product_type_id` int(11) NOT NULL auto_increment,
  `product_type_name` varchar(255) NOT NULL default '',
  `product_type_description` text,
  `product_type_publish` char(1) default NULL,
  `product_type_browsepage` varchar(255) default NULL,
  `product_type_flypage` varchar(255) default NULL,
  `product_type_list_order` int(11) default NULL,
  PRIMARY KEY  (`product_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for jos_vm_product_type_parameter
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_type_parameter`;
CREATE TABLE `jos_vm_product_type_parameter` (
  `product_type_id` int(11) NOT NULL default '0',
  `parameter_name` varchar(255) NOT NULL default '',
  `parameter_label` varchar(255) NOT NULL default '',
  `parameter_description` text,
  `parameter_list_order` int(11) NOT NULL default '0',
  `parameter_type` char(1) NOT NULL default 'T',
  `parameter_values` varchar(255) default NULL,
  `parameter_multiselect` char(1) default NULL,
  `parameter_default` varchar(255) default NULL,
  `parameter_unit` varchar(32) default NULL,
  PRIMARY KEY  (`product_type_id`,`parameter_name`),
  KEY `idx_product_type_parameter_product_type_id` (`product_type_id`),
  KEY `idx_product_type_parameter_parameter_order` (`parameter_list_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Parameters which are part of a product type';

-- ----------------------------
-- Table structure for jos_vm_product_votes
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_product_votes`;
CREATE TABLE `jos_vm_product_votes` (
  `product_id` int(255) NOT NULL default '0',
  `votes` text NOT NULL,
  `allvotes` int(11) NOT NULL default '0',
  `rating` tinyint(1) NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '0',
  PRIMARY KEY  (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all votes for a product';

-- ----------------------------
-- Table structure for jos_vm_shipping_carrier
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_shipping_carrier`;
CREATE TABLE `jos_vm_shipping_carrier` (
  `shipping_carrier_id` int(11) NOT NULL auto_increment,
  `shipping_carrier_name` char(80) NOT NULL default '',
  `shipping_carrier_list_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`shipping_carrier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Shipping Carriers as used by the Standard Shipping Module';

-- ----------------------------
-- Table structure for jos_vm_shipping_label
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_shipping_label`;
CREATE TABLE `jos_vm_shipping_label` (
  `order_id` int(11) NOT NULL default '0',
  `shipper_class` varchar(32) default NULL,
  `ship_date` varchar(32) default NULL,
  `service_code` varchar(32) default NULL,
  `special_service` varchar(32) default NULL,
  `package_type` varchar(16) default NULL,
  `order_weight` decimal(10,2) default NULL,
  `is_international` tinyint(1) default NULL,
  `additional_protection_type` varchar(16) default NULL,
  `additional_protection_value` decimal(10,2) default NULL,
  `duty_value` decimal(10,2) default NULL,
  `content_desc` varchar(255) default NULL,
  `label_is_generated` tinyint(1) NOT NULL default '0',
  `tracking_number` varchar(32) default NULL,
  `label_image` blob,
  `have_signature` tinyint(1) NOT NULL default '0',
  `signature_image` blob,
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores information used in generating shipping labels';

-- ----------------------------
-- Table structure for jos_vm_shipping_rate
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_shipping_rate`;
CREATE TABLE `jos_vm_shipping_rate` (
  `shipping_rate_id` int(11) NOT NULL auto_increment,
  `shipping_rate_name` varchar(255) NOT NULL default '',
  `shipping_rate_carrier_id` int(11) NOT NULL default '0',
  `shipping_rate_country` text NOT NULL,
  `shipping_rate_zip_start` varchar(32) NOT NULL default '',
  `shipping_rate_zip_end` varchar(32) NOT NULL default '',
  `shipping_rate_weight_start` decimal(10,3) NOT NULL default '0.000',
  `shipping_rate_weight_end` decimal(10,3) NOT NULL default '0.000',
  `shipping_rate_value` decimal(10,2) NOT NULL default '0.00',
  `shipping_rate_package_fee` decimal(10,2) NOT NULL default '0.00',
  `shipping_rate_currency_id` int(11) NOT NULL default '0',
  `shipping_rate_vat_id` int(11) NOT NULL default '0',
  `shipping_rate_list_order` int(11) NOT NULL default '0',
  PRIMARY KEY  (`shipping_rate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='Shipping Rates, used by the Standard Shipping Module';

-- ----------------------------
-- Table structure for jos_vm_shopper_group
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_shopper_group`;
CREATE TABLE `jos_vm_shopper_group` (
  `shopper_group_id` int(11) NOT NULL auto_increment,
  `vendor_id` int(11) default NULL,
  `shopper_group_name` varchar(32) default NULL,
  `shopper_group_desc` text,
  `shopper_group_discount` decimal(5,2) NOT NULL default '0.00',
  `show_price_including_tax` tinyint(1) NOT NULL default '1',
  `default` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`shopper_group_id`),
  KEY `idx_shopper_group_vendor_id` (`vendor_id`),
  KEY `idx_shopper_group_name` (`shopper_group_name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Shopper Groups that users can be assigned to';

-- ----------------------------
-- Table structure for jos_vm_shopper_vendor_xref
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_shopper_vendor_xref`;
CREATE TABLE `jos_vm_shopper_vendor_xref` (
  `user_id` int(11) default NULL,
  `vendor_id` int(11) default NULL,
  `shopper_group_id` int(11) default NULL,
  `customer_number` varchar(32) default NULL,
  KEY `idx_shopper_vendor_xref_user_id` (`user_id`),
  KEY `idx_shopper_vendor_xref_vendor_id` (`vendor_id`),
  KEY `idx_shopper_vendor_xref_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a user to a Shopper Group of a Vendor';

-- ----------------------------
-- Table structure for jos_vm_state
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_state`;
CREATE TABLE `jos_vm_state` (
  `state_id` int(11) NOT NULL auto_increment,
  `country_id` int(11) NOT NULL default '1',
  `state_name` varchar(64) default NULL,
  `state_3_code` char(3) default NULL,
  `state_2_code` char(2) default NULL,
  PRIMARY KEY  (`state_id`),
  UNIQUE KEY `state_3_code` (`country_id`,`state_3_code`),
  UNIQUE KEY `state_2_code` (`country_id`,`state_2_code`),
  KEY `idx_country_id` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=452 DEFAULT CHARSET=utf8 COMMENT='States that are assigned to a country';

-- ----------------------------
-- Table structure for jos_vm_tax_rate
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_tax_rate`;
CREATE TABLE `jos_vm_tax_rate` (
  `tax_rate_id` int(11) NOT NULL auto_increment,
  `vendor_id` int(11) default NULL,
  `tax_state` varchar(64) default NULL,
  `tax_country` varchar(64) default NULL,
  `mdate` int(11) default NULL,
  `tax_rate` decimal(10,5) default NULL,
  PRIMARY KEY  (`tax_rate_id`),
  KEY `idx_tax_rate_vendor_id` (`vendor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='The tax rates for your store';

-- ----------------------------
-- Table structure for jos_vm_user_info
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_user_info`;
CREATE TABLE `jos_vm_user_info` (
  `user_info_id` varchar(32) NOT NULL default '',
  `user_id` int(11) NOT NULL default '0',
  `address_type` char(2) default NULL,
  `address_type_name` varchar(32) default NULL,
  `company` varchar(64) default NULL,
  `title` varchar(32) default NULL,
  `last_name` varchar(32) default NULL,
  `first_name` varchar(32) default NULL,
  `middle_name` varchar(32) default NULL,
  `phone_1` varchar(32) default NULL,
  `phone_2` varchar(32) default NULL,
  `fax` varchar(32) default NULL,
  `address_1` varchar(64) NOT NULL default '',
  `address_2` varchar(64) default NULL,
  `city` varchar(32) NOT NULL default '',
  `state` varchar(32) NOT NULL default '',
  `country` varchar(32) NOT NULL default 'US',
  `zip` varchar(32) NOT NULL default '',
  `user_email` varchar(255) default NULL,
  `extra_field_1` varchar(255) default NULL,
  `extra_field_2` varchar(255) default NULL,
  `extra_field_3` varchar(255) default NULL,
  `extra_field_4` char(1) default NULL,
  `extra_field_5` char(1) default NULL,
  `cdate` int(11) default NULL,
  `mdate` int(11) default NULL,
  `perms` varchar(40) NOT NULL default 'shopper',
  `bank_account_nr` varchar(32) NOT NULL default '',
  `bank_name` varchar(32) NOT NULL default '',
  `bank_sort_code` varchar(16) NOT NULL default '',
  `bank_iban` varchar(64) NOT NULL default '',
  `bank_account_holder` varchar(48) NOT NULL default '',
  `bank_account_type` enum('Checking','Business Checking','Savings') NOT NULL default 'Checking',
  PRIMARY KEY  (`user_info_id`),
  KEY `idx_user_info_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Customer Information, BT = BillTo and ST = ShipTo';

-- ----------------------------
-- Table structure for jos_vm_userfield
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_userfield`;
CREATE TABLE `jos_vm_userfield` (
  `fieldid` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `type` varchar(50) NOT NULL default '',
  `maxlength` int(11) default NULL,
  `size` int(11) default NULL,
  `required` tinyint(4) default '0',
  `ordering` int(11) default NULL,
  `cols` int(11) default NULL,
  `rows` int(11) default NULL,
  `value` varchar(50) default NULL,
  `default` int(11) default NULL,
  `published` tinyint(1) NOT NULL default '1',
  `registration` tinyint(1) NOT NULL default '0',
  `shipping` tinyint(1) NOT NULL default '0',
  `account` tinyint(1) NOT NULL default '1',
  `readonly` tinyint(1) NOT NULL default '0',
  `calculated` tinyint(1) NOT NULL default '0',
  `sys` tinyint(4) NOT NULL default '0',
  `vendor_id` int(11) default NULL,
  `params` mediumtext,
  PRIMARY KEY  (`fieldid`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='Holds the fields for the user information';

-- ----------------------------
-- Table structure for jos_vm_userfield_values
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_userfield_values`;
CREATE TABLE `jos_vm_userfield_values` (
  `fieldvalueid` int(11) NOT NULL auto_increment,
  `fieldid` int(11) NOT NULL default '0',
  `fieldtitle` varchar(255) NOT NULL default '',
  `fieldvalue` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `sys` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`fieldvalueid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Holds the different values for dropdown and radio lists';

-- ----------------------------
-- Table structure for jos_vm_vendor
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_vendor`;
CREATE TABLE `jos_vm_vendor` (
  `vendor_id` int(11) NOT NULL auto_increment,
  `vendor_name` varchar(64) default NULL,
  `contact_last_name` varchar(32) NOT NULL default '',
  `contact_first_name` varchar(32) NOT NULL default '',
  `contact_middle_name` varchar(32) default NULL,
  `contact_title` varchar(32) default NULL,
  `contact_phone_1` varchar(32) NOT NULL default '',
  `contact_phone_2` varchar(32) default NULL,
  `contact_fax` varchar(32) default NULL,
  `contact_email` varchar(255) default NULL,
  `vendor_phone` varchar(32) default NULL,
  `vendor_address_1` varchar(64) NOT NULL default '',
  `vendor_address_2` varchar(64) default NULL,
  `vendor_city` varchar(32) NOT NULL default '',
  `vendor_state` varchar(32) NOT NULL default '',
  `vendor_country` varchar(32) NOT NULL default 'US',
  `vendor_zip` varchar(32) NOT NULL default '',
  `vendor_store_name` varchar(128) NOT NULL default '',
  `vendor_store_desc` text,
  `vendor_category_id` int(11) default NULL,
  `vendor_thumb_image` varchar(255) default NULL,
  `vendor_full_image` varchar(255) default NULL,
  `vendor_currency` varchar(16) default NULL,
  `cdate` int(11) default NULL,
  `mdate` int(11) default NULL,
  `vendor_image_path` varchar(255) default NULL,
  `vendor_terms_of_service` text NOT NULL,
  `vendor_url` varchar(255) NOT NULL default '',
  `vendor_min_pov` decimal(10,2) default NULL,
  `vendor_freeshipping` decimal(10,2) NOT NULL default '0.00',
  `vendor_currency_display_style` varchar(64) NOT NULL default '',
  `vendor_accepted_currencies` text NOT NULL,
  `vendor_address_format` text NOT NULL,
  `vendor_date_format` varchar(255) NOT NULL,
  PRIMARY KEY  (`vendor_id`),
  KEY `idx_vendor_name` (`vendor_name`),
  KEY `idx_vendor_category_id` (`vendor_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Vendors manage their products in your store';

-- ----------------------------
-- Table structure for jos_vm_vendor_category
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_vendor_category`;
CREATE TABLE `jos_vm_vendor_category` (
  `vendor_category_id` int(11) NOT NULL auto_increment,
  `vendor_category_name` varchar(64) default NULL,
  `vendor_category_desc` text,
  PRIMARY KEY  (`vendor_category_id`),
  KEY `idx_vendor_category_category_name` (`vendor_category_name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='The categories that vendors are assigned to';

-- ----------------------------
-- Table structure for jos_vm_waiting_list
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_waiting_list`;
CREATE TABLE `jos_vm_waiting_list` (
  `waiting_list_id` int(11) NOT NULL auto_increment,
  `product_id` int(11) NOT NULL default '0',
  `user_id` int(11) NOT NULL default '0',
  `notify_email` varchar(150) NOT NULL default '',
  `notified` enum('0','1') default '0',
  `notify_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`waiting_list_id`),
  KEY `product_id` (`product_id`),
  KEY `notify_email` (`notify_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores notifications, users waiting f. products out of stock';

-- ----------------------------
-- Table structure for jos_vm_zone_shipping
-- ----------------------------
DROP TABLE IF EXISTS `jos_vm_zone_shipping`;
CREATE TABLE `jos_vm_zone_shipping` (
  `zone_id` int(11) NOT NULL auto_increment,
  `zone_name` varchar(255) default NULL,
  `zone_cost` decimal(10,2) default NULL,
  `zone_limit` decimal(10,2) default NULL,
  `zone_description` text NOT NULL,
  `zone_tax_rate` int(11) NOT NULL default '0',
  PRIMARY KEY  (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='The Zones managed by the Zone Shipping Module';

-- ----------------------------
-- Table structure for jos_weblinks
-- ----------------------------
DROP TABLE IF EXISTS `jos_weblinks`;
CREATE TABLE `jos_weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `jos_banner` VALUES ('1', '1', 'banner', 'OSM 1', 'osm-1', '0', '43', '0', 'osmbanner1.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', '1', '0', '0000-00-00 00:00:00', '', '', '13', '', '0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_banner` VALUES ('2', '1', 'banner', 'OSM 2', 'osm-2', '0', '49', '0', 'osmbanner2.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', '1', '0', '0000-00-00 00:00:00', '', '', '13', '', '0', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_banner` VALUES ('3', '1', '', 'Joomla!', 'joomla', '0', '49', '0', '', 'http://www.joomla.org', '2006-05-29 14:21:28', '1', '0', '0000-00-00 00:00:00', '', '<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomla! The most popular and widely used Open Source CMS Project in the world.', '14', '', '0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_banner` VALUES ('4', '1', '', 'JoomlaCode', 'joomlacode', '0', '49', '0', '', 'http://joomlacode.org', '2006-05-29 14:19:26', '1', '0', '0000-00-00 00:00:00', '', '<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomlaCode, development and distribution made easy.', '14', '', '0', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_banner` VALUES ('5', '1', '', 'Joomla! Extensions', 'joomla-extensions', '0', '44', '0', '', 'http://extensions.joomla.org', '2006-05-29 14:23:21', '1', '0', '0000-00-00 00:00:00', '', '<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomla! Components, Modules, Plugins and Languages by the bucket load.', '14', '', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_banner` VALUES ('6', '1', '', 'Joomla! Shop', 'joomla-shop', '0', '44', '0', '', 'http://shop.joomla.org', '2006-05-29 14:23:21', '1', '0', '0000-00-00 00:00:00', '', '<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nFor all your Joomla! merchandise.', '14', '', '0', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_banner` VALUES ('7', '1', '', 'Joomla! Promo Shop', 'joomla-promo-shop', '0', '114', '1', 'shop-ad.jpg', 'http://shop.joomla.org', '2007-09-19 17:26:24', '1', '0', '0000-00-00 00:00:00', '', '', '33', '', '0', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_banner` VALUES ('8', '1', '', 'Joomla! Promo Books', 'joomla-promo-books', '0', '137', '0', 'shop-ad-books.jpg', 'http://shop.joomla.org/amazoncom-bookstores.html', '2007-09-19 17:28:01', '1', '0', '0000-00-00 00:00:00', '', '', '33', '', '0', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');
INSERT INTO `jos_bannerclient` VALUES ('1', 'Open Source Matters', 'Administrator', 'admin@opensourcematters.org', '', '0', '00:00:00', null);
INSERT INTO `jos_categories` VALUES ('1', '0', 'Latest', '', 'latest-news', 'taking_notes.jpg', '1', 'left', 'The latest news from the Joomla! Team', '1', '0', '0000-00-00 00:00:00', '', '1', '0', '1', '');
INSERT INTO `jos_categories` VALUES ('2', '0', 'Joomla! Specific Links', '', 'joomla-specific-links', 'clock.jpg', 'com_weblinks', 'left', 'A selection of links that are all related to the Joomla! Project.', '1', '0', '0000-00-00 00:00:00', null, '1', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('3', '0', 'Newsflash', '', 'newsflash', '', '1', 'left', '', '1', '0', '0000-00-00 00:00:00', '', '2', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('4', '0', 'Joomla!', '', 'joomla', '', 'com_newsfeeds', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '2', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('5', '0', 'Free and Open Source Software', '', 'free-and-open-source-software', '', 'com_newsfeeds', 'left', 'Read the latest news about free and open source software from some of its leading advocates.', '1', '0', '0000-00-00 00:00:00', null, '3', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('6', '0', 'Related Projects', '', 'related-projects', '', 'com_newsfeeds', 'left', 'Joomla builds on and collaborates with many other free and open source projects. Keep up with the latest news from some of them.', '1', '0', '0000-00-00 00:00:00', null, '4', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('12', '0', 'Contacts', '', 'contacts', '', 'com_contact_details', 'left', 'Contact Details for this Web site', '1', '0', '0000-00-00 00:00:00', null, '0', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('13', '0', 'Joomla', '', 'joomla', '', 'com_banner', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '0', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('14', '0', 'Text Ads', '', 'text-ads', '', 'com_banner', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '0', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('15', '0', 'Features', '', 'features', '', 'com_content', 'left', '', '0', '0', '0000-00-00 00:00:00', null, '6', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('17', '0', 'Benefits', '', 'benefits', '', 'com_content', 'left', '', '0', '0', '0000-00-00 00:00:00', null, '4', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('18', '0', 'Platforms', '', 'platforms', '', 'com_content', 'left', '', '0', '0', '0000-00-00 00:00:00', null, '3', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('19', '0', 'Other Resources', '', 'other-resources', '', 'com_weblinks', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '2', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('29', '0', 'The CMS', '', 'the-cms', '', '4', 'left', 'Information about the software behind Joomla!<br />', '1', '0', '0000-00-00 00:00:00', null, '2', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('28', '0', 'Current Users', '', 'current-users', '', '3', 'left', 'Questions that users migrating to Joomla! 1.5 are likely to raise<br />', '1', '0', '0000-00-00 00:00:00', null, '2', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('25', '0', 'The Project', '', 'the-project', '', '4', 'left', 'General facts about Joomla!<br />', '1', '65', '2007-06-28 14:50:15', null, '1', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('27', '0', 'New to Joomla!', '', 'new-to-joomla', '', '3', 'left', 'Questions for new users of Joomla!', '1', '0', '0000-00-00 00:00:00', null, '3', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('30', '0', 'The Community', '', 'the-community', '', '4', 'left', 'About the millions of Joomla! users and Web sites<br />', '1', '0', '0000-00-00 00:00:00', null, '3', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('31', '0', 'General', '', 'general', '', '3', 'left', 'General questions about the Joomla! CMS', '1', '0', '0000-00-00 00:00:00', null, '1', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('32', '0', 'Languages', '', 'languages', '', '3', 'left', 'Questions related to localisation and languages', '1', '0', '0000-00-00 00:00:00', null, '4', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('33', '0', 'Joomla! Promo', '', 'joomla-promo', '', 'com_banner', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '1', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('34', '0', 'Giới Thiệu Công Ty', '', 'gioithieucongty', '', '5', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '1', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('35', '0', 'Liên Hệ', '', 'lienhe', '', '4', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '4', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('36', '0', 'Kinh Tế', '', 'kinhte', '', '1', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '3', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('37', '0', 'Tin Xã Hội', '', 'xahoi', '', '1', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '4', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('38', '0', 'Tinvpp', '', 'tinvpp', '', '1', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '5', '0', '0', '');
INSERT INTO `jos_categories` VALUES ('39', '0', 'Dịch Vụ', '', 'dichvu', '', '6', 'left', '', '1', '0', '0000-00-00 00:00:00', null, '1', '0', '0', '');
INSERT INTO `jos_components` VALUES ('1', 'Banners', '', '0', '0', '', 'Banner Management', 'com_banners', '0', 'js/ThemeOffice/component.png', '0', 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', '1');
INSERT INTO `jos_components` VALUES ('2', 'Banners', '', '0', '1', 'option=com_banners', 'Active Banners', 'com_banners', '1', 'js/ThemeOffice/edit.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('3', 'Clients', '', '0', '1', 'option=com_banners&c=client', 'Manage Clients', 'com_banners', '2', 'js/ThemeOffice/categories.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('4', 'Web Links', 'option=com_weblinks', '0', '0', '', 'Manage Weblinks', 'com_weblinks', '0', 'js/ThemeOffice/component.png', '0', 'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', '1');
INSERT INTO `jos_components` VALUES ('5', 'Links', '', '0', '4', 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', '1', 'js/ThemeOffice/edit.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('6', 'Categories', '', '0', '4', 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', '2', 'js/ThemeOffice/categories.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('7', 'Contacts', 'option=com_contact', '0', '0', '', 'Edit contact details', 'com_contact', '0', 'js/ThemeOffice/component.png', '1', 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', '1');
INSERT INTO `jos_components` VALUES ('8', 'Contacts', '', '0', '7', 'option=com_contact', 'Edit contact details', 'com_contact', '0', 'js/ThemeOffice/edit.png', '1', '', '1');
INSERT INTO `jos_components` VALUES ('9', 'Categories', '', '0', '7', 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', '2', 'js/ThemeOffice/categories.png', '1', 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', '1');
INSERT INTO `jos_components` VALUES ('10', 'Polls', 'option=com_poll', '0', '0', 'option=com_poll', 'Manage Polls', 'com_poll', '0', 'js/ThemeOffice/component.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('11', 'News Feeds', 'option=com_newsfeeds', '0', '0', '', 'News Feeds Management', 'com_newsfeeds', '0', 'js/ThemeOffice/component.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('12', 'Feeds', '', '0', '11', 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', '1', 'js/ThemeOffice/edit.png', '0', 'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', '1');
INSERT INTO `jos_components` VALUES ('13', 'Categories', '', '0', '11', 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', '2', 'js/ThemeOffice/categories.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('14', 'User', 'option=com_user', '0', '0', '', '', 'com_user', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('15', 'Search', 'option=com_search', '0', '0', 'option=com_search', 'Search Statistics', 'com_search', '0', 'js/ThemeOffice/component.png', '1', 'enabled=0\n\n', '1');
INSERT INTO `jos_components` VALUES ('16', 'Categories', '', '0', '1', 'option=com_categories&section=com_banner', 'Categories', '', '3', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('17', 'Wrapper', 'option=com_wrapper', '0', '0', '', 'Wrapper', 'com_wrapper', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('18', 'Mail To', '', '0', '0', '', '', 'com_mailto', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('19', 'Media Manager', '', '0', '0', 'option=com_media', 'Media Manager', 'com_media', '0', '', '1', 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html', '1');
INSERT INTO `jos_components` VALUES ('20', 'Articles', 'option=com_content', '0', '0', '', '', 'com_content', '0', '', '1', 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\n\n', '1');
INSERT INTO `jos_components` VALUES ('21', 'Configuration Manager', '', '0', '0', '', 'Configuration', 'com_config', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('22', 'Installation Manager', '', '0', '0', '', 'Installer', 'com_installer', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('23', 'Language Manager', '', '0', '0', '', 'Languages', 'com_languages', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('24', 'Mass mail', '', '0', '0', '', 'Mass Mail', 'com_massmail', '0', '', '1', 'mailSubjectPrefix=\nmailBodySuffix=\n\n', '1');
INSERT INTO `jos_components` VALUES ('25', 'Menu Editor', '', '0', '0', '', 'Menu Editor', 'com_menus', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('27', 'Messaging', '', '0', '0', '', 'Messages', 'com_messages', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('28', 'Modules Manager', '', '0', '0', '', 'Modules', 'com_modules', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('29', 'Plugin Manager', '', '0', '0', '', 'Plugins', 'com_plugins', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('30', 'Template Manager', '', '0', '0', '', 'Templates', 'com_templates', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('31', 'User Manager', '', '0', '0', '', 'Users', 'com_users', '0', '', '1', 'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', '1');
INSERT INTO `jos_components` VALUES ('32', 'Cache Manager', '', '0', '0', '', 'Cache', 'com_cache', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('33', 'Control Panel', '', '0', '0', '', 'Control Panel', 'com_cpanel', '0', '', '1', '', '1');
INSERT INTO `jos_components` VALUES ('34', 'VirtueMart', 'option=com_virtuemart', '0', '0', 'option=com_virtuemart', 'VirtueMart', 'com_virtuemart', '0', '../components/com_virtuemart/shop_image/ps_image/menu_icon.png', '0', '', '1');
INSERT INTO `jos_components` VALUES ('35', 'virtuemart_version', '', '0', '9999', '', '', '', '0', '', '0', 'RELEASE=1.1.9\nDEV_STATUS=stable', '1');
INSERT INTO `jos_contact_details` VALUES ('1', 'Name', 'name', 'Position', 'Street', 'Suburb', 'State', 'Country', 'Zip Code', 'Telephone', 'Fax', 'Miscellanous info', 'powered_by.png', 'top', 'email@email.com', '1', '1', '0', '0000-00-00 00:00:00', '1', 'show_name=1\r\nshow_position=1\r\nshow_email=0\r\nshow_street_address=1\r\nshow_suburb=1\r\nshow_state=1\r\nshow_postcode=1\r\nshow_country=1\r\nshow_telephone=1\r\nshow_mobile=1\r\nshow_fax=1\r\nshow_webpage=1\r\nshow_misc=1\r\nshow_image=1\r\nallow_vcard=0\r\ncontact_icons=0\r\nicon_address=\r\nicon_email=\r\nicon_telephone=\r\nicon_fax=\r\nicon_misc=\r\nshow_email_form=1\r\nemail_description=1\r\nshow_email_copy=1\r\nbanned_email=\r\nbanned_subject=\r\nbanned_text=', '0', '12', '0', '', '');
INSERT INTO `jos_content` VALUES ('1', 'Giới Thiệu', 'gioithieu', '', '<p>Văn Phòng Phẩm Đức Mạnh Xin Kinh Chào Quý Khách</p>', '', '1', '5', '0', '34', '2008-08-12 10:00:00', '62', '', '2011-09-19 09:26:09', '62', '62', '2011-09-22 06:10:53', '2006-01-03 01:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '31', '0', '1', '', '', '0', '96', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('48', 'Giao Hàng Tận Nơi', 'giaohang', '', '<p>Chỉ cần nhấc máy và gọi chúng tôi sẽ đem đến tận nơi những j bạn cần.</p>', '', '1', '6', '0', '39', '2011-09-20 02:01:52', '62', '', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '2011-09-20 02:01:52', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '1', '0', '1', '', '', '0', '1', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('2', 'Newsflash 1', 'newsflash-1', '', '<p>Joomla! makes it easy to launch a Web site of any kind. Whether you want a brochure site or you are building a large online community, Joomla! allows you to deploy a new site in minutes and add extra functionality as you need it. The hundreds of available Extensions will help to expand your site and allow you to deliver new services that extend your reach into the Internet.</p>', '', '1', '1', '0', '3', '2008-08-10 06:30:34', '62', '', '2008-08-10 06:30:34', '62', '0', '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '3', '', '', '0', '1', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('3', 'Newsflash 2', 'newsflash-2', '', '<p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content, images, videos, and more. Site administrators can edit and manage content \'in-context\' by clicking the \'Edit\' link. Webmasters can also edit content through a graphical Control Panel that gives you complete control over your site.</p>', '', '1', '1', '0', '3', '2008-08-09 22:30:34', '62', '', '2008-08-09 22:30:34', '62', '0', '0000-00-00 00:00:00', '2004-08-09 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '4', '', '', '0', '0', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('4', 'Newsflash 3', 'newsflash-3', '', '<p>With a library of thousands of free <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"The Joomla! Extensions Directory\">Extensions</a>, you can add what you need as your site grows. Don\'t wait, look through the <a href=\"http://extensions.joomla.org/\" target=\"_blank\" title=\"Joomla! Extensions\">Joomla! Extensions</a>  library today. </p>', '', '1', '1', '0', '3', '2008-08-10 06:30:34', '62', '', '2008-08-10 06:30:34', '62', '0', '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '5', '', '', '0', '1', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('5', 'Joomla! License Guidelines', 'joomla-license-guidelines', 'joomla-license-guidelines', '<p>This Web site is powered by <a href=\"http://joomla.org/\" target=\"_blank\" title=\"Joomla!\">Joomla!</a> The software and default templates on which it runs are Copyright 2005-2008 <a href=\"http://www.opensourcematters.org/\" target=\"_blank\" title=\"Open Source Matters\">Open Source Matters</a>. The sample content distributed with Joomla! is licensed under the <a href=\"http://docs.joomla.org/JEDL\" target=\"_blank\" title=\"Joomla! Electronic Document License\">Joomla! Electronic Documentation License.</a> All data entered into this Web site and templates added after installation, are copyrighted by their respective copyright owners.</p> <p>If you want to distribute, copy, or modify Joomla!, you are welcome to do so under the terms of the <a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1\" target=\"_blank\" title=\"GNU General Public License\"> GNU General Public License</a>. If you are unfamiliar with this license, you might want to read <a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC4\" target=\"_blank\" title=\"How To Apply These Terms To Your Program\">\'How To Apply These Terms To Your Program\'</a> and the <a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0-faq.html\" target=\"_blank\" title=\"GNU General Public License FAQ\">\'GNU General Public License FAQ\'</a>.</p> <p>The Joomla! licence has always been GPL.</p>', '', '1', '4', '0', '25', '2008-08-20 10:11:07', '62', '', '2008-08-20 10:11:07', '62', '0', '0000-00-00 00:00:00', '2004-08-19 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '2', '', '', '0', '100', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('6', 'We are Volunteers', 'we-are-volunteers', '', '<p>The Joomla Core Team and Working Group members are volunteer developers, designers, administrators and managers who have worked together to take Joomla! to new heights in its relatively short life. Joomla! has some wonderfully talented people taking Open Source concepts to the forefront of industry standards.  Joomla! 1.5 is a major leap forward and represents the most exciting Joomla! release in the history of the project. </p>', '', '1', '1', '0', '1', '2007-07-07 09:54:06', '62', '', '2007-07-07 09:54:06', '62', '0', '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '10', '0', '5', '', '', '0', '54', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('9', 'Millions of Smiles', 'millions-of-smiles', '', '<p>The Joomla! team has millions of good reasons to be smiling about the Joomla! 1.5. In its current incarnation, it\'s had millions of downloads, taking it to an unprecedented level of popularity.  The new code base is almost an entire re-factor of the old code base.  The user experience is still extremely slick but for developers the API is a dream.  A proper framework for real PHP architects seeking the best of the best.</p><p>If you\'re a former Mambo User or a 1.0 series Joomla! User, 1.5 is the future of CMSs for a number of reasons.  It\'s more powerful, more flexible, more secure, and intuitive.  Our developers and interface designers have worked countless hours to make this the most exciting release in the content management system sphere.</p><p>Go on ... get your FREE copy of Joomla! today and spread the word about this benchmark project. </p>', '', '1', '1', '0', '1', '2007-07-07 09:54:06', '62', '', '2007-07-07 09:54:06', '62', '0', '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '5', '0', '6', '', '', '0', '23', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('10', 'How do I localise Joomla! to my language?', 'how-do-i-localise-joomla-to-my-language', '', '<h4>General<br /></h4><p>In Joomla! 1.5 all User interfaces can be localised. This includes the installation, the Back-end Control Panel and the Front-end Site.</p><p>The core release of Joomla! 1.5 is shipped with multiple language choices in the installation but, other than English (the default), languages for the Site and Administration interfaces need to be added after installation. Links to such language packs exist below.</p>', '<p>Translation Teams for Joomla! 1.5 may have also released fully localised installation packages where site, administrator and sample data are in the local language. These localised releases can be found in the specific team projects on the <a href=\"http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/\" target=\"_blank\" title=\"JED\">Joomla! Extensions Directory</a>.</p><h4>How do I install language packs?</h4><ul><li>First download both the admin and the site language packs that you require.</li><li>Install each pack separately using the Extensions-&gt;Install/Uninstall Menu selection and then the package file upload facility.</li><li>Go to the Language Manager and be sure to select Site or Admin in the sub-menu. Then select the appropriate language and make it the default one using the Toolbar button.</li></ul><h4>How do I select languages?</h4><ul><li>Default languages can be independently set for Site and for Administrator</li><li>In addition, users can define their preferred language for each Site and Administrator. This takes affect after logging in.</li><li>While logging in to the Administrator Back-end, a language can also be selected for the particular session.</li></ul><h4>Where can I find Language Packs and Localised Releases?</h4><p><em>Please note that Joomla! 1.5 is new and language packs for this version may have not been released at this time.</em> </p><ul><li><a href=\"http://joomlacode.org/gf/project/jtranslation/\" target=\"_blank\" title=\"Accredited Translations\">The Joomla! Accredited Translations Project</a>  - This is a joint repository for language packs that were developed by teams that are members of the Joomla! Translations Working Group.</li><li><a href=\"http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/\" target=\"_blank\" title=\"Translations\">The Joomla! Extensions Site - Translations</a>  </li><li><a href=\"http://community.joomla.org/translations.html\" target=\"_blank\" title=\"Translation Work Group Teams\">List of Translation Teams and Translation Partner Sites for Joomla! 1.5</a> </li></ul>', '1', '3', '0', '32', '2008-07-30 14:06:37', '62', '', '2008-07-30 14:06:37', '62', '0', '0000-00-00 00:00:00', '2006-09-29 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '9', '0', '5', '', '', '0', '10', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('11', 'How do I upgrade to Joomla! 1.5 ?', 'how-do-i-upgrade-to-joomla-15', '', '<p>Joomla! 1.5 does not provide an upgrade path from earlier versions. Converting an older site to a Joomla! 1.5 site requires creation of a new empty site using Joomla! 1.5 and then populating the new site with the content from the old site. This migration of content is not a one-to-one process and involves conversions and modifications to the content dump.</p> <p>There are two ways to perform the migration:</p>', ' <div id=\"post_content-107\"><li>An automated method of migration has been provided which uses a migrator Component to create the migration dump out of the old site (Mambo 4.5.x up to Joomla! 1.0.x) and a smart import facility in the Joomla! 1.5 Installation that performs required conversions and modifications during the installation process.</li> <li>Migration can be performed manually. This involves exporting the required tables, manually performing required conversions and modifications and then importing the content to the new site after it is installed.</li>  <p><!--more--></p> <h2><strong> Automated migration</strong></h2>  <p>This is a two phased process using two tools. The first tool is a migration Component named <font face=\"courier new,courier\">com_migrator</font>. This Component has been contributed by Harald Baer and is based on his <strong>eBackup </strong>Component. The migrator needs to be installed on the old site and when activated it prepares the required export dump of the old site\'s data. The second tool is built into the Joomla! 1.5 installation process. The exported content dump is loaded to the new site and all conversions and modification are performed on-the-fly.</p> <h3><u> Step 1 - Using com_migrator to export data from old site:</u></h3> <li>Install the <font face=\"courier new,courier\">com_migrator</font> Component on the <u><strong>old</strong></u> site. It can be found at the <a href=\"http://joomlacode.org/gf/project/pasamioprojects/frs/\" target=\"_blank\" title=\"JoomlaCode\">JoomlaCode developers forge</a>.</li> <li>Select the Component in the Component Menu of the Control Panel.</li> <li>Click on the <strong>Dump it</strong> icon. Three exported <em>gzipped </em>export scripts will be created. The first is a complete backup of the old site. The second is the migration content of all core elements which will be imported to the new site. The third is a backup of all 3PD Component tables.</li> <li>Click on the download icon of the particular exports files needed and store locally.</li> <li>Multiple export sets can be created.</li> <li>The exported data is not modified in anyway and the original encoding is preserved. This makes the <font face=\"courier new,courier\">com_migrator</font> tool a recommended tool to use for manual migration as well.</li> <h3><u> Step 2 - Using the migration facility to import and convert data during Joomla! 1.5 installation:</u></h3><p>Note: This function requires the use of the <em><font face=\"courier new,courier\">iconv </font></em>function in PHP to convert encodings. If <em><font face=\"courier new,courier\">iconv </font></em>is not found a warning will be provided.</p> <li>In step 6 - Configuration select the \'Load Migration Script\' option in the \'Load Sample Data, Restore or Migrate Backed Up Content\' section of the page.</li> <li>Enter the table prefix used in the content dump. For example: \'jos_\' or \'site2_\' are acceptable values.</li> <li>Select the encoding of the dumped content in the dropdown list. This should be the encoding used on the pages of the old site. (As defined in the _ISO variable in the language file or as seen in the browser page info/encoding/source)</li> <li>Browse the local host and select the migration export and click on <strong>Upload and Execute</strong></li> <li>A success message should appear or alternately a listing of database errors</li> <li>Complete the other required fields in the Configuration step such as Site Name and Admin details and advance to the final step of installation. (Admin details will be ignored as the imported data will take priority. Please remember admin name and password from the old site)</li> <p><u><br /></u></p></div>', '1', '3', '0', '28', '2008-07-30 20:27:52', '62', '', '2008-07-30 20:27:52', '62', '0', '0000-00-00 00:00:00', '2006-09-29 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '10', '0', '3', '', '', '0', '14', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('12', 'Why does Joomla! 1.5 use UTF-8 encoding?', 'why-does-joomla-15-use-utf-8-encoding', '', '<p>Well... how about never needing to mess with encoding settings again?</p><p>Ever needed to display several languages on one page or site and something always came up in Giberish?</p><p>With utf-8 (a variant of Unicode) glyphs (character forms) of basically all languages can be displayed with one single encoding setting. </p>', '', '1', '3', '0', '31', '2008-08-05 01:11:29', '62', '', '2008-08-05 01:11:29', '62', '0', '0000-00-00 00:00:00', '2006-10-03 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '8', '0', '8', '', '', '0', '29', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('13', 'What happened to the locale setting?', 'what-happened-to-the-locale-setting', '', 'This is now defined in the Language [<em>lang</em>].xml file in the Language metadata settings. If you are having locale problems such as dates do not appear in your language for example, you might want to check/edit the entries in the locale tag. Note that multiple locale strings can be set and the host will usually accept the first one recognised.', '', '1', '3', '0', '28', '2008-08-06 16:47:35', '62', '', '2008-08-06 16:47:35', '62', '0', '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '2', '', '', '0', '11', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('14', 'What is the FTP layer for?', 'what-is-the-ftp-layer-for', '', '<p>The FTP Layer allows file operations (such as installing Extensions or updating the main configuration file) without having to make all the folders and files writable. This has been an issue on Linux and other Unix based platforms in respect of file permissions. This makes the site admin\'s life a lot easier and increases security of the site.</p><p>You can check the write status of relevent folders by going to \'\'Help-&gt;System Info\" and then in the sub-menu to \"Directory Permissions\". With the FTP Layer enabled even if all directories are red, Joomla! will operate smoothly.</p><p>NOTE: the FTP layer is not required on a Windows host/server. </p>', '', '1', '3', '0', '31', '2008-08-06 21:27:49', '62', '', '2008-08-06 21:27:49', '62', '0', '0000-00-00 00:00:00', '2006-10-05 16:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', '6', '0', '6', '', '', '0', '23', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('15', 'Can Joomla! 1.5 operate with PHP Safe Mode On?', 'can-joomla-15-operate-with-php-safe-mode-on', '', '<p>Yes it can! This is a significant security improvement.</p><p>The <em>safe mode</em> limits PHP to be able to perform actions only on files/folders who\'s owner is the same as PHP is currently using (this is usually \'apache\'). As files normally are created either by the Joomla! application or by FTP access, the combination of PHP file actions and the FTP Layer allows Joomla! to operate in PHP Safe Mode.</p>', '', '1', '3', '0', '31', '2008-08-06 19:28:35', '62', '', '2008-08-06 19:28:35', '62', '0', '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '4', '', '', '0', '8', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('16', 'Only one edit window! How do I create \"Read more...\"?', 'only-one-edit-window-how-do-i-create-read-more', '', '<p>This is now implemented by inserting a <strong>Read more...</strong> tag (the button is located below the editor area) a dotted line appears in the edited text showing the split location for the <em>Read more....</em> A new Plugin takes care of the rest.</p><p>It is worth mentioning that this does not have a negative effect on migrated data from older sites. The new implementation is fully backward compatible.</p>', '', '1', '3', '0', '28', '2008-08-06 19:29:28', '62', '', '2008-08-06 19:29:28', '62', '0', '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '4', '', '', '0', '20', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('17', 'My MySQL database does not support UTF-8. Do I have a problem?', 'my-mysql-database-does-not-support-utf-8-do-i-have-a-problem', '', 'No you don\'t. Versions of MySQL lower than 4.1 do not have built in UTF-8 support. However, Joomla! 1.5 has made provisions for backward compatibility and is able to use UTF-8 on older databases. Let the installer take care of all the settings and there is no need to make any changes to the database (charset, collation, or any other).', '', '1', '3', '0', '31', '2008-08-07 09:30:37', '62', '', '2008-08-07 09:30:37', '62', '0', '0000-00-00 00:00:00', '2006-10-05 20:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '10', '0', '7', '', '', '0', '9', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('18', 'Joomla! Features', 'joomla-features', '', '<h4><font color=\"#ff6600\">Joomla! features:</font></h4> <ul><li>Completely database driven site engines </li><li>News, products, or services sections fully editable and manageable</li><li>Topics sections can be added to by contributing Authors </li><li>Fully customisable layouts including <em>left</em>, <em>center</em>, and <em>right </em>Menu boxes </li><li>Browser upload of images to your own library for use anywhere in the site </li><li>Dynamic Forum/Poll/Voting booth for on-the-spot results </li><li>Runs on Linux, FreeBSD, MacOSX server, Solaris, and AIX', '  </li></ul> <h4>Extensive Administration:</h4> <ul><li>Change order of objects including news, FAQs, Articles etc. </li><li>Random Newsflash generator </li><li>Remote Author submission Module for News, Articles, FAQs, and Links </li><li>Object hierarchy - as many Sections, departments, divisions, and pages as you want </li><li>Image library - store all your PNGs, PDFs, DOCs, XLSs, GIFs, and JPEGs online for easy use </li><li>Automatic Path-Finder. Place a picture and let Joomla! fix the link </li><li>News Feed Manager. Easily integrate news feeds into your Web site.</li><li>E-mail a friend and Print format available for every story and Article </li><li>In-line Text editor similar to any basic word processor software </li><li>User editable look and feel </li><li>Polls/Surveys - Now put a different one on each page </li><li>Custom Page Modules. Download custom page Modules to spice up your site </li><li>Template Manager. Download Templates and implement them in seconds </li><li>Layout preview. See how it looks before going live </li><li>Banner Manager. Make money out of your site.</li></ul>', '1', '4', '0', '29', '2008-08-08 23:32:45', '62', '', '2008-08-08 23:32:45', '62', '0', '0000-00-00 00:00:00', '2006-10-07 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '11', '0', '4', '', '', '0', '59', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('19', 'Joomla! Overview', 'joomla-overview', '', '<p>If you\'re new to Web publishing systems, you\'ll find that Joomla! delivers sophisticated solutions to your online needs. It can deliver a robust enterprise-level Web site, empowered by endless extensibility for your bespoke publishing needs. Moreover, it is often the system of choice for small business or home users who want a professional looking site that\'s simple to deploy and use. <em>We do content right</em>.<br /> </p><p>So what\'s the catch? How much does this system cost?</p><p> Well, there\'s good news ... and more good news! Joomla! 1.5 is free, it is released under an Open Source license - the GNU/General Public License v 2.0. Had you invested in a mainstream, commercial alternative, there\'d be nothing but moths left in your wallet and to add new functionality would probably mean taking out a second mortgage each time you wanted something adding!</p><p>Joomla! changes all that ... <br />Joomla! is different from the normal models for content management software. For a start, it\'s not complicated. Joomla! has been developed for everybody, and anybody can develop it further. It is designed to work (primarily) with other Open Source, free, software such as PHP, MySQL, and Apache. </p><p>It is easy to install and administer, and is reliable. </p><p>Joomla! doesn\'t even require the user or administrator of the system to know HTML to operate it once it\'s up and running.</p><p>To get the perfect Web site with all the functionality that you require for your particular application may take additional time and effort, but with the Joomla! Community support that is available and the many Third Party Developers actively creating and releasing new Extensions for the 1.5 platform on an almost daily basis, there is likely to be something out there to meet your needs. Or you could develop your own Extensions and make these available to the rest of the community. </p>', '', '1', '4', '0', '29', '2008-08-09 07:49:20', '62', '', '2008-08-09 07:49:20', '62', '0', '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '13', '0', '2', '', '', '0', '152', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('20', 'Liên Hệ Với Chúng Tôi', 'lienhe', '', '<h1>Support</h1>\r\n<p>Hãy liên hệ với chúng tối qua những thông tin sau.</p>', '', '1', '4', '0', '35', '2008-08-09 08:33:57', '62', '', '2011-09-19 09:21:47', '62', '0', '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '14', '0', '1', '', '', '0', '7', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('21', 'Joomla! Facts', 'joomla-facts', '', '<p>Here are some interesting facts about Joomla!</p><ul><li><span>Over 210,000 active registered Users on the <a href=\"http://forum.joomla.org\" target=\"_blank\" title=\"Joomla Forums\">Official Joomla! community forum</a> and more on the many international community sites.</span><ul><li><span>over 1,000,000 posts in over 200,000 topics</span></li><li>over 1,200 posts per day</li><li>growing at 150 new participants each day!</li></ul></li><li><span>1168 Projects on the JoomlaCode (<a href=\"http://joomlacode.org/\" target=\"_blank\" title=\"JoomlaCode\">joomlacode.org</a> ). All for open source addons by third party developers.</span><ul><li><span>Well over 6,000,000 downloads of Joomla! since the migration to JoomlaCode in March 2007.<br /></span></li></ul></li><li><span>Nearly 4,000 extensions for Joomla! have been registered on the <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"http://extensions.joomla.org\">Joomla! Extension Directory</a>  </span></li><li><span>Joomla.org exceeds 2 TB of traffic per month!</span></li></ul>', '', '1', '4', '0', '30', '2008-08-09 16:46:37', '62', '', '2008-08-09 16:46:37', '62', '0', '0000-00-00 00:00:00', '2006-10-07 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '13', '0', '1', '', '', '0', '50', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('22', 'What\'s New in 1.5?', 'whats-new-in-15', '', '<p>As with previous releases, Joomla! provides a unified and easy-to-use framework for delivering content for Web sites of all kinds. To support the changing nature of the Internet and emerging Web technologies, Joomla! required substantial restructuring of its core functionality and we also used this effort to simplify many challenges within the current user interface. Joomla! 1.5 has many new features.</p>', '<p style=\"margin-bottom: 0in\">In Joomla! 1.5, you\'ll notice: </p>    <ul><li>     <p style=\"margin-bottom: 0in\">       Substantially improved usability, manageability, and scalability far beyond the original Mambo foundations</p>   </li><li>     <p style=\"margin-bottom: 0in\"> Expanded accessibility to support internationalisation, double-byte characters and right-to-left support for Arabic, Farsi, and Hebrew languages among others</p>   </li><li>     <p style=\"margin-bottom: 0in\"> Extended integration of external applications through Web services and remote authentication such as the Lightweight Directory Access Protocol (LDAP)</p>   </li><li>     <p style=\"margin-bottom: 0in\"> Enhanced content delivery, template and presentation capabilities to support accessibility standards and content delivery to any destination</p>   </li><li>     <p style=\"margin-bottom: 0in\">       A more sustainable and flexible framework for Component and Extension developers</p>   </li><li>     <p style=\"margin-bottom: 0in\">Backward compatibility with previous releases of Components, Templates, Modules, and other Extensions</p></li></ul>', '1', '4', '0', '29', '2008-08-11 22:13:58', '62', '', '2008-08-11 22:13:58', '62', '0', '0000-00-00 00:00:00', '2006-10-10 18:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '10', '0', '1', '', '', '0', '92', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('23', 'Platforms and Open Standards', 'platforms-and-open-standards', '', '<p class=\"MsoNormal\">Joomla! runs on any platform including Windows, most flavours of Linux, several Unix versions, and the Apple OS/X platform.  Joomla! depends on PHP and the MySQL database to deliver dynamic content.  </p>            <p class=\"MsoNormal\">The minimum requirements are:</p>      <ul><li>Apache 1.x, 2.x and higher</li><li>PHP 4.3 and higher</li><li>MySQL 3.23 and higher</li></ul>It will also run on alternative server platforms such as Windows IIS - provided they support PHP and MySQL - but these require additional configuration in order for the Joomla! core package to be successful installed and operated.', '', '1', '4', '0', '25', '2008-08-11 04:22:14', '62', '', '2008-08-11 04:22:14', '62', '0', '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '3', '', '', '0', '11', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('24', 'Content Layouts', 'content-layouts', '', '<p>Joomla! provides plenty of flexibility when displaying your Web content. Whether you are using Joomla! for a blog site, news or a Web site for a company, you\'ll find one or more content styles to showcase your information. You can also change the style of content dynamically depending on your preferences. Joomla! calls how a page is laid out a <strong>layout</strong>. Use the guide below to understand which layouts are available and how you might use them. </p> <h2>Content </h2> <p>Joomla! makes it extremely easy to add and display content. All content  is placed where your mainbody tag in your template is located. There are three main types of layouts available in Joomla! and all of them can be customised via parameters. The display and parameters are set in the Menu Item used to display the content your working on. You create these layouts by creating a Menu Item and choosing how you want the content to display.</p> <h3>Blog Layout<br /> </h3> <p>Blog layout will show a listing of all Articles of the selected blog type (Section or Category) in the mainbody position of your template. It will give you the standard title, and Intro of each Article in that particular Category and/or Section. You can customise this layout via the use of the Preferences and Parameters, (See Article Parameters) this is done from the Menu not the Section Manager!</p> <h3>Blog Archive Layout<br /> </h3> <p>A Blog Archive layout will give you a similar output of Articles as the normal Blog Display but will add, at the top, two drop down lists for month and year plus a search button to allow Users to search for all Archived Articles from a specific month and year.</p> <h3>List Layout<br /> </h3> <p>Table layout will simply give you a <em>tabular </em>list<em> </em>of all the titles in that particular Section or Category. No Intro text will be displayed just the titles. You can set how many titles will be displayed in this table by Parameters. The table layout will also provide a filter Section so that Users can reorder, filter, and set how many titles are listed on a single page (up to 50)</p> <h2>Wrapper</h2> <p>Wrappers allow you to place stand alone applications and Third Party Web sites inside your Joomla! site. The content within a Wrapper appears within the primary content area defined by the \"mainbody\" tag and allows you to display their content as a part of your own site. A Wrapper will place an IFRAME into the content Section of your Web site and wrap your standard template navigation around it so it appears in the same way an Article would.</p> <h2>Content Parameters</h2> <p>The parameters for each layout type can be found on the right hand side of the editor boxes in the Menu Item configuration screen. The parameters available depend largely on what kind of layout you are configuring.</p>', '', '1', '4', '0', '29', '2008-08-12 22:33:10', '62', '', '2008-08-12 22:33:10', '62', '0', '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '11', '0', '5', '', '', '0', '70', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('25', 'What are the requirements to run Joomla! 1.5?', 'what-are-the-requirements-to-run-joomla-15', '', '<p>Joomla! runs on the PHP pre-processor. PHP comes in many flavours, for a lot of operating systems. Beside PHP you will need a Web server. Joomla! is optimized for the Apache Web server, but it can run on different Web servers like Microsoft IIS it just requires additional configuration of PHP and MySQL. Joomla! also depends on a database, for this currently you can only use MySQL. </p>Many people know from their own experience that it\'s not easy to install an Apache Web server and it gets harder if you want to add MySQL, PHP and Perl. XAMPP, WAMP, and MAMP are easy to install distributions containing Apache, MySQL, PHP and Perl for the Windows, Mac OSX and Linux operating systems. These packages are for localhost installations on non-public servers only.<br />The minimum version requirements are:<br /><ul><li>Apache 1.x or 2.x</li><li>PHP 4.3 or up</li><li>MySQL 3.23 or up</li></ul>For the latest minimum requirements details, see <a href=\"http://www.joomla.org/about-joomla/technical-requirements.html\" target=\"_blank\" title=\"Joomla! Technical Requirements\">Joomla! Technical Requirements</a>.', '', '1', '3', '0', '31', '2008-08-11 00:42:31', '62', '', '2008-08-11 00:42:31', '62', '0', '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '5', '', '', '0', '25', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('26', 'Extensions', 'extensions', '', '<p>Out of the box, Joomla! does a great job of managing the content needed to make your Web site sing. But for many people, the true power of Joomla! lies in the application framework that makes it possible for developers all around the world to create powerful add-ons that are called <strong>Extensions</strong>. An Extension is used to add capabilities to Joomla! that do not exist in the base core code. Here are just some examples of the hundreds of available Extensions:</p> <ul>   <li>Dynamic form builders</li>   <li>Business or organisational directories</li>   <li>Document management</li>   <li>Image and multimedia galleries</li>   <li>E-commerce and shopping cart engines</li>   <li>Forums and chat software</li>   <li>Calendars</li>   <li>E-mail newsletters</li>   <li>Data collection and reporting tools</li>   <li>Banner advertising systems</li>   <li>Paid subscription services</li>   <li>and many, many, more</li> </ul> <p>You can find more examples over at our ever growing <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"Joomla! Extensions Directory\">Joomla! Extensions Directory</a>. Prepare to be amazed at the amount of exciting work produced by our active developer community!</p><p>A useful guide to the Extension site can be found at:<br /><a href=\"http://extensions.joomla.org/content/view/15/63/\" target=\"_blank\" title=\"Guide to the Joomla! Extension site\">http://extensions.joomla.org/content/view/15/63/</a> </p> <h3>Types of Extensions </h3><p>There are five types of extensions:</p> <ul>   <li>Components</li>   <li>Modules</li>   <li>Templates</li>   <li>Plugins</li>   <li>Languages</li> </ul> <p>You can read more about the specifics of these using the links in the Article Index - a Table of Contents (yet another useful feature of Joomla!) - at the top right or by clicking on the <strong>Next </strong>link below.<br /> </p> <hr title=\"Components\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_com.png\" border=\"0\" alt=\"Component - Joomla! Extension Directory\" title=\"Component - Joomla! Extension Directory\" width=\"17\" height=\"17\" /> Components</h3> <p>A Component is the largest and most complex of the Extension types.  Components are like mini-applications that render the main body of the  page. An analogy that might make the relationship easier to understand  would be that Joomla! is a book and all the Components are chapters in  the book. The core Article Component (<font face=\"courier new,courier\">com_content</font>), for example, is the  mini-application that handles all core Article rendering just as the  core registration Component (<font face=\"courier new,courier\">com_user</font>) is the mini-application  that handles User registration.</p> <p>Many of Joomla!\'s core features are provided by the use of default Components such as:</p> <ul>   <li>Contacts</li>   <li>Front Page</li>   <li>News Feeds</li>   <li>Banners</li>   <li>Mass Mail</li>   <li>Polls</li></ul><p>A Component will manage data, set displays, provide functions, and in general can perform any operation that does not fall under the general functions of the core code.</p> <p>Components work hand in hand with Modules and Plugins to provide a rich variety of content display and functionality aside from the standard Article and content display. They make it possible to completely transform Joomla! and greatly expand its capabilities.</p>  <hr title=\"Modules\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_mod.png\" border=\"0\" alt=\"Module - Joomla! Extension Directory\" title=\"Module - Joomla! Extension Directory\" width=\"17\" height=\"17\" /> Modules</h3> <p>A more lightweight and flexible Extension used for page rendering is a Module. Modules are used for small bits of the page that are generally  less complex and able to be seen across different Components. To  continue in our book analogy, a Module can be looked at as a footnote  or header block, or perhaps an image/caption block that can be rendered  on a particular page. Obviously you can have a footnote on any page but  not all pages will have them. Footnotes also might appear regardless of  which chapter you are reading. Simlarly Modules can be rendered  regardless of which Component you have loaded.</p> <p>Modules are like little mini-applets that can be placed anywhere on your site. They work in conjunction with Components in some cases and in others are complete stand alone snippets of code used to display some data from the database such as Articles (Newsflash) Modules are usually used to output data but they can also be interactive form items to input data for example the Login Module or Polls.</p> <p>Modules can be assigned to Module positions which are defined in your Template and in the back-end using the Module Manager and editing the Module Position settings. For example, \"left\" and \"right\" are common for a 3 column layout. </p> <h4>Displaying Modules</h4> <p>Each Module is assigned to a Module position on your site. If you wish it to display in two different locations you must copy the Module and assign the copy to display at the new location. You can also set which Menu Items (and thus pages) a Module will display on, you can select all Menu Items or you can pick and choose by holding down the control key and selecting multiple locations one by one in the Modules [Edit] screen</p> <p>Note: Your Main Menu is a Module! When you create a new Menu in the Menu Manager you are actually copying the Main Menu Module (<font face=\"courier new,courier\">mod_mainmenu</font>) code and giving it the name of your new Menu. When you copy a Module you do not copy all of its parameters, you simply allow Joomla! to use the same code with two separate settings.</p> <h4>Newsflash Example</h4> <p>Newsflash is a Module which will display Articles from your site in an assignable Module position. It can be used and configured to display one Category, all Categories, or to randomly choose Articles to highlight to Users. It will display as much of an Article as you set, and will show a <em>Read more...</em> link to take the User to the full Article.</p> <p>The Newsflash Component is particularly useful for things like Site News or to show the latest Article added to your Web site.</p>  <hr title=\"Plugins\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_plugin.png\" border=\"0\" alt=\"Plugin - Joomla! Extension Directory\" title=\"Plugin - Joomla! Extension Directory\" width=\"17\" height=\"17\" /> Plugins</h3> <p>One  of the more advanced Extensions for Joomla! is the Plugin. In previous  versions of Joomla! Plugins were known as Mambots. Aside from changing their name their  functionality has been expanded. A Plugin is a section of code that  runs when a pre-defined event happens within Joomla!. Editors are Plugins, for example, that execute when the Joomla! event <font face=\"courier new,courier\">onGetEditorArea</font> occurs. Using a Plugin allows a developer to change  the way their code behaves depending upon which Plugins are installed  to react to an event.</p>  <hr title=\"Languages\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_lang.png\" border=\"0\" alt=\"Language - Joomla! Extensions Directory\" title=\"Language - Joomla! Extensions Directory\" width=\"17\" height=\"17\" /> Languages</h3> <p>New  to Joomla! 1.5 and perhaps the most basic and critical Extension is a Language. Joomla! is released with multiple Installation Languages but the base Site and Administrator are packaged in just the one Language <strong>en-GB</strong> - being English with GB spelling for example. To include all the translations currently available would bloat the core package and make it unmanageable for uploading purposes. The Language files enable all the User interfaces both Front-end and Back-end to be presented in the local preferred language. Note these packs do not have any impact on the actual content such as Articles. </p> <p>More information on languages is available from the <br />   <a href=\"http://community.joomla.org/translations.html\" target=\"_blank\" title=\"Joomla! Translation Teams\">http://community.joomla.org/translations.html</a></p>', '', '1', '4', '0', '29', '2008-08-11 06:00:00', '62', '', '2008-08-11 06:00:00', '62', '0', '0000-00-00 00:00:00', '2006-10-10 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '24', '0', '3', 'About Joomla!, General, Extensions', '', '0', '102', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('27', 'The Joomla! Community', 'the-joomla-community', '', '<p><strong>Got a question? </strong>With more than 210,000 members, the Joomla! Discussion Forums at <a href=\"http://forum.joomla.org/\" target=\"_blank\" title=\"Forums\">forum.joomla.org</a> are a great resource for both new and experienced users. Ask your toughest questions the community is waiting to see what you\'ll do with your Joomla! site.</p><p><strong>Do you want to show off your new Joomla! Web site?</strong> Visit the <a href=\"http://forum.joomla.org/viewforum.php?f=514\" target=\"_blank\" title=\"Site Showcase\">Site Showcase</a> section of our forum.</p><p><strong>Do you want to contribute?</strong></p><p>If you think working with Joomla is fun, wait until you start working on it. We\'re passionate about helping Joomla users become contributors. There are many ways you can help Joomla\'s development:</p><ul>	<li>Submit news about Joomla. We syndicate Joomla-related news on <a href=\"http://news.joomla.org\" target=\"_blank\" title=\"JoomlaConnect\">JoomlaConnect<sup>TM</sup></a>. If you have Joomla news that you would like to share with the community, find out how to get connected <a href=\"http://community.joomla.org/connect.html\" target=\"_blank\" title=\"JoomlaConnect\">here</a>.</li>	<li>Report bugs and request features in our <a href=\"http://joomlacode.org/gf/project/joomla/tracker/\" target=\"_blank\" title=\"Joomla! developement trackers\">trackers</a>. Please read <a href=\"http://docs.joomla.org/Filing_bugs_and_issues\" target=\"_blank\" title=\"Reporting Bugs\">Reporting Bugs</a>, for details on how we like our bug reports served up</li><li>Submit patches for new and/or fixed behaviour. Please read <a href=\"http://docs.joomla.org/Patch_submission_guidelines\" target=\"_blank\" title=\"Submitting Patches\">Submitting Patches</a>, for details on how to submit a patch.</li><li>Join the <a href=\"http://forum.joomla.org/viewforum.php?f=509\" target=\"_blank\" title=\"Joomla! development forums\">developer forums</a> and share your ideas for how to improve Joomla. We\'re always open to suggestions, although we\'re likely to be sceptical of large-scale suggestions without some code to back it up.</li><li>Join any of the <a href=\"http://www.joomla.org/about-joomla/the-project/working-groups.html\" target=\"_blank\" title=\"Joomla! working groups\">Joomla Working Groups</a> and bring your personal expertise to the Joomla community. </li></ul><p>These are just a few ways you can contribute. See <a href=\"http://www.joomla.org/about-joomla/contribute-to-joomla.html\" target=\"_blank\" title=\"Contribute\">Contribute to Joomla</a> for many more ways.</p>', '', '1', '4', '0', '30', '2008-08-12 16:50:48', '62', '', '2008-08-12 16:50:48', '62', '0', '0000-00-00 00:00:00', '2006-10-11 02:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '12', '0', '2', '', '', '0', '52', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('28', 'How do I install Joomla! 1.5?', 'how-do-i-install-joomla-15', '', '<p>Installing of Joomla! 1.5 is pretty easy. We assume you have set-up your Web site, and it is accessible with your browser.<br /><br />Download Joomla! 1.5, unzip it and upload/copy the files into the directory you Web site points to, fire up your browser and enter your Web site address and the installation will start.  </p><p>For full details on the installation processes check out the <a href=\"http://help.joomla.org/content/category/48/268/302\" target=\"_blank\" title=\"Joomla! 1.5 Installation Manual\">Installation Manual</a> on the <a href=\"http://help.joomla.org\" target=\"_blank\" title=\"Joomla! Help Site\">Joomla! Help Site</a> where you will also find download instructions for a PDF version too. </p>', '', '1', '3', '0', '31', '2008-08-11 01:10:59', '62', '', '2008-08-11 01:10:59', '62', '0', '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '5', '0', '3', '', '', '0', '5', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('29', 'What is the purpose of the collation selection in the installation screen?', 'what-is-the-purpose-of-the-collation-selection-in-the-installation-screen', '', 'The collation option determines the way ordering in the database is done. In languages that use special characters, for instance the German umlaut, the database collation determines the sorting order. If you don\'t know which collation you need, select the \"utf8_general_ci\" as most languages use this. The other collations listed are exceptions in regards to the general collation. If your language is not listed in the list of collations it most likely means that \"utf8_general_ci is suitable.', '', '1', '3', '0', '32', '2008-08-11 03:11:38', '62', '', '2008-08-11 03:11:38', '62', '0', '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', '4', '0', '4', '', '', '0', '6', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('30', 'What languages are supported by Joomla! 1.5?', 'what-languages-are-supported-by-joomla-15', '', 'Within the Installer you will find a wide collection of languages. The installer currently supports the following languages: Arabic, Bulgarian, Bengali, Czech, Danish, German, Greek, English, Spanish, Finnish, French, Hebrew, Devanagari(India), Croatian(Croatia), Magyar (Hungary), Italian, Malay, Norwegian bokmal, Dutch, Portuguese(Brasil), Portugues(Portugal), Romanian, Russian, Serbian, Svenska, Thai and more are being added all the time.<br />By default the English language is installed for the Back and Front-ends. You can download additional language files from the <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"Joomla! Extensions Directory\">Joomla!Extensions Directory</a>. ', '', '1', '3', '0', '32', '2008-08-11 01:12:18', '62', '', '2008-08-11 01:12:18', '62', '0', '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '5', '0', '2', '', '', '0', '8', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('31', 'Is it useful to install the sample data?', 'is-it-useful-to-install-the-sample-data', '', 'Well you are reading it right now! This depends on what you want to achieve. If you are new to Joomla! and have no clue how it all fits together, just install the sample data. If you don\'t like the English sample data because you - for instance - speak Chinese, then leave it out.', '', '1', '3', '0', '27', '2008-08-11 09:12:55', '62', '', '2008-08-11 09:12:55', '62', '0', '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '3', '', '', '0', '3', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('32', 'Where is the Static Content Item?', 'where-is-the-static-content', '', '<p>In Joomla! versions prior to 1.5 there were separate processes for creating a Static Content Item and normal Content Items. The processes have been combined now and whilst both content types are still around they are renamed as Articles for Content Items and Uncategorized Articles for Static Content Items. </p><p>If you want to create a static item, create a new Article in the same way as for standard content and rather than relating this to a particular Section and Category just select <span style=\"font-style: italic\">Uncategorized</span> as the option in the Section and Category drop down lists.</p>', '', '1', '3', '0', '28', '2008-08-10 23:13:33', '62', '', '2008-08-10 23:13:33', '62', '0', '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '6', '', '', '0', '5', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('33', 'What is an Uncategorised Article?', 'what-is-uncategorised-article', '', 'Most Articles will be assigned to a Section and Category. In many cases, you might not know where you want it to appear so put the Article in the <em>Uncategorized </em>Section/Category. The Articles marked as <em>Uncategorized </em>are handled as static content.', '', '1', '3', '0', '31', '2008-08-11 15:14:11', '62', '', '2008-08-11 15:14:11', '62', '0', '0000-00-00 00:00:00', '2006-10-10 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '8', '0', '2', '', '', '0', '6', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('34', 'Does the PDF icon render pictures and special characters?', 'does-the-pdf-icon-render-pictures-and-special-characters', '', 'Yes! Prior to Joomla! 1.5, only the text values of an Article and only for ISO-8859-1 encoding was allowed in the PDF rendition. With the new PDF library in place, the complete Article including images is rendered and applied to the PDF. The PDF generator also handles the UTF-8 texts and can handle any character sets from any language. The appropriate fonts must be installed but this is done automatically during a language pack installation.', '', '1', '3', '0', '32', '2008-08-11 17:14:57', '62', '', '2008-08-11 17:14:57', '62', '0', '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '3', '', '', '0', '6', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('35', 'Is it possible to change A Menu Item\'s Type?', 'is-it-possible-to-change-the-types-of-menu-entries', '', '<p>You indeed can change the Menu Item\'s Type to whatever you want, even after they have been created. </p><p>If, for instance, you want to change the Blog Section of a Menu link, go to the Control Panel-&gt;Menus Menu-&gt;[menuname]-&gt;Menu Item Manager and edit the Menu Item. Select the <strong>Change Type</strong> button and choose the new style of Menu Item Type from the available list. Thereafter, alter the Details and Parameters to reconfigure the display for the new selection  as you require it.</p>', '', '1', '3', '0', '31', '2008-08-10 23:15:36', '62', '', '2008-08-10 23:15:36', '62', '0', '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '1', '', '', '0', '18', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('36', 'Where did the Installers go?', 'where-did-the-installer-go', '', 'The improved Installer can be found under the Extensions Menu. With versions prior to Joomla! 1.5 you needed to select a specific Extension type when you wanted to install it and use the Installer associated with it, with Joomla! 1.5 you just select the Extension you want to upload, and click on install. The Installer will do all the hard work for you.', '', '1', '3', '0', '28', '2008-08-10 23:16:20', '62', '', '2008-08-10 23:16:20', '62', '0', '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '1', '', '', '0', '4', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('37', 'Where did the Mambots go?', 'where-did-the-mambots-go', '', '<p>Mambots have been renamed as Plugins. </p><p>Mambots were introduced in Mambo and offered possibilities to add plug-in logic to your site mainly for the purpose of manipulating content. In Joomla! 1.5, Plugins will now have much broader capabilities than Mambots. Plugins are able to extend functionality at the framework layer as well.</p>', '', '1', '3', '0', '28', '2008-08-11 09:17:00', '62', '', '2008-08-11 09:17:00', '62', '0', '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '5', '', '', '0', '4', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('38', 'I installed with my own language, but the Back-end is still in English', 'i-installed-with-my-own-language-but-the-back-end-is-still-in-english', '', '<p>A lot of different languages are available for the Back-end, but by default this language may not be installed. If you want a translated Back-end, get your language pack and install it using the Extension Installer. After this, go to the Extensions Menu, select Language Manager and make your language the default one. Your Back-end will be translated immediately.</p><p>Users who have access rights to the Back-end may choose the language they prefer in their Personal Details parameters. This is of also true for the Front-end language.</p><p> A good place to find where to download your languages and localised versions of Joomla! is <a href=\"http://extensions.joomla.org/index.php?option=com_mtree&task=listcats&cat_id=1837&Itemid=35\" target=\"_blank\" title=\"Translations for Joomla!\">Translations for Joomla!</a> on JED.</p>', '', '1', '3', '0', '32', '2008-08-11 17:18:14', '62', '', '2008-08-11 17:18:14', '62', '0', '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '1', '', '', '0', '7', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('39', 'How do I remove an Article?', 'how-do-i-remove-an-article', '', '<p>To completely remove an Article, select the Articles that you want to delete and move them to the Trash. Next, open the Article Trash in the Content Menu and select the Articles you want to delete. After deleting an Article, it is no longer available as it has been deleted from the database and it is not possible to undo this operation.  </p>', '', '1', '3', '0', '27', '2008-08-11 09:19:01', '62', '', '2008-08-11 09:19:01', '62', '0', '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '6', '0', '2', '', '', '0', '4', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('40', 'What is the difference between Archiving and Trashing an Article? ', 'what-is-the-difference-between-archiving-and-trashing-an-article', '', '<p>When you <em>Archive </em>an Article, the content is put into a state which removes it from your site as published content. The Article is still available from within the Control Panel and can be <em>retrieved </em>for editing or republishing purposes. Trashed Articles are just one step from being permanently deleted but are still available until you Remove them from the Trash Manager. You should use Archive if you consider an Article important, but not current. Trash should be used when you want to delete the content entirely from your site and from future search results.  </p>', '', '1', '3', '0', '27', '2008-08-11 05:19:43', '62', '', '2008-08-11 05:19:43', '62', '0', '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '8', '0', '1', '', '', '0', '5', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('41', 'Newsflash 5', 'newsflash-5', '', 'Joomla! 1.5 - \'Experience the Freedom\'!. It has never been easier to create your own dynamic Web site. Manage all your content from the best CMS admin interface and in virtually any language you speak.', '', '1', '1', '0', '3', '2008-08-12 00:17:31', '62', '', '2008-08-12 00:17:31', '62', '0', '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '5', '0', '2', '', '', '0', '4', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('42', 'Newsflash 4', 'newsflash-4', '', 'Yesterday all servers in the U.S. went out on strike in a bid to get more RAM and better CPUs. A spokes person said that the need for better RAM was due to some fool increasing the front-side bus speed. In future, buses will be told to slow down in residential motherboards.', '', '1', '1', '0', '3', '2008-08-12 00:25:50', '62', '', '2008-08-12 00:25:50', '62', '0', '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '5', '0', '1', '', '', '0', '5', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('43', 'Example Pages and Menu Links', 'example-pages-and-menu-links', '', '<p>This page is an example of content that is <em>Uncategorized</em>; that is, it does not belong to any Section or Category. You will see there is a new Menu in the left column. It shows links to the same content presented in 4 different page layouts.</p><ul><li>Section Blog</li><li>Section Table</li><li> Blog Category</li><li>Category Table</li></ul><p>Follow the links in the <strong>Example Pages</strong> Menu to see some of the options available to you to present all the different types of content included within the default installation of Joomla!.</p><p>This includes Components and individual Articles. These links or Menu Item Types (to give them their proper name) are all controlled from within the <strong><font face=\"courier new,courier\">Menu Manager-&gt;[menuname]-&gt;Menu Items Manager</font></strong>. </p>', '', '1', '0', '0', '0', '2008-08-12 09:26:52', '62', '', '2008-08-12 09:26:52', '62', '0', '0000-00-00 00:00:00', '2006-10-11 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '7', '0', '1', 'Uncategorized, Uncategorized, Example Pages and Menu Links', '', '0', '43', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('44', 'Joomla! Security Strike Team', 'joomla-security-strike-team', '', '<p>The Joomla! Project has assembled a top-notch team of experts to form the new Joomla! Security Strike Team. This new team will solely focus on investigating and resolving security issues. Instead of working in relative secrecy, the JSST will have a strong public-facing presence at the <a href=\"http://developer.joomla.org/security.html\" target=\"_blank\" title=\"Joomla! Security Center\">Joomla! Security Center</a>.</p>', '<p>The new JSST will call the new <a href=\"http://developer.joomla.org/security.html\" target=\"_blank\" title=\"Joomla! Security Center\">Joomla! Security Center</a> their home base. The Security Center provides a public presence for <a href=\"http://developer.joomla.org/security/news.html\" target=\"_blank\" title=\"Joomla! Security News\">security issues</a> and a platform for the JSST to <a href=\"http://developer.joomla.org/security/articles-tutorials.html\" target=\"_blank\" title=\"Joomla! Security Articles\">help the general public better understand security</a> and how it relates to Joomla!. The Security Center also offers users a clearer understanding of how security issues are handled. There\'s also a <a href=\"http://feeds.joomla.org/JoomlaSecurityNews\" target=\"_blank\" title=\"Joomla! Security News Feed\">news feed</a>, which provides subscribers an up-to-the-minute notification of security issues as they arise.</p>', '1', '1', '0', '1', '2007-07-07 09:54:06', '62', '', '2007-07-07 09:54:06', '62', '0', '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '1', '0', '4', '', '', '0', '0', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('45', 'Joomla! Community Portal', 'joomla-community-portal', '', '<p>The <a href=\"http://community.joomla.org/\" target=\"_blank\" title=\"Joomla! Community Portal\">Joomla! Community Portal</a> is now online. There, you will find a constant source of information about the activities of contributors powering the Joomla! Project. Learn about <a href=\"http://community.joomla.org/events.html\" target=\"_blank\" title=\"Joomla! Events\">Joomla! Events</a> worldwide, and see if there is a <a href=\"http://community.joomla.org/user-groups.html\" target=\"_blank\" title=\"Joomla! User Groups\">Joomla! User Group</a> nearby.</p><p>The <a href=\"http://magazine.joomla.org/\" target=\"_blank\" title=\"Joomla! Community Magazine\">Joomla! Community Magazine</a> promises an interesting overview of feature articles, community accomplishments, learning topics, and project updates each month. Also, check out <a href=\"http://community.joomla.org/connect.html\" target=\"_blank\" title=\"JoomlaConnect\">JoomlaConnect&#0153;</a>. This aggregated RSS feed brings together Joomla! news from all over the world in your language. Get the latest and greatest by clicking <a href=\"http://community.joomla.org/connect.html\" target=\"_blank\" title=\"JoomlaConnect\">here</a>.</p>', '', '1', '1', '0', '1', '2007-07-07 09:54:06', '62', '', '2007-07-07 09:54:06', '62', '0', '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '2', '0', '3', '', '', '0', '5', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('46', 'Tin Tức Khuyến Mãi', 'khuyenmai', '', '<p>Các chương tình khuyến mãi lỡn</p>', '', '1', '1', '0', '1', '2011-09-19 08:53:47', '62', '', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '2011-09-19 08:53:47', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '1', '0', '1', '', '', '0', '1', 'robots=\nauthor=');
INSERT INTO `jos_content` VALUES ('47', 'Cho Thuê Xe', 'thuexe', '', '<p>Dịch vụ cho thuê xe 7 chỗ</p>', '', '1', '6', '0', '39', '2011-09-20 01:58:22', '62', '', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '2011-09-20 01:58:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', '1', '0', '2', '', '', '0', '0', 'robots=\nauthor=');
INSERT INTO `jos_content_frontpage` VALUES ('45', '1');
INSERT INTO `jos_content_frontpage` VALUES ('6', '2');
INSERT INTO `jos_content_frontpage` VALUES ('44', '3');
INSERT INTO `jos_content_frontpage` VALUES ('5', '4');
INSERT INTO `jos_content_frontpage` VALUES ('9', '5');
INSERT INTO `jos_content_frontpage` VALUES ('30', '6');
INSERT INTO `jos_content_frontpage` VALUES ('16', '7');
INSERT INTO `jos_core_acl_aro` VALUES ('10', 'users', '62', '0', 'Administrator', '0');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('17', '0', 'ROOT', '1', '22', 'ROOT');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('28', '17', 'USERS', '2', '21', 'USERS');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('29', '28', 'Public Frontend', '3', '12', 'Public Frontend');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('18', '29', 'Registered', '4', '11', 'Registered');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('19', '18', 'Author', '5', '10', 'Author');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('20', '19', 'Editor', '6', '9', 'Editor');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('21', '20', 'Publisher', '7', '8', 'Publisher');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('30', '28', 'Public Backend', '13', '20', 'Public Backend');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('23', '30', 'Manager', '14', '19', 'Manager');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('24', '23', 'Administrator', '15', '18', 'Administrator');
INSERT INTO `jos_core_acl_aro_groups` VALUES ('25', '24', 'Super Administrator', '16', '17', 'Super Administrator');
INSERT INTO `jos_core_acl_aro_sections` VALUES ('10', 'users', '1', 'Users', '0');
INSERT INTO `jos_core_acl_groups_aro_map` VALUES ('25', '', '10');
INSERT INTO `jos_groups` VALUES ('0', 'Public');
INSERT INTO `jos_groups` VALUES ('1', 'Registered');
INSERT INTO `jos_groups` VALUES ('2', 'Special');
INSERT INTO `jos_menu` VALUES ('1', 'mainmenu', 'Trang Chủ', 'home', 'index.php?option=com_virtuemart', 'component', '1', '0', '34', '0', '7', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'product_id=\ncategory_id=\nflypage=\npage=\npage_title=Văn Phòng Phẩm Đức Mạnh\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '1');
INSERT INTO `jos_menu` VALUES ('2', 'mainmenu', 'Joomla! License', 'joomla-license', 'index.php?option=com_content&view=article&id=5', 'component', '-2', '0', '20', '0', '1', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('41', 'mainmenu', 'FAQ', 'faq', 'index.php?option=com_content&view=section&id=3', 'component', '-2', '0', '20', '0', '2', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_page_title=1\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('11', 'othermenu', 'Joomla! Home', 'joomla-home', 'http://www.joomla.org', 'url', '1', '0', '0', '0', '1', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'menu_image=-1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('12', 'othermenu', 'Joomla! Forums', 'joomla-forums', 'http://forum.joomla.org', 'url', '1', '0', '0', '0', '2', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'menu_image=-1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('13', 'othermenu', 'Joomla! Documentation', 'joomla-documentation', 'http://docs.joomla.org', 'url', '1', '0', '0', '0', '3', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'menu_image=-1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('14', 'othermenu', 'Joomla! Community', 'joomla-community', 'http://community.joomla.org', 'url', '1', '0', '0', '0', '4', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'menu_image=-1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('15', 'othermenu', 'Joomla! Magazine', 'joomla-community-magazine', 'http://magazine.joomla.org/', 'url', '1', '0', '0', '0', '5', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'menu_image=-1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('16', 'othermenu', 'OSM Home', 'osm-home', 'http://www.opensourcematters.org', 'url', '1', '0', '0', '0', '6', '0', '0000-00-00 00:00:00', '0', '0', '0', '6', 'menu_image=-1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('17', 'othermenu', 'Administrator', 'administrator', 'administrator/', 'url', '1', '0', '0', '0', '7', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'menu_image=-1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('18', 'topmenu', 'News', 'news', 'index.php?option=com_newsfeeds&view=newsfeed&id=1&feedid=1', 'component', '1', '0', '11', '0', '3', '0', '0000-00-00 00:00:00', '0', '0', '0', '3', 'show_page_title=1\npage_title=News\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('20', 'usermenu', 'Your Details', 'your-details', 'index.php?option=com_user&view=user&task=edit', 'component', '1', '0', '14', '0', '1', '0', '0000-00-00 00:00:00', '0', '0', '1', '3', '', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('24', 'usermenu', 'Logout', 'logout', 'index.php?option=com_user&view=login', 'component', '1', '0', '14', '0', '4', '0', '0000-00-00 00:00:00', '0', '0', '1', '3', '', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('38', 'keyconcepts', 'Content Layouts', 'content-layouts', 'index.php?option=com_content&view=article&id=24', 'component', '1', '0', '20', '0', '2', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('27', 'mainmenu', 'Tin Tức', 'joomla-overview', 'index.php?option=com_content&view=article&id=19', 'component', '1', '0', '20', '0', '9', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('28', 'topmenu', 'About Joomla!', 'about-joomla', 'index.php?option=com_content&view=article&id=25', 'component', '1', '0', '20', '0', '1', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('29', 'topmenu', 'Features', 'features', 'index.php?option=com_content&view=article&id=22', 'component', '1', '0', '20', '0', '2', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('30', 'topmenu', 'The Community', 'the-community', 'index.php?option=com_content&view=article&id=27', 'component', '1', '0', '20', '0', '4', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('34', 'mainmenu', 'What\'s New in 1.5?', 'what-is-new-in-1-5', 'index.php?option=com_content&view=article&id=22', 'component', '-2', '0', '20', '1', '4', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('40', 'keyconcepts', 'Extensions', 'extensions', 'index.php?option=com_content&view=article&id=26', 'component', '1', '0', '20', '0', '1', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('37', 'mainmenu', 'Giới Thiệu', 'gioithieu', 'index.php?option=com_content&view=article&id=1', 'component', '1', '0', '20', '0', '8', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('43', 'keyconcepts', 'Example Pages', 'example-pages', 'index.php?option=com_content&view=article&id=43', 'component', '1', '0', '20', '0', '3', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('44', 'ExamplePages', 'Section Blog', 'section-blog', 'index.php?option=com_content&view=section&layout=blog&id=3', 'component', '1', '0', '20', '0', '1', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('45', 'ExamplePages', 'Section Table', 'section-table', 'index.php?option=com_content&view=section&id=3', 'component', '1', '0', '20', '0', '2', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('46', 'ExamplePages', 'Category Blog', 'categoryblog', 'index.php?option=com_content&view=category&layout=blog&id=31', 'component', '1', '0', '20', '0', '3', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('47', 'ExamplePages', 'Category Table', 'category-table', 'index.php?option=com_content&view=category&id=32', 'component', '1', '0', '20', '0', '4', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('48', 'mainmenu', 'Web Links', 'web-links', 'index.php?option=com_weblinks&view=categories', 'component', '-2', '0', '4', '0', '6', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'page_title=Weblinks\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('49', 'mainmenu', 'News Feeds', 'news-feeds', 'index.php?option=com_newsfeeds&view=categories', 'component', '-2', '0', '11', '0', '5', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_page_title=1\npage_title=Newsfeeds\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('50', 'mainmenu', 'The News', 'the-news', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', '-2', '0', '20', '0', '3', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_page_title=1\npage_title=The News\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('51', 'usermenu', 'Submit an Article', 'submit-an-article', 'index.php?option=com_content&view=article&layout=form', 'component', '1', '0', '20', '0', '2', '0', '0000-00-00 00:00:00', '0', '0', '2', '0', '', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('52', 'usermenu', 'Submit a Web Link', 'submit-a-web-link', 'index.php?option=com_weblinks&view=weblink&layout=form', 'component', '1', '0', '4', '0', '3', '0', '0000-00-00 00:00:00', '0', '0', '2', '0', '', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('53', 'mainmenu', 'Khuyến Mãi', 'khuyenmai', 'index.php?option=com_content&view=article&id=46', 'component', '1', '27', '20', '1', '4', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('54', 'mainmenu', 'Liên Hệ', 'lienhe', 'index.php?option=com_content&view=article&id=20', 'component', '1', '0', '20', '0', '11', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('55', 'mainmenu', 'Kinh Tế', 'kinhte', 'index.php?option=com_content&view=category&id=36', 'component', '1', '27', '20', '1', '2', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'display_num=10\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('56', 'mainmenu', 'Xã Hội', 'xahoi', 'index.php?option=com_content&view=category&id=37', 'component', '1', '27', '20', '1', '3', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'display_num=10\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('57', 'mainmenu', 'Văn Phòng Phẩm', 'vpp', 'index.php?option=com_content&view=category&id=38', 'component', '1', '27', '20', '1', '5', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'display_num=10\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('58', 'mainmenu', 'Dịch Vụ', 'dichvu', 'index.php?option=com_content&view=category&id=39', 'component', '1', '0', '20', '0', '10', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'display_num=10\nshow_headings=0\nshow_date=0\ndate_format=\nfilter=0\nfilter_type=title\norderby_sec=\nshow_pagination=0\nshow_pagination_limit=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('59', 'mainmenu', 'Cho Thuê Xe', 'chothuexe', 'index.php?option=com_content&view=article&id=47', 'component', '1', '58', '20', '1', '1', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu` VALUES ('60', 'mainmenu', 'Giao Hàng Tận Nơi', 'dvgiaohang', 'index.php?option=com_content&view=article&id=48', 'component', '1', '58', '20', '1', '2', '0', '0000-00-00 00:00:00', '0', '0', '0', '0', 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', '0', '0', '0');
INSERT INTO `jos_menu_types` VALUES ('1', 'mainmenu', 'Main Menu', 'The main menu for the site');
INSERT INTO `jos_menu_types` VALUES ('2', 'usermenu', 'User Menu', 'A Menu for logged in Users');
INSERT INTO `jos_menu_types` VALUES ('3', 'topmenu', 'Top Menu', 'Top level navigation');
INSERT INTO `jos_menu_types` VALUES ('4', 'othermenu', 'Resources', 'Additional links');
INSERT INTO `jos_menu_types` VALUES ('5', 'ExamplePages', 'Example Pages', 'Example Pages');
INSERT INTO `jos_menu_types` VALUES ('6', 'keyconcepts', 'Key Concepts', 'This describes some critical information for new Users.');
INSERT INTO `jos_modules` VALUES ('1', 'Main Menu', '', '0', 'left', '0', '0000-00-00 00:00:00', '0', 'mod_mainmenu', '0', '0', '1', 'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('2', 'Login', '', '1', 'login', '0', '0000-00-00 00:00:00', '1', 'mod_login', '0', '0', '1', '', '1', '1', '');
INSERT INTO `jos_modules` VALUES ('3', 'Popular', '', '3', 'cpanel', '0', '0000-00-00 00:00:00', '1', 'mod_popular', '0', '2', '1', '', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('4', 'Recent added Articles', '', '4', 'cpanel', '0', '0000-00-00 00:00:00', '1', 'mod_latest', '0', '2', '1', 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('5', 'Menu Stats', '', '5', 'cpanel', '0', '0000-00-00 00:00:00', '1', 'mod_stats', '0', '2', '1', '', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('6', 'Unread Messages', '', '1', 'header', '0', '0000-00-00 00:00:00', '1', 'mod_unread', '0', '2', '1', '', '1', '1', '');
INSERT INTO `jos_modules` VALUES ('7', 'Online Users', '', '2', 'header', '0', '0000-00-00 00:00:00', '1', 'mod_online', '0', '2', '1', '', '1', '1', '');
INSERT INTO `jos_modules` VALUES ('8', 'Toolbar', '', '1', 'toolbar', '0', '0000-00-00 00:00:00', '1', 'mod_toolbar', '0', '2', '1', '', '1', '1', '');
INSERT INTO `jos_modules` VALUES ('9', 'Quick Icons', '', '1', 'icon', '0', '0000-00-00 00:00:00', '1', 'mod_quickicon', '0', '2', '1', '', '1', '1', '');
INSERT INTO `jos_modules` VALUES ('10', 'Logged in Users', '', '2', 'cpanel', '0', '0000-00-00 00:00:00', '1', 'mod_logged', '0', '2', '1', '', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('11', 'Footer', '', '0', 'footer', '0', '0000-00-00 00:00:00', '1', 'mod_footer', '0', '0', '1', '', '1', '1', '');
INSERT INTO `jos_modules` VALUES ('12', 'Admin Menu', '', '1', 'menu', '0', '0000-00-00 00:00:00', '1', 'mod_menu', '0', '2', '1', '', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('13', 'Admin SubMenu', '', '1', 'submenu', '0', '0000-00-00 00:00:00', '1', 'mod_submenu', '0', '2', '1', '', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('14', 'User Status', '', '1', 'status', '0', '0000-00-00 00:00:00', '1', 'mod_status', '0', '2', '1', '', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('15', 'Title', '', '1', 'title', '0', '0000-00-00 00:00:00', '1', 'mod_title', '0', '2', '1', '', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('16', 'Polls', '', '1', 'right', '0', '0000-00-00 00:00:00', '0', 'mod_poll', '0', '0', '1', 'id=14\ncache=1', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('17', 'User Menu', '', '4', 'left', '0', '0000-00-00 00:00:00', '1', 'mod_mainmenu', '0', '1', '1', 'menutype=usermenu\nmoduleclass_sfx=_menu\ncache=1', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('18', 'Login Form', '', '8', 'left', '0', '0000-00-00 00:00:00', '1', 'mod_login', '0', '0', '1', 'greeting=1\nname=0', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('19', 'Latest News', '', '4', 'user1', '0', '0000-00-00 00:00:00', '0', 'mod_latestnews', '0', '0', '1', 'cache=1', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('20', 'Statistics', '', '6', 'left', '0', '0000-00-00 00:00:00', '0', 'mod_stats', '0', '0', '1', 'serverinfo=1\nsiteinfo=1\ncounter=1\nincrease=0\nmoduleclass_sfx=', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('21', 'Who\'s Online', '', '1', 'right', '0', '0000-00-00 00:00:00', '0', 'mod_whosonline', '0', '0', '1', 'online=1\nusers=1\nmoduleclass_sfx=', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('22', 'Popular', '', '6', 'user2', '0', '0000-00-00 00:00:00', '0', 'mod_mostread', '0', '0', '1', 'cache=1', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('23', 'Archive', '', '9', 'left', '0', '0000-00-00 00:00:00', '0', 'mod_archive', '0', '0', '1', 'cache=1', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('24', 'Sections', '', '10', 'left', '0', '0000-00-00 00:00:00', '0', 'mod_sections', '0', '0', '1', 'cache=1', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('25', 'Newsflash', '', '1', 'top', '0', '0000-00-00 00:00:00', '1', 'mod_newsflash', '0', '0', '1', 'catid=3\r\nstyle=random\r\nitems=\r\nmoduleclass_sfx=', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('26', 'Related Items', '', '11', 'left', '0', '0000-00-00 00:00:00', '0', 'mod_related_items', '0', '0', '1', '', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('27', 'Search', '', '1', 'user4', '0', '0000-00-00 00:00:00', '0', 'mod_search', '0', '0', '0', 'cache=1', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('28', 'Random Image', '', '9', 'right', '0', '0000-00-00 00:00:00', '1', 'mod_random_image', '0', '0', '1', '', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('29', 'Top Menu', '', '1', 'user3', '0', '0000-00-00 00:00:00', '0', 'mod_mainmenu', '0', '0', '0', 'cache=1\nmenutype=topmenu\nmenu_style=list_flat\nmenu_images=n\nmenu_images_align=left\nexpand_menu=n\nclass_sfx=-nav\nmoduleclass_sfx=\nindent_image1=0\nindent_image2=0\nindent_image3=0\nindent_image4=0\nindent_image5=0\nindent_image6=0', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('30', 'Banners', '', '1', 'footer', '0', '0000-00-00 00:00:00', '1', 'mod_banners', '0', '0', '0', 'target=1\ncount=1\ncid=1\ncatid=33\ntag_search=0\nordering=random\nheader_text=\nfooter_text=\nmoduleclass_sfx=\ncache=1\ncache_time=15\n\n', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('31', 'Resources', '', '2', 'left', '0', '0000-00-00 00:00:00', '1', 'mod_mainmenu', '0', '0', '1', 'menutype=othermenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('32', 'Wrapper', '', '12', 'left', '0', '0000-00-00 00:00:00', '0', 'mod_wrapper', '0', '0', '1', '', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('33', 'Footer', '', '2', 'footer', '0', '0000-00-00 00:00:00', '1', 'mod_footer', '0', '0', '0', 'cache=1\n\n', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('34', 'Feed Display', '', '13', 'left', '0', '0000-00-00 00:00:00', '0', 'mod_feed', '0', '0', '1', '', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('35', 'Breadcrumbs', '', '1', 'breadcrumb', '0', '0000-00-00 00:00:00', '1', 'mod_breadcrumbs', '0', '0', '1', 'moduleclass_sfx=\ncache=0\nshowHome=1\nhomeText=Home\nshowComponent=1\nseparator=\n\n', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('36', 'Syndication', '', '3', 'syndicate', '0', '0000-00-00 00:00:00', '1', 'mod_syndicate', '0', '0', '0', '', '1', '0', '');
INSERT INTO `jos_modules` VALUES ('38', 'Advertisement', '', '3', 'right', '0', '0000-00-00 00:00:00', '0', 'mod_banners', '0', '0', '1', 'count=4\r\nrandomise=0\r\ncid=0\r\ncatid=14\r\nheader_text=Featured Links:\r\nfooter_text=<a href=\"http://www.joomla.org\">Ads by Joomla!</a>\r\nmoduleclass_sfx=_text\r\ncache=0\r\n\r\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('39', 'Example Pages', '', '5', 'left', '0', '0000-00-00 00:00:00', '1', 'mod_mainmenu', '0', '0', '1', 'cache=1\nclass_sfx=\nmoduleclass_sfx=_menu\nmenutype=ExamplePages\nmenu_style=list_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\nwindow_open=\n\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('40', 'Key Concepts', '', '3', 'left', '0', '0000-00-00 00:00:00', '1', 'mod_mainmenu', '0', '0', '1', 'cache=1\nclass_sfx=\nmoduleclass_sfx=_menu\nmenutype=keyconcepts\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\nwindow_open=\n\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('41', 'Welcome to Joomla!', '<div style=\"padding: 5px\">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href=\"http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews\" target=\"_blank\">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href=\"http://www.joomla.org/download.html\" target=\"_blank\">latest Joomla! release;</a> and (3) a <a href=\"http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup\" target=\"_blank\" title=\"good Web host\">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href=\"http://docs.joomla.org/Category:Security_Checklist\" target=\"_blank\" title=\"Joomla! Security Checklist\">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href=\"http://developer.joomla.org/security/contact-the-team.html\" target=\"_blank\" title=\"Joomla! Security Task Force\">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   \"<a href=\"http://docs.joomla.org/beginners\" target=\"_blank\">Absolute Beginner\'s   Guide to Joomla!.</a>\" There, you will find a Quick Start to Joomla!   <a href=\"http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf\" target=\"_blank\">guide</a>   and <a href=\"http://help.joomla.org/ghop/feb2008/task167/index.html\" target=\"_blank\">video</a>,   amongst many other tutorials. The   <a href=\"http://community.joomla.org/magazine/view-all-issues.html\" target=\"_blank\">Joomla!   Community Magazine</a> also has   <a href=\"http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html\" target=\"_blank\">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href=\"http://docs.joomla.org/Category:FAQ\" target=\"_blank\">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href=\"http://forum.joomla.org/\" target=\"_blank\">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name=\"twjs\" title=\"twjs\"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href=\"http://www.joomla.org/about-joomla/contribute-to-joomla.html\" target=\"_blank\">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>', '0', 'cpanel', '0', '0000-00-00 00:00:00', '1', 'mod_custom', '0', '2', '1', 'moduleclass_sfx=\n\n', '1', '1', '');
INSERT INTO `jos_modules` VALUES ('42', 'Joomla! Security Newsfeed', '', '6', 'cpanel', '62', '2008-10-25 20:15:17', '1', 'mod_feed', '0', '0', '1', 'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n', '0', '1', '');
INSERT INTO `jos_modules` VALUES ('43', 'VirtueMart Featured Products', '', '0', 'vm-fp', '0', '0000-00-00 00:00:00', '0', 'mod_virtuemart_featureprod', '0', '0', '1', 'max_items=2\nshow_price=1\nshow_addtocart=1\ndisplay_style=horizontal\nproducts_per_row=4\ncategory_id=\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('44', 'VirtueMart Currency Selector', '', '3', 'right', '0', '0000-00-00 00:00:00', '0', 'mod_virtuemart_currencies', '0', '0', '1', 'text_before=\nproduct_currency=USD,VND,\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('45', 'Sản phẩm mới', '', '0', 'ja-slider', '0', '0000-00-00 00:00:00', '1', 'mod_virtuemart_latestprod', '0', '0', '1', 'max_items=8\nshow_price=1\nshow_addtocart=1\ndisplay_style=table\nproducts_per_row=4\ncategory_id=\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('46', 'Văn Phòng Phẩm', '', '0', 'left', '0', '0000-00-00 00:00:00', '1', 'mod_virtuemart', '0', '0', '1', 'class_sfx=\nmoduleclass_sfx=\npretext=\nshow_login_form=no\nremember_me_default=1\nshow_categories=yes\nshow_listall=yes\nshow_adminlink=yes\nshow_accountlink=yes\nuseGreyBox_accountlink=0\nshow_minicart=yes\nuseGreyBox_cartlink=0\nshow_productsearch=yes\nshow_product_parameter_search=no\nmenutype=links\njscook_type=menu\njscookMenu_style=ThemeOffice\nmenu_orientation=hbr\njscookTree_style=ThemeXP\nroot_label=Shop\n\n', '0', '0', '');
INSERT INTO `jos_modules` VALUES ('47', 'VirtueMart Product Scroller', '', '0', 'ja-slideshow', '0', '0000-00-00 00:00:00', '1', 'mod_productscroller', '0', '0', '0', 'pretext=\nNumberOfProducts=5\nfeaturedProducts=no\nScrollSortMethod=random\nshow_product_name=no\nshow_addtocart=no\nshow_price=yes\nScrollHeight=125\nScrollWidth=150\nScrollBehavior=slide\nScrollDirection=right\nScrollAmount=1\nScrollDelay=80\nScrollAlign=left\nScrollSpaceChar=�\nScrollSpaceCharTimes=5\nScrollLineChar=<br />\nScrollLineCharTimes=2\nScrollCSSOverride=no\nScrollTextAlign=left\nScrollTextWeight=normal\nScrollTextSize=10\nScrollTextColor=#000000\nScrollBGColor=transparent\nScrollMargin=2\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', '0', '0', '');
INSERT INTO `jos_modules_menu` VALUES ('1', '0');
INSERT INTO `jos_modules_menu` VALUES ('16', '1');
INSERT INTO `jos_modules_menu` VALUES ('17', '0');
INSERT INTO `jos_modules_menu` VALUES ('18', '1');
INSERT INTO `jos_modules_menu` VALUES ('19', '1');
INSERT INTO `jos_modules_menu` VALUES ('19', '2');
INSERT INTO `jos_modules_menu` VALUES ('19', '4');
INSERT INTO `jos_modules_menu` VALUES ('19', '27');
INSERT INTO `jos_modules_menu` VALUES ('19', '36');
INSERT INTO `jos_modules_menu` VALUES ('21', '1');
INSERT INTO `jos_modules_menu` VALUES ('22', '1');
INSERT INTO `jos_modules_menu` VALUES ('22', '2');
INSERT INTO `jos_modules_menu` VALUES ('22', '4');
INSERT INTO `jos_modules_menu` VALUES ('22', '27');
INSERT INTO `jos_modules_menu` VALUES ('22', '36');
INSERT INTO `jos_modules_menu` VALUES ('25', '0');
INSERT INTO `jos_modules_menu` VALUES ('27', '0');
INSERT INTO `jos_modules_menu` VALUES ('29', '0');
INSERT INTO `jos_modules_menu` VALUES ('30', '0');
INSERT INTO `jos_modules_menu` VALUES ('31', '1');
INSERT INTO `jos_modules_menu` VALUES ('32', '0');
INSERT INTO `jos_modules_menu` VALUES ('33', '0');
INSERT INTO `jos_modules_menu` VALUES ('34', '0');
INSERT INTO `jos_modules_menu` VALUES ('35', '0');
INSERT INTO `jos_modules_menu` VALUES ('36', '0');
INSERT INTO `jos_modules_menu` VALUES ('38', '1');
INSERT INTO `jos_modules_menu` VALUES ('39', '43');
INSERT INTO `jos_modules_menu` VALUES ('39', '44');
INSERT INTO `jos_modules_menu` VALUES ('39', '45');
INSERT INTO `jos_modules_menu` VALUES ('39', '46');
INSERT INTO `jos_modules_menu` VALUES ('39', '47');
INSERT INTO `jos_modules_menu` VALUES ('40', '0');
INSERT INTO `jos_modules_menu` VALUES ('43', '0');
INSERT INTO `jos_modules_menu` VALUES ('44', '0');
INSERT INTO `jos_modules_menu` VALUES ('45', '0');
INSERT INTO `jos_modules_menu` VALUES ('46', '0');
INSERT INTO `jos_modules_menu` VALUES ('47', '0');
INSERT INTO `jos_newsfeeds` VALUES ('4', '1', 'Joomla! Announcements', 'joomla-official-news', 'http://feeds.joomla.org/JoomlaAnnouncements', '', '1', '5', '3600', '0', '0000-00-00 00:00:00', '1', '0');
INSERT INTO `jos_newsfeeds` VALUES ('4', '2', 'Joomla! Core Team Blog', 'joomla-core-team-blog', 'http://feeds.joomla.org/JoomlaCommunityCoreTeamBlog', '', '1', '5', '3600', '0', '0000-00-00 00:00:00', '2', '0');
INSERT INTO `jos_newsfeeds` VALUES ('4', '3', 'Joomla! Community Magazine', 'joomla-community-magazine', 'http://feeds.joomla.org/JoomlaMagazine', '', '1', '20', '3600', '0', '0000-00-00 00:00:00', '3', '0');
INSERT INTO `jos_newsfeeds` VALUES ('4', '4', 'Joomla! Developer News', 'joomla-developer-news', 'http://feeds.joomla.org/JoomlaDeveloper', '', '1', '5', '3600', '0', '0000-00-00 00:00:00', '4', '0');
INSERT INTO `jos_newsfeeds` VALUES ('4', '5', 'Joomla! Security News', 'joomla-security-news', 'http://feeds.joomla.org/JoomlaSecurityNews', '', '1', '5', '3600', '0', '0000-00-00 00:00:00', '5', '0');
INSERT INTO `jos_newsfeeds` VALUES ('5', '6', 'Free Software Foundation Blogs', 'free-software-foundation-blogs', 'http://www.fsf.org/blogs/RSS', null, '1', '5', '3600', '0', '0000-00-00 00:00:00', '4', '0');
INSERT INTO `jos_newsfeeds` VALUES ('5', '7', 'Free Software Foundation', 'free-software-foundation', 'http://www.fsf.org/news/RSS', null, '1', '5', '3600', '62', '2008-09-14 00:24:25', '3', '0');
INSERT INTO `jos_newsfeeds` VALUES ('5', '8', 'Software Freedom Law Center Blog', 'software-freedom-law-center-blog', 'http://www.softwarefreedom.org/feeds/blog/', null, '1', '5', '3600', '0', '0000-00-00 00:00:00', '2', '0');
INSERT INTO `jos_newsfeeds` VALUES ('5', '9', 'Software Freedom Law Center News', 'software-freedom-law-center', 'http://www.softwarefreedom.org/feeds/news/', null, '1', '5', '3600', '0', '0000-00-00 00:00:00', '1', '0');
INSERT INTO `jos_newsfeeds` VALUES ('5', '10', 'Open Source Initiative Blog', 'open-source-initiative-blog', 'http://www.opensource.org/blog/feed', null, '1', '5', '3600', '0', '0000-00-00 00:00:00', '5', '0');
INSERT INTO `jos_newsfeeds` VALUES ('6', '11', 'PHP News and Announcements', 'php-news-and-announcements', 'http://www.php.net/feed.atom', null, '1', '5', '3600', '62', '2008-09-14 00:25:37', '1', '0');
INSERT INTO `jos_newsfeeds` VALUES ('6', '12', 'Planet MySQL', 'planet-mysql', 'http://www.planetmysql.org/rss20.xml', null, '1', '5', '3600', '62', '2008-09-14 00:25:51', '2', '0');
INSERT INTO `jos_newsfeeds` VALUES ('6', '13', 'Linux Foundation Announcements', 'linux-foundation-announcements', 'http://www.linuxfoundation.org/press/rss20.xml', null, '1', '5', '3600', '62', '2008-09-14 00:26:11', '3', '0');
INSERT INTO `jos_newsfeeds` VALUES ('6', '14', 'Mootools Blog', 'mootools-blog', 'http://feeds.feedburner.com/mootools-blog', null, '1', '5', '3600', '62', '2008-09-14 00:26:51', '4', '0');
INSERT INTO `jos_plugins` VALUES ('1', 'Authentication - Joomla', 'joomla', 'authentication', '0', '1', '1', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('2', 'Authentication - LDAP', 'ldap', 'authentication', '0', '2', '0', '1', '0', '0', '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n');
INSERT INTO `jos_plugins` VALUES ('3', 'Authentication - GMail', 'gmail', 'authentication', '0', '4', '0', '0', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('4', 'Authentication - OpenID', 'openid', 'authentication', '0', '3', '0', '0', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('5', 'User - Joomla!', 'joomla', 'user', '0', '0', '1', '0', '0', '0', '0000-00-00 00:00:00', 'autoregister=1\n\n');
INSERT INTO `jos_plugins` VALUES ('6', 'Search - Content', 'content', 'search', '0', '1', '1', '1', '0', '0', '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n');
INSERT INTO `jos_plugins` VALUES ('7', 'Search - Contacts', 'contacts', 'search', '0', '3', '1', '1', '0', '0', '0000-00-00 00:00:00', 'search_limit=50\n\n');
INSERT INTO `jos_plugins` VALUES ('8', 'Search - Categories', 'categories', 'search', '0', '4', '1', '0', '0', '0', '0000-00-00 00:00:00', 'search_limit=50\n\n');
INSERT INTO `jos_plugins` VALUES ('9', 'Search - Sections', 'sections', 'search', '0', '5', '1', '0', '0', '0', '0000-00-00 00:00:00', 'search_limit=50\n\n');
INSERT INTO `jos_plugins` VALUES ('10', 'Search - Newsfeeds', 'newsfeeds', 'search', '0', '6', '1', '0', '0', '0', '0000-00-00 00:00:00', 'search_limit=50\n\n');
INSERT INTO `jos_plugins` VALUES ('11', 'Search - Weblinks', 'weblinks', 'search', '0', '2', '1', '1', '0', '0', '0000-00-00 00:00:00', 'search_limit=50\n\n');
INSERT INTO `jos_plugins` VALUES ('12', 'Content - Pagebreak', 'pagebreak', 'content', '0', '10000', '1', '1', '0', '0', '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n');
INSERT INTO `jos_plugins` VALUES ('13', 'Content - Rating', 'vote', 'content', '0', '4', '1', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('14', 'Content - Email Cloaking', 'emailcloak', 'content', '0', '5', '1', '0', '0', '0', '0000-00-00 00:00:00', 'mode=1\n\n');
INSERT INTO `jos_plugins` VALUES ('15', 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', '0', '5', '0', '0', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('16', 'Content - Load Module', 'loadmodule', 'content', '0', '6', '1', '0', '0', '0', '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n');
INSERT INTO `jos_plugins` VALUES ('17', 'Content - Page Navigation', 'pagenavigation', 'content', '0', '2', '1', '1', '0', '0', '0000-00-00 00:00:00', 'position=1\n\n');
INSERT INTO `jos_plugins` VALUES ('18', 'Editor - No Editor', 'none', 'editors', '0', '0', '1', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('19', 'Editor - TinyMCE', 'tinymce', 'editors', '0', '0', '1', '1', '0', '0', '0000-00-00 00:00:00', 'mode=advanced\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=1\nvisualchars=1\nnonbreaking=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=1\ncontextmenu=1\ninlinepopups=1\nsafari=1\ncustom_plugin=\ncustom_button=\n\n');
INSERT INTO `jos_plugins` VALUES ('20', 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', '0', '0', '0', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('21', 'Editor Button - Image', 'image', 'editors-xtd', '0', '0', '1', '0', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('22', 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', '0', '0', '1', '0', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('23', 'Editor Button - Readmore', 'readmore', 'editors-xtd', '0', '0', '1', '0', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('24', 'XML-RPC - Joomla', 'joomla', 'xmlrpc', '0', '7', '0', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('25', 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', '0', '7', '0', '1', '0', '0', '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n');
INSERT INTO `jos_plugins` VALUES ('27', 'System - SEF', 'sef', 'system', '0', '1', '1', '0', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('28', 'System - Debug', 'debug', 'system', '0', '2', '1', '0', '0', '0', '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n');
INSERT INTO `jos_plugins` VALUES ('29', 'System - Legacy', 'legacy', 'system', '0', '3', '0', '1', '0', '0', '0000-00-00 00:00:00', 'route=0\n\n');
INSERT INTO `jos_plugins` VALUES ('30', 'System - Cache', 'cache', 'system', '0', '4', '0', '1', '0', '0', '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n');
INSERT INTO `jos_plugins` VALUES ('31', 'System - Log', 'log', 'system', '0', '5', '0', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('32', 'System - Remember Me', 'remember', 'system', '0', '6', '1', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('33', 'System - Backlink', 'backlink', 'system', '0', '7', '0', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_plugins` VALUES ('34', 'System - Mootools Upgrade', 'mtupgrade', 'system', '0', '8', '0', '1', '0', '0', '0000-00-00 00:00:00', '');
INSERT INTO `jos_poll_data` VALUES ('1', '14', 'Community Sites', '2');
INSERT INTO `jos_poll_data` VALUES ('2', '14', 'Public Brand Sites', '3');
INSERT INTO `jos_poll_data` VALUES ('3', '14', 'eCommerce', '1');
INSERT INTO `jos_poll_data` VALUES ('4', '14', 'Blogs', '0');
INSERT INTO `jos_poll_data` VALUES ('5', '14', 'Intranets', '0');
INSERT INTO `jos_poll_data` VALUES ('6', '14', 'Photo and Media Sites', '2');
INSERT INTO `jos_poll_data` VALUES ('7', '14', 'All of the Above!', '3');
INSERT INTO `jos_poll_data` VALUES ('8', '14', '', '0');
INSERT INTO `jos_poll_data` VALUES ('9', '14', '', '0');
INSERT INTO `jos_poll_data` VALUES ('10', '14', '', '0');
INSERT INTO `jos_poll_data` VALUES ('11', '14', '', '0');
INSERT INTO `jos_poll_data` VALUES ('12', '14', '', '0');
INSERT INTO `jos_poll_date` VALUES ('1', '2006-10-09 13:01:58', '1', '14');
INSERT INTO `jos_poll_date` VALUES ('2', '2006-10-10 15:19:43', '7', '14');
INSERT INTO `jos_poll_date` VALUES ('3', '2006-10-11 11:08:16', '7', '14');
INSERT INTO `jos_poll_date` VALUES ('4', '2006-10-11 15:02:26', '2', '14');
INSERT INTO `jos_poll_date` VALUES ('5', '2006-10-11 15:43:03', '7', '14');
INSERT INTO `jos_poll_date` VALUES ('6', '2006-10-11 15:43:38', '7', '14');
INSERT INTO `jos_poll_date` VALUES ('7', '2006-10-12 00:51:13', '2', '14');
INSERT INTO `jos_poll_date` VALUES ('8', '2007-05-10 19:12:29', '3', '14');
INSERT INTO `jos_poll_date` VALUES ('9', '2007-05-14 14:18:00', '6', '14');
INSERT INTO `jos_poll_date` VALUES ('10', '2007-06-10 15:20:29', '6', '14');
INSERT INTO `jos_poll_date` VALUES ('11', '2007-07-03 12:37:53', '2', '14');
INSERT INTO `jos_polls` VALUES ('14', 'Joomla! is used for?', 'joomla-is-used-for', '11', '0', '0000-00-00 00:00:00', '1', '0', '86400');
INSERT INTO `jos_sections` VALUES ('1', 'Tin Tức', '', 'tintuc', 'articles.jpg', 'content', 'right', '<p>Select a news topic from the list below, then select a news article to read.</p>', '1', '0', '0000-00-00 00:00:00', '3', '0', '5', '');
INSERT INTO `jos_sections` VALUES ('3', 'FAQs', '', 'faqs', 'key.jpg', 'content', 'left', 'From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.', '1', '0', '0000-00-00 00:00:00', '5', '0', '23', '');
INSERT INTO `jos_sections` VALUES ('4', 'Liên Hệ', '', 'about-joomla', '', 'content', 'left', '', '1', '0', '0000-00-00 00:00:00', '2', '0', '15', '');
INSERT INTO `jos_sections` VALUES ('5', 'Giới Thiệu', '', 'gioithieu', '', 'content', 'left', '', '1', '0', '0000-00-00 00:00:00', '6', '0', '1', '');
INSERT INTO `jos_sections` VALUES ('6', 'Dịch Vụ', '', 'dichvu', '', 'content', 'left', '', '1', '0', '0000-00-00 00:00:00', '7', '0', '1', '');
INSERT INTO `jos_session` VALUES ('', '1316679948', 'b172751315886fdfdf65a21866d5df55', '1', '0', '', '0', '0', '__default|a:8:{s:15:\"session.counter\";i:4;s:19:\"session.timer.start\";i:1316679927;s:18:\"session.timer.last\";i:1316679942;s:17:\"session.timer.now\";i:1316679948;s:22:\"session.client.browser\";s:63:\"Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/20100101 Firefox/6.0\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";s:15:\"Public Frontend\";s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:55:\"C:\\xampp\\htdocs\\libraries\\joomla\\html\\parameter\\element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}s:13:\"session.token\";s:32:\"fb28a4ff875f8fc896824cc9b601278e\";}VMCHECK|s:2:\"OK\";auth|a:11:{s:11:\"show_prices\";i:1;s:7:\"user_id\";i:0;s:8:\"username\";s:4:\"demo\";s:5:\"perms\";s:0:\"\";s:10:\"first_name\";s:5:\"guest\";s:9:\"last_name\";s:0:\"\";s:16:\"shopper_group_id\";s:1:\"5\";s:22:\"shopper_group_discount\";s:4:\"0.00\";s:24:\"show_price_including_tax\";s:1:\"1\";s:21:\"default_shopper_group\";i:1;s:22:\"is_registered_customer\";b:0;}cart|a:1:{s:3:\"idx\";i:0;}recent|a:2:{s:3:\"idx\";i:1;i:0;a:2:{s:10:\"product_id\";i:53;s:11:\"category_id\";s:2:\"27\";}}ps_vendor_id|i:1;minimum_pov|s:4:\"0.00\";vendor_currency|s:3:\"VND\";userstate|a:1:{s:10:\"product_id\";s:2:\"53\";}last_page|s:20:\"shop.product_details\";vmMiniCart|b:1;product_sess|a:23:{i:70;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679948;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:69;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679949;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:32;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679928;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:42;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679928;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:25;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679928;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:49;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679928;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:56;a:4:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;s:7:\"flypage\";s:11:\"flypage.tpl\";}i:57;a:3:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:58;a:4:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;s:7:\"flypage\";s:11:\"flypage.tpl\";}i:47;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:62;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:22;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:44;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:55;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679936;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:54;a:4:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679942;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;s:7:\"flypage\";s:11:\"flypage.tpl\";}i:50;a:4:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679942;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;s:7:\"flypage\";s:11:\"flypage.tpl\";}i:53;a:3:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679942;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:52;a:4:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679942;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;s:7:\"flypage\";s:11:\"flypage.tpl\";}i:51;a:3:{s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679942;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:67;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679943;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:19;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679943;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:39;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679943;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}i:65;a:4:{s:7:\"flypage\";s:11:\"flypage.tpl\";s:13:\"discount_info\";a:3:{s:6:\"amount\";i:0;s:10:\"is_percent\";i:0;s:11:\"create_time\";i:1316679949;}s:9:\"vendor_id\";s:1:\"1\";s:8:\"tax_rate\";i:0;}}taxrate|a:1:{i:1;i:0;}last_browse_parameters|a:7:{s:11:\"category_id\";s:2:\"27\";s:15:\"manufacturer_id\";i:0;s:7:\"keyword\";b:0;s:8:\"keyword1\";s:0:\"\";s:8:\"keyword2\";s:0:\"\";s:8:\"featured\";s:1:\"N\";s:10:\"discounted\";s:1:\"N\";}');
INSERT INTO `jos_templates_menu` VALUES ('ja_zeolite_ii', '0', '0');
INSERT INTO `jos_templates_menu` VALUES ('khepri', '0', '1');
INSERT INTO `jos_users` VALUES ('62', 'Administrator', 'admin', 'pool-uaf@googlegroups.com', '7371c2320819c620711e22e4798ced87:WqPWotSAeu51PTn48fcj9LxM1oVmyAxx', 'Super Administrator', '0', '1', '25', '2011-09-17 07:00:41', '2011-09-22 06:03:54', '', '');
INSERT INTO `jos_vm_auth_group` VALUES ('1', 'admin', '0');
INSERT INTO `jos_vm_auth_group` VALUES ('2', 'storeadmin', '250');
INSERT INTO `jos_vm_auth_group` VALUES ('3', 'shopper', '500');
INSERT INTO `jos_vm_auth_group` VALUES ('4', 'demo', '750');
INSERT INTO `jos_vm_auth_user_group` VALUES ('62', '2');
INSERT INTO `jos_vm_auth_user_vendor` VALUES ('62', '1');
INSERT INTO `jos_vm_category` VALUES ('6', '1', 'Bút Các Loại', '<p>Bao gồm các loại bút viết</p>', '', '', 'Y', '1316278651', '1316420502', 'browse_5', '2', 'flypage-ask.tpl', '7');
INSERT INTO `jos_vm_category` VALUES ('7', '1', 'Giấy Các Loại', '<p>Giấy in, giấy fax, Giấy than....</p>', '', '', 'Y', '1316420297', '1316420489', 'browse_5', '2', 'flypage.tpl', '8');
INSERT INTO `jos_vm_category` VALUES ('8', '1', 'Bấm Kim', '', '', '', 'Y', '1316420525', '1316420525', 'browse_5', '2', 'flypage.tpl', '3');
INSERT INTO `jos_vm_category` VALUES ('9', '1', 'Bấm Lỗ', '', '', '', 'Y', '1316420556', '1316420556', 'browse_5', '2', 'flypage.tpl', '2');
INSERT INTO `jos_vm_category` VALUES ('10', '1', 'Bảng Tên & Giây Đeo', '', '', '', 'Y', '1316420595', '1316420595', 'browse_5', '2', 'flypage.tpl', '9');
INSERT INTO `jos_vm_category` VALUES ('11', '1', 'Băng Keo', '', '', '', 'Y', '1316420628', '1316420628', 'browse_5', '2', 'flypage.tpl', '5');
INSERT INTO `jos_vm_category` VALUES ('12', '1', 'Phân Trang', '', '', '', 'Y', '1316420644', '1316420644', 'browse_5', '2', 'flypage.tpl', '6');
INSERT INTO `jos_vm_category` VALUES ('13', '1', 'Sản Phẩm Khác', '', '', '', 'Y', '1316420713', '1316420713', 'browse_5', '2', 'flypage.tpl', '11');
INSERT INTO `jos_vm_category` VALUES ('14', '1', 'Bút Bi', '', '', '', 'Y', '1316488693', '1316488693', 'browse_5', '2', 'flypage.tpl', '1');
INSERT INTO `jos_vm_category` VALUES ('15', '1', 'Bút Dạ Quang', '', '', '', 'Y', '1316488716', '1316488716', 'browse_5', '2', 'flypage.tpl', '3');
INSERT INTO `jos_vm_category` VALUES ('16', '1', 'Bút Chì - Chuốt Chì', '', '', '', 'Y', '1316488806', '1316488806', 'browse_5', '2', 'flypage.tpl', '2');
INSERT INTO `jos_vm_category` VALUES ('17', '1', 'Bút Lông', '', '', '', 'Y', '1316488899', '1316488899', 'browse_5', '2', 'flypage.tpl', '4');
INSERT INTO `jos_vm_category` VALUES ('18', '1', 'Bút Xóa', '', '', '', 'Y', '1316489121', '1316489121', 'browse_5', '2', 'flypage.tpl', '5');
INSERT INTO `jos_vm_category` VALUES ('19', '1', 'Giấy Can', '', '', '', 'Y', '1316580466', '1316580466', 'browse_5', '2', 'flypage.tpl', '1');
INSERT INTO `jos_vm_category` VALUES ('20', '1', 'Giấy Fax', '', '', '', 'Y', '1316580491', '1316580491', 'browse_5', '2', 'flypage.tpl', '3');
INSERT INTO `jos_vm_category` VALUES ('21', '1', 'Giấy Cuộn', '', '', '', 'Y', '1316580532', '1316580532', 'browse_5', '2', 'flypage.tpl', '2');
INSERT INTO `jos_vm_category` VALUES ('22', '1', 'Giấy Than', '', '', '', 'Y', '1316580582', '1316580582', 'browse_5', '2', 'flypage.tpl', '7');
INSERT INTO `jos_vm_category` VALUES ('23', '1', 'Giấy In', '', '', '', 'Y', '1316580631', '1316580631', 'browse_5', '2', 'flypage.tpl', '4');
INSERT INTO `jos_vm_category` VALUES ('24', '1', 'Giấy In Màu', '', '', '', 'Y', '1316580653', '1316580653', 'browse_5', '2', 'flypage.tpl', '5');
INSERT INTO `jos_vm_category` VALUES ('25', '1', 'Giấy Vệ Sinh', '', '', '', 'Y', '1316580704', '1316580704', 'browse_5', '2', 'flypage.tpl', '8');
INSERT INTO `jos_vm_category` VALUES ('26', '1', 'Giấy Liên Tục', '', '', '', 'Y', '1316580726', '1316580726', 'browse_5', '2', 'flypage.tpl', '6');
INSERT INTO `jos_vm_category` VALUES ('27', '1', 'Bìa-File', '', '', '', 'Y', '1316581018', '1316581018', 'browse_5', '2', 'flypage.tpl', '1');
INSERT INTO `jos_vm_category` VALUES ('28', '1', 'Bao Thư', '', '', '', 'Y', '1316582937', '1316582937', 'browse_5', '2', 'flypage.tpl', '4');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '6', '6');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '7', '8');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '8', '1');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '9', '2');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '10', '4');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '11', '3');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '12', '10');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '13', '12');
INSERT INTO `jos_vm_category_xref` VALUES ('6', '14', '1');
INSERT INTO `jos_vm_category_xref` VALUES ('6', '15', '3');
INSERT INTO `jos_vm_category_xref` VALUES ('6', '16', '2');
INSERT INTO `jos_vm_category_xref` VALUES ('6', '17', '4');
INSERT INTO `jos_vm_category_xref` VALUES ('6', '18', '5');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '19', '1');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '20', '3');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '21', '2');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '22', '7');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '23', '4');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '24', '5');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '25', '8');
INSERT INTO `jos_vm_category_xref` VALUES ('7', '26', '6');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '27', '5');
INSERT INTO `jos_vm_category_xref` VALUES ('0', '28', null);
INSERT INTO `jos_vm_country` VALUES ('1', '1', 'Afghanistan', 'AFG', 'AF');
INSERT INTO `jos_vm_country` VALUES ('2', '1', 'Albania', 'ALB', 'AL');
INSERT INTO `jos_vm_country` VALUES ('3', '1', 'Algeria', 'DZA', 'DZ');
INSERT INTO `jos_vm_country` VALUES ('4', '1', 'American Samoa', 'ASM', 'AS');
INSERT INTO `jos_vm_country` VALUES ('5', '1', 'Andorra', 'AND', 'AD');
INSERT INTO `jos_vm_country` VALUES ('6', '1', 'Angola', 'AGO', 'AO');
INSERT INTO `jos_vm_country` VALUES ('7', '1', 'Anguilla', 'AIA', 'AI');
INSERT INTO `jos_vm_country` VALUES ('8', '1', 'Antarctica', 'ATA', 'AQ');
INSERT INTO `jos_vm_country` VALUES ('9', '1', 'Antigua and Barbuda', 'ATG', 'AG');
INSERT INTO `jos_vm_country` VALUES ('10', '1', 'Argentina', 'ARG', 'AR');
INSERT INTO `jos_vm_country` VALUES ('11', '1', 'Armenia', 'ARM', 'AM');
INSERT INTO `jos_vm_country` VALUES ('12', '1', 'Aruba', 'ABW', 'AW');
INSERT INTO `jos_vm_country` VALUES ('13', '1', 'Australia', 'AUS', 'AU');
INSERT INTO `jos_vm_country` VALUES ('14', '1', 'Austria', 'AUT', 'AT');
INSERT INTO `jos_vm_country` VALUES ('15', '1', 'Azerbaijan', 'AZE', 'AZ');
INSERT INTO `jos_vm_country` VALUES ('16', '1', 'Bahamas', 'BHS', 'BS');
INSERT INTO `jos_vm_country` VALUES ('17', '1', 'Bahrain', 'BHR', 'BH');
INSERT INTO `jos_vm_country` VALUES ('18', '1', 'Bangladesh', 'BGD', 'BD');
INSERT INTO `jos_vm_country` VALUES ('19', '1', 'Barbados', 'BRB', 'BB');
INSERT INTO `jos_vm_country` VALUES ('20', '1', 'Belarus', 'BLR', 'BY');
INSERT INTO `jos_vm_country` VALUES ('21', '1', 'Belgium', 'BEL', 'BE');
INSERT INTO `jos_vm_country` VALUES ('22', '1', 'Belize', 'BLZ', 'BZ');
INSERT INTO `jos_vm_country` VALUES ('23', '1', 'Benin', 'BEN', 'BJ');
INSERT INTO `jos_vm_country` VALUES ('24', '1', 'Bermuda', 'BMU', 'BM');
INSERT INTO `jos_vm_country` VALUES ('25', '1', 'Bhutan', 'BTN', 'BT');
INSERT INTO `jos_vm_country` VALUES ('26', '1', 'Bolivia', 'BOL', 'BO');
INSERT INTO `jos_vm_country` VALUES ('27', '1', 'Bosnia and Herzegowina', 'BIH', 'BA');
INSERT INTO `jos_vm_country` VALUES ('28', '1', 'Botswana', 'BWA', 'BW');
INSERT INTO `jos_vm_country` VALUES ('29', '1', 'Bouvet Island', 'BVT', 'BV');
INSERT INTO `jos_vm_country` VALUES ('30', '1', 'Brazil', 'BRA', 'BR');
INSERT INTO `jos_vm_country` VALUES ('31', '1', 'British Indian Ocean Territory', 'IOT', 'IO');
INSERT INTO `jos_vm_country` VALUES ('32', '1', 'Brunei Darussalam', 'BRN', 'BN');
INSERT INTO `jos_vm_country` VALUES ('33', '1', 'Bulgaria', 'BGR', 'BG');
INSERT INTO `jos_vm_country` VALUES ('34', '1', 'Burkina Faso', 'BFA', 'BF');
INSERT INTO `jos_vm_country` VALUES ('35', '1', 'Burundi', 'BDI', 'BI');
INSERT INTO `jos_vm_country` VALUES ('36', '1', 'Cambodia', 'KHM', 'KH');
INSERT INTO `jos_vm_country` VALUES ('37', '1', 'Cameroon', 'CMR', 'CM');
INSERT INTO `jos_vm_country` VALUES ('38', '1', 'Canada', 'CAN', 'CA');
INSERT INTO `jos_vm_country` VALUES ('39', '1', 'Cape Verde', 'CPV', 'CV');
INSERT INTO `jos_vm_country` VALUES ('40', '1', 'Cayman Islands', 'CYM', 'KY');
INSERT INTO `jos_vm_country` VALUES ('41', '1', 'Central African Republic', 'CAF', 'CF');
INSERT INTO `jos_vm_country` VALUES ('42', '1', 'Chad', 'TCD', 'TD');
INSERT INTO `jos_vm_country` VALUES ('43', '1', 'Chile', 'CHL', 'CL');
INSERT INTO `jos_vm_country` VALUES ('44', '1', 'China', 'CHN', 'CN');
INSERT INTO `jos_vm_country` VALUES ('45', '1', 'Christmas Island', 'CXR', 'CX');
INSERT INTO `jos_vm_country` VALUES ('46', '1', 'Cocos (Keeling) Islands', 'CCK', 'CC');
INSERT INTO `jos_vm_country` VALUES ('47', '1', 'Colombia', 'COL', 'CO');
INSERT INTO `jos_vm_country` VALUES ('48', '1', 'Comoros', 'COM', 'KM');
INSERT INTO `jos_vm_country` VALUES ('49', '1', 'Congo', 'COG', 'CG');
INSERT INTO `jos_vm_country` VALUES ('50', '1', 'Cook Islands', 'COK', 'CK');
INSERT INTO `jos_vm_country` VALUES ('51', '1', 'Costa Rica', 'CRI', 'CR');
INSERT INTO `jos_vm_country` VALUES ('52', '1', 'Cote D\'Ivoire', 'CIV', 'CI');
INSERT INTO `jos_vm_country` VALUES ('53', '1', 'Croatia', 'HRV', 'HR');
INSERT INTO `jos_vm_country` VALUES ('54', '1', 'Cuba', 'CUB', 'CU');
INSERT INTO `jos_vm_country` VALUES ('55', '1', 'Cyprus', 'CYP', 'CY');
INSERT INTO `jos_vm_country` VALUES ('56', '1', 'Czech Republic', 'CZE', 'CZ');
INSERT INTO `jos_vm_country` VALUES ('57', '1', 'Denmark', 'DNK', 'DK');
INSERT INTO `jos_vm_country` VALUES ('58', '1', 'Djibouti', 'DJI', 'DJ');
INSERT INTO `jos_vm_country` VALUES ('59', '1', 'Dominica', 'DMA', 'DM');
INSERT INTO `jos_vm_country` VALUES ('60', '1', 'Dominican Republic', 'DOM', 'DO');
INSERT INTO `jos_vm_country` VALUES ('61', '1', 'East Timor', 'TMP', 'TP');
INSERT INTO `jos_vm_country` VALUES ('62', '1', 'Ecuador', 'ECU', 'EC');
INSERT INTO `jos_vm_country` VALUES ('63', '1', 'Egypt', 'EGY', 'EG');
INSERT INTO `jos_vm_country` VALUES ('64', '1', 'El Salvador', 'SLV', 'SV');
INSERT INTO `jos_vm_country` VALUES ('65', '1', 'Equatorial Guinea', 'GNQ', 'GQ');
INSERT INTO `jos_vm_country` VALUES ('66', '1', 'Eritrea', 'ERI', 'ER');
INSERT INTO `jos_vm_country` VALUES ('67', '1', 'Estonia', 'EST', 'EE');
INSERT INTO `jos_vm_country` VALUES ('68', '1', 'Ethiopia', 'ETH', 'ET');
INSERT INTO `jos_vm_country` VALUES ('69', '1', 'Falkland Islands (Malvinas)', 'FLK', 'FK');
INSERT INTO `jos_vm_country` VALUES ('70', '1', 'Faroe Islands', 'FRO', 'FO');
INSERT INTO `jos_vm_country` VALUES ('71', '1', 'Fiji', 'FJI', 'FJ');
INSERT INTO `jos_vm_country` VALUES ('72', '1', 'Finland', 'FIN', 'FI');
INSERT INTO `jos_vm_country` VALUES ('73', '1', 'France', 'FRA', 'FR');
INSERT INTO `jos_vm_country` VALUES ('74', '1', 'France, Metropolitan', 'FXX', 'FX');
INSERT INTO `jos_vm_country` VALUES ('75', '1', 'French Guiana', 'GUF', 'GF');
INSERT INTO `jos_vm_country` VALUES ('76', '1', 'French Polynesia', 'PYF', 'PF');
INSERT INTO `jos_vm_country` VALUES ('77', '1', 'French Southern Territories', 'ATF', 'TF');
INSERT INTO `jos_vm_country` VALUES ('78', '1', 'Gabon', 'GAB', 'GA');
INSERT INTO `jos_vm_country` VALUES ('79', '1', 'Gambia', 'GMB', 'GM');
INSERT INTO `jos_vm_country` VALUES ('80', '1', 'Georgia', 'GEO', 'GE');
INSERT INTO `jos_vm_country` VALUES ('81', '1', 'Germany', 'DEU', 'DE');
INSERT INTO `jos_vm_country` VALUES ('82', '1', 'Ghana', 'GHA', 'GH');
INSERT INTO `jos_vm_country` VALUES ('83', '1', 'Gibraltar', 'GIB', 'GI');
INSERT INTO `jos_vm_country` VALUES ('84', '1', 'Greece', 'GRC', 'GR');
INSERT INTO `jos_vm_country` VALUES ('85', '1', 'Greenland', 'GRL', 'GL');
INSERT INTO `jos_vm_country` VALUES ('86', '1', 'Grenada', 'GRD', 'GD');
INSERT INTO `jos_vm_country` VALUES ('87', '1', 'Guadeloupe', 'GLP', 'GP');
INSERT INTO `jos_vm_country` VALUES ('88', '1', 'Guam', 'GUM', 'GU');
INSERT INTO `jos_vm_country` VALUES ('89', '1', 'Guatemala', 'GTM', 'GT');
INSERT INTO `jos_vm_country` VALUES ('90', '1', 'Guinea', 'GIN', 'GN');
INSERT INTO `jos_vm_country` VALUES ('91', '1', 'Guinea-bissau', 'GNB', 'GW');
INSERT INTO `jos_vm_country` VALUES ('92', '1', 'Guyana', 'GUY', 'GY');
INSERT INTO `jos_vm_country` VALUES ('93', '1', 'Haiti', 'HTI', 'HT');
INSERT INTO `jos_vm_country` VALUES ('94', '1', 'Heard and Mc Donald Islands', 'HMD', 'HM');
INSERT INTO `jos_vm_country` VALUES ('95', '1', 'Honduras', 'HND', 'HN');
INSERT INTO `jos_vm_country` VALUES ('96', '1', 'Hong Kong', 'HKG', 'HK');
INSERT INTO `jos_vm_country` VALUES ('97', '1', 'Hungary', 'HUN', 'HU');
INSERT INTO `jos_vm_country` VALUES ('98', '1', 'Iceland', 'ISL', 'IS');
INSERT INTO `jos_vm_country` VALUES ('99', '1', 'India', 'IND', 'IN');
INSERT INTO `jos_vm_country` VALUES ('100', '1', 'Indonesia', 'IDN', 'ID');
INSERT INTO `jos_vm_country` VALUES ('101', '1', 'Iran (Islamic Republic of)', 'IRN', 'IR');
INSERT INTO `jos_vm_country` VALUES ('102', '1', 'Iraq', 'IRQ', 'IQ');
INSERT INTO `jos_vm_country` VALUES ('103', '1', 'Ireland', 'IRL', 'IE');
INSERT INTO `jos_vm_country` VALUES ('104', '1', 'Israel', 'ISR', 'IL');
INSERT INTO `jos_vm_country` VALUES ('105', '1', 'Italy', 'ITA', 'IT');
INSERT INTO `jos_vm_country` VALUES ('106', '1', 'Jamaica', 'JAM', 'JM');
INSERT INTO `jos_vm_country` VALUES ('107', '1', 'Japan', 'JPN', 'JP');
INSERT INTO `jos_vm_country` VALUES ('108', '1', 'Jordan', 'JOR', 'JO');
INSERT INTO `jos_vm_country` VALUES ('109', '1', 'Kazakhstan', 'KAZ', 'KZ');
INSERT INTO `jos_vm_country` VALUES ('110', '1', 'Kenya', 'KEN', 'KE');
INSERT INTO `jos_vm_country` VALUES ('111', '1', 'Kiribati', 'KIR', 'KI');
INSERT INTO `jos_vm_country` VALUES ('112', '1', 'Korea, Democratic People\'s Republic of', 'PRK', 'KP');
INSERT INTO `jos_vm_country` VALUES ('113', '1', 'Korea, Republic of', 'KOR', 'KR');
INSERT INTO `jos_vm_country` VALUES ('114', '1', 'Kuwait', 'KWT', 'KW');
INSERT INTO `jos_vm_country` VALUES ('115', '1', 'Kyrgyzstan', 'KGZ', 'KG');
INSERT INTO `jos_vm_country` VALUES ('116', '1', 'Lao People\'s Democratic Republic', 'LAO', 'LA');
INSERT INTO `jos_vm_country` VALUES ('117', '1', 'Latvia', 'LVA', 'LV');
INSERT INTO `jos_vm_country` VALUES ('118', '1', 'Lebanon', 'LBN', 'LB');
INSERT INTO `jos_vm_country` VALUES ('119', '1', 'Lesotho', 'LSO', 'LS');
INSERT INTO `jos_vm_country` VALUES ('120', '1', 'Liberia', 'LBR', 'LR');
INSERT INTO `jos_vm_country` VALUES ('121', '1', 'Libyan Arab Jamahiriya', 'LBY', 'LY');
INSERT INTO `jos_vm_country` VALUES ('122', '1', 'Liechtenstein', 'LIE', 'LI');
INSERT INTO `jos_vm_country` VALUES ('123', '1', 'Lithuania', 'LTU', 'LT');
INSERT INTO `jos_vm_country` VALUES ('124', '1', 'Luxembourg', 'LUX', 'LU');
INSERT INTO `jos_vm_country` VALUES ('125', '1', 'Macau', 'MAC', 'MO');
INSERT INTO `jos_vm_country` VALUES ('126', '1', 'Macedonia, The Former Yugoslav Republic of', 'MKD', 'MK');
INSERT INTO `jos_vm_country` VALUES ('127', '1', 'Madagascar', 'MDG', 'MG');
INSERT INTO `jos_vm_country` VALUES ('128', '1', 'Malawi', 'MWI', 'MW');
INSERT INTO `jos_vm_country` VALUES ('129', '1', 'Malaysia', 'MYS', 'MY');
INSERT INTO `jos_vm_country` VALUES ('130', '1', 'Maldives', 'MDV', 'MV');
INSERT INTO `jos_vm_country` VALUES ('131', '1', 'Mali', 'MLI', 'ML');
INSERT INTO `jos_vm_country` VALUES ('132', '1', 'Malta', 'MLT', 'MT');
INSERT INTO `jos_vm_country` VALUES ('133', '1', 'Marshall Islands', 'MHL', 'MH');
INSERT INTO `jos_vm_country` VALUES ('134', '1', 'Martinique', 'MTQ', 'MQ');
INSERT INTO `jos_vm_country` VALUES ('135', '1', 'Mauritania', 'MRT', 'MR');
INSERT INTO `jos_vm_country` VALUES ('136', '1', 'Mauritius', 'MUS', 'MU');
INSERT INTO `jos_vm_country` VALUES ('137', '1', 'Mayotte', 'MYT', 'YT');
INSERT INTO `jos_vm_country` VALUES ('138', '1', 'Mexico', 'MEX', 'MX');
INSERT INTO `jos_vm_country` VALUES ('139', '1', 'Micronesia, Federated States of', 'FSM', 'FM');
INSERT INTO `jos_vm_country` VALUES ('140', '1', 'Moldova, Republic of', 'MDA', 'MD');
INSERT INTO `jos_vm_country` VALUES ('141', '1', 'Monaco', 'MCO', 'MC');
INSERT INTO `jos_vm_country` VALUES ('142', '1', 'Mongolia', 'MNG', 'MN');
INSERT INTO `jos_vm_country` VALUES ('143', '1', 'Montserrat', 'MSR', 'MS');
INSERT INTO `jos_vm_country` VALUES ('144', '1', 'Morocco', 'MAR', 'MA');
INSERT INTO `jos_vm_country` VALUES ('145', '1', 'Mozambique', 'MOZ', 'MZ');
INSERT INTO `jos_vm_country` VALUES ('146', '1', 'Myanmar', 'MMR', 'MM');
INSERT INTO `jos_vm_country` VALUES ('147', '1', 'Namibia', 'NAM', 'NA');
INSERT INTO `jos_vm_country` VALUES ('148', '1', 'Nauru', 'NRU', 'NR');
INSERT INTO `jos_vm_country` VALUES ('149', '1', 'Nepal', 'NPL', 'NP');
INSERT INTO `jos_vm_country` VALUES ('150', '1', 'Netherlands', 'NLD', 'NL');
INSERT INTO `jos_vm_country` VALUES ('151', '1', 'Netherlands Antilles', 'ANT', 'AN');
INSERT INTO `jos_vm_country` VALUES ('152', '1', 'New Caledonia', 'NCL', 'NC');
INSERT INTO `jos_vm_country` VALUES ('153', '1', 'New Zealand', 'NZL', 'NZ');
INSERT INTO `jos_vm_country` VALUES ('154', '1', 'Nicaragua', 'NIC', 'NI');
INSERT INTO `jos_vm_country` VALUES ('155', '1', 'Niger', 'NER', 'NE');
INSERT INTO `jos_vm_country` VALUES ('156', '1', 'Nigeria', 'NGA', 'NG');
INSERT INTO `jos_vm_country` VALUES ('157', '1', 'Niue', 'NIU', 'NU');
INSERT INTO `jos_vm_country` VALUES ('158', '1', 'Norfolk Island', 'NFK', 'NF');
INSERT INTO `jos_vm_country` VALUES ('159', '1', 'Northern Mariana Islands', 'MNP', 'MP');
INSERT INTO `jos_vm_country` VALUES ('160', '1', 'Norway', 'NOR', 'NO');
INSERT INTO `jos_vm_country` VALUES ('161', '1', 'Oman', 'OMN', 'OM');
INSERT INTO `jos_vm_country` VALUES ('162', '1', 'Pakistan', 'PAK', 'PK');
INSERT INTO `jos_vm_country` VALUES ('163', '1', 'Palau', 'PLW', 'PW');
INSERT INTO `jos_vm_country` VALUES ('164', '1', 'Panama', 'PAN', 'PA');
INSERT INTO `jos_vm_country` VALUES ('165', '1', 'Papua New Guinea', 'PNG', 'PG');
INSERT INTO `jos_vm_country` VALUES ('166', '1', 'Paraguay', 'PRY', 'PY');
INSERT INTO `jos_vm_country` VALUES ('167', '1', 'Peru', 'PER', 'PE');
INSERT INTO `jos_vm_country` VALUES ('168', '1', 'Philippines', 'PHL', 'PH');
INSERT INTO `jos_vm_country` VALUES ('169', '1', 'Pitcairn', 'PCN', 'PN');
INSERT INTO `jos_vm_country` VALUES ('170', '1', 'Poland', 'POL', 'PL');
INSERT INTO `jos_vm_country` VALUES ('171', '1', 'Portugal', 'PRT', 'PT');
INSERT INTO `jos_vm_country` VALUES ('172', '1', 'Puerto Rico', 'PRI', 'PR');
INSERT INTO `jos_vm_country` VALUES ('173', '1', 'Qatar', 'QAT', 'QA');
INSERT INTO `jos_vm_country` VALUES ('174', '1', 'Reunion', 'REU', 'RE');
INSERT INTO `jos_vm_country` VALUES ('175', '1', 'Romania', 'ROM', 'RO');
INSERT INTO `jos_vm_country` VALUES ('176', '1', 'Russian Federation', 'RUS', 'RU');
INSERT INTO `jos_vm_country` VALUES ('177', '1', 'Rwanda', 'RWA', 'RW');
INSERT INTO `jos_vm_country` VALUES ('178', '1', 'Saint Kitts and Nevis', 'KNA', 'KN');
INSERT INTO `jos_vm_country` VALUES ('179', '1', 'Saint Lucia', 'LCA', 'LC');
INSERT INTO `jos_vm_country` VALUES ('180', '1', 'Saint Vincent and the Grenadines', 'VCT', 'VC');
INSERT INTO `jos_vm_country` VALUES ('181', '1', 'Samoa', 'WSM', 'WS');
INSERT INTO `jos_vm_country` VALUES ('182', '1', 'San Marino', 'SMR', 'SM');
INSERT INTO `jos_vm_country` VALUES ('183', '1', 'Sao Tome and Principe', 'STP', 'ST');
INSERT INTO `jos_vm_country` VALUES ('184', '1', 'Saudi Arabia', 'SAU', 'SA');
INSERT INTO `jos_vm_country` VALUES ('185', '1', 'Senegal', 'SEN', 'SN');
INSERT INTO `jos_vm_country` VALUES ('186', '1', 'Seychelles', 'SYC', 'SC');
INSERT INTO `jos_vm_country` VALUES ('187', '1', 'Sierra Leone', 'SLE', 'SL');
INSERT INTO `jos_vm_country` VALUES ('188', '1', 'Singapore', 'SGP', 'SG');
INSERT INTO `jos_vm_country` VALUES ('189', '1', 'Slovakia (Slovak Republic)', 'SVK', 'SK');
INSERT INTO `jos_vm_country` VALUES ('190', '1', 'Slovenia', 'SVN', 'SI');
INSERT INTO `jos_vm_country` VALUES ('191', '1', 'Solomon Islands', 'SLB', 'SB');
INSERT INTO `jos_vm_country` VALUES ('192', '1', 'Somalia', 'SOM', 'SO');
INSERT INTO `jos_vm_country` VALUES ('193', '1', 'South Africa', 'ZAF', 'ZA');
INSERT INTO `jos_vm_country` VALUES ('194', '1', 'South Georgia and the South Sandwich Islands', 'SGS', 'GS');
INSERT INTO `jos_vm_country` VALUES ('195', '1', 'Spain', 'ESP', 'ES');
INSERT INTO `jos_vm_country` VALUES ('196', '1', 'Sri Lanka', 'LKA', 'LK');
INSERT INTO `jos_vm_country` VALUES ('197', '1', 'St. Helena', 'SHN', 'SH');
INSERT INTO `jos_vm_country` VALUES ('198', '1', 'St. Pierre and Miquelon', 'SPM', 'PM');
INSERT INTO `jos_vm_country` VALUES ('199', '1', 'Sudan', 'SDN', 'SD');
INSERT INTO `jos_vm_country` VALUES ('200', '1', 'Suriname', 'SUR', 'SR');
INSERT INTO `jos_vm_country` VALUES ('201', '1', 'Svalbard and Jan Mayen Islands', 'SJM', 'SJ');
INSERT INTO `jos_vm_country` VALUES ('202', '1', 'Swaziland', 'SWZ', 'SZ');
INSERT INTO `jos_vm_country` VALUES ('203', '1', 'Sweden', 'SWE', 'SE');
INSERT INTO `jos_vm_country` VALUES ('204', '1', 'Switzerland', 'CHE', 'CH');
INSERT INTO `jos_vm_country` VALUES ('205', '1', 'Syrian Arab Republic', 'SYR', 'SY');
INSERT INTO `jos_vm_country` VALUES ('206', '1', 'Taiwan', 'TWN', 'TW');
INSERT INTO `jos_vm_country` VALUES ('207', '1', 'Tajikistan', 'TJK', 'TJ');
INSERT INTO `jos_vm_country` VALUES ('208', '1', 'Tanzania, United Republic of', 'TZA', 'TZ');
INSERT INTO `jos_vm_country` VALUES ('209', '1', 'Thailand', 'THA', 'TH');
INSERT INTO `jos_vm_country` VALUES ('210', '1', 'Togo', 'TGO', 'TG');
INSERT INTO `jos_vm_country` VALUES ('211', '1', 'Tokelau', 'TKL', 'TK');
INSERT INTO `jos_vm_country` VALUES ('212', '1', 'Tonga', 'TON', 'TO');
INSERT INTO `jos_vm_country` VALUES ('213', '1', 'Trinidad and Tobago', 'TTO', 'TT');
INSERT INTO `jos_vm_country` VALUES ('214', '1', 'Tunisia', 'TUN', 'TN');
INSERT INTO `jos_vm_country` VALUES ('215', '1', 'Turkey', 'TUR', 'TR');
INSERT INTO `jos_vm_country` VALUES ('216', '1', 'Turkmenistan', 'TKM', 'TM');
INSERT INTO `jos_vm_country` VALUES ('217', '1', 'Turks and Caicos Islands', 'TCA', 'TC');
INSERT INTO `jos_vm_country` VALUES ('218', '1', 'Tuvalu', 'TUV', 'TV');
INSERT INTO `jos_vm_country` VALUES ('219', '1', 'Uganda', 'UGA', 'UG');
INSERT INTO `jos_vm_country` VALUES ('220', '1', 'Ukraine', 'UKR', 'UA');
INSERT INTO `jos_vm_country` VALUES ('221', '1', 'United Arab Emirates', 'ARE', 'AE');
INSERT INTO `jos_vm_country` VALUES ('222', '1', 'United Kingdom', 'GBR', 'GB');
INSERT INTO `jos_vm_country` VALUES ('223', '1', 'United States', 'USA', 'US');
INSERT INTO `jos_vm_country` VALUES ('224', '1', 'United States Minor Outlying Islands', 'UMI', 'UM');
INSERT INTO `jos_vm_country` VALUES ('225', '1', 'Uruguay', 'URY', 'UY');
INSERT INTO `jos_vm_country` VALUES ('226', '1', 'Uzbekistan', 'UZB', 'UZ');
INSERT INTO `jos_vm_country` VALUES ('227', '1', 'Vanuatu', 'VUT', 'VU');
INSERT INTO `jos_vm_country` VALUES ('228', '1', 'Vatican City State (Holy See)', 'VAT', 'VA');
INSERT INTO `jos_vm_country` VALUES ('229', '1', 'Venezuela', 'VEN', 'VE');
INSERT INTO `jos_vm_country` VALUES ('230', '1', 'Viet Nam', 'VNM', 'VN');
INSERT INTO `jos_vm_country` VALUES ('231', '1', 'Virgin Islands (British)', 'VGB', 'VG');
INSERT INTO `jos_vm_country` VALUES ('232', '1', 'Virgin Islands (U.S.)', 'VIR', 'VI');
INSERT INTO `jos_vm_country` VALUES ('233', '1', 'Wallis and Futuna Islands', 'WLF', 'WF');
INSERT INTO `jos_vm_country` VALUES ('234', '1', 'Western Sahara', 'ESH', 'EH');
INSERT INTO `jos_vm_country` VALUES ('235', '1', 'Yemen', 'YEM', 'YE');
INSERT INTO `jos_vm_country` VALUES ('236', '1', 'Serbia', 'SRB', 'RS');
INSERT INTO `jos_vm_country` VALUES ('237', '1', 'The Democratic Republic of Congo', 'DRC', 'DC');
INSERT INTO `jos_vm_country` VALUES ('238', '1', 'Zambia', 'ZMB', 'ZM');
INSERT INTO `jos_vm_country` VALUES ('239', '1', 'Zimbabwe', 'ZWE', 'ZW');
INSERT INTO `jos_vm_country` VALUES ('240', '1', 'East Timor', 'XET', 'XE');
INSERT INTO `jos_vm_country` VALUES ('241', '1', 'Jersey', 'XJE', 'XJ');
INSERT INTO `jos_vm_country` VALUES ('242', '1', 'St. Barthelemy', 'XSB', 'XB');
INSERT INTO `jos_vm_country` VALUES ('243', '1', 'St. Eustatius', 'XSE', 'XU');
INSERT INTO `jos_vm_country` VALUES ('244', '1', 'Canary Islands', 'XCA', 'XC');
INSERT INTO `jos_vm_country` VALUES ('245', '1', 'Montenegro', 'MNE', 'ME');
INSERT INTO `jos_vm_coupons` VALUES ('1', 'test1', 'total', 'gift', '6.00');
INSERT INTO `jos_vm_coupons` VALUES ('2', 'test2', 'percent', 'permanent', '15.00');
INSERT INTO `jos_vm_coupons` VALUES ('3', 'test3', 'total', 'permanent', '4.00');
INSERT INTO `jos_vm_coupons` VALUES ('4', 'test4', 'total', 'gift', '15.00');
INSERT INTO `jos_vm_creditcard` VALUES ('1', '1', 'Visa', 'VISA');
INSERT INTO `jos_vm_creditcard` VALUES ('2', '1', 'MasterCard', 'MC');
INSERT INTO `jos_vm_creditcard` VALUES ('3', '1', 'American Express', 'amex');
INSERT INTO `jos_vm_creditcard` VALUES ('4', '1', 'Discover Card', 'discover');
INSERT INTO `jos_vm_creditcard` VALUES ('5', '1', 'Diners Club', 'diners');
INSERT INTO `jos_vm_creditcard` VALUES ('6', '1', 'JCB', 'jcb');
INSERT INTO `jos_vm_creditcard` VALUES ('7', '1', 'Australian Bankcard', 'australian_bc');
INSERT INTO `jos_vm_csv` VALUES ('1', 'product_sku', '', '1', 'Y');
INSERT INTO `jos_vm_csv` VALUES ('2', 'product_s_desc', '', '5', 'N');
INSERT INTO `jos_vm_csv` VALUES ('3', 'product_desc', '', '6', 'N');
INSERT INTO `jos_vm_csv` VALUES ('4', 'product_thumb_image', '', '7', 'N');
INSERT INTO `jos_vm_csv` VALUES ('5', 'product_full_image', '', '8', 'N');
INSERT INTO `jos_vm_csv` VALUES ('6', 'product_weight', '', '9', 'N');
INSERT INTO `jos_vm_csv` VALUES ('7', 'product_weight_uom', 'KG', '10', 'N');
INSERT INTO `jos_vm_csv` VALUES ('8', 'product_length', '', '11', 'N');
INSERT INTO `jos_vm_csv` VALUES ('9', 'product_width', '', '12', 'N');
INSERT INTO `jos_vm_csv` VALUES ('10', 'product_height', '', '13', 'N');
INSERT INTO `jos_vm_csv` VALUES ('11', 'product_lwh_uom', '', '14', 'N');
INSERT INTO `jos_vm_csv` VALUES ('12', 'product_in_stock', '0', '15', 'N');
INSERT INTO `jos_vm_csv` VALUES ('13', 'product_available_date', '', '16', 'N');
INSERT INTO `jos_vm_csv` VALUES ('14', 'product_discount_id', '', '17', 'N');
INSERT INTO `jos_vm_csv` VALUES ('15', 'product_name', '', '2', 'Y');
INSERT INTO `jos_vm_csv` VALUES ('16', 'product_price', '', '4', 'N');
INSERT INTO `jos_vm_csv` VALUES ('17', 'category_path', '', '3', 'Y');
INSERT INTO `jos_vm_csv` VALUES ('18', 'manufacturer_id', '', '18', 'N');
INSERT INTO `jos_vm_csv` VALUES ('19', 'product_tax_id', '', '19', 'N');
INSERT INTO `jos_vm_csv` VALUES ('20', 'product_sales', '', '20', 'N');
INSERT INTO `jos_vm_csv` VALUES ('21', 'product_parent_id', '0', '21', 'N');
INSERT INTO `jos_vm_csv` VALUES ('22', 'attribute', '', '22', 'N');
INSERT INTO `jos_vm_csv` VALUES ('23', 'custom_attribute', '', '23', 'N');
INSERT INTO `jos_vm_csv` VALUES ('24', 'attributes', '', '24', 'N');
INSERT INTO `jos_vm_csv` VALUES ('25', 'attribute_values', '', '25', 'N');
INSERT INTO `jos_vm_currency` VALUES ('1', 'Andorran Peseta', 'ADP');
INSERT INTO `jos_vm_currency` VALUES ('2', 'United Arab Emirates Dirham', 'AED');
INSERT INTO `jos_vm_currency` VALUES ('3', 'Afghanistan Afghani', 'AFA');
INSERT INTO `jos_vm_currency` VALUES ('4', 'Albanian Lek', 'ALL');
INSERT INTO `jos_vm_currency` VALUES ('5', 'Netherlands Antillian Guilder', 'ANG');
INSERT INTO `jos_vm_currency` VALUES ('6', 'Angolan Kwanza', 'AOK');
INSERT INTO `jos_vm_currency` VALUES ('7', 'Argentine Peso', 'ARS');
INSERT INTO `jos_vm_currency` VALUES ('9', 'Australian Dollar', 'AUD');
INSERT INTO `jos_vm_currency` VALUES ('10', 'Aruban Florin', 'AWG');
INSERT INTO `jos_vm_currency` VALUES ('11', 'Barbados Dollar', 'BBD');
INSERT INTO `jos_vm_currency` VALUES ('12', 'Bangladeshi Taka', 'BDT');
INSERT INTO `jos_vm_currency` VALUES ('14', 'Bulgarian Lev', 'BGL');
INSERT INTO `jos_vm_currency` VALUES ('15', 'Bahraini Dinar', 'BHD');
INSERT INTO `jos_vm_currency` VALUES ('16', 'Burundi Franc', 'BIF');
INSERT INTO `jos_vm_currency` VALUES ('17', 'Bermudian Dollar', 'BMD');
INSERT INTO `jos_vm_currency` VALUES ('18', 'Brunei Dollar', 'BND');
INSERT INTO `jos_vm_currency` VALUES ('19', 'Bolivian Boliviano', 'BOB');
INSERT INTO `jos_vm_currency` VALUES ('20', 'Brazilian Real', 'BRL');
INSERT INTO `jos_vm_currency` VALUES ('21', 'Bahamian Dollar', 'BSD');
INSERT INTO `jos_vm_currency` VALUES ('22', 'Bhutan Ngultrum', 'BTN');
INSERT INTO `jos_vm_currency` VALUES ('23', 'Burma Kyat', 'BUK');
INSERT INTO `jos_vm_currency` VALUES ('24', 'Botswanian Pula', 'BWP');
INSERT INTO `jos_vm_currency` VALUES ('25', 'Belize Dollar', 'BZD');
INSERT INTO `jos_vm_currency` VALUES ('26', 'Canadian Dollar', 'CAD');
INSERT INTO `jos_vm_currency` VALUES ('27', 'Swiss Franc', 'CHF');
INSERT INTO `jos_vm_currency` VALUES ('28', 'Chilean Unidades de Fomento', 'CLF');
INSERT INTO `jos_vm_currency` VALUES ('29', 'Chilean Peso', 'CLP');
INSERT INTO `jos_vm_currency` VALUES ('30', 'Yuan (Chinese) Renminbi', 'CNY');
INSERT INTO `jos_vm_currency` VALUES ('31', 'Colombian Peso', 'COP');
INSERT INTO `jos_vm_currency` VALUES ('32', 'Costa Rican Colon', 'CRC');
INSERT INTO `jos_vm_currency` VALUES ('33', 'Czech Koruna', 'CZK');
INSERT INTO `jos_vm_currency` VALUES ('34', 'Cuban Peso', 'CUP');
INSERT INTO `jos_vm_currency` VALUES ('35', 'Cape Verde Escudo', 'CVE');
INSERT INTO `jos_vm_currency` VALUES ('36', 'Cyprus Pound', 'CYP');
INSERT INTO `jos_vm_currency` VALUES ('40', 'Danish Krone', 'DKK');
INSERT INTO `jos_vm_currency` VALUES ('41', 'Dominican Peso', 'DOP');
INSERT INTO `jos_vm_currency` VALUES ('42', 'Algerian Dinar', 'DZD');
INSERT INTO `jos_vm_currency` VALUES ('43', 'Ecuador Sucre', 'ECS');
INSERT INTO `jos_vm_currency` VALUES ('44', 'Egyptian Pound', 'EGP');
INSERT INTO `jos_vm_currency` VALUES ('46', 'Ethiopian Birr', 'ETB');
INSERT INTO `jos_vm_currency` VALUES ('47', 'Euro', 'EUR');
INSERT INTO `jos_vm_currency` VALUES ('49', 'Fiji Dollar', 'FJD');
INSERT INTO `jos_vm_currency` VALUES ('50', 'Falkland Islands Pound', 'FKP');
INSERT INTO `jos_vm_currency` VALUES ('52', 'British Pound', 'GBP');
INSERT INTO `jos_vm_currency` VALUES ('53', 'Ghanaian Cedi', 'GHC');
INSERT INTO `jos_vm_currency` VALUES ('54', 'Gibraltar Pound', 'GIP');
INSERT INTO `jos_vm_currency` VALUES ('55', 'Gambian Dalasi', 'GMD');
INSERT INTO `jos_vm_currency` VALUES ('56', 'Guinea Franc', 'GNF');
INSERT INTO `jos_vm_currency` VALUES ('58', 'Guatemalan Quetzal', 'GTQ');
INSERT INTO `jos_vm_currency` VALUES ('59', 'Guinea-Bissau Peso', 'GWP');
INSERT INTO `jos_vm_currency` VALUES ('60', 'Guyanan Dollar', 'GYD');
INSERT INTO `jos_vm_currency` VALUES ('61', 'Hong Kong Dollar', 'HKD');
INSERT INTO `jos_vm_currency` VALUES ('62', 'Honduran Lempira', 'HNL');
INSERT INTO `jos_vm_currency` VALUES ('63', 'Haitian Gourde', 'HTG');
INSERT INTO `jos_vm_currency` VALUES ('64', 'Hungarian Forint', 'HUF');
INSERT INTO `jos_vm_currency` VALUES ('65', 'Indonesian Rupiah', 'IDR');
INSERT INTO `jos_vm_currency` VALUES ('66', 'Irish Punt', 'IEP');
INSERT INTO `jos_vm_currency` VALUES ('67', 'Israeli Shekel', 'ILS');
INSERT INTO `jos_vm_currency` VALUES ('68', 'Indian Rupee', 'INR');
INSERT INTO `jos_vm_currency` VALUES ('69', 'Iraqi Dinar', 'IQD');
INSERT INTO `jos_vm_currency` VALUES ('70', 'Iranian Rial', 'IRR');
INSERT INTO `jos_vm_currency` VALUES ('73', 'Jamaican Dollar', 'JMD');
INSERT INTO `jos_vm_currency` VALUES ('74', 'Jordanian Dinar', 'JOD');
INSERT INTO `jos_vm_currency` VALUES ('75', 'Japanese Yen', 'JPY');
INSERT INTO `jos_vm_currency` VALUES ('76', 'Kenyan Shilling', 'KES');
INSERT INTO `jos_vm_currency` VALUES ('77', 'Kampuchean (Cambodian) Riel', 'KHR');
INSERT INTO `jos_vm_currency` VALUES ('78', 'Comoros Franc', 'KMF');
INSERT INTO `jos_vm_currency` VALUES ('79', 'North Korean Won', 'KPW');
INSERT INTO `jos_vm_currency` VALUES ('80', '(South) Korean Won', 'KRW');
INSERT INTO `jos_vm_currency` VALUES ('81', 'Kuwaiti Dinar', 'KWD');
INSERT INTO `jos_vm_currency` VALUES ('82', 'Cayman Islands Dollar', 'KYD');
INSERT INTO `jos_vm_currency` VALUES ('83', 'Lao Kip', 'LAK');
INSERT INTO `jos_vm_currency` VALUES ('84', 'Lebanese Pound', 'LBP');
INSERT INTO `jos_vm_currency` VALUES ('85', 'Sri Lanka Rupee', 'LKR');
INSERT INTO `jos_vm_currency` VALUES ('86', 'Liberian Dollar', 'LRD');
INSERT INTO `jos_vm_currency` VALUES ('87', 'Lesotho Loti', 'LSL');
INSERT INTO `jos_vm_currency` VALUES ('89', 'Libyan Dinar', 'LYD');
INSERT INTO `jos_vm_currency` VALUES ('90', 'Moroccan Dirham', 'MAD');
INSERT INTO `jos_vm_currency` VALUES ('91', 'Malagasy Franc', 'MGF');
INSERT INTO `jos_vm_currency` VALUES ('92', 'Mongolian Tugrik', 'MNT');
INSERT INTO `jos_vm_currency` VALUES ('93', 'Macau Pataca', 'MOP');
INSERT INTO `jos_vm_currency` VALUES ('94', 'Mauritanian Ouguiya', 'MRO');
INSERT INTO `jos_vm_currency` VALUES ('95', 'Maltese Lira', 'MTL');
INSERT INTO `jos_vm_currency` VALUES ('96', 'Mauritius Rupee', 'MUR');
INSERT INTO `jos_vm_currency` VALUES ('97', 'Maldive Rufiyaa', 'MVR');
INSERT INTO `jos_vm_currency` VALUES ('98', 'Malawi Kwacha', 'MWK');
INSERT INTO `jos_vm_currency` VALUES ('99', 'Mexican Peso', 'MXP');
INSERT INTO `jos_vm_currency` VALUES ('100', 'Malaysian Ringgit', 'MYR');
INSERT INTO `jos_vm_currency` VALUES ('101', 'Mozambique Metical', 'MZM');
INSERT INTO `jos_vm_currency` VALUES ('102', 'Nigerian Naira', 'NGN');
INSERT INTO `jos_vm_currency` VALUES ('103', 'Nicaraguan Cordoba', 'NIC');
INSERT INTO `jos_vm_currency` VALUES ('105', 'Norwegian Kroner', 'NOK');
INSERT INTO `jos_vm_currency` VALUES ('106', 'Nepalese Rupee', 'NPR');
INSERT INTO `jos_vm_currency` VALUES ('107', 'New Zealand Dollar', 'NZD');
INSERT INTO `jos_vm_currency` VALUES ('108', 'Omani Rial', 'OMR');
INSERT INTO `jos_vm_currency` VALUES ('109', 'Panamanian Balboa', 'PAB');
INSERT INTO `jos_vm_currency` VALUES ('110', 'Peruvian Nuevo Sol', 'PEN');
INSERT INTO `jos_vm_currency` VALUES ('111', 'Papua New Guinea Kina', 'PGK');
INSERT INTO `jos_vm_currency` VALUES ('112', 'Philippine Peso', 'PHP');
INSERT INTO `jos_vm_currency` VALUES ('113', 'Pakistan Rupee', 'PKR');
INSERT INTO `jos_vm_currency` VALUES ('114', 'Polish Złoty', 'PLN');
INSERT INTO `jos_vm_currency` VALUES ('116', 'Paraguay Guarani', 'PYG');
INSERT INTO `jos_vm_currency` VALUES ('117', 'Qatari Rial', 'QAR');
INSERT INTO `jos_vm_currency` VALUES ('118', 'Romanian Leu', 'RON');
INSERT INTO `jos_vm_currency` VALUES ('119', 'Rwanda Franc', 'RWF');
INSERT INTO `jos_vm_currency` VALUES ('120', 'Saudi Arabian Riyal', 'SAR');
INSERT INTO `jos_vm_currency` VALUES ('121', 'Solomon Islands Dollar', 'SBD');
INSERT INTO `jos_vm_currency` VALUES ('122', 'Seychelles Rupee', 'SCR');
INSERT INTO `jos_vm_currency` VALUES ('123', 'Sudanese Pound', 'SDP');
INSERT INTO `jos_vm_currency` VALUES ('124', 'Swedish Krona', 'SEK');
INSERT INTO `jos_vm_currency` VALUES ('125', 'Singapore Dollar', 'SGD');
INSERT INTO `jos_vm_currency` VALUES ('126', 'St. Helena Pound', 'SHP');
INSERT INTO `jos_vm_currency` VALUES ('127', 'Sierra Leone Leone', 'SLL');
INSERT INTO `jos_vm_currency` VALUES ('128', 'Somali Shilling', 'SOS');
INSERT INTO `jos_vm_currency` VALUES ('129', 'Suriname Guilder', 'SRG');
INSERT INTO `jos_vm_currency` VALUES ('130', 'Sao Tome and Principe Dobra', 'STD');
INSERT INTO `jos_vm_currency` VALUES ('131', 'Russian Ruble', 'RUB');
INSERT INTO `jos_vm_currency` VALUES ('132', 'El Salvador Colon', 'SVC');
INSERT INTO `jos_vm_currency` VALUES ('133', 'Syrian Potmd', 'SYP');
INSERT INTO `jos_vm_currency` VALUES ('134', 'Swaziland Lilangeni', 'SZL');
INSERT INTO `jos_vm_currency` VALUES ('135', 'Thai Bath', 'THB');
INSERT INTO `jos_vm_currency` VALUES ('136', 'Tunisian Dinar', 'TND');
INSERT INTO `jos_vm_currency` VALUES ('137', 'Tongan Pa\'anga', 'TOP');
INSERT INTO `jos_vm_currency` VALUES ('138', 'East Timor Escudo', 'TPE');
INSERT INTO `jos_vm_currency` VALUES ('139', 'Turkish Lira', 'TRY');
INSERT INTO `jos_vm_currency` VALUES ('140', 'Trinidad and Tobago Dollar', 'TTD');
INSERT INTO `jos_vm_currency` VALUES ('141', 'Taiwan Dollar', 'TWD');
INSERT INTO `jos_vm_currency` VALUES ('142', 'Tanzanian Shilling', 'TZS');
INSERT INTO `jos_vm_currency` VALUES ('143', 'Uganda Shilling', 'UGS');
INSERT INTO `jos_vm_currency` VALUES ('144', 'US Dollar', 'USD');
INSERT INTO `jos_vm_currency` VALUES ('145', 'Uruguayan Peso', 'UYP');
INSERT INTO `jos_vm_currency` VALUES ('146', 'Venezualan Bolivar', 'VEB');
INSERT INTO `jos_vm_currency` VALUES ('147', 'Vietnamese Dong', 'VND');
INSERT INTO `jos_vm_currency` VALUES ('148', 'Vanuatu Vatu', 'VUV');
INSERT INTO `jos_vm_currency` VALUES ('149', 'Samoan Tala', 'WST');
INSERT INTO `jos_vm_currency` VALUES ('150', 'Democratic Yemeni Dinar', 'YDD');
INSERT INTO `jos_vm_currency` VALUES ('151', 'Yemeni Rial', 'YER');
INSERT INTO `jos_vm_currency` VALUES ('152', 'Dinar', 'RSD');
INSERT INTO `jos_vm_currency` VALUES ('153', 'South African Rand', 'ZAR');
INSERT INTO `jos_vm_currency` VALUES ('154', 'Zambian Kwacha', 'ZMK');
INSERT INTO `jos_vm_currency` VALUES ('155', 'Zaire Zaire', 'ZRZ');
INSERT INTO `jos_vm_currency` VALUES ('156', 'Zimbabwe Dollar', 'ZWD');
INSERT INTO `jos_vm_currency` VALUES ('157', 'Slovak Koruna', 'SKK');
INSERT INTO `jos_vm_currency` VALUES ('158', 'Armenian Dram', 'AMD');
INSERT INTO `jos_vm_function` VALUES ('1', '1', 'userAdd', 'ps_user', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('2', '1', 'userDelete', 'ps_user', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('3', '1', 'userUpdate', 'ps_user', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('31', '2', 'productAdd', 'ps_product', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('6', '1', 'functionAdd', 'ps_function', 'add', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('7', '1', 'functionUpdate', 'ps_function', 'update', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('8', '1', 'functionDelete', 'ps_function', 'delete', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('9', '1', 'userLogout', 'ps_user', 'logout', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('10', '1', 'userAddressAdd', 'ps_user_address', 'add', '', 'admin,storeadmin,shopper,demo');
INSERT INTO `jos_vm_function` VALUES ('11', '1', 'userAddressUpdate', 'ps_user_address', 'update', '', 'admin,storeadmin,shopper');
INSERT INTO `jos_vm_function` VALUES ('12', '1', 'userAddressDelete', 'ps_user_address', 'delete', '', 'admin,storeadmin,shopper');
INSERT INTO `jos_vm_function` VALUES ('13', '1', 'moduleAdd', 'ps_module', 'add', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('14', '1', 'moduleUpdate', 'ps_module', 'update', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('15', '1', 'moduleDelete', 'ps_module', 'delete', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('16', '1', 'userLogin', 'ps_user', 'login', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('17', '3', 'vendorAdd', 'ps_vendor', 'add', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('18', '3', 'vendorUpdate', 'ps_vendor', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('19', '3', 'vendorDelete', 'ps_vendor', 'delete', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('20', '3', 'vendorCategoryAdd', 'ps_vendor_category', 'add', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('21', '3', 'vendorCategoryUpdate', 'ps_vendor_category', 'update', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('22', '3', 'vendorCategoryDelete', 'ps_vendor_category', 'delete', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('23', '4', 'shopperAdd', 'ps_shopper', 'add', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('24', '4', 'shopperDelete', 'ps_shopper', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('25', '4', 'shopperUpdate', 'ps_shopper', 'update', '', 'admin,storeadmin,shopper');
INSERT INTO `jos_vm_function` VALUES ('26', '4', 'shopperGroupAdd', 'ps_shopper_group', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('27', '4', 'shopperGroupUpdate', 'ps_shopper_group', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('28', '4', 'shopperGroupDelete', 'ps_shopper_group', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('30', '5', 'orderStatusSet', 'ps_order', 'order_status_update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('32', '2', 'productDelete', 'ps_product', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('33', '2', 'productUpdate', 'ps_product', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('34', '2', 'productCategoryAdd', 'ps_product_category', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('35', '2', 'productCategoryUpdate', 'ps_product_category', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('36', '2', 'productCategoryDelete', 'ps_product_category', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('37', '2', 'productPriceAdd', 'ps_product_price', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('38', '2', 'productPriceUpdate', 'ps_product_price', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('39', '2', 'productPriceDelete', 'ps_product_price', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('40', '2', 'productAttributeAdd', 'ps_product_attribute', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('41', '2', 'productAttributeUpdate', 'ps_product_attribute', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('42', '2', 'productAttributeDelete', 'ps_product_attribute', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('43', '7', 'cartAdd', 'ps_cart', 'add', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('44', '7', 'cartUpdate', 'ps_cart', 'update', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('45', '7', 'cartDelete', 'ps_cart', 'delete', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('46', '10', 'checkoutComplete', 'ps_checkout', 'add', '', 'shopper,storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('48', '8', 'paymentMethodUpdate', 'ps_payment_method', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('49', '8', 'paymentMethodAdd', 'ps_payment_method', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('50', '8', 'paymentMethodDelete', 'ps_payment_method', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('51', '5', 'orderDelete', 'ps_order', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('52', '11', 'addTaxRate', 'ps_tax', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('53', '11', 'updateTaxRate', 'ps_tax', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('54', '11', 'deleteTaxRate', 'ps_tax', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('55', '10', 'checkoutValidateST', 'ps_checkout', 'validate_shipto', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('59', '5', 'orderStatusUpdate', 'ps_order_status', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('60', '5', 'orderStatusAdd', 'ps_order_status', 'add', '', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('61', '5', 'orderStatusDelete', 'ps_order_status', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('62', '1', 'currencyAdd', 'ps_currency', 'add', 'add a currency', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('63', '1', 'currencyUpdate', 'ps_currency', 'update', '        update a currency', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('64', '1', 'currencyDelete', 'ps_currency', 'delete', 'delete a currency', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('65', '1', 'countryAdd', 'ps_country', 'add', 'Add a country ', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('66', '1', 'countryUpdate', 'ps_country', 'update', 'Update a country record', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('67', '1', 'countryDelete', 'ps_country', 'delete', 'Delete a country record', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('68', '2', 'product_csv', 'ps_csv', 'upload_csv', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('110', '7', 'waitingListAdd', 'zw_waiting_list', 'add', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('111', '13', 'addzone', 'ps_zone', 'add', 'This will add a zone', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('112', '13', 'updatezone', 'ps_zone', 'update', 'This will update a zone', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('113', '13', 'deletezone', 'ps_zone', 'delete', 'This will delete a zone', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('114', '13', 'zoneassign', 'ps_zone', 'assign', 'This will assign a country to a zone', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('115', '1', 'writeConfig', 'ps_config', 'writeconfig', 'This will write the configuration details to virtuemart.cfg.php', 'admin');
INSERT INTO `jos_vm_function` VALUES ('116', '12839', 'carrierAdd', 'ps_shipping', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('117', '12839', 'carrierDelete', 'ps_shipping', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('118', '12839', 'carrierUpdate', 'ps_shipping', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('119', '12839', 'rateAdd', 'ps_shipping', 'rate_add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('120', '12839', 'rateUpdate', 'ps_shipping', 'rate_update', '', 'admin,shopadmin');
INSERT INTO `jos_vm_function` VALUES ('121', '12839', 'rateDelete', 'ps_shipping', 'rate_delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('122', '10', 'checkoutProcess', 'ps_checkout', 'process', '', 'none');
INSERT INTO `jos_vm_function` VALUES ('123', '5', 'downloadRequest', 'ps_order', 'download_request', 'This checks if the download request is valid and sends the file to the browser as file download if the request was successful, otherwise echoes an error', 'none');
INSERT INTO `jos_vm_function` VALUES ('128', '99', 'manufacturerAdd', 'ps_manufacturer', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('129', '99', 'manufacturerUpdate', 'ps_manufacturer', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('130', '99', 'manufacturerDelete', 'ps_manufacturer', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('131', '99', 'manufacturercategoryAdd', 'ps_manufacturer_category', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('132', '99', 'manufacturercategoryUpdate', 'ps_manufacturer_category', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('133', '99', 'manufacturercategoryDelete', 'ps_manufacturer_category', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('134', '7', 'addReview', 'ps_reviews', 'process_review', 'This lets the user add a review and rating to a product.', 'admin,storeadmin,shopper,demo');
INSERT INTO `jos_vm_function` VALUES ('135', '7', 'productReviewDelete', 'ps_reviews', 'delete_review', 'This deletes a review and from a product.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('136', '8', 'creditcardAdd', 'ps_creditcard', 'add', 'Adds a Credit Card entry.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('137', '8', 'creditcardUpdate', 'ps_creditcard', 'update', 'Updates a Credit Card entry.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('138', '8', 'creditcardDelete', 'ps_creditcard', 'delete', 'Deletes a Credit Card entry.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('139', '2', 'changePublishState', 'vmAbstractObject.class', 'handlePublishState', 'Changes the publish field of an item, so that it can be published or unpublished easily.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('140', '2', 'export_csv', 'ps_csv', 'export_csv', 'This function exports all relevant product data to CSV.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('141', '2', 'reorder', 'ps_product_category', 'reorder', 'Changes the list order of a category.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('142', '2', 'discountAdd', 'ps_product_discount', 'add', 'Adds a discount.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('143', '2', 'discountUpdate', 'ps_product_discount', 'update', 'Updates a discount.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('144', '2', 'discountDelete', 'ps_product_discount', 'delete', 'Deletes a discount.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('145', '8', 'shippingmethodSave', 'ps_shipping_method', 'save', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('146', '2', 'uploadProductFile', 'ps_product_files', 'add', 'Uploads and Adds a Product Image/File.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('147', '2', 'updateProductFile', 'ps_product_files', 'update', 'Updates a Product Image/File.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('148', '2', 'deleteProductFile', 'ps_product_files', 'delete', 'Deletes a Product Image/File.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('149', '12843', 'couponAdd', 'ps_coupon', 'add_coupon_code', 'Adds a Coupon.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('150', '12843', 'couponUpdate', 'ps_coupon', 'update_coupon', 'Updates a Coupon.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('151', '12843', 'couponDelete', 'ps_coupon', 'remove_coupon_code', 'Deletes a Coupon.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('152', '12843', 'couponProcess', 'ps_coupon', 'process_coupon_code', 'Processes a Coupon.', 'admin,storeadmin,shopper,demo');
INSERT INTO `jos_vm_function` VALUES ('153', '2', 'ProductTypeAdd', 'ps_product_type', 'add', 'Function add a Product Type and create new table product_type_<id>.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('154', '2', 'ProductTypeUpdate', 'ps_product_type', 'update', 'Update a Product Type.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('155', '2', 'ProductTypeDelete', 'ps_product_type', 'delete', 'Delete a Product Type and drop table product_type_<id>.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('156', '2', 'ProductTypeReorder', 'ps_product_type', 'reorder', 'Changes the list order of a Product Type.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('157', '2', 'ProductTypeAddParam', 'ps_product_type_parameter', 'add_parameter', 'Function add a Parameter into a Product Type and create new column in table product_type_<id>.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('158', '2', 'ProductTypeUpdateParam', 'ps_product_type_parameter', 'update_parameter', 'Function update a Parameter in a Product Type and a column in table product_type_<id>.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('159', '2', 'ProductTypeDeleteParam', 'ps_product_type_parameter', 'delete_parameter', 'Function delete a Parameter from a Product Type and drop a column in table product_type_<id>.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('160', '2', 'ProductTypeReorderParam', 'ps_product_type_parameter', 'reorder_parameter', 'Changes the list order of a Parameter.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('161', '2', 'productProductTypeAdd', 'ps_product_product_type', 'add', 'Add a Product into a Product Type.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('162', '2', 'productProductTypeDelete', 'ps_product_product_type', 'delete', 'Delete a Product from a Product Type.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('163', '1', 'stateAdd', 'ps_country', 'addState', 'Add a State ', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('164', '1', 'stateUpdate', 'ps_country', 'updateState', 'Update a state record', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('165', '1', 'stateDelete', 'ps_country', 'deleteState', 'Delete a state record', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('166', '2', 'csvFieldAdd', 'ps_csv', 'add', 'Add a CSV Field ', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('167', '2', 'csvFieldUpdate', 'ps_csv', 'update', 'Update a CSV Field', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('168', '2', 'csvFieldDelete', 'ps_csv', 'delete', 'Delete a CSV Field', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('169', '1', 'userfieldSave', 'ps_userfield', 'savefield', 'add or edit a user field', 'admin');
INSERT INTO `jos_vm_function` VALUES ('170', '1', 'userfieldDelete', 'ps_userfield', 'deletefield', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('171', '1', 'changeordering', 'vmAbstractObject.class', 'handleordering', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('172', '2', 'moveProduct', 'ps_product', 'move', 'Move products from one category to another.', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('173', '7', 'productAsk', 'ps_communication', 'mail_question', 'Lets the customer send a question about a specific product.', 'none');
INSERT INTO `jos_vm_function` VALUES ('174', '7', 'recommendProduct', 'ps_communication', 'sendRecommendation', 'Lets the customer send a recommendation about a specific product to a friend.', 'none');
INSERT INTO `jos_vm_function` VALUES ('175', '2', 'reviewUpdate', 'ps_reviews', 'update', 'Modify a review about a specific product.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('176', '8', 'ExportUpdate', 'ps_export', 'update', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('177', '8', 'ExportAdd', 'ps_export', 'add', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('178', '8', 'ExportDelete', 'ps_export', 'delete', '', 'admin,storeadmin');
INSERT INTO `jos_vm_function` VALUES ('179', '1', 'writeThemeConfig', 'ps_config', 'writeThemeConfig', 'Writes a theme configuration file.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('180', '1', 'usergroupAdd', 'usergroup.class', 'add', 'Add a new user group', 'admin');
INSERT INTO `jos_vm_function` VALUES ('181', '1', 'usergroupUpdate', 'usergroup.class', 'update', 'Update an user group', 'admin');
INSERT INTO `jos_vm_function` VALUES ('182', '1', 'usergroupDelete', 'usergroup.class', 'delete', 'Delete an user group', 'admin');
INSERT INTO `jos_vm_function` VALUES ('183', '1', 'setModulePermissions', 'ps_module', 'update_permissions', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('184', '1', 'setFunctionPermissions', 'ps_function', 'update_permissions', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('185', '2', 'insertDownloadsForProduct', 'ps_order', 'insert_downloads_for_product', '', 'admin');
INSERT INTO `jos_vm_function` VALUES ('186', '5', 'mailDownloadId', 'ps_order', 'mail_download_id', '', 'storeadmin,admin');
INSERT INTO `jos_vm_function` VALUES ('187', '7', 'replaceSavedCart', 'ps_cart', 'replaceCart', 'Replace cart with saved cart', 'none');
INSERT INTO `jos_vm_function` VALUES ('188', '7', 'mergeSavedCart', 'ps_cart', 'mergeSaved', 'Merge saved cart with cart', 'none');
INSERT INTO `jos_vm_function` VALUES ('189', '7', 'deleteSavedCart', 'ps_cart', 'deleteCart', 'Delete saved cart', 'none');
INSERT INTO `jos_vm_function` VALUES ('190', '7', 'savedCartDelete', 'ps_cart', 'deleteSaved', 'Delete items from saved cart', 'none');
INSERT INTO `jos_vm_function` VALUES ('191', '7', 'savedCartUpdate', 'ps_cart', 'updateSaved', 'Update saved cart items', 'none');
INSERT INTO `jos_vm_function` VALUES ('192', '1', 'getupdatepackage', 'update.class', 'getPatchPackage', 'Retrieves the Patch Package from the virtuemart.net Servers.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('193', '1', 'applypatchpackage', 'update.class', 'applyPatch', 'Applies the Patch using the instructions from the update.xml file in the downloaded patch.', 'admin');
INSERT INTO `jos_vm_function` VALUES ('194', '1', 'removePatchPackage', 'update.class', 'removePackageFile', 'Removes  a Patch Package File and its extracted contents.', 'admin');
INSERT INTO `jos_vm_manufacturer` VALUES ('1', 'Manufacturer', 'info@manufacturer.com', 'An example for a manufacturer', '1', 'http://www.a-url.com');
INSERT INTO `jos_vm_manufacturer_category` VALUES ('1', '-default-', 'This is the default manufacturer category');
INSERT INTO `jos_vm_module` VALUES ('1', 'admin', '<h4>ADMINISTRATIVE USERS ONLY</h4>\r\n\r\n<p>Only used for the following:</p>\r\n<OL>\r\n\r\n<LI>User Maintenance</LI>\r\n<LI>Module Maintenance</LI>\r\n<LI>Function Maintenance</LI>\r\n</OL>\r\n', 'admin', 'Y', '1');
INSERT INTO `jos_vm_module` VALUES ('2', 'product', '<p>Here you can adminster your online catalog of products.  The Product Administrator allows you to create product categories, create new products, edit product attributes, and add product items for each attribute value.</p>', 'storeadmin,admin', 'Y', '4');
INSERT INTO `jos_vm_module` VALUES ('3', 'vendor', '<h4>ADMINISTRATIVE USERS ONLY</h4>\r\n<p>Here you can manage the vendors on the phpShop system.</p>', 'admin', 'Y', '6');
INSERT INTO `jos_vm_module` VALUES ('4', 'shopper', '<p>Manage shoppers in your store.  Allows you to create shopper groups.  Shopper groups can be used when setting the price for a product.  This allows you to create different prices for different types of users.  An example of this would be to have a \'wholesale\' group and a \'retail\' group. </p>', 'admin,storeadmin', 'Y', '4');
INSERT INTO `jos_vm_module` VALUES ('5', 'order', '<p>View Order and Update Order Status.</p>', 'admin,storeadmin', 'Y', '5');
INSERT INTO `jos_vm_module` VALUES ('6', 'msgs', 'This module is unprotected an used for displaying system messages to users.  We need to have an area that does not require authorization when things go wrong.', 'none', 'N', '99');
INSERT INTO `jos_vm_module` VALUES ('7', 'shop', 'This is the Washupito store module.  This is the demo store included with the phpShop distribution.', 'none', 'Y', '99');
INSERT INTO `jos_vm_module` VALUES ('8', 'store', '', 'storeadmin,admin', 'Y', '2');
INSERT INTO `jos_vm_module` VALUES ('9', 'account', 'This module allows shoppers to update their account information and view previously placed orders.', 'shopper,storeadmin,admin,demo', 'N', '99');
INSERT INTO `jos_vm_module` VALUES ('10', 'checkout', '', 'none', 'N', '99');
INSERT INTO `jos_vm_module` VALUES ('11', 'tax', 'The tax module allows you to set tax rates for states or regions within a country.  The rate is set as a decimal figure.  For example, 2 percent tax would be 0.02.', 'admin,storeadmin', 'Y', '8');
INSERT INTO `jos_vm_module` VALUES ('12', 'reportbasic', 'The report basic module allows you to do queries on all orders.', 'admin,storeadmin', 'Y', '7');
INSERT INTO `jos_vm_module` VALUES ('13', 'zone', 'This is the zone-shipping module. Here you can manage your shipping costs according to Zones.', 'admin,storeadmin', 'N', '9');
INSERT INTO `jos_vm_module` VALUES ('12839', 'shipping', '<h4>Shipping</h4><p>Let this module calculate the shipping fees for your customers.<br>Create carriers for shipping areas and weight groups.</p>', 'admin,storeadmin', 'Y', '10');
INSERT INTO `jos_vm_module` VALUES ('99', 'manufacturer', 'Manage the manufacturers of products in your store.', 'storeadmin,admin', 'Y', '12');
INSERT INTO `jos_vm_module` VALUES ('12842', 'help', 'Help Module', 'admin,storeadmin', 'Y', '13');
INSERT INTO `jos_vm_module` VALUES ('12843', 'coupon', 'Coupon Management', 'admin,storeadmin', 'Y', '11');
INSERT INTO `jos_vm_order_status` VALUES ('1', 'P', 'Pending', '', '1', '1');
INSERT INTO `jos_vm_order_status` VALUES ('2', 'C', 'Confirmed', '', '2', '1');
INSERT INTO `jos_vm_order_status` VALUES ('3', 'X', 'Cancelled', '', '3', '1');
INSERT INTO `jos_vm_order_status` VALUES ('4', 'R', 'Refunded', '', '4', '1');
INSERT INTO `jos_vm_order_status` VALUES ('5', 'S', 'Shipped', '', '5', '1');
INSERT INTO `jos_vm_payment_method` VALUES ('1', '1', 'Purchase Order', '', '6', '0.00', '0', '0.00', '0.00', '4', 'PO', 'N', '0', 'Y', '', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('2', '1', 'Cash On Delivery', '', '5', '-2.00', '0', '0.00', '0.00', '5', 'COD', 'N', '0', 'Y', '', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('3', '1', 'Credit Card', 'ps_authorize', '5', '0.00', '0', '0.00', '0.00', '0', 'AN', 'Y', '0', 'Y', '1,2,6,7,', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('4', '1', 'PayPal (new API)', 'ps_paypal_api', '5', '0.00', '0', '0.00', '0.00', '0', 'PP_API', 'Y', '1', 'Y', '', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('5', '1', 'PayMate', 'ps_paymate', '5', '0.00', '0', '0.00', '0.00', '0', 'PM', 'P', '0', 'N', '', '<script type=\"text/javascript\" language=\"javascript\">\n  function openExpress(){\n      var url = \'https://www.paymate.com/PayMate/ExpressPayment?mid=<?php echo PAYMATE_USERNAME.\n          \"&amt=\".$db->f(\"order_total\").\n   \"&currency=\".$_SESSION[\'vendor_currency\'].\n       \"&ref=\".$db->f(\"order_id\").\n      \"&pmt_sender_email=\".$user->email.\n         \"&pmt_contact_firstname=\".$user->first_name.\n       \"&pmt_contact_surname=\".$user->last_name.\n          \"&regindi_address1=\".$user->address_1.\n     \"&regindi_address2=\".$user->address_2.\n     \"&regindi_sub=\".$user->city.\n       \"&regindi_pcode=\".$user->zip;?>\'\n        var newWin = window.open(url, \'wizard\', \'height=640,width=500,scrollbars=0,toolbar=no\');\n  self.name = \'parent\';\n       newWin.focus();\n  }\n  </script>\n  <div align=\"center\">\n  <p>\n  <a href=\"javascript:openExpress();\">\n  <img src=\"https://www.paymate.com/homepage/images/butt_PayNow.gif\" border=\"0\" alt=\"Pay with Paymate Express\">\n  <br />click here to pay your account</a>\n  </p>\n  </div>', '');
INSERT INTO `jos_vm_payment_method` VALUES ('6', '1', 'WorldPay', 'ps_worldpay', '5', '0.00', '0', '0.00', '0.00', '0', 'WP', 'P', '0', 'N', '', '<form action=\"https://select.worldpay.com/wcc/purchase\" method=\"post\">\n                                                <input type=hidden name=\"testMode\" value=\"100\"> \n                                                  <input type=\"hidden\" name=\"instId\" value=\"<?php echo WORLDPAY_INST_ID ?>\" />\n                                            <input type=\"hidden\" name=\"cartId\" value=\"<?php echo $db->f(\"order_id\") ?>\" />\n                                               <input type=\"hidden\" name=\"amount\" value=\"<?php echo $db->f(\"order_total\") ?>\" />\n                                            <input type=\"hidden\" name=\"currency\" value=\"<?php echo $_SESSION[\'vendor_currency\'] ?>\" />\n                                           <input type=\"hidden\" name=\"desc\" value=\"Products\" />\n                                            <input type=\"hidden\" name=\"email\" value=\"<?php echo $user->email?>\" />\n                                                 <input type=\"hidden\" name=\"address\" value=\"<?php echo $user->address_1?>&#10<?php echo $user->address_2?>&#10<?php echo\n                                                $user->city?>&#10<?php echo $user->state?>\" />\n                                             <input type=\"hidden\" name=\"name\" value=\"<?php echo $user->title?><?php echo $user->first_name?>. <?php echo $user->middle_name?><?php echo $user->last_name?>\" />\n                                           <input type=\"hidden\" name=\"country\" value=\"<?php echo $user->country?>\"/>\n                                              <input type=\"hidden\" name=\"postcode\" value=\"<?php echo $user->zip?>\" />\n                                                <input type=\"hidden\" name=\"tel\"  value=\"<?php echo $user->phone_1?>\">\n                                                  <input type=\"hidden\" name=\"withDelivery\"  value=\"true\">\n                                                 <br />\n                                                <input type=\"submit\" value =\"PROCEED TO PAYMENT PAGE\" />\n                                                  </form>', '');
INSERT INTO `jos_vm_payment_method` VALUES ('7', '1', '2Checkout', 'ps_twocheckout', '5', '0.00', '0', '0.00', '0.00', '0', '2CO', 'P', '0', 'N', '', '<?php\n      $q  = \"SELECT * FROM #__users WHERE user_info_id=\'\".$db->f(\"user_info_id\").\"\'\"; \n    $dbbt = new ps_DB;\n   $dbbt->setQuery($q);\n        $dbbt->query();\n      $dbbt->next_record(); \n       // Get ship_to information\n    if( $db->f(\"user_info_id\") != $dbbt->f(\"user_info_id\")) {\n         $q2  = \"SELECT * FROM #__vm_user_info WHERE user_info_id=\'\".$db->f(\"user_info_id\").\"\'\"; \n    $dbst = new ps_DB;\n   $dbst->setQuery($q2);\n       $dbst->query();\n      $dbst->next_record();\n      }\n     else  {\n         $dbst = $dbbt;\n    }\n                     \n      //Authnet vars to send\n        $formdata = array (\n   \'x_login\' => TWOCO_LOGIN,\n   \'x_email_merchant\' => ((TWOCO_MERCHANT_EMAIL == \'True\') ? \'TRUE\' : \'FALSE\'),\n                  \n      // Customer Name and Billing Address\n  \'x_first_name\' => $dbbt->f(\"first_name\"),\n        \'x_last_name\' => $dbbt->f(\"last_name\"),\n  \'x_company\' => $dbbt->f(\"company\"),\n      \'x_address\' => $dbbt->f(\"address_1\"),\n    \'x_city\' => $dbbt->f(\"city\"),\n    \'x_state\' => $dbbt->f(\"state\"),\n  \'x_zip\' => $dbbt->f(\"zip\"),\n      \'x_country\' => $dbbt->f(\"country\"),\n      \'x_phone\' => $dbbt->f(\"phone_1\"),\n        \'x_fax\' => $dbbt->f(\"fax\"),\n      \'x_email\' => $dbbt->f(\"email\"),\n \n       // Customer Shipping Address\n  \'x_ship_to_first_name\' => $dbst->f(\"first_name\"),\n        \'x_ship_to_last_name\' => $dbst->f(\"last_name\"),\n  \'x_ship_to_company\' => $dbst->f(\"company\"),\n      \'x_ship_to_address\' => $dbst->f(\"address_1\"),\n    \'x_ship_to_city\' => $dbst->f(\"city\"),\n    \'x_ship_to_state\' => $dbst->f(\"state\"),\n  \'x_ship_to_zip\' => $dbst->f(\"zip\"),\n      \'x_ship_to_country\' => $dbst->f(\"country\"),\n     \n       \'x_invoice_num\' => $db->f(\"order_number\"),\n       \'x_receipt_link_url\' => SECUREURL.\"2checkout_notify.php\"\n  );\n    \n     if( TWOCO_TESTMODE == \"Y\" )\n   $formdata[\'demo\'] = \"Y\";\n       \n       $version = \"2\";\n    $url = \"https://www2.2checkout.com/2co/buyer/purchase\";\n    $formdata[\'x_amount\'] = number_format($db->f(\"order_total\"), 2, \'.\', \'\');\n \n       //build the post string\n       $poststring = \'\';\n  foreach($formdata AS $key => $val){\n          $poststring .= \"<input type=\'hidden\' name=\'$key\' value=\'$val\' />\n \";\n    }\n    \n      ?>\n    <form action=\"<?php echo $url ?>\" method=\"post\" target=\"_blank\">\n       <?php echo $poststring ?>\n    <p>Click on the Image below to pay...</p>\n     <input type=\"image\" name=\"submit\" src=\"https://www.2checkout.com/images/buy_logo.gif\" border=\"0\" alt=\"Make payments with 2Checkout, it\'s fast and secure!\" title=\"Pay your Order with 2Checkout, it\'s fast and secure!\" />\n      </form>', '');
INSERT INTO `jos_vm_payment_method` VALUES ('8', '1', 'NoChex', 'ps_nochex', '5', '0.00', '0', '0.00', '0.00', '0', 'NOCHEX', 'P', '0', 'N', '', '<form action=\"https://www.nochex.com/nochex.dll/checkout\" method=\"post\" target=\"_blank\"> \n                                                                                     <input type=\"hidden\" name=\"email\" value=\"<?php echo NOCHEX_EMAIL ?>\" />\n                                                                                 <input type=\"hidden\" name=\"amount\" value=\"<?php printf(\"%.2f\", $db->f(\"order_total\"))?>\" />\n                                                                                        <input type=\"hidden\" name=\"ordernumber\" value=\"<?php $db->p(\"order_id\") ?>\" />\n                                                                                       <input type=\"hidden\" name=\"logo\" value=\"<?php echo $vendor_image_url ?>\" />\n                                                                                    <input type=\"hidden\" name=\"returnurl\" value=\"<?php echo SECUREURL .\"index.php?option=com_virtuemart&amp;page=checkout.result&amp;order_id=\".$db->f(\"order_id\") ?>\" />\n                                                                                      <input type=\"image\" name=\"submit\" src=\"http://www.nochex.com/web/images/paymeanimated.gif\"> \n                                                                                    </form>', '');
INSERT INTO `jos_vm_payment_method` VALUES ('9', '1', 'Credit Card (PayMeNow)', 'ps_paymenow', '5', '0.00', '0', '0.00', '0.00', '0', 'PN', 'Y', '0', 'N', '1,2,3,', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('10', '1', 'eWay', 'ps_eway', '5', '0.00', '0', '0.00', '0.00', '0', 'EWAY', 'Y', '0', 'N', '', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('11', '1', 'eCheck.net', 'ps_echeck', '5', '0.00', '0', '0.00', '0.00', '0', 'ECK', 'B', '0', 'N', '', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('12', '1', 'Credit Card (eProcessingNetwork)', 'ps_epn', '5', '0.00', '0', '0.00', '0.00', '0', 'EPN', 'Y', '0', 'N', '1,2,3,', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('13', '1', 'iKobo', '', '5', '0.00', '0', '0.00', '0.00', '0', 'IK', 'P', '0', 'N', '', '<form action=\"https://www.iKobo.com/store/index.php\" method=\"post\"> \n  <input type=\"hidden\" name=\"cmd\" value=\"cart\" />Click on the image below to Pay with iKobo\n  <input type=\"image\" src=\"https://www.ikobo.com/merchant/buttons/ikobo_pay1.gif\" name=\"submit\" alt=\"Pay with iKobo\" /> \n  <input type=\"hidden\" name=\"poid\" value=\"USER_ID\" /> \n  <input type=\"hidden\" name=\"item\" value=\"Order: <?php $db->p(\"order_id\") ?>\" /> \n  <input type=\"hidden\" name=\"price\" value=\"<?php printf(\"%.2f\", $db->f(\"order_total\"))?>\" /> \n  <input type=\"hidden\" name=\"firstname\" value=\"<?php echo $user->first_name?>\" /> \n  <input type=\"hidden\" name=\"lastname\" value=\"<?php echo $user->last_name?>\" /> \n  <input type=\"hidden\" name=\"address\" value=\"<?php echo $user->address_1?>&#10<?php echo $user->address_2?>\" /> \n  <input type=\"hidden\" name=\"city\" value=\"<?php echo $user->city?>\" /> \n  <input type=\"hidden\" name=\"state\" value=\"<?php echo $user->state?>\" /> \n  <input type=\"hidden\" name=\"zip\" value=\"<?php echo $user->zip?>\" /> \n  <input type=\"hidden\" name=\"phone\" value=\"<?php echo $user->phone_1?>\" /> \n  <input type=\"hidden\" name=\"email\" value=\"<?php echo $user->email?>\" /> \n  </form> >', '');
INSERT INTO `jos_vm_payment_method` VALUES ('14', '1', 'iTransact', '', '5', '0.00', '0', '0.00', '0.00', '0', 'ITR', 'P', '0', 'N', '', '<?php\n  //your iTransact account details\n  $vendorID = \"XXXXX\";\n  global $vendor_name;\n  $mername = $vendor_name;\n  \n  //order details\n  $total = $db->f(\"order_total\");$first_name = $user->first_name;$last_name = $user->last_name;$address = $user->address_1;$city = $user->city;$state = $user->state;$zip = $user->zip;$country = $user->country;$email = $user->email;$phone = $user->phone_1;$home_page = $mosConfig_live_site.\"/index.php\";$ret_addr = $mosConfig_live_site.\"/index.php\";$cc_payment_image = $mosConfig_live_site.\"/components/com_virtuemart/shop_image/ps_image/cc_payment.jpg\";\n  ?>\n  <form action=\"https://secure.paymentclearing.com/cgi-bin/mas/split.cgi\" method=\"POST\"> \n                <input type=\"hidden\" name=\"vendor_id\" value=\"<?php echo $vendorID; ?>\" />\n              <input type=\"hidden\" name=\"home_page\" value=\"<?php echo $home_page; ?>\" />\n             <input type=\"hidden\" name=\"ret_addr\" value=\"<?php echo $ret_addr; ?>\" />\n               <input type=\"hidden\" name=\"mername\" value=\"<?php echo $mername; ?>\" />\n         <!--Enter text in the next value that should appear on the bottom of the order form.-->\n               <INPUT type=\"hidden\" name=\"mertext\" value=\"\" />\n         <!--If you are accepting checks, enter the number 1 in the next value.  Enter the number 0 if you are not accepting checks.-->\n                <INPUT type=\"hidden\" name=\"acceptchecks\" value=\"0\" />\n           <!--Enter the number 1 in the next value if you want to allow pre-registered customers to pay with a check.  Enter the number 0 if not.-->\n            <INPUT type=\"hidden\" name=\"allowreg\" value=\"0\" />\n               <!--If you are set up with Check Guarantee, enter the number 1 in the next value.  Enter the number 0 if not.-->\n              <INPUT type=\"hidden\" name=\"checkguar\" value=\"0\" />\n              <!--Enter the number 1 in the next value if you are accepting credit card payments.  Enter the number zero if not.-->\n         <INPUT type=\"hidden\" name=\"acceptcards\" value=\"1\">\n              <!--Enter the number 1 in the next value if you want to allow a separate mailing address for credit card orders.  Enter the number 0 if not.-->\n               <INPUT type=\"hidden\" name=\"altaddr\" value=\"0\" />\n                <!--Enter the number 1 in the next value if you want the customer to enter the CVV number for card orders.  Enter the number 0 if not.-->\n             <INPUT type=\"hidden\" name=\"showcvv\" value=\"1\" />\n                \n              <input type=\"hidden\" name=\"1-desc\" value=\"Order Total\" />\n               <input type=\"hidden\" name=\"1-cost\" value=\"<?php echo $total; ?>\" />\n            <input type=\"hidden\" name=\"1-qty\" value=\"1\" />\n          <input type=\"hidden\" name=\"total\" value=\"<?php echo $total; ?>\" />\n             <input type=\"hidden\" name=\"first_name\" value=\"<?php echo $first_name; ?>\" />\n           <input type=\"hidden\" name=\"last_name\" value=\"<?php echo $last_name; ?>\" />\n             <input type=\"hidden\" name=\"address\" value=\"<?php echo $address; ?>\" />\n         <input type=\"hidden\" name=\"city\" value=\"<?php echo $city; ?>\" />\n               <input type=\"hidden\" name=\"state\" value=\"<?php echo $state; ?>\" />\n             <input type=\"hidden\" name=\"zip\" value=\"<?php echo $zip; ?>\" />\n         <input type=\"hidden\" name=\"country\" value=\"<?php echo $country; ?>\" />\n         <input type=\"hidden\" name=\"phone\" value=\"<?php echo $phone; ?>\" />\n             <input type=\"hidden\" name=\"email\" value=\"<?php echo $email; ?>\" />\n             <p><input type=\"image\" alt=\"Process Secure Credit Card Transaction using iTransact\" border=\"0\" height=\"60\" width=\"210\" src=\"<?php echo $cc_payment_image; ?>\" /> </p>\n            </form>', '');
INSERT INTO `jos_vm_payment_method` VALUES ('15', '1', 'Verisign PayFlow Pro', 'payflow_pro', '5', '0.00', '0', '0.00', '0.00', '0', 'PFP', 'Y', '0', 'Y', '1,2,6,7,', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('16', '1', 'Dankort/PBS via ePay', 'ps_epay', '5', '0.00', '0', '0.00', '0.00', '0', 'EPAY', 'P', '0', 'Y', '', '<?php\r\nrequire_once(CLASSPATH .\"payment/ps_epay.cfg.php\");\r\n$url=basename($mosConfig_live_site);\r\nfunction get_iso_code($code) {\r\nswitch ($code) {\r\ncase \"ADP\": return \"020\"; break;\r\ncase \"AED\": return \"784\"; break;\r\ncase \"AFA\": return \"004\"; break;\r\ncase \"ALL\": return \"008\"; break;\r\ncase \"AMD\": return \"051\"; break;\r\ncase \"ANG\": return \"532\"; break;\r\ncase \"AOA\": return \"973\"; break;\r\ncase \"ARS\": return \"032\"; break;\r\ncase \"AUD\": return \"036\"; break;\r\ncase \"AWG\": return \"533\"; break;\r\ncase \"AZM\": return \"031\"; break;\r\ncase \"BAM\": return \"977\"; break;\r\ncase \"BBD\": return \"052\"; break;\r\ncase \"BDT\": return \"050\"; break;\r\ncase \"BGL\": return \"100\"; break;\r\ncase \"BGN\": return \"975\"; break;\r\ncase \"BHD\": return \"048\"; break;\r\ncase \"BIF\": return \"108\"; break;\r\ncase \"BMD\": return \"060\"; break;\r\ncase \"BND\": return \"096\"; break;\r\ncase \"BOB\": return \"068\"; break;\r\ncase \"BOV\": return \"984\"; break;\r\ncase \"BRL\": return \"986\"; break;\r\ncase \"BSD\": return \"044\"; break;\r\ncase \"BTN\": return \"064\"; break;\r\ncase \"BWP\": return \"072\"; break;\r\ncase \"BYR\": return \"974\"; break;\r\ncase \"BZD\": return \"084\"; break;\r\ncase \"CAD\": return \"124\"; break;\r\ncase \"CDF\": return \"976\"; break;\r\ncase \"CHF\": return \"756\"; break;\r\ncase \"CLF\": return \"990\"; break;\r\ncase \"CLP\": return \"152\"; break;\r\ncase \"CNY\": return \"156\"; break;\r\ncase \"COP\": return \"170\"; break;\r\ncase \"CRC\": return \"188\"; break;\r\ncase \"CUP\": return \"192\"; break;\r\ncase \"CVE\": return \"132\"; break;\r\ncase \"CYP\": return \"196\"; break;\r\ncase \"CZK\": return \"203\"; break;\r\ncase \"DJF\": return \"262\"; break;\r\ncase \"DKK\": return \"208\"; break;\r\ncase \"DOP\": return \"214\"; break;\r\ncase \"DZD\": return \"012\"; break;\r\ncase \"ECS\": return \"218\"; break;\r\ncase \"ECV\": return \"983\"; break;\r\ncase \"EEK\": return \"233\"; break;\r\ncase \"EGP\": return \"818\"; break;\r\ncase \"ERN\": return \"232\"; break;\r\ncase \"ETB\": return \"230\"; break;\r\ncase \"EUR\": return \"978\"; break;\r\ncase \"FJD\": return \"242\"; break;\r\ncase \"FKP\": return \"238\"; break;\r\ncase \"GBP\": return \"826\"; break;\r\ncase \"GEL\": return \"981\"; break;\r\ncase \"GHC\": return \"288\"; break;\r\ncase \"GIP\": return \"292\"; break;\r\ncase \"GMD\": return \"270\"; break;\r\ncase \"GNF\": return \"324\"; break;\r\ncase \"GTQ\": return \"320\"; break;\r\ncase \"GWP\": return \"624\"; break;\r\ncase \"GYD\": return \"328\"; break;\r\ncase \"HKD\": return \"344\"; break;\r\ncase \"HNL\": return \"340\"; break;\r\ncase \"HRK\": return \"191\"; break;\r\ncase \"HTG\": return \"332\"; break;\r\ncase \"HUF\": return \"348\"; break;\r\ncase \"IDR\": return \"360\"; break;\r\ncase \"ILS\": return \"376\"; break;\r\ncase \"INR\": return \"356\"; break;\r\ncase \"IQD\": return \"368\"; break;\r\ncase \"IRR\": return \"364\"; break;\r\ncase \"ISK\": return \"352\"; break;\r\ncase \"JMD\": return \"388\"; break;\r\ncase \"JOD\": return \"400\"; break;\r\ncase \"JPY\": return \"392\"; break;\r\ncase \"KES\": return \"404\"; break;\r\ncase \"KGS\": return \"417\"; break;\r\ncase \"KHR\": return \"116\"; break;\r\ncase \"KMF\": return \"174\"; break;\r\ncase \"KPW\": return \"408\"; break;\r\ncase \"KRW\": return \"410\"; break;\r\ncase \"KWD\": return \"414\"; break;\r\ncase \"KYD\": return \"136\"; break;\r\ncase \"KZT\": return \"398\"; break;\r\ncase \"LAK\": return \"418\"; break;\r\ncase \"LBP\": return \"422\"; break;\r\ncase \"LKR\": return \"144\"; break;\r\ncase \"LRD\": return \"430\"; break;\r\ncase \"LSL\": return \"426\"; break;\r\ncase \"LTL\": return \"440\"; break;\r\ncase \"LVL\": return \"428\"; break;\r\ncase \"LYD\": return \"434\"; break;\r\ncase \"MAD\": return \"504\"; break;\r\ncase \"MDL\": return \"498\"; break;\r\ncase \"MGF\": return \"450\"; break;\r\ncase \"MKD\": return \"807\"; break;\r\ncase \"MMK\": return \"104\"; break;\r\ncase \"MNT\": return \"496\"; break;\r\ncase \"MOP\": return \"446\"; break;\r\ncase \"MRO\": return \"478\"; break;\r\ncase \"MTL\": return \"470\"; break;\r\ncase \"MUR\": return \"480\"; break;\r\ncase \"MVR\": return \"462\"; break;\r\ncase \"MWK\": return \"454\"; break;\r\ncase \"MXN\": return \"484\"; break;\r\ncase \"MXV\": return \"979\"; break;\r\ncase \"MYR\": return \"458\"; break;\r\ncase \"MZM\": return \"508\"; break;\r\ncase \"NAD\": return \"516\"; break;\r\ncase \"NGN\": return \"566\"; break;\r\ncase \"NIO\": return \"558\"; break;\r\ncase \"NOK\": return \"578\"; break;\r\ncase \"NPR\": return \"524\"; break;\r\ncase \"NZD\": return \"554\"; break;\r\ncase \"OMR\": return \"512\"; break;\r\ncase \"PAB\": return \"590\"; break;\r\ncase \"PEN\": return \"604\"; break;\r\ncase \"PGK\": return \"598\"; break;\r\ncase \"PHP\": return \"608\"; break;\r\ncase \"PKR\": return \"586\"; break;\r\ncase \"PLN\": return \"985\"; break;\r\ncase \"PYG\": return \"600\"; break;\r\ncase \"QAR\": return \"634\"; break;\r\ncase \"ROL\": return \"642\"; break;\r\ncase \"RUB\": return \"643\"; break;\r\ncase \"RUR\": return \"810\"; break;\r\ncase \"RWF\": return \"646\"; break;\r\ncase \"SAR\": return \"682\"; break;\r\ncase \"SBD\": return \"090\"; break;\r\ncase \"SCR\": return \"690\"; break;\r\ncase \"SDD\": return \"736\"; break;\r\ncase \"SEK\": return \"752\"; break;\r\ncase \"SGD\": return \"702\"; break;\r\ncase \"SHP\": return \"654\"; break;\r\ncase \"SIT\": return \"705\"; break;\r\ncase \"SKK\": return \"703\"; break;\r\ncase \"SLL\": return \"694\"; break;\r\ncase \"SOS\": return \"706\"; break;\r\ncase \"SRG\": return \"740\"; break;\r\ncase \"STD\": return \"678\"; break;\r\ncase \"SVC\": return \"222\"; break;\r\ncase \"SYP\": return \"760\"; break;\r\ncase \"SZL\": return \"748\"; break;\r\ncase \"THB\": return \"764\"; break;\r\ncase \"TJS\": return \"972\"; break;\r\ncase \"TMM\": return \"795\"; break;\r\ncase \"TND\": return \"788\"; break;\r\ncase \"TOP\": return \"776\"; break;\r\ncase \"TPE\": return \"626\"; break;\r\ncase \"TRL\": return \"792\"; break;\r\ncase \"TRY\": return \"949\"; break;\r\ncase \"TTD\": return \"780\"; break;\r\ncase \"TWD\": return \"901\"; break;\r\ncase \"TZS\": return \"834\"; break;\r\ncase \"UAH\": return \"980\"; break;\r\ncase \"UGX\": return \"800\"; break;\r\ncase \"USD\": return \"840\"; break;\r\ncase \"UYU\": return \"858\"; break;\r\ncase \"UZS\": return \"860\"; break;\r\ncase \"VEB\": return \"862\"; break;\r\ncase \"VND\": return \"704\"; break;\r\ncase \"VUV\": return \"548\"; break;\r\ncase \"XAF\": return \"950\"; break;\r\ncase \"XCD\": return \"951\"; break;\r\ncase \"XOF\": return \"952\"; break;\r\ncase \"XPF\": return \"953\"; break;\r\ncase \"YER\": return \"886\"; break;\r\ncase \"YUM\": return \"891\"; break;\r\ncase \"ZAR\": return \"710\"; break;\r\ncase \"ZMK\": return \"894\"; break;\r\ncase \"ZWD\": return \"716\"; break;\r\n}\r\nreturn \"XXX\"; // return invalid code if the currency is not found \r\n}\r\n\r\nfunction calculateePayCurrency($order_id)\r\n{\r\n$db = new ps_DB;\r\n$currency_code = \"208\";\r\n$q = \"SELECT order_currency FROM #__vm_orders where order_id = \" . $order_id;\r\n$db->query($q);\r\nif ($db->next_record()) {\r\n	$currency_code = get_iso_code($db->f(\"order_currency\"));\r\n}\r\nreturn $currency_code;\r\n}\r\n echo $VM_LANG->_(\'VM_CHECKOUT_EPAY_PAYMENT_CHECKOUT_HEADER\');\r\n?>\r\n<script type=\"text/javascript\" src=\"http://www.epay.dk/js/standardwindow.js\"></script>\r\n<script type=\"text/javascript\">\r\nfunction printCard(cardId)\r\n{\r\ndocument.write (\"<table border=0 cellspacing=10 cellpadding=10>\");\r\nswitch (cardId) {\r\ncase 1: document.write (\"<input type=hidden name=cardtype value=1>\"); break;\r\ncase 2: document.write (\"<input type=hidden name=cardtype value=2>\"); break;\r\ncase 3: document.write (\"<input type=hidden name=cardtype value=3>\"); break;\r\ncase 4: document.write (\"<input type=hidden name=cardtype value=4>\"); break;\r\ncase 5: document.write (\"<input type=hidden name=cardtype value=5>\"); break;\r\ncase 6: document.write (\"<input type=hidden name=cardtype value=6>\"); break;\r\ncase 7: document.write (\"<input type=hidden name=cardtype value=7>\"); break;\r\ncase 8: document.write (\"<input type=hidden name=cardtype value=8>\"); break;\r\ncase 9: document.write (\"<input type=hidden name=cardtype value=9>\"); break;\r\ncase 10: document.write (\"<input type=hidden name=cardtype value=10>\"); break;\r\ncase 12: document.write (\"<input type=hidden name=cardtype value=12>\"); break;\r\ncase 13: document.write (\"<input type=hidden name=cardtype value=13>\"); break;\r\ncase 14: document.write (\"<input type=hidden name=cardtype value=14>\"); break;\r\ncase 15: document.write (\"<input type=hidden name=cardtype value=15>\"); break;\r\ncase 16: document.write (\"<input type=hidden name=cardtype value=16>\"); break;\r\ncase 17: document.write (\"<input type=hidden name=cardtype value=17>\"); break;\r\ncase 18: document.write (\"<input type=hidden name=cardtype value=18>\"); break;\r\ncase 19: document.write (\"<input type=hidden name=cardtype value=19>\"); break;\r\ncase 21: document.write (\"<input type=hidden name=cardtype value=21>\"); break;\r\ncase 22: document.write (\"<input type=hidden name=cardtype value=22>\"); break;\r\n}\r\ndocument.write (\"</table>\");\r\n}\r\n</script>\r\n<form action=\"https://ssl.ditonlinebetalingssystem.dk/popup/default.asp\" method=\"post\" name=\"ePay\" target=\"ePay_window\" id=\"ePay\">\r\n<input type=\"hidden\" name=\"merchantnumber\" value=\"<?php echo EPAY_MERCHANTNUMBER ?>\">\r\n<input type=\"hidden\" name=\"amount\" value=\"<?php echo round($db->f(\"order_total\")*100, 2 ) ?>\">\r\n<input type=\"hidden\" name=\"currency\" value=\"<?php echo calculateePayCurrency($order_id)?>\">\r\n<input type=\"hidden\" name=\"orderid\" value=\"<?php echo $order_id ?>\">\r\n<input type=\"hidden\" name=\"ordretext\" value=\"\">\r\n<?php \r\nif (EPAY_CALLBACK == \"1\")\r\n{\r\n	echo \'<input type=\"hidden\" name=\"callbackurl\" value=\"\' . $mosConfig_live_site . \'/index.php?page=checkout.epay_result&accept=1&sessionid=\' . $sessionid . \'&option=com_virtuemart&Itemid=1\">\';\r\n}\r\n?>\r\n<input type=\"hidden\" name=\"accepturl\" value=\"<?php echo $mosConfig_live_site ?>/index.php?page=checkout.epay_result&accept=1&sessionid=<?php echo $sessionid ?>&option=com_virtuemart&Itemid=1\">\r\n<input type=\"hidden\" name=\"declineurl\" value=\"<?php echo $mosConfig_live_site ?>/index.php?page=checkout.epay_result&accept=0&sessionid=<?php echo $sessionid ?>&option=com_virtuemart&Itemid=1\">\r\n<input type=\"hidden\" name=\"group\" value=\"<?php echo EPAY_GROUP ?>\">\r\n<input type=\"hidden\" name=\"instant\" value=\"<?php echo EPAY_INSTANT_CAPTURE ?>\">\r\n<input type=\"hidden\" name=\"language\" value=\"<?php echo EPAY_LANGUAGE ?>\">\r\n<input type=\"hidden\" name=\"authsms\" value=\"<?php echo EPAY_AUTH_SMS ?>\">\r\n<input type=\"hidden\" name=\"authmail\" value=\"<?php echo EPAY_AUTH_MAIL . (strlen(EPAY_AUTH_MAIL) > 0 && EPAY_AUTHEMAILCUSTOMER == 1 ? \";\" : \"\") . (EPAY_AUTHEMAILCUSTOMER == 1 ? $user->user_email : \"\"); ?>\">\r\n<input type=\"hidden\" name=\"windowstate\" value=\"<?php echo EPAY_WINDOW_STATE ?>\">\r\n<input type=\"hidden\" name=\"use3D\" value=\"<?php echo EPAY_3DSECURE ?>\">\r\n<input type=\"hidden\" name=\"addfee\" value=\"<?php echo EPAY_ADDFEE ?>\">\r\n<input type=\"hidden\" name=\"subscription\" value=\"<?php echo EPAY_SUBSCRIPTION ?>\">\r\n<input type=\"hidden\" name=\"MD5Key\" value=\"<?php if (EPAY_MD5_TYPE == 2) echo md5( calculateePayCurrency($order_id) . round($db->f(\"order_total\")*100, 2 ) . $order_id  . EPAY_MD5_KEY)?>\">\r\n<?php\r\nif (EPAY_CARDTYPES_1 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(1)</script>\";\r\nif (EPAY_CARDTYPES_2 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(2)</script>\";\r\nif (EPAY_CARDTYPES_3 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(3)</script>\";\r\nif (EPAY_CARDTYPES_4 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(4)</script>\";\r\nif (EPAY_CARDTYPES_5 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(5)</script>\";\r\nif (EPAY_CARDTYPES_6 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(6)</script>\";\r\nif (EPAY_CARDTYPES_7 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(7)</script>\";\r\nif (EPAY_CARDTYPES_8 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(8)</script>\";\r\nif (EPAY_CARDTYPES_9 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(9)</script>\";\r\nif (EPAY_CARDTYPES_10 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(10)</script>\";\r\nif (EPAY_CARDTYPES_11 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(11)</script>\";\r\nif (EPAY_CARDTYPES_12 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(12)</script>\";\r\nif (EPAY_CARDTYPES_14 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(14)</script>\";\r\nif (EPAY_CARDTYPES_15 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(15)</script>\";\r\nif (EPAY_CARDTYPES_16 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(16)</script>\";\r\nif (EPAY_CARDTYPES_17 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(17)</script>\";\r\nif (EPAY_CARDTYPES_18 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(18)</script>\";\r\nif (EPAY_CARDTYPES_19 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(19)</script>\";\r\nif (EPAY_CARDTYPES_21 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(21)</script>\";\r\nif (EPAY_CARDTYPES_22 == \"1\" && EPAY_CARDTYPES_0 != \"1\") echo \"<script>printCard(22)</script>\";;\r\n?>\r\n</form>\r\n<script>open_ePay_window();</script>\r\n<br>\r\n<table border=\"0\" width=\"100%\"><tr><td><input type=\"button\" onClick=\"open_ePay_window()\" value=\"<?php echo $VM_LANG->_(\'VM_CHECKOUT_EPAY_BUTTON_OPEN_WINDOW\') ?>\"></td><td width=\"100%\" id=\"flashLoader\"></td></tr></table><br><br><br>\r\n<?php echo $VM_LANG->_(\'VM_CHECKOUT_EPAY_PAYMENT_CHECKOUT_FOOTER\') ?>\r\n<br><br>\r\n<img src=\"components/com_virtuemart/shop_image/ps_image/epay_images/epay_logo.gif\" border=\"0\">&nbsp;&nbsp;&nbsp;\r\n<img src=\"components/com_virtuemart/shop_image/ps_image/epay_images/mastercard_securecode.gif\" border=\"0\">&nbsp;&nbsp;&nbsp;\r\n<img src=\"components/com_virtuemart/shop_image/ps_image/epay_images/pci.gif\" border=\"0\">&nbsp;&nbsp;&nbsp;\r\n<img src=\"components/com_virtuemart/shop_image/ps_image/epay_images/verisign_secure.gif\" border=\"0\">&nbsp;&nbsp;&nbsp;\r\n<img src=\"components/com_virtuemart/shop_image/ps_image/epay_images/visa_secure.gif\" border=\"0\">&nbsp;&nbsp;&nbsp;;', '');
INSERT INTO `jos_vm_payment_method` VALUES ('17', '1', 'PaySbuy', 'ps_paysbuy', '5', '0.00', '0', '0.00', '0.00', '0', 'PSB', 'P', '0', 'N', '', '', '');
INSERT INTO `jos_vm_payment_method` VALUES ('18', '1', 'PayPal (Legacy)', 'ps_paypal', '5', '0.00', '0', '0.00', '0.00', '0', 'PP', 'P', '0', 'Y', '', '<?php\r\n$db1 = new ps_DB();\r\n$q = \"SELECT country_2_code FROM #__vm_country WHERE country_3_code=\'\".$user->country.\"\' ORDER BY country_2_code ASC\";\r\n$db1->query($q);\r\n\r\n$url = \"https://www.paypal.com/cgi-bin/webscr\";\r\n$tax_total = $db->f(\"order_tax\") + $db->f(\"order_shipping_tax\");\r\n$discount_total = $db->f(\"coupon_discount\") + $db->f(\"order_discount\");\r\n$post_variables = Array(\r\n\"cmd\" => \"_ext-enter\",\r\n\"redirect_cmd\" => \"_xclick\",\r\n\"upload\" => \"1\",\r\n\"business\" => PAYPAL_EMAIL,\r\n\"receiver_email\" => PAYPAL_EMAIL,\r\n\"item_name\" => $VM_LANG->_(\'PHPSHOP_ORDER_PRINT_PO_NUMBER\').\": \". $db->f(\"order_id\"),\r\n\"order_id\" => $db->f(\"order_id\"),\r\n\"invoice\" => $db->f(\"order_number\"),\r\n\"amount\" => round( $db->f(\"order_total\")-$db->f(\"order_shipping\"), 2),\r\n\"shipping\" => sprintf(\"%.2f\", $db->f(\"order_shipping\")),\r\n\"currency_code\" => $_SESSION[\'vendor_currency\'],\r\n\r\n\"address_override\" => \"1\",\r\n\"first_name\" => $dbbt->f(\'first_name\'),\r\n\"last_name\" => $dbbt->f(\'last_name\'),\r\n\"address1\" => $dbbt->f(\'address_1\'),\r\n\"address2\" => $dbbt->f(\'address_2\'),\r\n\"zip\" => $dbbt->f(\'zip\'),\r\n\"city\" => $dbbt->f(\'city\'),\r\n\"state\" => $dbbt->f(\'state\'),\r\n\"country\" => $db1->f(\'country_2_code\'),\r\n\"email\" => $dbbt->f(\'user_email\'),\r\n\"night_phone_b\" => $dbbt->f(\'phone_1\'),\r\n\"cpp_header_image\" => $vendor_image_url,\r\n\r\n\"return\" => SECUREURL .\"index.php?option=com_virtuemart&page=checkout.result&order_id=\".$db->f(\"order_id\"),\r\n\"notify_url\" => SECUREURL .\"administrator/components/com_virtuemart/notify.php\",\r\n\"cancel_return\" => SECUREURL .\"index.php\",\r\n\"undefined_quantity\" => \"0\",\r\n\r\n\"test_ipn\" => PAYPAL_DEBUG,\r\n\"pal\" => \"NRUBJXESJTY24\",\r\n\"no_shipping\" => \"1\",\r\n\"no_note\" => \"1\"\r\n);\r\nif( $page == \"checkout.thankyou\" ) {\r\n$query_string = \"?\";\r\nforeach( $post_variables as $name => $value ) {\r\n$query_string .= $name. \"=\" . urlencode($value) .\"&\";\r\n}\r\nvmRedirect( $url . $query_string );\r\n} else {\r\necho \'<form action=\"\'.$url.\'\" method=\"post\" target=\"_blank\">\';\r\necho \'<input type=\"image\" name=\"submit\" src=\"https://www.paypal.com/en_US/i/btn/x-click-but6.gif\" alt=\"Click to pay with PayPal - it is fast, free and secure!\" />\';\r\n\r\nforeach( $post_variables as $name => $value ) {\r\necho \'<input type=\"hidden\" name=\"\'.$name.\'\" value=\"\'.htmlspecialchars($value).\'\" />\';\r\n}\r\necho \'</form>\';\r\n\r\n}\r\n?>', '');
INSERT INTO `jos_vm_payment_method` VALUES ('19', '1', 'MerchantWarrior', 'ps_merchantwarrior', '5', '0.00', '0', '0.00', '0.00', '1', 'MW', 'Y', '1', 'Y', '1,2,3,5,7,', '', '');
INSERT INTO `jos_vm_product` VALUES ('70', '1', '0', 'KW Trio 50SA', 'Bấm Kim KW Trio 50SA...', '<div class=\"formField\" style=\"overflow: auto; max-height: 200px;\">\r\n<p>Bấm Kim <strong> KW Trio 50LA</strong></p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm:120</p>\r\n<p>Đặc điểm khác: Đinh ghim</p>\r\n</div>', 'resized/B___m_Kim_KW_Tri_4e7ac3153c887_90x90.gif', 'B___m_Kim_KW_Tri_4e7ac3154a807.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316668181', '1316668181', 'Bấm Kim KW Trio 50SA', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('66', '1', '0', 'MF03117', 'Bấm Kim MF03117...', '<p>Bấm Kim MF03117</p>\r\n<p>Loại : Bấm kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm : 12</p>\r\n<p>Đặc điểm khác: Đinh ghim 10</p>', 'resized/B___m_Kim_MF0311_4e7ac14ec25a7_90x90.jpg', 'B___m_Kim_MF0311_4e7ac14ec7c31.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316667726', '1316667726', 'Bấm Kim MF03117', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('67', '1', '0', 'MF913022', 'Bấm Kim MF913022...', '<p>Bấm Kim MF913022</p>\r\n<p>Loại : Bấm kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm: 210 tờ</p>\r\n<p>Đặc điểm khách: Đinh ghim 23/6-23/25</p>', 'resized/B___m_Kim_MF9130_4e7ac1be566af_90x90.jpg', 'B___m_Kim_MF9130_4e7ac1be60c88.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316667838', '1316667838', 'Bấm Kim MF913022', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('68', '1', '0', 'SW8514', 'Bấm Kim SW8514...', '<p>Bấm Kim SW8514</p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm:20</p>\r\n<p>Đặc điểm khác: Đinh ghim 4/6; 26/6</p>', 'resized/B___m_Kim_SW8514_4e7ac23fb9fc7_90x90.jpg', 'B___m_Kim_SW8514_4e7ac23fc0d94.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316667967', '1316667967', 'Bấm Kim SW8514', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('69', '1', '0', 'KW Trio 50LA', 'Bấm Kim KW Trio 50LA...', '<p>Bấm Kim <strong> KW Trio 50LA</strong></p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm:120</p>\r\n<p>Đặc điểm khác: Đinh ghim</p>', 'resized/B___m_Kim_KW_Tri_4e7ac2c7d1c20_90x90.gif', 'B___m_Kim_KW_Tri_4e7ac2c7e8aed.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316668103', '1316668103', 'Bấm Kim KW Trio 50LA', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('65', '1', '0', 'SW8147', 'Bấm Kim SW8147 ...', '<p>Bấm Kim SW8147</p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất Xứ:Đang cập nhật</p>\r\n<p>Số tờ bấm : 240 tờ</p>\r\n<p>Đặc điểm khác: Đinh ghim 23/6; 23/25</p>', 'resized/B___m_Kim_SW8147_4e7ac0039a9f6_90x90.jpg', 'B___m_Kim_SW8147_4e7ac003a2553.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316667395', '1316667395', 'Bấm Kim SW8147', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('61', '1', '0', 'KW Trio 9060', 'Bấm Lỗ KW Trio 9060...', '<p>Bấm Lỗ KW Trio 9060</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Đại Loan</p>\r\n<p>Số tờ bấm: 10 tờ</p>', 'resized/B___m_L____KW_Tr_4e7abcd901a9a_90x90.jpg', 'B___m_L____KW_Tr_4e7abcd907c45.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316666585', '1316666585', 'Bấm Lỗ KW Trio 9060', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('62', '1', '0', 'Eagle 837', 'Bấm Lỗ Eagle 837...', '<p>Bấm Lỗ Eagle 837</p>\r\n<p>Loại : Bấm lỗ</p>\r\n<p>ĐVT: cái</p>', 'resized/B___m_L____Eagle_4e7abd280fb8b_90x90.jpg', 'B___m_L____Eagle_4e7abd281b5f7.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316666664', '1316666664', 'Bấm Lỗ Eagle 837', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('63', '1', '0', 'Eagle 837S', 'Bấm Lỗ Eagle 837S...', '<p>Bấm Lỗ Eagle 837</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>ĐVT: cái</p>', 'resized/B___m_L____Eagle_4e7abd9390a5c_90x90.jpg', 'B___m_L____Eagle_4e7abd939c2be.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316666771', '1316666771', 'Bấm Lỗ Eagle 837S', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('64', '1', '0', 'SW8004', 'Bấm Lỗ SW8004...', '<p>Bấm Lỗ SW8004</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Trung Quốc</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm: 30 tờ</p>', 'resized/B___m_L____SW800_4e7abe3cddb5d_90x90.jpg', 'B___m_L____SW800_4e7abe3ce4b3f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316666940', '1316666940', 'Bấm Lỗ SW8004', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('59', '1', '0', 'KW Trio 978', 'Bấm Lỗ KW Trio 978...', '<p>Bấm Lỗ KW Trio 978</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Đài Loan</p>\r\n<p>Số tờ bấm: 35 tờ</p>\r\n<table class=\"technical_table\" style=\"height: 24px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"15\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"name\"></td>\r\n<td class=\"value\"></td>\r\n<td class=\"name\"></td>\r\n<td class=\"value\"></td>\r\n</tr>\r\n<tr>\r\n<td class=\"name\"></td>\r\n<td class=\"value\"></td>\r\n<td colspan=\"2\"></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'resized/B___m_L____KW_Tr_4e7abb7414d01_90x90.jpg', 'B___m_L____KW_Tr_4e7abb7427544.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316666228', '1316666228', 'Bấm Lỗ KW Trio 978', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('60', '1', '0', 'KW Trio 912', 'Bấm Lỗ KW Trio 912...', '<p>Bấm Lỗ KW Trio 912</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Đài Loan</p>\r\n<p>Số tờ bấm: 16 tờ</p>', 'resized/B___m_L____KW_Tr_4e7abbf62abf0_90x90.jpg', 'B___m_L____KW_Tr_4e7abbf630e17.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316649600', '', 'N', '0', null, '1316666358', '1316666358', 'Bấm Lỗ KW Trio 912', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('17', '1', '0', 'BC', 'Loại bút 2B, giúp học sinh viết chữ đẹp hơn.', '<p>Loại bút 2B, giúp học sinh viết chữ đẹp hơn.</p>', 'resized/B__t_ch___4e74d29d401eb_90x90.jpg', 'B__t_ch___4e74d29d4f2a5.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316217600', '', 'N', '0', null, '1316278941', '1316280682', 'Bút chì', '0', '', '', '0', 'piece', '0', 'Y,N,N,N,N,Y,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('18', '1', '0', 'B01', 'Vạn Hoa Gel-B04...', '<p>Đầu bi: 0,5 mm.<br /><br />Số lương: 20 chiếc/hộp.<br /><br />Xuất xứ: Việt Nam.<br /><br />Màu mực: Xanh, đen, đỏ</p>', 'resized/B__t_bi_V___n_Ho_4e780b223668e_90x90.jpg', 'B__t_bi_V___n_Ho_4e780b2240ad9.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316489945', '1316491069', 'Vạn Hoa Gel-B04', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('19', '1', '0', 'TL-304', 'Thiên Long TL-304...', '<p><strong>Đặc điểm</strong>:<br />Đầu bi: 0.5mm, sản suất tại Thụy Sĩ.<br /> Bút bi dạng đậy nắp.<br /> Độ dài viết được: 1.300-1.500m<br /> Mực đạt chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Đầu bi nhỏ tạo nét chữ thanh mảnh.<br /> Thiết kế thon gọn vừa tay cầm cho các em học sinh.	<br /><br /><strong>Đóng gói</strong>:<br />20 cây/hộp, 60 hộp/thùng, 1.200 cây/thùng.</p>', 'resized/Thi__n_Long_TL_3_4e780cfd5bec8_90x90.jpg', 'Thi__n_Long_TL_3_4e780cfd6e154.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316490493', '1316490790', 'Thiên Long TL-304', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('21', '1', '0', 'TL-023', 'Thiên Long TL-023...', '<p><strong>Đặc điểm</strong>:<br />Đầu bi: 0.8 mm, sản xuất tại Thụy Sĩ.<br /> Bút bi dạng bấm khế.<br /> Độ dài viết được: 1.300-1.700m.<br /> Mực đạt tiêu chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Thân bút thanh mảnh cơ chế bấm khế tiện dụng phù hợp cho mọi người.<br /> Thay ruột khi hết mực</p>', 'resized/Thi__n_Long_TL_0_4e780e8c9d967_90x90.jpg', 'Thi__n_Long_TL_0_4e780e8cb1c73.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316490892', '1316490892', 'Thiên Long TL-023', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('20', '1', '0', 'TL-027', 'Thiên Long TL-027...', '<p><strong>Đặc điểm</strong>:<br />•	Đầu bi: 0.5mm, sản suất tại Thụy Sĩ.<br /> Bút bi dạng bấm cò.<br /> Nơi tì ngón tay có tiết diện hình tam giác vừa vặn với tay cầm giúp giảm trơn tuột khi viết thường xuyên.<br /> Độ dài viết được: 1.600-2.000m<br /> Mực đạt chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Đầu bi nhỏ cho nét chữ thanh mảnh.<br /> Cơ chế bấm nằm gọn dưới giắt bút, giúp thuận tay khi sử dụng.<br /> Thay ruột khi hết mực.</p>', 'resized/Thi__n_Long_TL_0_4e780dff3ae58_90x90.jpg', 'Thi__n_Long_TL_0_4e780dff4d9c0.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316490751', '1316490751', 'Thiên Long TL-027', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('22', '1', '0', 'TL-08', 'Thiên Long TL-08...', '<p><strong>Đặc điểm</strong>:<br />Đầu bi: 0.8 mm, sản xuất tại Thụy Sĩ.<br /> Bút bi dạng bấm cò.<br /> Độ dài viết được: 1.200-1.500m.<br /> Mực đạt tiêu chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Đa dạng màu sắc rất tiện dụng phù hợp cho mọi người nên TL-08 là loại bút bi được khách hàng tin tưởng sử dụng suốt 17 năm qua.<br /> Thay ruột khi hết mực.</p>', 'resized/Thi__n_Long_TL_0_4e780ee3d81a7_90x90.jpg', 'Thi__n_Long_TL_0_4e780ee3ea668.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316490979', '1316490979', 'Thiên Long TL-08', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('23', '1', '0', 'B-34', 'Bến Nghé B-34...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> <img src=\"http://www.bennghe.com/images/inkimage/xanh.gif\" border=\"0\" /><img src=\"http://www.bennghe.com/images/inkimage/den.gif\" border=\"0\" /></strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />\r\n<p class=\"class\"><span>-    Ng<span>òi b<span>út  : <span>đ<span>ầu bi 0.8mm, s<span>ử d<span>ụng <span>đ<span>ầu bi Th<span>ụy S<span>ỹ.</span></span></span></span></span></span></span></span></span></span><br /> -    Ru<span>ột b<span>út  : s<span>ử d<span>ụng ru<span>ột b<span>út bi lo<span>ại th<span>ư<span>ờng.</span></span></span></span></span></span></span></span></span></span></p>\r\n<p class=\"class\"><span>-    Th<span>ân b<span>út </span></span>: ti<span>êm v<span>à c<span>án b<span>út li<span>ền nhau, m<span>àu s<span>ắc theo m<span>ực.</span></span></span></span></span></span></span></span></span></p>\r\n<p class=\"class\"><span>-    Ch<span>ụp b<span>út  : m<span>àu <span>đen.</span></span></span></span></span></p>\r\n<p class=\"class\"><span>-    Gi<span>ắt b<span>út     : m<span>àu s<span>ắc theo m<span>ực.</span></span></span></span></span></span></p>\r\n<p class=\"class\"><span>-    M<span>àu m<span>ực   : xanh, <span>đen; <span>đ<span>ư<span>ợc nh<span>ập t<span>ừ <span>Đ<span>ức</span></span></span></span></span></span></span></span></span></span></span></p>\r\n<p class=\"class\"><span><span><strong><span style=\"text-decoration: underline;\">Ưu <span>đi<span>ểm:</span></span></span></strong></span></span></p>\r\n<p class=\"class\"><span>Sản phẩm được cải tiến với tiêm và giắt được sử dụng nhựa ABS + AS, cho kiểu dáng trang nhã.</span></p>\r\n<p class=\"class\"><span>Nút bấm nhạy, nét viết trơn đều với đầu bi 0.8mm và 2 màu mực xanh, đen</span></p>\r\n<p class=\"class\"><span>Cho nét viết êm, rõ nét từ đầu đến cuối. </span></p>\r\n<span>Duyên dáng, thích hợp với tuổi trẻ, nhân viên văn phòng.</span></div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 30cây/ca ; 40ca/thùng carton</p>', 'resized/B___n_Ngh___B_34_4e7810279cc5a_90x90.jpg', 'B___n_Ngh___B_34_4e781027a5f73.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316491303', '1316491303', 'Bến Nghé B-34', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('24', '1', '0', 'D-20', 'Bến Nghé D-20...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> <img src=\"http://www.bennghe.com/images/inkimage/xanh.gif\" border=\"0\" /><img src=\"http://www.bennghe.com/images/inkimage/do.gif\" border=\"0\" /><img src=\"http://www.bennghe.com/images/inkimage/den.gif\" border=\"0\" /></strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />-    Đầu bi: 0.6mm<br /> -    Cán: nhựa AS<br /> -    Giắt/ Đuôi: nhựa ABS<br /> -    Đệm: nhựa TBR<br /> <br /> 03 màu tiêu chuẩn, bi 0.6mm cho nét viết êm, rõ nét từ đầu đến cuối.<br /> Kiểu dáng thanh mảnh phù hợp cho học sinh, sinh viên, nhân viên làm công tác tại văn phòng và thành phần tự do sử dụng. <br /> Rất thích hợp để in ấn quảng cáo, tặng phẩm.</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 25 cây/hộp ; 600 cây/thùng</p>', 'resized/B___n_Ngh___D_20_4e78115b9e265_90x90.jpg', 'B___n_Ngh___D_20_4e78115ba8fd6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316491611', '1316491611', 'Bến Nghé D-20', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('25', '1', '0', 'L-09', 'Bến Nghé L-09...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />\r\n<p class=\"class\"><span>- Ng<span style=\"font-family: Arial;\">òi b<span style=\"font-family: Arial;\">út         : <span style=\"font-family: Arial;\">đ<span style=\"font-family: Arial;\">ầu bi 0.5mm, s<span style=\"font-family: Arial;\">ử d<span style=\"font-family: Arial;\">ụng <span style=\"font-family: Arial;\">đ<span style=\"font-family: Arial;\">ầu bi Th<span style=\"font-family: Arial;\">ụy S<span style=\"font-family: Arial;\">ỹ</span></span></span></span></span></span></span></span></span></span></span></p>\r\n<p class=\"class\"><span>- Ru<span style=\"font-family: Arial;\">ột b<span style=\"font-family: Arial;\">út         : s<span style=\"font-family: Arial;\">ử d<span style=\"font-family: Arial;\">ụng ru<span style=\"font-family: Arial;\">ột b<span style=\"font-family: Arial;\">út bi lo<span style=\"font-family: Arial;\">ại th<span style=\"font-family: Arial;\">ư<span style=\"font-family: Arial;\">ờng.</span></span></span></span></span></span></span></span></span></span></p>\r\n<p class=\"class\"><span>- Th<span style=\"font-family: Arial;\">ân b<span style=\"font-family: Arial;\">út         : m<span style=\"font-family: Arial;\">àu s<span style=\"font-family: Arial;\">ắc theo m<span style=\"font-family: Arial;\">ực, c<span style=\"font-family: Arial;\">ó in logo c<span style=\"font-family: Arial;\">ông ty v<span style=\"font-family: Arial;\">à m<span style=\"font-family: Arial;\">ã s<span style=\"font-family: Arial;\">ản ph<span style=\"font-family: Arial;\">ẩm.</span></span></span></span></span></span></span></span></span></span></span> </span></p>\r\n<p class=\"class\">- Ch<span style=\"font-family: Arial;\">ụp b<span style=\"font-family: Arial;\">út         : m<span style=\"font-family: Arial;\">àu tr<span style=\"font-family: Arial;\">ắng <span style=\"font-family: Arial;\">đ<span style=\"font-family: Arial;\">ục.</span></span></span></span></span></span></p>\r\n<p class=\"class\"><span>- <span style=\"font-family: Arial;\">Đ<span style=\"font-family: Arial;\">ối t<span style=\"font-family: Arial;\">ư<span style=\"font-family: Arial;\">ợng s<span style=\"font-family: Arial;\">ử d<span style=\"font-family: Arial;\">ụng : ph<span style=\"font-family: Arial;\">ù h<span style=\"font-family: Arial;\">ợp v<span style=\"font-family: Arial;\">ới h<span style=\"font-family: Arial;\">ọc sinh c<span style=\"font-family: Arial;\">âp II, c<span style=\"font-family: Arial;\">ấp III, sinh vi<span style=\"font-family: Arial;\">ên, c<span style=\"font-family: Arial;\">ông nh<span style=\"font-family: Arial;\">ân - nh<span style=\"font-family: Arial;\">ân vi<span style=\"font-family: Arial;\">ên ch<span style=\"font-family: Arial;\">ức.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n<p class=\"class\"><span><span style=\"font-family: Arial;\"><strong><span style=\"text-decoration: underline;\">Ưu <span style=\"font-family: Arial;\">đi<span style=\"font-family: Arial;\">ểm:</span></span></span></strong></span> </span></p>\r\n<p class=\"class\"><span>Kiểu dáng sang trọng với kỹ thuật hiện đại.</span></p>\r\n<p class=\"class\"><span>Deep Blue, Deep Black, Deep Purple & Deep Red cho 04 màu tuyệt đẹp.</span></p>\r\n<p class=\"class\"><span>Phù hợp cho mọi đối tượng sử dụng.</span></p>\r\n<p class=\"class\"><span>L-09 “Sự Chọn Lựa Thích Đáng” </span></p>\r\n</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 20 cây/lon; 60lon/thùng</p>', 'resized/B___n_Ngh___L_09_4e781237175e4_90x90.jpg', 'B___n_Ngh___L_09_4e781237209cc.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316491781', '1316491831', 'Bến Nghé L-09', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('26', '1', '0', 'GP-01', 'Bút chì gỗ GP-01...', '<p><strong>Đặc điểm</strong>:<br />Thân lục giác, 2B		<br /><br /><strong>Đóng gói</strong>:<br />96 hộp/thùng, 1.152 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___G____G_4e78151dd1f2c_90x90.jpg', 'B__t_Ch___G____G_4e78151de5030.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316492573', '1316492573', 'Bút Chì Gỗ GP-01', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('27', '1', '0', 'GP-03', 'Bút Chì Gỗ GP-03...', '<p><strong>Đặc điểm</strong>:<br />Thân lục giác, 2B		<br /><br /><strong>Đóng gói</strong>:<br />32 lon/thùng, 960 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___G____G_4e7815594fb9b_90x90.jpg', 'B__t_Ch___G____G_4e78155961ae3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316492633', '1316492791', 'Bút Chì Gỗ GP-03', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('28', '1', '0', 'GP-04', 'Bút Chì Gỗ GP-04...', '<p><strong>Đặc điểm</strong>:<br />Thân lục giác, có thêm gôm ở đuôi chì, HB		<br /><br /><strong>Đóng gói</strong>:<br />96 hộp/thùng, 1.152 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___G____G_4e78159e4214b_90x90.jpg', 'B__t_Ch___G____G_4e78159e549c4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316492702', '1316492819', 'Bút Chì Gỗ GP-04', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('29', '1', '0', 'PC-09', 'Bút Chì Bấm PC-09...', '<p><strong>Đặc điểm</strong>:<br />Thân tròn, ruột 11 khúc chì, có nắp đậy, trên nắp có gôm, có thể thay được ruột chì, lon nhựa PVC,		<br /><br /><strong>Đóng gói</strong>:<br />48 lon/thùng, 960 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___B___m__4e7816adb25e9_90x90.jpg', 'B__t_Ch___B___m__4e7816adc6845.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316492973', '1316492973', 'Bút Chì Bấm PC-09', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('30', '1', '0', 'PC-018', 'Bút chì bấm PC-018', '<p><strong>Đặc điểm</strong>:<br />Harajuku - xuất phát từ Nhật Bản - đã trở  thành tên của cả một xu hướng thời trang khi giới trẻ nơi đây tìm ra cho  mình một phong cách “không giống ai”: phá cách, nổi loạn, đầy sắc màu  và rất ấn tượng. Dựa trên phong cách Harajuku đến từ Nhật Bản, được Việt  hóa cho phù hợp với các bạn học sinh Việt Nam; Bút chì bấm PC-018 được  phối màu sinh động, cá tính, ấn tượng theo một quy luật không trật tự -  Bút chi bấm PC-018</p>\r\n<p>– Quy luật Harajuku.<br /> Kiểu dáng giống bút chì bấm thông thường nhưng thân bút được thiết kế  theo phong cách thời trang Harajuku của Nhật Bản, phù hợp cho tuổi teen.</p>', 'resized/B__t_Ch___B___m__4e78170902f1b_90x90.jpg', 'B__t_Ch___B___m__4e7817091524e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316493065', '1316493065', 'Bút Chì Bấm PC-018', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('31', '1', '0', 'S-01', 'Chuốt Bút Chì S-01...', '<p><strong>Đặc điểm</strong>:<br /> Lưỡi chuốt được làm bằng kim loại sáng bóng, không gỉ, sử  dụng được lâu, kiểu dáng nhỏ gọn, sử dụng cho các loại chì gỗ 																		<br /><br /><strong>Đóng gói</strong>:<br />12hộp inner/thùng, 3.456 cái/thùng						<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm rách hộp PVC rơi chuốt ra ngoà</p>', 'resized/Chu___t_B__t_Ch__4e781788a6d02_90x90.jpg', 'Chu___t_B__t_Ch__4e781788b9309.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316493192', '1316493192', 'Chuốt Bút Chì S-01', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('32', '1', '0', 'HL-03', 'Bút Dạ Quang HL-03...', '<p><strong>Đặc điểm</strong>:<br />Kiểu dáng thon gọn, trẻ trung. Sản phẩm thích hợp với tất cả khách hàng<br /> Bút có 2 đầu, đầu tròn: 0.8 – 1.1mm, đầu dẹp: 4mm giúp tăng thêm tính năng sử dụng.<br /> Mực tươi sáng, độ phản quang cao. Thích hợp trên nhiều loại giấy.<br /> Mực đạt TC EN71/3, ASTM D-4236	<br /><br /><strong>Lợi ích</strong>:<br />Kiểu dáng trẻ trung, tiện lợi, được khách hàng ưa chuộng.	<br /><br /><strong>Đóng gói</strong>:<br />5 cây/vỉ, 120 vỉ/thùng, 600 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp khi không sử dụng.</p>', 'resized/B__t_D____Quang__4e78191ad1ddb_90x90.jpg', 'B__t_D____Quang__4e78191ae7de8.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316493594', '1316493594', 'Bút Dạ Quang HL-03', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('33', '1', '0', 'HL-06', 'Bút Dạ Quang HL-06...', '<p><strong>Đặc điểm</strong>:<br />Thân bút dạng dẹp, vừa tay cầm và không lăn khi để trên bàn.<br /> Đầu bút bằng Polyethylene, dạng vát xéo, bề rộng nét viết 5mm.<br /> Màu mực tươi sáng, phản quang tốt.<br /> Thích hợp trên nhiều loại giấy.<br /> Mực đạt TC EN71/3, ASTM D-4236.	<br /><br /><strong>Lợi ích</strong>:<br />Kiểu dáng trẻ trung, tiện lợi, được khách hàng ưa chuộng.	<br /><br /><strong>Đóng gói</strong>:<br />Dạng hộp: 10 cây/hộp giấy, 54 hộp/thùng, 540 cây/thùng.<br /> Dạng vỉ: 2 cây/vỉ, 10 vỉ/hộp inner, 24 hộp inner/thùng, 480cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp khi không sử dụng</p>', 'resized/B__t_D____Quang__4e78196e5fe4a_90x90.jpg', 'B__t_D____Quang__4e78196e72c92.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316493678', '1316493992', 'Bút Dạ Quang HL-06', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('34', '1', '0', 'HL-07', 'Bút Dạ Quang HL-07...', '<p><strong>Đặc điểm</strong>:<br />Bút có dạng 2 đầu, thiết kế nhỏ gọn thích hợp với tay cầm học sinh.  Đầu bút bằng polyethylen, Màu mực đậm tươi, phản quang tốt.<br /> <br /> Đầu nhỏ: 0.8-1.0 mm, đầu to: 4.0 mm<br /> <br /> Màu sắc: Vàng, Cam, Hồng, Lá, Xanh biển		<br /><br /><strong>Đóng gói</strong>:<br />36 bút / hộp, 20 hộp/ thùng, 720 bút/ thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp ngay sau khi sử dụng. Tránh nơi có nhiệt độ cao và tiếp xúc trực tiếp với ánh sáng mặt trời.</p>', 'resized/B__t_D____Quang__4e7819c597d43_90x90.jpg', 'B__t_D____Quang__4e7819c5ab78d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316493765', '1316493765', 'Bút Dạ Quang HL-07', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('35', '1', '0', 'HL-08', 'Bút Dạ Quang HL-08...', '<p><strong>Đặc điểm</strong>:<br />•	Thân bút nhỏ gọn, màu sắc trẻ trung, sinh động<br /> Một đầu bút bằng Polyethylene, dạng vát xéo, bề rộng nét viết 5mm.<br /> Màu mực tươi sáng, phản quang tốt<br /> Thích hợp trên nhiều loại giấy<br /> Mực đạt TC EN71/3, ASTM D-4236	<br /><br /><strong>Lợi ích</strong>:<br />Kiểu dáng trẻ trung, tiện lợi, được khách hàng ưa chuộng.	<br /><br /><strong>Đóng gói</strong>:<br />Dạng hộp: 10 cây/hộp giấy, 54 hộp/thùng, 540 cây/thùng.<br /> Dạng vỉ: 2 cây/vỉ, 10 vỉ/hộp inner, 24 hộp inner/thùng, 480cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp khi không sử dụng.</p>', 'resized/B__t_D____Quang__4e781a0defca3_90x90.jpg', 'B__t_D____Quang__4e781a0e0f10b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316493838', '1316493838', 'Bút Dạ Quang HL-08', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('36', '1', '0', 'HL-09', 'Bút Dạ Quang HL-09...', '<p><strong>Đặc điểm</strong>:<br />Bút có thiết kế ấn tượng, dạng hình oval  thon gọn, rất thuận tiện cho tay cầm.  Đầu bút bằng polyethylen, dạng  vát xéo, bề rộng nét viết: 5mm. Màu mực đậm tươi, phản quang tốt.<br /> <br /> Đầu bút dạng vát xéo, KT 4.5-5.5mm<br /> <br /> Màu sắc: Vàng, Cam, Hồng, Lá, Xanh biển		<br /><br /><strong>Đóng gói</strong>:<br />10 cây/hộp, 54 hộp/thùng, 540 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp ngay sau khi sử dụng. Tránh nơi có nhiệt độ cao và tiếp xúc trực tiếp với ánh sáng mặt trời</p>', 'resized/B__t_D____Quang__4e781a5a66cd1_90x90.jpg', 'B__t_D____Quang__4e781a5a7b35f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316493914', '1316493914', 'Bút Dạ Quang HL-09', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('37', '1', '0', 'DC-05', 'Bút Xóa DC-05...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />-    Vỏ hộp : nhựa AS<br /> -    Bánh răng: POM<br /> -    Bánh răng trong: AS<br /> -    Nắp: PP<br /> -    Bao bì:      12cây/hộp ; 144cây/thùng<br /> -    Rộng 5mm x dài 8mm</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 12cây/hộp ; 144cây/thùng</p>', 'resized/B__t_X__a_DC_05_4e781ec7d55d3_90x90.jpg', 'B__t_X__a_DC_05_4e781ec7db91f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316495047', '1316495047', 'Bút Xóa DC-05', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('38', '1', '0', 'DC-09', 'Bút Xóa DC-09...', '<p> </p>\r\n<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />\r\n<p class=\"class\">- <span>Dung tích: 12ml</span></p>\r\n</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 12cây/hộp ; 288cây/thùng</p>', 'resized/B__t_X__a_DC_09_4e781f17c44ba_90x90.jpg', 'B__t_X__a_DC_09_4e781f17cd3df.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316495127', '1316495127', 'Bút Xóa DC-09', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('39', '1', '0', 'DC-01', 'Bút Xóa DC-01...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />\r\n<p class=\"class\"><span>Dung tích: 12ml</span></p>\r\n</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 12cây/hộp ; 288cây/thùng</p>', 'resized/B__t_X__a_DC_01_4e781f59372e4_90x90.jpg', 'B__t_X__a_DC_01_4e781f593dde1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316495193', '1316495193', 'Bút Xóa DC-01', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('40', '1', '0', 'CP-02', 'Bút Xóa Thiên Long CP-02', '', 'resized/B__t_X__a_CP_02_4e7828a390023_90x90.jpg', 'B__t_X__a_CP_02_4e7828a3a2082.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316497571', '1316497571', 'Bút Xóa CP-02', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('41', '1', '0', 'CP-05', 'Bút Xóa Thiên Long CP-05', '', 'resized/B__t_X__a_CP_05_4e7828e47f3b1_90x90.jpg', 'B__t_X__a_CP_05_4e7828e490762.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316497636', '1316497636', 'Bút Xóa CP-05', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('42', '1', '0', 'WH -504', 'Bút xóa kéo Plus WH 504', '', 'resized/B__t_x__a_k__o_P_4e7829168708d_90x90.jpg', 'B__t_x__a_k__o_P_4e7829168f0a6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316497686', '1316497686', 'Bút xóa kéo Plus WH 504', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('43', '1', '0', 'WB-03', 'Bút Lông Bảng WB-03...', '<p><strong>Đặc điểm</strong>:<br />Thân bút lớn thích hợp cho giáo viên, khối văn phòng ...<br /> Đầu bút ngoại nhập chất lượng cao, nét viết êm, có thể sử dụng được nhiều lần .<br /> Màu mực tươi sáng, mau khô và dễ dàng lau sạch mực sau khi viết .<br /> Lượng mực vượt trội, viết được dài 600m .<br /> Mực bút không độc hại .<br /> Đạt TC EN71/3, ASTM D-4236 .	<br /><br /><strong>Lợi ích</strong>:<br />Có thể bơm thêm mực tái sử dụng nhiều lần.	<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng .	<br /><br /><strong>Bảo quản</strong>:<br />Luôn đặt bút nằm ngang và đậy nắp sau khi sử dụng.</p>', 'resized/B__t_L__ng_B___n_4e782aa298028_90x90.jpg', 'B__t_L__ng_B___n_4e782aa2a9f18.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316498082', '1316498082', 'Bút Lông Bảng WB-03', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('44', '1', '0', 'WB-08', 'Bút Lông Bảng WB-08', '<p><strong>Đặc điểm</strong>:<br />Thân bút lớn thích hợp cho giáo viên, khối văn phòng ...<br /> Đầu bút ngoại nhập chất lượng cao, nét bút 2.5mm.<br /> Ruột bằng polyester, Mực ra đều, liêu tục, màu mực đậm,tươi, dễ dàng lau sạch, bút viết lâu hết mực.<br /> Đạt TC EN71/3, ASTM D-4236.	<br /><br /><strong>Lợi ích</strong>:<br />Có thể bơm thêm mực tái sử dụng nhiều lần.	<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Luôn đặt bút nằm ngang và đậy nắp sau khi sử dụng.</p>', 'resized/B__t_L__ng_B___n_4e782ae9e52a5_90x90.jpg', 'B__t_L__ng_B___n_4e782aea0472c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316498154', '1316498154', 'Bút Lông Bảng WB-08', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('45', '1', '0', 'WB-02', 'Bút Lông Bảng WB-02...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />-    Ngòi đầu đạn<br /> -    Cán: nhựa PP<br /> -    Nắp: nhựa PE<br /> -    Đuôi cán : nhựa PE<br /> <br /> Khác với WB-01; WB-02 với công nghệ in trên thân cán cũng khác hơn.<br /> Mẫu in không in trực tiếp trên thân cán mà qua một màng OPP mỏng và được ép lên thân cán qua máy ép nhiệt.<br /> Hình dáng gọn, đẹp, viết êm và dễ dàng lau sạch với một miếng vải khô.</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây/Pcs  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: Bao bì: 04cây/vỉ</p>', 'resized/B__t_L__ng_B___n_4e782b4329f7d_90x90.jpg', 'B__t_L__ng_B___n_4e782b4334599.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316498243', '1316498243', 'Bút Lông Bảng WB-02', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('46', '1', '0', 'WB-05', 'Bút Lông Bảng WB-05...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />\r\n<p>- Ngòi bút        : Đầu bút lớn, được làm từ Polyester, nhập từ Nhật.</p>\r\n<p>- Thân bút       : màu sắc theo mực, có in tên sản phẩm, mã sản phẩm,  mã vạch, công dụng của mực bằng tiếng Anh, tiêu chuẩn sản xuất.</p>\r\n<p>- Nắp bút        : màu sắc theo mực.</p>\r\n<p>- Màu mực      :  xanh, đỏ, đen ; được nhập từ Đức.</p>\r\n<p><strong><span style=\"text-decoration: underline;\">Ưu điểm: </span></strong></p>\r\n<p>- Mực ra đều, nét rõ, mau khô, dễ xóa, không gây độc hại đến sức khỏe người sử dụng.</p>\r\n<p>- Hình dáng đẹp, đơn giản, dễ sử dụng.</p>\r\n<p>- Thích hợp với học sinh, giáo viên, văn phòng, cơ quan.</p>\r\n</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 12 cây/hộp ; 288 cây/thùng</p>', 'resized/B__t_L__ng_B___n_4e782b8f3694c_90x90.jpg', 'B__t_L__ng_B___n_4e782b8f4e384.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316498319', '1316498319', 'Bút Lông Bảng WB-05', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('47', '1', '0', 'PM-07', 'Bút Lông Dầu PM-07...', '<p><strong>Đặc điểm</strong>:<br />Kiểu dáng được thiết kế vừa tay cầm, giúp êm tay khi viết.<br /> Đầu viết chất lượng cao, nét rộng viết 1.0mm.<br /> Màu mực đậm tươi, mau khô và viết được trên các bề mặt khác nhau như: giấy, nhựa, thủy tinh, kim loại...<br /> Vỏ bút có độ kín hơi tốt, đặc biệt không độc hại đối với người sử dụng..<br /> Đạt TC EN71/3, ASTM D-4236.	<br /><br /><strong>Lợi ích</strong>:<br />Có thể bơm thêm mực tái sử dụng nhiều lần.	<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp sau khi sử dụng.</p>', 'resized/B__t_L__ng_D___u_4e782c01a7c9f_90x90.jpg', 'B__t_L__ng_D___u_4e782c01b9cb4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316498433', '1316498433', 'Bút Lông Dầu PM-07', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('48', '1', '0', 'PM-09', 'Bút Lông Dầu PM-09...', '<p><strong>Đặc điểm</strong>:<br />Kiểu dáng được thiết kế vừa tay cầm, giúp êm tay khi viết.<br /> Kiểu dáng được thiết kế vừa tay cầm, phù hợp với nhân NVVP, Người lao động... <br /> Đầu viết chất lượng cao, bút lông dầu 2 đầu (6mm và 0.8mm).<br /> Màu mực đậm tươi, mau khô và viết được trên các bề mặt khác nhau như: giấy, gỗ, nhựa, thủy tinh, kim loại…<br /> Màu nhẹ, dễ chịu, không độc hại đối với người sử dụng . <br /> Đạt TC EN71/3, ASTM D-4236.		<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp sau khi sử dụng .</p>', 'resized/B__t_L__ng_D___u_4e782c4fab2be_90x90.jpg', 'B__t_L__ng_D___u_4e782c4fbdc41.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316498511', '1316498511', 'Bút Lông Dầu PM-09', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('49', '1', '0', 'M-04', 'Bút Lông Dâu M-04...', '<div><span style=\"text-decoration: underline;\"><strong>Màu mực</strong></span>:<strong> <img src=\"http://www.bennghe.com/images/inkimage/xanh.gif\" border=\"0\" /><img src=\"http://www.bennghe.com/images/inkimage/do.gif\" border=\"0\" /><img src=\"http://www.bennghe.com/images/inkimage/den.gif\" border=\"0\" /></strong> <br /> <span style=\"text-decoration: underline;\"><strong>Mô tả</strong></span>: <br />\r\n<p class=\"class\">-  <span>Ngòi đầu đạn</span></p>\r\n<p class=\"class\">-  <span>Cán/ ti<span style=\"font-family: Arial;\">ê</span>m: nhựa PP</span></p>\r\n<p class=\"class\">-  <span>Đuôi/ nắp nhựa PE</span></p>\r\n<p class=\"class\"><span>3 Màu mực: xanh, đỏ, đen</span></p>\r\n<p class=\"class\"><span>Khác với M-01; M-04 mập hơn & công nghệ in trên cán cũng khác hơn.</span></p>\r\n<p class=\"class\"><span>Hình dáng gọn, đẹp,viết êm với hai đầu tiện lợi.</span></p>\r\n<p class=\"class\"> </p>\r\n</div>\r\n<p><br /> <span style=\"text-decoration: underline;\"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style=\"text-decoration: underline;\"><strong>Đóng gói</strong></span>: 12cây/ hộp ; 288cây/thùng</p>', 'resized/B__t_L__ng_D__u__4e782cb7a65fd_90x90.jpg', 'B__t_L__ng_D__u__4e782cb7b2bcb.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316476800', '', 'N', '0', null, '1316498615', '1316498615', 'Bút Lông Dâu M-04', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('50', '1', '0', 'TL-E 310:A4', 'Bìa Lá TL-E310:A4...', '<p><strong>Đặc điểm</strong>:<br />Được sản xuất từ nguyên liệu nhựa PP chất lượng cao<br /> Sản phẩm trong suốt, ít phản quang, có thể copy trực tiếp.<br /> Sản xuất theo tiêu chuẩn: TLLTKTSXS007	<br /><br /><strong>Lợi ích</strong>:<br />Nhựa PP không độc hại, thân thiện với môi trường.	<br /><br /><strong>Đóng gói</strong>:<br />Bìa/ bao nilong; 10 bìa/túi nilong / 500 bìa/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Nhiệt độ: 10 ~ 55º C.<br /> Độ ẩm: 55 ~ 95% RH.<br /> Tránh xa nguồn nhiệt, dầu mỡ.</p>', 'resized/B__a_L___TL_E310_4e7970df7a671_90x90.jpg', 'B__a_L___TL_E310_4e7970df8df94.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316581599', '1316581599', 'Bìa Lá TL-E310:A4', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('51', '1', '0', 'TL-LAF70-A4', 'Folder TL-LAF70-A4...', '<div id=\"diProDesc\" class=\"fck_details\"><strong>Đặc điểm</strong>:<br />Được sản xuất từ bìa cứng, bọc simili cao cấp.		<br /><br /><strong>Đóng gói</strong>:<br />50 bìa/ thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Nhiệt độ: 10 ~ 55º C.<br /> Độ ẩm: 55 ~ 95% RH.<br /> Tránh xa nguồn nhiệt, dầu mỡ.				<br /><br />Màu sắc:<br /> <img src=\"http://static.thienlong.vn/images/icons/xanhduong.gif\" border=\"0\" /> <img src=\"http://static.thienlong.vn/images/icons/do.gif\" border=\"0\" /></div>', 'resized/Folder_TL_LAF70__4e797147634c8_90x90.jpg', 'Folder_TL_LAF70__4e79714776c4d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316581703', '1316581703', 'Folder TL-LAF70-A4', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('52', '1', '0', 'TL-LAF50-F4', 'Folder TL-LAF50-F4...', '<div id=\"diProDesc\" class=\"fck_details\"><strong>Đặc điểm</strong>:<br />Được sản xuất từ bìa cứng, bọc simili cao cấp.		<br /><br /><strong>Đóng gói</strong>:<br />50 bìa/ thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Nhiệt độ: 10 ~ 55º C.<br /> Độ ẩm: 55 ~ 95% RH.<br /> Tránh xa nguồn nhiệt, dầu mỡ.				<br /><br />Màu sắc:<br /> <img src=\"http://static.thienlong.vn/images/icons/xanhdam.gif\" border=\"0\" /> <img src=\"http://static.thienlong.vn/images/icons/xanhla.gif\" border=\"0\" /></div>', 'resized/Folder_TL_LAF50__4e79719b824cc_90x90.jpg', 'Folder_TL_LAF50__4e79719b95548.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316581787', '1316581787', 'Folder TL-LAF50-F4', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('53', '1', '0', 'BN02', 'Bìa Nút BN02...', '', 'resized/B__a_N__t_BN02_4e7973d4be9f3_90x90.jpg', 'B__a_N__t_BN02_4e7973d4d7763.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316582356', '1316582356', 'Bìa Nút BN02', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('54', '1', '0', 'BA01', 'Bìa Acsord BA01...', '', 'resized/B__a_Acsord_BA01_4e79741ed1d78_90x90.jpg', 'B__a_Acsord_BA01_4e79741eea417.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316582430', '1316582430', 'Bìa Acsord BA01', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('55', '1', '0', 'BC03', 'Bìa Còng 5F...', '', 'resized/B__a_C__ng_5F_4e7974e4830c4_90x90.jpg', 'B__a_C__ng_5F_4e7974e4a03b4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316582628', '1316582628', 'Bìa Còng 5F', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('56', '1', '0', 'BT01', 'Bao Thư BT01...', '<p>Bao Thư BT01...</p>', 'resized/Bao_Th___BT01_4e79764f04bd4_90x90.jpg', 'Bao_Th___BT01_4e79764f278ae.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316582991', '1316582991', 'Bao Thư BT01', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('57', '1', '0', 'BT02', 'Bao Thư BT02...', '<p>Bao Thư BT02...</p>', 'resized/Bao_Th___BT02_4e797685f19e9_90x90.jpg', 'Bao_Th___BT02_4e7976861ca69.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316583046', '1316583046', 'Bao Thư BT02', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` VALUES ('58', '1', '0', 'BT03', 'Bao Thư BT03...', '<p>Bao Thư BT03...</p>', 'resized/Bao_Th___BT03_4e7976b81ddcd_90x90.jpg', 'Bao_Th___BT03_4e7976b83283b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', '0', '1316563200', '', 'N', '0', null, '1316583096', '1316583096', 'Bao Thư BT03', '0', '', '', '0', 'piece', '0', 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product_category_xref` VALUES ('8', '68', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('8', '65', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('9', '64', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('9', '63', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('8', '67', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('8', '66', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('9', '61', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('9', '60', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('9', '62', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('9', '59', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('6', '17', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '18', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '19', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '20', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '21', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '22', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '23', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '24', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('14', '25', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('16', '26', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('16', '28', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('16', '29', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('16', '27', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('16', '30', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('16', '31', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('15', '32', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('15', '33', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('15', '34', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('15', '35', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('15', '36', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('18', '37', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('18', '38', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('18', '39', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('18', '40', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('18', '41', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('18', '42', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('17', '43', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('17', '44', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('17', '45', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('17', '46', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('17', '47', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('17', '48', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('17', '49', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('27', '50', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('27', '51', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('27', '52', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('27', '53', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('27', '54', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('27', '55', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('28', '56', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('28', '57', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('28', '58', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('8', '69', '1');
INSERT INTO `jos_vm_product_category_xref` VALUES ('8', '70', '1');
INSERT INTO `jos_vm_product_discount` VALUES ('1', '20.00', '1', '1097704800', '1194390000');
INSERT INTO `jos_vm_product_discount` VALUES ('2', '2.00', '0', '1098655200', '0');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('65', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('64', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('63', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('70', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('69', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('61', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('60', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('62', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('59', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('68', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('67', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('66', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('17', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('18', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('19', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('20', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('21', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('22', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('23', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('24', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('25', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('26', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('27', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('28', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('29', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('30', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('31', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('32', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('33', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('34', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('35', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('36', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('37', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('38', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('39', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('40', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('41', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('42', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('43', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('44', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('45', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('46', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('47', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('48', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('49', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('50', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('51', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('52', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('53', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('54', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('55', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('56', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('57', '1');
INSERT INTO `jos_vm_product_mf_xref` VALUES ('58', '1');
INSERT INTO `jos_vm_product_price` VALUES ('65', '66', '14000.00000', 'VND', '0', '0', '1316667726', '1316667726', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('64', '65', '312000.00000', 'VND', '0', '0', '1316667395', '1316667395', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('63', '64', '54000.00000', 'VND', '0', '0', '1316666940', '1316666940', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('69', '70', '268000.00000', 'VND', '0', '0', '1316668181', '1316668181', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('61', '62', '30000.00000', 'VND', '0', '0', '1316666664', '1316666664', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('59', '60', '54000.00000', 'VND', '0', '0', '1316666358', '1316666358', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('62', '63', '24000.00000', 'VND', '0', '0', '1316666771', '1316666771', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('58', '59', '75000.00000', 'VND', '0', '0', '1316666228', '1316666228', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('68', '69', '207000.00000', 'VND', '0', '0', '1316668103', '1316668103', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('67', '68', '23000.00000', 'VND', '0', '0', '1316667967', '1316667967', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('66', '67', '215000.00000', 'VND', '0', '0', '1316667838', '1316667838', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('60', '61', '24000.00000', 'VND', '0', '0', '1316666585', '1316666585', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('17', '17', '10000.00000', 'VND', '0', '0', '1316278941', '1316280682', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('18', '18', '5.00000', 'VND', '0', '0', '1316489945', '1316491069', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('19', '20', '3.00000', 'VND', '0', '0', '1316490751', '1316490751', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('20', '19', '2.00000', 'VND', '0', '0', '1316490790', '1316490790', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('21', '21', '3.00000', 'VND', '0', '0', '1316490892', '1316490892', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('22', '22', '2.50000', 'VND', '0', '0', '1316490979', '1316490979', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('23', '23', '3.00000', 'VND', '0', '0', '1316491303', '1316491303', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('24', '24', '3.00000', 'VND', '0', '0', '1316491611', '1316491611', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('25', '25', '5.00000', 'VND', '0', '0', '1316491781', '1316491831', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('26', '26', '2.00000', 'VND', '0', '0', '1316492573', '1316492573', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('27', '27', '4.00000', 'VND', '0', '0', '1316492633', '1316492791', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('28', '28', '3.00000', 'VND', '0', '0', '1316492702', '1316492819', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('29', '29', '3.50000', 'VND', '0', '0', '1316492973', '1316492973', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('30', '30', '4.00000', 'VND', '0', '0', '1316493065', '1316493065', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('31', '31', '2.50000', 'VND', '0', '0', '1316493192', '1316493192', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('32', '32', '6.00000', 'VND', '0', '0', '1316493594', '1316493594', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('33', '33', '5.00000', 'VND', '0', '0', '1316493678', '1316493992', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('34', '34', '4.50000', 'VND', '0', '0', '1316493765', '1316493765', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('35', '35', '5.50000', 'VND', '0', '0', '1316493838', '1316493838', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('36', '36', '6.00000', 'VND', '0', '0', '1316493914', '1316493914', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('37', '37', '6.00000', 'VND', '0', '0', '1316495047', '1316495047', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('38', '38', '4.00000', 'VND', '0', '0', '1316495127', '1316495127', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('39', '39', '4.00000', 'VND', '0', '0', '1316495193', '1316495193', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('40', '40', '13.00000', 'VND', '0', '0', '1316497571', '1316497571', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('41', '41', '10.00000', 'VND', '0', '0', '1316497636', '1316497636', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('42', '42', '15.00000', 'VND', '0', '0', '1316497686', '1316497686', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('43', '43', '4.50000', 'VND', '0', '0', '1316498082', '1316498082', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('44', '44', '5.00000', 'VND', '0', '0', '1316498154', '1316498154', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('45', '45', '10.00000', 'VND', '0', '0', '1316498243', '1316498243', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('46', '46', '13.00000', 'VND', '0', '0', '1316498319', '1316498319', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('47', '47', '14.00000', 'VND', '0', '0', '1316498433', '1316498433', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('48', '48', '14.00000', 'VND', '0', '0', '1316498511', '1316498511', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('49', '49', '12.00000', 'VND', '0', '0', '1316498615', '1316498615', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('50', '50', '1.00000', 'VND', '0', '0', '1316581599', '1316581599', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('51', '51', '13.00000', 'VND', '0', '0', '1316581703', '1316581703', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('52', '52', '15.00000', 'VND', '0', '0', '1316581787', '1316581787', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('53', '54', '2.50000', 'VND', '0', '0', '1316582430', '1316582430', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('54', '55', '9000.00000', 'VND', '0', '0', '1316582628', '1316582628', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('55', '56', '2.00000', 'VND', '0', '0', '1316582991', '1316582991', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('56', '57', '4.00000', 'VND', '0', '0', '1316583046', '1316583046', '5', '0', '0');
INSERT INTO `jos_vm_product_price` VALUES ('57', '58', '7000.00000', 'VND', '0', '0', '1316583096', '1316583096', '5', '0', '0');
INSERT INTO `jos_vm_shipping_carrier` VALUES ('1', 'DHL', '0');
INSERT INTO `jos_vm_shipping_carrier` VALUES ('2', 'UPS', '1');
INSERT INTO `jos_vm_shipping_rate` VALUES ('1', 'Inland > 4kg', '1', 'DEU', '00000', '99999', '0.000', '4.000', '5.62', '2.00', '47', '0', '1');
INSERT INTO `jos_vm_shipping_rate` VALUES ('2', 'Inland > 8kg', '1', 'DEU', '00000', '99999', '4.000', '8.000', '6.39', '2.00', '47', '0', '2');
INSERT INTO `jos_vm_shipping_rate` VALUES ('3', 'Inland > 12kg', '1', 'DEU', '00000', '99999', '8.000', '12.000', '7.16', '2.00', '47', '0', '3');
INSERT INTO `jos_vm_shipping_rate` VALUES ('4', 'Inland > 20kg', '1', 'DEU', '00000', '99999', '12.000', '20.000', '8.69', '2.00', '47', '0', '4');
INSERT INTO `jos_vm_shipping_rate` VALUES ('5', 'EU+ >  4kg', '1', 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '0.000', '4.000', '14.57', '2.00', '47', '0', '5');
INSERT INTO `jos_vm_shipping_rate` VALUES ('6', 'EU+ >  8kg', '1', 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '4.000', '8.000', '18.66', '2.00', '47', '0', '6');
INSERT INTO `jos_vm_shipping_rate` VALUES ('7', 'EU+ > 12kg', '1', 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '8.000', '12.000', '22.57', '2.00', '47', '0', '7');
INSERT INTO `jos_vm_shipping_rate` VALUES ('8', 'EU+ > 20kg', '1', 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '12.000', '20.000', '30.93', '2.00', '47', '0', '8');
INSERT INTO `jos_vm_shipping_rate` VALUES ('9', 'Europe > 4kg', '1', 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '0.000', '4.000', '23.78', '2.00', '47', '0', '9');
INSERT INTO `jos_vm_shipping_rate` VALUES ('10', 'Europe >  8kg', '1', 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '4.000', '8.000', '29.91', '2.00', '47', '0', '10');
INSERT INTO `jos_vm_shipping_rate` VALUES ('11', 'Europe > 12kg', '1', 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '8.000', '12.000', '36.05', '2.00', '47', '0', '11');
INSERT INTO `jos_vm_shipping_rate` VALUES ('12', 'Europe > 20kg', '1', 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '12.000', '20.000', '48.32', '2.00', '47', '0', '12');
INSERT INTO `jos_vm_shipping_rate` VALUES ('13', 'World_1 >  4kg', '1', 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '0.000', '4.000', '26.84', '2.00', '47', '0', '13');
INSERT INTO `jos_vm_shipping_rate` VALUES ('14', 'World_1 > 8kg', '1', 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '4.000', '8.000', '35.02', '2.00', '47', '0', '14');
INSERT INTO `jos_vm_shipping_rate` VALUES ('15', 'World_1 > 12kg', '1', 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '8.000', '12.000', '43.20', '2.00', '47', '0', '15');
INSERT INTO `jos_vm_shipping_rate` VALUES ('16', 'World_1 > 20kg', '1', 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '12.000', '20.000', '59.57', '2.00', '47', '0', '16');
INSERT INTO `jos_vm_shipping_rate` VALUES ('17', 'World_2 > 4kg', '1', '', '00000', '99999', '0.000', '4.000', '32.98', '2.00', '47', '0', '17');
INSERT INTO `jos_vm_shipping_rate` VALUES ('18', 'World_2 > 8kg', '1', '', '00000', '99999', '4.000', '8.000', '47.29', '2.00', '47', '0', '18');
INSERT INTO `jos_vm_shipping_rate` VALUES ('19', 'World_2 > 12kg', '1', '', '00000', '99999', '8.000', '12.000', '61.61', '2.00', '47', '0', '19');
INSERT INTO `jos_vm_shipping_rate` VALUES ('20', 'World_2 > 20kg', '1', '', '00000', '99999', '12.000', '20.000', '90.24', '2.00', '47', '0', '20');
INSERT INTO `jos_vm_shipping_rate` VALUES ('21', 'UPS Express', '2', 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '0.000', '20.000', '5.24', '2.00', '47', '0', '21');
INSERT INTO `jos_vm_shopper_group` VALUES ('5', '1', '-default-', 'This is the default shopper group.', '0.00', '1', '1');
INSERT INTO `jos_vm_shopper_group` VALUES ('6', '1', 'Gold Level', 'Gold Level Shoppers.', '0.00', '1', '0');
INSERT INTO `jos_vm_shopper_group` VALUES ('7', '1', 'Wholesale', 'Shoppers that can buy at wholesale.', '0.00', '0', '0');
INSERT INTO `jos_vm_shopper_vendor_xref` VALUES ('62', '1', '5', '');
INSERT INTO `jos_vm_state` VALUES ('1', '223', 'Alabama', 'ALA', 'AL');
INSERT INTO `jos_vm_state` VALUES ('2', '223', 'Alaska', 'ALK', 'AK');
INSERT INTO `jos_vm_state` VALUES ('3', '223', 'Arizona', 'ARZ', 'AZ');
INSERT INTO `jos_vm_state` VALUES ('4', '223', 'Arkansas', 'ARK', 'AR');
INSERT INTO `jos_vm_state` VALUES ('5', '223', 'California', 'CAL', 'CA');
INSERT INTO `jos_vm_state` VALUES ('6', '223', 'Colorado', 'COL', 'CO');
INSERT INTO `jos_vm_state` VALUES ('7', '223', 'Connecticut', 'CCT', 'CT');
INSERT INTO `jos_vm_state` VALUES ('8', '223', 'Delaware', 'DEL', 'DE');
INSERT INTO `jos_vm_state` VALUES ('9', '223', 'District Of Columbia', 'DOC', 'DC');
INSERT INTO `jos_vm_state` VALUES ('10', '223', 'Florida', 'FLO', 'FL');
INSERT INTO `jos_vm_state` VALUES ('11', '223', 'Georgia', 'GEA', 'GA');
INSERT INTO `jos_vm_state` VALUES ('12', '223', 'Hawaii', 'HWI', 'HI');
INSERT INTO `jos_vm_state` VALUES ('13', '223', 'Idaho', 'IDA', 'ID');
INSERT INTO `jos_vm_state` VALUES ('14', '223', 'Illinois', 'ILL', 'IL');
INSERT INTO `jos_vm_state` VALUES ('15', '223', 'Indiana', 'IND', 'IN');
INSERT INTO `jos_vm_state` VALUES ('16', '223', 'Iowa', 'IOA', 'IA');
INSERT INTO `jos_vm_state` VALUES ('17', '223', 'Kansas', 'KAS', 'KS');
INSERT INTO `jos_vm_state` VALUES ('18', '223', 'Kentucky', 'KTY', 'KY');
INSERT INTO `jos_vm_state` VALUES ('19', '223', 'Louisiana', 'LOA', 'LA');
INSERT INTO `jos_vm_state` VALUES ('20', '223', 'Maine', 'MAI', 'ME');
INSERT INTO `jos_vm_state` VALUES ('21', '223', 'Maryland', 'MLD', 'MD');
INSERT INTO `jos_vm_state` VALUES ('22', '223', 'Massachusetts', 'MSA', 'MA');
INSERT INTO `jos_vm_state` VALUES ('23', '223', 'Michigan', 'MIC', 'MI');
INSERT INTO `jos_vm_state` VALUES ('24', '223', 'Minnesota', 'MIN', 'MN');
INSERT INTO `jos_vm_state` VALUES ('25', '223', 'Mississippi', 'MIS', 'MS');
INSERT INTO `jos_vm_state` VALUES ('26', '223', 'Missouri', 'MIO', 'MO');
INSERT INTO `jos_vm_state` VALUES ('27', '223', 'Montana', 'MOT', 'MT');
INSERT INTO `jos_vm_state` VALUES ('28', '223', 'Nebraska', 'NEB', 'NE');
INSERT INTO `jos_vm_state` VALUES ('29', '223', 'Nevada', 'NEV', 'NV');
INSERT INTO `jos_vm_state` VALUES ('30', '223', 'New Hampshire', 'NEH', 'NH');
INSERT INTO `jos_vm_state` VALUES ('31', '223', 'New Jersey', 'NEJ', 'NJ');
INSERT INTO `jos_vm_state` VALUES ('32', '223', 'New Mexico', 'NEM', 'NM');
INSERT INTO `jos_vm_state` VALUES ('33', '223', 'New York', 'NEY', 'NY');
INSERT INTO `jos_vm_state` VALUES ('34', '223', 'North Carolina', 'NOC', 'NC');
INSERT INTO `jos_vm_state` VALUES ('35', '223', 'North Dakota', 'NOD', 'ND');
INSERT INTO `jos_vm_state` VALUES ('36', '223', 'Ohio', 'OHI', 'OH');
INSERT INTO `jos_vm_state` VALUES ('37', '223', 'Oklahoma', 'OKL', 'OK');
INSERT INTO `jos_vm_state` VALUES ('38', '223', 'Oregon', 'ORN', 'OR');
INSERT INTO `jos_vm_state` VALUES ('39', '223', 'Pennsylvania', 'PEA', 'PA');
INSERT INTO `jos_vm_state` VALUES ('40', '223', 'Rhode Island', 'RHI', 'RI');
INSERT INTO `jos_vm_state` VALUES ('41', '223', 'South Carolina', 'SOC', 'SC');
INSERT INTO `jos_vm_state` VALUES ('42', '223', 'South Dakota', 'SOD', 'SD');
INSERT INTO `jos_vm_state` VALUES ('43', '223', 'Tennessee', 'TEN', 'TN');
INSERT INTO `jos_vm_state` VALUES ('44', '223', 'Texas', 'TXS', 'TX');
INSERT INTO `jos_vm_state` VALUES ('45', '223', 'Utah', 'UTA', 'UT');
INSERT INTO `jos_vm_state` VALUES ('46', '223', 'Vermont', 'VMT', 'VT');
INSERT INTO `jos_vm_state` VALUES ('47', '223', 'Virginia', 'VIA', 'VA');
INSERT INTO `jos_vm_state` VALUES ('48', '223', 'Washington', 'WAS', 'WA');
INSERT INTO `jos_vm_state` VALUES ('49', '223', 'West Virginia', 'WEV', 'WV');
INSERT INTO `jos_vm_state` VALUES ('50', '223', 'Wisconsin', 'WIS', 'WI');
INSERT INTO `jos_vm_state` VALUES ('51', '223', 'Wyoming', 'WYO', 'WY');
INSERT INTO `jos_vm_state` VALUES ('52', '38', 'Alberta', 'ALB', 'AB');
INSERT INTO `jos_vm_state` VALUES ('53', '38', 'British Columbia', 'BRC', 'BC');
INSERT INTO `jos_vm_state` VALUES ('54', '38', 'Manitoba', 'MAB', 'MB');
INSERT INTO `jos_vm_state` VALUES ('55', '38', 'New Brunswick', 'NEB', 'NB');
INSERT INTO `jos_vm_state` VALUES ('56', '38', 'Newfoundland and Labrador', 'NFL', 'NL');
INSERT INTO `jos_vm_state` VALUES ('57', '38', 'Northwest Territories', 'NWT', 'NT');
INSERT INTO `jos_vm_state` VALUES ('58', '38', 'Nova Scotia', 'NOS', 'NS');
INSERT INTO `jos_vm_state` VALUES ('59', '38', 'Nunavut', 'NUT', 'NU');
INSERT INTO `jos_vm_state` VALUES ('60', '38', 'Ontario', 'ONT', 'ON');
INSERT INTO `jos_vm_state` VALUES ('61', '38', 'Prince Edward Island', 'PEI', 'PE');
INSERT INTO `jos_vm_state` VALUES ('62', '38', 'Quebec', 'QEC', 'QC');
INSERT INTO `jos_vm_state` VALUES ('63', '38', 'Saskatchewan', 'SAK', 'SK');
INSERT INTO `jos_vm_state` VALUES ('64', '38', 'Yukon', 'YUT', 'YT');
INSERT INTO `jos_vm_state` VALUES ('65', '222', 'England', 'ENG', 'EN');
INSERT INTO `jos_vm_state` VALUES ('66', '222', 'Northern Ireland', 'NOI', 'NI');
INSERT INTO `jos_vm_state` VALUES ('67', '222', 'Scotland', 'SCO', 'SD');
INSERT INTO `jos_vm_state` VALUES ('68', '222', 'Wales', 'WLS', 'WS');
INSERT INTO `jos_vm_state` VALUES ('69', '13', 'Australian Capital Territory', 'ACT', 'AC');
INSERT INTO `jos_vm_state` VALUES ('70', '13', 'New South Wales', 'NSW', 'NS');
INSERT INTO `jos_vm_state` VALUES ('71', '13', 'Northern Territory', 'NOT', 'NT');
INSERT INTO `jos_vm_state` VALUES ('72', '13', 'Queensland', 'QLD', 'QL');
INSERT INTO `jos_vm_state` VALUES ('73', '13', 'South Australia', 'SOA', 'SA');
INSERT INTO `jos_vm_state` VALUES ('74', '13', 'Tasmania', 'TAS', 'TS');
INSERT INTO `jos_vm_state` VALUES ('75', '13', 'Victoria', 'VIC', 'VI');
INSERT INTO `jos_vm_state` VALUES ('76', '13', 'Western Australia', 'WEA', 'WA');
INSERT INTO `jos_vm_state` VALUES ('77', '138', 'Aguascalientes', 'AGS', 'AG');
INSERT INTO `jos_vm_state` VALUES ('78', '138', 'Baja California Norte', 'BCN', 'BN');
INSERT INTO `jos_vm_state` VALUES ('79', '138', 'Baja California Sur', 'BCS', 'BS');
INSERT INTO `jos_vm_state` VALUES ('80', '138', 'Campeche', 'CAM', 'CA');
INSERT INTO `jos_vm_state` VALUES ('81', '138', 'Chiapas', 'CHI', 'CS');
INSERT INTO `jos_vm_state` VALUES ('82', '138', 'Chihuahua', 'CHA', 'CH');
INSERT INTO `jos_vm_state` VALUES ('83', '138', 'Coahuila', 'COA', 'CO');
INSERT INTO `jos_vm_state` VALUES ('84', '138', 'Colima', 'COL', 'CM');
INSERT INTO `jos_vm_state` VALUES ('85', '138', 'Distrito Federal', 'DFM', 'DF');
INSERT INTO `jos_vm_state` VALUES ('86', '138', 'Durango', 'DGO', 'DO');
INSERT INTO `jos_vm_state` VALUES ('87', '138', 'Guanajuato', 'GTO', 'GO');
INSERT INTO `jos_vm_state` VALUES ('88', '138', 'Guerrero', 'GRO', 'GU');
INSERT INTO `jos_vm_state` VALUES ('89', '138', 'Hidalgo', 'HGO', 'HI');
INSERT INTO `jos_vm_state` VALUES ('90', '138', 'Jalisco', 'JAL', 'JA');
INSERT INTO `jos_vm_state` VALUES ('91', '138', 'México (Estado de)', 'EDM', 'EM');
INSERT INTO `jos_vm_state` VALUES ('92', '138', 'Michoacán', 'MCN', 'MI');
INSERT INTO `jos_vm_state` VALUES ('93', '138', 'Morelos', 'MOR', 'MO');
INSERT INTO `jos_vm_state` VALUES ('94', '138', 'Nayarit', 'NAY', 'NY');
INSERT INTO `jos_vm_state` VALUES ('95', '138', 'Nuevo León', 'NUL', 'NL');
INSERT INTO `jos_vm_state` VALUES ('96', '138', 'Oaxaca', 'OAX', 'OA');
INSERT INTO `jos_vm_state` VALUES ('97', '138', 'Puebla', 'PUE', 'PU');
INSERT INTO `jos_vm_state` VALUES ('98', '138', 'Querétaro', 'QRO', 'QU');
INSERT INTO `jos_vm_state` VALUES ('99', '138', 'Quintana Roo', 'QUR', 'QR');
INSERT INTO `jos_vm_state` VALUES ('100', '138', 'San Luis Potosí', 'SLP', 'SP');
INSERT INTO `jos_vm_state` VALUES ('101', '138', 'Sinaloa', 'SIN', 'SI');
INSERT INTO `jos_vm_state` VALUES ('102', '138', 'Sonora', 'SON', 'SO');
INSERT INTO `jos_vm_state` VALUES ('103', '138', 'Tabasco', 'TAB', 'TA');
INSERT INTO `jos_vm_state` VALUES ('104', '138', 'Tamaulipas', 'TAM', 'TM');
INSERT INTO `jos_vm_state` VALUES ('105', '138', 'Tlaxcala', 'TLX', 'TX');
INSERT INTO `jos_vm_state` VALUES ('106', '138', 'Veracruz', 'VER', 'VZ');
INSERT INTO `jos_vm_state` VALUES ('107', '138', 'Yucatán', 'YUC', 'YU');
INSERT INTO `jos_vm_state` VALUES ('108', '138', 'Zacatecas', 'ZAC', 'ZA');
INSERT INTO `jos_vm_state` VALUES ('109', '30', 'Acre', 'ACR', 'AC');
INSERT INTO `jos_vm_state` VALUES ('110', '30', 'Alagoas', 'ALG', 'AL');
INSERT INTO `jos_vm_state` VALUES ('111', '30', 'Amapá', 'AMP', 'AP');
INSERT INTO `jos_vm_state` VALUES ('112', '30', 'Amazonas', 'AMZ', 'AM');
INSERT INTO `jos_vm_state` VALUES ('113', '30', 'Bahía', 'BAH', 'BA');
INSERT INTO `jos_vm_state` VALUES ('114', '30', 'Ceará', 'CEA', 'CE');
INSERT INTO `jos_vm_state` VALUES ('115', '30', 'Distrito Federal', 'DFB', 'DF');
INSERT INTO `jos_vm_state` VALUES ('116', '30', 'Espirito Santo', 'ESS', 'ES');
INSERT INTO `jos_vm_state` VALUES ('117', '30', 'Goiás', 'GOI', 'GO');
INSERT INTO `jos_vm_state` VALUES ('118', '30', 'Maranhão', 'MAR', 'MA');
INSERT INTO `jos_vm_state` VALUES ('119', '30', 'Mato Grosso', 'MAT', 'MT');
INSERT INTO `jos_vm_state` VALUES ('120', '30', 'Mato Grosso do Sul', 'MGS', 'MS');
INSERT INTO `jos_vm_state` VALUES ('121', '30', 'Minas Geraís', 'MIG', 'MG');
INSERT INTO `jos_vm_state` VALUES ('122', '30', 'Paraná', 'PAR', 'PR');
INSERT INTO `jos_vm_state` VALUES ('123', '30', 'Paraíba', 'PRB', 'PB');
INSERT INTO `jos_vm_state` VALUES ('124', '30', 'Pará', 'PAB', 'PA');
INSERT INTO `jos_vm_state` VALUES ('125', '30', 'Pernambuco', 'PER', 'PE');
INSERT INTO `jos_vm_state` VALUES ('126', '30', 'Piauí', 'PIA', 'PI');
INSERT INTO `jos_vm_state` VALUES ('127', '30', 'Rio Grande do Norte', 'RGN', 'RN');
INSERT INTO `jos_vm_state` VALUES ('128', '30', 'Rio Grande do Sul', 'RGS', 'RS');
INSERT INTO `jos_vm_state` VALUES ('129', '30', 'Rio de Janeiro', 'RDJ', 'RJ');
INSERT INTO `jos_vm_state` VALUES ('130', '30', 'Rondônia', 'RON', 'RO');
INSERT INTO `jos_vm_state` VALUES ('131', '30', 'Roraima', 'ROR', 'RR');
INSERT INTO `jos_vm_state` VALUES ('132', '30', 'Santa Catarina', 'SAC', 'SC');
INSERT INTO `jos_vm_state` VALUES ('133', '30', 'Sergipe', 'SER', 'SE');
INSERT INTO `jos_vm_state` VALUES ('134', '30', 'São Paulo', 'SAP', 'SP');
INSERT INTO `jos_vm_state` VALUES ('135', '30', 'Tocantins', 'TOC', 'TO');
INSERT INTO `jos_vm_state` VALUES ('136', '44', 'Anhui', 'ANH', '34');
INSERT INTO `jos_vm_state` VALUES ('137', '44', 'Beijing', 'BEI', '11');
INSERT INTO `jos_vm_state` VALUES ('138', '44', 'Chongqing', 'CHO', '50');
INSERT INTO `jos_vm_state` VALUES ('139', '44', 'Fujian', 'FUJ', '35');
INSERT INTO `jos_vm_state` VALUES ('140', '44', 'Gansu', 'GAN', '62');
INSERT INTO `jos_vm_state` VALUES ('141', '44', 'Guangdong', 'GUA', '44');
INSERT INTO `jos_vm_state` VALUES ('142', '44', 'Guangxi Zhuang', 'GUZ', '45');
INSERT INTO `jos_vm_state` VALUES ('143', '44', 'Guizhou', 'GUI', '52');
INSERT INTO `jos_vm_state` VALUES ('144', '44', 'Hainan', 'HAI', '46');
INSERT INTO `jos_vm_state` VALUES ('145', '44', 'Hebei', 'HEB', '13');
INSERT INTO `jos_vm_state` VALUES ('146', '44', 'Heilongjiang', 'HEI', '23');
INSERT INTO `jos_vm_state` VALUES ('147', '44', 'Henan', 'HEN', '41');
INSERT INTO `jos_vm_state` VALUES ('148', '44', 'Hubei', 'HUB', '42');
INSERT INTO `jos_vm_state` VALUES ('149', '44', 'Hunan', 'HUN', '43');
INSERT INTO `jos_vm_state` VALUES ('150', '44', 'Jiangsu', 'JIA', '32');
INSERT INTO `jos_vm_state` VALUES ('151', '44', 'Jiangxi', 'JIX', '36');
INSERT INTO `jos_vm_state` VALUES ('152', '44', 'Jilin', 'JIL', '22');
INSERT INTO `jos_vm_state` VALUES ('153', '44', 'Liaoning', 'LIA', '21');
INSERT INTO `jos_vm_state` VALUES ('154', '44', 'Nei Mongol', 'NML', '15');
INSERT INTO `jos_vm_state` VALUES ('155', '44', 'Ningxia Hui', 'NIH', '64');
INSERT INTO `jos_vm_state` VALUES ('156', '44', 'Qinghai', 'QIN', '63');
INSERT INTO `jos_vm_state` VALUES ('157', '44', 'Shandong', 'SNG', '37');
INSERT INTO `jos_vm_state` VALUES ('158', '44', 'Shanghai', 'SHH', '31');
INSERT INTO `jos_vm_state` VALUES ('159', '44', 'Shaanxi', 'SHX', '61');
INSERT INTO `jos_vm_state` VALUES ('160', '44', 'Sichuan', 'SIC', '51');
INSERT INTO `jos_vm_state` VALUES ('161', '44', 'Tianjin', 'TIA', '12');
INSERT INTO `jos_vm_state` VALUES ('162', '44', 'Xinjiang Uygur', 'XIU', '65');
INSERT INTO `jos_vm_state` VALUES ('163', '44', 'Xizang', 'XIZ', '54');
INSERT INTO `jos_vm_state` VALUES ('164', '44', 'Yunnan', 'YUN', '53');
INSERT INTO `jos_vm_state` VALUES ('165', '44', 'Zhejiang', 'ZHE', '33');
INSERT INTO `jos_vm_state` VALUES ('166', '104', 'Israel', 'ISL', 'IL');
INSERT INTO `jos_vm_state` VALUES ('167', '104', 'Gaza Strip', 'GZS', 'GZ');
INSERT INTO `jos_vm_state` VALUES ('168', '104', 'West Bank', 'WBK', 'WB');
INSERT INTO `jos_vm_state` VALUES ('169', '151', 'St. Maarten', 'STM', 'SM');
INSERT INTO `jos_vm_state` VALUES ('170', '151', 'Bonaire', 'BNR', 'BN');
INSERT INTO `jos_vm_state` VALUES ('171', '151', 'Curacao', 'CUR', 'CR');
INSERT INTO `jos_vm_state` VALUES ('172', '175', 'Alba', 'ABA', 'AB');
INSERT INTO `jos_vm_state` VALUES ('173', '175', 'Arad', 'ARD', 'AR');
INSERT INTO `jos_vm_state` VALUES ('174', '175', 'Arges', 'ARG', 'AG');
INSERT INTO `jos_vm_state` VALUES ('175', '175', 'Bacau', 'BAC', 'BC');
INSERT INTO `jos_vm_state` VALUES ('176', '175', 'Bihor', 'BIH', 'BH');
INSERT INTO `jos_vm_state` VALUES ('177', '175', 'Bistrita-Nasaud', 'BIS', 'BN');
INSERT INTO `jos_vm_state` VALUES ('178', '175', 'Botosani', 'BOT', 'BT');
INSERT INTO `jos_vm_state` VALUES ('179', '175', 'Braila', 'BRL', 'BR');
INSERT INTO `jos_vm_state` VALUES ('180', '175', 'Brasov', 'BRA', 'BV');
INSERT INTO `jos_vm_state` VALUES ('181', '175', 'Bucuresti', 'BUC', 'B');
INSERT INTO `jos_vm_state` VALUES ('182', '175', 'Buzau', 'BUZ', 'BZ');
INSERT INTO `jos_vm_state` VALUES ('183', '175', 'Calarasi', 'CAL', 'CL');
INSERT INTO `jos_vm_state` VALUES ('184', '175', 'Caras Severin', 'CRS', 'CS');
INSERT INTO `jos_vm_state` VALUES ('185', '175', 'Cluj', 'CLJ', 'CJ');
INSERT INTO `jos_vm_state` VALUES ('186', '175', 'Constanta', 'CST', 'CT');
INSERT INTO `jos_vm_state` VALUES ('187', '175', 'Covasna', 'COV', 'CV');
INSERT INTO `jos_vm_state` VALUES ('188', '175', 'Dambovita', 'DAM', 'DB');
INSERT INTO `jos_vm_state` VALUES ('189', '175', 'Dolj', 'DLJ', 'DJ');
INSERT INTO `jos_vm_state` VALUES ('190', '175', 'Galati', 'GAL', 'GL');
INSERT INTO `jos_vm_state` VALUES ('191', '175', 'Giurgiu', 'GIU', 'GR');
INSERT INTO `jos_vm_state` VALUES ('192', '175', 'Gorj', 'GOR', 'GJ');
INSERT INTO `jos_vm_state` VALUES ('193', '175', 'Hargita', 'HRG', 'HR');
INSERT INTO `jos_vm_state` VALUES ('194', '175', 'Hunedoara', 'HUN', 'HD');
INSERT INTO `jos_vm_state` VALUES ('195', '175', 'Ialomita', 'IAL', 'IL');
INSERT INTO `jos_vm_state` VALUES ('196', '175', 'Iasi', 'IAS', 'IS');
INSERT INTO `jos_vm_state` VALUES ('197', '175', 'Ilfov', 'ILF', 'IF');
INSERT INTO `jos_vm_state` VALUES ('198', '175', 'Maramures', 'MAR', 'MM');
INSERT INTO `jos_vm_state` VALUES ('199', '175', 'Mehedinti', 'MEH', 'MH');
INSERT INTO `jos_vm_state` VALUES ('200', '175', 'Mures', 'MUR', 'MS');
INSERT INTO `jos_vm_state` VALUES ('201', '175', 'Neamt', 'NEM', 'NT');
INSERT INTO `jos_vm_state` VALUES ('202', '175', 'Olt', 'OLT', 'OT');
INSERT INTO `jos_vm_state` VALUES ('203', '175', 'Prahova', 'PRA', 'PH');
INSERT INTO `jos_vm_state` VALUES ('204', '175', 'Salaj', 'SAL', 'SJ');
INSERT INTO `jos_vm_state` VALUES ('205', '175', 'Satu Mare', 'SAT', 'SM');
INSERT INTO `jos_vm_state` VALUES ('206', '175', 'Sibiu', 'SIB', 'SB');
INSERT INTO `jos_vm_state` VALUES ('207', '175', 'Suceava', 'SUC', 'SV');
INSERT INTO `jos_vm_state` VALUES ('208', '175', 'Teleorman', 'TEL', 'TR');
INSERT INTO `jos_vm_state` VALUES ('209', '175', 'Timis', 'TIM', 'TM');
INSERT INTO `jos_vm_state` VALUES ('210', '175', 'Tulcea', 'TUL', 'TL');
INSERT INTO `jos_vm_state` VALUES ('211', '175', 'Valcea', 'VAL', 'VL');
INSERT INTO `jos_vm_state` VALUES ('212', '175', 'Vaslui', 'VAS', 'VS');
INSERT INTO `jos_vm_state` VALUES ('213', '175', 'Vrancea', 'VRA', 'VN');
INSERT INTO `jos_vm_state` VALUES ('214', '105', 'Agrigento', 'AGR', 'AG');
INSERT INTO `jos_vm_state` VALUES ('215', '105', 'Alessandria', 'ALE', 'AL');
INSERT INTO `jos_vm_state` VALUES ('216', '105', 'Ancona', 'ANC', 'AN');
INSERT INTO `jos_vm_state` VALUES ('217', '105', 'Aosta', 'AOS', 'AO');
INSERT INTO `jos_vm_state` VALUES ('218', '105', 'Arezzo', 'ARE', 'AR');
INSERT INTO `jos_vm_state` VALUES ('219', '105', 'Ascoli Piceno', 'API', 'AP');
INSERT INTO `jos_vm_state` VALUES ('220', '105', 'Asti', 'AST', 'AT');
INSERT INTO `jos_vm_state` VALUES ('221', '105', 'Avellino', 'AVE', 'AV');
INSERT INTO `jos_vm_state` VALUES ('222', '105', 'Bari', 'BAR', 'BA');
INSERT INTO `jos_vm_state` VALUES ('223', '105', 'Barletta Andria Trani', 'BTA', 'BT');
INSERT INTO `jos_vm_state` VALUES ('224', '105', 'Belluno', 'BEL', 'BL');
INSERT INTO `jos_vm_state` VALUES ('225', '105', 'Benevento', 'BEN', 'BN');
INSERT INTO `jos_vm_state` VALUES ('226', '105', 'Bergamo', 'BEG', 'BG');
INSERT INTO `jos_vm_state` VALUES ('227', '105', 'Biella', 'BIE', 'BI');
INSERT INTO `jos_vm_state` VALUES ('228', '105', 'Bologna', 'BOL', 'BO');
INSERT INTO `jos_vm_state` VALUES ('229', '105', 'Bolzano', 'BOZ', 'BZ');
INSERT INTO `jos_vm_state` VALUES ('230', '105', 'Brescia', 'BRE', 'BS');
INSERT INTO `jos_vm_state` VALUES ('231', '105', 'Brindisi', 'BRI', 'BR');
INSERT INTO `jos_vm_state` VALUES ('232', '105', 'Cagliari', 'CAG', 'CA');
INSERT INTO `jos_vm_state` VALUES ('233', '105', 'Caltanissetta', 'CAL', 'CL');
INSERT INTO `jos_vm_state` VALUES ('234', '105', 'Campobasso', 'CBO', 'CB');
INSERT INTO `jos_vm_state` VALUES ('235', '105', 'Carbonia-Iglesias', 'CAR', 'CI');
INSERT INTO `jos_vm_state` VALUES ('236', '105', 'Caserta', 'CAS', 'CE');
INSERT INTO `jos_vm_state` VALUES ('237', '105', 'Catania', 'CAT', 'CT');
INSERT INTO `jos_vm_state` VALUES ('238', '105', 'Catanzaro', 'CTZ', 'CZ');
INSERT INTO `jos_vm_state` VALUES ('239', '105', 'Chieti', 'CHI', 'CH');
INSERT INTO `jos_vm_state` VALUES ('240', '105', 'Como', 'COM', 'CO');
INSERT INTO `jos_vm_state` VALUES ('241', '105', 'Cosenza', 'COS', 'CS');
INSERT INTO `jos_vm_state` VALUES ('242', '105', 'Cremona', 'CRE', 'CR');
INSERT INTO `jos_vm_state` VALUES ('243', '105', 'Crotone', 'CRO', 'KR');
INSERT INTO `jos_vm_state` VALUES ('244', '105', 'Cuneo', 'CUN', 'CN');
INSERT INTO `jos_vm_state` VALUES ('245', '105', 'Enna', 'ENN', 'EN');
INSERT INTO `jos_vm_state` VALUES ('246', '105', 'Fermo', 'FMO', 'FM');
INSERT INTO `jos_vm_state` VALUES ('247', '105', 'Ferrara', 'FER', 'FE');
INSERT INTO `jos_vm_state` VALUES ('248', '105', 'Firenze', 'FIR', 'FI');
INSERT INTO `jos_vm_state` VALUES ('249', '105', 'Foggia', 'FOG', 'FG');
INSERT INTO `jos_vm_state` VALUES ('250', '105', 'Forli-Cesena', 'FOC', 'FC');
INSERT INTO `jos_vm_state` VALUES ('251', '105', 'Frosinone', 'FRO', 'FR');
INSERT INTO `jos_vm_state` VALUES ('252', '105', 'Genova', 'GEN', 'GE');
INSERT INTO `jos_vm_state` VALUES ('253', '105', 'Gorizia', 'GOR', 'GO');
INSERT INTO `jos_vm_state` VALUES ('254', '105', 'Grosseto', 'GRO', 'GR');
INSERT INTO `jos_vm_state` VALUES ('255', '105', 'Imperia', 'IMP', 'IM');
INSERT INTO `jos_vm_state` VALUES ('256', '105', 'Isernia', 'ISE', 'IS');
INSERT INTO `jos_vm_state` VALUES ('257', '105', 'L\'Aquila', 'AQU', 'AQ');
INSERT INTO `jos_vm_state` VALUES ('258', '105', 'La Spezia', 'LAS', 'SP');
INSERT INTO `jos_vm_state` VALUES ('259', '105', 'Latina', 'LAT', 'LT');
INSERT INTO `jos_vm_state` VALUES ('260', '105', 'Lecce', 'LEC', 'LE');
INSERT INTO `jos_vm_state` VALUES ('261', '105', 'Lecco', 'LCC', 'LC');
INSERT INTO `jos_vm_state` VALUES ('262', '105', 'Livorno', 'LIV', 'LI');
INSERT INTO `jos_vm_state` VALUES ('263', '105', 'Lodi', 'LOD', 'LO');
INSERT INTO `jos_vm_state` VALUES ('264', '105', 'Lucca', 'LUC', 'LU');
INSERT INTO `jos_vm_state` VALUES ('265', '105', 'Macerata', 'MAC', 'MC');
INSERT INTO `jos_vm_state` VALUES ('266', '105', 'Mantova', 'MAN', 'MN');
INSERT INTO `jos_vm_state` VALUES ('267', '105', 'Massa-Carrara', 'MAS', 'MS');
INSERT INTO `jos_vm_state` VALUES ('268', '105', 'Matera', 'MAA', 'MT');
INSERT INTO `jos_vm_state` VALUES ('269', '105', 'Medio Campidano', 'MED', 'VS');
INSERT INTO `jos_vm_state` VALUES ('270', '105', 'Messina', 'MES', 'ME');
INSERT INTO `jos_vm_state` VALUES ('271', '105', 'Milano', 'MIL', 'MI');
INSERT INTO `jos_vm_state` VALUES ('272', '105', 'Modena', 'MOD', 'MO');
INSERT INTO `jos_vm_state` VALUES ('273', '105', 'Monza e della Brianza', 'MBA', 'MB');
INSERT INTO `jos_vm_state` VALUES ('274', '105', 'Napoli', 'NAP', 'NA');
INSERT INTO `jos_vm_state` VALUES ('275', '105', 'Novara', 'NOV', 'NO');
INSERT INTO `jos_vm_state` VALUES ('276', '105', 'Nuoro', 'NUR', 'NU');
INSERT INTO `jos_vm_state` VALUES ('277', '105', 'Ogliastra', 'OGL', 'OG');
INSERT INTO `jos_vm_state` VALUES ('278', '105', 'Olbia-Tempio', 'OLB', 'OT');
INSERT INTO `jos_vm_state` VALUES ('279', '105', 'Oristano', 'ORI', 'OR');
INSERT INTO `jos_vm_state` VALUES ('280', '105', 'Padova', 'PDA', 'PD');
INSERT INTO `jos_vm_state` VALUES ('281', '105', 'Palermo', 'PAL', 'PA');
INSERT INTO `jos_vm_state` VALUES ('282', '105', 'Parma', 'PAA', 'PR');
INSERT INTO `jos_vm_state` VALUES ('283', '105', 'Pavia', 'PAV', 'PV');
INSERT INTO `jos_vm_state` VALUES ('284', '105', 'Perugia', 'PER', 'PG');
INSERT INTO `jos_vm_state` VALUES ('285', '105', 'Pesaro e Urbino', 'PES', 'PU');
INSERT INTO `jos_vm_state` VALUES ('286', '105', 'Pescara', 'PSC', 'PE');
INSERT INTO `jos_vm_state` VALUES ('287', '105', 'Piacenza', 'PIA', 'PC');
INSERT INTO `jos_vm_state` VALUES ('288', '105', 'Pisa', 'PIS', 'PI');
INSERT INTO `jos_vm_state` VALUES ('289', '105', 'Pistoia', 'PIT', 'PT');
INSERT INTO `jos_vm_state` VALUES ('290', '105', 'Pordenone', 'POR', 'PN');
INSERT INTO `jos_vm_state` VALUES ('291', '105', 'Potenza', 'PTZ', 'PZ');
INSERT INTO `jos_vm_state` VALUES ('292', '105', 'Prato', 'PRA', 'PO');
INSERT INTO `jos_vm_state` VALUES ('293', '105', 'Ragusa', 'RAG', 'RG');
INSERT INTO `jos_vm_state` VALUES ('294', '105', 'Ravenna', 'RAV', 'RA');
INSERT INTO `jos_vm_state` VALUES ('295', '105', 'Reggio Calabria', 'REG', 'RC');
INSERT INTO `jos_vm_state` VALUES ('296', '105', 'Reggio Emilia', 'REE', 'RE');
INSERT INTO `jos_vm_state` VALUES ('297', '105', 'Rieti', 'RIE', 'RI');
INSERT INTO `jos_vm_state` VALUES ('298', '105', 'Rimini', 'RIM', 'RN');
INSERT INTO `jos_vm_state` VALUES ('299', '105', 'Roma', 'ROM', 'RM');
INSERT INTO `jos_vm_state` VALUES ('300', '105', 'Rovigo', 'ROV', 'RO');
INSERT INTO `jos_vm_state` VALUES ('301', '105', 'Salerno', 'SAL', 'SA');
INSERT INTO `jos_vm_state` VALUES ('302', '105', 'Sassari', 'SAS', 'SS');
INSERT INTO `jos_vm_state` VALUES ('303', '105', 'Savona', 'SAV', 'SV');
INSERT INTO `jos_vm_state` VALUES ('304', '105', 'Siena', 'SIE', 'SI');
INSERT INTO `jos_vm_state` VALUES ('305', '105', 'Siracusa', 'SIR', 'SR');
INSERT INTO `jos_vm_state` VALUES ('306', '105', 'Sondrio', 'SOO', 'SO');
INSERT INTO `jos_vm_state` VALUES ('307', '105', 'Taranto', 'TAR', 'TA');
INSERT INTO `jos_vm_state` VALUES ('308', '105', 'Teramo', 'TER', 'TE');
INSERT INTO `jos_vm_state` VALUES ('309', '105', 'Terni', 'TRN', 'TR');
INSERT INTO `jos_vm_state` VALUES ('310', '105', 'Torino', 'TOR', 'TO');
INSERT INTO `jos_vm_state` VALUES ('311', '105', 'Trapani', 'TRA', 'TP');
INSERT INTO `jos_vm_state` VALUES ('312', '105', 'Trento', 'TRE', 'TN');
INSERT INTO `jos_vm_state` VALUES ('313', '105', 'Treviso', 'TRV', 'TV');
INSERT INTO `jos_vm_state` VALUES ('314', '105', 'Trieste', 'TRI', 'TS');
INSERT INTO `jos_vm_state` VALUES ('315', '105', 'Udine', 'UDI', 'UD');
INSERT INTO `jos_vm_state` VALUES ('316', '105', 'Varese', 'VAR', 'VA');
INSERT INTO `jos_vm_state` VALUES ('317', '105', 'Venezia', 'VEN', 'VE');
INSERT INTO `jos_vm_state` VALUES ('318', '105', 'Verbano Cusio Ossola', 'VCO', 'VB');
INSERT INTO `jos_vm_state` VALUES ('319', '105', 'Vercelli', 'VER', 'VC');
INSERT INTO `jos_vm_state` VALUES ('320', '105', 'Verona', 'VRN', 'VR');
INSERT INTO `jos_vm_state` VALUES ('321', '105', 'Vibo Valenzia', 'VIV', 'VV');
INSERT INTO `jos_vm_state` VALUES ('322', '105', 'Vicenza', 'VII', 'VI');
INSERT INTO `jos_vm_state` VALUES ('323', '105', 'Viterbo', 'VIT', 'VT');
INSERT INTO `jos_vm_state` VALUES ('324', '195', 'A Coruña', 'ACO', '15');
INSERT INTO `jos_vm_state` VALUES ('325', '195', 'Alava', 'ALA', '01');
INSERT INTO `jos_vm_state` VALUES ('326', '195', 'Albacete', 'ALB', '02');
INSERT INTO `jos_vm_state` VALUES ('327', '195', 'Alicante', 'ALI', '03');
INSERT INTO `jos_vm_state` VALUES ('328', '195', 'Almeria', 'ALM', '04');
INSERT INTO `jos_vm_state` VALUES ('329', '195', 'Asturias', 'AST', '33');
INSERT INTO `jos_vm_state` VALUES ('330', '195', 'Avila', 'AVI', '05');
INSERT INTO `jos_vm_state` VALUES ('331', '195', 'Badajoz', 'BAD', '06');
INSERT INTO `jos_vm_state` VALUES ('332', '195', 'Baleares', 'BAL', '07');
INSERT INTO `jos_vm_state` VALUES ('333', '195', 'Barcelona', 'BAR', '08');
INSERT INTO `jos_vm_state` VALUES ('334', '195', 'Burgos', 'BUR', '09');
INSERT INTO `jos_vm_state` VALUES ('335', '195', 'Caceres', 'CAC', '10');
INSERT INTO `jos_vm_state` VALUES ('336', '195', 'Cadiz', 'CAD', '11');
INSERT INTO `jos_vm_state` VALUES ('337', '195', 'Cantabria', 'CAN', '39');
INSERT INTO `jos_vm_state` VALUES ('338', '195', 'Castellon', 'CAS', '12');
INSERT INTO `jos_vm_state` VALUES ('339', '195', 'Ceuta', 'CEU', '51');
INSERT INTO `jos_vm_state` VALUES ('340', '195', 'Ciudad Real', 'CIU', '13');
INSERT INTO `jos_vm_state` VALUES ('341', '195', 'Cordoba', 'COR', '14');
INSERT INTO `jos_vm_state` VALUES ('342', '195', 'Cuenca', 'CUE', '16');
INSERT INTO `jos_vm_state` VALUES ('343', '195', 'Girona', 'GIR', '17');
INSERT INTO `jos_vm_state` VALUES ('344', '195', 'Granada', 'GRA', '18');
INSERT INTO `jos_vm_state` VALUES ('345', '195', 'Guadalajara', 'GUA', '19');
INSERT INTO `jos_vm_state` VALUES ('346', '195', 'Guipuzcoa', 'GUI', '20');
INSERT INTO `jos_vm_state` VALUES ('347', '195', 'Huelva', 'HUL', '21');
INSERT INTO `jos_vm_state` VALUES ('348', '195', 'Huesca', 'HUS', '22');
INSERT INTO `jos_vm_state` VALUES ('349', '195', 'Jaen', 'JAE', '23');
INSERT INTO `jos_vm_state` VALUES ('350', '195', 'La Rioja', 'LRI', '26');
INSERT INTO `jos_vm_state` VALUES ('351', '195', 'Las Palmas', 'LPA', '35');
INSERT INTO `jos_vm_state` VALUES ('352', '195', 'Leon', 'LEO', '24');
INSERT INTO `jos_vm_state` VALUES ('353', '195', 'Lleida', 'LLE', '25');
INSERT INTO `jos_vm_state` VALUES ('354', '195', 'Lugo', 'LUG', '27');
INSERT INTO `jos_vm_state` VALUES ('355', '195', 'Madrid', 'MAD', '28');
INSERT INTO `jos_vm_state` VALUES ('356', '195', 'Malaga', 'MAL', '29');
INSERT INTO `jos_vm_state` VALUES ('357', '195', 'Melilla', 'MEL', '52');
INSERT INTO `jos_vm_state` VALUES ('358', '195', 'Murcia', 'MUR', '30');
INSERT INTO `jos_vm_state` VALUES ('359', '195', 'Navarra', 'NAV', '31');
INSERT INTO `jos_vm_state` VALUES ('360', '195', 'Ourense', 'OUR', '32');
INSERT INTO `jos_vm_state` VALUES ('361', '195', 'Palencia', 'PAL', '34');
INSERT INTO `jos_vm_state` VALUES ('362', '195', 'Pontevedra', 'PON', '36');
INSERT INTO `jos_vm_state` VALUES ('363', '195', 'Salamanca', 'SAL', '37');
INSERT INTO `jos_vm_state` VALUES ('364', '195', 'Santa Cruz de Tenerife', 'SCT', '38');
INSERT INTO `jos_vm_state` VALUES ('365', '195', 'Segovia', 'SEG', '40');
INSERT INTO `jos_vm_state` VALUES ('366', '195', 'Sevilla', 'SEV', '41');
INSERT INTO `jos_vm_state` VALUES ('367', '195', 'Soria', 'SOR', '42');
INSERT INTO `jos_vm_state` VALUES ('368', '195', 'Tarragona', 'TAR', '43');
INSERT INTO `jos_vm_state` VALUES ('369', '195', 'Teruel', 'TER', '44');
INSERT INTO `jos_vm_state` VALUES ('370', '195', 'Toledo', 'TOL', '45');
INSERT INTO `jos_vm_state` VALUES ('371', '195', 'Valencia', 'VAL', '46');
INSERT INTO `jos_vm_state` VALUES ('372', '195', 'Valladolid', 'VLL', '47');
INSERT INTO `jos_vm_state` VALUES ('373', '195', 'Vizcaya', 'VIZ', '48');
INSERT INTO `jos_vm_state` VALUES ('374', '195', 'Zamora', 'ZAM', '49');
INSERT INTO `jos_vm_state` VALUES ('375', '195', 'Zaragoza', 'ZAR', '50');
INSERT INTO `jos_vm_state` VALUES ('376', '11', 'Aragatsotn', 'ARG', 'AG');
INSERT INTO `jos_vm_state` VALUES ('377', '11', 'Ararat', 'ARR', 'AR');
INSERT INTO `jos_vm_state` VALUES ('378', '11', 'Armavir', 'ARM', 'AV');
INSERT INTO `jos_vm_state` VALUES ('379', '11', 'Gegharkunik', 'GEG', 'GR');
INSERT INTO `jos_vm_state` VALUES ('380', '11', 'Kotayk', 'KOT', 'KT');
INSERT INTO `jos_vm_state` VALUES ('381', '11', 'Lori', 'LOR', 'LO');
INSERT INTO `jos_vm_state` VALUES ('382', '11', 'Shirak', 'SHI', 'SH');
INSERT INTO `jos_vm_state` VALUES ('383', '11', 'Syunik', 'SYU', 'SU');
INSERT INTO `jos_vm_state` VALUES ('384', '11', 'Tavush', 'TAV', 'TV');
INSERT INTO `jos_vm_state` VALUES ('385', '11', 'Vayots-Dzor', 'VAD', 'VD');
INSERT INTO `jos_vm_state` VALUES ('386', '11', 'Yerevan', 'YER', 'ER');
INSERT INTO `jos_vm_state` VALUES ('387', '99', 'Andaman & Nicobar Islands', 'ANI', 'AI');
INSERT INTO `jos_vm_state` VALUES ('388', '99', 'Andhra Pradesh', 'AND', 'AN');
INSERT INTO `jos_vm_state` VALUES ('389', '99', 'Arunachal Pradesh', 'ARU', 'AR');
INSERT INTO `jos_vm_state` VALUES ('390', '99', 'Assam', 'ASS', 'AS');
INSERT INTO `jos_vm_state` VALUES ('391', '99', 'Bihar', 'BIH', 'BI');
INSERT INTO `jos_vm_state` VALUES ('392', '99', 'Chandigarh', 'CHA', 'CA');
INSERT INTO `jos_vm_state` VALUES ('393', '99', 'Chhatisgarh', 'CHH', 'CH');
INSERT INTO `jos_vm_state` VALUES ('394', '99', 'Dadra & Nagar Haveli', 'DAD', 'DD');
INSERT INTO `jos_vm_state` VALUES ('395', '99', 'Daman & Diu', 'DAM', 'DA');
INSERT INTO `jos_vm_state` VALUES ('396', '99', 'Delhi', 'DEL', 'DE');
INSERT INTO `jos_vm_state` VALUES ('397', '99', 'Goa', 'GOA', 'GO');
INSERT INTO `jos_vm_state` VALUES ('398', '99', 'Gujarat', 'GUJ', 'GU');
INSERT INTO `jos_vm_state` VALUES ('399', '99', 'Haryana', 'HAR', 'HA');
INSERT INTO `jos_vm_state` VALUES ('400', '99', 'Himachal Pradesh', 'HIM', 'HI');
INSERT INTO `jos_vm_state` VALUES ('401', '99', 'Jammu & Kashmir', 'JAM', 'JA');
INSERT INTO `jos_vm_state` VALUES ('402', '99', 'Jharkhand', 'JHA', 'JH');
INSERT INTO `jos_vm_state` VALUES ('403', '99', 'Karnataka', 'KAR', 'KA');
INSERT INTO `jos_vm_state` VALUES ('404', '99', 'Kerala', 'KER', 'KE');
INSERT INTO `jos_vm_state` VALUES ('405', '99', 'Lakshadweep', 'LAK', 'LA');
INSERT INTO `jos_vm_state` VALUES ('406', '99', 'Madhya Pradesh', 'MAD', 'MD');
INSERT INTO `jos_vm_state` VALUES ('407', '99', 'Maharashtra', 'MAH', 'MH');
INSERT INTO `jos_vm_state` VALUES ('408', '99', 'Manipur', 'MAN', 'MN');
INSERT INTO `jos_vm_state` VALUES ('409', '99', 'Meghalaya', 'MEG', 'ME');
INSERT INTO `jos_vm_state` VALUES ('410', '99', 'Mizoram', 'MIZ', 'MI');
INSERT INTO `jos_vm_state` VALUES ('411', '99', 'Nagaland', 'NAG', 'NA');
INSERT INTO `jos_vm_state` VALUES ('412', '99', 'Orissa', 'ORI', 'OR');
INSERT INTO `jos_vm_state` VALUES ('413', '99', 'Pondicherry', 'PON', 'PO');
INSERT INTO `jos_vm_state` VALUES ('414', '99', 'Punjab', 'PUN', 'PU');
INSERT INTO `jos_vm_state` VALUES ('415', '99', 'Rajasthan', 'RAJ', 'RA');
INSERT INTO `jos_vm_state` VALUES ('416', '99', 'Sikkim', 'SIK', 'SI');
INSERT INTO `jos_vm_state` VALUES ('417', '99', 'Tamil Nadu', 'TAM', 'TA');
INSERT INTO `jos_vm_state` VALUES ('418', '99', 'Tripura', 'TRI', 'TR');
INSERT INTO `jos_vm_state` VALUES ('419', '99', 'Uttaranchal', 'UAR', 'UA');
INSERT INTO `jos_vm_state` VALUES ('420', '99', 'Uttar Pradesh', 'UTT', 'UT');
INSERT INTO `jos_vm_state` VALUES ('421', '99', 'West Bengal', 'WES', 'WE');
INSERT INTO `jos_vm_state` VALUES ('422', '101', 'Ahmadi va Kohkiluyeh', 'BOK', 'BO');
INSERT INTO `jos_vm_state` VALUES ('423', '101', 'Ardabil', 'ARD', 'AR');
INSERT INTO `jos_vm_state` VALUES ('424', '101', 'Azarbayjan-e Gharbi', 'AZG', 'AG');
INSERT INTO `jos_vm_state` VALUES ('425', '101', 'Azarbayjan-e Sharqi', 'AZS', 'AS');
INSERT INTO `jos_vm_state` VALUES ('426', '101', 'Bushehr', 'BUS', 'BU');
INSERT INTO `jos_vm_state` VALUES ('427', '101', 'Chaharmahal va Bakhtiari', 'CMB', 'CM');
INSERT INTO `jos_vm_state` VALUES ('428', '101', 'Esfahan', 'ESF', 'ES');
INSERT INTO `jos_vm_state` VALUES ('429', '101', 'Fars', 'FAR', 'FA');
INSERT INTO `jos_vm_state` VALUES ('430', '101', 'Gilan', 'GIL', 'GI');
INSERT INTO `jos_vm_state` VALUES ('431', '101', 'Gorgan', 'GOR', 'GO');
INSERT INTO `jos_vm_state` VALUES ('432', '101', 'Hamadan', 'HAM', 'HA');
INSERT INTO `jos_vm_state` VALUES ('433', '101', 'Hormozgan', 'HOR', 'HO');
INSERT INTO `jos_vm_state` VALUES ('434', '101', 'Ilam', 'ILA', 'IL');
INSERT INTO `jos_vm_state` VALUES ('435', '101', 'Kerman', 'KER', 'KE');
INSERT INTO `jos_vm_state` VALUES ('436', '101', 'Kermanshah', 'BAK', 'BA');
INSERT INTO `jos_vm_state` VALUES ('437', '101', 'Khorasan-e Junoubi', 'KHJ', 'KJ');
INSERT INTO `jos_vm_state` VALUES ('438', '101', 'Khorasan-e Razavi', 'KHR', 'KR');
INSERT INTO `jos_vm_state` VALUES ('439', '101', 'Khorasan-e Shomali', 'KHS', 'KS');
INSERT INTO `jos_vm_state` VALUES ('440', '101', 'Khuzestan', 'KHU', 'KH');
INSERT INTO `jos_vm_state` VALUES ('441', '101', 'Kordestan', 'KOR', 'KO');
INSERT INTO `jos_vm_state` VALUES ('442', '101', 'Lorestan', 'LOR', 'LO');
INSERT INTO `jos_vm_state` VALUES ('443', '101', 'Markazi', 'MAR', 'MR');
INSERT INTO `jos_vm_state` VALUES ('444', '101', 'Mazandaran', 'MAZ', 'MZ');
INSERT INTO `jos_vm_state` VALUES ('445', '101', 'Qazvin', 'QAS', 'QA');
INSERT INTO `jos_vm_state` VALUES ('446', '101', 'Qom', 'QOM', 'QO');
INSERT INTO `jos_vm_state` VALUES ('447', '101', 'Semnan', 'SEM', 'SE');
INSERT INTO `jos_vm_state` VALUES ('448', '101', 'Sistan va Baluchestan', 'SBA', 'SB');
INSERT INTO `jos_vm_state` VALUES ('449', '101', 'Tehran', 'TEH', 'TE');
INSERT INTO `jos_vm_state` VALUES ('450', '101', 'Yazd', 'YAZ', 'YA');
INSERT INTO `jos_vm_state` VALUES ('451', '101', 'Zanjan', 'ZAN', 'ZA');
INSERT INTO `jos_vm_tax_rate` VALUES ('2', '1', 'CA', 'USA', '964565926', '0.09750');
INSERT INTO `jos_vm_user_info` VALUES ('4520400a570f504d45071823c7b5f1f2', '62', 'BT', null, null, null, null, null, null, null, null, null, '', null, '', '', 'US', '', 'pool-uaf@googlegroups.com', null, null, null, null, null, '1316217641', '1316188892', 'shopper', '', '', '', '', '', 'Checking');
INSERT INTO `jos_vm_userfield` VALUES ('1', 'email', 'REGISTER_EMAIL', '', 'emailaddress', '100', '30', '1', '2', null, null, null, null, '1', '1', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('7', 'title', 'PHPSHOP_SHOPPER_FORM_TITLE', '', 'select', '0', '0', '0', '8', null, null, null, null, '1', '1', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('3', 'password', 'PHPSHOP_SHOPPER_FORM_PASSWORD_1', '', 'password', '25', '30', '1', '4', null, null, null, null, '1', '1', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('4', 'password2', 'PHPSHOP_SHOPPER_FORM_PASSWORD_2', '', 'password', '25', '30', '1', '5', null, null, null, null, '1', '1', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('6', 'company', 'PHPSHOP_SHOPPER_FORM_COMPANY_NAME', '', 'text', '64', '30', '0', '7', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('5', 'delimiter_billto', 'PHPSHOP_USER_FORM_BILLTO_LBL', '', 'delimiter', '25', '30', '0', '6', null, null, null, null, '1', '1', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('2', 'username', 'REGISTER_UNAME', '', 'text', '25', '30', '1', '3', null, null, null, null, '1', '1', '0', '1', '0', '0', '1', '1', '');
INSERT INTO `jos_vm_userfield` VALUES ('35', 'address_type_name', 'PHPSHOP_USER_FORM_ADDRESS_LABEL', '', 'text', '32', '30', '1', '6', null, null, null, null, '1', '0', '1', '0', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('8', 'first_name', 'PHPSHOP_SHOPPER_FORM_FIRST_NAME', '', 'text', '32', '30', '1', '9', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('9', 'last_name', 'PHPSHOP_SHOPPER_FORM_LAST_NAME', '', 'text', '32', '30', '1', '10', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('10', 'middle_name', 'PHPSHOP_SHOPPER_FORM_MIDDLE_NAME', '', 'text', '32', '30', '0', '11', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('11', 'address_1', 'PHPSHOP_SHOPPER_FORM_ADDRESS_1', '', 'text', '64', '30', '1', '12', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('12', 'address_2', 'PHPSHOP_SHOPPER_FORM_ADDRESS_2', '', 'text', '64', '30', '0', '13', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('13', 'city', 'PHPSHOP_SHOPPER_FORM_CITY', '', 'text', '32', '30', '1', '14', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('14', 'zip', 'PHPSHOP_SHOPPER_FORM_ZIP', '', 'text', '32', '30', '1', '15', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('15', 'country', 'PHPSHOP_SHOPPER_FORM_COUNTRY', '', 'select', '0', '0', '1', '16', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('16', 'state', 'PHPSHOP_SHOPPER_FORM_STATE', '', 'select', '0', '0', '1', '17', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('17', 'phone_1', 'PHPSHOP_SHOPPER_FORM_PHONE', '', 'text', '32', '30', '1', '18', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('18', 'phone_2', 'PHPSHOP_SHOPPER_FORM_PHONE2', '', 'text', '32', '30', '0', '19', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('19', 'fax', 'PHPSHOP_SHOPPER_FORM_FAX', '', 'text', '32', '30', '0', '20', null, null, null, null, '1', '1', '1', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('20', 'delimiter_bankaccount', 'PHPSHOP_ACCOUNT_BANK_TITLE', '', 'delimiter', '25', '30', '0', '21', null, null, null, null, '1', '0', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('21', 'bank_account_holder', 'PHPSHOP_ACCOUNT_LBL_BANK_ACCOUNT_HOLDER', '', 'text', '48', '30', '0', '22', null, null, null, null, '1', '0', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('22', 'bank_account_nr', 'PHPSHOP_ACCOUNT_LBL_BANK_ACCOUNT_NR', '', 'text', '32', '30', '0', '23', null, null, null, null, '1', '0', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('23', 'bank_sort_code', 'PHPSHOP_ACCOUNT_LBL_BANK_SORT_CODE', '', 'text', '16', '30', '0', '24', null, null, null, null, '1', '0', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('24', 'bank_name', 'PHPSHOP_ACCOUNT_LBL_BANK_NAME', '', 'text', '32', '30', '0', '25', null, null, null, null, '1', '0', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('25', 'bank_account_type', 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE', '', 'select', '0', '0', '0', '26', null, null, null, null, '1', '0', '0', '1', '1', '0', '1', '1', '');
INSERT INTO `jos_vm_userfield` VALUES ('26', 'bank_iban', 'PHPSHOP_ACCOUNT_LBL_BANK_IBAN', '', 'text', '64', '30', '0', '27', null, null, null, null, '1', '0', '0', '1', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('27', 'delimiter_sendregistration', 'BUTTON_SEND_REG', '', 'delimiter', '25', '30', '0', '28', null, null, null, null, '1', '1', '0', '0', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('28', 'agreed', 'PHPSHOP_I_AGREE_TO_TOS', '', 'checkbox', null, null, '1', '29', null, null, null, null, '1', '1', '0', '0', '0', '0', '1', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('29', 'delimiter_userinfo', 'PHPSHOP_ORDER_PRINT_CUST_INFO_LBL', '', 'delimiter', null, null, '0', '1', null, null, null, null, '1', '1', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('30', 'extra_field_1', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_1', '', 'text', '255', '30', '0', '31', null, null, null, null, '0', '1', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('31', 'extra_field_2', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_2', '', 'text', '255', '30', '0', '32', null, null, null, null, '0', '1', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('32', 'extra_field_3', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_3', '', 'text', '255', '30', '0', '33', null, null, null, null, '0', '1', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('33', 'extra_field_4', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_4', '', 'select', '1', '1', '0', '34', null, null, null, null, '0', '1', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield` VALUES ('34', 'extra_field_5', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_5', '', 'select', '1', '1', '0', '35', null, null, null, null, '0', '1', '0', '1', '0', '0', '0', '1', null);
INSERT INTO `jos_vm_userfield_values` VALUES ('1', '25', 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_BUSINESSCHECKING', 'Checking', '1', '1');
INSERT INTO `jos_vm_userfield_values` VALUES ('2', '25', 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_CHECKING', 'Business Checking', '2', '1');
INSERT INTO `jos_vm_userfield_values` VALUES ('3', '25', 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_SAVINGS', 'Savings', '3', '1');
INSERT INTO `jos_vm_vendor` VALUES ('1', 'Cty TNHH TM & DV Đức Mạnh', 'Owner', 'Demo', 'Store', 'Mr.', '555-555-1212', '555-555-1212', '555-555-1212', 'pool-uaf@googlegroups.com', '555-555-1212', 'Bình Dương, Hồ Chí Minh', '', 'Hồ Chí Minh', ' - ', 'VNM', '84055', 'Văn phòng phẩm Đức Mạnh', '<p>We have the best tools for do-it-yourselfers.  Check us out!</p>\r\n<p>We were established in 1969 in a time when getting good tools was expensive, but the quality was good.  Now that only a select few of those authentic tools survive, we have dedicated this store to bringing the experience alive for collectors and master mechanics everywhere.</p>\r\n<p>You can easily find products selecting the category you would like to browse above.</p>', '0', '', 'c19970d6f2970cb0d1b13bea3af3144a.gif', 'VND', '950302468', '1316280138', '', '<h5>You haven\\\'t configured any terms of service yet. Click <a href=\\\"administrator/index2.php?page=store.store_form&amp;option=com_virtuemart\\\">here</a> to change this text.</h5>', 'http://localhost/vanphongphamdm', '0.00', '0.00', '1|VND|2|.| |2|1', 'USD,VND', '{storename}\r\n{address_1}\r\n{address_2}\r\n{city}, {zip}', '%A, %d %B %Y %H:%M');
INSERT INTO `jos_vm_vendor_category` VALUES ('6', '-default-', 'Default');
INSERT INTO `jos_vm_zone_shipping` VALUES ('1', 'Default', '6.00', '35.00', 'This is the default Shipping Zone. This is the zone information that all countries will use until you assign each individual country to a Zone.', '2');
INSERT INTO `jos_vm_zone_shipping` VALUES ('2', 'Zone 1', '1000.00', '10000.00', 'This is a zone example', '2');
INSERT INTO `jos_vm_zone_shipping` VALUES ('3', 'Zone 2', '2.00', '22.00', 'This is the second zone. You can use this for notes about this zone', '2');
INSERT INTO `jos_vm_zone_shipping` VALUES ('4', 'Zone 3', '11.00', '64.00', 'Another usefull thing might be details about this zone or special instructions.', '2');
INSERT INTO `jos_weblinks` VALUES ('1', '2', '0', 'Joomla!', 'joomla', 'http://www.joomla.org', 'Home of Joomla!', '2005-02-14 15:19:02', '3', '1', '0', '0000-00-00 00:00:00', '1', '0', '1', 'target=0');
INSERT INTO `jos_weblinks` VALUES ('2', '2', '0', 'php.net', 'php', 'http://www.php.net', 'The language that Joomla! is developed in', '2004-07-07 11:33:24', '6', '1', '0', '0000-00-00 00:00:00', '3', '0', '1', '');
INSERT INTO `jos_weblinks` VALUES ('3', '2', '0', 'MySQL', 'mysql', 'http://www.mysql.com', 'The database that Joomla! uses', '2004-07-07 10:18:31', '1', '1', '0', '0000-00-00 00:00:00', '5', '0', '1', '');
INSERT INTO `jos_weblinks` VALUES ('4', '2', '0', 'OpenSourceMatters', 'opensourcematters', 'http://www.opensourcematters.org', 'Home of OSM', '2005-02-14 15:19:02', '11', '1', '0', '0000-00-00 00:00:00', '2', '0', '1', 'target=0');
INSERT INTO `jos_weblinks` VALUES ('5', '2', '0', 'Joomla! - Forums', 'joomla-forums', 'http://forum.joomla.org', 'Joomla! Forums', '2005-02-14 15:19:02', '4', '1', '0', '0000-00-00 00:00:00', '4', '0', '1', 'target=0');
INSERT INTO `jos_weblinks` VALUES ('6', '2', '0', 'Ohloh Tracking of Joomla!', 'ohloh-tracking-of-joomla', 'http://www.ohloh.net/projects/20', 'Objective reports from Ohloh about Joomla\'s development activity. Joomla! has some star developers with serious kudos.', '2007-07-19 09:28:31', '1', '1', '0', '0000-00-00 00:00:00', '6', '0', '1', 'target=0\n\n');
