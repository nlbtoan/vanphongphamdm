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
	'PHPSHOP_USER_LIST_LBL' => 'Lista utilizatorilor',
	'PHPSHOP_USER_LIST_USERNAME' => 'Username',
	'PHPSHOP_USER_LIST_FULL_NAME' => 'Nume complet',
	'PHPSHOP_USER_LIST_GROUP' => 'Grup',
	'PHPSHOP_USER_FORM_LBL' => 'Adauga/Modifica Informatii despre utilizator',
	'PHPSHOP_USER_FORM_PERMS' => 'Permisii',
	'PHPSHOP_USER_FORM_CUSTOMER_NUMBER' => 'Customer Number / ID',
	'PHPSHOP_MODULE_LIST_LBL' => 'Lista Modulelor',
	'PHPSHOP_MODULE_LIST_NAME' => 'Nume Modul',
	'PHPSHOP_MODULE_LIST_PERMS' => 'Permisiuni Modul',
	'PHPSHOP_MODULE_LIST_FUNCTIONS' => 'Functii',
	'PHPSHOP_MODULE_FORM_LBL' => 'Informatie Modul',
	'PHPSHOP_MODULE_FORM_MODULE_LABEL' => 'Nume modul (pentru Topmenu)',
	'PHPSHOP_MODULE_FORM_NAME' => 'Nume Modul',
	'PHPSHOP_MODULE_FORM_PERMS' => 'Permisiuni modul',
	'PHPSHOP_MODULE_FORM_HEADER' => 'Header Modul',
	'PHPSHOP_MODULE_FORM_FOOTER' => 'Footer modul',
	'PHPSHOP_MODULE_FORM_MENU' => 'Afiseaza modul in meniul Administrativ?',
	'PHPSHOP_MODULE_FORM_ORDER' => 'Ordinea afisarii',
	'PHPSHOP_MODULE_FORM_DESCRIPTION' => 'Descriere modul',
	'PHPSHOP_MODULE_FORM_LANGUAGE_CODE' => 'Cod Limba',
	'PHPSHOP_MODULE_FORM_LANGUAGE_FILE' => 'Language File',
	'PHPSHOP_FUNCTION_LIST_LBL' => 'Lista Functiilor',
	'PHPSHOP_FUNCTION_LIST_NAME' => 'Numele Functiilor',
	'PHPSHOP_FUNCTION_LIST_CLASS' => 'Numele Clasei',
	'PHPSHOP_FUNCTION_LIST_METHOD' => 'Metoda clasei',
	'PHPSHOP_FUNCTION_LIST_PERMS' => 'Permisiuni',
	'PHPSHOP_FUNCTION_FORM_LBL' => 'Informatii Functie',
	'PHPSHOP_FUNCTION_FORM_NAME' => 'Nume Funtie',
	'PHPSHOP_FUNCTION_FORM_CLASS' => 'Nume Clasa',
	'PHPSHOP_FUNCTION_FORM_METHOD' => 'Metoda Clasa',
	'PHPSHOP_FUNCTION_FORM_PERMS' => 'Permisiuni Functie',
	'PHPSHOP_FUNCTION_FORM_DESCRIPTION' => 'Descriere Functie',
	'PHPSHOP_CURRENCY_LIST_LBL' => 'Lista Monezilor',
	'PHPSHOP_CURRENCY_LIST_NAME' => 'Numele Monedei',
	'PHPSHOP_CURRENCY_LIST_CODE' => 'Codul Monedei',
	'PHPSHOP_COUNTRY_LIST_LBL' => 'Lista Tarilor',
	'PHPSHOP_COUNTRY_LIST_NAME' => 'Nume tara',
	'PHPSHOP_COUNTRY_LIST_3_CODE' => 'Cod tara (3)',
	'PHPSHOP_COUNTRY_LIST_2_CODE' => 'Cod tara (2)',
	'PHPSHOP_STATE_LIST_MNU' => 'List State',
	'PHPSHOP_STATE_LIST_LBL' => 'State List for: ',
	'PHPSHOP_STATE_LIST_ADD' => 'Add/Update a State',
	'PHPSHOP_STATE_LIST_NAME' => 'State Name',
	'PHPSHOP_STATE_LIST_3_CODE' => 'State Code (3)',
	'PHPSHOP_STATE_LIST_2_CODE' => 'State Code (2)',
	'PHPSHOP_ADMIN_CFG_GLOBAL' => 'Global',
	'PHPSHOP_ADMIN_CFG_SITE' => 'Site',
	'PHPSHOP_ADMIN_CFG_SHIPPING' => 'Expediere',
	'PHPSHOP_ADMIN_CFG_CHECKOUT' => 'Verificare',
	'PHPSHOP_ADMIN_CFG_DOWNLOADABLEGOODS' => 'Descarcari',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE' => 'Folositi-l numai ca si catalog',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE_EXPLAIN' => 'Daca verificati acesta, toate functiile cosului sunt intrerupte.',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES' => 'Arata preturi',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES_EXPLAIN' => 'Check to show prices. If using catalogue functionality, some don\'t want prices to appear on pages.',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX' => 'Taxa virtuala',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX_EXPLAIN' => 'Acesta determina daca articolele care au greutate 0 sunt taxate sau nu. Modificati ps_checkout.php->calc_order_taxable().',
	'PHPSHOP_ADMIN_CFG_TAX_MODE' => 'Mod de taxare:',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_SHIP' => 'Se bazeaza pe adresa de expediere',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_VENDOR' => 'Se bazeaza pe adresa vanzatorului',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_EXPLAIN' => 'Acesta determina ce impozit este luat in considerare pentru calcularea taxelor:<br />
                                                <ul><li> cel din statul/tara proprietarul magazinului provine</li><br/>
                                                <li>ori cel din statul/tara cumparatorul provine.</li></ul>',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE' => 'Se permit mai multe impozite?',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE_EXPLAIN' => 'Verificati daca aveti produse cu impozite diferite (ex. 7% pentru carti si mancare, 16% pentru alte articole)',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE' => 'Retrageti reducerea de plata inainte de taxare/expediere?',
	'PHPSHOP_ADMIN_CFG_REVIEW' => 'Se permite clientului accesul la sistemul de evaluare/recenzie',
	'PHPSHOP_ADMIN_CFG_REVIEW_EXPLAIN' => 'Daca se permite, clientii pot sa <strong>evalueze produse</strong> si <strong>sa scrie recenzii</strong> despre acestea. <br />
                                                                                Clientii pot sa scrie altor clienti despre experienta lor cu un produs.<br />',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE_EXPLAIN' => 'Sets the flag daca sa retraga reducerea pentru plata selectata INAINTE sau DUPA taxare sau expediere.',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS' => 'Trebuie sa fie de acord cu termenii serviciului?',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_EXPLAIN' => 'Verifica daca un cumparator vrea sa fie de acord cu termenii registrului cand se inregistreaza.',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK' => 'Verifica stoc?',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK_EXPLAIN' => 'Stabileste daca se verifica nivelul stocului cand un utilizator adauga un articol in cos. 
                                                                                          In cazul in care se stabileste, acest lucru nu va permite utilizatorului sa adauge mai multe articole in stoc decat sunt disponibile in stoc.',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE' => 'Se permite accesul la programul membrilor?',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE_EXPLAIN' => 'Acest lucru permite membrilor sa urmareasca This enables the affiliate tracking in the shop-frontend. Enable if you have added affiliates in the backend..',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT' => 'Order-mail format:',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_TEXT' => 'Text mail',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_HTML' => 'HTML mail',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_EXPLAIN' => 'Acest lucru determina ordinea de confirmare a email-urilor:<br />
                                                                                        <ul><li>ca un email text simplu</li>
                                                                                        <li>or ca un email html cu imagini.</li></ul>',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN' => 'Allow Frontend-Administration for non-Backend Users?',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN_EXPLAIN' => 'With this setting you can enable the Frontend Administration for users who 
                                                                                              are storeadmins, but can\'t access the Mambo Backend (e.g. Registered / Editor).',
	'PHPSHOP_ADMIN_CFG_URLSECURE' => 'URL securizat',
	'PHPSHOP_ADMIN_CFG_URLSECURE_EXPLAIN' => 'URL securizat catre site-ul dvs. (https - with trailing slash at the end!)',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE' => 'HOMEPAGE',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE_EXPLAIN' => 'Aceasta pagina va aparea ca default.',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE' => 'Eroare pagina',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE_EXPLAIN' => 'Pagina default pentru afisarea mesajelor eroare.',
	'PHPSHOP_ADMIN_CFG_DEBUG' => 'DEBUG ?',
	'PHPSHOP_ADMIN_CFG_DEBUG_EXPLAIN' => 'DEBUG?  	   	Deschide output debug. Astfel apare DEBUGPAGE in josul paginii. Foarte folositor in timpul dezvoltarii magazinuluipentru ca arata continutul cosurilor, valorile, etc.',
	'PHPSHOP_ADMIN_CFG_FLYPAGE' => 'FLYPAGE',
	'PHPSHOP_ADMIN_CFG_FLYPAGE_EXPLAIN' => 'Aceasta este pagina de prezentare a detaliilor produsului.',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE' => 'Model de categorie',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE_EXPLAIN' => 'Aceasta defineste modelul de categorie pentru afisarea produselor intr-o categorie.<br />
                                                                                                      Puteti crea noi modele personalizand fisierele existente <br />
                                                                                                      (care se afla in directorul <strong>COMPONENTPATH/html/templates/</strong> and begin with browse_)',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW' => 'Numarul produselor intr-un rand',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW_EXPLAIN' => 'Aceasta defineste numarul produselor intr-un rand. <br />
                                                                                                      Exemplu: Daca alegeti 4, modelul de categorie will va afisa 4 produse per rand',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE' => '"no image" image',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE_EXPLAIN' => 'Aceasta imagine va apare cand nici o imagine a produsului este disponibila.',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION' => 'Arata antet ',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION_EXPLAIN' => 'Arata o imagine antet powered-by-mambo-phpShop.',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_STANDARD' => 'Modul de expediere standard cu evaluari configurate individual. <strong>RECOMMENDED !</strong>',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_ZONE' => '  	Zona de expediere Module Country Version 1.0<br />
                                                                                                            Pentru mai multe informatii la acest modul viziteaza <a href="http://ZephWare.com">http://ZephWare.com</a><br />
                                                                                                            for details or contact <a href="mailto:zephware@devcompany.com">ZephWare.com</a><br /> Check this to enable the zone shipping module',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_DISABLE' => 'Nu permite selectia metodei de expediere. Verifica daca clientii cumpara produse downlodabile care nu trebuie sa fie expediate.',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR' => 'Permite bara de verificare',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR_EXPLAIN' => 'verifica aceasta, daca vrei ca bara de verificare sa apara clientului in timpul procesului de verificare ( 1 - 2 - 3 - 4 cu grafice).',
	'PHPSHOP_ADMIN_CFG_CHECKOUT_PROCESS' => 'Alegeti procesul de verificare a magazinului dvs',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS' => 'Se permite incarcare',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS_EXPLAIN' => 'verifica pentru a permite puterea de descarcare. Numai daca vrei vinde produse care pot fi descarcate.',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS' => 'Statutul comenzii care permite descarcarea',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS_EXPLAIN' => 'Selecteaza statutul comenzii la care clientul este anuntat de descarcare prin email.',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS' => 'Statutul comenzii care nu permite descarcarea',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS_EXPLAIN' => 'Stabileste statutul comenzii atunci cand descarcarea nu este permisa pentru client.',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT' => 'DOWNLOADROOT',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT_EXPLAIN' => 'Calea catre fisierele pentru descarcarea clientului. (trailing slash at the end!)<br>
        <span class="message">Pentru securitatea magazinului dvs: Daca puteti, va ruga folositi un director ORIUNDE IN AFARA WEBROOT</span>',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX' => 'Descarcare maxim',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX_EXPLAIN' => 'Stabileste numarul de descarcari care pot fi facute cu o singura identitate, (pentru o singura comanda)',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE' => 'Expirarea descarcarii',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE_EXPLAIN' => 'Stabileste timpul <strong>in secunde</strong> la care descarcarea este permisa pentru client. 
  Timpul alocat incepe cu prima descarcare!, cand timpul a expirat, identitatea pentru descarcare nu mai este valabila.<br />Note : 86400s=24h.',
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
        The Thumbnail Image quality is much better than Images which were "resized" by the browser. The newly generated Images are put into the directory /shop_image/prduct/resized. If the Image has already been resized, this copy will be send to the browser, so no image is resized again and again.',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_WIDTH' => 'Thumbnail Image Width',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_WIDTH_TIP' => 'The target <strong>width</strong> of the resized Thumbnail Image.',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_HEIGHT' => 'Thumbnail Image Height',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_HEIGHT_TIP' => 'The target <strong>height</strong> of the resized Thumbnail Image.',
	'PHPSHOP_ADMIN_CFG_SHIPPING_NO_SELECTION' => 'Please select at least one Checkbox in the Shipping Configuration!',
	'PHPSHOP_ADMIN_CFG_PRICE_CONFIGURATION' => 'Price Configuration',
	'PHPSHOP_ADMIN_CFG_PRICE_ACCESS_LEVEL' => 'Membergroup to show prices to',
	'PHPSHOP_ADMIN_CFG_PRICE_ACCESS_LEVEL_TIP' => 'The selected membergroup and all groups with higher permissions will be able to see the product prices.',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_INCLUDINGTAX' => 'Show "(including XX% tax)" when applicable?',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_INCLUDINGTAX_TIP' => 'When checked, users will see the text "(including xx% tax)" when prices are shown incl. tax.',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_PACKAGING_PRICELABEL' => 'Show the price label for packaging?',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_PACKAGING_PRICELABEL_TIP' => 'When checked, the price label is derived from the product\'s unit and packaging values:
<strong>Price per Unit (10 pieces)<strong><br/>
When not checked, price labels look just as usual: <strong>Price: $xx.xx</strong>',
	'PHPSHOP_ADMIN_CFG_MORE_CORE_SETTINGS' => 'more Core Settings',
	'PHPSHOP_ADMIN_CFG_CORE_SETTINGS' => 'Core Settings',
	'PHPSHOP_ADMIN_CFG_FRONTEND_FEATURES' => 'Frontend Features',
	'PHPSHOP_ADMIN_CFG_TAX_CONFIGURATION' => 'Tax Configuration',
	'PHPSHOP_ADMIN_CFG_USER_REGISTRATION_SETTINGS' => 'User Registration Settings',
	'PHPSHOP_ADMIN_CFG_ALLOW_REGISTRATION' => 'User registration allowed?',
	'PHPSHOP_ADMIN_CFG_ACCOUNT_ACTIVATION' => 'New account activation necessary?',
	'VM_FIELDMANAGER_NAME' => 'Field name',
	'VM_FIELDMANAGER_TITLE' => 'Field title',
	'VM_FIELDMANAGER_TYPE' => 'Field type',
	'VM_FIELDMANAGER_REQUIRED' => 'Required',
	'VM_FIELDMANAGER_PUBLISHED' => 'Published',
	'VM_FIELDMANAGER_SHOW_ON_REGISTRATION' => 'Show in registration form',
	'VM_FIELDMANAGER_SHOW_ON_ACCOUNT' => 'Show in account maintenance',
	'VM_USERFIELD_FORM_LBL' => 'Add / Edit User Fields',
	'VM_BROWSE_ORDERBY_DEFAULT_FIELD_LBL' => 'Default product sort order',
	'VM_BROWSE_ORDERBY_DEFAULT_FIELD_LBL_TIP' => 'Defines by which field products are ordered by default on the browse pages',
	'VM_BROWSE_ORDERBY_FIELDS_LBL' => 'Available "Sort-by" fields',
	'VM_BROWSE_ORDERBY_FIELDS_LBL_TIP' => 'Choose the "Sort-by" fields for the browse page. Each one defines a sort method for the product browse page. If you deselect all, the Order-By-Form will not be shown.',
	'VM_GENERALLY_PREVENT_HTTPS' => 'Generally prevent https connections?',
	'VM_GENERALLY_PREVENT_HTTPS_TIP' => 'When checked, the shopper is redirected to the <strong>http</strong> URL when not browsing in those shop areas, which are forced to use https.',
	'VM_MODULES_FORCE_HTTPS' => 'Shop areas which must use https',
	'VM_MODULES_FORCE_HTTPS_TIP' => 'Here you can use a comma-separated list of shop core modules (See "Admin" => "List Modules"), which will be using https connections.',
	'VM_SHOW_REMEMBER_ME_BOX' => 'Show the "Remember me" checkbox on login?',
	'VM_SHOW_REMEMBER_ME_BOX_TIP' => 'When checked, the "remember me" box is shown on checkout. Not recommended when using shared ssl, because the customer could choose not to get a user cookie -  but that user cookie is required to keep the user logged in on both domains.',
	'VM_ADMIN_CFG_REVIEW_MINIMUM_COMMENT_LENGTH' => 'Comment Minimum Length',
	'VM_ADMIN_CFG_REVIEW_MINIMUM_COMMENT_LENGTH_TIP' => 'This is the amount of characters that MUST at least be written by a customer before the review can be submitted.',
	'VM_ADMIN_CFG_REVIEW_MAXIMUM_COMMENT_LENGTH' => 'Comment Maximum Length',
	'VM_ADMIN_CFG_REVIEW_MAXIMUM_COMMENT_LENGTH_TIP' => 'This is the maximum amount of characters that can be written by a customer in a comment.
',
	'VM_ADMIN_SHOW_EMAILFRIEND' => 'Show the "Recommend to a friend" link?',
	'VM_ADMIN_SHOW_EMAILFRIEND_TIP' => 'When enabled, a small link is displayed that allows the customer to send a recommendation email for a specific product.',
	'VM_ADMIN_SHOW_PRINTICON' => 'Show the "Print View" link?',
	'VM_ADMIN_SHOW_PRINTICON_TIP' => 'When enabled, a small link is displayed that opens the current page in a new popup for printing it out.',
	'VM_REVIEWS_AUTOPUBLISH' => 'Auto-Publish Reviews?',
	'VM_REVIEWS_AUTOPUBLISH_TIP' => 'If checked, reviews are automatically published after being posted. If not, the administrator must approve/publish them.',
	'VM_ADMIN_CFG_PROXY_SETTINGS' => 'Global Proxy Settings',
	'VM_ADMIN_CFG_PROXY_URL' => 'URL of the proxy server',
	'VM_ADMIN_CFG_PROXY_URL_TIP' => 'Example: <strong>http://10.42.21.1</strong>.<br />
Leave empty if you\'re not sure.</strong> This value will be used to connect to the internet from the shop server (e.g. when fetching shipping rates from UPS/USPS).',
	'VM_ADMIN_CFG_PROXY_PORT' => 'Proxy Port',
	'VM_ADMIN_CFG_PROXY_PORT_TIP' => 'The port used for communication with the proxy server (mostly <b>80</b> or <b>8080</b>).',
	'VM_ADMIN_CFG_PROXY_USER' => 'Proxy username',
	'VM_ADMIN_CFG_PROXY_USER_TIP' => 'If the proxy requires authentication please fill in your username here.',
	'VM_ADMIN_CFG_PROXY_PASS' => 'Proxy password',
	'VM_ADMIN_CFG_PROXY_PASS_TIP' => 'If the proxy requires authentication please fill in the correct password here.',
	'VM_ADMIN_ONCHECKOUT_SHOW_LEGALINFO' => 'Show information about "Return Policy" on the order confirmation page?',
	'VM_ADMIN_ONCHECKOUT_SHOW_LEGALINFO_TIP' => 'Store owners are required by law to inform their customers about return and order cancellation policies in most european countries. So this should be enabled in most cases.',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_SHORTTEXT' => 'Legal information text (short version).',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_SHORTTEXT_TIP' => 'This text instructs your customers in short about your return and order cancellation policy. It is shown on the last page of checkout, just above the "Confirm Order" button.',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_LINK' => 'Link to the long version the return policy.',
	'VM_ADMIN_ONCHECKOUT_LEGALINFO_LINK_TIP' => 'Please add a new content item about the details of your return and order cancellation policy.
Afterwards you can select it here.',
	'VM_SELECT_THEME' => 'Select the theme for your Shop',
	'VM_SELECT_THEME_TIP' => 'Themes allow styling and customizing your shop. <br />If no other themes than the "default" one are present you haven\'t installed more themes.',
	'VM_CFG_CONTENT_PLUGINS_ENABLE' => 'Enable content mambots / plugins in descriptions?',
	'VM_CFG_CONTENT_PLUGINS_ENABLE_TIP' => 'If enabled, product and category descriptions are parsed by all published content mambots/plugins.',
	'VM_CFG_CURRENCY_MODULE' => 'Select a currency converter module',
	'VM_CFG_CURRENCY_MODULE_TIP' => 'This allows you to select a certain currency converter module. Such modules fetch exchange rates from a server and convert one currency into another.',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_EU' => 'European Union mode',
	'VM_ADMIN_CFG_DOWNLOAD_KEEP_STOCKLEVEL' => 'Keep Product Stock Level on Purchase?',
	'VM_ADMIN_CFG_DOWNLOAD_KEEP_STOCKLEVEL_TIP' => 'When enabled, the stock level for a downloadable product is not lowered although it was purchased by customers.',
	'VM_USERGROUP_FORM_LBL' => 'Add/Edit a User Group',
	'VM_USERGROUP_NAME' => 'User Group Name',
	'VM_USERGROUP_LEVEL' => 'User Group Level',
	'VM_USERGROUP_LEVEL_TIP' => 'Important! A bigger number means <b>less</b> permissions. The <b>admin</b> group is <em>level 0</em>, storeadmin is level 250, users are level 500.',
	'VM_USERGROUP_LIST_LBL' => 'User Group List',
	'VM_ADMIN_CFG_COOKIE_CHECK' => 'Enable the Cookie Check?',
	'VM_ADMIN_CFG_COOKIE_CHECK_EXPLAIN' => 'If enabled, VirtueMart checks wether the browser of the customer accepts cookies or not. This is user-friendly, but it can have negative consequences on the Search-Engine-Friendlyness of your shop.',
	'VM_CFG_REGISTRATION_TYPE' => 'User Registration Type',
	'VM_CFG_REGISTRATION_TYPE_TIP' => 'Choose the type of User Registration for your store!<br />
<strong>Normal Registration</strong><br />
This is the standard registration type where the customer must register and choose an username and password<br /><br />
<strong>Silent Registration</strong><br />
Silent Registration means the customer doesn\'t need to choose username and password, but those are created automatically during registration and sent to the provided email address.
<br /><br />
<strong>Optional Registration</strong><br />
Opotional Registration let\'s the customer choose wether he/she wants to create an account or not. If the customer wants to create an account, a username and password must be chosen.
<br /><br />
<strong>No Registration</strong><br />
Customers don\'t need to and are not able to register in this type of registration.',
	'VM_CFG_REGISTRATION_TYPE_NORMAL_REGISTRATION' => 'Normal Account Creation',
	'VM_CFG_REGISTRATION_TYPE_SILENT_REGISTRATION' => 'Silent Account Creation',
	'VM_CFG_REGISTRATION_TYPE_OPTIONAL_REGISTRATION' => 'Optional Account Creation',
	'VM_CFG_REGISTRATION_TYPE_NO_REGISTRATION' => 'No Account Creation',
	'VM_ADMIN_CFG_FEED_CONFIGURATION' => 'Feed Configuration',
	'VM_ADMIN_CFG_FEED_ENABLE' => 'Enable Product Feeds',
	'VM_ADMIN_CFG_FEED_ENABLE_TIP' => 'If enabled, customers can subscribe to a feed that provides the latest products (of all or of a certain category) in your store.',
	'VM_ADMIN_CFG_FEED_CACHE' => 'Feed Cache Settings',
	'VM_ADMIN_CFG_FEED_CACHE_ENABLE' => 'Enable Cache?',
	'VM_ADMIN_CFG_FEED_CACHETIME' => 'Cache Time (seconds)',
	'VM_ADMIN_CFG_FEED_CACHE_TIP' => 'Caching speeds up the feed delivery and reduces the server load, because the feed is only created once and saved to a file.',
	'VM_ADMIN_CFG_FEED_SHOWPRICES' => 'Include the Product Price into the description?',
	'VM_ADMIN_CFG_FEED_SHOWPRICES_TIP' => 'If enabled, the standard Product Price will be added to the Product Description',
	'VM_ADMIN_CFG_FEED_SHOWDESC' => 'Include the Product Description?',
	'VM_ADMIN_CFG_FEED_SHOWDESC_TIP' => 'If enabled, the Product Description will be added to the feed item',
	'VM_ADMIN_CFG_FEED_SHOWIMAGES' => 'Include Images into the feed?',
	'VM_ADMIN_CFG_FEED_SHOWIMAGES_TIP' => 'If enabled, the thumb images will be included with the feed item.',
	'VM_ADMIN_CFG_FEED_DESCRIPTION_TYPE' => 'Type of Product Description',
	'VM_ADMIN_CFG_FEED_DESCRIPTION_TYPE_TIP' => 'Choose the type of product description that will be included with the feed.',
	'VM_ADMIN_CFG_FEED_LIMITTEXT' => 'Limit the Description?',
	'VM_ADMIN_CFG_FEED_MAX_TEXT_LENGTH' => 'Maximum Description Length',
	'VM_ADMIN_CFG_MAX_TEXT_LENGTH_TIP' => 'This is the maximum length of the product description for each feed item.',
	'VM_ADMIN_CFG_FEED_TITLE_TIP' => 'Title of the Feed (the placeholder {storename} holds the name of your store)',
	'VM_ADMIN_CFG_FEED_TITLE_CATEGORIES_TIP' => 'Title of a Category Feed (\'{catname}\' is the placeholder for the category name, {storename} holds the name of your store)',
	'VM_ADMIN_CFG_FEED_TITLE' => 'Feed Title',
	'VM_ADMIN_CFG_FEED_TITLE_CATEGORIES' => 'Feed Title for Categories',
	'VM_ADMIN_SECURITY' => 'Security',
	'VM_ADMIN_SECURITY_SETTINGS' => 'Security Settings',
	'VM_CFG_ENABLE_FEATURE' => 'Enable this Feature',
	'VM_CFG_CHECKOUT_SHOWSTEP_TIP' => 'Here you can enable, disable and reorder certain Checkout Steps. You can show multiple Steps on one Page by giving them the same Step Number.',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_FLEX' => 'Flex Shipping. Fixed shipping cost to set base value of order with percentage of total sale above base value',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_SHIPVALUE' => 'Shipping based on order totals. Fixed shipping costs based on values entered in configuration.',
	'VM_CFG_CHECKOUT_SHOWSTEPINCHECKOUT' => 'Show on Step: %s of the Checkout Process.',
	'VM_ADMIN_ENCRYPTION_KEY' => 'Encryption Key',
	'VM_ADMIN_ENCRYPTION_KEY_TIP' => 'Used to safely store and retrieve sensible data (like credit card information) encrypted in the database.',
	'VM_ADMIN_STORE_CREDITCARD_DATA' => 'Store Credit Card Information?',
	'VM_ADMIN_STORE_CREDITCARD_DATA_TIP' => 'VirtueMart stores the Credit Card Information of Customers encrypted in the database. This is done even if the Credit Card Information is processed by an external  server. <strong>If you don\'t need to process Credit Card Information manually after the order has been placed, you should turn this option off.</strong>',
	'VM_USERFIELDS_URL_ONLY' => 'URL only',
	'VM_USERFIELDS_HYPERTEXT_URL' => 'Hypertext and URL',
	'VM_FIELDS_TEXTFIELD' => 'Text Field',
	'VM_FIELDS_CHECKBOX_SINGLE' => 'Check Box (Single)',
	'VM_FIELDS_CHECKBOX_MULTIPLE' => 'Check Box (Muliple)',
	'VM_FIELDS_DATE' => 'Date',
	'VM_FIELDS_DROPDOWN_SINGLE' => 'Drop Down (Single Select)',
	'VM_FIELDS_DROPDOWN_MULTIPLE' => 'Drop Down (Multi-Select)',
	'VM_FIELDS_EMAIL' => 'Email Address',
	'VM_FIELDS_EUVATID' => 'EU VAT ID',
	'VM_FIELDS_EDITORAREA' => 'Editor Text Area',
	'VM_FIELDS_TEXTAREA' => 'Text Area',
	'VM_FIELDS_RADIOBUTTON' => 'Radio Button',
	'VM_FIELDS_WEBADDRESS' => 'Web Address',
	'VM_FIELDS_DELIMITER' => '=== Fieldset delimiter ===',
	'VM_FIELDS_NEWSLETTER' => 'Newsletter Subscription',
	'VM_USERFIELDS_READONLY' => 'Read-Only',
	'VM_USERFIELDS_SIZE' => 'Field Size',
	'VM_USERFIELDS_MAXLENGTH' => 'Max Length',
	'VM_USERFIELDS_DESCRIPTION' => 'Description, field-tip: text or HTML',
	'VM_USERFIELDS_COLUMNS' => 'Columns',
	'VM_USERFIELDS_ROWS' => 'Rows',
	'VM_USERFIELDS_EUVATID_MOVESHOPPER' => 'Move the customer into the following shopper group upon successful validation of the EU VAT ID',
	'VM_USERFIELDS_ADDVALUES_TIP' => 'Use the table below to add new values.',
	'VM_ADMIN_CFG_DISPLAY' => 'Display',
	'VM_ADMIN_CFG_LAYOUT' => 'Layout',
	'VM_ADMIN_CFG_THEME_SETTINGS' => 'Theme Settings',
	'VM_ADMIN_CFG_THEME_PARAMETERS' => 'Parameters',
	'VM_ADMIN_ENCRYPTION_FUNCTION' => 'Encryption Function',
	'VM_ADMIN_ENCRYPTION_FUNCTION_TIP' => 'Here you can select the encryption function used to encrypt sensible information before being stored in the database. AES_ENCRYPT is recommended, because it is very secure. ENCODE doesn\'t provide real encryption.',
	'SAVE_PERMISSIONS' => 'Save Permissions',
	'VM_ADMIN_THEME_CFG_NOT_EXISTS' => 'The configuration file for this template does not exist and can\'t be created. Configuration is not possible',
	'VM_ADMIN_THEME_NOT_EXISTS' => 'The theme "{theme}" does not exist.',
	'VM_USERFIELDS_ADDVALUE' => 'Add a Value',
	'VM_USERFIELDS_TITLE' => 'Title',
	'VM_USERFIELDS_VALUE' => 'Value',
	'VM_USER_FORM_LASTVISIT_NEVER' => 'Never',
	'VM_USER_FORM_TAB_GENERALINFO' => 'General User Information',
	'VM_USER_FORM_LEGEND_USERDETAILS' => 'User Details',
	'VM_USER_FORM_LEGEND_PARAMETERS' => 'Parameters',
	'VM_USER_FORM_LEGEND_CONTACTINFO' => 'Contact Information',
	'VM_USER_FORM_NAME' => 'Name',
	'VM_USER_FORM_USERNAME' => 'Username',
	'VM_USER_FORM_EMAIL' => 'Email',
	'VM_USER_FORM_NEWPASSWORD' => 'New Password',
	'VM_USER_FORM_VERIFYPASSWORD' => 'Verify Password',
	'VM_USER_FORM_GROUP' => 'Group',
	'VM_USER_FORM_BLOCKUSER' => 'Block User',
	'VM_USER_FORM_RECEIVESYSTEMEMAILS' => 'Receive System Emails',
	'VM_USER_FORM_REGISTERDATE' => 'Register Date',
	'VM_USER_FORM_LASTVISITDATE' => 'Last Visit Date',
	'VM_USER_FORM_NOCONTACTDETAILS_1' => 'No Contact details linked to this User:',
	'VM_USER_FORM_NOCONTACTDETAILS_2' => 'See \'Components -> Contact -> Manage Contacts\' for details.',
	'VM_USER_FORM_CONTACTDETAILS_NAME' => 'Name',
	'VM_USER_FORM_CONTACTDETAILS_POSITION' => 'Position',
	'VM_USER_FORM_CONTACTDETAILS_TELEPHONE' => 'Telephone',
	'VM_USER_FORM_CONTACTDETAILS_FAX' => 'Fax',
	'VM_USER_FORM_CONTACTDETAILS_CHANGEBUTTON' => 'Change Contact Details',
	'VM_ADMIN_CFG_LOGFILE_HEADER' => 'Logfile Configuration',
	'VM_ADMIN_CFG_LOGFILE_ENABLED' => 'Enable logging?',
	'VM_ADMIN_CFG_LOGFILE_ENABLED_EXPLAIN' => 'If disabled, a "null" logger will be instantiated instead, so that the vmFileLogger can still be invoked without error.',
	'VM_ADMIN_CFG_LOGFILE_NAME' => 'Logfile Name',
	'VM_ADMIN_CFG_LOGFILE_NAME_EXPLAIN' => 'Path to logfile. Must be reachable and writeable.',
	'VM_ADMIN_CFG_LOGFILE_LEVEL' => 'Logging level',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_EXPLAIN' => 'Log messages above this priority threshold will be ignored.',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_TIP' => 'TIP - 8',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_DEBUG' => 'DEBUG - 7',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_INFO' => 'INFO - 6',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_NOTICE' => 'NOTICE - 5',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_WARNING' => 'WARNING - 4',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_ERR' => 'ERROR - 3',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_CRIT' => 'CRITICAL - 2',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_ALERT' => 'ALERT - 1',
	'VM_ADMIN_CFG_LOGFILE_LEVEL_EMERG' => 'EMERGENCY - 0',
	'VM_ADMIN_CFG_LOGFILE_FORMAT' => 'Logfile format',
	'VM_ADMIN_CFG_LOGFILE_FORMAT_EXPLAIN' => 'Format for individual logfile line entries.',
	'VM_ADMIN_CFG_LOGFILE_FORMAT_EXPLAIN_EXTRA' => 'Logfile format fields can include any of the following: %{timestamp} %{ident} [%{priority}] [%{remoteip}] [%{username}] %{message} %{vmsessionid}.',
	'VM_ADMIN_CFG_LOGFILE_ERROR' => 'Cannot create or access log file.  Please contact the system or website administrator.',
	'VM_ADMIN_CFG_DEBUG_MODE_ENABLED' => 'Enable DEBUG mode?',
	'VM_ADMIN_CFG_DEBUG_IP_ENABLED' => 'Limit by IP address?',
	'VM_ADMIN_CFG_DEBUG_IP_ENABLED_EXPLAIN' => 'Limit debugging output to a specific client IP address?',
	'VM_ADMIN_CFG_DEBUG_IP_ADDRESS' => 'Client IP address',
	'VM_ADMIN_CFG_DEBUG_IP_ADDRESS_EXPLAIN' => 'If you enable this option and enter an IP address here, then debug output will be enabled ONLY for this client IP address.  Other clients will not see the debugging output.',
	'VM_FIELDMANAGER_SHOW_ON_SHIPPING' => 'Show in shipping form',
	'VM_USER_NOSHIPPINGADDR' => 'No shipping addresses.',
	'VM_UPDATE_CHECK_LBL' => 'VirtueMart Update Check',
	'VM_UPDATE_CHECK_VERSION_INSTALLED' => 'VirtueMart Version installed here',
	'VM_UPDATE_CHECK_LATEST_VERSION' => 'Latest VirtueMart Version',
	'VM_UPDATE_CHECK_CHECKNOW' => 'Check now!',
	'VM_UPDATE_CHECK_DLUPDATE' => 'Download Update',
	'VM_UPDATE_CHECK_CHECKING' => 'Checking...',
	'VM_UPDATE_CHECK_CHECK' => 'Check',
	'VM_UPDATE_NOTDOWNLOADED' => 'The Update Package could not be downloaded.',
	'VM_UPDATE_PREVIEW_LBL' => 'VirtueMart Update Preview',
	'VM_UPDATE_WARNING_TITLE' => 'General Warning',
	'VM_UPDATE_WARNING_TEXT' => 'Installing an Update for VirtueMart using a Patch Package can cause damage on your site 
if you have already modified some files of the VirtueMart component. The Patching Process will overwrite all the files listed below - it won\'t just apply smaller changes (diff), but replace the existing file with the new one. If you have modified VirtueMart files on your own, this can lead to inconsistent files and missing class/function dependencies.',
	'VM_UPDATE_PATCH_DETAILS' => 'Patch Details',
	'VM_UPDATE_PATCH_DESCRIPTION' => 'Description',
	'VM_UPDATE_PATCH_DATE' => 'Release Date',
	'VM_UPDATE_PATCH_FILESTOUPDATE' => 'Files to be updated',
	'VM_UPDATE_PATCH_STATUS' => 'Status',
	'VM_UPDATE_PATCH_WRITABLE' => 'Writable',
	'VM_UPDATE_PATCH_UNWRITABLE' => 'File/Directory not writable',
	'VM_UPDATE_PATCH_QUERYTOEXEC' => 'Queries to be executed on the Database',
	'VM_UPDATE_PATCH_CONFIRM_TEXT' => 'I have read the <a href="#warning">Warning</a> and I\'m sure to apply the Patch Package to my VirtueMart Installation now.',
	'VM_UPDATE_PATCH_APPLY' => 'Apply Patch now',
	'VM_UPDATE_PATCH_ERR_UNWRITABLE' => 'Not all files/directories which need to be updated are writable. Please correct the permissions first.',
	'VM_UPDATE_PATCH_PLEASEMARK' => 'Please mark the checkbox before you apply the Patch.',
	'VM_UPDATE_RESULT_TITLE' => 'Currently Installed Version',
	'VM_FIELDS_CAPTCHA' => 'Captcha Field (using com_securityimages)',
	'VM_FIELDS_AGEVERIFICATION' => 'Age Verification (Date Select Fields)',
	'VM_FIELDS_AGEVERIFICATION_MINIMUM' => 'Specify the minimum Age'
); $VM_LANG->initModule( 'admin', $langvars );
?>