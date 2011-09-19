<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @package VirtueMart
* @subpackage languages
* @copyright Copyright (C) 2004-2008 soeren - All rights reserved.
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
	'PHPSHOP_USER_LIST_LBL' => 'Notendalisti',
	'PHPSHOP_USER_LIST_USERNAME' => 'Notendanafn',
	'PHPSHOP_USER_LIST_FULL_NAME' => 'Fullt nafn',
	'PHPSHOP_USER_LIST_GROUP' => 'Hópur',
	'PHPSHOP_USER_FORM_LBL' => 'Bæta við upplýsingum um notanda',
	'PHPSHOP_USER_FORM_PERMS' => 'Leyfi',
	'PHPSHOP_USER_FORM_CUSTOMER_NUMBER' => 'Customer Number / ID',
	'PHPSHOP_MODULE_LIST_LBL' => 'Listi yfir Module',
	'PHPSHOP_MODULE_LIST_NAME' => 'Nafn Module',
	'PHPSHOP_MODULE_LIST_PERMS' => 'Leyfi Module',
	'PHPSHOP_MODULE_LIST_FUNCTIONS' => 'Aðgerðir',
	'PHPSHOP_MODULE_FORM_LBL' => 'Upplýsingar Module',
	'PHPSHOP_MODULE_FORM_MODULE_LABEL' => 'Nafn Module (fyrir Topvalmynd)',
	'PHPSHOP_MODULE_FORM_NAME' => 'Module Nafn',
	'PHPSHOP_MODULE_FORM_PERMS' => 'Module Leyfi',
	'PHPSHOP_MODULE_FORM_HEADER' => 'Module Haus',
	'PHPSHOP_MODULE_FORM_FOOTER' => 'Module Botn',
	'PHPSHOP_MODULE_FORM_MENU' => 'Sýna Module í valmynd kerfisstjórnar?',
	'PHPSHOP_MODULE_FORM_ORDER' => 'Röðun glugga',
	'PHPSHOP_MODULE_FORM_DESCRIPTION' => 'Module Lýsing',
	'PHPSHOP_MODULE_FORM_LANGUAGE_CODE' => 'Kóði tungumáls',
	'PHPSHOP_MODULE_FORM_LANGUAGE_FILE' => 'Language File',
	'PHPSHOP_FUNCTION_LIST_LBL' => 'Aðgerðar listi',
	'PHPSHOP_FUNCTION_LIST_NAME' => 'Function Name',
	'PHPSHOP_FUNCTION_LIST_CLASS' => 'Class Nafn',
	'PHPSHOP_FUNCTION_LIST_METHOD' => 'Class Aðferð',
	'PHPSHOP_FUNCTION_LIST_PERMS' => 'Leyfi',
	'PHPSHOP_FUNCTION_FORM_LBL' => 'Upplýsingar um aðgerð',
	'PHPSHOP_FUNCTION_FORM_NAME' => 'Nafn aðgerðar',
	'PHPSHOP_FUNCTION_FORM_CLASS' => 'Class Nafn',
	'PHPSHOP_FUNCTION_FORM_METHOD' => 'Class aðferð',
	'PHPSHOP_FUNCTION_FORM_PERMS' => 'Function leyfi',
	'PHPSHOP_FUNCTION_FORM_DESCRIPTION' => 'aðgerð',
	'PHPSHOP_CURRENCY_LIST_LBL' => 'Listi yfir gjaldmiðla',
	'PHPSHOP_CURRENCY_LIST_NAME' => 'Nafn gjaldmiðils',
	'PHPSHOP_CURRENCY_LIST_CODE' => 'Kóði fyrir gjaldmiðil',
	'PHPSHOP_COUNTRY_LIST_LBL' => 'Listi yfir lönd',
	'PHPSHOP_COUNTRY_LIST_NAME' => 'Nafn lands',
	'PHPSHOP_COUNTRY_LIST_3_CODE' => 'Kenni lands (3)',
	'PHPSHOP_COUNTRY_LIST_2_CODE' => 'Kenni lands (2)',
	'PHPSHOP_STATE_LIST_MNU' => 'List State',
	'PHPSHOP_STATE_LIST_LBL' => 'State List for: ',
	'PHPSHOP_STATE_LIST_ADD' => 'Add/Update a State',
	'PHPSHOP_STATE_LIST_NAME' => 'State Name',
	'PHPSHOP_STATE_LIST_3_CODE' => 'State Code (3)',
	'PHPSHOP_STATE_LIST_2_CODE' => 'State Code (2)',
	'PHPSHOP_ADMIN_CFG_GLOBAL' => 'Global',
	'PHPSHOP_ADMIN_CFG_SITE' => 'Síða',
	'PHPSHOP_ADMIN_CFG_SHIPPING' => 'Sendingar',
	'PHPSHOP_ADMIN_CFG_CHECKOUT' => 'Frágangur',
	'PHPSHOP_ADMIN_CFG_DOWNLOADABLEGOODS' => 'Niðurhal',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE' => 'Nota einungis sem vörulista',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE_EXPLAIN' => 'If you check this, you disable all cart functionalities.',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES' => 'Sýna verð',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES_EXPLAIN' => 'Check to show prices. If using catalogue functionality, some don\'t want prices to appear on pages.',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX' => 'Virtual Tax',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX_EXPLAIN' => 'This determines whether items with zero weight are taxed or not. Modify ps_checkout.php->calc_order_taxable() to customize this.',
	'PHPSHOP_ADMIN_CFG_TAX_MODE' => 'Tax mode:',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_SHIP' => 'Based on shipping address',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_VENDOR' => 'Based on vendor address',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_EXPLAIN' => 'This determines which tax rate is taken for calculating taxes:<br />
                                                <ul><li>the one from the state / country the store owner comes from</li><br/>
                                                <li>or the one from where the shopper comes from.</li></ul>',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE' => 'Enable multiple tax rates?',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE_EXPLAIN' => 'Check this, if you have products with different tax rates (e.g. 7% for books and food, 16% for other stuff)',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE' => 'Subtract payment discount before tax/shipping?',
	'PHPSHOP_ADMIN_CFG_REVIEW' => 'Enable Customer Review/Rating System',
	'PHPSHOP_ADMIN_CFG_REVIEW_EXPLAIN' => 'If enabled, you allow customers to <strong>rate products</strong> and <strong>write reviews</strong> about them. <br />
                                                                                So customers can write down their experiences with the product for other customers.<br />',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE_EXPLAIN' => 'Sets the flag whether to subtract the Discount for the selected payment BEFORE (checked) or AFTER tax and shipping.',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS' => 'Must agree to Terms of Service?',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_EXPLAIN' => 'Check if you want a shopper to agree to your terms of service before registering to the shop.',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK' => 'Check Stock?',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK_EXPLAIN' => 'Sets whether to check the stock level when a user adds an item to the shopping cart. 
                                                                                          If set, this will not allow user to add more items to the cart than are available in stock.',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE' => 'Enable Affiliate Program?',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE_EXPLAIN' => 'This enables the affiliate tracking in the shop-frontend. Enable if you have added affiliates in the backend..',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT' => 'Order-mail format:',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_TEXT' => 'Text mail',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_HTML' => 'HTML mail',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_EXPLAIN' => 'This determines how your order confirmation emails are set up:<br />
                                                                                        <ul><li>as a simple text email</li>
                                                                                        <li>or as a html email with images.</li></ul>',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN' => 'Allow Frontend-Administration for non-Backend Users?',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN_EXPLAIN' => 'With this setting you can enable the Frontend Administration for users who 
                                                                                              are storeadmins, but can\'t access the Mambo Backend (e.g. Registered / Editor).',
	'PHPSHOP_ADMIN_CFG_URLSECURE' => 'SECUREURL',
	'PHPSHOP_ADMIN_CFG_URLSECURE_EXPLAIN' => 'The secure URL to your site. (https - with trailing slash at the end!)',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE' => 'HOMEPAGE',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE_EXPLAIN' => 'This is the page which will be loaded by default.',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE' => 'ERRORPAGE',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE_EXPLAIN' => 'This is the default page for displaying error messages.',
	'PHPSHOP_ADMIN_CFG_DEBUG' => 'DEBUG ?',
	'PHPSHOP_ADMIN_CFG_DEBUG_EXPLAIN' => 'DEBUG?  	   	Turns on the debug output. This causes the DEBUGPAGE to be displayed at the bottom of each page. Very helpful during shop development since it shows the carts contents, form field values, etc.',
	'PHPSHOP_ADMIN_CFG_FLYPAGE' => 'FLYPAGE',
	'PHPSHOP_ADMIN_CFG_FLYPAGE_EXPLAIN' => 'This is the default page for displaying product details.',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE' => 'Category Template',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE_EXPLAIN' => 'This defines the default category template for displaying products in a category.<br />
                                                                                                      You can create new templates by customizing existing template files <br />
                                                                                                      (which reside in the directory <strong>COMPONENTPATH/html/templates/</strong> and begin with browse_)',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW' => 'Sjálfvalið number of products in a row',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW_EXPLAIN' => 'This defines the number of products in a row. <br />
                                                                                                      Example: If you set it to 4, the category template will display 4 products per row',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE' => '"no image" image',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE_EXPLAIN' => 'This image will be shown when no product image is available.',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION' => 'Show footer ',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION_EXPLAIN' => 'Displays a powered-by-mambo-phpShop footer image.',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_STANDARD' => 'Standard Shipping module with indiviual configured carriers and rates. <strong>RECOMMENDED !</strong>',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_ZONE' => '  	Zone Shipping Module Country Version 1.0<br />
                                                                                                            For more information on this module please visit <a href="http://ZephWare.com">http://ZephWare.com</a><br />
                                                                                                            for details or contact <a href="mailto:zephware@devcompany.com">ZephWare.com</a><br /> Check this to enable the zone shipping module',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_DISABLE' => 'Disable Shipping method selection. Choose if your customers buy downloadable goods which don\'t have to be shipped.',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR' => 'Enable the Checkout Bar',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR_EXPLAIN' => 'Check this, if you want the \'checkout-bar\' to be displayed to the customer during checkout process ( 1 - 2 - 3 - 4 with graphics).',
	'PHPSHOP_ADMIN_CFG_CHECKOUT_PROCESS' => 'Choose your store\'s checkout process',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS' => 'Enable Downloads',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS_EXPLAIN' => 'Check to enable the download capability. Only If you want sell downloadable goods.',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS' => 'Order Status which enables download',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS_EXPLAIN' => 'Select the order status at which the customer is notified about the download via e-mail.',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS' => 'Order Status which disables downloads',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS_EXPLAIN' => 'Sets the order status at which the download is disabled for the customer.',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT' => 'DOWNLOADROOT',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT_EXPLAIN' => 'The physical path to the files for the custumer download. (trailing slash at the end!)<br>
        <span class="message">For your own shop\'s security: If you can, please use a directory ANYWHERE OUTSIDE OF THE WEBROOT</span>',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX' => 'Download Maximum',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX_EXPLAIN' => 'Sets the number of downloads which can be made with one Download-ID, (for one order)',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE' => 'Download Expire',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE_EXPLAIN' => 'Sets the time range <strong>in seconds</strong> in which the download is enabled for the customer. 
  This range begins with the first download! When the time range has expired, the download-ID is disabled.<br />Note : 86400s=24h.',
	'PHPSHOP_COUPONS' => 'Coupons',
	'PHPSHOP_COUPONS_ENABLE' => 'Enable Coupon Usage',
	'PHPSHOP_COUPONS_ENABLE_EXPLAIN' => 'If you enable the Coupon Usage, you allow customers to fill in Coupon Numbers to gain discounts on their purchase.',
	'PHPSHOP_ADMIN_CFG_PDF_BUTTON' => 'PDF - Button',
	'PHPSHOP_ADMIN_CFG_PDF_BUTTON_EXPLAIN' => 'Show or Hide the PDF - Button in the Shop',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_ONORDER' => 'Must agree to Terms of Service on EVERY ORDER?',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_ONORDER_EXPLAIN' => 'Check if you want a shopper to agree to your terms of service on EVERY ORDER (before placing the order).',
	'PHPSHOP_ADMIN_CFG_SHOW_OUT_OF_STOCK_PRODUCTS' => 'Show Products that are out of Stock',
	'PHPSHOP_ADMIN_CFG_SHOW_OUT_OF_STOCK_PRODUCTS_EXPLAIN' => 'When enabled, Products that are currently not in Stock are displayed. Otherwise such Products are hidden.',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE' => 'Shop is offline?',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE_TIP' => 'If you check this, the Shop will display an Offline Message.',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE_MSG' => 'Offline Message',
	'PHPSHOP_ADMIN_CFG_TABLEPREFIX' => 'Table Prefix for Shop Tables',
	'PHPSHOP_ADMIN_CFG_TABLEPREFIX_TIP' => 'This is <strong>vm</strong> per default',
	'PHPSHOP_ADMIN_CFG_NAV_AT_TOP' => 'Show Page Navigation at the Top of the Product Listing?',
	'PHPSHOP_ADMIN_CFG_NAV_AT_TOP_TIP' => 'Switches On or Off the Display of Page Navigation at the Top of the Product Listings in the Frontend.',
	'PHPSHOP_ADMIN_CFG_SHOW_PRODUCT_COUNT' => 'Show the Number of Products?',
	'PHPSHOP_ADMIN_CFG_SHOW_PRODUCT_COUNT_TIP' => 'Show the Number of Products in a Category like Category (4)?',
	'PHPSHOP_ADMIN_CFG_DYNAMIC_THUMBNAIL_RESIZING' => 'Enable Dynamic Thumbnail Resizing?',
	'PHPSHOP_ADMIN_CFG_DYNAMIC_THUMBNAIL_RESIZING_TIP' => 'If checked, you enable dynamic Image Resizing. This means that all Thumbnail Images are resized to fit the Sizes you provide below,
        using PHP\'s GD2 functions (you can check if you have GD2 support by browsing to "System" -> "System Info" -> "PHP Info" -> gd. 
        The Thumbnail Image quality is much better than Images which were "resized" by the browser. The newly generated Images are put into the directory /shop_image/prdu