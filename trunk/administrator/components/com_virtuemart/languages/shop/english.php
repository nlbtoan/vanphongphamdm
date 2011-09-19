<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version : italian.php 1071 2007-12-03 08:42:28Z thepisu $
* @package VirtueMart
* @subpackage languages
* @copyright Copyright (C) 2004-2007 soeren - All rights reserved.
* @translator soeren
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/
global $VM_LANG;
$langvars = array (
	'CHARSET' => 'ISO-8859-1',
	'PHPSHOP_BROWSE_LBL' => 'Browse',
	'PHPSHOP_FLYPAGE_LBL' => 'Chi ti&#7871;t ',
	'PHPSHOP_PRODUCT_FORM_EDIT_PRODUCT' => 'Edit this product',
	'PHPSHOP_DOWNLOADS_START' => 'B&#7855;t &#273;&#7847;u  <strong>Download</strong>',
	'PHPSHOP_DOWNLOADS_INFO' => 'Please enter the Download-ID you\'ve got in the e-mail and click \'Start Download\'.',
	'PHPSHOP_WAITING_LIST_MESSAGE' => 'Please enter your e-mail address below to be notified when this product comes back in stock. 
		We will not share, rent, sell or use this e-mail address for any other purpose other than to 
		tell you when the product is back in stock.<br /><br />Thank you!',
	'PHPSHOP_WAITING_LIST_THANKS' => 'Thanks for waiting! <br />We will let you know as soon as we get our inventory.',
	'PHPSHOP_WAITING_LIST_NOTIFY_ME' => 'Th&ocirc;ng b&aacute;o cho t&ocirc;i!',
	'PHPSHOP_SEARCH_ALL_CATEGORIES' => 'T&igrave;m ki&#7871;m t&#7845;t c&#7843; c&aacute;c lo&#7841;i',
	'PHPSHOP_SEARCH_ALL_PRODINFO' => 'T&igrave;m ki&#7871;m t&#7845;t c&#7843; c&aacute;c th&ocirc;ng tin s&#7843;n ph&#7849;m',
	'PHPSHOP_SEARCH_PRODNAME' => 'T&igrave;m theo t&ecirc;n s&#7843;n ph&#7849;m',
	'PHPSHOP_SEARCH_MANU_VENDOR' => 'T&igrave;m theo h&atilde;ng s&#7843;n ph&#7849;m',
	'PHPSHOP_SEARCH_DESCRIPTION' => 'T&igrave;m theo m&ocirc; t&#7843; s&#7843;n ph&#7849;m',
	'PHPSHOP_SEARCH_AND' => 'v&agrave;',
	'PHPSHOP_SEARCH_NOT' => 'kh&ocirc;ng',
	'PHPSHOP_SEARCH_TEXT1' => 'The first drop-down-list allows you to select a category to limit your search to. 
        The second drop-down-list allows you to limit your search to a particular piece of product information (e.g. Name). 
        Once you have selected these (or left the default ALL), enter the keyword to search for. ',
	'PHPSHOP_SEARCH_TEXT2' => ' You can further refine your search by adding a second keyword and selecting the AND or NOT operator. 
        Selecting AND means both words must be present for the product to be displayed. 
        Selecting NOT means the product will be displayed only if the first keyword is present 
        and the second is not.',
	'PHPSHOP_CONTINUE_SHOPPING' => 'Continue Shopping',
	'PHPSHOP_AVAILABLE_IMAGES' => 'Available Images for',
	'PHPSHOP_BACK_TO_DETAILS' => 'Back to Product Details',
	'PHPSHOP_IMAGE_NOT_FOUND' => 'Image not found!',
	'PHPSHOP_PARAMETER_SEARCH_TEXT1' => 'Do you will find products according to technical parametrs?<BR>You can used any prepared form:',
	'PHPSHOP_PARAMETER_SEARCH_NO_PRODUCT_TYPE' => 'I am sorry. There is no category for search.',
	'PHPSHOP_PARAMETER_SEARCH_BAD_PRODUCT_TYPE' => 'I am sorry. There is no published Product Type with this name.',
	'PHPSHOP_PARAMETER_SEARCH_IS_LIKE' => 'Is Like',
	'PHPSHOP_PARAMETER_SEARCH_IS_NOT_LIKE' => 'Is NOT Like',
	'PHPSHOP_PARAMETER_SEARCH_FULLTEXT' => 'Full-Text Search',
	'PHPSHOP_PARAMETER_SEARCH_FIND_IN_SET_ALL' => 'All Selected',
	'PHPSHOP_PARAMETER_SEARCH_FIND_IN_SET_ANY' => 'Any Selected',
	'PHPSHOP_PARAMETER_SEARCH_RESET_FORM' => 'Reset Form',
	'PHPSHOP_PRODUCT_NOT_FOUND' => 'Xin l&#7895;i, S&#7843;n ph&#7849;m b&#7841;n y&ecirc;u c&#7847;u kh&ocirc;ng  &#273;&#432;&#7907;c t&igrave;m th&#7845;y !',
	'PHPSHOP_PRODUCT_PACKAGING1' => 'S&#7889; {unit}s trong &#273;&#417;n v&#7883; &#273;&oacute;ng g&oacute;i :',
	'PHPSHOP_PRODUCT_PACKAGING2' => 'S&#7889; {unit}s trong h&#7897;p :',
	'PHPSHOP_CART_PRICE_PER_UNIT' => 'Gi&aacute;',
	'VM_PRODUCT_ENQUIRY_LBL' => 'Vui l&ograve;ng b&#7845;m v&agrave;o &#273;&acirc;y &#273;&#7875; y&ecirc;u c&#7847;u ho&#7863;c th&#7855;c m&#7855;c v&#7873; s&#7843;n ph&#7849;m n&agrave;y cho ch&uacute;ng t&ocirc;i.',
	'VM_RECOMMEND_FORM_LBL' => 'Khuy&ecirc;n b&#7841;n b&egrave; n&ecirc;n d&ugrave;ng s&#7843;n ph&#7849;m n&agrave;y t&#7841;i TanPhongPC.Com',
	'PHPSHOP_EMPTY_YOUR_CART' => 'Empty Cart',
	'VM_RETURN_TO_PRODUCT' => '<<< Quay l&#7841;i',
	'EMPTY_CATEGORY' => 'This Category is currently empty.',
	'ENQUIRY' => 'Th&#7855;c m&#7855;c',
	'NAME_PROMPT' => 'H&#7885; v&agrave; t&ecirc;n',
	'EMAIL_PROMPT' => 'Email',
	'MESSAGE_PROMPT' => 'N&#7897;i dung',
	'SEND_BUTTON' => 'G&#7917;i',
	'THANK_MESSAGE' => 'Thank you for your Enquiry. We will contact you as soon as possible.',
	'PROMPT_CLOSE' => 'Close',
	'VM_RECOVER_CART_REPLACE' => 'Replace Cart with Saved Cart',
	'VM_RECOVER_CART_MERGE' => 'Add Saved Cart to Current Cart',
	'VM_RECOVER_CART_DELETE' => 'Delete Saved Cart',
	'VM_EMPTY_YOUR_CART_TIP' => 'Clear the cart of all contents'
); $VM_LANG->initModule( 'shop', $langvars );
?>