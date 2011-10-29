-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2011 at 05:24 PM
-- Server version: 5.1.56
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vanpho60_dm`
--

-- --------------------------------------------------------

--
-- Table structure for table `jos_banner`
--

CREATE TABLE IF NOT EXISTS `jos_banner` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT 'banner',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `imptotal` int(11) NOT NULL DEFAULT '0',
  `impmade` int(11) NOT NULL DEFAULT '0',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `imageurl` varchar(100) NOT NULL DEFAULT '',
  `clickurl` varchar(200) NOT NULL DEFAULT '',
  `date` datetime DEFAULT NULL,
  `showBanner` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jos_banner`
--

INSERT INTO `jos_banner` (`bid`, `cid`, `type`, `name`, `alias`, `imptotal`, `impmade`, `clicks`, `imageurl`, `clickurl`, `date`, `showBanner`, `checked_out`, `checked_out_time`, `editor`, `custombannercode`, `catid`, `description`, `sticky`, `ordering`, `publish_up`, `publish_down`, `tags`, `params`) VALUES
(1, 1, 'banner', 'OSM 1', 'osm-1', 0, 43, 0, 'osmbanner1.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 1, 'banner', 'OSM 2', 'osm-2', 0, 49, 0, 'osmbanner2.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 1, '', 'Joomla!', 'joomla', 0, 49, 0, '', 'http://www.joomla.org', '2006-05-29 14:21:28', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! The most popular and widely used Open Source CMS Project in the world.', 14, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 1, '', 'JoomlaCode', 'joomlacode', 0, 49, 0, '', 'http://joomlacode.org', '2006-05-29 14:19:26', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomlaCode, development and distribution made easy.', 14, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 1, '', 'Joomla! Extensions', 'joomla-extensions', 0, 44, 0, '', 'http://extensions.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! Components, Modules, Plugins and Languages by the bucket load.', 14, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 1, '', 'Joomla! Shop', 'joomla-shop', 0, 44, 0, '', 'http://shop.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nFor all your Joomla! merchandise.', 14, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(7, 1, '', 'Joomla! Promo Shop', 'joomla-promo-shop', 0, 192, 1, 'shop-ad.jpg', 'http://shop.joomla.org', '2007-09-19 17:26:24', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(8, 1, '', 'Joomla! Promo Books', 'joomla-promo-books', 0, 210, 0, 'shop-ad-books.jpg', 'http://shop.joomla.org/amazoncom-bookstores.html', '2007-09-19 17:28:01', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jos_bannerclient`
--

CREATE TABLE IF NOT EXISTS `jos_bannerclient` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `contact` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out_time` time DEFAULT NULL,
  `editor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jos_bannerclient`
--

INSERT INTO `jos_bannerclient` (`cid`, `name`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`, `editor`) VALUES
(1, 'Open Source Matters', 'Administrator', 'admin@opensourcematters.org', '', 0, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jos_bannertrack`
--

CREATE TABLE IF NOT EXISTS `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_categories`
--

CREATE TABLE IF NOT EXISTS `jos_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `section` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editor` varchar(50) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `jos_categories`
--

INSERT INTO `jos_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(1, 0, 'Tin khuyên mại', '', 'tinkhuyenmai', 'taking_notes.jpg', '1', 'left', '<p>Thông tin khuyên mãi host nhất.</p>', 1, 0, '0000-00-00 00:00:00', '', 1, 0, 1, ''),
(2, 0, 'Joomla! Specific Links', '', 'joomla-specific-links', 'clock.jpg', 'com_weblinks', 'left', 'A selection of links that are all related to the Joomla! Project.', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(4, 0, 'Joomla!', '', 'joomla', '', 'com_newsfeeds', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(5, 0, 'Free and Open Source Software', '', 'free-and-open-source-software', '', 'com_newsfeeds', 'left', 'Read the latest news about free and open source software from some of its leading advocates.', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(6, 0, 'Related Projects', '', 'related-projects', '', 'com_newsfeeds', 'left', 'Joomla builds on and collaborates with many other free and open source projects. Keep up with the latest news from some of them.', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(12, 0, 'Contacts', '', 'contacts', '', 'com_contact_details', 'left', 'Contact Details for this Web site', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(13, 0, 'Joomla', '', 'joomla', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(14, 0, 'Text Ads', '', 'text-ads', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(15, 0, 'Features', '', 'features', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, ''),
(17, 0, 'Benefits', '', 'benefits', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(18, 0, 'Platforms', '', 'platforms', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(19, 0, 'Other Resources', '', 'other-resources', '', 'com_weblinks', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(33, 0, 'Joomla! Promo', '', 'joomla-promo', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(34, 0, 'Giới Thiệu Công Ty', '', 'gioithieucongty', '', '5', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(35, 0, 'Liên Hệ', '', 'lienhe', '', '4', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(36, 0, 'Kinh Tế', '', 'kinhte', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(37, 0, 'Tin Xã Hội', '', 'xahoi', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(38, 0, 'Tinvpp', '', 'tinvpp', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, ''),
(39, 0, 'Dịch Vụ', '', 'dichvu', '', '6', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jos_components`
--

CREATE TABLE IF NOT EXISTS `jos_components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) unsigned NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `admin_menu_link` varchar(255) NOT NULL DEFAULT '',
  `admin_menu_alt` varchar(255) NOT NULL DEFAULT '',
  `option` varchar(50) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `admin_menu_img` varchar(255) NOT NULL DEFAULT '',
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `jos_components`
--

INSERT INTO `jos_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(4, 'Web Links', 'option=com_weblinks', 0, 0, '', 'Manage Weblinks', 'com_weblinks', 0, 'js/ThemeOffice/component.png', 0, 'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', 1),
(5, 'Links', '', 0, 4, 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(6, 'Categories', '', 0, 4, 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(11, 'News Feeds', 'option=com_newsfeeds', 0, 0, '', 'News Feeds Management', 'com_newsfeeds', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(12, 'Feeds', '', 0, 11, 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, 'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 1),
(13, 'Categories', '', 0, 11, 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, '', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=0\n\n', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, '', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, '', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, '', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'show_noauth=0\nshow_title=1\nlink_titles=1\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=0\nfeed_summary=0\nfilter_tags=\nfilter_attritbutes=\n\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, '', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, '', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, 'site=vi-VN\n\n', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'mailSubjectPrefix=\nmailBodySuffix=\n\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, '', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, '', 1),
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, '', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, '', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, '', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, '', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, '', 1),
(34, 'VirtueMart', 'option=com_virtuemart', 0, 0, 'option=com_virtuemart', 'VirtueMart', 'com_virtuemart', 0, '../components/com_virtuemart/shop_image/ps_image/menu_icon.png', 0, '', 1),
(35, 'virtuemart_version', '', 0, 9999, '', '', '', 0, '', 0, 'RELEASE=1.1.9\nDEV_STATUS=stable', 1),
(36, 'Virtuemart SEF', 'option=com_vm_sef', 0, 0, 'option=com_vm_sef', 'Virtuemart SEF', 'com_vm_sef', 0, 'components/com_vm_sef/assets/sef-16.png', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_contact_details`
--

CREATE TABLE IF NOT EXISTS `jos_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `con_position` varchar(255) DEFAULT NULL,
  `address` text,
  `suburb` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `misc` mediumtext,
  `image` varchar(255) DEFAULT NULL,
  `imagepos` varchar(20) DEFAULT NULL,
  `email_to` varchar(255) DEFAULT NULL,
  `default_con` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `catid` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `webpage` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jos_contact_details`
--

INSERT INTO `jos_contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(1, 'Name', 'name', 'Position', 'Street', 'Suburb', 'State', 'Country', 'Zip Code', 'Telephone', 'Fax', 'Miscellanous info', 'powered_by.png', 'top', 'email@email.com', 1, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\r\nshow_position=1\r\nshow_email=0\r\nshow_street_address=1\r\nshow_suburb=1\r\nshow_state=1\r\nshow_postcode=1\r\nshow_country=1\r\nshow_telephone=1\r\nshow_mobile=1\r\nshow_fax=1\r\nshow_webpage=1\r\nshow_misc=1\r\nshow_image=1\r\nallow_vcard=0\r\ncontact_icons=0\r\nicon_address=\r\nicon_email=\r\nicon_telephone=\r\nicon_fax=\r\nicon_misc=\r\nshow_email_form=1\r\nemail_description=1\r\nshow_email_copy=1\r\nbanned_email=\r\nbanned_subject=\r\nbanned_text=', 0, 12, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jos_content`
--

CREATE TABLE IF NOT EXISTS `jos_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `title_alias` varchar(255) NOT NULL DEFAULT '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `sectionid` int(11) unsigned NOT NULL DEFAULT '0',
  `mask` int(11) unsigned NOT NULL DEFAULT '0',
  `catid` int(11) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL DEFAULT '1',
  `parentid` int(11) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0',
  `metadata` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `jos_content`
--

INSERT INTO `jos_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(1, 'Giới Thiệu', 'gioithieu', '', '<!--[if gte mso 9]><xml> <w:WordDocument> <w:View>Normal</w:View> <w:Zoom>0</w:Zoom> <w:PunctuationKerning /> <w:ValidateAgainstSchemas /> <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid> <w:IgnoreMixedContent>false</w:IgnoreMixedContent> <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText> <w:Compatibility> <w:BreakWrappedTables /> <w:SnapToGridInCell /> <w:WrapTextWithPunct /> <w:UseAsianBreakRules /> <w:DontGrowAutofit /> </w:Compatibility> <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel> </w:WordDocument> </xml><![endif]--><!--[if gte mso 9]><xml> <w:LatentStyles DefLockedState="false" LatentStyleCount="156"> </w:LatentStyles> </xml><![endif]--><!--[if gte mso 10]> <mce:style><!   /* Style Definitions */  table.MsoNormalTable 	{mso-style-name:"Table Normal"; 	mso-tstyle-rowband-size:0; 	mso-tstyle-colband-size:0; 	mso-style-noshow:yes; 	mso-style-parent:""; 	mso-padding-alt:0in 5.4pt 0in 5.4pt; 	mso-para-margin:0in; 	mso-para-margin-bottom:.0001pt; 	mso-pagination:widow-orphan; 	font-size:10.0pt; 	font-family:"Times New Roman"; 	mso-ansi-language:#0400; 	mso-fareast-language:#0400; 	mso-bidi-language:#0400;} --> <!--[endif] -->\r\n<p class="MsoNormal">Cty TNHH TMDV Đức Mạnh</p>\r\n<p class="MsoNormal" style="text-align: center;" align="center"><strong><span style="font-size: 14pt;">LỜI GIỚI THIỆU</span></strong></p>\r\n<p class="MsoNormal">Văn Phòng Phẩm Đức Mạnh xin gửi lời chào trân trọng nhất đến<span> </span>Quý khách hàng.</p>\r\n<address class="MsoNormal">Công ty chúng tôi có trụ sở tại <strong>số 37 đường 16 khu phố 1 , Phường hòa Phú ,Thị Xã TDM,Tỉnh<span> </span>BD .Nằm giáp cạnh Thành Phố Mới BD và giap Khu CN Đồng An 2, VSIP II </strong>đó là một lợi thế để phục vụ cho quý Khách<span> </span>hàng khi đến với chúng tôi.</address>\r\n<p class="MsoNormal"> </p>\r\n<p class="MsoNormal">Công Ty chúng tôi luôn cung ứng dịch vụ<span> </span>Văn Phòng Phẩm, thiết bị văn phòng, giấy in các loại, Băng keo, Bao tay , Vải lau màu trắng ,vải lau màu , nhu yếu phẩm , Các mặt hàng tạp hóa phục vụ cho văn phòng, và đặc biệt Chuyên cung cấp vật tư cho ngành sản <span> </span>xuất, và các sản phẩm cho ngành cơ khí……….</p>\r\n<p class="MsoNormal">Với giá cả cạnh tranh ,dịch vụ giao hàng tận nơi nhanh chóng và luôn đáp ứng<span> </span>chăm sóc làm<span> </span>hài lòng cho khách hàng.</p>\r\n<p class="MsoNormal">Đến với Đức Mạnh quý khách sẽ hài lòng với quyết tâm nỗ lực hết mình vì mục tiêu của khách hàng đặt ra.</p>\r\n<p class="MsoNormal">Chúng tôi rất <span> </span>mong nhận được sự ủng hộ và hợp tác của quý khách hàng.</p>\r\n<p class="MsoNormal">Xin chân thành cảm ơn</p>\r\n<p class="MsoNormal"> </p>', '', 1, 5, 0, 34, '2008-08-12 10:00:00', 62, '', '2011-10-29 05:28:38', 62, 62, '2011-10-29 05:28:39', '2006-01-03 01:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 38, 0, 1, '', '', 0, 168, 'robots=\nauthor='),
(48, 'Giao Hàng Tận Nơi', 'giaohang', '', '<p>Chỉ cần nhấc máy và gọi chúng tôi sẽ đem đến tận nơi những j bạn cần.</p>', '', 1, 6, 0, 39, '2011-09-20 02:01:52', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2011-09-20 02:01:52', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 1, '', '', 0, 17, 'robots=\nauthor='),
(20, 'Liên Hệ Với Chúng Tôi', 'lienhe', '', '<h1>Hỗ Trợ</h1>\r\n<p>Hãy liên hệ với chúng tối qua những thông tin sau.</p>\r\n<h1>Công ty TNHH thương mại dịch vụ Đức Mạnh</h1>\r\n<p>Địa chỉ: Đường 16, Ô12 LôA13, Khu Phố1, Phường Hoà Phú, Thị Xã TDM, Tỉnh Bình Dương.</p>\r\n<ol>\r\n<li> Điện thoại: 0650.3628.232 </li>\r\n<li>Fax:0650.3635.348</li>\r\n<li>Email: <a href="mailto:ducmanh.linh@gmail.com">ducmanh.linh@gmail.com</a> </li>\r\n<li>MST: 3701408466 </li>\r\n</ol>\r\n<p> </p>', '', 1, 4, 0, 35, '2008-08-09 08:33:57', 62, '', '2011-10-24 04:38:51', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 21, 0, 1, '', '', 0, 59, 'robots=\nauthor='),
(46, 'Tin Tức Khuyến Mãi', 'khuyenmai', '', '<p>Các chương tình khuyến mãi lỡn</p>', '', 1, 1, 0, 1, '2011-09-19 08:53:47', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2011-09-19 08:53:47', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 1, '', '', 0, 7, 'robots=\nauthor='),
(47, 'Cho Thuê Xe', 'thuexe', '', '<p>Dịch vụ cho thuê xe 7 chỗ</p>', '', 1, 6, 0, 39, '2011-09-20 01:58:22', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2011-09-20 01:58:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 2, '', '', 0, 22, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Table structure for table `jos_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `jos_content_frontpage` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_content_rating`
--

CREATE TABLE IF NOT EXISTS `jos_content_rating` (
  `content_id` int(11) NOT NULL DEFAULT '0',
  `rating_sum` int(11) unsigned NOT NULL DEFAULT '0',
  `rating_count` int(11) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_core_acl_aro`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_value` varchar(240) NOT NULL DEFAULT '0',
  `value` varchar(240) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jos_core_acl_aro`
--

INSERT INTO `jos_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', '62', 0, 'Administrator', 0),
(12, 'users', '64', 0, 'duc manh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_core_acl_aro_groups`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `jos_core_acl_aro_groups`
--

INSERT INTO `jos_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES
(17, 0, 'ROOT', 1, 22, 'ROOT'),
(28, 17, 'USERS', 2, 21, 'USERS'),
(29, 28, 'Public Frontend', 3, 12, 'Public Frontend'),
(18, 29, 'Registered', 4, 11, 'Registered'),
(19, 18, 'Author', 5, 10, 'Author'),
(20, 19, 'Editor', 6, 9, 'Editor'),
(21, 20, 'Publisher', 7, 8, 'Publisher'),
(30, 28, 'Public Backend', 13, 20, 'Public Backend'),
(23, 30, 'Manager', 14, 19, 'Manager'),
(24, 23, 'Administrator', 15, 18, 'Administrator'),
(25, 24, 'Super Administrator', 16, 17, 'Super Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `jos_core_acl_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(230) NOT NULL DEFAULT '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_core_acl_aro_sections`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(230) NOT NULL DEFAULT '',
  `order_value` int(11) NOT NULL DEFAULT '0',
  `name` varchar(230) NOT NULL DEFAULT '',
  `hidden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jos_core_acl_aro_sections`
--

INSERT INTO `jos_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_core_acl_groups_aro_map`
--

CREATE TABLE IF NOT EXISTS `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `section_value` varchar(240) NOT NULL DEFAULT '',
  `aro_id` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_groups_aro_map`
--

INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(24, '', 12),
(25, '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jos_core_log_items`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_items` (
  `time_stamp` date NOT NULL DEFAULT '0000-00-00',
  `item_table` varchar(50) NOT NULL DEFAULT '',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL DEFAULT '',
  `hits` int(11) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_groups`
--

CREATE TABLE IF NOT EXISTS `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_groups`
--

INSERT INTO `jos_groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Table structure for table `jos_menu`
--

CREATE TABLE IF NOT EXISTS `jos_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text,
  `type` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `parent` int(11) unsigned NOT NULL DEFAULT '0',
  `componentid` int(11) unsigned NOT NULL DEFAULT '0',
  `sublevel` int(11) DEFAULT '0',
  `ordering` int(11) DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL DEFAULT '0',
  `browserNav` tinyint(4) DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `utaccess` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL DEFAULT '0',
  `rgt` int(11) unsigned NOT NULL DEFAULT '0',
  `home` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `jos_menu`
--

INSERT INTO `jos_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(1, 'mainmenu', 'Trang Chủ', 'home', 'index.php?option=com_virtuemart', 'component', 1, 0, 34, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'product_id=\ncategory_id=\nflypage=\npage=\npage_title=Văn Phòng Phẩm Đức Mạnh\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 1),
(2, 'mainmenu', 'Joomla! License', 'joomla-license', 'index.php?option=com_content&view=article&id=5', 'component', -2, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(41, 'mainmenu', 'FAQ', 'faq', 'index.php?option=com_content&view=section&id=3', 'component', -2, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1', 0, 0, 0),
(11, 'othermenu', 'Joomla! Home', 'joomla-home', 'http://www.joomla.org', 'url', 1, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(12, 'othermenu', 'Joomla! Forums', 'joomla-forums', 'http://forum.joomla.org', 'url', 1, 0, 0, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(13, 'othermenu', 'Joomla! Documentation', 'joomla-documentation', 'http://docs.joomla.org', 'url', 1, 0, 0, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(14, 'othermenu', 'Joomla! Community', 'joomla-community', 'http://community.joomla.org', 'url', 1, 0, 0, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(15, 'othermenu', 'Joomla! Magazine', 'joomla-community-magazine', 'http://magazine.joomla.org/', 'url', 1, 0, 0, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(16, 'othermenu', 'OSM Home', 'osm-home', 'http://www.opensourcematters.org', 'url', 1, 0, 0, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 6, 'menu_image=-1\n\n', 0, 0, 0),
(17, 'othermenu', 'Administrator', 'administrator', 'administrator/', 'url', 1, 0, 0, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(18, 'topmenu', 'News', 'news', 'index.php?option=com_newsfeeds&view=newsfeed&id=1&feedid=1', 'component', 1, 0, 11, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_page_title=1\npage_title=News\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(20, 'usermenu', 'Your Details', 'your-details', 'index.php?option=com_user&view=user&task=edit', 'component', 1, 0, 14, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(24, 'usermenu', 'Logout', 'logout', 'index.php?option=com_user&view=login', 'component', 1, 0, 14, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(38, 'keyconcepts', 'Content Layouts', 'content-layouts', 'index.php?option=com_content&view=article&id=24', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(27, 'mainmenu', 'Tin Tức', 'tintuc', 'index.php?option=com_content&view=category&layout=blog&id=38', 'component', 1, 0, 20, 0, 9, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(28, 'topmenu', 'About Joomla!', 'about-joomla', 'index.php?option=com_content&view=article&id=25', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(29, 'topmenu', 'Features', 'features', 'index.php?option=com_content&view=article&id=22', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(30, 'topmenu', 'The Community', 'the-community', 'index.php?option=com_content&view=article&id=27', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(34, 'mainmenu', 'What''s New in 1.5?', 'what-is-new-in-1-5', 'index.php?option=com_content&view=article&id=22', 'component', -2, 0, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(40, 'keyconcepts', 'Extensions', 'extensions', 'index.php?option=com_content&view=article&id=26', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(37, 'mainmenu', 'Giới Thiệu', 'gioithieu', 'index.php?option=com_content&view=article&id=1', 'component', 1, 0, 20, 0, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(43, 'keyconcepts', 'Example Pages', 'example-pages', 'index.php?option=com_content&view=article&id=43', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(44, 'ExamplePages', 'Section Blog', 'section-blog', 'index.php?option=com_content&view=section&layout=blog&id=3', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(45, 'ExamplePages', 'Section Table', 'section-table', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(46, 'ExamplePages', 'Category Blog', 'categoryblog', 'index.php?option=com_content&view=category&layout=blog&id=31', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(47, 'ExamplePages', 'Category Table', 'category-table', 'index.php?option=com_content&view=category&id=32', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(48, 'mainmenu', 'Web Links', 'web-links', 'index.php?option=com_weblinks&view=categories', 'component', -2, 0, 4, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'page_title=Weblinks\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', 0, 0, 0),
(49, 'mainmenu', 'News Feeds', 'news-feeds', 'index.php?option=com_newsfeeds&view=categories', 'component', -2, 0, 11, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Newsfeeds\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(50, 'mainmenu', 'The News', 'the-news', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', -2, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=The News\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(51, 'usermenu', 'Submit an Article', 'submit-an-article', 'index.php?option=com_content&view=article&layout=form', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(52, 'usermenu', 'Submit a Web Link', 'submit-a-web-link', 'index.php?option=com_weblinks&view=weblink&layout=form', 'component', 1, 0, 4, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(53, 'mainmenu', 'Khuyến Mãi', 'khuyenmai', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 27, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(54, 'mainmenu', 'Liên Hệ', 'lienhe', 'index.php?option=com_content&view=article&id=20', 'component', 1, 0, 20, 0, 11, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(55, 'mainmenu', 'Kinh Tế', 'kinhte', 'index.php?option=com_content&view=category&layout=blog&id=36', 'component', 1, 27, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=1\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(56, 'mainmenu', 'Xã Hội', 'xahoi', 'index.php?option=com_content&view=category&layout=blog&id=37', 'component', 1, 27, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=1\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(57, 'mainmenu', 'Văn Phòng Phẩm', 'vpp', 'index.php?option=com_content&view=category&layout=blog&id=38', 'component', 1, 27, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=1\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(58, 'mainmenu', 'Dịch Vụ', 'dichvu', 'index.php?option=com_content&view=category&layout=blog&id=39', 'component', 1, 0, 20, 0, 10, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=0\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(59, 'mainmenu', 'Cho Thuê Xe', 'chothuexe', 'index.php?option=com_content&view=article&id=47', 'component', 1, 58, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(60, 'mainmenu', 'Giao Hàng Tận Nơi', 'dvgiaohang', 'index.php?option=com_content&view=article&id=48', 'component', 1, 58, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_menu_types`
--

CREATE TABLE IF NOT EXISTS `jos_menu_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menutype` varchar(75) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jos_menu_types`
--

INSERT INTO `jos_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'usermenu', 'User Menu', 'A Menu for logged in Users'),
(3, 'topmenu', 'Top Menu', 'Top level navigation'),
(4, 'othermenu', 'Resources', 'Additional links'),
(5, 'ExamplePages', 'Example Pages', 'Example Pages'),
(6, 'keyconcepts', 'Key Concepts', 'This describes some critical information for new Users.');

-- --------------------------------------------------------

--
-- Table structure for table `jos_messages`
--

CREATE TABLE IF NOT EXISTS `jos_messages` (
  `message_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_from` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id_to` int(10) unsigned NOT NULL DEFAULT '0',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` int(11) NOT NULL DEFAULT '0',
  `priority` int(1) unsigned NOT NULL DEFAULT '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `cfg_name` varchar(100) NOT NULL DEFAULT '',
  `cfg_value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_migration_backlinks`
--

CREATE TABLE IF NOT EXISTS `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_modules`
--

CREATE TABLE IF NOT EXISTS `jos_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `position` varchar(50) DEFAULT NULL,
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `module` varchar(50) DEFAULT NULL,
  `numnews` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `showtitle` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  `control` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `jos_modules`
--

INSERT INTO `jos_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(1, 'Main Menu', '', 0, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 1, 0, ''),
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(5, 'Menu Stats', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 2, 1, '', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(17, 'User Menu', '', 4, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 1, 1, 'menutype=usermenu\nmoduleclass_sfx=_menu\ncache=1', 1, 0, ''),
(18, 'Đăng nhập', '', 3, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, 'cache=0\nmoduleclass_sfx=table_hilite\npretext=\nposttext=\nlogin=\nlogout=\ngreeting=1\nname=0\nusesecure=0\n\n', 1, 0, ''),
(19, 'Latest News', '', 4, 'user1', 0, '0000-00-00 00:00:00', 0, 'mod_latestnews', 0, 0, 1, 'cache=1', 1, 0, ''),
(21, 'Who''s Online', '', 1, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_whosonline', 0, 0, 1, 'online=1\nusers=1\nmoduleclass_sfx=', 0, 0, ''),
(22, 'Popular', '', 6, 'user2', 0, '0000-00-00 00:00:00', 0, 'mod_mostread', 0, 0, 1, 'cache=1', 0, 0, ''),
(24, 'Sections', '', 10, 'left', 0, '0000-00-00 00:00:00', 0, 'mod_sections', 0, 0, 1, 'cache=1', 1, 0, ''),
(25, 'Newsflash', '', 0, 'top', 0, '0000-00-00 00:00:00', 0, 'mod_newsflash', 0, 0, 1, 'catid=0\nlayout=default\nimage=0\nlink_titles=\nshowLastSeparator=1\nreadmore=0\nitem_title=0\nitems=\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(26, 'Related Items', '', 11, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_related_items', 0, 0, 1, '', 0, 0, ''),
(27, 'Search', '', 1, 'user4', 0, '0000-00-00 00:00:00', 0, 'mod_search', 0, 0, 0, 'cache=1', 0, 0, ''),
(28, 'Random Image', '', 9, 'right', 0, '0000-00-00 00:00:00', 1, 'mod_random_image', 0, 0, 1, '', 0, 0, ''),
(29, 'Top Menu', '', 1, 'user3', 0, '0000-00-00 00:00:00', 0, 'mod_mainmenu', 0, 0, 0, 'cache=1\nmenutype=topmenu\nmenu_style=list_flat\nmenu_images=n\nmenu_images_align=left\nexpand_menu=n\nclass_sfx=-nav\nmoduleclass_sfx=\nindent_image1=0\nindent_image2=0\nindent_image3=0\nindent_image4=0\nindent_image5=0\nindent_image6=0', 1, 0, ''),
(30, 'Banners', '', 0, 'banner', 0, '0000-00-00 00:00:00', 0, 'mod_banners', 0, 0, 0, 'target=1\ncount=1\ncid=1\ncatid=33\ntag_search=0\nordering=random\nheader_text=\nfooter_text=\nmoduleclass_sfx=\ncache=0\ncache_time=15\n\n', 1, 0, ''),
(33, 'Footer', '', 2, 'footer', 62, '2011-10-01 18:59:24', 1, 'mod_footer', 0, 0, 0, 'cache=1\n\n', 1, 0, ''),
(36, 'Syndication', '', 3, 'syndicate', 0, '0000-00-00 00:00:00', 1, 'mod_syndicate', 0, 0, 0, '', 1, 0, ''),
(38, 'Advertisement', '', 3, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_banners', 0, 0, 1, 'count=4\r\nrandomise=0\r\ncid=0\r\ncatid=14\r\nheader_text=Featured Links:\r\nfooter_text=<a href="http://www.joomla.org">Ads by Joomla!</a>\r\nmoduleclass_sfx=_text\r\ncache=0\r\n\r\n', 0, 0, ''),
(41, 'Welcome to Joomla!', '<div style="padding: 5px">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href="http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews" target="_blank">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href="http://www.joomla.org/download.html" target="_blank">latest Joomla! release;</a> and (3) a <a href="http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup" target="_blank" title="good Web host">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href="http://docs.joomla.org/Category:Security_Checklist" target="_blank" title="Joomla! Security Checklist">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href="http://developer.joomla.org/security/contact-the-team.html" target="_blank" title="Joomla! Security Task Force">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   "<a href="http://docs.joomla.org/beginners" target="_blank">Absolute Beginner''s   Guide to Joomla!.</a>" There, you will find a Quick Start to Joomla!   <a href="http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf" target="_blank">guide</a>   and <a href="http://help.joomla.org/ghop/feb2008/task167/index.html" target="_blank">video</a>,   amongst many other tutorials. The   <a href="http://community.joomla.org/magazine/view-all-issues.html" target="_blank">Joomla!   Community Magazine</a> also has   <a href="http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html" target="_blank">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href="http://docs.joomla.org/Category:FAQ" target="_blank">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href="http://forum.joomla.org/" target="_blank">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name="twjs" title="twjs"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>', 0, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 2, 1, 'moduleclass_sfx=\n\n', 1, 1, ''),
(42, 'Joomla! Security Newsfeed', '', 6, 'cpanel', 62, '2008-10-25 20:15:17', 1, 'mod_feed', 0, 0, 1, 'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n', 0, 1, ''),
(43, 'VirtueMart Featured Products', '', 0, 'vm-fp', 0, '0000-00-00 00:00:00', 0, 'mod_virtuemart_featureprod', 0, 0, 1, 'max_items=2\nshow_price=1\nshow_addtocart=1\ndisplay_style=horizontal\nproducts_per_row=4\ncategory_id=\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', 0, 0, ''),
(44, 'VirtueMart Currency Selector', '', 3, 'right', 0, '0000-00-00 00:00:00', 0, 'mod_virtuemart_currencies', 0, 0, 1, 'text_before=\nproduct_currency=USD,VND,\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', 0, 0, ''),
(45, 'Sản phẩm mới', '', 0, 'ja-slider', 62, '2011-10-22 07:35:03', 1, 'mod_virtuemart_latestprod', 0, 0, 1, 'max_items=8\nshow_price=0\nshow_addtocart=0\ndisplay_style=table\nproducts_per_row=4\ncategory_id=\ncache=0\nmoduleclass_sfx=_hilite\nclass_sfx=\n\n', 0, 0, ''),
(46, 'Danh Mục Sản Phẩm', '', 0, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_virtuemart', 0, 0, 1, 'class_sfx=\nmoduleclass_sfx=table_hilite\npretext=\nshow_login_form=no\nremember_me_default=1\nshow_categories=yes\nshow_listall=yes\nshow_adminlink=yes\nshow_accountlink=yes\nuseGreyBox_accountlink=0\nshow_minicart=no\nuseGreyBox_cartlink=0\nshow_productsearch=yes\nshow_product_parameter_search=no\nmenutype=links\njscook_type=menu\njscookMenu_style=ThemeOffice\nmenu_orientation=hbr\njscookTree_style=ThemeXP\nroot_label=Shop\n\n', 0, 0, ''),
(47, 'VirtueMart Product Scroller', '', 0, 'ja-slideshow', 62, '2011-10-29 02:14:25', 1, 'mod_productscroller', 0, 0, 0, 'pretext=\nNumberOfProducts=6\nfeaturedProducts=no\nScrollSortMethod=random\nshow_product_name=yes\nshow_addtocart=no\nshow_price=no\nScrollHeight=125\nScrollWidth=946\nScrollBehavior=scroll\nScrollDirection=right\nScrollAmount=1\nScrollDelay=20\nScrollAlign=left\nScrollSpaceChar=�\nScrollSpaceCharTimes=5\nScrollLineChar=<hr />\nScrollLineCharTimes=1\nScrollCSSOverride=yes\nScrollTextAlign=left\nScrollTextWeight=normal\nScrollTextSize=10\nScrollTextColor=#000000\nScrollBGColor=#FFFFFF\nScrollMargin=2\ncache=0\nmoduleclass_sfx=\nclass_sfx=\n\n', 0, 0, ''),
(48, 'The Flash Module', '', 0, 'banner', 0, '0000-00-00 00:00:00', 1, 'mod_flashmod', 0, 0, 0, 'moduleclass_sfx=\nfm_path=/\nfm_source=183.swf\nfm_width=950\nfm_height=200\nfm_name=\nfm_version=8.0.22.0\nfm_quality=best\nfm_loop=yes\nfm_wmode=transparent\nfm_usejs=yes\nfm_noscript=flashmovie\nfm_noflash=ssssssss\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jos_modules_menu`
--

CREATE TABLE IF NOT EXISTS `jos_modules_menu` (
  `moduleid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_modules_menu`
--

INSERT INTO `jos_modules_menu` (`moduleid`, `menuid`) VALUES
(1, 0),
(17, 0),
(18, 1),
(19, 1),
(19, 2),
(19, 4),
(19, 27),
(19, 36),
(21, 1),
(22, 1),
(22, 2),
(22, 4),
(22, 27),
(22, 36),
(25, 0),
(27, 0),
(29, 0),
(30, 0),
(33, 0),
(36, 0),
(38, 1),
(43, 0),
(44, 0),
(45, 0),
(46, 0),
(47, 0),
(48, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_newsfeeds`
--

CREATE TABLE IF NOT EXISTS `jos_newsfeeds` (
  `catid` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL DEFAULT '',
  `link` text NOT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `numarticles` int(11) unsigned NOT NULL DEFAULT '1',
  `cache_time` int(11) unsigned NOT NULL DEFAULT '3600',
  `checked_out` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `rtl` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jos_newsfeeds`
--

INSERT INTO `jos_newsfeeds` (`catid`, `id`, `name`, `alias`, `link`, `filename`, `published`, `numarticles`, `cache_time`, `checked_out`, `checked_out_time`, `ordering`, `rtl`) VALUES
(4, 1, 'Joomla! Announcements', 'joomla-official-news', 'http://feeds.joomla.org/JoomlaAnnouncements', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(4, 2, 'Joomla! Core Team Blog', 'joomla-core-team-blog', 'http://feeds.joomla.org/JoomlaCommunityCoreTeamBlog', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(4, 3, 'Joomla! Community Magazine', 'joomla-community-magazine', 'http://feeds.joomla.org/JoomlaMagazine', '', 1, 20, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(4, 4, 'Joomla! Developer News', 'joomla-developer-news', 'http://feeds.joomla.org/JoomlaDeveloper', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(4, 5, 'Joomla! Security News', 'joomla-security-news', 'http://feeds.joomla.org/JoomlaSecurityNews', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(5, 6, 'Free Software Foundation Blogs', 'free-software-foundation-blogs', 'http://www.fsf.org/blogs/RSS', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(5, 7, 'Free Software Foundation', 'free-software-foundation', 'http://www.fsf.org/news/RSS', NULL, 1, 5, 3600, 62, '2008-09-14 00:24:25', 3, 0),
(5, 8, 'Software Freedom Law Center Blog', 'software-freedom-law-center-blog', 'http://www.softwarefreedom.org/feeds/blog/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(5, 9, 'Software Freedom Law Center News', 'software-freedom-law-center', 'http://www.softwarefreedom.org/feeds/news/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(5, 10, 'Open Source Initiative Blog', 'open-source-initiative-blog', 'http://www.opensource.org/blog/feed', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(6, 11, 'PHP News and Announcements', 'php-news-and-announcements', 'http://www.php.net/feed.atom', NULL, 1, 5, 3600, 62, '2008-09-14 00:25:37', 1, 0),
(6, 12, 'Planet MySQL', 'planet-mysql', 'http://www.planetmysql.org/rss20.xml', NULL, 1, 5, 3600, 62, '2008-09-14 00:25:51', 2, 0),
(6, 13, 'Linux Foundation Announcements', 'linux-foundation-announcements', 'http://www.linuxfoundation.org/press/rss20.xml', NULL, 1, 5, 3600, 62, '2008-09-14 00:26:11', 3, 0),
(6, 14, 'Mootools Blog', 'mootools-blog', 'http://feeds.feedburner.com/mootools-blog', NULL, 1, 5, 3600, 62, '2008-09-14 00:26:51', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_plugins`
--

CREATE TABLE IF NOT EXISTS `jos_plugins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `element` varchar(100) NOT NULL DEFAULT '',
  `folder` varchar(100) NOT NULL DEFAULT '',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(3) NOT NULL DEFAULT '0',
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  `client_id` tinyint(3) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `jos_plugins`
--

INSERT INTO `jos_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE', 'tinymce', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'mode=advanced\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=1\nvisualchars=1\nnonbreaking=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=1\ncontextmenu=1\ninlinepopups=1\nsafari=1\ncustom_plugin=\ncustom_button=\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(34, 'System - Mootools Upgrade', 'mtupgrade', 'system', 0, 8, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(35, 'Joomla! Hello SEF for alias title', 'jhellosef', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'vi_trans=1\ntransformtext=\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `jos_polls`
--

CREATE TABLE IF NOT EXISTS `jos_polls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `voters` int(9) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `access` int(11) NOT NULL DEFAULT '0',
  `lag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jos_polls`
--

INSERT INTO `jos_polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES
(14, 'Joomla! is used for?', 'joomla-is-used-for', 11, 0, '0000-00-00 00:00:00', 1, 0, 86400);

-- --------------------------------------------------------

--
-- Table structure for table `jos_poll_data`
--

CREATE TABLE IF NOT EXISTS `jos_poll_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jos_poll_data`
--

INSERT INTO `jos_poll_data` (`id`, `pollid`, `text`, `hits`) VALUES
(1, 14, 'Community Sites', 2),
(2, 14, 'Public Brand Sites', 3),
(3, 14, 'eCommerce', 1),
(4, 14, 'Blogs', 0),
(5, 14, 'Intranets', 0),
(6, 14, 'Photo and Media Sites', 2),
(7, 14, 'All of the Above!', 3),
(8, 14, '', 0),
(9, 14, '', 0),
(10, 14, '', 0),
(11, 14, '', 0),
(12, 14, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_poll_date`
--

CREATE TABLE IF NOT EXISTS `jos_poll_date` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL DEFAULT '0',
  `poll_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jos_poll_date`
--

INSERT INTO `jos_poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES
(1, '2006-10-09 13:01:58', 1, 14),
(2, '2006-10-10 15:19:43', 7, 14),
(3, '2006-10-11 11:08:16', 7, 14),
(4, '2006-10-11 15:02:26', 2, 14),
(5, '2006-10-11 15:43:03', 7, 14),
(6, '2006-10-11 15:43:38', 7, 14),
(7, '2006-10-12 00:51:13', 2, 14),
(8, '2007-05-10 19:12:29', 3, 14),
(9, '2007-05-14 14:18:00', 6, 14),
(10, '2007-06-10 15:20:29', 6, 14),
(11, '2007-07-03 12:37:53', 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `jos_poll_menu`
--

CREATE TABLE IF NOT EXISTS `jos_poll_menu` (
  `pollid` int(11) NOT NULL DEFAULT '0',
  `menuid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_sections`
--

CREATE TABLE IF NOT EXISTS `jos_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL DEFAULT '',
  `image_position` varchar(30) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `access` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `count` int(11) NOT NULL DEFAULT '0',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jos_sections`
--

INSERT INTO `jos_sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, 'Tin Tức', '', 'tintuc', 'articles.jpg', 'content', 'right', '<p>Select a news topic from the list below, then select a news article to read.</p>', 1, 0, '0000-00-00 00:00:00', 3, 0, 6, ''),
(3, 'FAQs', '', 'faqs', 'key.jpg', 'content', 'left', 'From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.', 1, 0, '0000-00-00 00:00:00', 5, 0, 23, ''),
(4, 'Liên Hệ', '', 'about-joomla', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 2, 0, 15, ''),
(5, 'Giới Thiệu', '', 'gioithieu', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 6, 0, 1, ''),
(6, 'Dịch Vụ', '', 'dichvu', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 7, 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `jos_session`
--

CREATE TABLE IF NOT EXISTS `jos_session` (
  `username` varchar(150) DEFAULT '',
  `time` varchar(14) DEFAULT '',
  `session_id` varchar(200) NOT NULL DEFAULT '0',
  `guest` tinyint(4) DEFAULT '1',
  `userid` int(11) DEFAULT '0',
  `usertype` varchar(50) DEFAULT '',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `client_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `data` longtext,
  PRIMARY KEY (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_session`
--

INSERT INTO `jos_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES
('', '1319883768', '1b40657835622d7f67323ef7081d5f4a', 1, 0, '', 0, 0, 'gywuyzpw1Murw9uj6rOrCGMtehVcRmNgP7Vk0-k6nuLZIsjEZPXNo89ARifEb46aucIH9ZNdTVjgBpWYe92ZMAjUvGD6fWDYVyvwMDuzQWMGftBhlmIwDX1MC_HLoyErAcn_iUhkyXGTRVn5m35KagykUHP6Nd2K4G-7kGaLHFIJUsGL4eEtlFZ6R24Evt8P0ilvKaJvuQD6OIarAAehSyTSdxbGpsQa4LA1z48YZmld4O5hk6rgYJIMKhTqg2cIjiRa4KBRuJSqLBcGseJAhCYlAPd2BAik_8mkttmOUFwXcPaF0X0WH_JYD1Tjsz0sE7WXWdH2xfXtuE8Cb0Q1dZwQjH-pvmdXia7XHQ0NjspFlvU6ie6oMmpc8DDvPwGUVpuCvRDaLy4RNYVpg5CT6UEpgkz2tAZ8Av7yXWu0OnEL7himWruxU71JHoGeQ2UdfpWJegwKzJthKSRqhs6UtBGKXLkPrQglQt7Yi7CjVSQRjILE1tnKq28j9XfPCmhPg1bC1obkLsS66fzOm1SmrDzcgaWUSKLTLHfzsGz_UL3ndoJtoTWf4HjCJ2nMCDTJ7zU5BywG-6w5V1qYLhyISzYYlIhjrXiLeSK55v0WVj_Exa7uN_mTIGP2p21ym2Uk5VO2Op7YjXOve82MGoiXKFsfdfmuOJEf61RHGxVkF9OPxqXKszrxw_bbzLaWF6523vlRV_AfjUGVQh2unRUy3SACl5VqRU-6ZOlSIkmjjHQJFYIbbYeVb1R8IHIHT4T5ARD2MKqdzDA_l5ps129wApqRe8tWgg50Zhrc-EK_49hNnRUreYn_gySB1h24vvBzKqBPxZSVhXY4CBKLdoqsOM_J-1ADkc9_Gb6ctKfzHDYQaJKxypd1kMi9MKI4um9KXMDz820q-wPile2C-bXEHXpILMRlpTH-bNf-FzI7-5B0dlcz_eW68GmyD0PARSrFPcD56aG322rp-hH6iEaYqPi97Rtg8xz1zoPuRTxNg3lVdokmHpsYDr6uD1AHPgPezoGH5i0Kpr74cXnswQCzLClDt41jcxtnxJgoZaicgUUr-DWwvqpfCsVWsiRXZC5CaZDV5nuQsT8EzNkgBlfvFF0BGgWgWPpvPg5Q5a57RLqfszRUzkqTH7JDDsIT8JvT3_uzUQCEiWYnxu5Pbpou2T03U-dPVamYCD8HGh6Rg1PyedoAa6t6_k9Y2HjYfrYTUJZrjBRxdFzZmJvQiN6MeB7oApi5x0U2nOik39IVjnjHB9PmCjRFN5Q57G_2zd7YzzuyvBgZbsRI53w7Ur3AdOnCG77ouylfy6Mj4vY3d0hpe0LzoBg7nqEtoMKARbtTci8qbPgk1FiXahp3O9Vxoa1ixrA0ffLy8OPs0zWPFKYmJS4fGgYkLWW0Lh2Ec5r6vb3NG1qENo8JOdgYQ0vf4Sb6WAds7QhDsldWs6ZIn4gIn3cI0Kn_js1P1KmSUDMgMMI1778ACRdLj9xOhSPsRMTvMLhp1cgfft3iSAs7T9P3stRCluWAFylGJbRYhXh71WVLkgp458PKtcG-qeD1i1V_VPk19JnCixwbeDN2yiQ7wXvoXZTvzV2CRnVw_9IEi25fO8VUxpB89z86PkTOknIi8DlXCguvl-pNwHLzpVQeuRMEmVv3ONlEkeqY02CyELEn3bSoMpvGzH8u5D6_75e2U3I7BOHYP70jtzExVUhB_iVm9h6Wqxof8T6dMLmb_LCqmOod3dPlDkGhgeAkZKcroOLx5nESsCloj566LLbPsw383r3QY04cg3_KhesdQcZvKccatvG9k03ZbC-sTk0Brb6vQDywiJ8Yc_2IB1hwxL70VYEKOi4R142GQisCGPvlxPE8R9XIk1aUY0xb2yV_CgpoZ4XQoqUcCF_GMObeqdFQMG66qqdeEj4E0bcLLKP9Bwb7rLWwlNDuSPXmvZYlV4FywxR1u-YI_m7beLOhBiGsFkI8wL6U2OedHcSYTYSfqUqBDgWIdclFDtZaNd1Jy_KdJKCgG6Z32fg50ITI_H7ZbOmyHjmVH4daIZ57Kl3BPJ8gfTzkGzzUhKfINZ441ZYPTMYUAloJsQdRxyjy6Hj7wo7P67UTcbO0x_dree3A-zneUi_zLIQW0jYmsNXP208SnYMNKVULKO6CmNDkM4TuIdh9CnKrEkMAheUA2aArTQU0-reozOAZTTLsPaPoa2nU646O2HeYfdwH5APBAmiWFIhC3KdS7ypSFa-JwPo8AL36LCL-7B9z95YH8ISn2YqbjUh8yLBn2Xsf_rvutlh8Mb-4FZAuUswO2hZPPOt8xIhGGKcDZGSGyUG7r4F1ub7rzzYBsXrJkUsohxQ9z_LNb37bLXazmzZnGgB7LyaSlMEtyWVXYYTnUmeA5wn0mVlffmFmhF8SOc-LL8-1dosaPbDXzC5bk5g7dbrEVJCTls2IRVubm8qbsawBF9sKaIHofjYlXbcCL5YFKtxWFboWScpnkAO9hQf331rEQjZ7X-tE-uByU9OMtP0Xf-a14dS3uAfwHK4sUNVcHkk46zpcIU78RDfLrtPOyhLcPIdfKQ807yP6vgBa2167zlWaUQeIB4BtTl0nQyewGqJrOFV3DtfZMHzo515iWq43LkgepV_BFOQiEttxy36mMUQhxr30qFwDFAxf96bNaecXN1T73_VR5r7kVMI117ixs3FEvXEIrXsw9TNmsnvG1r642nzbWdemdAyb0fB4WPX56p2_smuiJg2hREtY0z8IH-vQrCZnFKQ_yNxcnqLTf08QQQvioiJyr-TtKVOYRYy5D3cQ3DzFqHxzNrSEtdfe0hMKPjRlFFwItrVWRtPYq93TFRJbJGTOTZBS0D87bXSkyfFUTLKu9-0OON49plDxWyMmGnrGGXbcVsT2mHN8layvnctZjtqA2FI8cxuUf9vidvPYqD5caMRn9zthLGcqg7rOQxxF3b13SylHgHXxxoswFVc9Q_-ZAJjybQ_pJrfVfaSpSYoO5Qj2pFHg4Ql6RoZKwCv7qRqqx3-jiZ2fFM4ywLOlq9rBaLfyH9JLCD0cXmnjRYC1CduqELIMutOSBsy6NuuSOg57Eyr4lKX6cXpvY2EULPfIyDycmVbCHpEPW3HL3DHrIqLc30X0IbStuAoqf5TX4n-YuVbgSd_bflhOk7KF5CXIAKqvlaBPGyrh8BFSdWNWZ9n3z4FseT21_5Fb9SFxGffJ8ebNuVef_ZEycGWiv5wBbb6ZjHTQUeSr80a273DCQF3ncwx1zYz9cLj9LECBp0PHtawIsCU6QFL_wbf2Bfd-_39jyGKyamXJFlqcPI1mmeRkbS0QaelIifvq9jq1PlQmKvTLT1CBVOsRcOqMSoESpr0ZW8AOAckbd0SBCoDqBJTLJN4h8OO9LCXVqRGzy0N6fL2w2vQpYriI2It-unwWx4hbcOzReo_O1pE7Zh4G_8P-xmtomfaTX7wN_cqMDZ37e6FDA7YeDCxDlNJFQvufPmUZyGePn3C01iPJZxlmywx0VnUUMV_nBs6K_fFGjIUOXR_NDyATzE9KSSNHCnDRuf-jE60X_nkBRO1i2tCrsII4ow-NTl4MuqBmU9WSR610gznjx42cs0r9MpQ_0rn7AjDTr4gOoG5kiHAAs1NawcNTNlXx_PME-isZDZAsc2i3cHYYmccygjaFq_0CFCAa7Rvf-jeuD8u-3XXEwyfKdHbR-cX0HzUMQmBqj36k-RtLa2o4c_eVIRYxAezVFZl9J4MIYpPuUOMY8ll-zDoOPSBZCjQ4fDI8fhN1I5sS-p380GOHajKypQ..');

-- --------------------------------------------------------

--
-- Table structure for table `jos_stats_agents`
--

CREATE TABLE IF NOT EXISTS `jos_stats_agents` (
  `agent` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `hits` int(11) unsigned NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_templates_menu`
--

CREATE TABLE IF NOT EXISTS `jos_templates_menu` (
  `template` varchar(255) NOT NULL DEFAULT '',
  `menuid` int(11) NOT NULL DEFAULT '0',
  `client_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_templates_menu`
--

INSERT INTO `jos_templates_menu` (`template`, `menuid`, `client_id`) VALUES
('ja_zeolite_ii', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_users`
--

CREATE TABLE IF NOT EXISTS `jos_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `usertype` varchar(25) NOT NULL DEFAULT '',
  `block` tinyint(4) NOT NULL DEFAULT '0',
  `sendEmail` tinyint(4) DEFAULT '0',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `registerDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL DEFAULT '',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `jos_users`
--

INSERT INTO `jos_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES
(62, 'Administrator', 'admin', 'pooluaf@googlegroups.com', '7371c2320819c620711e22e4798ced87:WqPWotSAeu51PTn48fcj9LxM1oVmyAxx', 'Super Administrator', 0, 1, 25, '2011-09-17 07:00:41', '2011-10-29 05:22:12', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=7\n\n'),
(64, 'duc manh', 'ducmanh', 'ducmanh@vanphongphamducmanh.com', '3a39b249b56519c14070abf7a6d88e97:wB6cPPGGbDQr3ppTnJjuQJge4wR1iaJw', 'Administrator', 0, 0, 24, '2011-10-13 13:50:28', '2011-10-23 15:21:31', '', 'admin_language=\nlanguage=vi-VN\neditor=\nhelpsite=\ntimezone=7\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_auth_group`
--

CREATE TABLE IF NOT EXISTS `jos_vm_auth_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(128) DEFAULT NULL,
  `group_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds all the user groups' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jos_vm_auth_group`
--

INSERT INTO `jos_vm_auth_group` (`group_id`, `group_name`, `group_level`) VALUES
(1, 'admin', 0),
(2, 'storeadmin', 250),
(3, 'shopper', 500),
(4, 'demo', 750),
(5, 'quantri', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_auth_user_group`
--

CREATE TABLE IF NOT EXISTS `jos_vm_auth_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps the user to user groups';

--
-- Dumping data for table `jos_vm_auth_user_group`
--

INSERT INTO `jos_vm_auth_user_group` (`user_id`, `group_id`) VALUES
(62, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_auth_user_vendor`
--

CREATE TABLE IF NOT EXISTS `jos_vm_auth_user_vendor` (
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  KEY `idx_auth_user_vendor_user_id` (`user_id`),
  KEY `idx_auth_user_vendor_vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a user to a vendor';

--
-- Dumping data for table `jos_vm_auth_user_vendor`
--

INSERT INTO `jos_vm_auth_user_vendor` (`user_id`, `vendor_id`) VALUES
(62, 1),
(64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_cart`
--

CREATE TABLE IF NOT EXISTS `jos_vm_cart` (
  `user_id` int(11) NOT NULL,
  `cart_content` text NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores the cart contents of a user';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_category`
--

CREATE TABLE IF NOT EXISTS `jos_vm_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(128) NOT NULL DEFAULT '',
  `category_description` text,
  `category_thumb_image` varchar(255) DEFAULT NULL,
  `category_full_image` varchar(255) DEFAULT NULL,
  `category_publish` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `category_browsepage` varchar(255) NOT NULL DEFAULT 'browse_1',
  `products_per_row` tinyint(2) NOT NULL DEFAULT '1',
  `category_flypage` varchar(255) DEFAULT NULL,
  `list_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `idx_category_vendor_id` (`vendor_id`),
  KEY `idx_category_name` (`category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Product Categories are stored here' AUTO_INCREMENT=61 ;

--
-- Dumping data for table `jos_vm_category`
--

INSERT INTO `jos_vm_category` (`category_id`, `vendor_id`, `category_name`, `category_description`, `category_thumb_image`, `category_full_image`, `category_publish`, `cdate`, `mdate`, `category_browsepage`, `products_per_row`, `category_flypage`, `list_order`) VALUES
(6, 1, 'Bút Các Loại', '<p>Bao gồm các loại bút viết</p>', 'resized/B__t_C__c_Lo___i_4e833dad06543_90x90.jpg', 'B__t_C__c_Lo___i_4e833dad17c2c.jpg', 'Y', 1316278651, 1318841626, 'browse_4', 3, 'flypage-ask.tpl', 7),
(8, 1, 'Bấm Kim', '', 'resized/B___m_Kim_4e833ca64dffe_90x90.gif', 'B___m_Kim_4e833ca65823c.gif', 'Y', 1316420525, 1318841555, 'browse_4', 3, 'flypage.tpl', 4),
(9, 1, 'Bấm Lỗ', '', 'resized/B___m_L____4e833e3f71ef7_90x90.jpg', 'B___m_L____4e833e3f788db.jpg', 'Y', 1316420556, 1318841526, 'browse_4', 3, 'flypage.tpl', 3),
(10, 1, 'Bảng Tên & Giây Đeo', '', 'resized/B___ng_T__n___Gi_4e83e092a1892_90x90.jpg', 'B___ng_T__n___Gi_4e83e092eb763.jpg', 'Y', 1316420595, 1318841682, 'browse_4', 3, 'flypage.tpl', 9),
(11, 1, 'Băng Keo', '', 'resized/B__ng_Keo_4e833ce38cb57_90x90.jpg', 'B__ng_Keo_4e833ce3a62be.jpg', 'Y', 1316420628, 1318841590, 'browse_4', 3, 'flypage.tpl', 5),
(12, 1, 'Phân Trang', '', 'resized/Ph__n_Trang_4e833d15bad91_90x90.jpg', 'Ph__n_Trang_4e833d15cd187.jpg', 'Y', 1316420644, 1318841604, 'browse_4', 3, 'flypage.tpl', 6),
(13, 1, 'Sản Phẩm Khác', '', 'S___n_Ph___m_Kh__4ea4f21aaa041.jpg', 'S___n_Ph___m_Kh__4e83e0b4be63d.jpg', 'Y', 1316420713, 1319432730, 'browse_4', 2, 'flypage.tpl', 18),
(14, 1, 'Bút Bi', '', 'resized/B__t_Bi_4e83dd81bd6bf_90x90.jpg', 'B__t_Bi_4e83dd81cf57a.jpg', 'Y', 1316488693, 1318086566, 'browse_4', 3, 'flypage.tpl', 1),
(15, 1, 'Bút Dạ Quang', '', 'resized/B__t_D____Quang_4e83ddf6e3a6d_90x90.jpg', 'B__t_D____Quang_4e83ddf6f3a09.jpg', 'Y', 1316488716, 1318086748, 'browse_4', 3, 'flypage.tpl', 4),
(16, 1, 'Bút Chì - Chuốt Chì', '', 'resized/B__t_Ch_____Chu__4e83de078d5e8_90x90.jpg', 'B__t_Ch_____Chu__4e83de07a0563.jpg', 'Y', 1316488806, 1318086763, 'browse_4', 3, 'flypage.tpl', 5),
(17, 1, 'Bút Lông', '', 'resized/B__t_L__ng_4e83ddba5529a_90x90.jpg', 'B__t_L__ng_4e83ddba655a6.jpg', 'Y', 1316488899, 1318086698, 'browse_4', 3, 'flypage.tpl', 3),
(18, 1, 'Bút Xóa', '', 'resized/B__t_X__a_4e83dd9aa4c4b_90x90.jpg', 'B__t_X__a_4e83dd9ab6fb7.jpg', 'Y', 1316489121, 1318086734, 'browse_4', 3, 'flypage.tpl', 2),
(19, 1, 'Giấy Can', '', 'resized/Gi___y_Can_4e83dfa50a5f5_90x90.jpg', 'Gi___y_Can_4e83dfa50e6ae.jpg', 'Y', 1316580466, 1318086892, 'browse_4', 3, 'flypage.tpl', 2),
(20, 1, 'Giấy Fax', '', 'resized/Gi___y_Fax_4e83dfb72668b_90x90.jpg', 'Gi___y_Fax_4e83dfb72e5e3.jpg', 'Y', 1316580491, 1318086905, 'browse_4', 3, 'flypage.tpl', 3),
(21, 1, 'Giấy Cuộn', '', 'resized/Gi___y_Cu___n_4e83dfcb38ab3_90x90.jpg', 'Gi___y_Cu___n_4e83dfcb3dcd8.jpg', 'Y', 1316580532, 1318086920, 'browse_4', 3, 'flypage.tpl', 4),
(22, 1, 'Giấy Than', '', 'resized/Gi___y_Than_4e83dfe30732a_90x90.jpg', 'Gi___y_Than_4e83dfe313b7b.jpg', 'Y', 1316580582, 1318086944, 'browse_4', 3, 'flypage.tpl', 5),
(23, 1, 'Giấy In', '', 'resized/Gi___y_In_4e83df84eba62_90x90.jpg', 'Gi___y_In_4e83df850bb15.jpg', 'Y', 1316580631, 1318086877, 'browse_4', 3, 'flypage.tpl', 1),
(24, 1, 'Giấy In Màu', '', 'resized/Gi___y_In_M__u_4e83dff8ae996_90x90.jpg', 'Gi___y_In_M__u_4e83dff8b70be.jpg', 'Y', 1316580653, 1318086957, 'browse_4', 3, 'flypage.tpl', 6),
(25, 1, 'Giấy Vệ Sinh', '', 'resized/Gi___y_V____Sinh_4e83e044537f0_90x90.jpg', 'Gi___y_V____Sinh_4e83e0446384b.jpg', 'Y', 1316580704, 1318087370, 'browse_4', 3, 'flypage.tpl', 8),
(26, 1, 'Giấy Liên Tục', '', 'resized/Gi___y_Li__n_T___4e83e02ef3a5e_90x90.jpg', 'Gi___y_Li__n_T___4e83e02f06aa1.jpg', 'Y', 1316580726, 1318086972, 'browse_4', 3, 'flypage.tpl', 7),
(27, 1, 'Bìa-File', '', 'resized/B__a_File_4e833e1f59f7b_90x90.jpg', 'B__a_File_4e833e1f7a1b2.jpg', 'Y', 1316581018, 1318841397, 'browse_4', 3, 'flypage.tpl', 1),
(28, 1, 'Bao Thư', '', 'resized/Bao_Th___4e833cc619de1_90x90.jpg', 'Bao_Th___4e833cc6358ea.jpg', 'Y', 1316582937, 1318841500, 'browse_4', 3, 'flypage.tpl', 2),
(29, 1, 'Giấy Các Loại', '<p>Bao gồm các loại giấy.</p>', 'resized/Gi___y_C__c_4e86d2d052836_90x90.jpg', 'Gi___y_C__c_4e86d2d064d5e.jpg', 'Y', 1317458640, 1318841655, 'browse_4', 3, 'flypage-ask.tpl', 8),
(32, 1, 'Vệ Sinh Văn Phòng', '', 'V____Sinh_V__n_P_4e9ef5157c6e9.jpg', 'V____Sinh_V__n_P_4e9bec1b62890.jpg', 'Y', 1318841371, 1319040277, 'browse_4', 2, 'flypage-ask.tpl', 13),
(31, 1, 'Văn Phòng Phẩm', '', 'V__n_Ph__ng_Ph___4e9ef2bc3a722.jpg', 'V__n_Ph__ng_Ph___4e9ef2bc3aee9.jpg', 'Y', 1318840783, 1319039676, 'browse_4', 3, 'flypage-ask.tpl', 10),
(33, 1, 'Bảo Hộ Lao Động', '', 'B___o_H____Lao___4e9ef878a0aaf.jpg', 'B___o_H____Lao___4e9bed9198da2.jpg', 'Y', 1318841745, 1319041144, 'browse_4', 2, 'flypage-ask.tpl', 15),
(34, 1, 'Thực Phẩm Văn Phòng', '', 'Th___c_Ph___m_V__4e9ef891a7610.jpg', 'Th___c_Ph___m_V__4e9bedde4b80d.jpg', 'Y', 1318841822, 1319041169, 'browse_4', 3, 'flypage-ask.tpl', 16),
(35, 1, 'Đồ Nhựa & Phụ Liệu Đóng Gói', '', '______Nh___a___P_4e9ef9154db37.jpg', '______Nh___a___P_4e9bee484d4b8.jpg', 'Y', 1318841928, 1319041301, 'browse_4', 3, 'flypage-ask.tpl', 17),
(36, 1, 'Xô', '', 'X___4ea27accd6b97.jpg', '', 'Y', 1319258747, 1319278907, 'browse_4', 2, 'flypage.tpl', 1),
(37, 1, 'Kệ', '', 'K____4ea27b3a916df.jpg', '', 'Y', 1319258798, 1319271226, 'browse_4', 3, 'flypage.tpl', 2),
(38, 1, 'Can nhựa', '', 'Can_nh___a_4ea27b6c26795.jpg', '', 'Y', 1319258832, 1319276660, 'browse_4', 2, 'flypage.tpl', 5),
(39, 1, 'Rổ nhựa', '', 'R____nh___a_4ea27b461ff8c.jpg', '', 'Y', 1319258874, 1319271238, 'browse_4', 3, 'flypage.tpl', 4),
(40, 1, 'Thau & Khay nhựa', '', 'Thau___Khay_nh___4ea27b7a828c5.jpg', '', 'Y', 1319258901, 1319271290, 'browse_4', 3, 'flypage.tpl', 8),
(41, 1, 'Thùng đồ nghề', '', 'Th__ng_______ngh_4ea27b86913f3.jpg', '', 'Y', 1319259063, 1319271302, 'browse_4', 3, 'flypage.tpl', 6),
(42, 1, 'Bàn ghế', '', 'B__n_gh____4ea27b96212fa.jpg', '', 'Y', 1319259647, 1319276604, 'browse_4', 2, 'flypage.tpl', 3),
(43, 1, 'Nylon - Dây đai', '', 'Nylon___D__y___a_4ea27f6b78ece.jpg', '', 'Y', 1319259752, 1319272299, 'browse_4', 3, 'flypage.tpl', 7),
(44, 1, 'Cafe', '', 'Cafe_4ea280f85be18.jpg', '', 'Y', 1319272696, 1319276436, 'browse_4', 2, 'flypage.tpl', 1),
(45, 1, 'Trà', '', 'Tr___4ea29741537ad.jpg', 'Tr___4ea2972f59634.jpg', 'Y', 1319272731, 1319278401, 'browse_4', 2, 'flypage.tpl', 2),
(46, 1, 'Ngũ cốc', '', 'Ng___c___c_4ea2974e80b48.png', '', 'Y', 1319272761, 1319278414, 'browse_4', 2, 'flypage.tpl', 3),
(47, 1, 'Đường & Sữa', '', '_______ng___S____4ea297a03a1fa.jpg', '', 'Y', 1319272781, 1319278496, 'browse_4', 2, 'flypage.tpl', 4),
(48, 1, 'Mắt Kính & Mặt Nạ', '', 'M___t_K__nh___M__4ea383371f0af.gif', '', 'Y', 1319328741, 1319338807, 'browse_4', 2, 'flypage.tpl', 8),
(49, 1, 'Găng tay', '', 'G__ng_tay_4ea382f1005e9.jpg', '', 'Y', 1319328761, 1319338736, 'browse_4', 2, 'flypage.tpl', 3),
(50, 1, 'Ủng', '', '___ng_4ea38246c0342.jpg', '', 'Y', 1319328818, 1319338566, 'browse_4', 2, 'flypage.tpl', 1),
(51, 1, 'Nón Bảo Hiểm', '', 'N__n_B___o_Hi____4ea3917a60f7e.jpg', '', 'Y', 1319329119, 1319342458, 'browse_4', 2, 'flypage.tpl', 5),
(52, 1, 'Khẩu Trang', '', 'Kh___u_Trang_4ea3918aa41e4.jpg', '', 'Y', 1319329161, 1319342474, 'browse_4', 3, 'flypage.tpl', 4),
(53, 1, 'Thiết Bị Chống Ồn', '', 'Thi___t_B____Ch__4ea38321c659d.jpg', '', 'Y', 1319329227, 1319338785, 'browse_4', 2, 'flypage.tpl', 7),
(54, 1, 'Quần & Áo Bảo Hộ', '', 'Qu___n_____o_B___4ea3830cc18d5.jpg', '', 'Y', 1319329281, 1319338764, 'browse_4', 2, 'flypage.tpl', 9),
(55, 1, 'Thang & Dây Đai', '', 'Thang___D__y___a_4ea3919dcd50e.jpg', '', 'Y', 1319329332, 1319342493, 'browse_4', 2, 'flypage.tpl', 6),
(56, 1, 'Áo Phao', '', '__o_Phao_4ea3825dd9397.jpg', '', 'Y', 1319329378, 1319338589, 'browse_4', 2, 'flypage.tpl', 2),
(57, 1, 'Cây lâu nhà', '', 'C__y_l__u_nh___4ea4ea9703bb9.jpg', '', 'Y', 1319331421, 1319430807, 'browse_4', 2, 'flypage.tpl', 3),
(58, 1, 'Thùng rác', '', 'Th__ng_r__c_4ea4ea17a41e7.jpg', '', 'Y', 1319334862, 1319430679, 'browse_4', 2, 'flypage.tpl', 1),
(59, 1, 'Hóa Chất', '', 'H__a_Ch___t_4ea4e9fa7f376.jpg', '', 'Y', 1319427120, 1319430650, 'browse_4', 2, 'flypage.tpl', 2),
(60, 1, 'Vệ Sinh Kiếng', '', 'V____Sinh_Ki___n_4ea4ea3148a81.jpg', '', 'Y', 1319428829, 1319430705, 'browse_4', 2, 'flypage.tpl', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_category_xref`
--

CREATE TABLE IF NOT EXISTS `jos_vm_category_xref` (
  `category_parent_id` int(11) NOT NULL DEFAULT '0',
  `category_child_id` int(11) NOT NULL DEFAULT '0',
  `category_list` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_child_id`),
  KEY `category_xref_category_parent_id` (`category_parent_id`),
  KEY `idx_category_xref_category_list` (`category_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Category child-parent relation list';

--
-- Dumping data for table `jos_vm_category_xref`
--

INSERT INTO `jos_vm_category_xref` (`category_parent_id`, `category_child_id`, `category_list`) VALUES
(31, 6, 6),
(31, 8, 1),
(31, 9, 2),
(31, 10, 4),
(31, 11, 3),
(31, 12, 10),
(0, 13, 12),
(6, 14, 1),
(6, 15, 3),
(6, 16, 2),
(6, 17, 4),
(6, 18, 5),
(29, 19, 1),
(29, 20, 3),
(29, 21, 2),
(29, 22, 7),
(29, 23, 4),
(29, 24, 5),
(29, 25, 8),
(29, 26, 6),
(31, 27, 5),
(31, 28, NULL),
(31, 29, NULL),
(0, 32, NULL),
(0, 31, NULL),
(0, 33, NULL),
(0, 34, NULL),
(0, 35, NULL),
(35, 36, NULL),
(35, 37, NULL),
(35, 38, NULL),
(35, 39, NULL),
(35, 40, NULL),
(35, 41, NULL),
(35, 42, NULL),
(35, 43, NULL),
(34, 44, NULL),
(34, 45, NULL),
(34, 46, NULL),
(34, 47, NULL),
(33, 48, NULL),
(33, 49, NULL),
(33, 50, NULL),
(33, 51, NULL),
(33, 52, NULL),
(33, 53, NULL),
(33, 54, NULL),
(33, 55, NULL),
(33, 56, NULL),
(32, 57, NULL),
(32, 58, NULL),
(32, 59, NULL),
(32, 60, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_country`
--

CREATE TABLE IF NOT EXISTS `jos_vm_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) NOT NULL DEFAULT '1',
  `country_name` varchar(64) DEFAULT NULL,
  `country_3_code` char(3) DEFAULT NULL,
  `country_2_code` char(2) DEFAULT NULL,
  PRIMARY KEY (`country_id`),
  KEY `idx_country_name` (`country_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Country records' AUTO_INCREMENT=246 ;

--
-- Dumping data for table `jos_vm_country`
--

INSERT INTO `jos_vm_country` (`country_id`, `zone_id`, `country_name`, `country_3_code`, `country_2_code`) VALUES
(1, 1, 'Afghanistan', 'AFG', 'AF'),
(2, 1, 'Albania', 'ALB', 'AL'),
(3, 1, 'Algeria', 'DZA', 'DZ'),
(4, 1, 'American Samoa', 'ASM', 'AS'),
(5, 1, 'Andorra', 'AND', 'AD'),
(6, 1, 'Angola', 'AGO', 'AO'),
(7, 1, 'Anguilla', 'AIA', 'AI'),
(8, 1, 'Antarctica', 'ATA', 'AQ'),
(9, 1, 'Antigua and Barbuda', 'ATG', 'AG'),
(10, 1, 'Argentina', 'ARG', 'AR'),
(11, 1, 'Armenia', 'ARM', 'AM'),
(12, 1, 'Aruba', 'ABW', 'AW'),
(13, 1, 'Australia', 'AUS', 'AU'),
(14, 1, 'Austria', 'AUT', 'AT'),
(15, 1, 'Azerbaijan', 'AZE', 'AZ'),
(16, 1, 'Bahamas', 'BHS', 'BS'),
(17, 1, 'Bahrain', 'BHR', 'BH'),
(18, 1, 'Bangladesh', 'BGD', 'BD'),
(19, 1, 'Barbados', 'BRB', 'BB'),
(20, 1, 'Belarus', 'BLR', 'BY'),
(21, 1, 'Belgium', 'BEL', 'BE'),
(22, 1, 'Belize', 'BLZ', 'BZ'),
(23, 1, 'Benin', 'BEN', 'BJ'),
(24, 1, 'Bermuda', 'BMU', 'BM'),
(25, 1, 'Bhutan', 'BTN', 'BT'),
(26, 1, 'Bolivia', 'BOL', 'BO'),
(27, 1, 'Bosnia and Herzegowina', 'BIH', 'BA'),
(28, 1, 'Botswana', 'BWA', 'BW'),
(29, 1, 'Bouvet Island', 'BVT', 'BV'),
(30, 1, 'Brazil', 'BRA', 'BR'),
(31, 1, 'British Indian Ocean Territory', 'IOT', 'IO'),
(32, 1, 'Brunei Darussalam', 'BRN', 'BN'),
(33, 1, 'Bulgaria', 'BGR', 'BG'),
(34, 1, 'Burkina Faso', 'BFA', 'BF'),
(35, 1, 'Burundi', 'BDI', 'BI'),
(36, 1, 'Cambodia', 'KHM', 'KH'),
(37, 1, 'Cameroon', 'CMR', 'CM'),
(38, 1, 'Canada', 'CAN', 'CA'),
(39, 1, 'Cape Verde', 'CPV', 'CV'),
(40, 1, 'Cayman Islands', 'CYM', 'KY'),
(41, 1, 'Central African Republic', 'CAF', 'CF'),
(42, 1, 'Chad', 'TCD', 'TD'),
(43, 1, 'Chile', 'CHL', 'CL'),
(44, 1, 'China', 'CHN', 'CN'),
(45, 1, 'Christmas Island', 'CXR', 'CX'),
(46, 1, 'Cocos (Keeling) Islands', 'CCK', 'CC'),
(47, 1, 'Colombia', 'COL', 'CO'),
(48, 1, 'Comoros', 'COM', 'KM'),
(49, 1, 'Congo', 'COG', 'CG'),
(50, 1, 'Cook Islands', 'COK', 'CK'),
(51, 1, 'Costa Rica', 'CRI', 'CR'),
(52, 1, 'Cote D''Ivoire', 'CIV', 'CI'),
(53, 1, 'Croatia', 'HRV', 'HR'),
(54, 1, 'Cuba', 'CUB', 'CU'),
(55, 1, 'Cyprus', 'CYP', 'CY'),
(56, 1, 'Czech Republic', 'CZE', 'CZ'),
(57, 1, 'Denmark', 'DNK', 'DK'),
(58, 1, 'Djibouti', 'DJI', 'DJ'),
(59, 1, 'Dominica', 'DMA', 'DM'),
(60, 1, 'Dominican Republic', 'DOM', 'DO'),
(61, 1, 'East Timor', 'TMP', 'TP'),
(62, 1, 'Ecuador', 'ECU', 'EC'),
(63, 1, 'Egypt', 'EGY', 'EG'),
(64, 1, 'El Salvador', 'SLV', 'SV'),
(65, 1, 'Equatorial Guinea', 'GNQ', 'GQ'),
(66, 1, 'Eritrea', 'ERI', 'ER'),
(67, 1, 'Estonia', 'EST', 'EE'),
(68, 1, 'Ethiopia', 'ETH', 'ET'),
(69, 1, 'Falkland Islands (Malvinas)', 'FLK', 'FK'),
(70, 1, 'Faroe Islands', 'FRO', 'FO'),
(71, 1, 'Fiji', 'FJI', 'FJ'),
(72, 1, 'Finland', 'FIN', 'FI'),
(73, 1, 'France', 'FRA', 'FR'),
(74, 1, 'France, Metropolitan', 'FXX', 'FX'),
(75, 1, 'French Guiana', 'GUF', 'GF'),
(76, 1, 'French Polynesia', 'PYF', 'PF'),
(77, 1, 'French Southern Territories', 'ATF', 'TF'),
(78, 1, 'Gabon', 'GAB', 'GA'),
(79, 1, 'Gambia', 'GMB', 'GM'),
(80, 1, 'Georgia', 'GEO', 'GE'),
(81, 1, 'Germany', 'DEU', 'DE'),
(82, 1, 'Ghana', 'GHA', 'GH'),
(83, 1, 'Gibraltar', 'GIB', 'GI'),
(84, 1, 'Greece', 'GRC', 'GR'),
(85, 1, 'Greenland', 'GRL', 'GL'),
(86, 1, 'Grenada', 'GRD', 'GD'),
(87, 1, 'Guadeloupe', 'GLP', 'GP'),
(88, 1, 'Guam', 'GUM', 'GU'),
(89, 1, 'Guatemala', 'GTM', 'GT'),
(90, 1, 'Guinea', 'GIN', 'GN'),
(91, 1, 'Guinea-bissau', 'GNB', 'GW'),
(92, 1, 'Guyana', 'GUY', 'GY'),
(93, 1, 'Haiti', 'HTI', 'HT'),
(94, 1, 'Heard and Mc Donald Islands', 'HMD', 'HM'),
(95, 1, 'Honduras', 'HND', 'HN'),
(96, 1, 'Hong Kong', 'HKG', 'HK'),
(97, 1, 'Hungary', 'HUN', 'HU'),
(98, 1, 'Iceland', 'ISL', 'IS'),
(99, 1, 'India', 'IND', 'IN'),
(100, 1, 'Indonesia', 'IDN', 'ID'),
(101, 1, 'Iran (Islamic Republic of)', 'IRN', 'IR'),
(102, 1, 'Iraq', 'IRQ', 'IQ'),
(103, 1, 'Ireland', 'IRL', 'IE'),
(104, 1, 'Israel', 'ISR', 'IL'),
(105, 1, 'Italy', 'ITA', 'IT'),
(106, 1, 'Jamaica', 'JAM', 'JM'),
(107, 1, 'Japan', 'JPN', 'JP'),
(108, 1, 'Jordan', 'JOR', 'JO'),
(109, 1, 'Kazakhstan', 'KAZ', 'KZ'),
(110, 1, 'Kenya', 'KEN', 'KE'),
(111, 1, 'Kiribati', 'KIR', 'KI'),
(112, 1, 'Korea, Democratic People''s Republic of', 'PRK', 'KP'),
(113, 1, 'Korea, Republic of', 'KOR', 'KR'),
(114, 1, 'Kuwait', 'KWT', 'KW'),
(115, 1, 'Kyrgyzstan', 'KGZ', 'KG'),
(116, 1, 'Lao People''s Democratic Republic', 'LAO', 'LA'),
(117, 1, 'Latvia', 'LVA', 'LV'),
(118, 1, 'Lebanon', 'LBN', 'LB'),
(119, 1, 'Lesotho', 'LSO', 'LS'),
(120, 1, 'Liberia', 'LBR', 'LR'),
(121, 1, 'Libyan Arab Jamahiriya', 'LBY', 'LY'),
(122, 1, 'Liechtenstein', 'LIE', 'LI'),
(123, 1, 'Lithuania', 'LTU', 'LT'),
(124, 1, 'Luxembourg', 'LUX', 'LU'),
(125, 1, 'Macau', 'MAC', 'MO'),
(126, 1, 'Macedonia, The Former Yugoslav Republic of', 'MKD', 'MK'),
(127, 1, 'Madagascar', 'MDG', 'MG'),
(128, 1, 'Malawi', 'MWI', 'MW'),
(129, 1, 'Malaysia', 'MYS', 'MY'),
(130, 1, 'Maldives', 'MDV', 'MV'),
(131, 1, 'Mali', 'MLI', 'ML'),
(132, 1, 'Malta', 'MLT', 'MT'),
(133, 1, 'Marshall Islands', 'MHL', 'MH'),
(134, 1, 'Martinique', 'MTQ', 'MQ'),
(135, 1, 'Mauritania', 'MRT', 'MR'),
(136, 1, 'Mauritius', 'MUS', 'MU'),
(137, 1, 'Mayotte', 'MYT', 'YT'),
(138, 1, 'Mexico', 'MEX', 'MX'),
(139, 1, 'Micronesia, Federated States of', 'FSM', 'FM'),
(140, 1, 'Moldova, Republic of', 'MDA', 'MD'),
(141, 1, 'Monaco', 'MCO', 'MC'),
(142, 1, 'Mongolia', 'MNG', 'MN'),
(143, 1, 'Montserrat', 'MSR', 'MS'),
(144, 1, 'Morocco', 'MAR', 'MA'),
(145, 1, 'Mozambique', 'MOZ', 'MZ'),
(146, 1, 'Myanmar', 'MMR', 'MM'),
(147, 1, 'Namibia', 'NAM', 'NA'),
(148, 1, 'Nauru', 'NRU', 'NR'),
(149, 1, 'Nepal', 'NPL', 'NP'),
(150, 1, 'Netherlands', 'NLD', 'NL'),
(151, 1, 'Netherlands Antilles', 'ANT', 'AN'),
(152, 1, 'New Caledonia', 'NCL', 'NC'),
(153, 1, 'New Zealand', 'NZL', 'NZ'),
(154, 1, 'Nicaragua', 'NIC', 'NI'),
(155, 1, 'Niger', 'NER', 'NE'),
(156, 1, 'Nigeria', 'NGA', 'NG'),
(157, 1, 'Niue', 'NIU', 'NU'),
(158, 1, 'Norfolk Island', 'NFK', 'NF'),
(159, 1, 'Northern Mariana Islands', 'MNP', 'MP'),
(160, 1, 'Norway', 'NOR', 'NO'),
(161, 1, 'Oman', 'OMN', 'OM'),
(162, 1, 'Pakistan', 'PAK', 'PK'),
(163, 1, 'Palau', 'PLW', 'PW'),
(164, 1, 'Panama', 'PAN', 'PA'),
(165, 1, 'Papua New Guinea', 'PNG', 'PG'),
(166, 1, 'Paraguay', 'PRY', 'PY'),
(167, 1, 'Peru', 'PER', 'PE'),
(168, 1, 'Philippines', 'PHL', 'PH'),
(169, 1, 'Pitcairn', 'PCN', 'PN'),
(170, 1, 'Poland', 'POL', 'PL'),
(171, 1, 'Portugal', 'PRT', 'PT'),
(172, 1, 'Puerto Rico', 'PRI', 'PR'),
(173, 1, 'Qatar', 'QAT', 'QA'),
(174, 1, 'Reunion', 'REU', 'RE'),
(175, 1, 'Romania', 'ROM', 'RO'),
(176, 1, 'Russian Federation', 'RUS', 'RU'),
(177, 1, 'Rwanda', 'RWA', 'RW'),
(178, 1, 'Saint Kitts and Nevis', 'KNA', 'KN'),
(179, 1, 'Saint Lucia', 'LCA', 'LC'),
(180, 1, 'Saint Vincent and the Grenadines', 'VCT', 'VC'),
(181, 1, 'Samoa', 'WSM', 'WS'),
(182, 1, 'San Marino', 'SMR', 'SM'),
(183, 1, 'Sao Tome and Principe', 'STP', 'ST'),
(184, 1, 'Saudi Arabia', 'SAU', 'SA'),
(185, 1, 'Senegal', 'SEN', 'SN'),
(186, 1, 'Seychelles', 'SYC', 'SC'),
(187, 1, 'Sierra Leone', 'SLE', 'SL'),
(188, 1, 'Singapore', 'SGP', 'SG'),
(189, 1, 'Slovakia (Slovak Republic)', 'SVK', 'SK'),
(190, 1, 'Slovenia', 'SVN', 'SI'),
(191, 1, 'Solomon Islands', 'SLB', 'SB'),
(192, 1, 'Somalia', 'SOM', 'SO'),
(193, 1, 'South Africa', 'ZAF', 'ZA'),
(194, 1, 'South Georgia and the South Sandwich Islands', 'SGS', 'GS'),
(195, 1, 'Spain', 'ESP', 'ES'),
(196, 1, 'Sri Lanka', 'LKA', 'LK'),
(197, 1, 'St. Helena', 'SHN', 'SH'),
(198, 1, 'St. Pierre and Miquelon', 'SPM', 'PM'),
(199, 1, 'Sudan', 'SDN', 'SD'),
(200, 1, 'Suriname', 'SUR', 'SR'),
(201, 1, 'Svalbard and Jan Mayen Islands', 'SJM', 'SJ'),
(202, 1, 'Swaziland', 'SWZ', 'SZ'),
(203, 1, 'Sweden', 'SWE', 'SE'),
(204, 1, 'Switzerland', 'CHE', 'CH'),
(205, 1, 'Syrian Arab Republic', 'SYR', 'SY'),
(206, 1, 'Taiwan', 'TWN', 'TW'),
(207, 1, 'Tajikistan', 'TJK', 'TJ'),
(208, 1, 'Tanzania, United Republic of', 'TZA', 'TZ'),
(209, 1, 'Thailand', 'THA', 'TH'),
(210, 1, 'Togo', 'TGO', 'TG'),
(211, 1, 'Tokelau', 'TKL', 'TK'),
(212, 1, 'Tonga', 'TON', 'TO'),
(213, 1, 'Trinidad and Tobago', 'TTO', 'TT'),
(214, 1, 'Tunisia', 'TUN', 'TN'),
(215, 1, 'Turkey', 'TUR', 'TR'),
(216, 1, 'Turkmenistan', 'TKM', 'TM'),
(217, 1, 'Turks and Caicos Islands', 'TCA', 'TC'),
(218, 1, 'Tuvalu', 'TUV', 'TV'),
(219, 1, 'Uganda', 'UGA', 'UG'),
(220, 1, 'Ukraine', 'UKR', 'UA'),
(221, 1, 'United Arab Emirates', 'ARE', 'AE'),
(222, 1, 'United Kingdom', 'GBR', 'GB'),
(223, 1, 'United States', 'USA', 'US'),
(224, 1, 'United States Minor Outlying Islands', 'UMI', 'UM'),
(225, 1, 'Uruguay', 'URY', 'UY'),
(226, 1, 'Uzbekistan', 'UZB', 'UZ'),
(227, 1, 'Vanuatu', 'VUT', 'VU'),
(228, 1, 'Vatican City State (Holy See)', 'VAT', 'VA'),
(229, 1, 'Venezuela', 'VEN', 'VE'),
(230, 1, 'Viet Nam', 'VNM', 'VN'),
(231, 1, 'Virgin Islands (British)', 'VGB', 'VG'),
(232, 1, 'Virgin Islands (U.S.)', 'VIR', 'VI'),
(233, 1, 'Wallis and Futuna Islands', 'WLF', 'WF'),
(234, 1, 'Western Sahara', 'ESH', 'EH'),
(235, 1, 'Yemen', 'YEM', 'YE'),
(236, 1, 'Serbia', 'SRB', 'RS'),
(237, 1, 'The Democratic Republic of Congo', 'DRC', 'DC'),
(238, 1, 'Zambia', 'ZMB', 'ZM'),
(239, 1, 'Zimbabwe', 'ZWE', 'ZW'),
(240, 1, 'East Timor', 'XET', 'XE'),
(241, 1, 'Jersey', 'XJE', 'XJ'),
(242, 1, 'St. Barthelemy', 'XSB', 'XB'),
(243, 1, 'St. Eustatius', 'XSE', 'XU'),
(244, 1, 'Canary Islands', 'XCA', 'XC'),
(245, 1, 'Montenegro', 'MNE', 'ME');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_coupons`
--

CREATE TABLE IF NOT EXISTS `jos_vm_coupons` (
  `coupon_id` int(16) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(32) NOT NULL DEFAULT '',
  `percent_or_total` enum('percent','total') NOT NULL DEFAULT 'percent',
  `coupon_type` enum('gift','permanent') NOT NULL DEFAULT 'gift',
  `coupon_value` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to store coupon codes' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jos_vm_coupons`
--

INSERT INTO `jos_vm_coupons` (`coupon_id`, `coupon_code`, `percent_or_total`, `coupon_type`, `coupon_value`) VALUES
(1, 'test1', 'total', 'gift', '6.00'),
(2, 'test2', 'percent', 'permanent', '15.00'),
(3, 'test3', 'total', 'permanent', '4.00'),
(4, 'test4', 'total', 'gift', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_creditcard`
--

CREATE TABLE IF NOT EXISTS `jos_vm_creditcard` (
  `creditcard_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `creditcard_name` varchar(70) NOT NULL DEFAULT '',
  `creditcard_code` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`creditcard_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to store credit card types' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jos_vm_creditcard`
--

INSERT INTO `jos_vm_creditcard` (`creditcard_id`, `vendor_id`, `creditcard_name`, `creditcard_code`) VALUES
(1, 1, 'Visa', 'VISA'),
(2, 1, 'MasterCard', 'MC'),
(3, 1, 'American Express', 'amex'),
(4, 1, 'Discover Card', 'discover'),
(5, 1, 'Diners Club', 'diners'),
(6, 1, 'JCB', 'jcb'),
(7, 1, 'Australian Bankcard', 'australian_bc');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_csv`
--

CREATE TABLE IF NOT EXISTS `jos_vm_csv` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(128) NOT NULL DEFAULT '',
  `field_default_value` text,
  `field_ordering` int(3) NOT NULL DEFAULT '0',
  `field_required` char(1) DEFAULT 'N',
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds all fields which are used on CVS Ex-/Import' AUTO_INCREMENT=26 ;

--
-- Dumping data for table `jos_vm_csv`
--

INSERT INTO `jos_vm_csv` (`field_id`, `field_name`, `field_default_value`, `field_ordering`, `field_required`) VALUES
(1, 'product_sku', '', 1, 'Y'),
(2, 'product_s_desc', '', 5, 'N'),
(3, 'product_desc', '', 6, 'N'),
(4, 'product_thumb_image', '', 7, 'N'),
(5, 'product_full_image', '', 8, 'N'),
(6, 'product_weight', '', 9, 'N'),
(7, 'product_weight_uom', 'KG', 10, 'N'),
(8, 'product_length', '', 11, 'N'),
(9, 'product_width', '', 12, 'N'),
(10, 'product_height', '', 13, 'N'),
(11, 'product_lwh_uom', '', 14, 'N'),
(12, 'product_in_stock', '0', 15, 'N'),
(13, 'product_available_date', '', 16, 'N'),
(14, 'product_discount_id', '', 17, 'N'),
(15, 'product_name', '', 2, 'Y'),
(16, 'product_price', '', 4, 'N'),
(17, 'category_path', '', 3, 'Y'),
(18, 'manufacturer_id', '', 18, 'N'),
(19, 'product_tax_id', '', 19, 'N'),
(20, 'product_sales', '', 20, 'N'),
(21, 'product_parent_id', '0', 21, 'N'),
(22, 'attribute', '', 22, 'N'),
(23, 'custom_attribute', '', 23, 'N'),
(24, 'attributes', '', 24, 'N'),
(25, 'attribute_values', '', 25, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_currency`
--

CREATE TABLE IF NOT EXISTS `jos_vm_currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(64) DEFAULT NULL,
  `currency_code` char(3) DEFAULT NULL,
  PRIMARY KEY (`currency_id`),
  KEY `idx_currency_name` (`currency_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to store currencies' AUTO_INCREMENT=159 ;

--
-- Dumping data for table `jos_vm_currency`
--

INSERT INTO `jos_vm_currency` (`currency_id`, `currency_name`, `currency_code`) VALUES
(1, 'Andorran Peseta', 'ADP'),
(2, 'United Arab Emirates Dirham', 'AED'),
(3, 'Afghanistan Afghani', 'AFA'),
(4, 'Albanian Lek', 'ALL'),
(5, 'Netherlands Antillian Guilder', 'ANG'),
(6, 'Angolan Kwanza', 'AOK'),
(7, 'Argentine Peso', 'ARS'),
(9, 'Australian Dollar', 'AUD'),
(10, 'Aruban Florin', 'AWG'),
(11, 'Barbados Dollar', 'BBD'),
(12, 'Bangladeshi Taka', 'BDT'),
(14, 'Bulgarian Lev', 'BGL'),
(15, 'Bahraini Dinar', 'BHD'),
(16, 'Burundi Franc', 'BIF'),
(17, 'Bermudian Dollar', 'BMD'),
(18, 'Brunei Dollar', 'BND'),
(19, 'Bolivian Boliviano', 'BOB'),
(20, 'Brazilian Real', 'BRL'),
(21, 'Bahamian Dollar', 'BSD'),
(22, 'Bhutan Ngultrum', 'BTN'),
(23, 'Burma Kyat', 'BUK'),
(24, 'Botswanian Pula', 'BWP'),
(25, 'Belize Dollar', 'BZD'),
(26, 'Canadian Dollar', 'CAD'),
(27, 'Swiss Franc', 'CHF'),
(28, 'Chilean Unidades de Fomento', 'CLF'),
(29, 'Chilean Peso', 'CLP'),
(30, 'Yuan (Chinese) Renminbi', 'CNY'),
(31, 'Colombian Peso', 'COP'),
(32, 'Costa Rican Colon', 'CRC'),
(33, 'Czech Koruna', 'CZK'),
(34, 'Cuban Peso', 'CUP'),
(35, 'Cape Verde Escudo', 'CVE'),
(36, 'Cyprus Pound', 'CYP'),
(40, 'Danish Krone', 'DKK'),
(41, 'Dominican Peso', 'DOP'),
(42, 'Algerian Dinar', 'DZD'),
(43, 'Ecuador Sucre', 'ECS'),
(44, 'Egyptian Pound', 'EGP'),
(46, 'Ethiopian Birr', 'ETB'),
(47, 'Euro', 'EUR'),
(49, 'Fiji Dollar', 'FJD'),
(50, 'Falkland Islands Pound', 'FKP'),
(52, 'British Pound', 'GBP'),
(53, 'Ghanaian Cedi', 'GHC'),
(54, 'Gibraltar Pound', 'GIP'),
(55, 'Gambian Dalasi', 'GMD'),
(56, 'Guinea Franc', 'GNF'),
(58, 'Guatemalan Quetzal', 'GTQ'),
(59, 'Guinea-Bissau Peso', 'GWP'),
(60, 'Guyanan Dollar', 'GYD'),
(61, 'Hong Kong Dollar', 'HKD'),
(62, 'Honduran Lempira', 'HNL'),
(63, 'Haitian Gourde', 'HTG'),
(64, 'Hungarian Forint', 'HUF'),
(65, 'Indonesian Rupiah', 'IDR'),
(66, 'Irish Punt', 'IEP'),
(67, 'Israeli Shekel', 'ILS'),
(68, 'Indian Rupee', 'INR'),
(69, 'Iraqi Dinar', 'IQD'),
(70, 'Iranian Rial', 'IRR'),
(73, 'Jamaican Dollar', 'JMD'),
(74, 'Jordanian Dinar', 'JOD'),
(75, 'Japanese Yen', 'JPY'),
(76, 'Kenyan Shilling', 'KES'),
(77, 'Kampuchean (Cambodian) Riel', 'KHR'),
(78, 'Comoros Franc', 'KMF'),
(79, 'North Korean Won', 'KPW'),
(80, '(South) Korean Won', 'KRW'),
(81, 'Kuwaiti Dinar', 'KWD'),
(82, 'Cayman Islands Dollar', 'KYD'),
(83, 'Lao Kip', 'LAK'),
(84, 'Lebanese Pound', 'LBP'),
(85, 'Sri Lanka Rupee', 'LKR'),
(86, 'Liberian Dollar', 'LRD'),
(87, 'Lesotho Loti', 'LSL'),
(89, 'Libyan Dinar', 'LYD'),
(90, 'Moroccan Dirham', 'MAD'),
(91, 'Malagasy Franc', 'MGF'),
(92, 'Mongolian Tugrik', 'MNT'),
(93, 'Macau Pataca', 'MOP'),
(94, 'Mauritanian Ouguiya', 'MRO'),
(95, 'Maltese Lira', 'MTL'),
(96, 'Mauritius Rupee', 'MUR'),
(97, 'Maldive Rufiyaa', 'MVR'),
(98, 'Malawi Kwacha', 'MWK'),
(99, 'Mexican Peso', 'MXP'),
(100, 'Malaysian Ringgit', 'MYR'),
(101, 'Mozambique Metical', 'MZM'),
(102, 'Nigerian Naira', 'NGN'),
(103, 'Nicaraguan Cordoba', 'NIC'),
(105, 'Norwegian Kroner', 'NOK'),
(106, 'Nepalese Rupee', 'NPR'),
(107, 'New Zealand Dollar', 'NZD'),
(108, 'Omani Rial', 'OMR'),
(109, 'Panamanian Balboa', 'PAB'),
(110, 'Peruvian Nuevo Sol', 'PEN'),
(111, 'Papua New Guinea Kina', 'PGK'),
(112, 'Philippine Peso', 'PHP'),
(113, 'Pakistan Rupee', 'PKR'),
(114, 'Polish Złoty', 'PLN'),
(116, 'Paraguay Guarani', 'PYG'),
(117, 'Qatari Rial', 'QAR'),
(118, 'Romanian Leu', 'RON'),
(119, 'Rwanda Franc', 'RWF'),
(120, 'Saudi Arabian Riyal', 'SAR'),
(121, 'Solomon Islands Dollar', 'SBD'),
(122, 'Seychelles Rupee', 'SCR'),
(123, 'Sudanese Pound', 'SDP'),
(124, 'Swedish Krona', 'SEK'),
(125, 'Singapore Dollar', 'SGD'),
(126, 'St. Helena Pound', 'SHP'),
(127, 'Sierra Leone Leone', 'SLL'),
(128, 'Somali Shilling', 'SOS'),
(129, 'Suriname Guilder', 'SRG'),
(130, 'Sao Tome and Principe Dobra', 'STD'),
(131, 'Russian Ruble', 'RUB'),
(132, 'El Salvador Colon', 'SVC'),
(133, 'Syrian Potmd', 'SYP'),
(134, 'Swaziland Lilangeni', 'SZL'),
(135, 'Thai Bath', 'THB'),
(136, 'Tunisian Dinar', 'TND'),
(137, 'Tongan Pa''anga', 'TOP'),
(138, 'East Timor Escudo', 'TPE'),
(139, 'Turkish Lira', 'TRY'),
(140, 'Trinidad and Tobago Dollar', 'TTD'),
(141, 'Taiwan Dollar', 'TWD'),
(142, 'Tanzanian Shilling', 'TZS'),
(143, 'Uganda Shilling', 'UGS'),
(144, 'US Dollar', 'USD'),
(145, 'Uruguayan Peso', 'UYP'),
(146, 'Venezualan Bolivar', 'VEB'),
(147, 'Vietnamese Dong', 'VND'),
(148, 'Vanuatu Vatu', 'VUV'),
(149, 'Samoan Tala', 'WST'),
(150, 'Democratic Yemeni Dinar', 'YDD'),
(151, 'Yemeni Rial', 'YER'),
(152, 'Dinar', 'RSD'),
(153, 'South African Rand', 'ZAR'),
(154, 'Zambian Kwacha', 'ZMK'),
(155, 'Zaire Zaire', 'ZRZ'),
(156, 'Zimbabwe Dollar', 'ZWD'),
(157, 'Slovak Koruna', 'SKK'),
(158, 'Armenian Dram', 'AMD');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_export`
--

CREATE TABLE IF NOT EXISTS `jos_vm_export` (
  `export_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `export_name` varchar(255) DEFAULT NULL,
  `export_desc` text NOT NULL,
  `export_class` varchar(50) NOT NULL,
  `export_enabled` char(1) NOT NULL DEFAULT 'N',
  `export_config` text NOT NULL,
  `iscore` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`export_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Export Modules' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_function`
--

CREATE TABLE IF NOT EXISTS `jos_vm_function` (
  `function_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `function_name` varchar(32) DEFAULT NULL,
  `function_class` varchar(32) DEFAULT NULL,
  `function_method` varchar(32) DEFAULT NULL,
  `function_description` text,
  `function_perms` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`function_id`),
  KEY `idx_function_module_id` (`module_id`),
  KEY `idx_function_name` (`function_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Used to map a function alias to a ''real'' class::function' AUTO_INCREMENT=195 ;

--
-- Dumping data for table `jos_vm_function`
--

INSERT INTO `jos_vm_function` (`function_id`, `module_id`, `function_name`, `function_class`, `function_method`, `function_description`, `function_perms`) VALUES
(1, 1, 'userAdd', 'ps_user', 'add', '', 'admin,storeadmin'),
(2, 1, 'userDelete', 'ps_user', 'delete', '', 'admin,storeadmin'),
(3, 1, 'userUpdate', 'ps_user', 'update', '', 'admin,storeadmin'),
(31, 2, 'productAdd', 'ps_product', 'add', '', 'admin,storeadmin'),
(6, 1, 'functionAdd', 'ps_function', 'add', '', 'admin'),
(7, 1, 'functionUpdate', 'ps_function', 'update', '', 'admin'),
(8, 1, 'functionDelete', 'ps_function', 'delete', '', 'admin'),
(9, 1, 'userLogout', 'ps_user', 'logout', '', 'none'),
(10, 1, 'userAddressAdd', 'ps_user_address', 'add', '', 'admin,storeadmin,shopper,demo'),
(11, 1, 'userAddressUpdate', 'ps_user_address', 'update', '', 'admin,storeadmin,shopper'),
(12, 1, 'userAddressDelete', 'ps_user_address', 'delete', '', 'admin,storeadmin,shopper'),
(13, 1, 'moduleAdd', 'ps_module', 'add', '', 'admin'),
(14, 1, 'moduleUpdate', 'ps_module', 'update', '', 'admin'),
(15, 1, 'moduleDelete', 'ps_module', 'delete', '', 'admin'),
(16, 1, 'userLogin', 'ps_user', 'login', '', 'none'),
(17, 3, 'vendorAdd', 'ps_vendor', 'add', '', 'admin'),
(18, 3, 'vendorUpdate', 'ps_vendor', 'update', '', 'admin,storeadmin'),
(19, 3, 'vendorDelete', 'ps_vendor', 'delete', '', 'admin'),
(20, 3, 'vendorCategoryAdd', 'ps_vendor_category', 'add', '', 'admin'),
(21, 3, 'vendorCategoryUpdate', 'ps_vendor_category', 'update', '', 'admin'),
(22, 3, 'vendorCategoryDelete', 'ps_vendor_category', 'delete', '', 'admin'),
(23, 4, 'shopperAdd', 'ps_shopper', 'add', '', 'none'),
(24, 4, 'shopperDelete', 'ps_shopper', 'delete', '', 'admin,storeadmin'),
(25, 4, 'shopperUpdate', 'ps_shopper', 'update', '', 'admin,storeadmin,shopper'),
(26, 4, 'shopperGroupAdd', 'ps_shopper_group', 'add', '', 'admin,storeadmin'),
(27, 4, 'shopperGroupUpdate', 'ps_shopper_group', 'update', '', 'admin,storeadmin'),
(28, 4, 'shopperGroupDelete', 'ps_shopper_group', 'delete', '', 'admin,storeadmin'),
(30, 5, 'orderStatusSet', 'ps_order', 'order_status_update', '', 'admin,storeadmin'),
(32, 2, 'productDelete', 'ps_product', 'delete', '', 'admin,storeadmin'),
(33, 2, 'productUpdate', 'ps_product', 'update', '', 'admin,storeadmin'),
(34, 2, 'productCategoryAdd', 'ps_product_category', 'add', '', 'admin,storeadmin'),
(35, 2, 'productCategoryUpdate', 'ps_product_category', 'update', '', 'admin,storeadmin'),
(36, 2, 'productCategoryDelete', 'ps_product_category', 'delete', '', 'admin,storeadmin'),
(37, 2, 'productPriceAdd', 'ps_product_price', 'add', '', 'admin,storeadmin'),
(38, 2, 'productPriceUpdate', 'ps_product_price', 'update', '', 'admin,storeadmin'),
(39, 2, 'productPriceDelete', 'ps_product_price', 'delete', '', 'admin,storeadmin'),
(40, 2, 'productAttributeAdd', 'ps_product_attribute', 'add', '', 'admin,storeadmin'),
(41, 2, 'productAttributeUpdate', 'ps_product_attribute', 'update', '', 'admin,storeadmin'),
(42, 2, 'productAttributeDelete', 'ps_product_attribute', 'delete', '', 'admin,storeadmin'),
(43, 7, 'cartAdd', 'ps_cart', 'add', '', 'none'),
(44, 7, 'cartUpdate', 'ps_cart', 'update', '', 'none'),
(45, 7, 'cartDelete', 'ps_cart', 'delete', '', 'none'),
(46, 10, 'checkoutComplete', 'ps_checkout', 'add', '', 'shopper,storeadmin,admin'),
(48, 8, 'paymentMethodUpdate', 'ps_payment_method', 'update', '', 'admin,storeadmin'),
(49, 8, 'paymentMethodAdd', 'ps_payment_method', 'add', '', 'admin,storeadmin'),
(50, 8, 'paymentMethodDelete', 'ps_payment_method', 'delete', '', 'admin,storeadmin'),
(51, 5, 'orderDelete', 'ps_order', 'delete', '', 'admin,storeadmin'),
(52, 11, 'addTaxRate', 'ps_tax', 'add', '', 'admin,storeadmin'),
(53, 11, 'updateTaxRate', 'ps_tax', 'update', '', 'admin,storeadmin'),
(54, 11, 'deleteTaxRate', 'ps_tax', 'delete', '', 'admin,storeadmin'),
(55, 10, 'checkoutValidateST', 'ps_checkout', 'validate_shipto', '', 'none'),
(59, 5, 'orderStatusUpdate', 'ps_order_status', 'update', '', 'admin,storeadmin'),
(60, 5, 'orderStatusAdd', 'ps_order_status', 'add', '', 'storeadmin,admin'),
(61, 5, 'orderStatusDelete', 'ps_order_status', 'delete', '', 'admin,storeadmin'),
(62, 1, 'currencyAdd', 'ps_currency', 'add', 'add a currency', 'storeadmin,admin'),
(63, 1, 'currencyUpdate', 'ps_currency', 'update', '        update a currency', 'storeadmin,admin'),
(64, 1, 'currencyDelete', 'ps_currency', 'delete', 'delete a currency', 'storeadmin,admin'),
(65, 1, 'countryAdd', 'ps_country', 'add', 'Add a country ', 'storeadmin,admin'),
(66, 1, 'countryUpdate', 'ps_country', 'update', 'Update a country record', 'storeadmin,admin'),
(67, 1, 'countryDelete', 'ps_country', 'delete', 'Delete a country record', 'storeadmin,admin'),
(68, 2, 'product_csv', 'ps_csv', 'upload_csv', '', 'admin'),
(110, 7, 'waitingListAdd', 'zw_waiting_list', 'add', '', 'none'),
(111, 13, 'addzone', 'ps_zone', 'add', 'This will add a zone', 'admin,storeadmin'),
(112, 13, 'updatezone', 'ps_zone', 'update', 'This will update a zone', 'admin,storeadmin'),
(113, 13, 'deletezone', 'ps_zone', 'delete', 'This will delete a zone', 'admin,storeadmin'),
(114, 13, 'zoneassign', 'ps_zone', 'assign', 'This will assign a country to a zone', 'admin,storeadmin'),
(115, 1, 'writeConfig', 'ps_config', 'writeconfig', 'This will write the configuration details to virtuemart.cfg.php', 'admin'),
(116, 12839, 'carrierAdd', 'ps_shipping', 'add', '', 'admin,storeadmin'),
(117, 12839, 'carrierDelete', 'ps_shipping', 'delete', '', 'admin,storeadmin'),
(118, 12839, 'carrierUpdate', 'ps_shipping', 'update', '', 'admin,storeadmin'),
(119, 12839, 'rateAdd', 'ps_shipping', 'rate_add', '', 'admin,storeadmin'),
(120, 12839, 'rateUpdate', 'ps_shipping', 'rate_update', '', 'admin,shopadmin'),
(121, 12839, 'rateDelete', 'ps_shipping', 'rate_delete', '', 'admin,storeadmin'),
(122, 10, 'checkoutProcess', 'ps_checkout', 'process', '', 'none'),
(123, 5, 'downloadRequest', 'ps_order', 'download_request', 'This checks if the download request is valid and sends the file to the browser as file download if the request was successful, otherwise echoes an error', 'none'),
(128, 99, 'manufacturerAdd', 'ps_manufacturer', 'add', '', 'admin,storeadmin'),
(129, 99, 'manufacturerUpdate', 'ps_manufacturer', 'update', '', 'admin,storeadmin'),
(130, 99, 'manufacturerDelete', 'ps_manufacturer', 'delete', '', 'admin,storeadmin'),
(131, 99, 'manufacturercategoryAdd', 'ps_manufacturer_category', 'add', '', 'admin,storeadmin'),
(132, 99, 'manufacturercategoryUpdate', 'ps_manufacturer_category', 'update', '', 'admin,storeadmin'),
(133, 99, 'manufacturercategoryDelete', 'ps_manufacturer_category', 'delete', '', 'admin,storeadmin'),
(134, 7, 'addReview', 'ps_reviews', 'process_review', 'This lets the user add a review and rating to a product.', 'admin,storeadmin,shopper,demo'),
(135, 7, 'productReviewDelete', 'ps_reviews', 'delete_review', 'This deletes a review and from a product.', 'admin,storeadmin'),
(136, 8, 'creditcardAdd', 'ps_creditcard', 'add', 'Adds a Credit Card entry.', 'admin,storeadmin'),
(137, 8, 'creditcardUpdate', 'ps_creditcard', 'update', 'Updates a Credit Card entry.', 'admin,storeadmin'),
(138, 8, 'creditcardDelete', 'ps_creditcard', 'delete', 'Deletes a Credit Card entry.', 'admin,storeadmin'),
(139, 2, 'changePublishState', 'vmAbstractObject.class', 'handlePublishState', 'Changes the publish field of an item, so that it can be published or unpublished easily.', 'admin,storeadmin'),
(140, 2, 'export_csv', 'ps_csv', 'export_csv', 'This function exports all relevant product data to CSV.', 'admin,storeadmin'),
(141, 2, 'reorder', 'ps_product_category', 'reorder', 'Changes the list order of a category.', 'admin,storeadmin'),
(142, 2, 'discountAdd', 'ps_product_discount', 'add', 'Adds a discount.', 'admin,storeadmin'),
(143, 2, 'discountUpdate', 'ps_product_discount', 'update', 'Updates a discount.', 'admin,storeadmin'),
(144, 2, 'discountDelete', 'ps_product_discount', 'delete', 'Deletes a discount.', 'admin,storeadmin'),
(145, 8, 'shippingmethodSave', 'ps_shipping_method', 'save', '', 'admin,storeadmin'),
(146, 2, 'uploadProductFile', 'ps_product_files', 'add', 'Uploads and Adds a Product Image/File.', 'admin,storeadmin'),
(147, 2, 'updateProductFile', 'ps_product_files', 'update', 'Updates a Product Image/File.', 'admin,storeadmin'),
(148, 2, 'deleteProductFile', 'ps_product_files', 'delete', 'Deletes a Product Image/File.', 'admin,storeadmin'),
(149, 12843, 'couponAdd', 'ps_coupon', 'add_coupon_code', 'Adds a Coupon.', 'admin,storeadmin'),
(150, 12843, 'couponUpdate', 'ps_coupon', 'update_coupon', 'Updates a Coupon.', 'admin,storeadmin'),
(151, 12843, 'couponDelete', 'ps_coupon', 'remove_coupon_code', 'Deletes a Coupon.', 'admin,storeadmin'),
(152, 12843, 'couponProcess', 'ps_coupon', 'process_coupon_code', 'Processes a Coupon.', 'admin,storeadmin,shopper,demo'),
(153, 2, 'ProductTypeAdd', 'ps_product_type', 'add', 'Function add a Product Type and create new table product_type_<id>.', 'admin'),
(154, 2, 'ProductTypeUpdate', 'ps_product_type', 'update', 'Update a Product Type.', 'admin'),
(155, 2, 'ProductTypeDelete', 'ps_product_type', 'delete', 'Delete a Product Type and drop table product_type_<id>.', 'admin'),
(156, 2, 'ProductTypeReorder', 'ps_product_type', 'reorder', 'Changes the list order of a Product Type.', 'admin'),
(157, 2, 'ProductTypeAddParam', 'ps_product_type_parameter', 'add_parameter', 'Function add a Parameter into a Product Type and create new column in table product_type_<id>.', 'admin'),
(158, 2, 'ProductTypeUpdateParam', 'ps_product_type_parameter', 'update_parameter', 'Function update a Parameter in a Product Type and a column in table product_type_<id>.', 'admin'),
(159, 2, 'ProductTypeDeleteParam', 'ps_product_type_parameter', 'delete_parameter', 'Function delete a Parameter from a Product Type and drop a column in table product_type_<id>.', 'admin'),
(160, 2, 'ProductTypeReorderParam', 'ps_product_type_parameter', 'reorder_parameter', 'Changes the list order of a Parameter.', 'admin'),
(161, 2, 'productProductTypeAdd', 'ps_product_product_type', 'add', 'Add a Product into a Product Type.', 'admin,storeadmin'),
(162, 2, 'productProductTypeDelete', 'ps_product_product_type', 'delete', 'Delete a Product from a Product Type.', 'admin,storeadmin'),
(163, 1, 'stateAdd', 'ps_country', 'addState', 'Add a State ', 'storeadmin,admin'),
(164, 1, 'stateUpdate', 'ps_country', 'updateState', 'Update a state record', 'storeadmin,admin'),
(165, 1, 'stateDelete', 'ps_country', 'deleteState', 'Delete a state record', 'storeadmin,admin'),
(166, 2, 'csvFieldAdd', 'ps_csv', 'add', 'Add a CSV Field ', 'storeadmin,admin'),
(167, 2, 'csvFieldUpdate', 'ps_csv', 'update', 'Update a CSV Field', 'storeadmin,admin'),
(168, 2, 'csvFieldDelete', 'ps_csv', 'delete', 'Delete a CSV Field', 'storeadmin,admin'),
(169, 1, 'userfieldSave', 'ps_userfield', 'savefield', 'add or edit a user field', 'admin'),
(170, 1, 'userfieldDelete', 'ps_userfield', 'deletefield', '', 'admin'),
(171, 1, 'changeordering', 'vmAbstractObject.class', 'handleordering', '', 'admin'),
(172, 2, 'moveProduct', 'ps_product', 'move', 'Move products from one category to another.', 'admin,storeadmin'),
(173, 7, 'productAsk', 'ps_communication', 'mail_question', 'Lets the customer send a question about a specific product.', 'none'),
(174, 7, 'recommendProduct', 'ps_communication', 'sendRecommendation', 'Lets the customer send a recommendation about a specific product to a friend.', 'none'),
(175, 2, 'reviewUpdate', 'ps_reviews', 'update', 'Modify a review about a specific product.', 'admin'),
(176, 8, 'ExportUpdate', 'ps_export', 'update', '', 'admin,storeadmin'),
(177, 8, 'ExportAdd', 'ps_export', 'add', '', 'admin,storeadmin'),
(178, 8, 'ExportDelete', 'ps_export', 'delete', '', 'admin,storeadmin'),
(179, 1, 'writeThemeConfig', 'ps_config', 'writeThemeConfig', 'Writes a theme configuration file.', 'admin'),
(180, 1, 'usergroupAdd', 'usergroup.class', 'add', 'Add a new user group', 'admin'),
(181, 1, 'usergroupUpdate', 'usergroup.class', 'update', 'Update an user group', 'admin'),
(182, 1, 'usergroupDelete', 'usergroup.class', 'delete', 'Delete an user group', 'admin'),
(183, 1, 'setModulePermissions', 'ps_module', 'update_permissions', '', 'admin'),
(184, 1, 'setFunctionPermissions', 'ps_function', 'update_permissions', '', 'admin'),
(185, 2, 'insertDownloadsForProduct', 'ps_order', 'insert_downloads_for_product', '', 'admin'),
(186, 5, 'mailDownloadId', 'ps_order', 'mail_download_id', '', 'storeadmin,admin'),
(187, 7, 'replaceSavedCart', 'ps_cart', 'replaceCart', 'Replace cart with saved cart', 'none'),
(188, 7, 'mergeSavedCart', 'ps_cart', 'mergeSaved', 'Merge saved cart with cart', 'none'),
(189, 7, 'deleteSavedCart', 'ps_cart', 'deleteCart', 'Delete saved cart', 'none'),
(190, 7, 'savedCartDelete', 'ps_cart', 'deleteSaved', 'Delete items from saved cart', 'none'),
(191, 7, 'savedCartUpdate', 'ps_cart', 'updateSaved', 'Update saved cart items', 'none'),
(192, 1, 'getupdatepackage', 'update.class', 'getPatchPackage', 'Retrieves the Patch Package from the virtuemart.net Servers.', 'admin'),
(193, 1, 'applypatchpackage', 'update.class', 'applyPatch', 'Applies the Patch using the instructions from the update.xml file in the downloaded patch.', 'admin'),
(194, 1, 'removePatchPackage', 'update.class', 'removePackageFile', 'Removes  a Patch Package File and its extracted contents.', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_manufacturer`
--

CREATE TABLE IF NOT EXISTS `jos_vm_manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `mf_name` varchar(64) DEFAULT NULL,
  `mf_email` varchar(255) DEFAULT NULL,
  `mf_desc` text,
  `mf_category_id` int(11) DEFAULT NULL,
  `mf_url` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Manufacturers are those who create products' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jos_vm_manufacturer`
--

INSERT INTO `jos_vm_manufacturer` (`manufacturer_id`, `mf_name`, `mf_email`, `mf_desc`, `mf_category_id`, `mf_url`) VALUES
(1, 'Manufacturer', 'info@manufacturer.com', 'An example for a manufacturer', 1, 'http://www.a-url.com');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_manufacturer_category`
--

CREATE TABLE IF NOT EXISTS `jos_vm_manufacturer_category` (
  `mf_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `mf_category_name` varchar(64) DEFAULT NULL,
  `mf_category_desc` text,
  PRIMARY KEY (`mf_category_id`),
  KEY `idx_manufacturer_category_category_name` (`mf_category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Manufacturers are assigned to these categories' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jos_vm_manufacturer_category`
--

INSERT INTO `jos_vm_manufacturer_category` (`mf_category_id`, `mf_category_name`, `mf_category_desc`) VALUES
(1, '-default-', 'This is the default manufacturer category');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_module`
--

CREATE TABLE IF NOT EXISTS `jos_vm_module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `module_description` text,
  `module_perms` varchar(255) DEFAULT NULL,
  `module_publish` char(1) DEFAULT NULL,
  `list_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`module_id`),
  KEY `idx_module_name` (`module_name`),
  KEY `idx_module_list_order` (`list_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='VirtueMart Core Modules, not: Joomla modules' AUTO_INCREMENT=12844 ;

--
-- Dumping data for table `jos_vm_module`
--

INSERT INTO `jos_vm_module` (`module_id`, `module_name`, `module_description`, `module_perms`, `module_publish`, `list_order`) VALUES
(1, 'admin', '<h4>ADMINISTRATIVE USERS ONLY</h4>\r\n\r\n<p>Only used for the following:</p>\r\n<OL>\r\n\r\n<LI>User Maintenance</LI>\r\n<LI>Module Maintenance</LI>\r\n<LI>Function Maintenance</LI>\r\n</OL>\r\n', 'admin', 'Y', 1),
(2, 'product', '<p>Here you can adminster your online catalog of products.  The Product Administrator allows you to create product categories, create new products, edit product attributes, and add product items for each attribute value.</p>', 'storeadmin,admin', 'Y', 4),
(3, 'vendor', '<h4>ADMINISTRATIVE USERS ONLY</h4>\r\n<p>Here you can manage the vendors on the phpShop system.</p>', 'admin', 'Y', 6),
(4, 'shopper', '<p>Manage shoppers in your store.  Allows you to create shopper groups.  Shopper groups can be used when setting the price for a product.  This allows you to create different prices for different types of users.  An example of this would be to have a ''wholesale'' group and a ''retail'' group. </p>', 'admin,storeadmin', 'Y', 4),
(5, 'order', '<p>View Order and Update Order Status.</p>', 'admin,storeadmin', 'Y', 5),
(6, 'msgs', 'This module is unprotected an used for displaying system messages to users.  We need to have an area that does not require authorization when things go wrong.', 'none', 'N', 99),
(7, 'shop', 'This is the Washupito store module.  This is the demo store included with the phpShop distribution.', 'none', 'Y', 99),
(8, 'store', '', 'storeadmin,admin', 'Y', 2),
(9, 'account', 'This module allows shoppers to update their account information and view previously placed orders.', 'shopper,storeadmin,admin,demo', 'N', 99),
(10, 'checkout', '', 'none', 'N', 99),
(11, 'tax', 'The tax module allows you to set tax rates for states or regions within a country.  The rate is set as a decimal figure.  For example, 2 percent tax would be 0.02.', 'admin,storeadmin', 'Y', 8),
(12, 'reportbasic', 'The report basic module allows you to do queries on all orders.', 'admin,storeadmin', 'Y', 7),
(13, 'zone', 'This is the zone-shipping module. Here you can manage your shipping costs according to Zones.', 'admin,storeadmin', 'N', 9),
(12839, 'shipping', '<h4>Shipping</h4><p>Let this module calculate the shipping fees for your customers.<br>Create carriers for shipping areas and weight groups.</p>', 'admin,storeadmin', 'Y', 10),
(99, 'manufacturer', 'Manage the manufacturers of products in your store.', 'storeadmin,admin', 'Y', 12),
(12842, 'help', 'Help Module', 'admin,storeadmin', 'Y', 13),
(12843, 'coupon', 'Coupon Management', 'admin,storeadmin', 'Y', 11);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_orders`
--

CREATE TABLE IF NOT EXISTS `jos_vm_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `order_number` varchar(32) DEFAULT NULL,
  `user_info_id` varchar(32) DEFAULT NULL,
  `order_total` decimal(15,5) NOT NULL DEFAULT '0.00000',
  `order_subtotal` decimal(15,5) DEFAULT NULL,
  `order_tax` decimal(10,2) DEFAULT NULL,
  `order_tax_details` text NOT NULL,
  `order_shipping` decimal(10,2) DEFAULT NULL,
  `order_shipping_tax` decimal(10,2) DEFAULT NULL,
  `coupon_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `coupon_code` varchar(32) DEFAULT NULL,
  `order_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `order_currency` varchar(16) DEFAULT NULL,
  `order_status` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `ship_method_id` varchar(255) DEFAULT NULL,
  `customer_note` text NOT NULL,
  `ip_address` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`order_id`),
  KEY `idx_orders_user_id` (`user_id`),
  KEY `idx_orders_vendor_id` (`vendor_id`),
  KEY `idx_orders_order_number` (`order_number`),
  KEY `idx_orders_user_info_id` (`user_info_id`),
  KEY `idx_orders_ship_method_id` (`ship_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Used to store all orders' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_order_history`
--

CREATE TABLE IF NOT EXISTS `jos_vm_order_history` (
  `order_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `order_status_code` char(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_notified` int(1) DEFAULT '0',
  `comments` text,
  PRIMARY KEY (`order_status_history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all actions and changes that occur to an order' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_order_item`
--

CREATE TABLE IF NOT EXISTS `jos_vm_order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `user_info_id` varchar(32) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_item_sku` varchar(64) NOT NULL DEFAULT '',
  `order_item_name` varchar(64) NOT NULL DEFAULT '',
  `product_quantity` int(11) DEFAULT NULL,
  `product_item_price` decimal(15,5) DEFAULT NULL,
  `product_final_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `order_item_currency` varchar(16) DEFAULT NULL,
  `order_status` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `product_attribute` text,
  PRIMARY KEY (`order_item_id`),
  KEY `idx_order_item_order_id` (`order_id`),
  KEY `idx_order_item_user_info_id` (`user_info_id`),
  KEY `idx_order_item_vendor_id` (`vendor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all items (products) which are part of an order' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_order_payment`
--

CREATE TABLE IF NOT EXISTS `jos_vm_order_payment` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `payment_method_id` int(11) DEFAULT NULL,
  `order_payment_code` varchar(30) NOT NULL DEFAULT '',
  `order_payment_number` blob,
  `order_payment_expire` int(11) DEFAULT NULL,
  `order_payment_name` varchar(255) DEFAULT NULL,
  `order_payment_log` text,
  `order_payment_trans_id` text NOT NULL,
  KEY `idx_order_payment_order_id` (`order_id`),
  KEY `idx_order_payment_method_id` (`payment_method_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='The payment method that was chosen for a specific order';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_order_status`
--

CREATE TABLE IF NOT EXISTS `jos_vm_order_status` (
  `order_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_status_code` char(1) NOT NULL DEFAULT '',
  `order_status_name` varchar(64) DEFAULT NULL,
  `order_status_description` text NOT NULL,
  `list_order` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_status_id`),
  KEY `idx_order_status_list_order` (`list_order`),
  KEY `idx_order_status_vendor_id` (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='All available order statuses' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jos_vm_order_status`
--

INSERT INTO `jos_vm_order_status` (`order_status_id`, `order_status_code`, `order_status_name`, `order_status_description`, `list_order`, `vendor_id`) VALUES
(1, 'P', 'Pending', '', 1, 1),
(2, 'C', 'Confirmed', '', 2, 1),
(3, 'X', 'Cancelled', '', 3, 1),
(4, 'R', 'Refunded', '', 4, 1),
(5, 'S', 'Shipped', '', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_order_user_info`
--

CREATE TABLE IF NOT EXISTS `jos_vm_order_user_info` (
  `order_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `address_type` char(2) DEFAULT NULL,
  `address_type_name` varchar(32) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `middle_name` varchar(32) DEFAULT NULL,
  `phone_1` varchar(32) DEFAULT NULL,
  `phone_2` varchar(32) DEFAULT NULL,
  `fax` varchar(32) DEFAULT NULL,
  `address_1` varchar(64) NOT NULL DEFAULT '',
  `address_2` varchar(64) DEFAULT NULL,
  `city` varchar(32) NOT NULL DEFAULT '',
  `state` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(32) NOT NULL DEFAULT 'US',
  `zip` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(255) DEFAULT NULL,
  `extra_field_1` varchar(255) DEFAULT NULL,
  `extra_field_2` varchar(255) DEFAULT NULL,
  `extra_field_3` varchar(255) DEFAULT NULL,
  `extra_field_4` char(1) DEFAULT NULL,
  `extra_field_5` char(1) DEFAULT NULL,
  `bank_account_nr` varchar(32) NOT NULL DEFAULT '',
  `bank_name` varchar(32) NOT NULL DEFAULT '',
  `bank_sort_code` varchar(16) NOT NULL DEFAULT '',
  `bank_iban` varchar(64) NOT NULL DEFAULT '',
  `bank_account_holder` varchar(48) NOT NULL DEFAULT '',
  `bank_account_type` enum('Checking','Business Checking','Savings') NOT NULL DEFAULT 'Checking',
  PRIMARY KEY (`order_info_id`),
  KEY `idx_order_info_order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores the BillTo and ShipTo Information at order time' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_payment_method`
--

CREATE TABLE IF NOT EXISTS `jos_vm_payment_method` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `payment_method_name` varchar(255) DEFAULT NULL,
  `payment_class` varchar(50) NOT NULL DEFAULT '',
  `shopper_group_id` int(11) DEFAULT NULL,
  `payment_method_discount` decimal(12,2) DEFAULT NULL,
  `payment_method_discount_is_percent` tinyint(1) NOT NULL,
  `payment_method_discount_max_amount` decimal(10,2) NOT NULL,
  `payment_method_discount_min_amount` decimal(10,2) NOT NULL,
  `list_order` int(11) DEFAULT NULL,
  `payment_method_code` varchar(8) DEFAULT NULL,
  `enable_processor` char(1) DEFAULT NULL,
  `is_creditcard` tinyint(1) NOT NULL DEFAULT '0',
  `payment_enabled` char(1) NOT NULL DEFAULT 'N',
  `accepted_creditcards` varchar(128) NOT NULL DEFAULT '',
  `payment_extrainfo` text NOT NULL,
  `payment_passkey` blob NOT NULL,
  PRIMARY KEY (`payment_method_id`),
  KEY `idx_payment_method_vendor_id` (`vendor_id`),
  KEY `idx_payment_method_name` (`payment_method_name`),
  KEY `idx_payment_method_list_order` (`list_order`),
  KEY `idx_payment_method_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The payment methods of your store' AUTO_INCREMENT=20 ;

--
-- Dumping data for table `jos_vm_payment_method`
--

INSERT INTO `jos_vm_payment_method` (`payment_method_id`, `vendor_id`, `payment_method_name`, `payment_class`, `shopper_group_id`, `payment_method_discount`, `payment_method_discount_is_percent`, `payment_method_discount_max_amount`, `payment_method_discount_min_amount`, `list_order`, `payment_method_code`, `enable_processor`, `is_creditcard`, `payment_enabled`, `accepted_creditcards`, `payment_extrainfo`, `payment_passkey`) VALUES
(1, 1, 'Purchase Order', '', 6, '0.00', 0, '0.00', '0.00', 4, 'PO', 'N', 0, 'Y', '', '', ''),
(2, 1, 'Cash On Delivery', '', 5, '-2.00', 0, '0.00', '0.00', 5, 'COD', 'N', 0, 'Y', '', '', ''),
(3, 1, 'Credit Card', 'ps_authorize', 5, '0.00', 0, '0.00', '0.00', 0, 'AN', 'Y', 0, 'Y', '1,2,6,7,', '', ''),
(4, 1, 'PayPal (new API)', 'ps_paypal_api', 5, '0.00', 0, '0.00', '0.00', 0, 'PP_API', 'Y', 1, 'Y', '', '', ''),
(5, 1, 'PayMate', 'ps_paymate', 5, '0.00', 0, '0.00', '0.00', 0, 'PM', 'P', 0, 'N', '', '<script type="text/javascript" language="javascript">\n  function openExpress(){\n      var url = ''https://www.paymate.com/PayMate/ExpressPayment?mid=<?php echo PAYMATE_USERNAME.\n          "&amt=".$db->f("order_total").\n   "&currency=".$_SESSION[''vendor_currency''].\n       "&ref=".$db->f("order_id").\n      "&pmt_sender_email=".$user->email.\n         "&pmt_contact_firstname=".$user->first_name.\n       "&pmt_contact_surname=".$user->last_name.\n          "&regindi_address1=".$user->address_1.\n     "&regindi_address2=".$user->address_2.\n     "&regindi_sub=".$user->city.\n       "&regindi_pcode=".$user->zip;?>''\n        var newWin = window.open(url, ''wizard'', ''height=640,width=500,scrollbars=0,toolbar=no'');\n  self.name = ''parent'';\n       newWin.focus();\n  }\n  </script>\n  <div align="center">\n  <p>\n  <a href="javascript:openExpress();">\n  <img src="https://www.paymate.com/homepage/images/butt_PayNow.gif" border="0" alt="Pay with Paymate Express">\n  <br />click here to pay your account</a>\n  </p>\n  </div>', ''),
(6, 1, 'WorldPay', 'ps_worldpay', 5, '0.00', 0, '0.00', '0.00', 0, 'WP', 'P', 0, 'N', '', '<form action="https://select.worldpay.com/wcc/purchase" method="post">\n                                                <input type=hidden name="testMode" value="100"> \n                                                  <input type="hidden" name="instId" value="<?php echo WORLDPAY_INST_ID ?>" />\n                                            <input type="hidden" name="cartId" value="<?php echo $db->f("order_id") ?>" />\n                                               <input type="hidden" name="amount" value="<?php echo $db->f("order_total") ?>" />\n                                            <input type="hidden" name="currency" value="<?php echo $_SESSION[''vendor_currency''] ?>" />\n                                           <input type="hidden" name="desc" value="Products" />\n                                            <input type="hidden" name="email" value="<?php echo $user->email?>" />\n                                                 <input type="hidden" name="address" value="<?php echo $user->address_1?>&#10<?php echo $user->address_2?>&#10<?php echo\n                                                $user->city?>&#10<?php echo $user->state?>" />\n                                             <input type="hidden" name="name" value="<?php echo $user->title?><?php echo $user->first_name?>. <?php echo $user->middle_name?><?php echo $user->last_name?>" />\n                                           <input type="hidden" name="country" value="<?php echo $user->country?>"/>\n                                              <input type="hidden" name="postcode" value="<?php echo $user->zip?>" />\n                                                <input type="hidden" name="tel"  value="<?php echo $user->phone_1?>">\n                                                  <input type="hidden" name="withDelivery"  value="true">\n                                                 <br />\n                                                <input type="submit" value ="PROCEED TO PAYMENT PAGE" />\n                                                  </form>', ''),
(7, 1, '2Checkout', 'ps_twocheckout', 5, '0.00', 0, '0.00', '0.00', 0, '2CO', 'P', 0, 'N', '', '<?php\n      $q  = "SELECT * FROM #__users WHERE user_info_id=''".$db->f("user_info_id")."''"; \n    $dbbt = new ps_DB;\n   $dbbt->setQuery($q);\n        $dbbt->query();\n      $dbbt->next_record(); \n       // Get ship_to information\n    if( $db->f("user_info_id") != $dbbt->f("user_info_id")) {\n         $q2  = "SELECT * FROM #__vm_user_info WHERE user_info_id=''".$db->f("user_info_id")."''"; \n    $dbst = new ps_DB;\n   $dbst->setQuery($q2);\n       $dbst->query();\n      $dbst->next_record();\n      }\n     else  {\n         $dbst = $dbbt;\n    }\n                     \n      //Authnet vars to send\n        $formdata = array (\n   ''x_login'' => TWOCO_LOGIN,\n   ''x_email_merchant'' => ((TWOCO_MERCHANT_EMAIL == ''True'') ? ''TRUE'' : ''FALSE''),\n                  \n      // Customer Name and Billing Address\n  ''x_first_name'' => $dbbt->f("first_name"),\n        ''x_last_name'' => $dbbt->f("last_name"),\n  ''x_company'' => $dbbt->f("company"),\n      ''x_address'' => $dbbt->f("address_1"),\n    ''x_city'' => $dbbt->f("city"),\n    ''x_state'' => $dbbt->f("state"),\n  ''x_zip'' => $dbbt->f("zip"),\n      ''x_country'' => $dbbt->f("country"),\n      ''x_phone'' => $dbbt->f("phone_1"),\n        ''x_fax'' => $dbbt->f("fax"),\n      ''x_email'' => $dbbt->f("email"),\n \n       // Customer Shipping Address\n  ''x_ship_to_first_name'' => $dbst->f("first_name"),\n        ''x_ship_to_last_name'' => $dbst->f("last_name"),\n  ''x_ship_to_company'' => $dbst->f("company"),\n      ''x_ship_to_address'' => $dbst->f("address_1"),\n    ''x_ship_to_city'' => $dbst->f("city"),\n    ''x_ship_to_state'' => $dbst->f("state"),\n  ''x_ship_to_zip'' => $dbst->f("zip"),\n      ''x_ship_to_country'' => $dbst->f("country"),\n     \n       ''x_invoice_num'' => $db->f("order_number"),\n       ''x_receipt_link_url'' => SECUREURL."2checkout_notify.php"\n  );\n    \n     if( TWOCO_TESTMODE == "Y" )\n   $formdata[''demo''] = "Y";\n       \n       $version = "2";\n    $url = "https://www2.2checkout.com/2co/buyer/purchase";\n    $formdata[''x_amount''] = number_format($db->f("order_total"), 2, ''.'', '''');\n \n       //build the post string\n       $poststring = '''';\n  foreach($formdata AS $key => $val){\n          $poststring .= "<input type=''hidden'' name=''$key'' value=''$val'' />\n ";\n    }\n    \n      ?>\n    <form action="<?php echo $url ?>" method="post" target="_blank">\n       <?php echo $poststring ?>\n    <p>Click on the Image below to pay...</p>\n     <input type="image" name="submit" src="https://www.2checkout.com/images/buy_logo.gif" border="0" alt="Make payments with 2Checkout, it''s fast and secure!" title="Pay your Order with 2Checkout, it''s fast and secure!" />\n      </form>', ''),
(8, 1, 'NoChex', 'ps_nochex', 5, '0.00', 0, '0.00', '0.00', 0, 'NOCHEX', 'P', 0, 'N', '', '<form action="https://www.nochex.com/nochex.dll/checkout" method="post" target="_blank"> \n                                                                                     <input type="hidden" name="email" value="<?php echo NOCHEX_EMAIL ?>" />\n                                                                                 <input type="hidden" name="amount" value="<?php printf("%.2f", $db->f("order_total"))?>" />\n                                                                                        <input type="hidden" name="ordernumber" value="<?php $db->p("order_id") ?>" />\n                                                                                       <input type="hidden" name="logo" value="<?php echo $vendor_image_url ?>" />\n                                                                                    <input type="hidden" name="returnurl" value="<?php echo SECUREURL ."index.php?option=com_virtuemart&amp;page=checkout.result&amp;order_id=".$db->f("order_id") ?>" />\n                                                                                      <input type="image" name="submit" src="http://www.nochex.com/web/images/paymeanimated.gif"> \n                                                                                    </form>', ''),
(9, 1, 'Credit Card (PayMeNow)', 'ps_paymenow', 5, '0.00', 0, '0.00', '0.00', 0, 'PN', 'Y', 0, 'N', '1,2,3,', '', ''),
(10, 1, 'eWay', 'ps_eway', 5, '0.00', 0, '0.00', '0.00', 0, 'EWAY', 'Y', 0, 'N', '', '', ''),
(11, 1, 'eCheck.net', 'ps_echeck', 5, '0.00', 0, '0.00', '0.00', 0, 'ECK', 'B', 0, 'N', '', '', ''),
(12, 1, 'Credit Card (eProcessingNetwork)', 'ps_epn', 5, '0.00', 0, '0.00', '0.00', 0, 'EPN', 'Y', 0, 'N', '1,2,3,', '', ''),
(13, 1, 'iKobo', '', 5, '0.00', 0, '0.00', '0.00', 0, 'IK', 'P', 0, 'N', '', '<form action="https://www.iKobo.com/store/index.php" method="post"> \n  <input type="hidden" name="cmd" value="cart" />Click on the image below to Pay with iKobo\n  <input type="image" src="https://www.ikobo.com/merchant/buttons/ikobo_pay1.gif" name="submit" alt="Pay with iKobo" /> \n  <input type="hidden" name="poid" value="USER_ID" /> \n  <input type="hidden" name="item" value="Order: <?php $db->p("order_id") ?>" /> \n  <input type="hidden" name="price" value="<?php printf("%.2f", $db->f("order_total"))?>" /> \n  <input type="hidden" name="firstname" value="<?php echo $user->first_name?>" /> \n  <input type="hidden" name="lastname" value="<?php echo $user->last_name?>" /> \n  <input type="hidden" name="address" value="<?php echo $user->address_1?>&#10<?php echo $user->address_2?>" /> \n  <input type="hidden" name="city" value="<?php echo $user->city?>" /> \n  <input type="hidden" name="state" value="<?php echo $user->state?>" /> \n  <input type="hidden" name="zip" value="<?php echo $user->zip?>" /> \n  <input type="hidden" name="phone" value="<?php echo $user->phone_1?>" /> \n  <input type="hidden" name="email" value="<?php echo $user->email?>" /> \n  </form> >', ''),
(14, 1, 'iTransact', '', 5, '0.00', 0, '0.00', '0.00', 0, 'ITR', 'P', 0, 'N', '', '<?php\n  //your iTransact account details\n  $vendorID = "XXXXX";\n  global $vendor_name;\n  $mername = $vendor_name;\n  \n  //order details\n  $total = $db->f("order_total");$first_name = $user->first_name;$last_name = $user->last_name;$address = $user->address_1;$city = $user->city;$state = $user->state;$zip = $user->zip;$country = $user->country;$email = $user->email;$phone = $user->phone_1;$home_page = $mosConfig_live_site."/index.php";$ret_addr = $mosConfig_live_site."/index.php";$cc_payment_image = $mosConfig_live_site."/components/com_virtuemart/shop_image/ps_image/cc_payment.jpg";\n  ?>\n  <form action="https://secure.paymentclearing.com/cgi-bin/mas/split.cgi" method="POST"> \n                <input type="hidden" name="vendor_id" value="<?php echo $vendorID; ?>" />\n              <input type="hidden" name="home_page" value="<?php echo $home_page; ?>" />\n             <input type="hidden" name="ret_addr" value="<?php echo $ret_addr; ?>" />\n               <input type="hidden" name="mername" value="<?php echo $mername; ?>" />\n         <!--Enter text in the next value that should appear on the bottom of the order form.-->\n               <INPUT type="hidden" name="mertext" value="" />\n         <!--If you are accepting checks, enter the number 1 in the next value.  Enter the number 0 if you are not accepting checks.-->\n                <INPUT type="hidden" name="acceptchecks" value="0" />\n           <!--Enter the number 1 in the next value if you want to allow pre-registered customers to pay with a check.  Enter the number 0 if not.-->\n            <INPUT type="hidden" name="allowreg" value="0" />\n               <!--If you are set up with Check Guarantee, enter the number 1 in the next value.  Enter the number 0 if not.-->\n              <INPUT type="hidden" name="checkguar" value="0" />\n              <!--Enter the number 1 in the next value if you are accepting credit card payments.  Enter the number zero if not.-->\n         <INPUT type="hidden" name="acceptcards" value="1">\n              <!--Enter the number 1 in the next value if you want to allow a separate mailing address for credit card orders.  Enter the number 0 if not.-->\n               <INPUT type="hidden" name="altaddr" value="0" />\n                <!--Enter the number 1 in the next value if you want the customer to enter the CVV number for card orders.  Enter the number 0 if not.-->\n             <INPUT type="hidden" name="showcvv" value="1" />\n                \n              <input type="hidden" name="1-desc" value="Order Total" />\n               <input type="hidden" name="1-cost" value="<?php echo $total; ?>" />\n            <input type="hidden" name="1-qty" value="1" />\n          <input type="hidden" name="total" value="<?php echo $total; ?>" />\n             <input type="hidden" name="first_name" value="<?php echo $first_name; ?>" />\n           <input type="hidden" name="last_name" value="<?php echo $last_name; ?>" />\n             <input type="hidden" name="address" value="<?php echo $address; ?>" />\n         <input type="hidden" name="city" value="<?php echo $city; ?>" />\n               <input type="hidden" name="state" value="<?php echo $state; ?>" />\n             <input type="hidden" name="zip" value="<?php echo $zip; ?>" />\n         <input type="hidden" name="country" value="<?php echo $country; ?>" />\n         <input type="hidden" name="phone" value="<?php echo $phone; ?>" />\n             <input type="hidden" name="email" value="<?php echo $email; ?>" />\n             <p><input type="image" alt="Process Secure Credit Card Transaction using iTransact" border="0" height="60" width="210" src="<?php echo $cc_payment_image; ?>" /> </p>\n            </form>', ''),
(15, 1, 'Verisign PayFlow Pro', 'payflow_pro', 5, '0.00', 0, '0.00', '0.00', 0, 'PFP', 'Y', 0, 'Y', '1,2,6,7,', '', ''),
(16, 1, 'Dankort/PBS via ePay', 'ps_epay', 5, '0.00', 0, '0.00', '0.00', 0, 'EPAY', 'P', 0, 'Y', '', '<?php\r\nrequire_once(CLASSPATH ."payment/ps_epay.cfg.php");\r\n$url=basename($mosConfig_live_site);\r\nfunction get_iso_code($code) {\r\nswitch ($code) {\r\ncase "ADP": return "020"; break;\r\ncase "AED": return "784"; break;\r\ncase "AFA": return "004"; break;\r\ncase "ALL": return "008"; break;\r\ncase "AMD": return "051"; break;\r\ncase "ANG": return "532"; break;\r\ncase "AOA": return "973"; break;\r\ncase "ARS": return "032"; break;\r\ncase "AUD": return "036"; break;\r\ncase "AWG": return "533"; break;\r\ncase "AZM": return "031"; break;\r\ncase "BAM": return "977"; break;\r\ncase "BBD": return "052"; break;\r\ncase "BDT": return "050"; break;\r\ncase "BGL": return "100"; break;\r\ncase "BGN": return "975"; break;\r\ncase "BHD": return "048"; break;\r\ncase "BIF": return "108"; break;\r\ncase "BMD": return "060"; break;\r\ncase "BND": return "096"; break;\r\ncase "BOB": return "068"; break;\r\ncase "BOV": return "984"; break;\r\ncase "BRL": return "986"; break;\r\ncase "BSD": return "044"; break;\r\ncase "BTN": return "064"; break;\r\ncase "BWP": return "072"; break;\r\ncase "BYR": return "974"; break;\r\ncase "BZD": return "084"; break;\r\ncase "CAD": return "124"; break;\r\ncase "CDF": return "976"; break;\r\ncase "CHF": return "756"; break;\r\ncase "CLF": return "990"; break;\r\ncase "CLP": return "152"; break;\r\ncase "CNY": return "156"; break;\r\ncase "COP": return "170"; break;\r\ncase "CRC": return "188"; break;\r\ncase "CUP": return "192"; break;\r\ncase "CVE": return "132"; break;\r\ncase "CYP": return "196"; break;\r\ncase "CZK": return "203"; break;\r\ncase "DJF": return "262"; break;\r\ncase "DKK": return "208"; break;\r\ncase "DOP": return "214"; break;\r\ncase "DZD": return "012"; break;\r\ncase "ECS": return "218"; break;\r\ncase "ECV": return "983"; break;\r\ncase "EEK": return "233"; break;\r\ncase "EGP": return "818"; break;\r\ncase "ERN": return "232"; break;\r\ncase "ETB": return "230"; break;\r\ncase "EUR": return "978"; break;\r\ncase "FJD": return "242"; break;\r\ncase "FKP": return "238"; break;\r\ncase "GBP": return "826"; break;\r\ncase "GEL": return "981"; break;\r\ncase "GHC": return "288"; break;\r\ncase "GIP": return "292"; break;\r\ncase "GMD": return "270"; break;\r\ncase "GNF": return "324"; break;\r\ncase "GTQ": return "320"; break;\r\ncase "GWP": return "624"; break;\r\ncase "GYD": return "328"; break;\r\ncase "HKD": return "344"; break;\r\ncase "HNL": return "340"; break;\r\ncase "HRK": return "191"; break;\r\ncase "HTG": return "332"; break;\r\ncase "HUF": return "348"; break;\r\ncase "IDR": return "360"; break;\r\ncase "ILS": return "376"; break;\r\ncase "INR": return "356"; break;\r\ncase "IQD": return "368"; break;\r\ncase "IRR": return "364"; break;\r\ncase "ISK": return "352"; break;\r\ncase "JMD": return "388"; break;\r\ncase "JOD": return "400"; break;\r\ncase "JPY": return "392"; break;\r\ncase "KES": return "404"; break;\r\ncase "KGS": return "417"; break;\r\ncase "KHR": return "116"; break;\r\ncase "KMF": return "174"; break;\r\ncase "KPW": return "408"; break;\r\ncase "KRW": return "410"; break;\r\ncase "KWD": return "414"; break;\r\ncase "KYD": return "136"; break;\r\ncase "KZT": return "398"; break;\r\ncase "LAK": return "418"; break;\r\ncase "LBP": return "422"; break;\r\ncase "LKR": return "144"; break;\r\ncase "LRD": return "430"; break;\r\ncase "LSL": return "426"; break;\r\ncase "LTL": return "440"; break;\r\ncase "LVL": return "428"; break;\r\ncase "LYD": return "434"; break;\r\ncase "MAD": return "504"; break;\r\ncase "MDL": return "498"; break;\r\ncase "MGF": return "450"; break;\r\ncase "MKD": return "807"; break;\r\ncase "MMK": return "104"; break;\r\ncase "MNT": return "496"; break;\r\ncase "MOP": return "446"; break;\r\ncase "MRO": return "478"; break;\r\ncase "MTL": return "470"; break;\r\ncase "MUR": return "480"; break;\r\ncase "MVR": return "462"; break;\r\ncase "MWK": return "454"; break;\r\ncase "MXN": return "484"; break;\r\ncase "MXV": return "979"; break;\r\ncase "MYR": return "458"; break;\r\ncase "MZM": return "508"; break;\r\ncase "NAD": return "516"; break;\r\ncase "NGN": return "566"; break;\r\ncase "NIO": return "558"; break;\r\ncase "NOK": return "578"; break;\r\ncase "NPR": return "524"; break;\r\ncase "NZD": return "554"; break;\r\ncase "OMR": return "512"; break;\r\ncase "PAB": return "590"; break;\r\ncase "PEN": return "604"; break;\r\ncase "PGK": return "598"; break;\r\ncase "PHP": return "608"; break;\r\ncase "PKR": return "586"; break;\r\ncase "PLN": return "985"; break;\r\ncase "PYG": return "600"; break;\r\ncase "QAR": return "634"; break;\r\ncase "ROL": return "642"; break;\r\ncase "RUB": return "643"; break;\r\ncase "RUR": return "810"; break;\r\ncase "RWF": return "646"; break;\r\ncase "SAR": return "682"; break;\r\ncase "SBD": return "090"; break;\r\ncase "SCR": return "690"; break;\r\ncase "SDD": return "736"; break;\r\ncase "SEK": return "752"; break;\r\ncase "SGD": return "702"; break;\r\ncase "SHP": return "654"; break;\r\ncase "SIT": return "705"; break;\r\ncase "SKK": return "703"; break;\r\ncase "SLL": return "694"; break;\r\ncase "SOS": return "706"; break;\r\ncase "SRG": return "740"; break;\r\ncase "STD": return "678"; break;\r\ncase "SVC": return "222"; break;\r\ncase "SYP": return "760"; break;\r\ncase "SZL": return "748"; break;\r\ncase "THB": return "764"; break;\r\ncase "TJS": return "972"; break;\r\ncase "TMM": return "795"; break;\r\ncase "TND": return "788"; break;\r\ncase "TOP": return "776"; break;\r\ncase "TPE": return "626"; break;\r\ncase "TRL": return "792"; break;\r\ncase "TRY": return "949"; break;\r\ncase "TTD": return "780"; break;\r\ncase "TWD": return "901"; break;\r\ncase "TZS": return "834"; break;\r\ncase "UAH": return "980"; break;\r\ncase "UGX": return "800"; break;\r\ncase "USD": return "840"; break;\r\ncase "UYU": return "858"; break;\r\ncase "UZS": return "860"; break;\r\ncase "VEB": return "862"; break;\r\ncase "VND": return "704"; break;\r\ncase "VUV": return "548"; break;\r\ncase "XAF": return "950"; break;\r\ncase "XCD": return "951"; break;\r\ncase "XOF": return "952"; break;\r\ncase "XPF": return "953"; break;\r\ncase "YER": return "886"; break;\r\ncase "YUM": return "891"; break;\r\ncase "ZAR": return "710"; break;\r\ncase "ZMK": return "894"; break;\r\ncase "ZWD": return "716"; break;\r\n}\r\nreturn "XXX"; // return invalid code if the currency is not found \r\n}\r\n\r\nfunction calculateePayCurrency($order_id)\r\n{\r\n$db = new ps_DB;\r\n$currency_code = "208";\r\n$q = "SELECT order_currency FROM #__vm_orders where order_id = " . $order_id;\r\n$db->query($q);\r\nif ($db->next_record()) {\r\n	$currency_code = get_iso_code($db->f("order_currency"));\r\n}\r\nreturn $currency_code;\r\n}\r\n echo $VM_LANG->_(''VM_CHECKOUT_EPAY_PAYMENT_CHECKOUT_HEADER'');\r\n?>\r\n<script type="text/javascript" src="http://www.epay.dk/js/standardwindow.js"></script>\r\n<script type="text/javascript">\r\nfunction printCard(cardId)\r\n{\r\ndocument.write ("<table border=0 cellspacing=10 cellpadding=10>");\r\nswitch (cardId) {\r\ncase 1: document.write ("<input type=hidden name=cardtype value=1>"); break;\r\ncase 2: document.write ("<input type=hidden name=cardtype value=2>"); break;\r\ncase 3: document.write ("<input type=hidden name=cardtype value=3>"); break;\r\ncase 4: document.write ("<input type=hidden name=cardtype value=4>"); break;\r\ncase 5: document.write ("<input type=hidden name=cardtype value=5>"); break;\r\ncase 6: document.write ("<input type=hidden name=cardtype value=6>"); break;\r\ncase 7: document.write ("<input type=hidden name=cardtype value=7>"); break;\r\ncase 8: document.write ("<input type=hidden name=cardtype value=8>"); break;\r\ncase 9: document.write ("<input type=hidden name=cardtype value=9>"); break;\r\ncase 10: document.write ("<input type=hidden name=cardtype value=10>"); break;\r\ncase 12: document.write ("<input type=hidden name=cardtype value=12>"); break;\r\ncase 13: document.write ("<input type=hidden name=cardtype value=13>"); break;\r\ncase 14: document.write ("<input type=hidden name=cardtype value=14>"); break;\r\ncase 15: document.write ("<input type=hidden name=cardtype value=15>"); break;\r\ncase 16: document.write ("<input type=hidden name=cardtype value=16>"); break;\r\ncase 17: document.write ("<input type=hidden name=cardtype value=17>"); break;\r\ncase 18: document.write ("<input type=hidden name=cardtype value=18>"); break;\r\ncase 19: document.write ("<input type=hidden name=cardtype value=19>"); break;\r\ncase 21: document.write ("<input type=hidden name=cardtype value=21>"); break;\r\ncase 22: document.write ("<input type=hidden name=cardtype value=22>"); break;\r\n}\r\ndocument.write ("</table>");\r\n}\r\n</script>\r\n<form action="https://ssl.ditonlinebetalingssystem.dk/popup/default.asp" method="post" name="ePay" target="ePay_window" id="ePay">\r\n<input type="hidden" name="merchantnumber" value="<?php echo EPAY_MERCHANTNUMBER ?>">\r\n<input type="hidden" name="amount" value="<?php echo round($db->f("order_total")*100, 2 ) ?>">\r\n<input type="hidden" name="currency" value="<?php echo calculateePayCurrency($order_id)?>">\r\n<input type="hidden" name="orderid" value="<?php echo $order_id ?>">\r\n<input type="hidden" name="ordretext" value="">\r\n<?php \r\nif (EPAY_CALLBACK == "1")\r\n{\r\n	echo ''<input type="hidden" name="callbackurl" value="'' . $mosConfig_live_site . ''/index.php?page=checkout.epay_result&accept=1&sessionid='' . $sessionid . ''&option=com_virtuemart&Itemid=1">'';\r\n}\r\n?>\r\n<input type="hidden" name="accepturl" value="<?php echo $mosConfig_live_site ?>/index.php?page=checkout.epay_result&accept=1&sessionid=<?php echo $sessionid ?>&option=com_virtuemart&Itemid=1">\r\n<input type="hidden" name="declineurl" value="<?php echo $mosConfig_live_site ?>/index.php?page=checkout.epay_result&accept=0&sessionid=<?php echo $sessionid ?>&option=com_virtuemart&Itemid=1">\r\n<input type="hidden" name="group" value="<?php echo EPAY_GROUP ?>">\r\n<input type="hidden" name="instant" value="<?php echo EPAY_INSTANT_CAPTURE ?>">\r\n<input type="hidden" name="language" value="<?php echo EPAY_LANGUAGE ?>">\r\n<input type="hidden" name="authsms" value="<?php echo EPAY_AUTH_SMS ?>">\r\n<input type="hidden" name="authmail" value="<?php echo EPAY_AUTH_MAIL . (strlen(EPAY_AUTH_MAIL) > 0 && EPAY_AUTHEMAILCUSTOMER == 1 ? ";" : "") . (EPAY_AUTHEMAILCUSTOMER == 1 ? $user->user_email : ""); ?>">\r\n<input type="hidden" name="windowstate" value="<?php echo EPAY_WINDOW_STATE ?>">\r\n<input type="hidden" name="use3D" value="<?php echo EPAY_3DSECURE ?>">\r\n<input type="hidden" name="addfee" value="<?php echo EPAY_ADDFEE ?>">\r\n<input type="hidden" name="subscription" value="<?php echo EPAY_SUBSCRIPTION ?>">\r\n<input type="hidden" name="MD5Key" value="<?php if (EPAY_MD5_TYPE == 2) echo md5( calculateePayCurrency($order_id) . round($db->f("order_total")*100, 2 ) . $order_id  . EPAY_MD5_KEY)?>">\r\n<?php\r\nif (EPAY_CARDTYPES_1 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(1)</script>";\r\nif (EPAY_CARDTYPES_2 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(2)</script>";\r\nif (EPAY_CARDTYPES_3 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(3)</script>";\r\nif (EPAY_CARDTYPES_4 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(4)</script>";\r\nif (EPAY_CARDTYPES_5 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(5)</script>";\r\nif (EPAY_CARDTYPES_6 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(6)</script>";\r\nif (EPAY_CARDTYPES_7 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(7)</script>";\r\nif (EPAY_CARDTYPES_8 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(8)</script>";\r\nif (EPAY_CARDTYPES_9 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(9)</script>";\r\nif (EPAY_CARDTYPES_10 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(10)</script>";\r\nif (EPAY_CARDTYPES_11 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(11)</script>";\r\nif (EPAY_CARDTYPES_12 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(12)</script>";\r\nif (EPAY_CARDTYPES_14 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(14)</script>";\r\nif (EPAY_CARDTYPES_15 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(15)</script>";\r\nif (EPAY_CARDTYPES_16 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(16)</script>";\r\nif (EPAY_CARDTYPES_17 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(17)</script>";\r\nif (EPAY_CARDTYPES_18 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(18)</script>";\r\nif (EPAY_CARDTYPES_19 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(19)</script>";\r\nif (EPAY_CARDTYPES_21 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(21)</script>";\r\nif (EPAY_CARDTYPES_22 == "1" && EPAY_CARDTYPES_0 != "1") echo "<script>printCard(22)</script>";;\r\n?>\r\n</form>\r\n<script>open_ePay_window();</script>\r\n<br>\r\n<table border="0" width="100%"><tr><td><input type="button" onClick="open_ePay_window()" value="<?php echo $VM_LANG->_(''VM_CHECKOUT_EPAY_BUTTON_OPEN_WINDOW'') ?>"></td><td width="100%" id="flashLoader"></td></tr></table><br><br><br>\r\n<?php echo $VM_LANG->_(''VM_CHECKOUT_EPAY_PAYMENT_CHECKOUT_FOOTER'') ?>\r\n<br><br>\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/epay_logo.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/mastercard_securecode.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/pci.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/verisign_secure.gif" border="0">&nbsp;&nbsp;&nbsp;\r\n<img src="components/com_virtuemart/shop_image/ps_image/epay_images/visa_secure.gif" border="0">&nbsp;&nbsp;&nbsp;;', ''),
(17, 1, 'PaySbuy', 'ps_paysbuy', 5, '0.00', 0, '0.00', '0.00', 0, 'PSB', 'P', 0, 'N', '', '', ''),
(18, 1, 'PayPal (Legacy)', 'ps_paypal', 5, '0.00', 0, '0.00', '0.00', 0, 'PP', 'P', 0, 'Y', '', '<?php\r\n$db1 = new ps_DB();\r\n$q = "SELECT country_2_code FROM #__vm_country WHERE country_3_code=''".$user->country."'' ORDER BY country_2_code ASC";\r\n$db1->query($q);\r\n\r\n$url = "https://www.paypal.com/cgi-bin/webscr";\r\n$tax_total = $db->f("order_tax") + $db->f("order_shipping_tax");\r\n$discount_total = $db->f("coupon_discount") + $db->f("order_discount");\r\n$post_variables = Array(\r\n"cmd" => "_ext-enter",\r\n"redirect_cmd" => "_xclick",\r\n"upload" => "1",\r\n"business" => PAYPAL_EMAIL,\r\n"receiver_email" => PAYPAL_EMAIL,\r\n"item_name" => $VM_LANG->_(''PHPSHOP_ORDER_PRINT_PO_NUMBER'').": ". $db->f("order_id"),\r\n"order_id" => $db->f("order_id"),\r\n"invoice" => $db->f("order_number"),\r\n"amount" => round( $db->f("order_total")-$db->f("order_shipping"), 2),\r\n"shipping" => sprintf("%.2f", $db->f("order_shipping")),\r\n"currency_code" => $_SESSION[''vendor_currency''],\r\n\r\n"address_override" => "1",\r\n"first_name" => $dbbt->f(''first_name''),\r\n"last_name" => $dbbt->f(''last_name''),\r\n"address1" => $dbbt->f(''address_1''),\r\n"address2" => $dbbt->f(''address_2''),\r\n"zip" => $dbbt->f(''zip''),\r\n"city" => $dbbt->f(''city''),\r\n"state" => $dbbt->f(''state''),\r\n"country" => $db1->f(''country_2_code''),\r\n"email" => $dbbt->f(''user_email''),\r\n"night_phone_b" => $dbbt->f(''phone_1''),\r\n"cpp_header_image" => $vendor_image_url,\r\n\r\n"return" => SECUREURL ."index.php?option=com_virtuemart&page=checkout.result&order_id=".$db->f("order_id"),\r\n"notify_url" => SECUREURL ."administrator/components/com_virtuemart/notify.php",\r\n"cancel_return" => SECUREURL ."index.php",\r\n"undefined_quantity" => "0",\r\n\r\n"test_ipn" => PAYPAL_DEBUG,\r\n"pal" => "NRUBJXESJTY24",\r\n"no_shipping" => "1",\r\n"no_note" => "1"\r\n);\r\nif( $page == "checkout.thankyou" ) {\r\n$query_string = "?";\r\nforeach( $post_variables as $name => $value ) {\r\n$query_string .= $name. "=" . urlencode($value) ."&";\r\n}\r\nvmRedirect( $url . $query_string );\r\n} else {\r\necho ''<form action="''.$url.''" method="post" target="_blank">'';\r\necho ''<input type="image" name="submit" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" alt="Click to pay with PayPal - it is fast, free and secure!" />'';\r\n\r\nforeach( $post_variables as $name => $value ) {\r\necho ''<input type="hidden" name="''.$name.''" value="''.htmlspecialchars($value).''" />'';\r\n}\r\necho ''</form>'';\r\n\r\n}\r\n?>', ''),
(19, 1, 'MerchantWarrior', 'ps_merchantwarrior', 5, '0.00', 0, '0.00', '0.00', 1, 'MW', 'Y', 1, 'Y', '1,2,3,5,7,', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `product_parent_id` int(11) NOT NULL DEFAULT '0',
  `product_sku` varchar(64) NOT NULL DEFAULT '',
  `product_s_desc` varchar(255) DEFAULT NULL,
  `product_desc` text,
  `product_thumb_image` varchar(255) DEFAULT NULL,
  `product_full_image` varchar(255) DEFAULT NULL,
  `product_publish` char(1) DEFAULT NULL,
  `product_weight` decimal(10,4) DEFAULT NULL,
  `product_weight_uom` varchar(32) DEFAULT 'pounds.',
  `product_length` decimal(10,4) DEFAULT NULL,
  `product_width` decimal(10,4) DEFAULT NULL,
  `product_height` decimal(10,4) DEFAULT NULL,
  `product_lwh_uom` varchar(32) DEFAULT 'inches',
  `product_url` varchar(255) DEFAULT NULL,
  `product_in_stock` int(11) NOT NULL DEFAULT '0',
  `product_available_date` int(11) DEFAULT NULL,
  `product_availability` varchar(56) NOT NULL DEFAULT '',
  `product_special` char(1) DEFAULT NULL,
  `product_discount_id` int(11) DEFAULT NULL,
  `ship_code_id` int(11) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `product_name` varchar(64) DEFAULT NULL,
  `product_sales` int(11) NOT NULL DEFAULT '0',
  `attribute` text,
  `custom_attribute` text NOT NULL,
  `product_tax_id` int(11) DEFAULT NULL,
  `product_unit` varchar(32) DEFAULT NULL,
  `product_packaging` int(11) DEFAULT NULL,
  `child_options` varchar(45) DEFAULT NULL,
  `quantity_options` varchar(45) DEFAULT NULL,
  `child_option_ids` varchar(45) DEFAULT NULL,
  `product_order_levels` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `idx_product_vendor_id` (`vendor_id`),
  KEY `idx_product_product_parent_id` (`product_parent_id`),
  KEY `idx_product_sku` (`product_sku`),
  KEY `idx_product_ship_code_id` (`ship_code_id`),
  KEY `idx_product_name` (`product_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='All products are stored here.' AUTO_INCREMENT=297 ;

--
-- Dumping data for table `jos_vm_product`
--

INSERT INTO `jos_vm_product` (`product_id`, `vendor_id`, `product_parent_id`, `product_sku`, `product_s_desc`, `product_desc`, `product_thumb_image`, `product_full_image`, `product_publish`, `product_weight`, `product_weight_uom`, `product_length`, `product_width`, `product_height`, `product_lwh_uom`, `product_url`, `product_in_stock`, `product_available_date`, `product_availability`, `product_special`, `product_discount_id`, `ship_code_id`, `cdate`, `mdate`, `product_name`, `product_sales`, `attribute`, `custom_attribute`, `product_tax_id`, `product_unit`, `product_packaging`, `child_options`, `quantity_options`, `child_option_ids`, `product_order_levels`) VALUES
(70, 1, 0, 'KW Trio 50SA', 'Bấm Kim KW Trio 50SA...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Bấm Kim <strong> KW Trio 50LA</strong></p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm:120</p>\r\n<p>Đặc điểm khác: Đinh ghim</p>\r\n</div>', 'resized/B___m_Kim_KW_Tri_4e7ac3153c887_90x90.gif', 'B___m_Kim_KW_Tri_4e7ac3154a807.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316668181, 1316668181, 'Bấm Kim KW Trio 50SA', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(66, 1, 0, 'MF03117', 'Bấm Kim MF03117...', '<p>Bấm Kim MF03117</p>\r\n<p>Loại : Bấm kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm : 12</p>\r\n<p>Đặc điểm khác: Đinh ghim 10</p>', 'resized/B___m_Kim_MF0311_4e7ac14ec25a7_90x90.jpg', 'B___m_Kim_MF0311_4e7ac14ec7c31.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316667726, 1316667726, 'Bấm Kim MF03117', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(67, 1, 0, 'MF913022', 'Bấm Kim MF913022...', '<p>Bấm Kim MF913022</p>\r\n<p>Loại : Bấm kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm: 210 tờ</p>\r\n<p>Đặc điểm khách: Đinh ghim 23/6-23/25</p>', 'resized/B___m_Kim_MF9130_4e7ac1be566af_90x90.jpg', 'B___m_Kim_MF9130_4e7ac1be60c88.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316667838, 1316667838, 'Bấm Kim MF913022', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(68, 1, 0, 'SW8514', 'Bấm Kim SW8514...', '<p>Bấm Kim SW8514</p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm:20</p>\r\n<p>Đặc điểm khác: Đinh ghim 4/6; 26/6</p>', 'resized/B___m_Kim_SW8514_4e7ac23fb9fc7_90x90.jpg', 'B___m_Kim_SW8514_4e7ac23fc0d94.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316667967, 1316667967, 'Bấm Kim SW8514', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(69, 1, 0, 'KW Trio 50LA', 'Bấm Kim KW Trio 50LA...', '<p>Bấm Kim <strong> KW Trio 50LA</strong></p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm:120</p>\r\n<p>Đặc điểm khác: Đinh ghim</p>', 'resized/B___m_Kim_KW_Tri_4e7ac2c7d1c20_90x90.gif', 'B___m_Kim_KW_Tri_4e7ac2c7e8aed.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316668103, 1316668103, 'Bấm Kim KW Trio 50LA', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(65, 1, 0, 'SW8147', 'Bấm Kim SW8147 ...', '<p>Bấm Kim SW8147</p>\r\n<p>Loại : Bấm Kim</p>\r\n<p>Xuất Xứ:Đang cập nhật</p>\r\n<p>Số tờ bấm : 240 tờ</p>\r\n<p>Đặc điểm khác: Đinh ghim 23/6; 23/25</p>', 'resized/B___m_Kim_SW8147_4e7ac0039a9f6_90x90.jpg', 'B___m_Kim_SW8147_4e7ac003a2553.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316667395, 1316667395, 'Bấm Kim SW8147', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(61, 1, 0, 'KW Trio 9060', 'Bấm Lỗ KW Trio 9060...', '<p>Bấm Lỗ KW Trio 9060</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Đại Loan</p>\r\n<p>Số tờ bấm: 10 tờ</p>', 'resized/B___m_L____KW_Tr_4e7abcd901a9a_90x90.jpg', 'B___m_L____KW_Tr_4e7abcd907c45.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316666585, 1316666585, 'Bấm Lỗ KW Trio 9060', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(62, 1, 0, 'Eagle 837', 'Bấm Lỗ Eagle 837...', '<p>Bấm Lỗ Eagle 837</p>\r\n<p>Loại : Bấm lỗ</p>\r\n<p>ĐVT: cái</p>', 'resized/B___m_L____Eagle_4e7abd280fb8b_90x90.jpg', 'B___m_L____Eagle_4e7abd281b5f7.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316666664, 1316666664, 'Bấm Lỗ Eagle 837', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(63, 1, 0, 'Eagle 837S', 'Bấm Lỗ Eagle 837S...', '<p>Bấm Lỗ Eagle 837</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>ĐVT: cái</p>', 'resized/B___m_L____Eagle_4e7abd9390a5c_90x90.jpg', 'B___m_L____Eagle_4e7abd939c2be.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316666771, 1316666771, 'Bấm Lỗ Eagle 837S', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(64, 1, 0, 'SW8004', 'Bấm Lỗ SW8004...', '<p>Bấm Lỗ SW8004</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Trung Quốc</p>\r\n<p>ĐVT: Cái</p>\r\n<p>Số tờ bấm: 30 tờ</p>', 'resized/B___m_L____SW800_4e7abe3cddb5d_90x90.jpg', 'B___m_L____SW800_4e7abe3ce4b3f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316666940, 1316666940, 'Bấm Lỗ SW8004', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(59, 1, 0, 'KW Trio 978', 'Bấm Lỗ KW Trio 978...', '<p>Bấm Lỗ KW Trio 978</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Đài Loan</p>\r\n<p>Số tờ bấm: 35 tờ</p>\r\n<table class="technical_table" style="height: 24px;" border="0" cellspacing="0" cellpadding="0" width="15" align="center">\r\n<tbody>\r\n<tr>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n</tr>\r\n<tr>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n<td colspan="2"></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'resized/B___m_L____KW_Tr_4e7abb7414d01_90x90.jpg', 'B___m_L____KW_Tr_4e7abb7427544.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316666228, 1316666228, 'Bấm Lỗ KW Trio 978', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(60, 1, 0, 'KW Trio 912', 'Bấm Lỗ KW Trio 912...', '<p>Bấm Lỗ KW Trio 912</p>\r\n<p>Loại : Bấm Lỗ</p>\r\n<p>Xuất xứ: Đài Loan</p>\r\n<p>Số tờ bấm: 16 tờ</p>', 'resized/B___m_L____KW_Tr_4e7abbf62abf0_90x90.jpg', 'B___m_L____KW_Tr_4e7abbf630e17.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316649600, '', 'N', 0, NULL, 1316666358, 1316666358, 'Bấm Lỗ KW Trio 912', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(17, 1, 0, 'BC', 'Loại bút 2B, giúp học sinh viết chữ đẹp hơn.', '<p>Loại bút 2B, giúp học sinh viết chữ đẹp hơn.</p>', 'resized/B__t_ch___4e74d29d401eb_90x90.jpg', 'B__t_ch___4e74d29d4f2a5.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316217600, '', 'N', 0, NULL, 1316278941, 1316280682, 'Bút chì', 0, '', '', 0, 'piece', 0, 'Y,N,N,N,N,Y,20%,10%,', 'none,0,0,1', '', '0,0'),
(18, 1, 0, 'B01', 'Vạn Hoa Gel-B04...', '<p>Đầu bi: 0,5 mm.<br /><br />Số lương: 20 chiếc/hộp.<br /><br />Xuất xứ: Việt Nam.<br /><br />Màu mực: Xanh, đen, đỏ</p>', 'resized/B__t_bi_V___n_Ho_4e780b223668e_90x90.jpg', 'B__t_bi_V___n_Ho_4e780b2240ad9.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316489945, 1316491069, 'Vạn Hoa Gel-B04', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(19, 1, 0, 'TL-304', 'Thiên Long TL-304...', '<p><strong>Đặc điểm</strong>:<br />Đầu bi: 0.5mm, sản suất tại Thụy Sĩ.<br /> Bút bi dạng đậy nắp.<br /> Độ dài viết được: 1.300-1.500m<br /> Mực đạt chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Đầu bi nhỏ tạo nét chữ thanh mảnh.<br /> Thiết kế thon gọn vừa tay cầm cho các em học sinh.	<br /><br /><strong>Đóng gói</strong>:<br />20 cây/hộp, 60 hộp/thùng, 1.200 cây/thùng.</p>', 'resized/Thi__n_Long_TL_3_4e780cfd5bec8_90x90.jpg', 'Thi__n_Long_TL_3_4e780cfd6e154.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316490493, 1316490790, 'Thiên Long TL-304', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(21, 1, 0, 'TL-023', 'Thiên Long TL-023...', '<p><strong>Đặc điểm</strong>:<br />Đầu bi: 0.8 mm, sản xuất tại Thụy Sĩ.<br /> Bút bi dạng bấm khế.<br /> Độ dài viết được: 1.300-1.700m.<br /> Mực đạt tiêu chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Thân bút thanh mảnh cơ chế bấm khế tiện dụng phù hợp cho mọi người.<br /> Thay ruột khi hết mực</p>', 'resized/Thi__n_Long_TL_0_4e780e8c9d967_90x90.jpg', 'Thi__n_Long_TL_0_4e780e8cb1c73.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316490892, 1316490892, 'Thiên Long TL-023', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(20, 1, 0, 'TL-027', 'Thiên Long TL-027...', '<p><strong>Đặc điểm</strong>:<br />•	Đầu bi: 0.5mm, sản suất tại Thụy Sĩ.<br /> Bút bi dạng bấm cò.<br /> Nơi tì ngón tay có tiết diện hình tam giác vừa vặn với tay cầm giúp giảm trơn tuột khi viết thường xuyên.<br /> Độ dài viết được: 1.600-2.000m<br /> Mực đạt chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Đầu bi nhỏ cho nét chữ thanh mảnh.<br /> Cơ chế bấm nằm gọn dưới giắt bút, giúp thuận tay khi sử dụng.<br /> Thay ruột khi hết mực.</p>', 'resized/Thi__n_Long_TL_0_4e780dff3ae58_90x90.jpg', 'Thi__n_Long_TL_0_4e780dff4d9c0.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316490751, 1316490751, 'Thiên Long TL-027', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(22, 1, 0, 'TL-08', 'Thiên Long TL-08...', '<p><strong>Đặc điểm</strong>:<br />Đầu bi: 0.8 mm, sản xuất tại Thụy Sĩ.<br /> Bút bi dạng bấm cò.<br /> Độ dài viết được: 1.200-1.500m.<br /> Mực đạt tiêu chuẩn: ASTM D-4236, ASTM F 963-91, EN71/3, TSCA.	<br /><br /><strong>Lợi ích</strong>:<br />Đa dạng màu sắc rất tiện dụng phù hợp cho mọi người nên TL-08 là loại bút bi được khách hàng tin tưởng sử dụng suốt 17 năm qua.<br /> Thay ruột khi hết mực.</p>', 'resized/Thi__n_Long_TL_0_4e780ee3d81a7_90x90.jpg', 'Thi__n_Long_TL_0_4e780ee3ea668.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316490979, 1316490979, 'Thiên Long TL-08', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(23, 1, 0, 'B-34', 'Bến Nghé B-34...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> <img src="http://www.bennghe.com/images/inkimage/xanh.gif" border="0" /><img src="http://www.bennghe.com/images/inkimage/den.gif" border="0" /></strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />\r\n<p class="class"><span>-    Ng<span>òi b<span>út  : <span>đ<span>ầu bi 0.8mm, s<span>ử d<span>ụng <span>đ<span>ầu bi Th<span>ụy S<span>ỹ.</span></span></span></span></span></span></span></span></span></span><br /> -    Ru<span>ột b<span>út  : s<span>ử d<span>ụng ru<span>ột b<span>út bi lo<span>ại th<span>ư<span>ờng.</span></span></span></span></span></span></span></span></span></span></p>\r\n<p class="class"><span>-    Th<span>ân b<span>út </span></span>: ti<span>êm v<span>à c<span>án b<span>út li<span>ền nhau, m<span>àu s<span>ắc theo m<span>ực.</span></span></span></span></span></span></span></span></span></p>\r\n<p class="class"><span>-    Ch<span>ụp b<span>út  : m<span>àu <span>đen.</span></span></span></span></span></p>\r\n<p class="class"><span>-    Gi<span>ắt b<span>út     : m<span>àu s<span>ắc theo m<span>ực.</span></span></span></span></span></span></p>\r\n<p class="class"><span>-    M<span>àu m<span>ực   : xanh, <span>đen; <span>đ<span>ư<span>ợc nh<span>ập t<span>ừ <span>Đ<span>ức</span></span></span></span></span></span></span></span></span></span></span></p>\r\n<p class="class"><span><span><strong><span style="text-decoration: underline;">Ưu <span>đi<span>ểm:</span></span></span></strong></span></span></p>\r\n<p class="class"><span>Sản phẩm được cải tiến với tiêm và giắt được sử dụng nhựa ABS + AS, cho kiểu dáng trang nhã.</span></p>\r\n<p class="class"><span>Nút bấm nhạy, nét viết trơn đều với đầu bi 0.8mm và 2 màu mực xanh, đen</span></p>\r\n<p class="class"><span>Cho nét viết êm, rõ nét từ đầu đến cuối. </span></p>\r\n<span>Duyên dáng, thích hợp với tuổi trẻ, nhân viên văn phòng.</span></div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 30cây/ca ; 40ca/thùng carton</p>', 'resized/B___n_Ngh___B_34_4e7810279cc5a_90x90.jpg', 'B___n_Ngh___B_34_4e781027a5f73.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316491303, 1316491303, 'Bến Nghé B-34', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(24, 1, 0, 'D-20', 'Bến Nghé D-20...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> <img src="http://www.bennghe.com/images/inkimage/xanh.gif" border="0" /><img src="http://www.bennghe.com/images/inkimage/do.gif" border="0" /><img src="http://www.bennghe.com/images/inkimage/den.gif" border="0" /></strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />-    Đầu bi: 0.6mm<br /> -    Cán: nhựa AS<br /> -    Giắt/ Đuôi: nhựa ABS<br /> -    Đệm: nhựa TBR<br /> <br /> 03 màu tiêu chuẩn, bi 0.6mm cho nét viết êm, rõ nét từ đầu đến cuối.<br /> Kiểu dáng thanh mảnh phù hợp cho học sinh, sinh viên, nhân viên làm công tác tại văn phòng và thành phần tự do sử dụng. <br /> Rất thích hợp để in ấn quảng cáo, tặng phẩm.</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 25 cây/hộp ; 600 cây/thùng</p>', 'resized/B___n_Ngh___D_20_4e78115b9e265_90x90.jpg', 'B___n_Ngh___D_20_4e78115ba8fd6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316491611, 1316491611, 'Bến Nghé D-20', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(25, 1, 0, 'L-09', 'Bến Nghé L-09...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />\r\n<p class="class"><span>- Ng<span style="font-family: Arial;">òi b<span style="font-family: Arial;">út         : <span style="font-family: Arial;">đ<span style="font-family: Arial;">ầu bi 0.5mm, s<span style="font-family: Arial;">ử d<span style="font-family: Arial;">ụng <span style="font-family: Arial;">đ<span style="font-family: Arial;">ầu bi Th<span style="font-family: Arial;">ụy S<span style="font-family: Arial;">ỹ</span></span></span></span></span></span></span></span></span></span></span></p>\r\n<p class="class"><span>- Ru<span style="font-family: Arial;">ột b<span style="font-family: Arial;">út         : s<span style="font-family: Arial;">ử d<span style="font-family: Arial;">ụng ru<span style="font-family: Arial;">ột b<span style="font-family: Arial;">út bi lo<span style="font-family: Arial;">ại th<span style="font-family: Arial;">ư<span style="font-family: Arial;">ờng.</span></span></span></span></span></span></span></span></span></span></p>\r\n<p class="class"><span>- Th<span style="font-family: Arial;">ân b<span style="font-family: Arial;">út         : m<span style="font-family: Arial;">àu s<span style="font-family: Arial;">ắc theo m<span style="font-family: Arial;">ực, c<span style="font-family: Arial;">ó in logo c<span style="font-family: Arial;">ông ty v<span style="font-family: Arial;">à m<span style="font-family: Arial;">ã s<span style="font-family: Arial;">ản ph<span style="font-family: Arial;">ẩm.</span></span></span></span></span></span></span></span></span></span></span> </span></p>\r\n<p class="class">- Ch<span style="font-family: Arial;">ụp b<span style="font-family: Arial;">út         : m<span style="font-family: Arial;">àu tr<span style="font-family: Arial;">ắng <span style="font-family: Arial;">đ<span style="font-family: Arial;">ục.</span></span></span></span></span></span></p>\r\n<p class="class"><span>- <span style="font-family: Arial;">Đ<span style="font-family: Arial;">ối t<span style="font-family: Arial;">ư<span style="font-family: Arial;">ợng s<span style="font-family: Arial;">ử d<span style="font-family: Arial;">ụng : ph<span style="font-family: Arial;">ù h<span style="font-family: Arial;">ợp v<span style="font-family: Arial;">ới h<span style="font-family: Arial;">ọc sinh c<span style="font-family: Arial;">âp II, c<span style="font-family: Arial;">ấp III, sinh vi<span style="font-family: Arial;">ên, c<span style="font-family: Arial;">ông nh<span style="font-family: Arial;">ân - nh<span style="font-family: Arial;">ân vi<span style="font-family: Arial;">ên ch<span style="font-family: Arial;">ức.</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>\r\n<p class="class"><span><span style="font-family: Arial;"><strong><span style="text-decoration: underline;">Ưu <span style="font-family: Arial;">đi<span style="font-family: Arial;">ểm:</span></span></span></strong></span> </span></p>\r\n<p class="class"><span>Kiểu dáng sang trọng với kỹ thuật hiện đại.</span></p>\r\n<p class="class"><span>Deep Blue, Deep Black, Deep Purple & Deep Red cho 04 màu tuyệt đẹp.</span></p>\r\n<p class="class"><span>Phù hợp cho mọi đối tượng sử dụng.</span></p>\r\n<p class="class"><span>L-09 “Sự Chọn Lựa Thích Đáng” </span></p>\r\n</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 20 cây/lon; 60lon/thùng</p>', 'resized/B___n_Ngh___L_09_4e781237175e4_90x90.jpg', 'B___n_Ngh___L_09_4e781237209cc.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316491781, 1318909216, 'Bến Nghé L-09', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(26, 1, 0, 'GP-01', 'Bút chì gỗ GP-01...', '<p><strong>Đặc điểm</strong>:<br />Thân lục giác, 2B		<br /><br /><strong>Đóng gói</strong>:<br />96 hộp/thùng, 1.152 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___G____G_4e78151dd1f2c_90x90.jpg', 'B__t_Ch___G____G_4e78151de5030.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316492573, 1316492573, 'Bút Chì Gỗ GP-01', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(27, 1, 0, 'GP-03', 'Bút Chì Gỗ GP-03...', '<p><strong>Đặc điểm</strong>:<br />Thân lục giác, 2B		<br /><br /><strong>Đóng gói</strong>:<br />32 lon/thùng, 960 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___G____G_4e7815594fb9b_90x90.jpg', 'B__t_Ch___G____G_4e78155961ae3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316492633, 1316492791, 'Bút Chì Gỗ GP-03', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(28, 1, 0, 'GP-04', 'Bút Chì Gỗ GP-04...', '<p><strong>Đặc điểm</strong>:<br />Thân lục giác, có thêm gôm ở đuôi chì, HB		<br /><br /><strong>Đóng gói</strong>:<br />96 hộp/thùng, 1.152 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___G____G_4e78159e4214b_90x90.jpg', 'B__t_Ch___G____G_4e78159e549c4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316492702, 1316492819, 'Bút Chì Gỗ GP-04', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(29, 1, 0, 'PC-09', 'Bút Chì Bấm PC-09...', '<p><strong>Đặc điểm</strong>:<br />Thân tròn, ruột 11 khúc chì, có nắp đậy, trên nắp có gôm, có thể thay được ruột chì, lon nhựa PVC,		<br /><br /><strong>Đóng gói</strong>:<br />48 lon/thùng, 960 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm gãy chì<br /> <br /> Tránh xa nguồn nhiệt, vì sản phẩm dễ gây cháy nổ</p>', 'resized/B__t_Ch___B___m__4e7816adb25e9_90x90.jpg', 'B__t_Ch___B___m__4e7816adc6845.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316492973, 1316492973, 'Bút Chì Bấm PC-09', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(30, 1, 0, 'PC-018', 'Bút chì bấm PC-018', '<p><strong>Đặc điểm</strong>:<br />Harajuku - xuất phát từ Nhật Bản - đã trở  thành tên của cả một xu hướng thời trang khi giới trẻ nơi đây tìm ra cho  mình một phong cách “không giống ai”: phá cách, nổi loạn, đầy sắc màu  và rất ấn tượng. Dựa trên phong cách Harajuku đến từ Nhật Bản, được Việt  hóa cho phù hợp với các bạn học sinh Việt Nam; Bút chì bấm PC-018 được  phối màu sinh động, cá tính, ấn tượng theo một quy luật không trật tự -  Bút chi bấm PC-018</p>\r\n<p>– Quy luật Harajuku.<br /> Kiểu dáng giống bút chì bấm thông thường nhưng thân bút được thiết kế  theo phong cách thời trang Harajuku của Nhật Bản, phù hợp cho tuổi teen.</p>', 'resized/B__t_Ch___B___m__4e78170902f1b_90x90.jpg', 'B__t_Ch___B___m__4e7817091524e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316493065, 1316493065, 'Bút Chì Bấm PC-018', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(31, 1, 0, 'S-01', 'Chuốt Bút Chì S-01...', '<p><strong>Đặc điểm</strong>:<br /> Lưỡi chuốt được làm bằng kim loại sáng bóng, không gỉ, sử  dụng được lâu, kiểu dáng nhỏ gọn, sử dụng cho các loại chì gỗ 																		<br /><br /><strong>Đóng gói</strong>:<br />12hộp inner/thùng, 3.456 cái/thùng						<br /><br /><strong>Bảo quản</strong>:<br />Tránh va đập mạnh làm rách hộp PVC rơi chuốt ra ngoà</p>', 'resized/Chu___t_B__t_Ch__4e781788a6d02_90x90.jpg', 'Chu___t_B__t_Ch__4e781788b9309.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316493192, 1316493192, 'Chuốt Bút Chì S-01', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(32, 1, 0, 'HL-03', 'Bút Dạ Quang HL-03...', '<p><strong>Đặc điểm</strong>:<br />Kiểu dáng thon gọn, trẻ trung. Sản phẩm thích hợp với tất cả khách hàng<br /> Bút có 2 đầu, đầu tròn: 0.8 – 1.1mm, đầu dẹp: 4mm giúp tăng thêm tính năng sử dụng.<br /> Mực tươi sáng, độ phản quang cao. Thích hợp trên nhiều loại giấy.<br /> Mực đạt TC EN71/3, ASTM D-4236	<br /><br /><strong>Lợi ích</strong>:<br />Kiểu dáng trẻ trung, tiện lợi, được khách hàng ưa chuộng.	<br /><br /><strong>Đóng gói</strong>:<br />5 cây/vỉ, 120 vỉ/thùng, 600 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp khi không sử dụng.</p>', 'resized/B__t_D____Quang__4e78191ad1ddb_90x90.jpg', 'B__t_D____Quang__4e78191ae7de8.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316493594, 1316493594, 'Bút Dạ Quang HL-03', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(33, 1, 0, 'HL-06', 'Bút Dạ Quang HL-06...', '<p><strong>Đặc điểm</strong>:<br />Thân bút dạng dẹp, vừa tay cầm và không lăn khi để trên bàn.<br /> Đầu bút bằng Polyethylene, dạng vát xéo, bề rộng nét viết 5mm.<br /> Màu mực tươi sáng, phản quang tốt.<br /> Thích hợp trên nhiều loại giấy.<br /> Mực đạt TC EN71/3, ASTM D-4236.	<br /><br /><strong>Lợi ích</strong>:<br />Kiểu dáng trẻ trung, tiện lợi, được khách hàng ưa chuộng.	<br /><br /><strong>Đóng gói</strong>:<br />Dạng hộp: 10 cây/hộp giấy, 54 hộp/thùng, 540 cây/thùng.<br /> Dạng vỉ: 2 cây/vỉ, 10 vỉ/hộp inner, 24 hộp inner/thùng, 480cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp khi không sử dụng</p>', 'resized/B__t_D____Quang__4e78196e5fe4a_90x90.jpg', 'B__t_D____Quang__4e78196e72c92.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316493678, 1316493992, 'Bút Dạ Quang HL-06', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(34, 1, 0, 'HL-07', 'Bút Dạ Quang HL-07...', '<p><strong>Đặc điểm</strong>:<br />Bút có dạng 2 đầu, thiết kế nhỏ gọn thích hợp với tay cầm học sinh.  Đầu bút bằng polyethylen, Màu mực đậm tươi, phản quang tốt.<br /> <br /> Đầu nhỏ: 0.8-1.0 mm, đầu to: 4.0 mm<br /> <br /> Màu sắc: Vàng, Cam, Hồng, Lá, Xanh biển		<br /><br /><strong>Đóng gói</strong>:<br />36 bút / hộp, 20 hộp/ thùng, 720 bút/ thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp ngay sau khi sử dụng. Tránh nơi có nhiệt độ cao và tiếp xúc trực tiếp với ánh sáng mặt trời.</p>', 'resized/B__t_D____Quang__4e7819c597d43_90x90.jpg', 'B__t_D____Quang__4e7819c5ab78d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316493765, 1316493765, 'Bút Dạ Quang HL-07', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(35, 1, 0, 'HL-08', 'Bút Dạ Quang HL-08...', '<p><strong>Đặc điểm</strong>:<br />•	Thân bút nhỏ gọn, màu sắc trẻ trung, sinh động<br /> Một đầu bút bằng Polyethylene, dạng vát xéo, bề rộng nét viết 5mm.<br /> Màu mực tươi sáng, phản quang tốt<br /> Thích hợp trên nhiều loại giấy<br /> Mực đạt TC EN71/3, ASTM D-4236	<br /><br /><strong>Lợi ích</strong>:<br />Kiểu dáng trẻ trung, tiện lợi, được khách hàng ưa chuộng.	<br /><br /><strong>Đóng gói</strong>:<br />Dạng hộp: 10 cây/hộp giấy, 54 hộp/thùng, 540 cây/thùng.<br /> Dạng vỉ: 2 cây/vỉ, 10 vỉ/hộp inner, 24 hộp inner/thùng, 480cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp khi không sử dụng.</p>', 'resized/B__t_D____Quang__4e781a0defca3_90x90.jpg', 'B__t_D____Quang__4e781a0e0f10b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316493838, 1316493838, 'Bút Dạ Quang HL-08', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(36, 1, 0, 'HL-09', 'Bút Dạ Quang HL-09...', '<p><strong>Đặc điểm</strong>:<br />Bút có thiết kế ấn tượng, dạng hình oval  thon gọn, rất thuận tiện cho tay cầm.  Đầu bút bằng polyethylen, dạng  vát xéo, bề rộng nét viết: 5mm. Màu mực đậm tươi, phản quang tốt.<br /> <br /> Đầu bút dạng vát xéo, KT 4.5-5.5mm<br /> <br /> Màu sắc: Vàng, Cam, Hồng, Lá, Xanh biển		<br /><br /><strong>Đóng gói</strong>:<br />10 cây/hộp, 54 hộp/thùng, 540 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp ngay sau khi sử dụng. Tránh nơi có nhiệt độ cao và tiếp xúc trực tiếp với ánh sáng mặt trời</p>', 'resized/B__t_D____Quang__4e781a5a66cd1_90x90.jpg', 'B__t_D____Quang__4e781a5a7b35f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316493914, 1316493914, 'Bút Dạ Quang HL-09', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(37, 1, 0, 'DC-05', 'Bút Xóa DC-05...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />-    Vỏ hộp : nhựa AS<br /> -    Bánh răng: POM<br /> -    Bánh răng trong: AS<br /> -    Nắp: PP<br /> -    Bao bì:      12cây/hộp ; 144cây/thùng<br /> -    Rộng 5mm x dài 8mm</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 12cây/hộp ; 144cây/thùng</p>', 'resized/B__t_X__a_DC_05_4e781ec7d55d3_90x90.jpg', 'B__t_X__a_DC_05_4e781ec7db91f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316495047, 1316495047, 'Bút Xóa DC-05', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(38, 1, 0, 'DC-09', 'Bút Xóa DC-09...', '<p> </p>\r\n<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />\r\n<p class="class">- <span>Dung tích: 12ml</span></p>\r\n</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 12cây/hộp ; 288cây/thùng</p>', 'resized/B__t_X__a_DC_09_4e781f17c44ba_90x90.jpg', 'B__t_X__a_DC_09_4e781f17cd3df.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316495127, 1316495127, 'Bút Xóa DC-09', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(39, 1, 0, 'DC-01', 'Bút Xóa DC-01...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />\r\n<p class="class"><span>Dung tích: 12ml</span></p>\r\n</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 12cây/hộp ; 288cây/thùng</p>', 'resized/B__t_X__a_DC_01_4e781f59372e4_90x90.jpg', 'B__t_X__a_DC_01_4e781f593dde1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316495193, 1316495193, 'Bút Xóa DC-01', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(40, 1, 0, 'CP-02', 'Bút Xóa Thiên Long CP-02', '', 'resized/B__t_X__a_CP_02_4e7828a390023_90x90.jpg', 'B__t_X__a_CP_02_4e7828a3a2082.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316497571, 1316497571, 'Bút Xóa CP-02', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(41, 1, 0, 'CP-05', 'Bút Xóa Thiên Long CP-05', '', 'resized/B__t_X__a_CP_05_4e7828e47f3b1_90x90.jpg', 'B__t_X__a_CP_05_4e7828e490762.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316497636, 1316497636, 'Bút Xóa CP-05', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(42, 1, 0, 'WH -504', 'Bút xóa kéo Plus WH 504', '', 'resized/B__t_x__a_k__o_P_4e7829168708d_90x90.jpg', 'B__t_x__a_k__o_P_4e7829168f0a6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316497686, 1316497686, 'Bút xóa kéo Plus WH 504', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(43, 1, 0, 'WB-03', 'Bút Lông Bảng WB-03...', '<p><strong>Đặc điểm</strong>:<br />Thân bút lớn thích hợp cho giáo viên, khối văn phòng ...<br /> Đầu bút ngoại nhập chất lượng cao, nét viết êm, có thể sử dụng được nhiều lần .<br /> Màu mực tươi sáng, mau khô và dễ dàng lau sạch mực sau khi viết .<br /> Lượng mực vượt trội, viết được dài 600m .<br /> Mực bút không độc hại .<br /> Đạt TC EN71/3, ASTM D-4236 .	<br /><br /><strong>Lợi ích</strong>:<br />Có thể bơm thêm mực tái sử dụng nhiều lần.	<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng .	<br /><br /><strong>Bảo quản</strong>:<br />Luôn đặt bút nằm ngang và đậy nắp sau khi sử dụng.</p>', 'resized/B__t_L__ng_B___n_4e782aa298028_90x90.jpg', 'B__t_L__ng_B___n_4e782aa2a9f18.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316498082, 1316498082, 'Bút Lông Bảng WB-03', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(44, 1, 0, 'WB-08', 'Bút Lông Bảng WB-08', '<p><strong>Đặc điểm</strong>:<br />Thân bút lớn thích hợp cho giáo viên, khối văn phòng ...<br /> Đầu bút ngoại nhập chất lượng cao, nét bút 2.5mm.<br /> Ruột bằng polyester, Mực ra đều, liêu tục, màu mực đậm,tươi, dễ dàng lau sạch, bút viết lâu hết mực.<br /> Đạt TC EN71/3, ASTM D-4236.	<br /><br /><strong>Lợi ích</strong>:<br />Có thể bơm thêm mực tái sử dụng nhiều lần.	<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Luôn đặt bút nằm ngang và đậy nắp sau khi sử dụng.</p>', 'resized/B__t_L__ng_B___n_4e782ae9e52a5_90x90.jpg', 'B__t_L__ng_B___n_4e782aea0472c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316498154, 1316498154, 'Bút Lông Bảng WB-08', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(45, 1, 0, 'WB-02', 'Bút Lông Bảng WB-02...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />-    Ngòi đầu đạn<br /> -    Cán: nhựa PP<br /> -    Nắp: nhựa PE<br /> -    Đuôi cán : nhựa PE<br /> <br /> Khác với WB-01; WB-02 với công nghệ in trên thân cán cũng khác hơn.<br /> Mẫu in không in trực tiếp trên thân cán mà qua một màng OPP mỏng và được ép lên thân cán qua máy ép nhiệt.<br /> Hình dáng gọn, đẹp, viết êm và dễ dàng lau sạch với một miếng vải khô.</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây/Pcs  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: Bao bì: 04cây/vỉ</p>', 'resized/B__t_L__ng_B___n_4e782b4329f7d_90x90.jpg', 'B__t_L__ng_B___n_4e782b4334599.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316498243, 1316498243, 'Bút Lông Bảng WB-02', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(46, 1, 0, 'WB-05', 'Bút Lông Bảng WB-05...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> </strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />\r\n<p>- Ngòi bút        : Đầu bút lớn, được làm từ Polyester, nhập từ Nhật.</p>\r\n<p>- Thân bút       : màu sắc theo mực, có in tên sản phẩm, mã sản phẩm,  mã vạch, công dụng của mực bằng tiếng Anh, tiêu chuẩn sản xuất.</p>\r\n<p>- Nắp bút        : màu sắc theo mực.</p>\r\n<p>- Màu mực      :  xanh, đỏ, đen ; được nhập từ Đức.</p>\r\n<p><strong><span style="text-decoration: underline;">Ưu điểm: </span></strong></p>\r\n<p>- Mực ra đều, nét rõ, mau khô, dễ xóa, không gây độc hại đến sức khỏe người sử dụng.</p>\r\n<p>- Hình dáng đẹp, đơn giản, dễ sử dụng.</p>\r\n<p>- Thích hợp với học sinh, giáo viên, văn phòng, cơ quan.</p>\r\n</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 12 cây/hộp ; 288 cây/thùng</p>', 'resized/B__t_L__ng_B___n_4e782b8f3694c_90x90.jpg', 'B__t_L__ng_B___n_4e782b8f4e384.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316498319, 1316498319, 'Bút Lông Bảng WB-05', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(47, 1, 0, 'PM-07', 'Bút Lông Dầu PM-07...', '<p><strong>Đặc điểm</strong>:<br />Kiểu dáng được thiết kế vừa tay cầm, giúp êm tay khi viết.<br /> Đầu viết chất lượng cao, nét rộng viết 1.0mm.<br /> Màu mực đậm tươi, mau khô và viết được trên các bề mặt khác nhau như: giấy, nhựa, thủy tinh, kim loại...<br /> Vỏ bút có độ kín hơi tốt, đặc biệt không độc hại đối với người sử dụng..<br /> Đạt TC EN71/3, ASTM D-4236.	<br /><br /><strong>Lợi ích</strong>:<br />Có thể bơm thêm mực tái sử dụng nhiều lần.	<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp sau khi sử dụng.</p>', 'resized/B__t_L__ng_D___u_4e782c01a7c9f_90x90.jpg', 'B__t_L__ng_D___u_4e782c01b9cb4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316498433, 1316498433, 'Bút Lông Dầu PM-07', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(48, 1, 0, 'PM-09', 'Bút Lông Dầu PM-09...', '<p><strong>Đặc điểm</strong>:<br />Kiểu dáng được thiết kế vừa tay cầm, giúp êm tay khi viết.<br /> Kiểu dáng được thiết kế vừa tay cầm, phù hợp với nhân NVVP, Người lao động... <br /> Đầu viết chất lượng cao, bút lông dầu 2 đầu (6mm và 0.8mm).<br /> Màu mực đậm tươi, mau khô và viết được trên các bề mặt khác nhau như: giấy, gỗ, nhựa, thủy tinh, kim loại…<br /> Màu nhẹ, dễ chịu, không độc hại đối với người sử dụng . <br /> Đạt TC EN71/3, ASTM D-4236.		<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 60 hộp/thùng, 720 cây/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Đậy nắp sau khi sử dụng .</p>', 'resized/B__t_L__ng_D___u_4e782c4fab2be_90x90.jpg', 'B__t_L__ng_D___u_4e782c4fbdc41.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316498511, 1316498511, 'Bút Lông Dầu PM-09', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(49, 1, 0, 'M-04', 'Bút Lông Dâu M-04...', '<div><span style="text-decoration: underline;"><strong>Màu mực</strong></span>:<strong> <img src="http://www.bennghe.com/images/inkimage/xanh.gif" border="0" /><img src="http://www.bennghe.com/images/inkimage/do.gif" border="0" /><img src="http://www.bennghe.com/images/inkimage/den.gif" border="0" /></strong> <br /> <span style="text-decoration: underline;"><strong>Mô tả</strong></span>: <br />\r\n<p class="class">-  <span>Ngòi đầu đạn</span></p>\r\n<p class="class">-  <span>Cán/ ti<span style="font-family: Arial;">ê</span>m: nhựa PP</span></p>\r\n<p class="class">-  <span>Đuôi/ nắp nhựa PE</span></p>\r\n<p class="class"><span>3 Màu mực: xanh, đỏ, đen</span></p>\r\n<p class="class"><span>Khác với M-01; M-04 mập hơn & công nghệ in trên cán cũng khác hơn.</span></p>\r\n<p class="class"><span>Hình dáng gọn, đẹp,viết êm với hai đầu tiện lợi.</span></p>\r\n<p class="class"> </p>\r\n</div>\r\n<p><br /> <span style="text-decoration: underline;"><strong>Đơn vị tính</strong></span>: Cây  							<br /> <span style="text-decoration: underline;"><strong>Đóng gói</strong></span>: 12cây/ hộp ; 288cây/thùng</p>', 'resized/B__t_L__ng_D__u__4e782cb7a65fd_90x90.jpg', 'B__t_L__ng_D__u__4e782cb7b2bcb.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316476800, '', 'N', 0, NULL, 1316498615, 1316498615, 'Bút Lông Dâu M-04', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(50, 1, 0, 'TL-E 310:A4', 'Bìa Lá TL-E310:A4...', '<p><strong>Đặc điểm</strong>:<br />Được sản xuất từ nguyên liệu nhựa PP chất lượng cao<br /> Sản phẩm trong suốt, ít phản quang, có thể copy trực tiếp.<br /> Sản xuất theo tiêu chuẩn: TLLTKTSXS007	<br /><br /><strong>Lợi ích</strong>:<br />Nhựa PP không độc hại, thân thiện với môi trường.	<br /><br /><strong>Đóng gói</strong>:<br />Bìa/ bao nilong; 10 bìa/túi nilong / 500 bìa/thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Nhiệt độ: 10 ~ 55º C.<br /> Độ ẩm: 55 ~ 95% RH.<br /> Tránh xa nguồn nhiệt, dầu mỡ.</p>', 'resized/B__a_L___TL_E310_4e7970df7a671_90x90.jpg', 'B__a_L___TL_E310_4e7970df8df94.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316581599, 1316581599, 'Bìa Lá TL-E310:A4', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(51, 1, 0, 'TL-LAF70-A4', 'Folder TL-LAF70-A4...', '<div id="diProDesc" class="fck_details"><strong>Đặc điểm</strong>:<br />Được sản xuất từ bìa cứng, bọc simili cao cấp.		<br /><br /><strong>Đóng gói</strong>:<br />50 bìa/ thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Nhiệt độ: 10 ~ 55º C.<br /> Độ ẩm: 55 ~ 95% RH.<br /> Tránh xa nguồn nhiệt, dầu mỡ.				<br /><br />Màu sắc:<br /> <img src="http://static.thienlong.vn/images/icons/xanhduong.gif" border="0" /> <img src="http://static.thienlong.vn/images/icons/do.gif" border="0" /></div>', 'resized/Folder_TL_LAF70__4e797147634c8_90x90.jpg', 'Folder_TL_LAF70__4e79714776c4d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316581703, 1316581703, 'Folder TL-LAF70-A4', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(52, 1, 0, 'TL-LAF50-F4', 'Folder TL-LAF50-F4...', '<div id="diProDesc" class="fck_details"><strong>Đặc điểm</strong>:<br />Được sản xuất từ bìa cứng, bọc simili cao cấp.		<br /><br /><strong>Đóng gói</strong>:<br />50 bìa/ thùng.	<br /><br /><strong>Bảo quản</strong>:<br />Nhiệt độ: 10 ~ 55º C.<br /> Độ ẩm: 55 ~ 95% RH.<br /> Tránh xa nguồn nhiệt, dầu mỡ.				<br /><br />Màu sắc:<br /> <img src="http://static.thienlong.vn/images/icons/xanhdam.gif" border="0" /> <img src="http://static.thienlong.vn/images/icons/xanhla.gif" border="0" /></div>', 'resized/Folder_TL_LAF50__4e79719b824cc_90x90.jpg', 'Folder_TL_LAF50__4e79719b95548.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316581787, 1316581787, 'Folder TL-LAF50-F4', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(53, 1, 0, 'BN02', 'Bìa Nút BN02...', '', 'resized/B__a_N__t_BN02_4e7973d4be9f3_90x90.jpg', 'B__a_N__t_BN02_4e7973d4d7763.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316582356, 1316582356, 'Bìa Nút BN02', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(54, 1, 0, 'BA01', 'Bìa Acsord BA01...', '', 'resized/B__a_Acsord_BA01_4e79741ed1d78_90x90.jpg', 'B__a_Acsord_BA01_4e79741eea417.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316582430, 1318908481, 'Bìa Acsord BA01', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(55, 1, 0, 'BC03', 'Bìa Còng 5F...', '', 'resized/B__a_C__ng_5F_4e7974e4830c4_90x90.jpg', 'B__a_C__ng_5F_4e7974e4a03b4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316582628, 1316582628, 'Bìa Còng 5F', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(56, 1, 0, 'BT01', 'Bao Thư BT01...', '<p>Bao Thư BT01...</p>', 'resized/Bao_Th___BT01_4e79764f04bd4_90x90.jpg', 'Bao_Th___BT01_4e79764f278ae.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316582991, 1316582991, 'Bao Thư BT01', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(57, 1, 0, 'BT02', 'Bao Thư BT02...', '<p>Bao Thư BT02...</p>', 'resized/Bao_Th___BT02_4e797685f19e9_90x90.jpg', 'Bao_Th___BT02_4e7976861ca69.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316583046, 1318909176, 'Bao Thư BT02', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(58, 1, 0, 'BT03', 'Bao Thư BT03...', '<p>Bao Thư BT03...</p>', 'resized/Bao_Th___BT03_4e7976b81ddcd_90x90.jpg', 'Bao_Th___BT03_4e7976b83283b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1316563200, '', 'N', 0, NULL, 1316583096, 1316583096, 'Bao Thư BT03', 0, '', '', 0, 'piece', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(71, 1, 0, 'KG01', 'Kẹp Giấy...', '<p><strong>Đặc điểm</strong>:<br />Làm từ thép tốt, có độ bền cao. Kẹp bằng  thép mạ inox dẻo dai và bền giúp kẹp tài liệu dễ dàng, ổn định sau nhiều  lần sử dụng. Bề mặt được phủ sơn gia nhiệt, chống gỉ		<br /><br /><strong>Đóng gói</strong>:<br />DCL  01: 12 chiếc/hộp, 60 hộp/thùng;  DCL 02: 12 chiếc/hộp, 120 hộp/thùng;   DCL 03: 12 chiếc/hộp, 144 hộp/thùng; DCL 04: 12 chiếc/hộp, 240  hộp/thùng;  DCL 05: 12 chiếc/hộp, 300 hộp/thùng; DCL 06: 12 chiếc/hộp,  360 hộp/thùng;	<br /><br /><strong>Bảo quản</strong>:<br />Tránh nơi ẩm ướt</p>', 'resized/K___p_Gi___y_4e834001c2905_90x90.jpg', 'K___p_Gi___y_4e834001d4790.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317224449, 1317224463, 'Kẹp Giấy', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` (`product_id`, `vendor_id`, `product_parent_id`, `product_sku`, `product_s_desc`, `product_desc`, `product_thumb_image`, `product_full_image`, `product_publish`, `product_weight`, `product_weight_uom`, `product_length`, `product_width`, `product_height`, `product_lwh_uom`, `product_url`, `product_in_stock`, `product_available_date`, `product_availability`, `product_special`, `product_discount_id`, `ship_code_id`, `cdate`, `mdate`, `product_name`, `product_sales`, `attribute`, `custom_attribute`, `product_tax_id`, `product_unit`, `product_packaging`, `child_options`, `quantity_options`, `child_option_ids`, `product_order_levels`) VALUES
(72, 1, 0, 'KB', 'Kẹp bướm...', '<p><strong>Đặc điểm</strong>:<br />Làm từ thép tốt, có độ bền cao. Kẹp bằng  thép mạ inox dẻo dai và bền giúp kẹp tài liệu dễ dàng, ổn định sau nhiều  lần sử dụng. Bề mặt được phủ sơn gia nhiệt, chống gỉ		<br /><br /><strong>Đóng gói</strong>:<br />DCL  01: 12 chiếc/hộp, 60 hộp/thùng;  DCL 02: 12 chiếc/hộp, 120 hộp/thùng;   DCL 03: 12 chiếc/hộp, 144 hộp/thùng; DCL 04: 12 chiếc/hộp, 240  hộp/thùng;  DCL 05: 12 chiếc/hộp, 300 hộp/thùng; DCL 06: 12 chiếc/hộp,  360 hộp/thùng;	<br /><br /><strong>Bảo quản</strong>:<br />Tránh nơi ẩm ướt</p>', 'resized/K___p_B_____m_4e8340552a376_90x90.jpg', 'K___p_B_____m_4e8340553fa7e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317224533, 1317224533, 'Kẹp Bướm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(73, 1, 0, 'KN-01', 'Dao Văn Phòng KN-01', '<p><strong>Đặc điểm</strong>:<br />Lưỡi dao làm từ thép tốt, mạ crom. Được  tráng lớp dầu chống sét, không gỉ sét, bền khi sử dụng, ít bị gãy, bị  trầy.  Lưỡi dao cấu tạo 3 tầng đặc biệt sắc bén. Vỏ ngoài bằng nhựa mềm. 		<br /><br /><strong>Đóng gói</strong>:<br />24 cây/hộp, 12 hộp/thùng, 288 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh nơi ẩm ướt</p>', 'resized/Dao_V__n_Ph__ng__4e8340deef541_90x90.jpg', 'Dao_V__n_Ph__ng__4e8340df0d487.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317224671, 1317224671, 'Dao Văn Phòng KN-01', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(74, 1, 0, 'KN-02', 'Dao Văn Phòng KN-02', '<p><strong>Đặc điểm</strong>:<br />Lưỡi dao làm từ thép tốt, mạ crom. Được  tráng lớp dầu chống sét, không gỉ sét, bền khi sử dụng, ít bị gãy, bị  trầy.  Lưỡi dao cấu tạo 3 tầng đặc biệt sắc bén. Vỏ ngoài bằng nhựa  trong nhiều màu sắc		<br /><br /><strong>Đóng gói</strong>:<br />24 cây/hộp, 8 hộp/thùng, 192 cây/thùng	<br /><br /><strong>Bảo quản</strong>:<br />Tránh nơi ẩm ướt</p>', 'resized/Dao_V__n_Ph__ng__4e83414e582bd_90x90.jpg', 'Dao_V__n_Ph__ng__4e83414e6ce06.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317224782, 1317224782, 'Dao Văn Phòng KN-02', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(75, 1, 0, 'SC-02', 'Kéo Văn Phòng SC-02', '<p><strong>Đặc điểm</strong>:<br /> Được làm từ chất liệu thép không rỉ đặc biệt sắc bén. Tay  nắm bằng nhựa trong chắc chắn, không đau tay khi sử dụng. Kiểu dáng thon  gọn, đẹp, rất phù hợp dùng trong văn phòng. 																		<br /><br /><strong>Đóng gói</strong>:<br />12 cây/hộp, 20 hộp/thùng, 240 cây/thùng						<br /><br /><strong>Bảo quản</strong>:<br />Tránh nơi ẩm ướt</p>', 'resized/K__o_V__n_Ph__ng_4e8341afe0a4a_90x90.jpg', 'K__o_V__n_Ph__ng_4e8341aff27c8.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317224880, 1318909264, 'Kéo Văn Phòng SC-02', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(76, 1, 0, 'ĐL 70', 'Giấy In Excel...', '<p><strong>Thông tin chi tiết sản phẩm</strong></p>\r\n<p>Loại giấy: Giấy In (Photo)</p>\r\n<p>xuất xứ: Indonesia</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Tiêu chuẩn đóng gói: 5ram/lốc</p>', 'resized/Gi___y_In_A4_Exc_4e839e8b914aa_90x90.jpg', 'Gi___y_In_A4_Exc_4e839e8b95cca.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317248651, 1317248651, 'Giấy In A4 Excel ĐL 70', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(77, 1, 0, 'PP-70', 'Giấy In A4 Paper One 70...', '<p><strong>Thông Tin Chi Tiế Sản Phẩm</strong></p>\r\n<p>Loại  giấy: Giấy In (Photo)</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Xuất xứ : Indonesia</p>\r\n<p>Tiêu chuẩn đóng gói: Đang cập nhật</p>', 'resized/Gi___y_In_A4_Pap_4e839f77846f4_90x90.jpg', 'Gi___y_In_A4_Pap_4e839f7798047.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317248887, 1317248887, 'Giấy In A4 Paper One 70', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(78, 1, 0, 'IK Plus 70', 'Giấy In A4 IK Plus 70...', '<p>Thông Tin Chi Tiết Sản Phẩm:</p>\r\n<p>Loại giấy : Giấy In (Photo)</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Xuất xứ : Indonesia</p>', 'resized/Gi___y_In_A4_IK__4e83a023e88ed_90x90.jpg', 'Gi___y_In_A4_IK__4e83a02408b52.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317249060, 1317249060, 'Giấy In A4 IK Plus 70', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(79, 1, 0, 'ĐT 86', 'Giấy In Bãi Bằng...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm: </strong></p>\r\n<p>Loại giấy: Giấy In (Photo)</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/Gi___y_In_B__i_B_4e83a1595df9e_90x90.jpg', 'Gi___y_In_B__i_B_4e83a1597440b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317249369, 1317249369, 'Giấy In Bãi Bằng ĐT86', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(80, 1, 0, 'Lucky 70', 'Giấy In A4 Lucky 70...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm </strong>:</p>\r\n<p>Loại giấy: Giấy In (Photo)</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Xuất xứ : Indonesia</p>', 'resized/Gi___y_In_A4_Luc_4e83a250b84a4_90x90.jpg', 'Gi___y_In_A4_Luc_4e83a250ccbda.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317249616, 1317249616, 'Giấy In A4 Lucky 70', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(81, 1, 0, 'NB1-70', 'Giấy In A4 Number One 70...', '<p>Thông Tin Chi Tiết Sản Phẩm :</p>\r\n<p>Loại Giấy: Giấy In (Photo)</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Xuất xứ : Việt Nam</p>', 'resized/Gi___y_In_A4_Num_4e83a37b96e5c_90x90.jpg', 'Gi___y_In_A4_Num_4e83a37ba8d31.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317249915, 1317249915, 'Giấy In A4 Number One 70', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(82, 1, 0, 'Epson', 'Giấy In Màu A4 Epson...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm :</strong></p>\r\n<p>Loại giấy: Giấy In (photo)</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Xuất xứ : Nhật Bản</p>\r\n<p> </p>', 'resized/Gi___y_In_M__u_A_4e83a58410424_90x90.jpg', 'Gi___y_In_M__u_A_4e83a58418a97.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317250436, 1317250436, 'Giấy In Màu A4 Epson', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(83, 1, 0, 'HH A5', 'Giấy Than Hồng Hà A5...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm: </strong></p>\r\n<p>Loại Giấy : Giấy Than</p>\r\n<p>Khổ giẫy: A5</p>\r\n<p>Xuất xứ : Việt Nam</p>', 'resized/Gi___y_Than_H____4e83a690a57ee_90x90.gif', 'Gi___y_Than_H____4e83a690b818d.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317250704, 1317250704, 'Giấy Than Hồng Hà A5', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(84, 1, 0, 'G1406246', 'Giấy Than Kokusai', '<p><strong>Thông Tin Chi Tiết Sản Phẩm: </strong></p>\r\n<p>Loại giấy: Giấy Than</p>\r\n<p>Xuất xứ : Thái Lan</p>\r\n<p>Khổ giấy: Đang cập nhật</p>', 'resized/Gi___y_Than_Koku_4e83a7bbf182d_90x90.jpg', 'Gi___y_Than_Koku_4e83a7bc10d47.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317251004, 1317251004, 'Giấy Than Kokusai', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(85, 1, 0, 'CL-A4', 'Giấy Than Cao Cấp Cửu Long...', '<p>Thông Tin Chi Tiết Sản Phẩm :</p>\r\n<p>Loại giấy: Giấy than</p>\r\n<p>Khổ giấy : <a class="text_link_v2" href="http://www.vatgia.com/s/210mm+x+279mm">210mm x 279mm</a></p>\r\n<p>Xuất xứ : Việt Nam</p>', 'resized/Gi___y_Than_Cao__4e83a89383fb8_90x90.jpg', 'Gi___y_Than_Cao__4e83a8938a029.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317251219, 1317251219, 'Giấy Than Cao Cấp Cửu Long', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(86, 1, 0, 'TH-A4', 'Giấy Than Thái Horse...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm :</strong></p>\r\n<p>Loại giấy: Giấy Than</p>\r\n<p>Khổ giấy : A4</p>\r\n<p>Xuất xứ: Thái Lan</p>', 'resized/Gi___y_Than_Th___4e83a9a2745c0_90x90.gif', 'Gi___y_Than_Th___4e83a9a283e91.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317251490, 1317251490, 'Giấy Than Thái Horse', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(87, 1, 0, 'GT-01', 'Giấy Than G-Star...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm: </strong></p>\r\n<p>Loại giấy : Giấy Than</p>\r\n<p>Khổ giấy : Đang cập nhật.</p>\r\n<p>Xuất xứ: Mỹ</p>', 'resized/Gi___y_Than_G_St_4e83aa179ec9d_90x90.jpg', 'Gi___y_Than_G_St_4e83aa17abb0c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317168000, '', 'N', 0, NULL, 1317251607, 1317251607, 'Giấy Than G-Star', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(88, 1, 0, 'SA-A4', 'Giấy Scan Anh...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm: </strong></p>\r\n<p>Loại giấy: Giấy scan</p>\r\n<p>Khổ giấy: A4</p>\r\n<p>Xuất xứ: Anh</p>', 'resized/Gi___y_Scan_Anh_4e83c66b13db2_90x90.jpg', 'Gi___y_Scan_Anh_4e83c66b1808b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317258859, 1317259058, 'Giấy Scan Anh', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(89, 1, 0, 'GG-01', 'Giấy Can Getway...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm :</strong></p>\r\n<p>Loại giấy : Giấy Can</p>\r\n<p>Sản xuất : Chartham</p>\r\n<p>Khổ giấy: Đang cập nhật</p>', 'resized/Gi___y_Can_Getwa_4e83c6fb84a88_90x90.jpg', 'Gi___y_Can_Getwa_4e83c6fc22746.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317259004, 1317259004, 'Giấy Can Getway', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(90, 1, 0, 'GC-A0', 'Giấy cuộn A0...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm :</strong></p>\r\n<p>Loại giấy: Giấy Cuộn</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>Khổ giấy : A0</p>', 'resized/Gi___y_Cu___n_A0_4e83c83c10076_90x90.jpg', 'Gi___y_Cu___n_A0_4e83c83c154ad.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317259324, 1317259324, 'Giấy Cuộn A0', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(91, 1, 0, 'InkJet Paper', 'Giấy cuộng InkJet Paper...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm :</strong></p>\r\n<p>Loại giấy: Giấy cuộn</p>\r\n<p>Xuất xứ : Trung Quốc</p>\r\n<p>Tiêu chuẩn đóng gói :  1 Cuộn/1 Thùng</p>', 'resized/Gi___y_cu___ng_I_4e83c901d7507_90x90.jpg', 'Gi___y_cu___ng_I_4e83c901e78bc.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317259521, 1317259521, 'Giấy cuộng InkJet Paper', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(92, 1, 0, 'GF-85mm', 'Giấy fax 85mm...', '<p><strong>Thông Tin Chi Tiết Sản Phẩm : </strong></p>\r\n<p>Loại giấy : Giấy Fax</p>\r\n<p>Kích cớ: 85mm</p>\r\n<p>Xuất xứ : Việt Nam</p>', 'resized/Gi___y_fax_85mm_4e83ca1862a43_90x90.jpg', 'Gi___y_fax_85mm_4e83ca1875e7a.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317259800, 1317259800, 'Giấy fax 85mm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(93, 1, 0, 'GF-55mm', 'Giấy Fax 50mm...', '<p>Loại giấy : Giấy Fax</p>\r\n<p>Kích cớ: 50mm</p>\r\n<p>Xuất xứ : Việt Nam</p>', 'resized/Gi___y_Fax_50mm_4e83ca9c4df2c_90x90.jpg', 'Gi___y_Fax_50mm_4e83ca9c5f224.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317259932, 1317259932, 'Giấy Fax 50mm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(94, 1, 0, 'Subird', 'Giấy Fax Subird...', '<p>Loại giấy: Giấy Fax</p>\r\n<p>Khổ giấy : Đang cập nhật.</p>\r\n<p>Xuất xứ: Nhật Bản</p>', 'resized/Gi___y_Fax_Subir_4e83cb23a18b6_90x90.jpg', 'Gi___y_Fax_Subir_4e83cb23b19f6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317260067, 1317260067, 'Giấy Fax Subird', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(95, 1, 0, 'OSAKAS 210', 'Giấy Fax Nhiệt OSAKAS 210...', '<p>Loại giấy : Giấy Fax</p>\r\n<p>Khổ giấy : Đang cập nhật.</p>\r\n<p>Xuất xứ : Nhật Bản</p>', 'resized/Gi___y_Fax_Nhi___4e83cb945ea29_90x90.jpg', 'Gi___y_Fax_Nhi___4e83cb9462e6e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317260180, 1317260180, 'Giấy Fax Nhiệt OSAKAS 210', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(96, 1, 0, 'Sakura', 'Giấy Fax Sakura ...', '<p>Loại giấy : Giấy fax</p>\r\n<p>Khổ giấy : Đang cập nhật.</p>\r\n<p>Xuất xứ : Nhật Bản</p>', 'resized/Gi___y_Fax_Sakur_4e83cbe8b0f64_90x90.jpg', 'Gi___y_Fax_Sakur_4e83cbe8b5f92.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317260264, 1317260264, 'Giấy Fax Sakura', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(97, 1, 0, 'Sakura 216', 'Giấy Fax Sakura ...', '<p>Loại giấy : Giấy Fax</p>\r\n<p>Khổ giấy: Đang cập nhật.</p>\r\n<p>Xuất xứ : Nhật Bản</p>', 'resized/Gi___y_Fax_Sakur_4e83cc7abcac8_90x90.jpg', 'Gi___y_Fax_Sakur_4e83cc7ac4697.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317260410, 1317260410, 'Giấy Fax Sakura 216', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(98, 1, 0, 'Gimma130', 'Giấy in màu Gimma130...', '<p>Loại giấy : Giấy In Màu</p>\r\n<p>Khổ giầy: Đang cập nhật</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>', 'resized/Gi___y_in_m__u_G_4e83ceb692186_90x90.jpg', 'Gi___y_in_m__u_G_4e83ceb698232.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317260982, 1317260982, 'Giấy in màu Gimma130', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(99, 1, 0, 'KAISAN130', 'Giấy In Màu Một Mặt Kaisan', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại giấy : Giấy In Màu</p>\r\n<p>Khổ giầy: A4</p>\r\n<p>Xuất xứ: Trung Quốc</p>\r\n</div>', 'resized/Gi___y_In_M__u_M_4e83cf20eb8f0_90x90.jpg', 'Gi___y_In_M__u_M_4e83cf210480c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317261089, 1317261089, 'Giấy In Màu Một Mặt Kaisan', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(100, 1, 0, 'KAISAN250', 'Giấy In Màu Hai Mặt Kaisan...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại giấy : Giấy In Màu</p>\r\n<p>Khổ giầy: A3</p>\r\n<p>Xuất xứ: Trung Quốc</p>\r\n</div>\r\n</div>', 'resized/Gi___y_In_M__u_H_4e83cf8298056_90x90.jpg', 'Gi___y_In_M__u_H_4e83cf82a3ba3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317261186, 1317261186, 'Giấy In Màu Hai Mặt Kaisan', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(101, 1, 0, 'HP-01', 'Giấy In Màu Máy HP...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại giấy : Giấy In Màu</p>\r\n<p>Khổ giầy: Đang cập nhật</p>\r\n<p>Xuất xứ: Đang cập nhật</p>\r\n</div>\r\n</div>\r\n</div>', 'resized/Gi___y_In_M__u_M_4e83cfff6d2a9_90x90.jpg', 'Gi___y_In_M__u_M_4e83cfff72764.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317261311, 1317261311, 'Giấy In Màu Máy HP', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(102, 1, 0, 'Plus IT-120SG', 'Giấy in màu Plus IT-120SG...', '<p>Loại giấy : Giấy In Màu</p>\r\n<p>Khổ giấy: Đang cập nhật.</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/Gi___y_in_m__u_P_4e83d0808b39d_90x90.jpg', 'Gi___y_in_m__u_P_4e83d0809b8c8.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317261440, 1317261440, 'Giấy in màu Plus IT-120SG', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(103, 1, 0, 'GLT-01', 'Giấy liên tục 4 liên....', '<p>Loại giấy: Giấy Liên Tục 4 Liên</p>\r\n<p>Kích cỡ : 380x279mm</p>\r\n<p>Tiêu chuẩn đóng gói : 1 thùng  = 500 tờ.</p>\r\n<p>Xuất xứ : Đang cập nhật.</p>', 'resized/Gi___y_li__n_t___4e83d229bc932_90x90.jpg', 'Gi___y_li__n_t___4e83d229c4700.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317261865, 1317261865, 'Giấy liên tục 4 liên', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(104, 1, 0, 'GLT-02', 'Giấy Liên Tục 2 - 5 liên Impression...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại giấy: Giấy Liên Tục 2-5 Liên Impression</p>\r\n<p>Kích cỡ :   <a class="text_link_v2" href="http://www.vatgia.com/s/380mm+x+279mm">380mm x 279mm</a></p>\r\n<p>Tiêu chuẩn đóng gói : 1 thùng  = 500 tờ.</p>\r\n<p>Xuất xứ : Việt Nam</p>\r\n</div>', 'resized/Gi___y_Li__n_T___4e83d2d833802_90x90.jpg', 'Gi___y_Li__n_T___4e83d2d842aae.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317262040, 1317262040, 'Giấy Liên Tục 2 - 5 liên Impression', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(105, 1, 0, 'GLT-03', 'Giấy Liên Tục 1 liên Super White ...', '<div class="formField" style="overflow:auto;max-height:200px">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại giấy: Giấy Liên Tục</p>\r\n<p>Kích cỡ : <a class="text_link_v2" href="http://www.vatgia.com/s/240mm+x+279mm">240mm x 279mm</a><a class="text_link_v2" href="http://www.vatgia.com/s/380mm+x+279mm"></a></p>\r\n<p>Xuất xứ : Việt Nam</p>\r\n</div>\r\n</div>', 'resized/Gi___y_Li__n_T___4e83d40988570_90x90.jpg', 'Gi___y_Li__n_T___4e83d4099a439.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317262236, 1317262345, 'Giấy Liên Tục 1 liên Super White', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(106, 1, 0, 'GLT-04', 'Giấy Liên Tục 1 Liên Special ...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại giấy: Giấy Liên Tục</p>\r\n<p>Kích cỡ :   <a class="text_link_v2" href="http://www.vatgia.com/s/380mm+x+279mm">380mm x 279mm</a></p>\r\n<p>Xuất xứ : Việt Nam</p>\r\n</div>\r\n</div>\r\n</div>', 'resized/Gi___y_Li__n_T___4e83d4681aff8_90x90.jpg', 'Gi___y_Li__n_T___4e83d4682b390.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317262440, 1317262440, 'Giấy Liên Tục 1 Liên Special', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(107, 1, 0, 'GLT-05', 'Giấy Liên Tục 2 Liên...', '<p>Loại giấy : Giấy Liên Tục</p>\r\n<p>Khổ giấy : A4</p>\r\n<p>Xuất xứ : Việt Nam</p>', 'resized/Gi___y_Li__n_T___4e83d53279da9_90x90.gif', 'Gi___y_Li__n_T___4e83d5327f652.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317262642, 1317262642, 'Giấy Liên Tục 2 Liên', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(108, 1, 0, 'GVS-01', 'Giấy vệ sinh Bless You...', '<p>Loại : Giấy vế sinh</p>\r\n<p>Màu sắc: Trắng, hồng.</p>\r\n<p>Nhãn Hiệu : Bless You</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>Đặc tính: Giấy mềm và dai</p>', 'resized/Gi___y_v____sinh_4e83d692d2482_90x90.jpg', 'Gi___y_v____sinh_4e83d692d8e61.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317262994, 1317262994, 'Giấy vệ sinh Bless You', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(109, 1, 0, 'GVS-02', 'Giấy vệ sinh cuộn lớn Techmodule ...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại : Giấy vế sinh</p>\r\n<p>Màu sắc: Trắng</p>\r\n<p>Nhãn Hiệu : Techmodule</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>Đặc tính: Giấy mềm và dai</p>\r\n</div>', 'resized/Gi___y_v____sinh_4e83d6e394e34_90x90.jpg', 'Gi___y_v____sinh_4e83d6e3a6f10.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317263075, 1317263075, 'Giấy vệ sinh cuộn lớn Techmodule', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(110, 1, 0, 'GVS-03', 'Giấy vệ sinh An An...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại : Giấy vế sinh</p>\r\n<p>Màu sắc: Trắng</p>\r\n<p>Nhãn Hiệu : An an</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>Đặc tính: Giấy mềm</p>\r\n</div>\r\n</div>', 'resized/Gi___y_v____sinh_4e83d72f6cf71_90x90.jpg', 'Gi___y_v____sinh_4e83d72f80ae1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317263151, 1317263151, 'Giấy vệ sinh An An', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(111, 1, 0, 'GVS-04', 'Giấy vệ sinh Watersilk ...', '<p>Loại : Giấy vệ sinh</p>\r\n<p>Nhãn hiệu: Watersilk</p>\r\n<p>Màu sắc:Trắng</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>', 'resized/Gi___y_v____sinh_4e83d7a839cea_90x90.jpg', 'Gi___y_v____sinh_4e83d7a841a4c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317263272, 1317263272, 'Giấy vệ sinh Watersilk', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(112, 1, 0, 'GVS-05', 'Giấy vệ sinh Lency...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại : Giấy vệ sinh</p>\r\n<p>Nhãn hiệu: Lency</p>\r\n<p>Màu sắc:Trắng</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>Đặc tính: Giấy mềm</p>\r\n</div>', 'resized/Gi___y_v____sinh_4e83d80c23a15_90x90.jpg', 'Gi___y_v____sinh_4e83d80c2de0f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317263372, 1317263372, 'Giấy vệ sinh Lency', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(113, 1, 0, 'GVS-06', 'Giấy vệ sinh cao cấp Paseo ...', '<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Loại : Giấy vệ sinh</p>\r\n<p>Nhãn hiệu: Paseo</p>\r\n<p>Màu sắc:Trắng</p>\r\n<p>Xuất xứ:Indonesia</p>\r\n<p>Đặc tính: Giấy mềm và dai</p>\r\n</div>\r\n</div>', 'resized/Gi___y_v____sinh_4e83d870a498b_90x90.jpg', 'Gi___y_v____sinh_4e83d870a8dde.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317263472, 1317263472, 'Giấy vệ sinh cao cấp Paseo', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(114, 1, 0, 'MF1207', 'Bảng tên giả da MF1207 ...', '<p>Loại : Bảng tên</p>\r\n<p>Xuất xứ : Đang cập nhật.</p>', 'resized/B___ng_t__n_gi___4e83da9a75811_90x90.jpg', 'B___ng_t__n_gi___4e83da9a7b705.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317264026, 1317264026, 'Bảng tên giả da MF1207', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(115, 1, 0, 'Bangten2', 'Bảng tên dẻo, dây đeo xoay...', '<p>Loại : Bảng tên + dây đeo.</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/B___ng_t__n_d____4e83db0226280_90x90.jpg', 'B___ng_t__n_d____4e83db022d6fc.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317264130, 1317264130, 'Bảng tên dẻo, dây đeo xoay', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(116, 1, 0, 'Bangten3', 'Bảng tên trong, dây đeo xoay...', '<p>Loại: Bảng tên.</p>\r\n<p>Màu sắc : nhiều màu</p>\r\n<p>Đặc tính: Bảng tên trong suốt, có kèm dây xoay.</p>\r\n<p>Xuất xứ: Trung Quốc</p>', 'resized/B___ng_t__n_tron_4e83db8357df5_90x90.jpg', 'B___ng_t__n_tron_4e83db836081c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317264259, 1317264259, 'Bảng tên trong, dây đeo xoay', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(117, 1, 0, 'DD-01', 'Dây đeo thẻ lụa LHDT034...', '<p>Loại : Dây đeo</p>\r\n<p>Đặc điểm: Làm từ lụa mềm.</p>\r\n<p>Xuất xứ: Trung Quốc</p>', 'resized/D__y___eo_th_____4e83dc0f2cd02_90x90.jpg', 'D__y___eo_th_____4e83dc0f765c5.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317264399, 1317264399, 'Dây đeo thẻ lụa LHDT034', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(118, 1, 0, 'Bangten4', 'Dây đeo thẻ lụa LHDT034...', '<p>Loại : Dây đeo</p>\r\n<div class="formField" style="overflow: auto; max-height: 200px;">\r\n<p>Đặc điểm: Làm từ lụa mềm.</p>\r\n<p>Xuất xứ: Trung Quốc</p>\r\n</div>', 'resized/D__y___eo_th_____4e83dc4b5e2b6_90x90.jpg', 'D__y___eo_th_____4e83dc4ba9788.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317254400, '', 'N', 0, NULL, 1317264459, 1317264459, 'Dây đeo thẻ lụa LHDT034', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(119, 1, 0, 'GI 01', 'Giấy In A4 Excel ĐL 70...', '<p>Giấy In A4 Excel ĐL 70...</p>', 'resized/Gi___y_In_A4_Exc_4e86d4df6daa8_90x90.jpg', 'Gi___y_In_A4_Exc_4e86d4df729a0.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1317427200, '', 'N', 0, NULL, 1317459167, 1319043104, 'Giấy In A4 Excel ĐL 70', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(122, 1, 0, 'T01', 'Thau Vuông Nhỏ...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>30x24x10,5</strong></p>\r\n<p><strong><br /></strong></p>', 'resized/Thau_Vu__ng_Nh___4ea25c048b490_90x90.jpg', 'Thau_Vu__ng_Nh___4ea25c048fade.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 100, 1319241600, '', 'N', 0, NULL, 1319263236, 1319263442, 'Thau Vuông Nhỏ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(123, 1, 0, 'T02', 'Thau Phi 25cm...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ25x13,5</strong></p>', 'resized/Thau_Phi_25cm_4ea25d52dbde0_90x90.jpg', 'Thau_Phi_25cm_4ea25d52de4ee.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319263570, 1319264151, 'Thau Phi 25cm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(124, 1, 0, 'R01', '', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ25x13,5</strong></p>', 'resized/R______25cm_4ea25d9933c8e_90x90.jpg', 'R______25cm_4ea25d9935fae.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319263641, 1319263641, 'Rổ Φ25cm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(125, 1, 0, 'R02', '', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ35x13,5</strong></p>', 'resized/R____quai_s______4ea25ddfcfb3e_90x90.jpg', 'R____quai_s______4ea25ddfd1e3c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319263711, 1319263711, 'Rổ quai sò Φ35cm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(126, 1, 0, 'TR01', 'Thau Rổ...', '<p>- Nguyên liệu: <strong>Thau rổ Φ25cm</strong><br />- Kích thước (DxRxC): <strong>Φ25x11</strong></p>', 'resized/Thau_R____4ea25e3edd604_90x90.jpg', 'Thau_R____4ea25e3ee1451.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319263806, 1319263806, 'Thau Rổ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(127, 1, 0, 'TR02', 'Thau rổ nắp Φ25cm...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ25x13,5</strong></p>', 'resized/Thau_r____n___p__4ea25e7810e45_90x90.jpg', 'Thau_r____n___p__4ea25e78148e5.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319263864, 1319263864, 'Thau rổ nắp Φ25cm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(128, 1, 0, 'R03', 'Rổ sọc Φ26cm...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ26x8,5</strong></p>', 'resized/R____s___c___26c_4ea25ec831d79_90x90.jpg', 'R____s___c___26c_4ea25ec834057.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319263944, 1319263944, 'Rổ sọc Φ26cm', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(129, 1, 0, 'R04', 'Rổ vuông lớn...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>29x40x16</strong></p>', 'resized/R____vu__ng_l____4ea25f00843b6_90x90.jpg', 'R____vu__ng_l____4ea25f00866db.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319264000, 1319264000, 'Rổ vuông lớn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(130, 1, 0, 'T03', 'Thau Vo Gạo...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ24,5x12</strong></p>', 'resized/Thau_Vo_G___o_4ea25f39e926e_90x90.jpg', 'Thau_Vo_G___o_4ea25f39ec14f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319264057, 1319264057, 'Thau Vo Gạo', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(131, 1, 0, 'R05', 'Rổ chữ nhật nhỏ...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>17,5X12X5,5</strong></p>', 'resized/R____ch____nh____4ea25f82db195_90x90.jpg', 'R____ch____nh____4ea25f82dd4b5.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319264130, 1319264130, 'Rổ chữ nhật nhỏ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(132, 1, 0, 'K01', 'Khay rau quả có nắp...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>32,5x14,5x11</strong></p>', 'resized/Khay_rau_qu____c_4ea2690bd17d4_90x90.jpg', 'Khay_rau_qu____c_4ea2690bd42c7.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319266571, 1319266571, 'Khay rau quả có nắp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(133, 1, 0, 'O01', 'Ống đựng đũa...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>15x7,5x12</strong></p>', 'resized/___ng______ng____4ea2694f6cd97_90x90.jpg', '___ng______ng____4ea2694f71e99.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319266639, 1319266639, 'Ống đựng đũa', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(134, 1, 0, 'K02', 'Khay úp ly (Khay rau quả)...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>32,5x14,5x6,5</strong></p>', 'resized/Khay___p_ly__Kha_4ea269a233ac5_90x90.jpg', 'Khay___p_ly__Kha_4ea269a2361e1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319266722, 1319266722, 'Khay úp ly (Khay rau quả)', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(135, 1, 0, 'R06', 'Rổ bán nguyệt...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>35x45x19</strong></p>', 'resized/R____b__n_nguy___4ea269e895f1f_90x90.jpg', 'R____b__n_nguy___4ea269e8999ba.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319266792, 1319266792, 'Rổ bán nguyệt', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(136, 1, 0, 'TR03', 'Thau Rổ Vuông...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>25x35x12</strong></p>', 'resized/Thau_R____Vu__ng_4ea26a493d8ef_90x90.jpg', 'Thau_R____Vu__ng_4ea26a4941b4b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319266889, 1319266889, 'Thau Rổ Vuông', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(137, 1, 0, 'R07', 'Rổ Sen...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ24X13</strong></p>', 'resized/R____Sen_4ea26a90ebfdd_90x90.jpg', 'R____Sen_4ea26a90f0e21.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319266960, 1319266960, 'Rổ Sen', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(138, 1, 0, 'R08', 'Rổ cán dài...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>23,5x36x11</strong></p>', 'resized/R____c__n_d__i_4ea26ac5836cb_90x90.jpg', 'R____c__n_d__i_4ea26ac58754b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267013, 1319267013, 'Rổ cán dài', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(139, 1, 0, 'K001', 'Kệ Chân Sắt K001...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>43x14,5x17</strong></p>', 'resized/K____Ch__n_S___t_4ea26c5108e47_90x90.jpg', 'K____Ch__n_S___t_4ea26c510c110.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267409, 1319267409, 'Kệ Chân Sắt K001', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(140, 1, 0, 'K002', 'Kệ Chân Sắt K002...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>30x18,5x14,5</strong></p>', 'resized/K____Ch__n_S___t_4ea26ca1cfa06_90x90.jpg', 'K____Ch__n_S___t_4ea26ca1d2cc3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267489, 1319267489, 'Kệ Chân Sắt K002', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(141, 1, 0, 'K003', 'Kệ ly lưới 3 tầng...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>44x30,5x56,5</strong></p>', 'resized/K____ly_l_____i__4ea26d01218ea_90x90.jpg', 'K____ly_l_____i__4ea26d012382e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267585, 1319267585, 'Kệ ly lưới 3 tầng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(142, 1, 0, 'K004', 'Kệ chân liền 2 tầng...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>35x28x27</strong></p>', 'resized/K____ch__n_li____4ea26d43471b6_90x90.jpg', 'K____ch__n_li____4ea26d434a0a3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267651, 1319267651, 'Kệ chân liền 2 tầng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(143, 1, 0, 'K005', 'Kệ ly bít 3 tầng...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>44x30,5x56,5</strong></p>', 'resized/K____ly_b__t_3_t_4ea26d92a9424_90x90.jpg', 'K____ly_b__t_3_t_4ea26d92acebe.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267730, 1319267730, 'Kệ ly bít 3 tầng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(144, 1, 0, 'K006', 'Kệ tam giác...', '<p>- Nguyên liệu: <strong>Kệ tam giác 2 tầng</strong><br />- Kích thước (DxRxC): <strong>26x42x35</strong></p>', 'resized/K____tam_gi__c_4ea26dee9b256_90x90.jpg', 'K____tam_gi__c_4ea26dee9ecf2.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267822, 1319267822, 'Kệ tam giác', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(145, 1, 0, 'K007', 'Kệ mâm 3 tầng...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>48,5x32,5x59,5</strong></p>', 'resized/K____m__m_3_t____4ea26e29337ae_90x90.jpg', 'K____m__m_3_t____4ea26e2936a78.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267881, 1319267881, 'Kệ mâm 3 tầng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(146, 1, 0, 'K008', 'Kệ lập thể ngang 5 tầng...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>28x36x71</strong></p>', 'resized/K____l___p_th____4ea26e8946faa_90x90.jpg', 'K____l___p_th____4ea26e8948b37.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319267977, 1319267977, 'Kệ lập thể ngang 5 tầng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(147, 1, 0, 'K009', 'Kệ lập thể chéo 12 tầng...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>28x38x123</strong></p>', 'resized/K____l___p_th____4ea26eefcf1aa_90x90.jpg', 'K____l___p_th____4ea26eefd1ca3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319268079, 1319268079, 'Kệ lập thể chéo 12 tầng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(148, 1, 0, 'Ca001', 'Can 30 lít Dẹp...', '<p>- Nguyên liệu: <strong>Can 30 lít dẹp</strong><br />- Kích thước (DxRxC): <strong>20x34x49</strong></p>', 'resized/Can_30_l__t_D____4ea273617a88d_90x90.jpg', 'Can_30_l__t_D____4ea273617df40.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319269217, 1319269217, 'Can 30 lít Dẹp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(149, 1, 0, 'Ca002', 'Can 2 lít ...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong><br />- Kích thước (DxRxC): <strong>Φ9x22</strong></p>', 'resized/Can_2_l__t_4ea273957363b_90x90.jpg', 'Can_2_l__t_4ea27395749bf.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319269269, 1319269269, 'Can 2 lít', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(150, 1, 0, 'Ca003', 'Can 5 lít Dẹp...', '<p>- Nguyên liệu: <strong>Can 5 lít dẹp</strong><br />- Kích thước (DxRxC): <strong>10x18x27</strong></p>', 'resized/Can_5_l__t_D___p_4ea273d1be25c_90x90.jpg', 'Can_5_l__t_D___p_4ea273d1c113a.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319269329, 1319269329, 'Can 5 lít Dẹp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(151, 1, 0, 'Ca004', 'Can 5 lít Vuông...', '<p>- Nguyên liệu: <strong>Can 5 lít vuông</strong><br />- Kích thước (DxRxC): <strong>15x15x24</strong></p>', 'resized/Can_5_l__t_Vu__n_4ea2742595cc1_90x90.jpg', 'Can_5_l__t_Vu__n_4ea274259936f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319269413, 1319269413, 'Can 5 lít Vuông', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(152, 1, 0, 'TDN001', 'Thùng đồ nghề...', '<p>- Nguyên liệu: <strong>Nhựa PP</strong></p>', 'resized/Th__ng_______Ngh_4ea2756894bbb_90x90.jpg', 'Th__ng_______Ngh_4ea2756897a9d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319269736, 1319269736, 'Thùng Đồ Nghề', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(153, 1, 0, 'TDN002', 'Thùng Đồ Nghề 3 Ngăn...', '<p>- Nguyên liệu: <strong>Hộp phụ tùng 3 ngăn</strong><br />- Kích thước (DxRxC): <strong>20x36x20</strong></p>', 'resized/Th__ng_______Ngh_4ea275b4d5014_90x90.jpg', 'Th__ng_______Ngh_4ea275b4d82d7.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319269812, 1319269812, 'Thùng Đồ Nghề 3 Ngăn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(154, 1, 0, 'TDN003', 'Thùng Đồ Nghề 2 Ngăn...', '<p>- Nguyên liệu: <strong>Hộp phụ tùng 2 ngăn</strong><br />- Kích thước (DxRxC): <strong>17x30x14</strong></p>', 'resized/Th__ng_______Ngh_4ea275f9509cc_90x90.jpg', 'Th__ng_______Ngh_4ea275f953ca5.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319269881, 1319269881, 'Thùng Đồ Nghề 2 Ngăn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(155, 1, 0, 'B001', 'Bàn Nhựa Chứ Nhật...', '<p> </p>\r\n<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>70 x 50 x 50.5 cm</strong></p>', 'resized/B__n_Nh___a_Ch___4ea277b655069_90x90.jpg', 'B__n_Nh___a_Ch___4ea277b657f3c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270326, 1319270326, 'Bàn Nhựa Chứ Nhật', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(156, 1, 0, 'G001', 'Ghế mini Vuông...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>23.5 x 23.5 x 15 cm</strong></p>', 'resized/Gh____mini_Vu__n_4ea2780e6b97c_90x90.jpg', 'Gh____mini_Vu__n_4ea2780e6ec55.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270414, 1319270414, 'Ghế mini Vuông', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(157, 1, 0, 'G002', 'Ghế mini Chữ Nhật...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>26 x 17 x 15 cm</strong></p>', 'resized/Gh____mini_Ch____4ea2784dd9734_90x90.jpg', 'Gh____mini_Ch____4ea2784ddca29.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270477, 1319270477, 'Ghế mini Chữ Nhật', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(158, 1, 0, 'G003', 'Ghế nhựa lùn lỗ...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>27.5 x 27.5 x 26 cm</strong></p>', 'resized/Gh____Nh___a_L___4ea2789a5facf_90x90.jpg', 'Gh____Nh___a_L___4ea2789a6317d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270554, 1319270554, 'Ghế Nhựa Lùn Lỗ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(159, 1, 0, 'G004', 'Ghế nhựa bành đan...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>46 x 49 x 69 cm</strong></p>', 'resized/Gh____Nh___a_B___4ea278e4a0379_90x90.jpg', 'Gh____Nh___a_B___4ea278e4a3643.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270628, 1319270628, 'Ghế Nhựa Bành Đan', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(160, 1, 0, 'G005', 'Ghế nhựa cao...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>34 x 34 x 45 cm</strong></p>', 'resized/Gh____Nh___a_Cao_4ea27939907f3_90x90.jpg', 'Gh____Nh___a_Cao_4ea2793993aeb.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270713, 1319270713, 'Ghế Nhựa Cao', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(161, 1, 0, 'G006', 'Ghế dựa lớn...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>52 x 42 x 84 cm</strong></p>', 'resized/Gh____D___a_L____4ea2796f257a8_90x90.jpg', 'Gh____D___a_L____4ea2796f28e66.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270767, 1319270767, 'Ghế Dựa Lớn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(162, 1, 0, 'G007', 'Ghế dựa nhỏ...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>39 x 34 x 64cm</strong></p>', 'resized/Gh____D___a_Nh___4ea279b92747b_90x90.jpg', 'Gh____D___a_Nh___4ea279b92ab38.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270841, 1319270841, 'Ghế Dựa Nhỏ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(163, 1, 0, 'G008', 'Ghế dựa lưới...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>34 x 39 x 64cm</strong></p>', 'resized/Gh____D___a_L____4ea27a183ef72_90x90.jpg', 'Gh____D___a_L____4ea27a184261c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319270936, 1319270936, 'Ghế Dựa Lưới', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(164, 1, 0, 'D001', 'Dây đai nhựa...', '', 'resized/D__y______i_Nh___4ea27e049cb16_90x90.jpg', 'D__y______i_Nh___4ea27e04a156a.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319271940, 1319271940, 'Dây Đại Nhựa', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(165, 1, 0, 'D002', 'Túi nilon 20x30...', '<p>Bịch nylon 20 x 30 (kg)</p>', 'resized/T__i_nilon_20x30_4ea27ea66f3e8_90x90.jpg', 'T__i_nilon_20x30_4ea27ea670f64.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319272102, 1319272102, 'Túi nilon 20x30', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` (`product_id`, `vendor_id`, `product_parent_id`, `product_sku`, `product_s_desc`, `product_desc`, `product_thumb_image`, `product_full_image`, `product_publish`, `product_weight`, `product_weight_uom`, `product_length`, `product_width`, `product_height`, `product_lwh_uom`, `product_url`, `product_in_stock`, `product_available_date`, `product_availability`, `product_special`, `product_discount_id`, `ship_code_id`, `cdate`, `mdate`, `product_name`, `product_sales`, `attribute`, `custom_attribute`, `product_tax_id`, `product_unit`, `product_packaging`, `child_options`, `quantity_options`, `child_option_ids`, `product_order_levels`) VALUES
(166, 1, 0, 'D003', 'Túi chân không...', '<p>Túi chân không.</p>', 'resized/T__i_Ch__n_Kh__n_4ea27f1d60ba9_90x90.jpg', 'T__i_Ch__n_Kh__n_4ea27f1d626fd.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319272221, 1319272221, 'Túi Chân Không', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(167, 1, 0, 'Cf001', 'Vinacafé 3 trong 1 hộp PS...', '<p>Hộp gồm 18gói Vinacafé 3 trong 1 nhãn vàng, là sự kết hợp hài hòa giữa   cà phê hòa tan Vinacafé với bột sữa công nghệ truyền thống Bắc Âu và   đường tinh luyện. Đây là sự lựa chọn cho những ai ưa thích hương vị của  cà phê sữa truyền  thống kiểu Việt Nam. Ly cà phê thơm ngon của Bạn sẽ  đầy đặn và đậm đà hơn với mỗi gói nhỏ 20  gam.</p>', 'resized/Vinacaf___3_tron_4ea2820a7015a_90x90.png', 'Vinacaf___3_tron_4ea2820a76eea.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319272970, 1319272970, 'Vinacafé 3 trong 1 hộp PS', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(168, 1, 0, 'Cf002', 'Vinacafé hòa tan đen lọ PET 50gam...', '<p>Kỹ thuật của Vinacafé đã khử được vị chua đặc trưng của cà phê hòa tan.  Hương vị thơm ngon thích hợp cho các minibar của các cao ốc văn phòng.  Đang được sử dụng trên các chuyến bay nội địa & quốc tế của Việt Nam  Airlines.</p>', 'resized/Vinacaf___h__a_t_4ea2827b8f544_90x90.png', 'Vinacaf___h__a_t_4ea2827b985d0.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319273083, 1319273083, 'Vinacafé hòa tan đen lọ PET 50gam', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(169, 1, 0, 'Cf003', 'Vinacafé 3 trong 1 bịch vàng...', '<p>Vinacafé 3 trong 1 bao vàng có hương vị độc đáo nhờ sự kết hợp hài hòa  giữa cà phê hòa tan chất lượng cao, bột sữa thực vật và đường tinh  luyện. Một ly Vinacafé 3 trong 1 vào đầu giờ làm việc giúp bạn sảng  khoái tinh thần, cơ thể thêm sức lực để có được năng suất và hiệu quả  cao hơn. Sản phẩm được ưa chuộng nhất tại Việt Nam. Đặc biệt thơm ngon  và đầy đặn với mỗi gói nhỏ 20  gam.</p>', 'resized/Vinacaf___3_tron_4ea282f15f5de_90x90.png', 'Vinacaf___3_tron_4ea282f166727.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319273201, 1319273201, 'Vinacafé 3 trong 1 bịch vàng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(170, 1, 0, 'Cf004', 'House Blend...', '<p>Được tuyển chọn những hạt cà phê ngon nhất của vùng đất Buôn Ma Thuột   kết hợp với công nghệ hiện đại và bí quyết chế biến huyền bí Phương Đông   cho ra sản phẩm: Hương thơm nồng, nước pha màu nâu sánh.</p>', 'resized/House_Blend_4ea2837f244d3_90x90.jpg', 'House_Blend_4ea2837f273ae.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319273343, 1319273343, 'House Blend', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(171, 1, 0, 'Cf005', 'Legendee ...', '<p>The Legend Coffee                                       Legendee là cà  phê được sản xuất theo phương pháp ủ men sinh học của  Trung Nguyên mang  đến cho bạn một hương vị cà phê thơm ngon, độc đáo và  hấp dẫn bậc  nhất. Legendee – Cà phê đặc biệt nhất thế giới.</p>', 'resized/Legendee_..._4ea283d5e7c0d_90x90.jpg', 'Legendee_..._4ea283d5eab1b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319273429, 1319273429, 'Legendee ...', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(172, 1, 0, 'Cf006', 'Cafe hòa tan G7 3 trong 1...', '<p>Cà phê hòa tan  G7 hội tụ những yếu tố đặc biêt nhất  thế giới: Nguyên liệu  tốt nhất,  công nghệ sản xuất hiện đại, bí quyết  Phương Đông độc đáo.<br /> <br /> Nhờ công nghệ chiết xuất chỉ chắt lọc những gì tinh túy nhất  từ hạt cà   phê nên G7 có được khẩu vị và hương thơm độc đáo mà không  một sản phẩm   cà phê hòa tan nào khác đạt được.</p>', 'resized/Cafe_H__a_Tan_G7_4ea2843671d46_90x90.jpg', 'Cafe_H__a_Tan_G7_4ea2843674ff6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319273526, 1319273526, 'Cafe Hòa Tan G7', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(173, 1, 0, 'NC001', 'Ngũ cốc dinh dưỡng dạng bịch...', '<p>Là sự kết hợp tuyệt vời của các loại ngũ cốc có hàm lượng dinh dưỡng cao  như lúa mạch, gạo, ngô (bắp), chiết xuất mạch nha, bột kem thực vật ...  Ngũ cốc dinh dưỡng Vinacafé có hương vị thơm ngon độc đáo và bổ dưỡng,  phù hợp với mọi lứa tuổi, tiện dụng mọi lúc, mọi nơi</p>', 'resized/Ng___C___c_Dinh__4ea285106c829_90x90.png', 'Ng___C___c_Dinh__4ea28510731d0.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319273744, 1319273744, 'Ngũ Cốc Dinh Dưỡng Bịch', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(174, 1, 0, 'NC002', 'Ngũ Cốc Dinh Dưỡng Vinacafe Hộp...', '<p>Là sự kết hợp tuyệt vời của các loại ngũ cốc có hàm lượng dinh dưỡng cao  như lúa mạch,  gạo, ngô (bắp), chiết xuất mạch nha, bột kem thực vật  ... Ngũ cốc dinh  dưỡng Vinacafé có hương vị thơm ngon độc đáo và bổ  dưỡng, phù hợp với  mọi lứa tuổi, tiện dụng mọi lúc, mọi nơi...</p>', 'resized/Ng___C___c_Dinh__4ea2856d8b13a_90x90.png', 'Ng___C___c_Dinh__4ea2856d91abf.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319273837, 1319273837, 'Ngũ Cốc Dinh Dưỡng Vinacafe Hộp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(175, 1, 0, 'NC003', 'Ngũ cốc DD Dế Mèn hộp 14 gói', '<p> </p>\r\n<div class="desc2">\r\n<div class="desCat1 lineTop" style="display: block;">\r\n<p>Được  phát triển dựa trên bột Ngũ cốc Dinh dưỡng Vinacafé tiện lợi, thơm ngon  và bổ dưỡng. Ngũ cốc dinh dưỡng  Dế mèn được bổ sung thêm nhiều  vitamin, khoáng chất và DHA/EPA, giúp phát triển tốt cả về thể chất và  trí  não. Sản phẩm đặc biệt thích hợp vớii lứa tuổi học đường.</p>\r\n</div>\r\n</div>', 'resized/Ng___c___c_DD_D__4ea2871b44478_90x90.png', 'Ng___c___c_DD_D__4ea2871b4b1bb.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319274267, 1319274267, 'Ngũ cốc DD Dế Mèn hộp 14 gói', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(176, 1, 0, 'NC004', 'Ngũ Cốc DD Dế Mèn bịch 14 gói ...', '<p>Được phát triển dựa trên bột Ngũ cốc Dinh dưỡng Vinacafé tiện lợi, thơm   ngon và bổ dưỡng. Ngũ cốc dinh dưỡng Dế Mèn được bổ sung thêm nhiều   vitamin, khoáng chất và DHA/EPA, giúp phát triển tốt cả về thể chất và   trí  não. Sản phẩm đặc biệt thích hợp với lứa tuổi học đường.</p>', 'resized/Ng___C___c_DD_D__4ea2874d44016_90x90.png', 'Ng___C___c_DD_D__4ea2874d4b179.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319274317, 1319274317, 'Ngũ Cốc DD Dế Mèn bịch 14 gói', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(177, 1, 0, 'Nc005', 'Ngũ Cốc Dinh Dưỡng NutiFood...', '<p> </p>\r\n<p style="line-height: 20px; font-weight: bold;" align="justify"><span style="font-family: Arial; font-size: x-small;">Ngũ cốc dinh dưỡng NutiFood là nguồn dinh dưỡng  thơm ngon tự nhiên, được bổ sung thêm hàm lượng Canxi hợp lý giúp ngăn ngừa  loãng xương, cộng thêm vitamin A và D giúp tối ưu hóa khả năng hấp thụ Canxi.</span></p>\r\n<p style="line-height: 20px;" align="justify"><span style="font-family: Arial; font-size: x-small;">Ngoài ra, chất xơ trong ngũ cốc còn giúp cải  thiện khả năng tiêu hóa, tăng cường sức khỏe và giúp phòng chống bệnh tật.</span></p>\r\n<p style="line-height: 20px;" align="justify"><span style="font-family: Arial; font-size: x-small;">Hãy tận hưởng một ngày trọn vẹn và hiệu quả cùng  Ngũ cốc dinh dưỡng có bổ sung Canxi của NutiFood.</span></p>', 'resized/Ng___C___c_Dinh__4ea287bae5e6e_90x90.gif', 'Ng___C___c_Dinh__4ea287bae8580.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319274426, 1319274426, 'Ngũ Cốc Dinh Dưỡng NutiFood', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(178, 1, 0, 'T001', 'Trà Atisô Xuất Khẩu 200gr ...', '<h2 class="contentheading">Loại trà: Trà bổ dưỡng, Trà Actiso</h2>\r\n<p>Dạng thành phẩm: Trà qua chế biến, Túi nhúng.\\</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<h2 class="contentheading"></h2>', 'resized/Tr___Atis___Xu___4ea28a128d9c1_90x90.jpg', 'Tr___Atis___Xu___4ea28a1291832.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319275026, 1319275174, 'Trà Atisô Xuất Khẩu 200gr', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(179, 1, 0, 'T002', 'Trà Atiso Đặc Sản Đà Lạt...', '<p><strong>Công dụng:</strong><br />- Giúp dễ ngủ, mát gan, thông mật, lợi tiểu, hạ cholesterrol máu và urê huyết. Dùng cho người yếu gan, thận, cao huyết áp.<br />- Kích thích tiêu hóa thích hợp cho mọi lứa tuổi<br />Thành phần:<br />- Atisô (thân, rễ, hoa)<br />- Cam Thảo<br />- Hương hoa tự nhiên<br />Quy cách đóng gói:<br />- Tui: 200 gói túi lọc x 2gram<br />- Block:<br />- Thùng carton: 36 túi</p>', 'resized/Tr___Atiso_______4ea28d449e956_90x90.jpg', 'Tr___Atiso_______4ea28d44a3b5a.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319275844, 1319275844, 'Trà Atiso Đặc Sản Đà Lạt', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(180, 1, 0, 'T003', 'Bông Atisô 500gr ...', '<p>Loại trà :    Trà bổ dưỡng, Trà Actiso<br />Dạng thành phẩm :    Trà qua chế biến, Gói     <br />Xuất xứ :    Việt Nam</p>', 'resized/B__ng_Atis___500_4ea28d89e9378_90x90.jpg', 'B__ng_Atis___500_4ea28d89ed5dd.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319275913, 1319275913, 'Bông Atisô 500gr', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(181, 1, 0, 'T004', 'Trà xanh bông cúc...', '<p>Loại trà :    Trà xanh<br />Dạng thành phẩm :    Trà qua chế biến, Túi nhúng     <br />Xuất xứ :    Việt Nam</p>', 'resized/Tr___Xanh_B__ng__4ea28dd1de550_90x90.jpg', 'Tr___Xanh_B__ng__4ea28dd1e1bfc.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319275985, 1319275985, 'Trà Xanh Bông Cúc', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(182, 1, 0, 'T005', 'Trà  xanh hòa lài...', '<p>Loại trà :    Trà xanh<br />Dạng thành phẩm :    Trà qua chế biến, Hộp Giấy<br />Xuất xứ :    Việt Nam</p>', 'resized/Tr___Xanh_Hoa_L__4ea28e080bca4_90x90.jpg', 'Tr___Xanh_Hoa_L__4ea28e080ef67.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319276040, 1319276040, 'Trà Xanh Hoa Lài', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(183, 1, 0, 'T006', 'Trà linh chi...', '<p>Trà linh chi có ưu điểm là điều chế đơn giản, sử dụng thuận tiện, không  phải đun nấu cầu kỳ như thuốc sắc. Người ta thường chọn mua loại nấm to,  lành lặn, dầy dặn và còn nguyên tán.<br /><br />Sau công đoạn làm sạch,  dùng dao thái vụn hoặc thái thành lát mỏng, càng vụn càng mỏng thì càng  tốt vì như vậy khi hãm với nước sôi mới chiết xuất được tối đa hoạt  chất.<br /><br />Cuối cùng đem sấy hoặc phơi thật khô rồi đựng trong lọ kín  dùng dần. Cũng có thể dùng máy tán thành dạng mịn như bông, cách này  giúp người ta sau khi hãm vừa uống được nước vừa ăn cả bã một cách dễ  dàng và tiết kiệm.<br />Hãng sản xuất Ganoderma<br />Xuất xứ: Bắc Triều Tiên</p>', 'resized/Tr___Linh_Chi_4ea28e3c74b71_90x90.jpg', 'Tr___Linh_Chi_4ea28e3c76ac6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319276092, 1319276092, 'Trà Linh Chi', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(184, 1, 0, 'T007', 'Mộc Hương Trà...', '<p>Mang hương vị mộc mạc, được trồng ở vùng đất trà nổi tiếng Thái Nguyên.  Trà được sử dụng rộng rãi trong các văn phòng công sở. Trà làm cho cơ  thể phấn chấn, tinh thần thoải mái, sáng suốt...</p>', 'resized/M___c_H____ng_Tr_4ea28ed5b8a9a_90x90.jpg', 'M___c_H____ng_Tr_4ea28ed5c0f7c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319276245, 1319276245, 'Mộc Hương Trà', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(185, 1, 0, 'T008', 'Thiên Kim Trà...', '<p>Trà thượng hạng được lấy từ đọt trà xanh, trồng tại vùng đất Tân Cương  Thái Nguyên. Đây chính là món quà của hương trời, vị đất, được chế biến  theo quy trình khép kín, an toàn, sạch. Trà này được dùng làm quà biếu,  tặng...</p>', 'resized/Thi__n_Kim_Tr___4ea28f2eba767_90x90.jpg', 'Thi__n_Kim_Tr___4ea28f2ec301e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319276334, 1319276334, 'Thiên Kim Trà', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(186, 1, 0, 'Duong001', 'Đường loại 1kg', '<p>Đường 1kg</p>', 'resized/_______ng_Lo___i_4ea291e86c6b0_90x90.jpg', '_______ng_Lo___i_4ea291e86fd18.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319277032, 1319277032, 'Đường Loại 1kg', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(187, 1, 0, 'S001', 'Sữa Đặc ông thọ trắng 380g...', '<p>Sữa Đặc ông thọ trắng 380g....</p>', 'resized/S___a______c___n_4ea292290e9e7_90x90.jpg', 'S___a______c___n_4ea2922911ce9.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319277097, 1319277097, 'Sữa Đặc Ông Thọ Trắng 380g', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(188, 1, 0, 'S002', 'Sữa Đặc Ngôi sao Phương Nam...', '<h1 class="mainbox-title">Sữa Đặc Ngôi sao Phương Nam đỏ 380gr</h1>', 'resized/S___a______c_Ng__4ea2928084abb_90x90.jpg', 'S___a______c_Ng__4ea2928087d7f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319277184, 1319277184, 'Sữa Đặc Ngôi sao Phương Nam', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(189, 1, 0, 'S003', 'Sữa vỉ ông thọ 50g...', '<p>Sữa vỉ ông thọ 50g...</p>', 'resized/S___a_V______ng__4ea292c04ff04_90x90.jpg', 'S___a_V______ng__4ea292c052dad.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319277248, 1319277248, 'Sữa Vỉ Ông Thọ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(190, 1, 0, 'S004', 'Sữa chua Yomost ...', '<h2 class="contentheading">Sữa chua Yomost...</h2>', 'resized/S___a_Chua_Yomos_4ea295b321f11_90x90.jpg', 'S___a_Chua_Yomos_4ea295b323a6b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278003, 1319278003, 'Sữa Chua Yomost', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(191, 1, 0, 'S005', 'Sữa Milo ...', '<h2 class="contentheading">Sữa Milo...</h2>', 'resized/S___a_Milo__4ea295dc15d91_90x90.jpg', 'S___a_Milo__4ea295dc178e4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278044, 1319278044, 'Sữa Milo', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(192, 1, 0, 'S006', 'Sữa đậu nành number one...', '<p>Sữa đậu nành number one...</p>', 'resized/S___a______u_N___4ea2961f75f75_90x90.jpg', 'S___a______u_N___4ea2961f77ad8.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278111, 1319278111, 'Sữa Đậu Nành Number one', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(193, 1, 0, 'Duong002', 'Đường Loại 0,5 kg...', '<p>Đường Loại 0,5 kg</p>\r\n<p>Nguyên liệu: Mía đường</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/_______ng_Lo___i_4ea29690cc5cd_90x90.jpg', '_______ng_Lo___i_4ea29690cfc84.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278224, 1319278224, 'Đường Loại 0,5 kg', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(194, 1, 0, 'NC006', 'Bột đậu xanh ...', '<p>Bột đậu xanh uống liền</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/B___t______u_Xan_4ea2971803918_90x90.jpg', 'B___t______u_Xan_4ea2971806800.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278360, 1319278360, 'Bột Đậu Xanh', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(195, 1, 0, 'X001', 'Xô nhựa 25 lít...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>36.5 x 38 cm</strong></p>', 'resized/X___nh___a_25_l__4ea2987a54102_90x90.jpg', 'X___nh___a_25_l__4ea2987a573c6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278714, 1319278714, 'Xô nhựa 25 lít', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(196, 1, 0, 'X002', 'Xô nhựa 35 lít...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>39 x 41.5 cm</strong></p>', 'resized/X___nh___a_35_l__4ea298ae4c6fe_90x90.jpg', 'X___nh___a_35_l__4ea298ae4f9c3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278766, 1319278766, 'Xô nhựa 35 lít', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(197, 1, 0, 'X003', 'Xô nhựa 90 lít...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>55 x 58 cm</strong></p>', 'resized/X___nh___a_90_l__4ea298ec8d278_90x90.jpg', 'X___nh___a_90_l__4ea298ec9054a.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278828, 1319278828, 'Xô nhựa 90 lít', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(198, 1, 0, 'X004', 'Xô nhựa 60 lít...', '<p>Đơn vị tính: <strong>Cái</strong></p>\r\n<p>Kích thước: <strong>49 x 52 cm</strong></p>', 'resized/X___Nh___a_60_l__4ea2992178185_90x90.jpg', 'X___Nh___a_60_l__4ea299217b7ed.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319241600, '', 'N', 0, NULL, 1319278881, 1319278881, 'Xô Nhựa 60 lít', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(199, 1, 0, 'U001', 'Ủng touring...', '<p><span id="advenueINTEXT">Yếu tố quan trọng nhất khi  mua ủng dành cho những chuyến touring hoặc dã ngoại chính là sự thoải  mái khi lên và xuống xe. Ủng touring thường được thiết kế với form vừa  vặn và thoải mái. Loại ủng này đi kèm với lớp bảo vệ xung quanh những  vùng dễ chấn thương nhưng không an toàn bằng ủng đua. Tương tự mọi loại  ủng môtô khác, chúng được thiết kế với mục đích ngăn chặn tai nạn trong  quá trình lái. Gót và bàn khá mềm mại nhưng vẫn kém ủng đua. Trái ngược  với sự sặc sỡ của ủng đua, màu đặc trưng của ủng touring là đen.</span></p>', 'resized/___ng_Touring_4ea365b50e8e7_90x90.jpg', '___ng_Touring_4ea365b516dec.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319331253, 1319331253, 'Ủng Touring', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(200, 1, 0, 'U002', 'Ủng cruising...', '<p><span id="advenueINTEXT">Nếu chuẩn bị đi chơi, hãy  chọn một đôi ủng thể hiện được cá tính của bạn. Phần lớn ủng cruising  đều màu đen nhưng nếu cố gắng tìm kiếm bạn sẽ chọn được một đôi dành  riêng cho phong cách của mình. Trước đây, khi chưa có ủng cruising, mọi  người thường dùng loại ủng đa chức năng để thay thế. Trừ khi được thiết  kế theo đơn đặt hàng, ủng cruising luôn hạn chế về khả năng bảo vệ cũng  như xoay. Do đó, điều cần lưu ý nhất khi mua ủng cruising là cảm giác  thoải mái và phong cách độc đáo.</span></p>', 'resized/___ng_cruising_4ea365eb14909_90x90.jpg', '___ng_cruising_4ea365eb177f1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319331307, 1319331307, 'Ủng cruising', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(201, 1, 0, 'U003', 'Ủng motocross...', '<p><span id="advenueINTEXT">\r\n<p class="pBody">Ủng  motocross được thiết kế chuyên dụng cho kiểu lái off-road, motocross  (MX) hoặc địa hình. Tương tự ủng đua, ủng motocross được đánh giá cao về  mặt kỹ thuật và khả năng bảo vệ khi chạy ở tốc độ cao. Do cứng hơn các  loại khác nên ủng motocross bảo vệ bàn và cẳng chân người sử dụng hiệu  quả hơn. Loại ủng này cao gần đến đầu gối và không mang đến cảm giác  thoải mái cho người sử dụng. Phần lớn các loại ủng motocross đều lót  thêm một miếng kim loại trong lõi lớp bảo vệ sao cho phù hợp với địa  hình hiểm trở. Bên cạnh đó, còn có một miếng bảo vệ cẳng chân ở mặt  trước nhằm tránh chấn thương cho người lái. Ủng motocross có rất nhiều  màu sắc ăn khớp với bộ đồ bảo vệ. Tuy nhiên, nếu để ý bạn có thể nhận ra  rằng hầu hết các tay lái đều chọn ủng màu trắng để tạo điểm nhấn cho  phần chân.</p>\r\n</span></p>', 'resized/___ng_motocross_4ea366376916b_90x90.jpg', '___ng_motocross_4ea366376cbfc.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319331383, 1319331383, 'Ủng motocross', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(202, 1, 0, 'U004', 'Ủng Cách Điện 35KV...', '<p>Tên sản phẩm : Ủng Cách Điện 35KV</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/___ng_C__ch___i__4ea367bfe9170_90x90.jpg', '___ng_C__ch___i__4ea367bfec437.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319331775, 1319331775, 'Ủng Cách Điện 35KV', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(203, 1, 0, 'DCVSI002', 'Cây lau sàn nhà...', '<p><span class="style5"><span id="dnn_ctr402_ViewSC_Product_Detail_lbDetai"><br /></span></span></p>', 'resized/C__y_lau_s__n_nh_4ea3696567d48_90x90.gif', 'C__y_lau_s__n_nh_4ea36965698ad.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319332197, 1319332197, 'Cây lau sàn nhà', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(204, 1, 0, 'U005', 'Ủng Đi Mưa Nilon...', '<p>Chất liệu: Nilon</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/___ng___i_M__a_N_4ea369a829075_90x90.png', '___ng___i_M__a_N_4ea369a82e663.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319332264, 1319332264, 'Ủng Đi Mưa Nilon', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(205, 1, 0, 'U006', 'Ủng chống hóa chất mũi thép...', '<p>THÔNG SỐ KỸ THUẬT</p>\r\n<p><strong style="margin: 0px; padding: 0px;">Tên SP: Ủng chống hóa chất mũi thép đế lót thép</strong><strong style="margin: 0px; padding: 0px; outline-width: 0px; font-size: 12px; background-color: transparent;"></strong><br style="margin: 0px; padding: 0px;" />Mầu sắc: vàng đế đen hoặc đen đế vàng.<br style="margin: 0px; padding: 0px;" /> Chất liệu: cao su siêu bền chống hóa chất có mũi sắt.<br style="margin: 0px; padding: 0px;" /> Kích cỡ: từ 38-43.<br style="margin: 0px; padding: 0px;" /> Đặc tính: loại ủng cao, chất liệu bền, dùng trong thi công hoặc nơi có vật rơi, đinh nhọn nguy hiểm.</p>', 'resized/___ng_Ch___ng_H__4ea36a3711d71_90x90.png', '___ng_Ch___ng_H__4ea36a371a23e.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319332407, 1319332407, 'Ủng Chống Hóa Chất', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(206, 1, 0, 'DCVSI003', 'Cây lau nhà được sử dụng với miếng thấm hút bằng mousse', '<p><span id="ctl00_ContentPlaceHolder1_ctrProducts_dvProducts_IT5_UProduct1_lblDescription" class="text">Cây  lau nhà được sử dụng với miếng thấm hút bằng mousse có thanh gạt nước  giúp cho việc vắt khô trở nên nhanh chóng. Kích thước gọn nhẹ với cán  inox có thể điều chỉnh được độ dài, tay cầm bọc nhựa giúp êm tay, dễ sử  dụng giúp làm sạch và khô nhanh chóng sàn nhà giúp tiết kiệm được thời  gian. Sản phẩm tiện lợi trên mọi loại sàn nhà như: gạch men, sàn gỗ, tấm  nhựa simili...</span></p>', 'resized/C__y_lau_s__n_nh_4ea36b4b8fbad_90x90.jpg', 'C__y_lau_s__n_nh_4ea36b4b978e6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319332683, 1319332683, 'Cây lau sàn nhà', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(207, 1, 0, 'GT001', 'Găng tay hạt chống nóng...', '<p>Tên sản phầm: Găng tay hạt chống nóng.</p>\r\n<p>Xuất xứ sản phẩm: Trung Quốc</p>', 'resized/G__ng_Tay_H___t__4ea36b749efde_90x90.jpg', 'G__ng_Tay_H___t__4ea36b74a7c84.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319332724, 1319332724, 'Găng Tay Hạt Chống Nóng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(208, 1, 0, 'GT002', 'Găng tay tráng PU...', '<p>Tên sản phẩm: Găng tay tráng PU...</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/G__ng_Tay_Trang__4ea36bcc342c8_90x90.png', 'G__ng_Tay_Trang__4ea36bcc390ff.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319332812, 1319332812, 'Găng Tay Trang PU', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(209, 1, 0, 'GT003', 'Găng tay dệt kim màu...', '<p>THÔNG SỐ KỸ THUẬT</p>\r\n<p><strong style="margin: 0px; padding: 0px;">Tên SP: Găng tay dệt kim mầu<br style="margin: 0px; padding: 0px;" /> </strong>Mầu sắc: mầu xanh.<br style="margin: 0px; padding: 0px;" /> Chất liệu: vải đông xuân pha.<br style="margin: 0px; padding: 0px;" /> Đặc tính: bảo vệ tay, dùng trong phòng thí nghiệm</p>', 'resized/G__ng_Tay_D___t__4ea36c1edd8ce_90x90.png', 'G__ng_Tay_D___t__4ea36c1ee136a.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319332894, 1319332894, 'Găng Tay Dệt Kim Màu', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(210, 1, 0, 'GT004', 'Găng tay chống hóa chất chuyên dung...', '<p>Tên sản phẩm: Găng tay chống hóa chất chuyên dụng</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/G__ng_Tay_Ch___n_4ea36d4d23871_90x90.jpg', 'G__ng_Tay_Ch___n_4ea36d4d27708.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333197, 1319333197, 'Găng Tay Chống Hóa Chất Chuyên Dụng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(211, 1, 0, 'GT005', 'Găng tay chịu nhiệt...', '<p>Tên sản phẩm : Găng tay chịu nhiệt</p>\r\n<p>Thông số kỹ thuât: Chịu dc nhiệt độ cao</p>\r\n<p>Xuất xứ sản phầm: Việt nam</p>', 'resized/G__ng_Tay_Ch___u_4ea36dc32699c_90x90.jpg', 'G__ng_Tay_Ch___u_4ea36dc32b3c9.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333315, 1319333315, 'Găng Tay Chịu Nhiệt', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(212, 1, 0, 'GT006', 'Găng tay chống lạnh...', '<p>Tên sản phẩm: Găng tay chống lạnh</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/G__ng_Tay_Ch___n_4ea36e1ce463a_90x90.jpg', 'G__ng_Tay_Ch___n_4ea36e1ce7138.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333404, 1319333404, 'Găng Tay Chống Lạnh', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(213, 1, 0, 'GT007', 'Găng tay chống dầu, hóa chất...', '<p>Tên sản phẩm: Găng tay chống dầu, hóa chất.</p>\r\n<p>Xuấ xứ: Việt nam</p>', 'resized/G__ng_Tay_Ch___n_4ea36e809054a_90x90.jpg', 'G__ng_Tay_Ch___n_4ea36e80943d6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333504, 1319333504, 'Găng Tay Chống Dầu, Hóa chất', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(214, 1, 0, 'GT008', 'Găng tay chống cắt sợi...', '<p>Tên sản phẩm: Găng tay chống cắt</p>\r\n<p>Xuất xứ: Trung quốc</p>', 'resized/G__ng_Tay_Ch___n_4ea36ecf204ba_90x90.jpg', 'G__ng_Tay_Ch___n_4ea36ecf22fab.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333583, 1319333583, 'Găng Tay Chống Cắt', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(215, 1, 0, 'DCVSI004', 'Bông lau là những sợi bông nhỏ liti kết lại siêu thấm nước được nhập khẩu từ Đoài Loan', '<p>Bông lau là những sợi bông nhỏ liti kết lại siêu thấm nước được nhập khẩu từ Đoài Loan<br /><br />Thiết kế đầu lau đọc đáo có thể xoay 360 độ, cho nên bạn có thể lau mọi ngóc ngách hay vị trí khó lau như: Sàn giường, sàn tủ bàn, ghế, trên tường, trần nhà, ..Một cách nhanh chống và tiện lợi và sạch sẽ.<br /><br />Thân cây lau làm bẳng nhôm tổng hợp siêu nhẹ siêu bền.Hệ thống cần gạt điều khiển khi lau hay vắt nước.<br /><br />Thùng nhựa  6L, làm bằng nhựa nguyên sinh màu nâu sạch sẽ .<br /><br />Thiết kế phù hợp cho mọi nhà.<br /><br />Nguyên liệu nhập khẩu từ Đoài Loan, lắp ráp Việt Nam.</p>', 'resized/C__y_lau_s__n_nh_4ea36edc88d30_90x90.jpg', 'C__y_lau_s__n_nh_4ea36edc8d735.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333596, 1319333596, 'Cây lau sàn nhà Đài Loan', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(216, 1, 0, 'KM001', 'Kính bảo hộ...', '<p><strong style="margin: 0px; padding: 0px;">Tên SP: Kính bảo hộ bao ngoài kính cận Malaisia.<br style="margin: 0px; padding: 0px;" /> </strong>Mầu sắc: đen đổi mầu, trong suốt và tráng bạc.<br style="margin: 0px; padding: 0px;" /> Chất liệu: Nhựa .<br style="margin: 0px; padding: 0px;" /> Đặc tính: dùng trong công nghiệp cắt, mài, chống bụi và bảo vệ mắt bằng tiêu chuẩn chống lóa UV.</p>', 'resized/K__nh_B___o_H____4ea36f8730403_90x90.jpg', 'K__nh_B___o_H____4ea36f8731fa1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333767, 1319333767, 'Kính Bảo Hộ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(217, 1, 0, 'DCVSI005', 'Lau nhà cửa, sàn, ...', '', 'resized/C__y_lau_nh___Si_4ea36f97c00d9_90x90.jpg', 'C__y_lau_nh___Si_4ea36f97c3399.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319333783, 1319333783, 'Cây lau nhà Sitaco', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(218, 1, 0, 'DCVSI006', 'Màu sắc: màu vàng nghệ', '<p>Màu sắc: màu vàng nghệ<br />Thùng nhựa APP,<br />Dung tích: 7 lít<br />Chịu va đập cao<br />Sản phẩm bảo hành 6 tháng</p>', 'resized/Ch___i_lau_nh____4ea3707420ebd_90x90.jpg', 'Ch___i_lau_nh____4ea3707426496.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334004, 1319334004, 'Chổi lau nhà đa năng Kangaroo KG-91', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(219, 1, 0, 'A001', 'Mẫu 1...', '', 'resized/M___u_1_4ea370cd2db4d_90x90.jpg', 'M___u_1_4ea370cd311f6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334093, 1319334093, 'Mẫu 1', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(220, 1, 0, 'A002', 'Mẫu 2...', '', 'resized/M___u_2_4ea3710706f60_90x90.jpg', 'M___u_2_4ea3710708ea3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334151, 1319334151, 'Mẫu 2', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(221, 1, 0, 'A003', 'Mẫu 3...', '', 'resized/M___u_3_4ea3712b1f8e8_90x90.jpg', 'M___u_3_4ea3712b21ff1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334187, 1319334187, 'Mẫu 3', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(222, 1, 0, 'A004', 'Mẫu 4...', '', 'resized/M___u_4_4ea3714dd9d06_90x90.jpg', 'M___u_4_4ea3714ddd7a3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334221, 1319334221, 'Mẫu 4', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(223, 1, 0, 'DCVSI007', 'Cây chổi lau nhà thông minh 360 độ xuất xứ từ Thái Lan', '<p><span style="font-size: x-small;">C<span>ây chổi lau nhà thông minh 360 độ xuất xứ từ Thái  Lan được ra đời là giải pháp tuyệt vời bảo vệ làn da đôi bàn tay của chị  em phụ nữ.</span> C<span>ó thể lau 360 độ, lau gầm giường, gầm tủ thấp,  lau cầu thang, lau tường, lau kính, lau khe tủ hẹp...... mà những cây  lau nhà thông thường ko thể làm được việc đó. Và điều quan trọng nhất là  giúp chị em Phụ nữ khi lau nhà ko phải quỳ gối hoặc khom lưng như khi  sử dụng giẻ lau hoặc cây lau nhà thông thường vì điều này cực kỳ ảnh  hưởng đến cột sống vốn dĩ đã rất yếu của chị em gây nên những cơn đau  lưng ko hề được mong muốn.</span></span></p>\r\n<p><span style="font-size: x-small;"> Cây lau nhà thông minh 360 độ có thể đứng ở 90 độ  nghiêng 180 độ xoay vòng 360 độ. Sợi vải của đầu lau được làm bằng sợi  RU.cán lau gọn nhẹ bền bởi 3 ống thép không gỉ dạng loại 3 ống<strong> <br /></strong></span></p>', 'resized/Ch___i_lau_nh____4ea37168d0d8a_90x90.jpg', 'Ch___i_lau_nh____4ea37168d6372.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334248, 1319334248, 'Chổi lau nhà 360 độ Sooxto', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(224, 1, 0, 'A005', 'Mẫu 5...', '', 'resized/M___u_5_4ea371713d046_90x90.jpg', 'M___u_5_4ea37171406f6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334257, 1319334257, 'Mẫu 5', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(225, 1, 0, 'A006', 'Mẫu 6...', '', 'resized/M___u_6_4ea37193c9d7c_90x90.jpg', 'M___u_6_4ea37193cd42e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334291, 1319334291, 'Mẫu 6', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(226, 1, 0, 'A007', 'Mẫu 7', '', 'resized/M___u_7_4ea371bad43b6_90x90.jpg', 'M___u_7_4ea371bad7e55.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334330, 1319334330, 'Mẫu 7', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(227, 1, 0, 'A008', 'Mẫu số 8...', '', 'resized/M___u_8_4ea371f6d7b3c_90x90.jpg', 'M___u_8_4ea371f6d9a9f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334390, 1319334390, 'Mẫu 8', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(228, 1, 0, 'DCVSI0076', 'chất liệu nhựa P...', '<p>chất liệu nhựa PP, thân cây inox 100%, chiều dài thân cây 1m30, bông lau bằng sợi Ru microfiber</p>', 'resized/C__y_lau_nh___t__4ea3728be6bfb_90x90.png', 'C__y_lau_nh___t__4ea3728bec243.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319334539, 1319334539, 'Cây lau nhà tự hãm CLN004', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(229, 1, 0, 'AP001', 'Áo phao cỡ lớn', '', 'resized/__o_Phao_c____l__4ea3747776f67_90x90.jpg', '__o_Phao_c____l__4ea374777d131.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335031, 1319335031, 'Áo Phao cỡ lớn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(230, 1, 0, 'DCVSI011', 'Thùng rác đạp', '', 'resized/Th__ng_r__c______4ea374815fa07_90x90.jpg', 'Th__ng_r__c______4ea3748162cd4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335041, 1319335041, 'Thùng rác đạp(I.0416)', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(231, 1, 0, 'A009', 'Áo chống cháy...', '', 'resized/__o_Ch___ng_Ch___4ea375282e712_90x90.jpg', '__o_Ch___ng_Ch___4ea37528340ec.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335208, 1319335208, 'Áo Chống Cháy', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(232, 1, 0, 'AP002', 'Áo phao cỡ trung...', '', 'resized/__o_Phao_C____Tr_4ea37577432ff_90x90.jpg', '__o_Phao_C____Tr_4ea37577447c6.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335287, 1319335287, 'Áo Phao Cỡ Trung', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(233, 1, 0, 'DCVSI0051', 'Loại: Thúng, sọt rác / Dùng trong: Nhà bếp, phòng ăn', '<p><strong><a href="http://www.vatgia.com/s/vi%e1%bb%87t+nam"><br /></a></strong></p>', 'resized/S___t_r__c_vu__n_4ea376541073d_90x90.jpg', 'S___t_r__c_vu__n_4ea3765413613.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335306, 1319335508, 'Sọt rác vuông(I980411)', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(234, 1, 0, 'AP003', 'Áo phao phản quang...', '', 'resized/__o_Phao_Ph___n__4ea3760403816_90x90.jpg', '__o_Phao_Ph___n__4ea3760406ec4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335428, 1319335428, 'Áo Phao Phản Quang', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(235, 1, 0, 'AP004', 'Phao cứu sinh tròn...', '<p><span style="font-size: small;">Phao cứu sinh tròn.<br /> Vỏ bằng vải tổng hợp có màu sắc: Trắng đỏ + Da cam.<br /> Ruột bằng vật liệu nổi tổng hợp.<br /> Kiểm tra chất lượng theo Tiêu chuẩn hiện hành.<br /> Xuất xứ: Việt nam</span></p>', 'resized/Phao_C___u_Sinh__4ea376673158e_90x90.jpg', 'Phao_C___u_Sinh__4ea3766736f81.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335527, 1319335527, 'Phao Cứu Sinh Tròn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(236, 1, 0, 'AP005', 'Bè cứu sinh...', '<p><span style="font-size: small;">Vật liệu : Composite Kích thước : </span></p>\r\n<p style="padding-left: 30px;"><span style="font-size: small;">AB.931/4 loại 4 người.</span></p>\r\n<p style="padding-left: 30px;"><span style="font-size: small;">AB.931/8 loại 8 người.</span></p>\r\n<p style="padding-left: 30px;"><span style="font-size: small;">AB.931/12 loại 12 người</span></p>\r\n<p><span style="font-size: small;">TCVN 5801 – 5811:1993</span></p>\r\n<p><span style="font-size: small;">Xuất xứ: Việt nam</span></p>', 'resized/B___C___u_Sinh_4ea376e6b1c3a_90x90.gif', 'B___C___u_Sinh_4ea376e6b6a59.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319335654, 1319335654, 'Bè Cứu Sinh', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(237, 1, 0, 'AP006', 'Áo phao cho trẻ....', '<p>+ Áo bơi cho bé được làm bằng chất liệu từ nhựa PVC rất trơn và mềm mại. Có phao bơm khí tùy chọn cho bạn.</p>\r\n<p>+ Kiểu dáng sang trọng, màu sắc đa dạng và đẹp có nhiều loại màu cho bé chọn.</p>\r\n<p>+ Áo bơi cho bé có nhiều hình thù hoạt hình khiến bé sẽ thích thú hơn.</p>\r\n<p>+ Dùng cho bé từ 3 - 6 tuổi.</p>\r\n<p>+ Áo bơi cho bé của hãng Intex, sx tại Trung Quốc</p>', 'resized/__o_Phao_Cho_Tr__4ea378b92417c_90x90.jpg', '__o_Phao_Cho_Tr__4ea378b927c07.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336121, 1319336121, 'Áo Phao Cho Trẻ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(238, 1, 0, 'MN001', 'Mặt nạ hàn...', '<p>Tên Sản phẩm: Mặt Nạ Hàn</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/M___t_N____H__n_4ea379007e8cb_90x90.gif', 'M___t_N____H__n_4ea3790083301.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336192, 1319336192, 'Mặt Nạ Hàn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(239, 1, 0, 'MN002', 'Mũ bảo hộ kết hợp...', '<p>Tên sản phẩm: Mũ bảo hộ kết hợp</p>\r\n<p>Mô tả: Có vành nhôm bao quanh</p>', 'resized/M___B___o_H____K_4ea379c17b57c_90x90.jpg', 'M___B___o_H____K_4ea379c18ab95.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336385, 1319336385, 'Mũ Bảo Hộ Kết Hợp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(240, 1, 0, 'MN003', 'Mặt nạ dưỡng khí...', '<p>Tên sản phẩm: Mặt nạ dưỡng khí</p>\r\n<p>Xuất xứ: Việt nam</p>\r\n<p> </p>', 'resized/M___t_N____D_____4ea37a11af180_90x90.jpg', 'M___t_N____D_____4ea37a11b9d54.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336465, 1319336465, 'Mặt Nạ Dưỡng Khí', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(241, 1, 0, 'MN004', 'Mặt nạ phòng độc...', '<p>Tên sản phẩm: Mặt nạ phòng độc chụp kín mặt</p>\r\n<p>Xuất xứ: Nga</p>', 'resized/M___t_N____Ph__n_4ea37a7a31f46_90x90.jpg', 'M___t_N____Ph__n_4ea37a7a3c384.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336570, 1319336570, 'Mặt Nạ Phòng Độc Chụp Kín Mặt', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(242, 1, 0, 'MN005', 'Mặt Nạ Phòng Độc NGP Mỹ...', '<p>Tên sản phẩm: Mặt Nạ Phòng Độc NGP Mỹ</p>\r\n<p>Xuất xứ: Mỹ</p>', 'resized/M___t_N____Ph__n_4ea37ac5a6f43_90x90.jpg', 'M___t_N____Ph__n_4ea37ac5b3aa8.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336645, 1319336645, 'Mặt Nạ Phòng Độc NGP Mỹ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(243, 1, 0, 'MN006', 'Mặt nạ phòng độc cao cấp...', '<p>Tên sản phẩm: Mặt nạ chống độc cao cấp</p>\r\n<p>xuất xứ: Đang cập nhật</p>', 'resized/M___t_N____Ph__n_4ea37b2f9d861_90x90.jpg', 'M___t_N____Ph__n_4ea37b2fabeda.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336751, 1319336751, 'Mặt Nạ Phòng Độc Cao Cấp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(244, 1, 0, 'MN007', 'Mặt nạ hàn Việt....', '<p>Tên sản phẩm: Mặt nạ hàn</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/M___t_N____H__n__4ea37b764cdaf_90x90.gif', 'M___t_N____H__n__4ea37b7653ef5.gif', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336822, 1319336822, 'Mặt Nạ Hàn Việt Nam', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(245, 1, 0, 'KM002', 'Kính bảo hộ việt...', '<p>Tên sản phẩm: Mặt kính bảo hộ</p>\r\n<p>Xuất xứ: Việt Nam</p>', 'resized/K__nh_B___o_H____4ea37bf674a2d_90x90.jpg', 'K__nh_B___o_H____4ea37bf67984c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319336950, 1319336950, 'Kính Bảo Hộ Việt Nam', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(246, 1, 0, 'BT001', 'Bịt tai chống ồn Đài Loan...', '<p>Tên sản phẩm: Bịt tai chống ồn Đài Loan</p>\r\n<p>Xuất xứ :Đài Loan</p>', 'resized/B___t_Tai_Ch___n_4ea37d538a22c_90x90.jpg', 'B___t_Tai_Ch___n_4ea37d5392af3.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319337299, 1319337299, 'Bịt Tai Chống Ồn Đài Loan', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');
INSERT INTO `jos_vm_product` (`product_id`, `vendor_id`, `product_parent_id`, `product_sku`, `product_s_desc`, `product_desc`, `product_thumb_image`, `product_full_image`, `product_publish`, `product_weight`, `product_weight_uom`, `product_length`, `product_width`, `product_height`, `product_lwh_uom`, `product_url`, `product_in_stock`, `product_available_date`, `product_availability`, `product_special`, `product_discount_id`, `ship_code_id`, `cdate`, `mdate`, `product_name`, `product_sales`, `attribute`, `custom_attribute`, `product_tax_id`, `product_unit`, `product_packaging`, `child_options`, `quantity_options`, `child_option_ids`, `product_order_levels`) VALUES
(247, 1, 0, 'BT002', 'Nút bịt tai chống ồn 3M 1270...', '<p>Tên sản phẩm: Nút bịt tai chống ồn 3M 1270</p>', 'resized/N__t_B___t_Tai_C_4ea37ed4c9cf2_90x90.jpg', 'N__t_B___t_Tai_C_4ea37ed4d6fdf.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319337684, 1319337684, 'Nút Bịt Tai Chống Ồn 3M 1270', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(248, 1, 0, 'BT003', 'Bịt tai chống ồn H9A 3M', '<p>Tên sản phẩm: Bịt tai chống ồn H9A 3M</p>\r\n<p>Xuất xứ: Đang cập nhật</p>', 'resized/B___t_tai_ch___n_4ea37f26e4251_90x90.jpg', 'B___t_tai_ch___n_4ea37f26e7ceb.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319337766, 1319337766, 'Bịt tai chống ồn H9A 3M', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(249, 1, 0, 'BT004', 'Nút tai Chống ồn 3M-340...', '<p>Tên sản phẩm: Nút tai Chống ồn 3M-340</p>\r\n<p>Xuất xứ: Đang cập nhật.</p>', 'resized/N__t_tai_Ch___ng_4ea380f25edf6_90x90', 'N__t_tai_Ch___ng_4ea380f25f1ea.', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319337972, 1319338226, 'Nút tai Chống ồn 3M-340', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(250, 1, 0, 'KT001', 'Khẩu Trang Y Tế 3 Lớp...', '<p>Khẩu trang y tế 3 lớp <strong><span style="color: #ff0000;">(1 hộp 50 cái)</span></strong> phòng  bệnh và cúm. Nó có 3 ưu điểm là: ôm khít vùng miệng và mũi người dùng  (do có miếng sắt ép khẩu trang vào sống mũi, có nhiều kích cỡ khác nhau  để người dùng chọn lựa cho phù hợp). Lọc được các tác nhân gây bệnh có  kích thước từ 1-10 micrômét. Không thấm dịch từ ngoài bắn vào (do bệnh  nhân ho, hắt hơi không kịp che miệng). Khẩu trang này chỉ dùng cho những  người tiếp xúc với bệnh nhân nhiễm virut, vi khuẩn gây bệnh đường hô  hấp (SARS, cúm A (H1N1), (H5N1), lao phổi...). Khi loại bỏ phải xử lý  theo chế độ rác thải y tế độc hại.</p>', '', '', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319339214, 1319339214, 'Khẩu Trang Y Tế 3 Lớp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(251, 1, 0, 'KT002', 'Khẩu Trang Y Tế 2 Lớp...', '<p>Khẩu trang y tế 2 lớp, <strong><span style="color: #ff0000;">(1 hộp 100 cái)</span></strong> sử  dụng một lần có tác dụng phòng, ngăn chặn virut cúm A/H1N1,Lọc được các  tác nhân gây bệnh có kích thước từ 1-10 micrômét. Không thấm dịch từ  ngoài bắn vào (do bệnh nhân ho, hắt hơi không kịp che miệng). Khẩu trang  này chỉ dùng cho những người tiếp xúc với bệnh nhân nhiễm virut, vi  khuẩn gây bệnh đường hô hấp (SARS, cúm A (H1N1), (H5N1), lao phổi...).  Khi loại bỏ phải xử lý theo chế độ rác thải y tế độc hại.</p>', 'resized/Kh___u_Trang_Y_T_4ea38519cbcf6_90x90.jpg', 'Kh___u_Trang_Y_T_4ea38519cff5e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319339289, 1319339289, 'Khẩu Trang Y Tế 2 Lớp', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(252, 1, 0, 'KT003', 'Khẩu Trang Chứ Than Hoạt Tính...', '<p><span style="font-family: Tahoma; font-size: small;">Khẩu trang chứa than hoạt tính: có 2 loại  là loại có lớp vải dệt sợi hoạt tính may liền và loại có tấm ép than  hoạt tính đặt ở giữa 2 lớp vải. Khi giặt thì tháo tấm ép than hoạt ra  (như kiểu giặt áo gối). Các loại này đều có cấu tạo hình phễu ôm lấy mũi  và miệng. </span></p>', 'resized/Kh___u_Trang_Ch__4ea3859a13b23_90x90.jpg', 'Kh___u_Trang_Ch__4ea3859a16dea.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319339418, 1319339418, 'Khẩu Trang Chứ Than Hoạt Tính', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(253, 1, 0, 'KT004', 'Khẩu Trang NeoMask VC65...', '<p><span style="font-size: small;"><span style="font-weight: bold;">Đặc tính sản phẩm</span><br />-    Khẩu trang NeoMask VC 65 bảo vệ sức khỏe, chống không khí ô nhiễm,  ứng   dụng công nghệ nước ngoài với nguyên liệu hoàn toàn ngoại nhập.<br />-    Khẩu trang NeoMask VC 65 gồm 3 lớp: 1, một lớp lọc bụi cao cấp – 2,  một   lớp than hoạt tính – 3, lớp vải thấm mồ hôi tạo sự thoải mái khi  sử  dụng  sản phẩm.<br /><span style="font-weight: bold;">Bộ lọc của Neomask VC65</span><br />-    Được chế tạo bằng than hoạt tính ép trong vải không dệt (Activated    Carbon Non – Woven) ngăn ngừa được hầu hết sự thâm nhập vào đường hô hấp    của các hạt bụi cực nhỏ và các chất thải ô nhiễm khác.<br />- Lọc hầu hết các mùi hôi, hóa chất, mùi xăng xe và khói.<br />- Bảo vệ hệ hô hấp, giúp hạn chế viêm mũi dị ứng do các chất ô nhiễm trong không khí gây ra.<br />- Bộ lọc đạt tiêu chuẩn Q/320602 DTB01-2002</span></p>', 'resized/Kh___u_Trang_Neo_4ea387edc1ae7_90x90.jpg', 'Kh___u_Trang_Neo_4ea387edc5954.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319340013, 1319340013, 'Khẩu Trang NeoMask VC65', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(254, 1, 0, 'KT005', 'Khẩu trang cao cấp Neomask NC-95...', '<p>Tên sản phẩm: Khẩu trang cao cấp Neomask NC-95</p>\r\n<p>Xuất xứ: Việt Nam</p>\r\n<p>Chất liệu: Dạ</p>\r\n<p> </p>', 'resized/Kh___u_trang_cao_4ea3889ee588f_90x90.jpg', 'Kh___u_trang_cao_4ea3889ee9ef9.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319340190, 1319340190, 'Khẩu trang cao cấp Neomask NC-95', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(255, 1, 0, 'KT006', 'Khẩu trang than hoạt tính DR.KIM 01...', '<table class="technical_table" style="height: 24px;" border="0" cellspacing="0" cellpadding="0" width="1" align="center">\r\n<tbody>\r\n<tr>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n</tr>\r\n<tr>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n</tr>\r\n<tr>\r\n<td class="name"></td>\r\n<td class="value"></td>\r\n</tr>\r\n</tbody>\r\n</table>', 'resized/Kh___u_trang_tha_4ea389d2d1cb5_90x90.jpg', 'Kh___u_trang_tha_4ea389d2d5f2d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319340498, 1319340498, 'Khẩu trang than hoạt tính DR.KIM 01', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(256, 1, 0, 'KT007', 'Khẩu trang than hoạt tính AnviLife 01...', '', 'resized/Kh___u_trang_tha_4ea38a1d47ecb_90x90.jpg', 'Kh___u_trang_tha_4ea38a1d4c15b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319340573, 1319340573, 'Khẩu trang than hoạt tính AnviLife 01', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(257, 1, 0, 'KT008', 'Khẩu trang than hoạt tính AnviLife 02...', '<h1>Khẩu trang than hoạt tính AnviLife 02...</h1>', 'resized/Kh___u_trang_tha_4ea38a5135544_90x90.jpg', 'Kh___u_trang_tha_4ea38a5139b86.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319340625, 1319340625, 'Khẩu trang than hoạt tính AnviLife 02', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(258, 1, 0, 'KT009', 'Khẩu trang hoạt tính DR.KIM 02...', '<h1>Khẩu trang hoạt tính DR.KIM 02...</h1>', 'resized/Kh___u_trang_ho__4ea38a8e36154_90x90.jpg', 'Kh___u_trang_ho__4ea38a8e3a3be.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319340686, 1319340686, 'Khẩu trang hoạt tính DR.KIM 02', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(259, 1, 0, 'KT010', 'Khẩu trang sợi hoạt tính DR.KIM 03...', '<h1>Khẩu trang sợi hoạt tính DR.KIM 03...</h1>', 'resized/Kh___u_trang_s___4ea38ac4e1246_90x90.jpg', 'Kh___u_trang_s___4ea38ac4e54b2.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319340740, 1319340740, 'Khẩu trang sợi hoạt tính DR.KIM 03', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(260, 1, 0, 'DD001', 'Dây dù...', '<p>Dây dù được sản xuất bằng chất liệu sợi tổng hợp sử dụng kỹ thuật đan bện tiên tiến trên dây chuyền hiện đại, đảm bảo độ bền chắc và chất lượng sử dụng lâu dài theo yêu cầu, luôn tương thích với mọi mục đích sử dụng.Độ dài bất kỳ (theo đơn đặt hàng).Chất liệu: Sợi tổng hợp Polyete 1 hoặc: Sợi tổng hợp PP 2/3.</p>', 'resized/D__y_d___4ea38c6900e90_90x90.jpg', 'D__y_d___4ea38c69058d4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341161, 1319341161, 'Dây dù', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(261, 1, 0, 'DD002', 'Dây đai an toàn A1 ...', '<p>Dây đeo: Dài 200 hoặc 500 cm, rộng 4,7 cm</p>\r\n<p>Dây  đai bụng: Dài 150 cm, rộng 4,7 cm</p>\r\n<p>Tải trọng: 1850 kg</p>\r\n<p>Màu sắc: vàng, xanh</p>\r\n<p>Chất liệu: Sợi bạt có độ bền cao - Móc nhỏ/to mạ niken/kẽm</p>', 'resized/D__y___ai_an_to__4ea38cdc731b4_90x90.jpg', 'D__y___ai_an_to__4ea38cdc7702b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341276, 1319341276, 'Dây đai an toàn A1', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(262, 1, 0, 'DD003', 'Dây đai an toàn A1 ...', '<p>Dây đeo: Dài 200 hoặc 500 cm, rộng 4,7 cm</p>\r\n<p>Dây  đai bụng: Dài 150 cm, rộng 4,7 cm</p>\r\n<p>Tải trọng: 1850 kg</p>\r\n<p>Màu sắc: vàng, xanh</p>\r\n<p>Chất liệu: Sợi bạt có độ bền cao - Móc nhỏ/to mạ niken/kẽm</p>', 'resized/D__y___ai_an_to__4ea38d0b9d1b9_90x90.jpg', 'D__y___ai_an_to__4ea38d0ba141e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341323, 1319341323, 'Dây đai an toàn A1', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(263, 1, 0, 'DD004', 'Dây đai an toàn A2 ...', '<p>Dây đeo: Dài 200 cm, rộng 4,7 cm</p>\r\n<p>Dây  đai bụng: Dài 150 cm, rộng 4,7 cm</p>\r\n<p>Tải trọng: 1700 kg</p>\r\n<p>Màu sắc: xanh lá cây</p>\r\n<p>Chất liệu: Sợi bạt có độ bền cao - Móc nhỏ mạ niken/kẽm</p>', 'resized/D__y___ai_an_to__4ea38d61140e1_90x90.jpg', 'D__y___ai_an_to__4ea38d611a66e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341409, 1319341409, 'Dây đai an toàn A2', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(264, 1, 0, 'DD005', 'Dây đai an toàn A4', '<p>Dây đeo: Dài 200 cm, rộng 4,7 cm</p>\r\n<p>Dây  đai bụng: Dài 150 cm, rộng 4,7 cm</p>\r\n<p>Tải trọng: 1700 kg</p>\r\n<p>Màu sắc: xanh lá cây</p>\r\n<p>Chất liệu: Sợi bạt có độ bền cao - Móc nhỏ mạ niken/kẽm</p>', 'resized/D__y___ai_an_to__4ea38d9b1f615_90x90.jpg', 'D__y___ai_an_to__4ea38d9b282aa.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341467, 1319341467, 'Dây đai an toàn A4', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(265, 1, 0, 'TD001', 'Thang Dây...', '<p> </p>\r\n<p>Thang dây cơ động, gọn nhẹ và có độ dài bất kỳ. Với chất lượng luôn bảo đảm, sự an toàn của người lao động được đặt lên hàng đầu.</p>\r\n<p>Kích thước: Rộng 35cm, Bước: 36cm, Độ dài bất kỳ</p>\r\n<p>Chất liệu: Sợi tổng hợp, bản rộng 3cm, Ống thép 18mm</p>\r\n<p>Tải trọng: 2000 kg</p>', 'resized/Thang_D__y_4ea38de3ef7d1_90x90.jpg', 'Thang_D__y_4ea38de3f3a36.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341540, 1319341540, 'Thang Dây', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(266, 1, 0, 'TD002', 'Thang dây chống cháy...', '<p>Thang dây chống cháy: dùng cho nhân viên cứu hoả, dùng thoát hiểm trong  tình huống cháy nổ xảy ra. Đảm bảo tiêu chuẩn chịu nhiệt và tính an  toàn.</p>', '', '', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341634, 1319341634, 'Thang Dây Chống Cháy', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(267, 1, 0, 'NBH001', 'Bảo vệ đầu, mặt, tai 02....', '<p>Bảo vệ đầu và mặt kết hợp (mũ gắn kèm kính, ốp tai chống ồn).</p>', 'resized/B___o_v__________4ea38f2a2863d_90x90.jpg', 'B___o_v__________4ea38f2a2c892.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341866, 1319341866, 'Bảo vệ đầu, mặt, tai 02', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(268, 1, 0, 'NBH002', 'Bảo vệ đầu, mặt, tai ...', '', 'resized/B___o_v__________4ea38f72afc22_90x90.jpg', 'B___o_v__________4ea38f72b3e89.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341938, 1319341938, 'Bảo vệ đầu, mặt, tai', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(269, 1, 0, 'NBH003', 'Bảo vệ đầu và mặt ...', '<p>Bảo vệ đầu và mặt...</p>', 'resized/B___o_v__________4ea38fa3ec88c_90x90.jpg', 'B___o_v__________4ea38fa3f3201.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319341988, 1319341988, 'Bảo vệ đầu và mặt', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(270, 1, 0, 'NBH004', 'Mũ Cách Điện...', '<p>Mũ cách điện .</p>\r\n<p>Đảm bảo tiêu chuẩn chất lượng sản phẩm.</p>', 'resized/M___C__ch___i____4ea38fe8b96a3_90x90.jpg', 'M___C__ch___i____4ea38fe8bd522.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319342056, 1319342056, 'Mũ Cách Điện', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(271, 1, 0, 'NBH005', 'Mũ Bảo Vệ...', '<p>Mã số: <strong>MBV-03</strong><br /> Nơi sản xuất: <strong>Việt Nam</strong><br /> Chất liệu: <strong>Vải bạt - Kaki</strong><br /> Màu sắc: <strong>Xanh thẫm</strong></p>', 'resized/M___B___o_V____4ea39052765e1_90x90.jpg', 'M___B___o_V____4ea390527a859.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319342162, 1319342162, 'Mũ Bảo Vệ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(272, 1, 0, 'NB006', 'Mũ Bảo Hiểm Nhựa Hàn Quốc...', '<p>Tên sản phẩm: Mũ Bảo Hiểm Nhựa Hàn Quốc</p>\r\n<p>Xuất xứ : Hàn Quốc</p>', 'resized/M___B___o_Hi___m_4ea39093bab36_90x90.jpg', 'M___B___o_Hi___m_4ea39093c2089.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319342227, 1319342227, 'Mũ Bảo Hiểm Nhựa Hàn Quốc', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(273, 1, 0, 'NBH007', 'Mũ Bảo Hộ Thùy Dương...', '<p>Tên sản phẩm: Mũ Bảo Hộ Thùy Dương</p>\r\n<p>xuất xứ: Việt Nam</p>', 'resized/M___B___o_H____T_4ea390c836ca6_90x90.jpg', 'M___B___o_H____T_4ea390c83baa4.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319342280, 1319342280, 'Mũ Bảo Hộ Thùy Dương', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(274, 1, 0, 'NBH008', 'Mũ Nhựa Đài Loan...', '<p>Tên sản phẩm: Mũ Nhựa Đài Loan</p>\r\n<p>Xuất xứ: Đài Loan</p>', 'resized/M___Nh___a_____i_4ea39112c43a4_90x90.jpg', 'M___Nh___a_____i_4ea39112c8a0d.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319342354, 1319342354, 'Mũ Nhựa Đài Loan', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(275, 1, 0, 'dv0002', 'Thùng rác nắp lật lớn', '', 'resized/Th__ng_r__c_n____4ea4318332011_90x90.jpg', 'Th__ng_r__c_n____4ea43183352db.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319383427, 1319383427, 'Thùng rác nắp lật lớn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(276, 1, 0, 'tr001', '', '', 'resized/Th__ng_r__c______4ea43328d918f_90x90.jpg', 'Th__ng_r__c______4ea43328dc455.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319383848, 1319383848, 'Thùng rác đạp trung', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(277, 1, 0, 'sr002', 'Kích thước: 34.5 x 34 x 44 cm', '', 'resized/Th__ng_r__c______4ea43427168b9_90x90.jpg', 'Th__ng_r__c______4ea4342719b7e.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319384103, 1319384103, 'Thùng rác đạp lớn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(278, 1, 0, 'sv456', 'Kích thước: 25 x 23.5 x 29.5cm', '', 'resized/Th__ng_r__c______4ea4355493c91_90x90.jpg', 'Th__ng_r__c______4ea4355496f58.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319328000, '', 'N', 0, NULL, 1319384404, 1319384404, 'Thùng rác đạp nhỏ', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(279, 1, 0, 'TR0012', 'Thùng rác thông minh...', '<p><span style="font-size: small; font-family: arial,helvetica,sans-serif;"><span class="vbnoidung">Thùng  rác thông minh được gắn thêm một hệ thống khử mùi và sát trùng bằng  nguồn ozon (qua tia lửa điện). Cứ khoảng 15 giây thùng rác sẽ phát ra  tia ozon khử mùi hôi. Bạn có thể hoàn toàn yên tâm khi đặt thùng rác  trong nhà.</span></span></p>\r\n<p class="MsoNormal"><span style="font-size: small; font-family: arial,helvetica,sans-serif;"><span class="vbnoidung">Sản phẩm sử dụng pin đại hoặc dùng nguồn điện 220V.</span></span></p>', 'resized/Th__ng_R__c_Th___4ea4d69c90e42_90x90.jpg', 'Th__ng_R__c_Th___4ea4d69c940f7.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319425279, 1319425692, 'Thùng Rác Thông Minh 1', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(280, 1, 0, 'TR011', 'Thùng Rác Thông Minh 02...', '<p><span style="font-size: small; font-family: arial,helvetica,sans-serif;"><span class="vbnoidung">Thùng  rác thông minh được thiết kế ứng dụng tia hồng ngoại có các chức năng:  tự động đóng mở thùng và  khử mùi  Khi rác đưa vào thì bộ phận cảm biến  sẽ nhận biết và gửi lệnh mở nắp về bộ phận điều khiển tự động mở nắp.  Sau khi nhận rác 2 giây, thùng sẽ tự động đóng lại.</span></span></p>', 'resized/Th__ng_R__c_Th___4ea4d55ae3398_90x90.jpg', 'Th__ng_R__c_Th___4ea4d55ae6a48.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319425370, 1319425370, 'Thùng Rác Thông Minh 02', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(281, 1, 0, 'TR013', 'Thùng Rác Thông Minh 03...', '<p>Thùng Rác Thông Minh 03...</p>', 'resized/Th__ng_R__c_Th___4ea4d5e04e35a_90x90.jpg', 'Th__ng_R__c_Th___4ea4d5e050296.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319425504, 1319425504, 'Thùng Rác Thông Minh 03', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(282, 1, 0, 'TR04', 'Thùng Rác Thông Minh 04...', '<p>Thùng Rác Thông Minh 04</p>', 'resized/Th__ng_R__c_Th___4ea4d60f9b1ab_90x90.jpg', 'Th__ng_R__c_Th___4ea4d60f9e0be.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319425551, 1319425551, 'Thùng Rác Thông Minh 04', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(283, 1, 0, 'TR05', 'Thùng Rác Thông Minh 05...', '<p>Thùng Rác Thông Minh 05</p>', 'resized/Th__ng_R__c_Th___4ea4d66f94c26_90x90.jpg', 'Th__ng_R__c_Th___4ea4d66f97337.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319425647, 1319425647, 'Thùng Rác Thông Minh 05', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(284, 1, 0, 'H001', 'Bonnet Buff...', '<p><strong>Thông tin chi tiết sản phẩm</strong></p>\r\n<p>Công dụng</p>\r\n<p align="left"><span style="text-decoration: underline;"><strong>Chất giặt thảm</strong></span> đặc chế để sử dụng cho việc giặt thảm nhanh và mau khô theo phương pháp bonneting.</p>\r\n<p>Hướng Dẫn Sử Dụng</p>\r\n<div>\r\n<p>1. Hút bụi thảm thật sạch.</p>\r\n<p>2. Tẩy sạch đốm thảm.</p>\r\n<p>3. Pha chất Bonnet Buff theo tỷ lệ 1:8</p>\r\n<p>4. Phun hoá chất lên thảm để khoảng 10 - 15 phút</p>\r\n<p>5. Giặt thảm bằng miếng bonnet hoặc bằng máy Extract.</p>\r\n</div>', 'resized/Bonnet_Buff_4ea4dcc26c4eb_90x90.jpg', 'Bonnet_Buff_4ea4dcc270b42.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319427266, 1319427266, 'Bonnet Buff', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(285, 1, 0, 'H002', 'Shampoo Concentrate...', '<div><strong>Thông tin chi tiết sản phẩm</strong> <br />\r\n<div>Công dụng\r\n<div>\r\n<p align="left"><strong><span style="text-decoration: underline;">Chất giặt thảm đậm đặc</span></strong>, chi   phí sử dụng thấp, giặt sạch và rất an toàn đối với mọi loại thảm,  không  làm phai màu thảm. Thảm sau khi giặt xong còn lưu lại mùi hương  táo  giúp khử mùi ẩm mốc và tạo cảm giác tươi mới.</p>\r\nHướng Dẫn Sử Dụng\r\n<p>1. Hút bụi thảm thật kỹ và tẩy đốm thảm trước khi giặt.</p>\r\n<br />\r\n<p><strong>Phương pháp giặt bằng bàn chải</strong></p>\r\n<p><strong> </strong></p>\r\n<p>2. Pha hoá chất Shampoo Concentrate theo tỷ lệ 1:64</p>\r\n<p>3. Giặt thảm bằng máy chuyên dụng.</p>\r\n<p>4. Để thảm thật khô và dùng máy hút bụi hút hết những hoá chất và đất cát còn vương lại</p>\r\n<p>5. Dùng bàn chải chuyên dụng chải lại thảm.</p>\r\n<br />\r\n<p><strong>Phương pháp tạo bọt</strong></p>\r\n<br />\r\n<p>2. Pha hoá chất Shampoo Concentrate theo tỷ lệ 1:32</p>\r\n<p>3. Giặt thảm bằng máy chuyên dụng.</p>\r\n<p>4. Để thảm thật khô và dùng máy hút bụi hút hết những hoá chất và đất cát còn vương lại</p>\r\n<p>5. Chải thảm với bàn chải chuyên dụng</p>\r\n</div>\r\n</div>\r\n</div>', 'resized/Shampoo_Concentr_4ea4dd2aae572_90x90.jpg', 'Shampoo_Concentr_4ea4dd2ab00ea.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319427370, 1319427370, 'Shampoo Concentrate', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(286, 1, 0, 'H003', 'Extraction...', '<div><strong>Thông tin chi tiết sản phẩm</strong> <br />\r\n<div>Công dụng\r\n<div>\r\n<p align="left"><strong><span style="text-decoration: underline;">Chất giặt thảm theo phương pháp giặt phun hút.</span> </strong>Với công thức tạo bọt ít thích hợp với các máy phun hút, hoá chất  <em>Extraction Cleaner</em> có thể giặt được với cả nước nóng hoặc nước lạnh vẫn không làm phai màu   thảm, đặc biệt có thể giặt được trong môi trường nước cứng. Tiết kiệm   được chi phí.</p>\r\nHướng Dẫn Sử Dụng\r\n<p>Hút sạch bụi bẩn và tẩy đốm thảm trước khi giặt.</p>\r\n<p><strong>Phương pháp giặt thảm bằng máy phun hút</strong></p>\r\n<p>1. Đối với thảm sợi tổng hợp pha hoá chất  theo tỉ lệ 30ml Extraction  với 3.8L nước nóng (1:128) cho vào thùng  chứa của máy giặt. Và pha tỷ  lệ 30ml hoá chất với 19L nước đối với thảm  len (1:640)</p>\r\n<p>2. Dùng máy PHUN-HÚT giặt sạch thảm.</p>\r\n<p>3. Dùng bàn chải chuyên dụng chải lại bề mặt thảm và để khô tự nhiên hoặc dùng máy thổi giúp thảm khô nhanh.</p>\r\n<p><strong>Phương pháp giặt thảm bằng bình xịt</strong></p>\r\n<p>1. Pha hoá chất theo tỷ lệ 1:128 hoặc 1:640 cho vào bình xịt.</p>\r\n<p>2. Phun hoá chất đều lên khắp bề mặt  thảm, chú ý phun nhiều hoá chất  lên những đốm thảm hoặc nơi qua lại  nhiều. Xới tơi sợi thảm bằng bàn  chải chuyên dụng hoặc bằng bàn chải của  máy Extraction.</p>\r\n<p>3. Giặt thảm với nước nóng bằng máy phun hút.</p>\r\n<p>4. Sau khi giặt xong, chải thảm đều về một phía bằng bàn chải chuyên dụng.</p>\r\n</div>\r\n</div>\r\n</div>', 'resized/Extraction_4ea4dd7261909_90x90.jpg', 'Extraction_4ea4dd7263843.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319427442, 1319427442, 'Extraction', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(287, 1, 0, 'H004', 'Taski Protect...', '<div><strong>Thông tin chi tiết sản phẩm</strong> <br />\r\n<div>Công dụng\r\n<div>\r\n<p align="left"><strong><span style="text-decoration: underline;">Chất phủ bảo vệ bề mặt thảm</span></strong>. Ngăn ngừa quá trình bám bụi và nước lên bề mặt thảm. Giữ cho thảm luôn mới, bền, dễ giặt và mau khô.</p>\r\n</div>\r\n</div>\r\n</div>', 'resized/Taski_Protect_4ea4ddcd4e912_90x90.jpg', 'Taski_Protect_4ea4ddcd50471.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319427533, 1319427533, 'Taski Protect', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(288, 1, 0, 'H005', 'Snapback ...', '<p><strong>Thông tin chi tiết sản phẩm</strong></p>\r\n<p>Công dụng</p>\r\n<p><strong><span style="text-decoration: underline;">Chất đánh bóng sàn</span></strong>,  dùng để duy trì và tăng độ bóng của sàn đã được phủ bóng.</p>\r\n<ul>\r\n<li>Giúp sàn bóng đẹp, xoá được dấu giày và các vết trầy xước. </li>\r\n<li>Một Gallon có thể đánh bóng được 2.250 - 2.700 m<sup>2</sup> sàn. </li>\r\n<li>Có thể sử dụng kết hợp với tất cả các loại sàn có phủ seal của SCJP..... mùi hương dễ chịu. </li>\r\n</ul>\r\n<p> </p>', 'resized/Snapback__4ea4dfa8c213f_90x90.jpg', 'Snapback__4ea4dfa8c4092.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319428008, 1319428008, 'Snapback', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(289, 1, 0, 'H006', 'Hoá chất phủ sàn...', '<p><strong>Thông tin chi tiết sản phẩm</strong> <br />Công dụng</p>\r\n<p align="justify"><strong><span style="text-decoration: underline;">Chất phủ lót cho các loại sàn đá</span></strong>. Là   chất kết dính tuyệt vời, giúp ngăn ngừa bụi và lau quét dễ dàng. Không   nặng mùi, không tan chảy... mau khô... dễ dàng tẩy tróc bởi các hoá  chất  chuyên dụng của SC Johnson. Làm cho bề mặt sàn bóng láng.</p>\r\n<p>Hướng Dẫn Sử Dụng</p>\r\n<div>\r\n<p>Phủ Sàn</p>\r\n<p>1. Tẩy và tróc sạch lớp seal cũ bằng hoá chất chuyên dụng của JohnsonDiversey.</p>\r\n<p>2. Dùng khăn sạch phủ lên sàn một lớp <strong>Fortify.</strong></p>\r\n<p>3. Để 30 phút cho lớp phủ <strong>Fortify </strong>thật khô. Phủ một hoặc nhiều lớp hoá chất phủ bóng chuyên dụng của JohnsonDiversey (<strong>COMPLETE) </strong>lên.</p>\r\n<p><strong>Bảo Dưỡng sàn</strong></p>\r\n<p>1. Lau khô hoặc quét sạch sàn.</p>\r\n<p>2. Lau sạch sàn với hoá chất chuyên dụng của JohnsonDiversey.</p>\r\n<p>3. Định kỳ đánh bóng sàn với hoá chất chuyên dụng của JohnsonDiversey để giữ lớp bóng sáng cho sàn.</p>\r\n</div>', 'resized/Ho___ch___t_ph___4ea4e1396b245_90x90.jpg', 'Ho___ch___t_ph___4ea4e1396dd43.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319428409, 1319428409, 'Hoá chất phủ sàn', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(290, 1, 0, 'H007', 'Hóa chất tẩy cực mạnh DYMA SCALE...', '<p><strong>Thông tin chi tiết sản phẩm</strong> <br /><br /><strong>Công dụng:</strong><br />- Tẩy sạch các lớp cement vôi cáu trên bề mặt sàn sau khi sửa chữa hoặc xây dựng<br />- Tẩy trắng,  làm láng các đường ron cement , các bề mặt đá granite<br />-  Tẩy sạch các lớp cặn vôi, sắt gỉ sét trong đường ống thoát nước, bình  nước nóng, nồi hơi, dụng cụ của thợ hồ… (không sử dụng cho kim loại màu :  đồng, sắt, nhôm)<br />Dung tích : 5Lit/galon<br /><br /><strong>Hướng Dẫn Sử Dụng:</strong><br />1. Sử dụng nguyên chất để tẩy trắng đường ron xi măng<br />2. Hoặc pha với nước tỉ lệ : 1/20 khi tẩy các bề mặt sàn quá bẩn.<br />3.  Thích hợp làm sạch đường ron xi măng, các bề mặt sàn dính vôi, xi măng,  rỉ sét trên công trình mới xây dựng xong hoặc làm mới lại nền nhà lâu  năm (không sử dụng cho đá tự nhiên (cẩm thạch, mable)</p>', 'resized/H__a_ch___t_t____4ea4e1ac549bc_90x90.jpg', 'H__a_ch___t_t____4ea4e1ac58c27.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319428524, 1319428524, 'Hóa chất tẩy cực mạnh DYMA SCALE', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(291, 1, 0, 'H008', 'Nước lau sàn hương táu DYMA TRIO ...', '<p><strong>Thông tin chi tiết sản phẩm</strong> <br /><br /><strong>Công dụng:</strong><br />- Tẩy rửa các thiết bị bề mặt gạch men, sành sứ, thủy tinh… trong nhà bếp, nhà vệ sinh, phòng tắm.<br />- Khử mùi hôi trong không khí để lại mùi thơm tự nhiên của táo.<br />- Có tính sát trùng mạnh thích hợp sử dụng để tẩy rửa các mặt sàn trong nhà trẻ, trường học, bệnh viện, nơi chế biến thực phẩm.<br />Dung tích : 5Lit/galon<br /><br /><strong>Hướng Dẫn Sử Dụng:</strong><br />1. Pha với nước với tỷ lệ 1/4 để tẩy rửa các thiết bị dụng cụ.<br />2. Pha với nước với tỷ lệ 1/10 để tẩy rửa tổng quát, khử mùi hôi và sát trùng.</p>', 'resized/N_____c_lau_s__n_4ea4e1f0ac848_90x90.jpg', 'N_____c_lau_s__n_4ea4e1f0b0989.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319428592, 1319428592, 'Nước lau sàn hương táu DYMA TRIO', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(292, 1, 0, 'LK001', 'Dụng cụ lau kiếng...', '<p>Dụng cụ lau kiếng...</p>\r\n<p>Xuất xứ: Thái Lan</p>', 'resized/D___ng_c____lau__4ea4e9583f8d5_90x90.jpg', 'D___ng_c____lau__4ea4e9584335f.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319429077, 1319430488, 'Dụng cụ lau kiếng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(293, 1, 0, 'LK002', 'Cây lau kiếng...', '<p>Cây lau kiếng</p>\r\n<p>Xuất xứ : Thái Lan</p>', 'resized/C__y_lau_ki___ng_4ea4e404c9dd3_90x90.jpg', 'C__y_lau_ki___ng_4ea4e404ce80c.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319429124, 1319429124, 'Cây lau kiếng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(294, 1, 0, 'TK004', 'Lông thỏ lau kiếng', '<p>Lông thỏ lau kiếng</p>\r\n<p>Xuất xứ: Thái Lan</p>', 'resized/L__ng_th____lau__4ea4e84422926_90x90.jpg', 'L__ng_th____lau__4ea4e84425fe1.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319430212, 1319430212, 'Lông thỏ lau kiếng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(295, 1, 0, 'TK005', 'Cây gạt kính...', '<p>Cây gạt kính</p>\r\n<p>Xuất xứ : Thái lan</p>', 'resized/C__y_g___t_k__nh_4ea4e88b0ac85_90x90.jpg', 'C__y_g___t_k__nh_4ea4e88b0d37b.jpg', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319430283, 1319430283, 'Cây gạt kính', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0'),
(296, 1, 0, 'LK004', 'Hóa chất lau kiếng...', '<p align="justify"><span style="font-size: 8pt; font-family: Verdana;"><img src="http://www.hungphatpro.com/uploads/icon/bulet.jpg" border="0" /> <span style="font-weight: bold;">Công dụng:</span></span></p>\r\n<p align="justify"><span style="font-size: 8pt; font-family: Verdana;">Chất rửa kiếng và cửa sổ, dùng cho cửa chính, cửa sổ kiếng,bàn tính, quầy, song chắn cửa sổ và các bề mặt bằng kiếng khác </span></p>\r\n<p align="justify"><span style="font-size: 8pt; font-family: Verdana;"><img src="http://www.hungphatpro.com/uploads/icon/bulet.jpg" border="0" /> <span style="font-weight: bold;">Hướng dẫn sử dụng:</span></span></p>\r\n<p align="justify"><span style="font-size: 8pt; font-family: Verdana;">• Tỉ lệ :       1 : 10  <br />•  Lau hoặc xịt lên trên lớp mặt, lau sạch bằng miếng vải hoặc miếnh xốp  sạch. Lau lại bằng mảnh vải sạch hoặc khăn giấy.Tẩy sạch các vết đốm,  phiếm ấn, bề mặt kiếng với màu sáng bóng.</span></p>', 'resized/H__a_ch___t_lau__4ea4e91177110_90x90.png', 'H__a_ch___t_lau__4ea4e9117a7d3.png', 'Y', '0.0000', 'pounds', '0.0000', '0.0000', '0.0000', 'inches', '', 0, 1319414400, '', 'N', 0, NULL, 1319430417, 1319430417, 'Hóa chất lau kiếng', 0, '', '', 0, 'Đơn vị', 0, 'N,N,N,N,N,N,20%,10%,', 'none,0,0,1', '', '0,0');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_attribute`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_attribute` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `attribute_name` char(255) NOT NULL DEFAULT '',
  `attribute_value` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`attribute_id`),
  KEY `idx_product_attribute_product_id` (`product_id`),
  KEY `idx_product_attribute_name` (`attribute_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Stores attributes + their specific values for Child Products' AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_attribute_sku`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_attribute_sku` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `attribute_name` char(255) NOT NULL DEFAULT '',
  `attribute_list` int(11) NOT NULL DEFAULT '0',
  KEY `idx_product_attribute_sku_product_id` (`product_id`),
  KEY `idx_product_attribute_sku_attribute_name` (`attribute_name`),
  KEY `idx_product_attribute_list` (`attribute_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Attributes for a Parent Product used by its Child Products';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_category_xref`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_category_xref` (
  `category_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_list` int(11) DEFAULT NULL,
  KEY `idx_product_category_xref_category_id` (`category_id`),
  KEY `idx_product_category_xref_product_id` (`product_id`),
  KEY `idx_product_category_xref_product_list` (`product_list`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps Products to Categories';

--
-- Dumping data for table `jos_vm_product_category_xref`
--

INSERT INTO `jos_vm_product_category_xref` (`category_id`, `product_id`, `product_list`) VALUES
(8, 68, 1),
(8, 65, 1),
(9, 64, 1),
(9, 63, 1),
(8, 67, 1),
(8, 66, 1),
(9, 61, 1),
(9, 60, 1),
(9, 62, 1),
(9, 59, 1),
(39, 124, 1),
(14, 18, 1),
(14, 19, 1),
(14, 20, 1),
(14, 21, 1),
(14, 22, 1),
(14, 23, 1),
(14, 24, 1),
(14, 25, 1),
(16, 26, 1),
(16, 28, 1),
(16, 29, 1),
(16, 27, 1),
(16, 30, 1),
(16, 31, 1),
(15, 32, 1),
(15, 33, 1),
(15, 34, 1),
(15, 35, 1),
(15, 36, 1),
(18, 37, 1),
(18, 38, 1),
(18, 39, 1),
(18, 40, 1),
(18, 41, 1),
(18, 42, 1),
(17, 43, 1),
(17, 44, 1),
(17, 45, 1),
(17, 46, 1),
(17, 47, 1),
(17, 48, 1),
(17, 49, 1),
(27, 50, 1),
(27, 51, 1),
(27, 52, 1),
(27, 53, 1),
(27, 54, 1),
(27, 55, 1),
(28, 56, 1),
(28, 57, 1),
(28, 58, 1),
(8, 69, 1),
(8, 70, 1),
(13, 71, 1),
(13, 72, 1),
(13, 73, 1),
(13, 74, 1),
(13, 75, 1),
(23, 76, 1),
(23, 77, 1),
(23, 78, 1),
(23, 79, 1),
(23, 80, 1),
(23, 81, 1),
(24, 82, 1),
(22, 83, 1),
(22, 84, 1),
(22, 85, 1),
(22, 86, 1),
(22, 87, 2),
(21, 90, 1),
(19, 89, 1),
(19, 88, 1),
(21, 91, 1),
(20, 92, 1),
(20, 93, 1),
(20, 94, 1),
(20, 95, 1),
(20, 96, 1),
(20, 97, 1),
(24, 98, 1),
(24, 99, 1),
(24, 100, 1),
(24, 101, 1),
(24, 102, 1),
(26, 103, 1),
(26, 104, 1),
(26, 105, 1),
(26, 106, 1),
(26, 107, 1),
(25, 108, 1),
(25, 109, 1),
(25, 110, 1),
(25, 111, 1),
(25, 112, 1),
(25, 113, 1),
(10, 114, 1),
(10, 115, 1),
(10, 116, 1),
(10, 117, 1),
(10, 118, 1),
(40, 123, 1),
(40, 122, 1),
(39, 126, 1),
(39, 125, 1),
(16, 17, 2),
(23, 119, 1),
(40, 126, 1),
(39, 127, 1),
(40, 127, 1),
(39, 128, 1),
(39, 129, 1),
(0, 130, 1),
(39, 131, 1),
(40, 132, 1),
(39, 133, 1),
(40, 134, 1),
(39, 135, 1),
(39, 136, 1),
(40, 136, 1),
(39, 137, 1),
(39, 138, 1),
(37, 139, 1),
(37, 140, 1),
(37, 141, 1),
(37, 142, 1),
(37, 143, 1),
(37, 144, 1),
(37, 145, 1),
(37, 146, 1),
(37, 147, 1),
(38, 148, 1),
(38, 149, 1),
(38, 150, 1),
(38, 151, 1),
(41, 152, 1),
(41, 153, 1),
(41, 154, 1),
(42, 155, 1),
(42, 156, 1),
(42, 157, 1),
(42, 158, 1),
(42, 159, 1),
(42, 160, 1),
(42, 161, 1),
(42, 162, 1),
(42, 163, 1),
(43, 164, 1),
(43, 165, 1),
(43, 166, 1),
(44, 167, 1),
(44, 168, 1),
(44, 169, 1),
(44, 170, 1),
(44, 171, 1),
(44, 172, 1),
(46, 173, 1),
(46, 174, 1),
(46, 175, 1),
(46, 176, 1),
(46, 177, 1),
(45, 178, 1),
(45, 179, 1),
(45, 180, 1),
(45, 181, 1),
(45, 182, 1),
(45, 183, 1),
(45, 184, 1),
(45, 185, 1),
(47, 186, 1),
(47, 187, 1),
(47, 188, 1),
(47, 189, 1),
(47, 190, 1),
(47, 191, 1),
(47, 192, 1),
(47, 193, 1),
(46, 194, 1),
(36, 195, 1),
(36, 196, 1),
(36, 197, 1),
(36, 198, 1),
(50, 199, 1),
(50, 200, 1),
(50, 201, 1),
(50, 202, 1),
(57, 203, 1),
(50, 204, 1),
(50, 205, 1),
(57, 206, 1),
(49, 207, 1),
(49, 208, 1),
(49, 209, 1),
(50, 210, 1),
(49, 211, 1),
(49, 212, 1),
(49, 213, 1),
(49, 214, 1),
(57, 215, 1),
(48, 216, 1),
(57, 217, 1),
(57, 218, 1),
(54, 219, 1),
(54, 220, 1),
(54, 221, 1),
(54, 222, 1),
(57, 223, 1),
(54, 224, 1),
(54, 225, 1),
(54, 226, 1),
(54, 227, 1),
(57, 228, 1),
(56, 229, 1),
(58, 230, 1),
(54, 231, 1),
(56, 232, 1),
(58, 233, 1),
(56, 234, 1),
(56, 235, 1),
(56, 236, 1),
(56, 237, 1),
(48, 238, 1),
(48, 239, 1),
(48, 240, 1),
(48, 241, 1),
(48, 242, 1),
(48, 243, 1),
(48, 244, 1),
(48, 245, 1),
(53, 246, 1),
(53, 247, 1),
(53, 248, 1),
(53, 249, 1),
(52, 250, 1),
(52, 251, 1),
(52, 252, 1),
(52, 253, 1),
(52, 254, 1),
(52, 255, 1),
(52, 256, 1),
(52, 257, 1),
(52, 258, 1),
(52, 259, 1),
(55, 260, 1),
(55, 261, 1),
(55, 262, 1),
(55, 263, 1),
(55, 264, 1),
(55, 265, 1),
(55, 266, 1),
(51, 267, 1),
(51, 268, 1),
(51, 269, 1),
(51, 270, 1),
(51, 271, 1),
(51, 272, 1),
(51, 273, 1),
(51, 274, 1),
(58, 275, 1),
(58, 276, 1),
(0, 277, 1),
(58, 278, 1),
(58, 279, 1),
(58, 280, 1),
(58, 281, 1),
(58, 282, 1),
(58, 283, 1),
(59, 284, 1),
(59, 285, 1),
(59, 286, 1),
(59, 287, 1),
(59, 288, 1),
(59, 289, 1),
(59, 290, 1),
(59, 291, 1),
(60, 292, 1),
(60, 293, 1),
(60, 294, 1),
(60, 295, 1),
(60, 296, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_discount`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_discount` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `is_percent` tinyint(1) NOT NULL DEFAULT '0',
  `start_date` int(11) NOT NULL DEFAULT '0',
  `end_date` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`discount_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Discounts that can be assigned to products' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jos_vm_product_discount`
--

INSERT INTO `jos_vm_product_discount` (`discount_id`, `amount`, `is_percent`, `start_date`, `end_date`) VALUES
(1, '20.00', 1, 1097704800, 1194390000),
(2, '2.00', 0, 1098655200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_download`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_download` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  `end_date` int(11) NOT NULL DEFAULT '0',
  `download_max` int(11) NOT NULL DEFAULT '0',
  `download_id` varchar(32) NOT NULL DEFAULT '',
  `file_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`download_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Active downloads for selling downloadable goods';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_files`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_files` (
  `file_id` int(19) NOT NULL AUTO_INCREMENT,
  `file_product_id` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(128) NOT NULL DEFAULT '',
  `file_title` varchar(128) NOT NULL DEFAULT '',
  `file_description` mediumtext NOT NULL,
  `file_extension` varchar(128) NOT NULL DEFAULT '',
  `file_mimetype` varchar(64) NOT NULL DEFAULT '',
  `file_url` varchar(254) NOT NULL DEFAULT '',
  `file_published` tinyint(1) NOT NULL DEFAULT '0',
  `file_is_image` tinyint(1) NOT NULL DEFAULT '0',
  `file_image_height` int(11) NOT NULL DEFAULT '0',
  `file_image_width` int(11) NOT NULL DEFAULT '0',
  `file_image_thumb_height` int(11) NOT NULL DEFAULT '50',
  `file_image_thumb_width` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Additional Images and Files which are assigned to products' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_mf_xref`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_mf_xref` (
  `product_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  KEY `idx_product_mf_xref_product_id` (`product_id`),
  KEY `idx_product_mf_xref_manufacturer_id` (`manufacturer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a product to a manufacturer';

--
-- Dumping data for table `jos_vm_product_mf_xref`
--

INSERT INTO `jos_vm_product_mf_xref` (`product_id`, `manufacturer_id`) VALUES
(65, 1),
(64, 1),
(63, 1),
(70, 1),
(69, 1),
(61, 1),
(60, 1),
(62, 1),
(59, 1),
(68, 1),
(67, 1),
(66, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(232, 1),
(233, 1),
(234, 1),
(235, 1),
(236, 1),
(237, 1),
(238, 1),
(239, 1),
(240, 1),
(241, 1),
(242, 1),
(243, 1),
(244, 1),
(245, 1),
(246, 1),
(247, 1),
(248, 1),
(249, 1),
(250, 1),
(251, 1),
(252, 1),
(253, 1),
(254, 1),
(255, 1),
(256, 1),
(257, 1),
(258, 1),
(259, 1),
(260, 1),
(261, 1),
(262, 1),
(263, 1),
(264, 1),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(269, 1),
(270, 1),
(271, 1),
(272, 1),
(273, 1),
(274, 1),
(275, 1),
(276, 1),
(277, 1),
(278, 1),
(279, 1),
(280, 1),
(281, 1),
(282, 1),
(283, 1),
(284, 1),
(285, 1),
(286, 1),
(287, 1),
(288, 1),
(289, 1),
(290, 1),
(291, 1),
(292, 1),
(293, 1),
(294, 1),
(295, 1),
(296, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_price`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_price` (
  `product_price_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_price` decimal(12,5) DEFAULT NULL,
  `product_currency` char(16) DEFAULT NULL,
  `product_price_vdate` int(11) DEFAULT NULL,
  `product_price_edate` int(11) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `shopper_group_id` int(11) DEFAULT NULL,
  `price_quantity_start` int(11) unsigned NOT NULL DEFAULT '0',
  `price_quantity_end` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_price_id`),
  KEY `idx_product_price_product_id` (`product_id`),
  KEY `idx_product_price_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds price records for a product' AUTO_INCREMENT=70 ;

--
-- Dumping data for table `jos_vm_product_price`
--

INSERT INTO `jos_vm_product_price` (`product_price_id`, `product_id`, `product_price`, `product_currency`, `product_price_vdate`, `product_price_edate`, `cdate`, `mdate`, `shopper_group_id`, `price_quantity_start`, `price_quantity_end`) VALUES
(65, 66, '14000.00000', 'VND', 0, 0, 1316667726, 1316667726, 5, 0, 0),
(64, 65, '312000.00000', 'VND', 0, 0, 1316667395, 1316667395, 5, 0, 0),
(63, 64, '54000.00000', 'VND', 0, 0, 1316666940, 1316666940, 5, 0, 0),
(69, 70, '268000.00000', 'VND', 0, 0, 1316668181, 1316668181, 5, 0, 0),
(61, 62, '30000.00000', 'VND', 0, 0, 1316666664, 1316666664, 5, 0, 0),
(59, 60, '54000.00000', 'VND', 0, 0, 1316666358, 1316666358, 5, 0, 0),
(62, 63, '24000.00000', 'VND', 0, 0, 1316666771, 1316666771, 5, 0, 0),
(58, 59, '75000.00000', 'VND', 0, 0, 1316666228, 1316666228, 5, 0, 0),
(68, 69, '207000.00000', 'VND', 0, 0, 1316668103, 1316668103, 5, 0, 0),
(67, 68, '23000.00000', 'VND', 0, 0, 1316667967, 1316667967, 5, 0, 0),
(66, 67, '215000.00000', 'VND', 0, 0, 1316667838, 1316667838, 5, 0, 0),
(60, 61, '24000.00000', 'VND', 0, 0, 1316666585, 1316666585, 5, 0, 0),
(17, 17, '10000.00000', 'VND', 0, 0, 1316278941, 1316280682, 5, 0, 0),
(18, 18, '5.00000', 'VND', 0, 0, 1316489945, 1316491069, 5, 0, 0),
(19, 20, '3.00000', 'VND', 0, 0, 1316490751, 1316490751, 5, 0, 0),
(20, 19, '2.00000', 'VND', 0, 0, 1316490790, 1316490790, 5, 0, 0),
(21, 21, '3.00000', 'VND', 0, 0, 1316490892, 1316490892, 5, 0, 0),
(22, 22, '2.50000', 'VND', 0, 0, 1316490979, 1316490979, 5, 0, 0),
(23, 23, '3.00000', 'VND', 0, 0, 1316491303, 1316491303, 5, 0, 0),
(24, 24, '3.00000', 'VND', 0, 0, 1316491611, 1316491611, 5, 0, 0),
(25, 25, '5.00000', 'VND', 0, 0, 1316491781, 1318909216, 5, 0, 0),
(26, 26, '2.00000', 'VND', 0, 0, 1316492573, 1316492573, 5, 0, 0),
(27, 27, '4.00000', 'VND', 0, 0, 1316492633, 1316492791, 5, 0, 0),
(28, 28, '3.00000', 'VND', 0, 0, 1316492702, 1316492819, 5, 0, 0),
(29, 29, '3.50000', 'VND', 0, 0, 1316492973, 1316492973, 5, 0, 0),
(30, 30, '4.00000', 'VND', 0, 0, 1316493065, 1316493065, 5, 0, 0),
(31, 31, '2.50000', 'VND', 0, 0, 1316493192, 1316493192, 5, 0, 0),
(32, 32, '6.00000', 'VND', 0, 0, 1316493594, 1316493594, 5, 0, 0),
(33, 33, '5.00000', 'VND', 0, 0, 1316493678, 1316493992, 5, 0, 0),
(34, 34, '4.50000', 'VND', 0, 0, 1316493765, 1316493765, 5, 0, 0),
(35, 35, '5.50000', 'VND', 0, 0, 1316493838, 1316493838, 5, 0, 0),
(36, 36, '6.00000', 'VND', 0, 0, 1316493914, 1316493914, 5, 0, 0),
(37, 37, '6.00000', 'VND', 0, 0, 1316495047, 1316495047, 5, 0, 0),
(38, 38, '4.00000', 'VND', 0, 0, 1316495127, 1316495127, 5, 0, 0),
(39, 39, '4.00000', 'VND', 0, 0, 1316495193, 1316495193, 5, 0, 0),
(40, 40, '13.00000', 'VND', 0, 0, 1316497571, 1316497571, 5, 0, 0),
(41, 41, '10.00000', 'VND', 0, 0, 1316497636, 1316497636, 5, 0, 0),
(42, 42, '15.00000', 'VND', 0, 0, 1316497686, 1316497686, 5, 0, 0),
(43, 43, '4.50000', 'VND', 0, 0, 1316498082, 1316498082, 5, 0, 0),
(44, 44, '5.00000', 'VND', 0, 0, 1316498154, 1316498154, 5, 0, 0),
(45, 45, '10.00000', 'VND', 0, 0, 1316498243, 1316498243, 5, 0, 0),
(46, 46, '13.00000', 'VND', 0, 0, 1316498319, 1316498319, 5, 0, 0),
(47, 47, '14.00000', 'VND', 0, 0, 1316498433, 1316498433, 5, 0, 0),
(48, 48, '14.00000', 'VND', 0, 0, 1316498511, 1316498511, 5, 0, 0),
(49, 49, '12.00000', 'VND', 0, 0, 1316498615, 1316498615, 5, 0, 0),
(50, 50, '1.00000', 'VND', 0, 0, 1316581599, 1316581599, 5, 0, 0),
(51, 51, '13.00000', 'VND', 0, 0, 1316581703, 1316581703, 5, 0, 0),
(52, 52, '15.00000', 'VND', 0, 0, 1316581787, 1316581787, 5, 0, 0),
(53, 54, '2.50000', 'VND', 0, 0, 1316582430, 1318908481, 5, 0, 0),
(54, 55, '9000.00000', 'VND', 0, 0, 1316582628, 1316582628, 5, 0, 0),
(55, 56, '2.00000', 'VND', 0, 0, 1316582991, 1316582991, 5, 0, 0),
(56, 57, '4.00000', 'VND', 0, 0, 1316583046, 1318909176, 5, 0, 0),
(57, 58, '7000.00000', 'VND', 0, 0, 1316583096, 1316583096, 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_product_type_xref`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_product_type_xref` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_type_id` int(11) NOT NULL DEFAULT '0',
  KEY `idx_product_product_type_xref_product_id` (`product_id`),
  KEY `idx_product_product_type_xref_product_type_id` (`product_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps products to a product type';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_relations`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_relations` (
  `product_id` int(11) NOT NULL DEFAULT '0',
  `related_products` text,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_reviews`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `user_rating` tinyint(1) NOT NULL DEFAULT '0',
  `review_ok` int(11) NOT NULL DEFAULT '0',
  `review_votes` int(11) NOT NULL DEFAULT '0',
  `published` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`review_id`),
  UNIQUE KEY `product_id` (`product_id`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_type`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_type` (
  `product_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_name` varchar(255) NOT NULL DEFAULT '',
  `product_type_description` text,
  `product_type_publish` char(1) DEFAULT NULL,
  `product_type_browsepage` varchar(255) DEFAULT NULL,
  `product_type_flypage` varchar(255) DEFAULT NULL,
  `product_type_list_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_type_parameter`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_type_parameter` (
  `product_type_id` int(11) NOT NULL DEFAULT '0',
  `parameter_name` varchar(255) NOT NULL DEFAULT '',
  `parameter_label` varchar(255) NOT NULL DEFAULT '',
  `parameter_description` text,
  `parameter_list_order` int(11) NOT NULL DEFAULT '0',
  `parameter_type` char(1) NOT NULL DEFAULT 'T',
  `parameter_values` varchar(255) DEFAULT NULL,
  `parameter_multiselect` char(1) DEFAULT NULL,
  `parameter_default` varchar(255) DEFAULT NULL,
  `parameter_unit` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`product_type_id`,`parameter_name`),
  KEY `idx_product_type_parameter_product_type_id` (`product_type_id`),
  KEY `idx_product_type_parameter_parameter_order` (`parameter_list_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Parameters which are part of a product type';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_product_votes`
--

CREATE TABLE IF NOT EXISTS `jos_vm_product_votes` (
  `product_id` int(255) NOT NULL DEFAULT '0',
  `votes` text NOT NULL,
  `allvotes` int(11) NOT NULL DEFAULT '0',
  `rating` tinyint(1) NOT NULL DEFAULT '0',
  `lastip` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores all votes for a product';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_shipping_carrier`
--

CREATE TABLE IF NOT EXISTS `jos_vm_shipping_carrier` (
  `shipping_carrier_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_carrier_name` char(80) NOT NULL DEFAULT '',
  `shipping_carrier_list_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipping_carrier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Shipping Carriers as used by the Standard Shipping Module' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jos_vm_shipping_carrier`
--

INSERT INTO `jos_vm_shipping_carrier` (`shipping_carrier_id`, `shipping_carrier_name`, `shipping_carrier_list_order`) VALUES
(1, 'DHL', 0),
(2, 'UPS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_shipping_label`
--

CREATE TABLE IF NOT EXISTS `jos_vm_shipping_label` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `shipper_class` varchar(32) DEFAULT NULL,
  `ship_date` varchar(32) DEFAULT NULL,
  `service_code` varchar(32) DEFAULT NULL,
  `special_service` varchar(32) DEFAULT NULL,
  `package_type` varchar(16) DEFAULT NULL,
  `order_weight` decimal(10,2) DEFAULT NULL,
  `is_international` tinyint(1) DEFAULT NULL,
  `additional_protection_type` varchar(16) DEFAULT NULL,
  `additional_protection_value` decimal(10,2) DEFAULT NULL,
  `duty_value` decimal(10,2) DEFAULT NULL,
  `content_desc` varchar(255) DEFAULT NULL,
  `label_is_generated` tinyint(1) NOT NULL DEFAULT '0',
  `tracking_number` varchar(32) DEFAULT NULL,
  `label_image` blob,
  `have_signature` tinyint(1) NOT NULL DEFAULT '0',
  `signature_image` blob,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores information used in generating shipping labels';

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_shipping_rate`
--

CREATE TABLE IF NOT EXISTS `jos_vm_shipping_rate` (
  `shipping_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_rate_name` varchar(255) NOT NULL DEFAULT '',
  `shipping_rate_carrier_id` int(11) NOT NULL DEFAULT '0',
  `shipping_rate_country` text NOT NULL,
  `shipping_rate_zip_start` varchar(32) NOT NULL DEFAULT '',
  `shipping_rate_zip_end` varchar(32) NOT NULL DEFAULT '',
  `shipping_rate_weight_start` decimal(10,3) NOT NULL DEFAULT '0.000',
  `shipping_rate_weight_end` decimal(10,3) NOT NULL DEFAULT '0.000',
  `shipping_rate_value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shipping_rate_package_fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shipping_rate_currency_id` int(11) NOT NULL DEFAULT '0',
  `shipping_rate_vat_id` int(11) NOT NULL DEFAULT '0',
  `shipping_rate_list_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shipping_rate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Shipping Rates, used by the Standard Shipping Module' AUTO_INCREMENT=22 ;

--
-- Dumping data for table `jos_vm_shipping_rate`
--

INSERT INTO `jos_vm_shipping_rate` (`shipping_rate_id`, `shipping_rate_name`, `shipping_rate_carrier_id`, `shipping_rate_country`, `shipping_rate_zip_start`, `shipping_rate_zip_end`, `shipping_rate_weight_start`, `shipping_rate_weight_end`, `shipping_rate_value`, `shipping_rate_package_fee`, `shipping_rate_currency_id`, `shipping_rate_vat_id`, `shipping_rate_list_order`) VALUES
(1, 'Inland > 4kg', 1, 'DEU', '00000', '99999', '0.000', '4.000', '5.62', '2.00', 47, 0, 1),
(2, 'Inland > 8kg', 1, 'DEU', '00000', '99999', '4.000', '8.000', '6.39', '2.00', 47, 0, 2),
(3, 'Inland > 12kg', 1, 'DEU', '00000', '99999', '8.000', '12.000', '7.16', '2.00', 47, 0, 3),
(4, 'Inland > 20kg', 1, 'DEU', '00000', '99999', '12.000', '20.000', '8.69', '2.00', 47, 0, 4),
(5, 'EU+ >  4kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '0.000', '4.000', '14.57', '2.00', 47, 0, 5),
(6, 'EU+ >  8kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '4.000', '8.000', '18.66', '2.00', 47, 0, 6),
(7, 'EU+ > 12kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '8.000', '12.000', '22.57', '2.00', 47, 0, 7),
(8, 'EU+ > 20kg', 1, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '12.000', '20.000', '30.93', '2.00', 47, 0, 8),
(9, 'Europe > 4kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '0.000', '4.000', '23.78', '2.00', 47, 0, 9),
(10, 'Europe >  8kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '4.000', '8.000', '29.91', '2.00', 47, 0, 10),
(11, 'Europe > 12kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '8.000', '12.000', '36.05', '2.00', 47, 0, 11),
(12, 'Europe > 20kg', 1, 'ALB;ARM;AZE;BLR;BIH;BGR;EST;GEO;GIB;ISL;YUG;KAZ;HRV;LVA;LTU;MLT;MKD;MDA;NOR;ROM;RUS;SVN;TUR;UKR;HUN;BLR;CYP', '00000', '99999', '12.000', '20.000', '48.32', '2.00', 47, 0, 12),
(13, 'World_1 >  4kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '0.000', '4.000', '26.84', '2.00', 47, 0, 13),
(14, 'World_1 > 8kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '4.000', '8.000', '35.02', '2.00', 47, 0, 14),
(15, 'World_1 > 12kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '8.000', '12.000', '43.20', '2.00', 47, 0, 15),
(16, 'World_1 > 20kg', 1, 'EGY;DZA;BHR;IRQ;IRN;ISR;YEM;JOR;CAN;QAT;KWT;LBN;LBY;MAR;OMN;SAU;SYR;TUN;ARE;USA', '00000', '99999', '12.000', '20.000', '59.57', '2.00', 47, 0, 16),
(17, 'World_2 > 4kg', 1, '', '00000', '99999', '0.000', '4.000', '32.98', '2.00', 47, 0, 17),
(18, 'World_2 > 8kg', 1, '', '00000', '99999', '4.000', '8.000', '47.29', '2.00', 47, 0, 18),
(19, 'World_2 > 12kg', 1, '', '00000', '99999', '8.000', '12.000', '61.61', '2.00', 47, 0, 19),
(20, 'World_2 > 20kg', 1, '', '00000', '99999', '12.000', '20.000', '90.24', '2.00', 47, 0, 20),
(21, 'UPS Express', 2, 'AND;BEL;DNK;FRO;FIN;FRA;GRC;GRL;GBR;IRL;ITA;LIE;LUX;MCO;NLD;AUT;POL;PRT;SMR;SWE;CHE;SVK;ESP;CZE', '00000', '99999', '0.000', '20.000', '5.24', '2.00', 47, 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_shopper_group`
--

CREATE TABLE IF NOT EXISTS `jos_vm_shopper_group` (
  `shopper_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `shopper_group_name` varchar(32) DEFAULT NULL,
  `shopper_group_desc` text,
  `shopper_group_discount` decimal(5,2) NOT NULL DEFAULT '0.00',
  `show_price_including_tax` tinyint(1) NOT NULL DEFAULT '1',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shopper_group_id`),
  KEY `idx_shopper_group_vendor_id` (`vendor_id`),
  KEY `idx_shopper_group_name` (`shopper_group_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Shopper Groups that users can be assigned to' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jos_vm_shopper_group`
--

INSERT INTO `jos_vm_shopper_group` (`shopper_group_id`, `vendor_id`, `shopper_group_name`, `shopper_group_desc`, `shopper_group_discount`, `show_price_including_tax`, `default`) VALUES
(5, 1, '-default-', 'This is the default shopper group.', '0.00', 1, 1),
(6, 1, 'Gold Level', 'Gold Level Shoppers.', '0.00', 1, 0),
(7, 1, 'Wholesale', 'Shoppers that can buy at wholesale.', '0.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_shopper_vendor_xref`
--

CREATE TABLE IF NOT EXISTS `jos_vm_shopper_vendor_xref` (
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `shopper_group_id` int(11) DEFAULT NULL,
  `customer_number` varchar(32) DEFAULT NULL,
  KEY `idx_shopper_vendor_xref_user_id` (`user_id`),
  KEY `idx_shopper_vendor_xref_vendor_id` (`vendor_id`),
  KEY `idx_shopper_vendor_xref_shopper_group_id` (`shopper_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Maps a user to a Shopper Group of a Vendor';

--
-- Dumping data for table `jos_vm_shopper_vendor_xref`
--

INSERT INTO `jos_vm_shopper_vendor_xref` (`user_id`, `vendor_id`, `shopper_group_id`, `customer_number`) VALUES
(62, 1, 5, ''),
(64, 1, 7, '21385813154e96f1a8ee360');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_state`
--

CREATE TABLE IF NOT EXISTS `jos_vm_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL DEFAULT '1',
  `state_name` varchar(64) DEFAULT NULL,
  `state_3_code` char(3) DEFAULT NULL,
  `state_2_code` char(2) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `state_3_code` (`country_id`,`state_3_code`),
  UNIQUE KEY `state_2_code` (`country_id`,`state_2_code`),
  KEY `idx_country_id` (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='States that are assigned to a country' AUTO_INCREMENT=452 ;

--
-- Dumping data for table `jos_vm_state`
--

INSERT INTO `jos_vm_state` (`state_id`, `country_id`, `state_name`, `state_3_code`, `state_2_code`) VALUES
(1, 223, 'Alabama', 'ALA', 'AL'),
(2, 223, 'Alaska', 'ALK', 'AK'),
(3, 223, 'Arizona', 'ARZ', 'AZ'),
(4, 223, 'Arkansas', 'ARK', 'AR'),
(5, 223, 'California', 'CAL', 'CA'),
(6, 223, 'Colorado', 'COL', 'CO'),
(7, 223, 'Connecticut', 'CCT', 'CT'),
(8, 223, 'Delaware', 'DEL', 'DE'),
(9, 223, 'District Of Columbia', 'DOC', 'DC'),
(10, 223, 'Florida', 'FLO', 'FL'),
(11, 223, 'Georgia', 'GEA', 'GA'),
(12, 223, 'Hawaii', 'HWI', 'HI'),
(13, 223, 'Idaho', 'IDA', 'ID'),
(14, 223, 'Illinois', 'ILL', 'IL'),
(15, 223, 'Indiana', 'IND', 'IN'),
(16, 223, 'Iowa', 'IOA', 'IA'),
(17, 223, 'Kansas', 'KAS', 'KS'),
(18, 223, 'Kentucky', 'KTY', 'KY'),
(19, 223, 'Louisiana', 'LOA', 'LA'),
(20, 223, 'Maine', 'MAI', 'ME'),
(21, 223, 'Maryland', 'MLD', 'MD'),
(22, 223, 'Massachusetts', 'MSA', 'MA'),
(23, 223, 'Michigan', 'MIC', 'MI'),
(24, 223, 'Minnesota', 'MIN', 'MN'),
(25, 223, 'Mississippi', 'MIS', 'MS'),
(26, 223, 'Missouri', 'MIO', 'MO'),
(27, 223, 'Montana', 'MOT', 'MT'),
(28, 223, 'Nebraska', 'NEB', 'NE'),
(29, 223, 'Nevada', 'NEV', 'NV'),
(30, 223, 'New Hampshire', 'NEH', 'NH'),
(31, 223, 'New Jersey', 'NEJ', 'NJ'),
(32, 223, 'New Mexico', 'NEM', 'NM'),
(33, 223, 'New York', 'NEY', 'NY'),
(34, 223, 'North Carolina', 'NOC', 'NC'),
(35, 223, 'North Dakota', 'NOD', 'ND'),
(36, 223, 'Ohio', 'OHI', 'OH'),
(37, 223, 'Oklahoma', 'OKL', 'OK'),
(38, 223, 'Oregon', 'ORN', 'OR'),
(39, 223, 'Pennsylvania', 'PEA', 'PA'),
(40, 223, 'Rhode Island', 'RHI', 'RI'),
(41, 223, 'South Carolina', 'SOC', 'SC'),
(42, 223, 'South Dakota', 'SOD', 'SD'),
(43, 223, 'Tennessee', 'TEN', 'TN'),
(44, 223, 'Texas', 'TXS', 'TX'),
(45, 223, 'Utah', 'UTA', 'UT'),
(46, 223, 'Vermont', 'VMT', 'VT'),
(47, 223, 'Virginia', 'VIA', 'VA'),
(48, 223, 'Washington', 'WAS', 'WA'),
(49, 223, 'West Virginia', 'WEV', 'WV'),
(50, 223, 'Wisconsin', 'WIS', 'WI'),
(51, 223, 'Wyoming', 'WYO', 'WY'),
(52, 38, 'Alberta', 'ALB', 'AB'),
(53, 38, 'British Columbia', 'BRC', 'BC'),
(54, 38, 'Manitoba', 'MAB', 'MB'),
(55, 38, 'New Brunswick', 'NEB', 'NB'),
(56, 38, 'Newfoundland and Labrador', 'NFL', 'NL'),
(57, 38, 'Northwest Territories', 'NWT', 'NT'),
(58, 38, 'Nova Scotia', 'NOS', 'NS'),
(59, 38, 'Nunavut', 'NUT', 'NU'),
(60, 38, 'Ontario', 'ONT', 'ON'),
(61, 38, 'Prince Edward Island', 'PEI', 'PE'),
(62, 38, 'Quebec', 'QEC', 'QC'),
(63, 38, 'Saskatchewan', 'SAK', 'SK'),
(64, 38, 'Yukon', 'YUT', 'YT'),
(65, 222, 'England', 'ENG', 'EN'),
(66, 222, 'Northern Ireland', 'NOI', 'NI'),
(67, 222, 'Scotland', 'SCO', 'SD'),
(68, 222, 'Wales', 'WLS', 'WS'),
(69, 13, 'Australian Capital Territory', 'ACT', 'AC'),
(70, 13, 'New South Wales', 'NSW', 'NS'),
(71, 13, 'Northern Territory', 'NOT', 'NT'),
(72, 13, 'Queensland', 'QLD', 'QL'),
(73, 13, 'South Australia', 'SOA', 'SA'),
(74, 13, 'Tasmania', 'TAS', 'TS'),
(75, 13, 'Victoria', 'VIC', 'VI'),
(76, 13, 'Western Australia', 'WEA', 'WA'),
(77, 138, 'Aguascalientes', 'AGS', 'AG'),
(78, 138, 'Baja California Norte', 'BCN', 'BN'),
(79, 138, 'Baja California Sur', 'BCS', 'BS'),
(80, 138, 'Campeche', 'CAM', 'CA'),
(81, 138, 'Chiapas', 'CHI', 'CS'),
(82, 138, 'Chihuahua', 'CHA', 'CH'),
(83, 138, 'Coahuila', 'COA', 'CO'),
(84, 138, 'Colima', 'COL', 'CM'),
(85, 138, 'Distrito Federal', 'DFM', 'DF'),
(86, 138, 'Durango', 'DGO', 'DO'),
(87, 138, 'Guanajuato', 'GTO', 'GO'),
(88, 138, 'Guerrero', 'GRO', 'GU'),
(89, 138, 'Hidalgo', 'HGO', 'HI'),
(90, 138, 'Jalisco', 'JAL', 'JA'),
(91, 138, 'México (Estado de)', 'EDM', 'EM'),
(92, 138, 'Michoacán', 'MCN', 'MI'),
(93, 138, 'Morelos', 'MOR', 'MO'),
(94, 138, 'Nayarit', 'NAY', 'NY'),
(95, 138, 'Nuevo León', 'NUL', 'NL'),
(96, 138, 'Oaxaca', 'OAX', 'OA'),
(97, 138, 'Puebla', 'PUE', 'PU'),
(98, 138, 'Querétaro', 'QRO', 'QU'),
(99, 138, 'Quintana Roo', 'QUR', 'QR'),
(100, 138, 'San Luis Potosí', 'SLP', 'SP'),
(101, 138, 'Sinaloa', 'SIN', 'SI'),
(102, 138, 'Sonora', 'SON', 'SO'),
(103, 138, 'Tabasco', 'TAB', 'TA'),
(104, 138, 'Tamaulipas', 'TAM', 'TM'),
(105, 138, 'Tlaxcala', 'TLX', 'TX'),
(106, 138, 'Veracruz', 'VER', 'VZ'),
(107, 138, 'Yucatán', 'YUC', 'YU'),
(108, 138, 'Zacatecas', 'ZAC', 'ZA'),
(109, 30, 'Acre', 'ACR', 'AC'),
(110, 30, 'Alagoas', 'ALG', 'AL'),
(111, 30, 'Amapá', 'AMP', 'AP'),
(112, 30, 'Amazonas', 'AMZ', 'AM'),
(113, 30, 'Bahía', 'BAH', 'BA'),
(114, 30, 'Ceará', 'CEA', 'CE'),
(115, 30, 'Distrito Federal', 'DFB', 'DF'),
(116, 30, 'Espirito Santo', 'ESS', 'ES'),
(117, 30, 'Goiás', 'GOI', 'GO'),
(118, 30, 'Maranhão', 'MAR', 'MA'),
(119, 30, 'Mato Grosso', 'MAT', 'MT'),
(120, 30, 'Mato Grosso do Sul', 'MGS', 'MS'),
(121, 30, 'Minas Geraís', 'MIG', 'MG'),
(122, 30, 'Paraná', 'PAR', 'PR'),
(123, 30, 'Paraíba', 'PRB', 'PB'),
(124, 30, 'Pará', 'PAB', 'PA'),
(125, 30, 'Pernambuco', 'PER', 'PE'),
(126, 30, 'Piauí', 'PIA', 'PI'),
(127, 30, 'Rio Grande do Norte', 'RGN', 'RN'),
(128, 30, 'Rio Grande do Sul', 'RGS', 'RS'),
(129, 30, 'Rio de Janeiro', 'RDJ', 'RJ'),
(130, 30, 'Rondônia', 'RON', 'RO'),
(131, 30, 'Roraima', 'ROR', 'RR'),
(132, 30, 'Santa Catarina', 'SAC', 'SC'),
(133, 30, 'Sergipe', 'SER', 'SE'),
(134, 30, 'São Paulo', 'SAP', 'SP'),
(135, 30, 'Tocantins', 'TOC', 'TO'),
(136, 44, 'Anhui', 'ANH', '34'),
(137, 44, 'Beijing', 'BEI', '11'),
(138, 44, 'Chongqing', 'CHO', '50'),
(139, 44, 'Fujian', 'FUJ', '35'),
(140, 44, 'Gansu', 'GAN', '62'),
(141, 44, 'Guangdong', 'GUA', '44'),
(142, 44, 'Guangxi Zhuang', 'GUZ', '45'),
(143, 44, 'Guizhou', 'GUI', '52'),
(144, 44, 'Hainan', 'HAI', '46'),
(145, 44, 'Hebei', 'HEB', '13'),
(146, 44, 'Heilongjiang', 'HEI', '23'),
(147, 44, 'Henan', 'HEN', '41'),
(148, 44, 'Hubei', 'HUB', '42'),
(149, 44, 'Hunan', 'HUN', '43'),
(150, 44, 'Jiangsu', 'JIA', '32'),
(151, 44, 'Jiangxi', 'JIX', '36'),
(152, 44, 'Jilin', 'JIL', '22'),
(153, 44, 'Liaoning', 'LIA', '21'),
(154, 44, 'Nei Mongol', 'NML', '15'),
(155, 44, 'Ningxia Hui', 'NIH', '64'),
(156, 44, 'Qinghai', 'QIN', '63'),
(157, 44, 'Shandong', 'SNG', '37'),
(158, 44, 'Shanghai', 'SHH', '31'),
(159, 44, 'Shaanxi', 'SHX', '61'),
(160, 44, 'Sichuan', 'SIC', '51'),
(161, 44, 'Tianjin', 'TIA', '12'),
(162, 44, 'Xinjiang Uygur', 'XIU', '65'),
(163, 44, 'Xizang', 'XIZ', '54'),
(164, 44, 'Yunnan', 'YUN', '53'),
(165, 44, 'Zhejiang', 'ZHE', '33'),
(166, 104, 'Israel', 'ISL', 'IL'),
(167, 104, 'Gaza Strip', 'GZS', 'GZ'),
(168, 104, 'West Bank', 'WBK', 'WB'),
(169, 151, 'St. Maarten', 'STM', 'SM'),
(170, 151, 'Bonaire', 'BNR', 'BN'),
(171, 151, 'Curacao', 'CUR', 'CR'),
(172, 175, 'Alba', 'ABA', 'AB'),
(173, 175, 'Arad', 'ARD', 'AR'),
(174, 175, 'Arges', 'ARG', 'AG'),
(175, 175, 'Bacau', 'BAC', 'BC'),
(176, 175, 'Bihor', 'BIH', 'BH'),
(177, 175, 'Bistrita-Nasaud', 'BIS', 'BN'),
(178, 175, 'Botosani', 'BOT', 'BT'),
(179, 175, 'Braila', 'BRL', 'BR'),
(180, 175, 'Brasov', 'BRA', 'BV'),
(181, 175, 'Bucuresti', 'BUC', 'B'),
(182, 175, 'Buzau', 'BUZ', 'BZ'),
(183, 175, 'Calarasi', 'CAL', 'CL'),
(184, 175, 'Caras Severin', 'CRS', 'CS'),
(185, 175, 'Cluj', 'CLJ', 'CJ'),
(186, 175, 'Constanta', 'CST', 'CT'),
(187, 175, 'Covasna', 'COV', 'CV'),
(188, 175, 'Dambovita', 'DAM', 'DB'),
(189, 175, 'Dolj', 'DLJ', 'DJ'),
(190, 175, 'Galati', 'GAL', 'GL'),
(191, 175, 'Giurgiu', 'GIU', 'GR'),
(192, 175, 'Gorj', 'GOR', 'GJ'),
(193, 175, 'Hargita', 'HRG', 'HR'),
(194, 175, 'Hunedoara', 'HUN', 'HD'),
(195, 175, 'Ialomita', 'IAL', 'IL'),
(196, 175, 'Iasi', 'IAS', 'IS'),
(197, 175, 'Ilfov', 'ILF', 'IF'),
(198, 175, 'Maramures', 'MAR', 'MM'),
(199, 175, 'Mehedinti', 'MEH', 'MH'),
(200, 175, 'Mures', 'MUR', 'MS'),
(201, 175, 'Neamt', 'NEM', 'NT'),
(202, 175, 'Olt', 'OLT', 'OT'),
(203, 175, 'Prahova', 'PRA', 'PH'),
(204, 175, 'Salaj', 'SAL', 'SJ'),
(205, 175, 'Satu Mare', 'SAT', 'SM'),
(206, 175, 'Sibiu', 'SIB', 'SB'),
(207, 175, 'Suceava', 'SUC', 'SV'),
(208, 175, 'Teleorman', 'TEL', 'TR'),
(209, 175, 'Timis', 'TIM', 'TM'),
(210, 175, 'Tulcea', 'TUL', 'TL'),
(211, 175, 'Valcea', 'VAL', 'VL'),
(212, 175, 'Vaslui', 'VAS', 'VS'),
(213, 175, 'Vrancea', 'VRA', 'VN'),
(214, 105, 'Agrigento', 'AGR', 'AG'),
(215, 105, 'Alessandria', 'ALE', 'AL'),
(216, 105, 'Ancona', 'ANC', 'AN'),
(217, 105, 'Aosta', 'AOS', 'AO'),
(218, 105, 'Arezzo', 'ARE', 'AR'),
(219, 105, 'Ascoli Piceno', 'API', 'AP'),
(220, 105, 'Asti', 'AST', 'AT'),
(221, 105, 'Avellino', 'AVE', 'AV'),
(222, 105, 'Bari', 'BAR', 'BA'),
(223, 105, 'Barletta Andria Trani', 'BTA', 'BT'),
(224, 105, 'Belluno', 'BEL', 'BL'),
(225, 105, 'Benevento', 'BEN', 'BN'),
(226, 105, 'Bergamo', 'BEG', 'BG'),
(227, 105, 'Biella', 'BIE', 'BI'),
(228, 105, 'Bologna', 'BOL', 'BO'),
(229, 105, 'Bolzano', 'BOZ', 'BZ'),
(230, 105, 'Brescia', 'BRE', 'BS'),
(231, 105, 'Brindisi', 'BRI', 'BR'),
(232, 105, 'Cagliari', 'CAG', 'CA'),
(233, 105, 'Caltanissetta', 'CAL', 'CL'),
(234, 105, 'Campobasso', 'CBO', 'CB'),
(235, 105, 'Carbonia-Iglesias', 'CAR', 'CI'),
(236, 105, 'Caserta', 'CAS', 'CE'),
(237, 105, 'Catania', 'CAT', 'CT'),
(238, 105, 'Catanzaro', 'CTZ', 'CZ'),
(239, 105, 'Chieti', 'CHI', 'CH'),
(240, 105, 'Como', 'COM', 'CO'),
(241, 105, 'Cosenza', 'COS', 'CS'),
(242, 105, 'Cremona', 'CRE', 'CR'),
(243, 105, 'Crotone', 'CRO', 'KR'),
(244, 105, 'Cuneo', 'CUN', 'CN'),
(245, 105, 'Enna', 'ENN', 'EN'),
(246, 105, 'Fermo', 'FMO', 'FM'),
(247, 105, 'Ferrara', 'FER', 'FE'),
(248, 105, 'Firenze', 'FIR', 'FI'),
(249, 105, 'Foggia', 'FOG', 'FG'),
(250, 105, 'Forli-Cesena', 'FOC', 'FC'),
(251, 105, 'Frosinone', 'FRO', 'FR'),
(252, 105, 'Genova', 'GEN', 'GE'),
(253, 105, 'Gorizia', 'GOR', 'GO'),
(254, 105, 'Grosseto', 'GRO', 'GR'),
(255, 105, 'Imperia', 'IMP', 'IM'),
(256, 105, 'Isernia', 'ISE', 'IS'),
(257, 105, 'L''Aquila', 'AQU', 'AQ'),
(258, 105, 'La Spezia', 'LAS', 'SP'),
(259, 105, 'Latina', 'LAT', 'LT'),
(260, 105, 'Lecce', 'LEC', 'LE'),
(261, 105, 'Lecco', 'LCC', 'LC'),
(262, 105, 'Livorno', 'LIV', 'LI'),
(263, 105, 'Lodi', 'LOD', 'LO'),
(264, 105, 'Lucca', 'LUC', 'LU'),
(265, 105, 'Macerata', 'MAC', 'MC'),
(266, 105, 'Mantova', 'MAN', 'MN'),
(267, 105, 'Massa-Carrara', 'MAS', 'MS'),
(268, 105, 'Matera', 'MAA', 'MT'),
(269, 105, 'Medio Campidano', 'MED', 'VS'),
(270, 105, 'Messina', 'MES', 'ME'),
(271, 105, 'Milano', 'MIL', 'MI'),
(272, 105, 'Modena', 'MOD', 'MO'),
(273, 105, 'Monza e della Brianza', 'MBA', 'MB'),
(274, 105, 'Napoli', 'NAP', 'NA'),
(275, 105, 'Novara', 'NOV', 'NO'),
(276, 105, 'Nuoro', 'NUR', 'NU'),
(277, 105, 'Ogliastra', 'OGL', 'OG'),
(278, 105, 'Olbia-Tempio', 'OLB', 'OT'),
(279, 105, 'Oristano', 'ORI', 'OR'),
(280, 105, 'Padova', 'PDA', 'PD'),
(281, 105, 'Palermo', 'PAL', 'PA'),
(282, 105, 'Parma', 'PAA', 'PR'),
(283, 105, 'Pavia', 'PAV', 'PV'),
(284, 105, 'Perugia', 'PER', 'PG'),
(285, 105, 'Pesaro e Urbino', 'PES', 'PU'),
(286, 105, 'Pescara', 'PSC', 'PE'),
(287, 105, 'Piacenza', 'PIA', 'PC'),
(288, 105, 'Pisa', 'PIS', 'PI'),
(289, 105, 'Pistoia', 'PIT', 'PT'),
(290, 105, 'Pordenone', 'POR', 'PN'),
(291, 105, 'Potenza', 'PTZ', 'PZ'),
(292, 105, 'Prato', 'PRA', 'PO'),
(293, 105, 'Ragusa', 'RAG', 'RG'),
(294, 105, 'Ravenna', 'RAV', 'RA'),
(295, 105, 'Reggio Calabria', 'REG', 'RC'),
(296, 105, 'Reggio Emilia', 'REE', 'RE'),
(297, 105, 'Rieti', 'RIE', 'RI'),
(298, 105, 'Rimini', 'RIM', 'RN'),
(299, 105, 'Roma', 'ROM', 'RM'),
(300, 105, 'Rovigo', 'ROV', 'RO'),
(301, 105, 'Salerno', 'SAL', 'SA'),
(302, 105, 'Sassari', 'SAS', 'SS'),
(303, 105, 'Savona', 'SAV', 'SV'),
(304, 105, 'Siena', 'SIE', 'SI'),
(305, 105, 'Siracusa', 'SIR', 'SR'),
(306, 105, 'Sondrio', 'SOO', 'SO'),
(307, 105, 'Taranto', 'TAR', 'TA'),
(308, 105, 'Teramo', 'TER', 'TE'),
(309, 105, 'Terni', 'TRN', 'TR'),
(310, 105, 'Torino', 'TOR', 'TO'),
(311, 105, 'Trapani', 'TRA', 'TP'),
(312, 105, 'Trento', 'TRE', 'TN'),
(313, 105, 'Treviso', 'TRV', 'TV'),
(314, 105, 'Trieste', 'TRI', 'TS'),
(315, 105, 'Udine', 'UDI', 'UD'),
(316, 105, 'Varese', 'VAR', 'VA'),
(317, 105, 'Venezia', 'VEN', 'VE'),
(318, 105, 'Verbano Cusio Ossola', 'VCO', 'VB'),
(319, 105, 'Vercelli', 'VER', 'VC'),
(320, 105, 'Verona', 'VRN', 'VR'),
(321, 105, 'Vibo Valenzia', 'VIV', 'VV'),
(322, 105, 'Vicenza', 'VII', 'VI'),
(323, 105, 'Viterbo', 'VIT', 'VT'),
(324, 195, 'A Coruña', 'ACO', '15'),
(325, 195, 'Alava', 'ALA', '01'),
(326, 195, 'Albacete', 'ALB', '02'),
(327, 195, 'Alicante', 'ALI', '03'),
(328, 195, 'Almeria', 'ALM', '04'),
(329, 195, 'Asturias', 'AST', '33'),
(330, 195, 'Avila', 'AVI', '05'),
(331, 195, 'Badajoz', 'BAD', '06'),
(332, 195, 'Baleares', 'BAL', '07'),
(333, 195, 'Barcelona', 'BAR', '08'),
(334, 195, 'Burgos', 'BUR', '09'),
(335, 195, 'Caceres', 'CAC', '10'),
(336, 195, 'Cadiz', 'CAD', '11'),
(337, 195, 'Cantabria', 'CAN', '39'),
(338, 195, 'Castellon', 'CAS', '12'),
(339, 195, 'Ceuta', 'CEU', '51'),
(340, 195, 'Ciudad Real', 'CIU', '13'),
(341, 195, 'Cordoba', 'COR', '14'),
(342, 195, 'Cuenca', 'CUE', '16'),
(343, 195, 'Girona', 'GIR', '17'),
(344, 195, 'Granada', 'GRA', '18'),
(345, 195, 'Guadalajara', 'GUA', '19'),
(346, 195, 'Guipuzcoa', 'GUI', '20'),
(347, 195, 'Huelva', 'HUL', '21'),
(348, 195, 'Huesca', 'HUS', '22'),
(349, 195, 'Jaen', 'JAE', '23'),
(350, 195, 'La Rioja', 'LRI', '26'),
(351, 195, 'Las Palmas', 'LPA', '35'),
(352, 195, 'Leon', 'LEO', '24'),
(353, 195, 'Lleida', 'LLE', '25'),
(354, 195, 'Lugo', 'LUG', '27'),
(355, 195, 'Madrid', 'MAD', '28'),
(356, 195, 'Malaga', 'MAL', '29'),
(357, 195, 'Melilla', 'MEL', '52'),
(358, 195, 'Murcia', 'MUR', '30'),
(359, 195, 'Navarra', 'NAV', '31'),
(360, 195, 'Ourense', 'OUR', '32'),
(361, 195, 'Palencia', 'PAL', '34'),
(362, 195, 'Pontevedra', 'PON', '36'),
(363, 195, 'Salamanca', 'SAL', '37'),
(364, 195, 'Santa Cruz de Tenerife', 'SCT', '38'),
(365, 195, 'Segovia', 'SEG', '40'),
(366, 195, 'Sevilla', 'SEV', '41'),
(367, 195, 'Soria', 'SOR', '42'),
(368, 195, 'Tarragona', 'TAR', '43'),
(369, 195, 'Teruel', 'TER', '44'),
(370, 195, 'Toledo', 'TOL', '45'),
(371, 195, 'Valencia', 'VAL', '46'),
(372, 195, 'Valladolid', 'VLL', '47'),
(373, 195, 'Vizcaya', 'VIZ', '48'),
(374, 195, 'Zamora', 'ZAM', '49'),
(375, 195, 'Zaragoza', 'ZAR', '50'),
(376, 11, 'Aragatsotn', 'ARG', 'AG'),
(377, 11, 'Ararat', 'ARR', 'AR'),
(378, 11, 'Armavir', 'ARM', 'AV'),
(379, 11, 'Gegharkunik', 'GEG', 'GR'),
(380, 11, 'Kotayk', 'KOT', 'KT'),
(381, 11, 'Lori', 'LOR', 'LO'),
(382, 11, 'Shirak', 'SHI', 'SH'),
(383, 11, 'Syunik', 'SYU', 'SU'),
(384, 11, 'Tavush', 'TAV', 'TV'),
(385, 11, 'Vayots-Dzor', 'VAD', 'VD'),
(386, 11, 'Yerevan', 'YER', 'ER'),
(387, 99, 'Andaman & Nicobar Islands', 'ANI', 'AI'),
(388, 99, 'Andhra Pradesh', 'AND', 'AN'),
(389, 99, 'Arunachal Pradesh', 'ARU', 'AR'),
(390, 99, 'Assam', 'ASS', 'AS'),
(391, 99, 'Bihar', 'BIH', 'BI'),
(392, 99, 'Chandigarh', 'CHA', 'CA'),
(393, 99, 'Chhatisgarh', 'CHH', 'CH'),
(394, 99, 'Dadra & Nagar Haveli', 'DAD', 'DD'),
(395, 99, 'Daman & Diu', 'DAM', 'DA'),
(396, 99, 'Delhi', 'DEL', 'DE'),
(397, 99, 'Goa', 'GOA', 'GO'),
(398, 99, 'Gujarat', 'GUJ', 'GU'),
(399, 99, 'Haryana', 'HAR', 'HA'),
(400, 99, 'Himachal Pradesh', 'HIM', 'HI'),
(401, 99, 'Jammu & Kashmir', 'JAM', 'JA'),
(402, 99, 'Jharkhand', 'JHA', 'JH'),
(403, 99, 'Karnataka', 'KAR', 'KA'),
(404, 99, 'Kerala', 'KER', 'KE'),
(405, 99, 'Lakshadweep', 'LAK', 'LA'),
(406, 99, 'Madhya Pradesh', 'MAD', 'MD'),
(407, 99, 'Maharashtra', 'MAH', 'MH'),
(408, 99, 'Manipur', 'MAN', 'MN'),
(409, 99, 'Meghalaya', 'MEG', 'ME'),
(410, 99, 'Mizoram', 'MIZ', 'MI'),
(411, 99, 'Nagaland', 'NAG', 'NA'),
(412, 99, 'Orissa', 'ORI', 'OR'),
(413, 99, 'Pondicherry', 'PON', 'PO'),
(414, 99, 'Punjab', 'PUN', 'PU'),
(415, 99, 'Rajasthan', 'RAJ', 'RA'),
(416, 99, 'Sikkim', 'SIK', 'SI'),
(417, 99, 'Tamil Nadu', 'TAM', 'TA'),
(418, 99, 'Tripura', 'TRI', 'TR'),
(419, 99, 'Uttaranchal', 'UAR', 'UA'),
(420, 99, 'Uttar Pradesh', 'UTT', 'UT'),
(421, 99, 'West Bengal', 'WES', 'WE'),
(422, 101, 'Ahmadi va Kohkiluyeh', 'BOK', 'BO'),
(423, 101, 'Ardabil', 'ARD', 'AR'),
(424, 101, 'Azarbayjan-e Gharbi', 'AZG', 'AG'),
(425, 101, 'Azarbayjan-e Sharqi', 'AZS', 'AS'),
(426, 101, 'Bushehr', 'BUS', 'BU'),
(427, 101, 'Chaharmahal va Bakhtiari', 'CMB', 'CM'),
(428, 101, 'Esfahan', 'ESF', 'ES'),
(429, 101, 'Fars', 'FAR', 'FA'),
(430, 101, 'Gilan', 'GIL', 'GI'),
(431, 101, 'Gorgan', 'GOR', 'GO'),
(432, 101, 'Hamadan', 'HAM', 'HA'),
(433, 101, 'Hormozgan', 'HOR', 'HO'),
(434, 101, 'Ilam', 'ILA', 'IL'),
(435, 101, 'Kerman', 'KER', 'KE'),
(436, 101, 'Kermanshah', 'BAK', 'BA'),
(437, 101, 'Khorasan-e Junoubi', 'KHJ', 'KJ'),
(438, 101, 'Khorasan-e Razavi', 'KHR', 'KR'),
(439, 101, 'Khorasan-e Shomali', 'KHS', 'KS'),
(440, 101, 'Khuzestan', 'KHU', 'KH'),
(441, 101, 'Kordestan', 'KOR', 'KO'),
(442, 101, 'Lorestan', 'LOR', 'LO'),
(443, 101, 'Markazi', 'MAR', 'MR'),
(444, 101, 'Mazandaran', 'MAZ', 'MZ'),
(445, 101, 'Qazvin', 'QAS', 'QA'),
(446, 101, 'Qom', 'QOM', 'QO'),
(447, 101, 'Semnan', 'SEM', 'SE'),
(448, 101, 'Sistan va Baluchestan', 'SBA', 'SB'),
(449, 101, 'Tehran', 'TEH', 'TE'),
(450, 101, 'Yazd', 'YAZ', 'YA'),
(451, 101, 'Zanjan', 'ZAN', 'ZA');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_tax_rate`
--

CREATE TABLE IF NOT EXISTS `jos_vm_tax_rate` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `tax_state` varchar(64) DEFAULT NULL,
  `tax_country` varchar(64) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `tax_rate` decimal(10,5) DEFAULT NULL,
  PRIMARY KEY (`tax_rate_id`),
  KEY `idx_tax_rate_vendor_id` (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The tax rates for your store' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jos_vm_tax_rate`
--

INSERT INTO `jos_vm_tax_rate` (`tax_rate_id`, `vendor_id`, `tax_state`, `tax_country`, `mdate`, `tax_rate`) VALUES
(2, 1, 'CA', 'USA', 964565926, '0.09750');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_userfield`
--

CREATE TABLE IF NOT EXISTS `jos_vm_userfield` (
  `fieldid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT '',
  `maxlength` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `required` tinyint(4) DEFAULT '0',
  `ordering` int(11) DEFAULT NULL,
  `cols` int(11) DEFAULT NULL,
  `rows` int(11) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `default` int(11) DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `registration` tinyint(1) NOT NULL DEFAULT '0',
  `shipping` tinyint(1) NOT NULL DEFAULT '0',
  `account` tinyint(1) NOT NULL DEFAULT '1',
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `calculated` tinyint(1) NOT NULL DEFAULT '0',
  `sys` tinyint(4) NOT NULL DEFAULT '0',
  `vendor_id` int(11) DEFAULT NULL,
  `params` mediumtext,
  PRIMARY KEY (`fieldid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds the fields for the user information' AUTO_INCREMENT=36 ;

--
-- Dumping data for table `jos_vm_userfield`
--

INSERT INTO `jos_vm_userfield` (`fieldid`, `name`, `title`, `description`, `type`, `maxlength`, `size`, `required`, `ordering`, `cols`, `rows`, `value`, `default`, `published`, `registration`, `shipping`, `account`, `readonly`, `calculated`, `sys`, `vendor_id`, `params`) VALUES
(1, 'email', 'REGISTER_EMAIL', '', 'emailaddress', 100, 30, 1, 2, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(7, 'title', 'PHPSHOP_SHOPPER_FORM_TITLE', '', 'select', 0, 0, 0, 8, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(3, 'password', 'PHPSHOP_SHOPPER_FORM_PASSWORD_1', '', 'password', 25, 30, 1, 4, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(4, 'password2', 'PHPSHOP_SHOPPER_FORM_PASSWORD_2', '', 'password', 25, 30, 1, 5, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, NULL),
(6, 'company', 'PHPSHOP_SHOPPER_FORM_COMPANY_NAME', '', 'text', 64, 30, 0, 7, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(5, 'delimiter_billto', 'PHPSHOP_USER_FORM_BILLTO_LBL', '', 'delimiter', 25, 30, 0, 6, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 0, 1, NULL),
(2, 'username', 'REGISTER_UNAME', '', 'text', 25, 30, 1, 3, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 1, 1, ''),
(35, 'address_type_name', 'PHPSHOP_USER_FORM_ADDRESS_LABEL', '', 'text', 32, 30, 1, 6, NULL, NULL, NULL, NULL, 1, 0, 1, 0, 0, 0, 1, 1, NULL),
(8, 'first_name', 'PHPSHOP_SHOPPER_FORM_FIRST_NAME', '', 'text', 32, 30, 1, 9, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(9, 'last_name', 'PHPSHOP_SHOPPER_FORM_LAST_NAME', '', 'text', 32, 30, 1, 10, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(10, 'middle_name', 'PHPSHOP_SHOPPER_FORM_MIDDLE_NAME', '', 'text', 32, 30, 0, 11, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(11, 'address_1', 'PHPSHOP_SHOPPER_FORM_ADDRESS_1', '', 'text', 64, 30, 1, 12, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(12, 'address_2', 'PHPSHOP_SHOPPER_FORM_ADDRESS_2', '', 'text', 64, 30, 0, 13, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(13, 'city', 'PHPSHOP_SHOPPER_FORM_CITY', '', 'text', 32, 30, 1, 14, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(14, 'zip', 'PHPSHOP_SHOPPER_FORM_ZIP', '', 'text', 32, 30, 1, 15, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(15, 'country', 'PHPSHOP_SHOPPER_FORM_COUNTRY', '', 'select', 0, 0, 1, 16, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(16, 'state', 'PHPSHOP_SHOPPER_FORM_STATE', '', 'select', 0, 0, 1, 17, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(17, 'phone_1', 'PHPSHOP_SHOPPER_FORM_PHONE', '', 'text', 32, 30, 1, 18, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(18, 'phone_2', 'PHPSHOP_SHOPPER_FORM_PHONE2', '', 'text', 32, 30, 0, 19, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(19, 'fax', 'PHPSHOP_SHOPPER_FORM_FAX', '', 'text', 32, 30, 0, 20, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 1, 1, NULL),
(20, 'delimiter_bankaccount', 'PHPSHOP_ACCOUNT_BANK_TITLE', '', 'delimiter', 25, 30, 0, 21, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 0, 1, NULL),
(21, 'bank_account_holder', 'PHPSHOP_ACCOUNT_LBL_BANK_ACCOUNT_HOLDER', '', 'text', 48, 30, 0, 22, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(22, 'bank_account_nr', 'PHPSHOP_ACCOUNT_LBL_BANK_ACCOUNT_NR', '', 'text', 32, 30, 0, 23, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(23, 'bank_sort_code', 'PHPSHOP_ACCOUNT_LBL_BANK_SORT_CODE', '', 'text', 16, 30, 0, 24, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(24, 'bank_name', 'PHPSHOP_ACCOUNT_LBL_BANK_NAME', '', 'text', 32, 30, 0, 25, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(25, 'bank_account_type', 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE', '', 'select', 0, 0, 0, 26, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 1, 0, 1, 1, ''),
(26, 'bank_iban', 'PHPSHOP_ACCOUNT_LBL_BANK_IBAN', '', 'text', 64, 30, 0, 27, NULL, NULL, NULL, NULL, 1, 0, 0, 1, 0, 0, 1, 1, NULL),
(27, 'delimiter_sendregistration', 'BUTTON_SEND_REG', '', 'delimiter', 25, 30, 0, 28, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 0, 1, NULL),
(28, 'agreed', 'PHPSHOP_I_AGREE_TO_TOS', '', 'checkbox', NULL, NULL, 1, 29, NULL, NULL, NULL, NULL, 1, 1, 0, 0, 0, 0, 1, 1, NULL),
(29, 'delimiter_userinfo', 'PHPSHOP_ORDER_PRINT_CUST_INFO_LBL', '', 'delimiter', NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 0, 0, 0, 1, NULL),
(30, 'extra_field_1', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_1', '', 'text', 255, 30, 0, 31, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(31, 'extra_field_2', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_2', '', 'text', 255, 30, 0, 32, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(32, 'extra_field_3', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_3', '', 'text', 255, 30, 0, 33, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(33, 'extra_field_4', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_4', '', 'select', 1, 1, 0, 34, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL),
(34, 'extra_field_5', 'PHPSHOP_SHOPPER_FORM_EXTRA_FIELD_5', '', 'select', 1, 1, 0, 35, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_userfield_values`
--

CREATE TABLE IF NOT EXISTS `jos_vm_userfield_values` (
  `fieldvalueid` int(11) NOT NULL AUTO_INCREMENT,
  `fieldid` int(11) NOT NULL DEFAULT '0',
  `fieldtitle` varchar(255) NOT NULL DEFAULT '',
  `fieldvalue` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0',
  `sys` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fieldvalueid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Holds the different values for dropdown and radio lists' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jos_vm_userfield_values`
--

INSERT INTO `jos_vm_userfield_values` (`fieldvalueid`, `fieldid`, `fieldtitle`, `fieldvalue`, `ordering`, `sys`) VALUES
(1, 25, 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_BUSINESSCHECKING', 'Checking', 1, 1),
(2, 25, 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_CHECKING', 'Business Checking', 2, 1),
(3, 25, 'PHPSHOP_ACCOUNT_LBL_ACCOUNT_TYPE_SAVINGS', 'Savings', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_user_info`
--

CREATE TABLE IF NOT EXISTS `jos_vm_user_info` (
  `user_info_id` varchar(32) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `address_type` char(2) DEFAULT NULL,
  `address_type_name` varchar(32) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `middle_name` varchar(32) DEFAULT NULL,
  `phone_1` varchar(32) DEFAULT NULL,
  `phone_2` varchar(32) DEFAULT NULL,
  `fax` varchar(32) DEFAULT NULL,
  `address_1` varchar(64) NOT NULL DEFAULT '',
  `address_2` varchar(64) DEFAULT NULL,
  `city` varchar(32) NOT NULL DEFAULT '',
  `state` varchar(32) NOT NULL DEFAULT '',
  `country` varchar(32) NOT NULL DEFAULT 'US',
  `zip` varchar(32) NOT NULL DEFAULT '',
  `user_email` varchar(255) DEFAULT NULL,
  `extra_field_1` varchar(255) DEFAULT NULL,
  `extra_field_2` varchar(255) DEFAULT NULL,
  `extra_field_3` varchar(255) DEFAULT NULL,
  `extra_field_4` char(1) DEFAULT NULL,
  `extra_field_5` char(1) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `perms` varchar(40) NOT NULL DEFAULT 'shopper',
  `bank_account_nr` varchar(32) NOT NULL DEFAULT '',
  `bank_name` varchar(32) NOT NULL DEFAULT '',
  `bank_sort_code` varchar(16) NOT NULL DEFAULT '',
  `bank_iban` varchar(64) NOT NULL DEFAULT '',
  `bank_account_holder` varchar(48) NOT NULL DEFAULT '',
  `bank_account_type` enum('Checking','Business Checking','Savings') NOT NULL DEFAULT 'Checking',
  PRIMARY KEY (`user_info_id`),
  KEY `idx_user_info_user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Customer Information, BT = BillTo and ST = ShipTo';

--
-- Dumping data for table `jos_vm_user_info`
--

INSERT INTO `jos_vm_user_info` (`user_info_id`, `user_id`, `address_type`, `address_type_name`, `company`, `title`, `last_name`, `first_name`, `middle_name`, `phone_1`, `phone_2`, `fax`, `address_1`, `address_2`, `city`, `state`, `country`, `zip`, `user_email`, `extra_field_1`, `extra_field_2`, `extra_field_3`, `extra_field_4`, `extra_field_5`, `cdate`, `mdate`, `perms`, `bank_account_nr`, `bank_name`, `bank_sort_code`, `bank_iban`, `bank_account_holder`, `bank_account_type`) VALUES
('4520400a570f504d45071823c7b5f1f2', 62, 'BT', NULL, 'vpp duc manh', 'Mr.', 'duc manh', 'duc manh', '', '09878677675', '', '', 'binh duong', '', 'hcm', ' - ', 'VNM', '8408', 'pooluaf@googlegroups.com', NULL, NULL, NULL, NULL, NULL, 1316217641, 1318515012, 'admin', '', '', '', '', '', 'Checking'),
('78ee02e05b7a8c24911923ba991c505c', 64, 'BT', '-default-', 'duc manh', 'Mr.', 'duc manh', 'duc manh', '', '097567657', '', '', 'binh duong', '', 'hcm', ' - ', 'VNM', '8408', 'ducmanh@vanphongphamducmanh.com', NULL, NULL, NULL, NULL, NULL, 1318515112, 1318515695, 'shopper', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_vendor`
--

CREATE TABLE IF NOT EXISTS `jos_vm_vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(64) DEFAULT NULL,
  `contact_last_name` varchar(32) NOT NULL DEFAULT '',
  `contact_first_name` varchar(32) NOT NULL DEFAULT '',
  `contact_middle_name` varchar(32) DEFAULT NULL,
  `contact_title` varchar(32) DEFAULT NULL,
  `contact_phone_1` varchar(32) NOT NULL DEFAULT '',
  `contact_phone_2` varchar(32) DEFAULT NULL,
  `contact_fax` varchar(32) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `vendor_phone` varchar(32) DEFAULT NULL,
  `vendor_address_1` varchar(64) NOT NULL DEFAULT '',
  `vendor_address_2` varchar(64) DEFAULT NULL,
  `vendor_city` varchar(32) NOT NULL DEFAULT '',
  `vendor_state` varchar(32) NOT NULL DEFAULT '',
  `vendor_country` varchar(32) NOT NULL DEFAULT 'US',
  `vendor_zip` varchar(32) NOT NULL DEFAULT '',
  `vendor_store_name` varchar(128) NOT NULL DEFAULT '',
  `vendor_store_desc` text,
  `vendor_category_id` int(11) DEFAULT NULL,
  `vendor_thumb_image` varchar(255) DEFAULT NULL,
  `vendor_full_image` varchar(255) DEFAULT NULL,
  `vendor_currency` varchar(16) DEFAULT NULL,
  `cdate` int(11) DEFAULT NULL,
  `mdate` int(11) DEFAULT NULL,
  `vendor_image_path` varchar(255) DEFAULT NULL,
  `vendor_terms_of_service` text NOT NULL,
  `vendor_url` varchar(255) NOT NULL DEFAULT '',
  `vendor_min_pov` decimal(10,2) DEFAULT NULL,
  `vendor_freeshipping` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vendor_currency_display_style` varchar(64) NOT NULL DEFAULT '',
  `vendor_accepted_currencies` text NOT NULL,
  `vendor_address_format` text NOT NULL,
  `vendor_date_format` varchar(255) NOT NULL,
  PRIMARY KEY (`vendor_id`),
  KEY `idx_vendor_name` (`vendor_name`),
  KEY `idx_vendor_category_id` (`vendor_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Vendors manage their products in your store' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jos_vm_vendor`
--

INSERT INTO `jos_vm_vendor` (`vendor_id`, `vendor_name`, `contact_last_name`, `contact_first_name`, `contact_middle_name`, `contact_title`, `contact_phone_1`, `contact_phone_2`, `contact_fax`, `contact_email`, `vendor_phone`, `vendor_address_1`, `vendor_address_2`, `vendor_city`, `vendor_state`, `vendor_country`, `vendor_zip`, `vendor_store_name`, `vendor_store_desc`, `vendor_category_id`, `vendor_thumb_image`, `vendor_full_image`, `vendor_currency`, `cdate`, `mdate`, `vendor_image_path`, `vendor_terms_of_service`, `vendor_url`, `vendor_min_pov`, `vendor_freeshipping`, `vendor_currency_display_style`, `vendor_accepted_currencies`, `vendor_address_format`, `vendor_date_format`) VALUES
(1, 'Cty TNHH TM & DV Đức Mạnh', 'Owner', 'Demo', 'Store', 'Mr.', '555-555-1212', '555-555-1212', '555-555-1212', 'pool-uaf@googlegroups.com', '555-555-1212', 'Bình Dương, Hồ Chí Minh', '', 'Hồ Chí Minh', ' - ', 'VNM', '84055', 'Văn phòng phẩm Đức Mạnh', '', 0, '', 'c19970d6f2970cb0d1b13bea3af3144a.gif', 'VND', 950302468, 1318842192, '', '<h5></h5>', 'http://localhost/vanphongphamdm', '0.00', '0.00', '1|VND|2|.| |2|1', 'USD,VND', '{storename}\r\n{address_1}\r\n{address_2}\r\n{city}, {zip}', '%A, %d %B %Y %H:%M');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_vendor_category`
--

CREATE TABLE IF NOT EXISTS `jos_vm_vendor_category` (
  `vendor_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_category_name` varchar(64) DEFAULT NULL,
  `vendor_category_desc` text,
  PRIMARY KEY (`vendor_category_id`),
  KEY `idx_vendor_category_category_name` (`vendor_category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The categories that vendors are assigned to' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jos_vm_vendor_category`
--

INSERT INTO `jos_vm_vendor_category` (`vendor_category_id`, `vendor_category_name`, `vendor_category_desc`) VALUES
(6, '-default-', 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_waiting_list`
--

CREATE TABLE IF NOT EXISTS `jos_vm_waiting_list` (
  `waiting_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `notify_email` varchar(150) NOT NULL DEFAULT '',
  `notified` enum('0','1') DEFAULT '0',
  `notify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`waiting_list_id`),
  KEY `product_id` (`product_id`),
  KEY `notify_email` (`notify_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Stores notifications, users waiting f. products out of stock' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jos_vm_zone_shipping`
--

CREATE TABLE IF NOT EXISTS `jos_vm_zone_shipping` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(255) DEFAULT NULL,
  `zone_cost` decimal(10,2) DEFAULT NULL,
  `zone_limit` decimal(10,2) DEFAULT NULL,
  `zone_description` text NOT NULL,
  `zone_tax_rate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='The Zones managed by the Zone Shipping Module' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jos_vm_zone_shipping`
--

INSERT INTO `jos_vm_zone_shipping` (`zone_id`, `zone_name`, `zone_cost`, `zone_limit`, `zone_description`, `zone_tax_rate`) VALUES
(1, 'Default', '6.00', '35.00', 'This is the default Shipping Zone. This is the zone information that all countries will use until you assign each individual country to a Zone.', 2),
(2, 'Zone 1', '1000.00', '10000.00', 'This is a zone example', 2),
(3, 'Zone 2', '2.00', '22.00', 'This is the second zone. You can use this for notes about this zone', 2),
(4, 'Zone 3', '11.00', '64.00', 'Another usefull thing might be details about this zone or special instructions.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jos_weblinks`
--

CREATE TABLE IF NOT EXISTS `jos_weblinks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(250) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `checked_out` int(11) NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `params` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jos_weblinks`
--

INSERT INTO `jos_weblinks` (`id`, `catid`, `sid`, `title`, `alias`, `url`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `archived`, `approved`, `params`) VALUES
(1, 2, 0, 'Joomla!', 'joomla', 'http://www.joomla.org', 'Home of Joomla!', '2005-02-14 15:19:02', 3, 1, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=0'),
(2, 2, 0, 'php.net', 'php', 'http://www.php.net', 'The language that Joomla! is developed in', '2004-07-07 11:33:24', 6, 1, 0, '0000-00-00 00:00:00', 3, 0, 1, ''),
(3, 2, 0, 'MySQL', 'mysql', 'http://www.mysql.com', 'The database that Joomla! uses', '2004-07-07 10:18:31', 1, 1, 0, '0000-00-00 00:00:00', 5, 0, 1, ''),
(4, 2, 0, 'OpenSourceMatters', 'opensourcematters', 'http://www.opensourcematters.org', 'Home of OSM', '2005-02-14 15:19:02', 11, 1, 0, '0000-00-00 00:00:00', 2, 0, 1, 'target=0'),
(5, 2, 0, 'Joomla! - Forums', 'joomla-forums', 'http://forum.joomla.org', 'Joomla! Forums', '2005-02-14 15:19:02', 4, 1, 0, '0000-00-00 00:00:00', 4, 0, 1, 'target=0'),
(6, 2, 0, 'Ohloh Tracking of Joomla!', 'ohloh-tracking-of-joomla', 'http://www.ohloh.net/projects/20', 'Objective reports from Ohloh about Joomla''s development activity. Joomla! has some star developers with serious kudos.', '2007-07-19 09:28:31', 1, 1, 0, '0000-00-00 00:00:00', 6, 0, 1, 'target=0\n\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
