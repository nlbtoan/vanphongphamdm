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
	'PHPSHOP_MODULE_LIST_ORDER' => 'Listordning',
	'PHPSHOP_PRODUCT_INVENTORY_LBL' => 'Varulager',
	'PHPSHOP_PRODUCT_INVENTORY_STOCK' => 'Lagerv�rde',
	'PHPSHOP_PRODUCT_INVENTORY_WEIGHT' => 'Vikt',
	'PHPSHOP_PRODUCT_LIST_PUBLISH' => 'Visa artiklar',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE' => 'Search Product',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_PRODUCT' => 'modyfied',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_PRICE' => 'with price modyfied',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_WITHOUTPRICE' => 'without price',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_AFTER' => 'After',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_BEFORE' => 'Before',
	'PHPSHOP_PRODUCT_FORM_SHOW_FLYPAGE' => 'F�rhandsgranska produktsida',
	'PHPSHOP_PRODUCT_FORM_NEW_PRODUCT_LBL' => 'Ny produkt',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_INFO_LBL' => 'Produktinformation',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_STATUS_LBL' => 'Produktstatus',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_DIM_WEIGHT_LBL' => 'Produktdimensioner och vikt',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_IMAGES_LBL' => 'Produktbilder',
	'PHPSHOP_PRODUCT_FORM_UPDATE_ITEM_LBL' => 'Uppdatera artikel',
	'PHPSHOP_PRODUCT_FORM_ITEM_INFO_LBL' => 'Artikelinformation',
	'PHPSHOP_PRODUCT_FORM_ITEM_STATUS_LBL' => 'Artikelstatus',
	'PHPSHOP_PRODUCT_FORM_ITEM_DIM_WEIGHT_LBL' => 'Artikeldimensioner och vikt',
	'PHPSHOP_PRODUCT_FORM_ITEM_IMAGES_LBL' => 'Artikelbilder',
	'PHPSHOP_PRODUCT_FORM_IMAGE_UPDATE_LBL' => 'F�r att uppdatera aktuell bild, skriv in k�lla till ny bild.',
	'PHPSHOP_PRODUCT_FORM_IMAGE_DELETE_LBL' => 'Skriv ',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_ITEMS_LBL' => 'Produktartiklar',
	'PHPSHOP_PRODUCT_FORM_ITEM_ATTRIBUTES_LBL' => 'Artikelattribut',
	'PHPSHOP_PRODUCT_FORM_DELETE_PRODUCT_MSG' => '�r du s�ker p� att du vill radera denna produkt\noch tillh�rande artiklar?',
	'PHPSHOP_PRODUCT_FORM_DELETE_ITEM_MSG' => '�r du s�ker p� att du vill radera denna artikel?',
	'PHPSHOP_PRODUCT_FORM_MANUFACTURER' => 'Tillverkare',
	'PHPSHOP_PRODUCT_FORM_SKU' => 'Artnr',
	'PHPSHOP_PRODUCT_FORM_NAME' => 'Namn',
	'PHPSHOP_PRODUCT_FORM_CATEGORY' => 'Kategori',
	'PHPSHOP_PRODUCT_FORM_AVAILABLE_DATE' => 'Tillg�ngligt',
	'PHPSHOP_PRODUCT_FORM_SPECIAL' => 'Kampanjvara',
	'PHPSHOP_PRODUCT_FORM_DISCOUNT_TYPE' => 'Rabatttyp',
	'PHPSHOP_PRODUCT_FORM_PUBLISH' => 'Publicerad?',
	'PHPSHOP_PRODUCT_FORM_LENGTH' => 'L�ngd',
	'PHPSHOP_PRODUCT_FORM_WIDTH' => 'Bredd',
	'PHPSHOP_PRODUCT_FORM_HEIGHT' => 'H�jd',
	'PHPSHOP_PRODUCT_FORM_DIMENSION_UOM' => 'M�ttenhet',
	'PHPSHOP_PRODUCT_FORM_WEIGHT_UOM' => 'M�ttenhet',
	'PHPSHOP_PRODUCT_FORM_FULL_IMAGE' => 'Stor bild',
	'PHPSHOP_PRODUCT_FORM_WEIGHT_UOM_DEFAULT' => 'pounds',
	'PHPSHOP_PRODUCT_FORM_DIMENSION_UOM_DEFAULT' => 'inches',
	'PHPSHOP_PRODUCT_FORM_PACKAGING' => 'Units in Packaging',
	'PHPSHOP_PRODUCT_FORM_PACKAGING_DESCRIPTION' => 'Here you can fill in a number unit in packaging. (max. 65535)',
	'PHPSHOP_PRODUCT_FORM_BOX' => 'Units in Box',
	'PHPSHOP_PRODUCT_FORM_BOX_DESCRIPTION' => 'Here you can fill in a number unit in box. (max. 65535)',
	'PHPSHOP_PRODUCT_DISPLAY_ADD_PRODUCT_LBL' => 'L�gg till produkt',
	'PHPSHOP_PRODUCT_DISPLAY_UPDATE_PRODUCT_LBL' => 'Uppdatera produkt',
	'PHPSHOP_PRODUCT_DISPLAY_ADD_ITEM_LBL' => 'L�gg till artikel',
	'PHPSHOP_PRODUCT_DISPLAY_UPDATE_ITEM_LBL' => 'Uppdatera artikel',
	'PHPSHOP_CATEGORY_FORM_LBL' => 'Kategoriinformation',
	'PHPSHOP_CATEGORY_FORM_NAME' => 'KategoriNamn',
	'PHPSHOP_CATEGORY_FORM_PARENT' => 'F�r�lderkategori',
	'PHPSHOP_CATEGORY_FORM_DESCRIPTION' => 'Kategoribeskrivning',
	'PHPSHOP_CATEGORY_FORM_PUBLISH' => 'Publicera?',
	'PHPSHOP_CATEGORY_FORM_FLYPAGE' => 'Beskrivningssida f�r kategori',
	'PHPSHOP_ATTRIBUTE_LIST_LBL' => 'Attributlista f�r',
	'PHPSHOP_ATTRIBUTE_LIST_NAME' => 'Attributnamn',
	'PHPSHOP_ATTRIBUTE_LIST_ORDER' => 'Listordning',
	'PHPSHOP_ATTRIBUTE_FORM_LBL' => 'Attribut',
	'PHPSHOP_ATTRIBUTE_FORM_NEW_FOR_PRODUCT' => 'Nytt attribut f�r produkt',
	'PHPSHOP_ATTRIBUTE_FORM_UPDATE_FOR_PRODUCT' => 'Uppdatera attribut f�r produkt',
	'PHPSHOP_ATTRIBUTE_FORM_NEW_FOR_ITEM' => 'Nytt attribut f�r artikel',
	'PHPSHOP_ATTRIBUTE_FORM_UPDATE_FOR_ITEM' => 'Uppdatera Attribut f�r Artikel',
	'PHPSHOP_ATTRIBUTE_FORM_NAME' => 'Attributnamn',
	'PHPSHOP_ATTRIBUTE_FORM_ORDER' => 'Listordning',
	'PHPSHOP_PRICE_LIST_FOR_LBL' => 'Pris f�r',
	'PHPSHOP_PRICE_LIST_GROUP_NAME' => 'GruppNamn',
	'PHPSHOP_PRICE_LIST_PRICE' => 'Pris',
	'PHPSHOP_PRODUCT_LIST_CURRENCY' => 'Valuta',
	'PHPSHOP_PRICE_FORM_LBL' => 'Prisinformation',
	'PHPSHOP_PRICE_FORM_NEW_FOR_PRODUCT' => 'Nytt pris f�r produkt',
	'PHPSHOP_PRICE_FORM_UPDATE_FOR_PRODUCT' => 'Uppdatera pris f�r produkt',
	'PHPSHOP_PRICE_FORM_NEW_FOR_ITEM' => 'Nytt pris f�r artikel',
	'PHPSHOP_PRICE_FORM_UPDATE_FOR_ITEM' => 'Uppdatera Pris f�r Artikel',
	'PHPSHOP_PRICE_FORM_PRICE' => 'Pris',
	'PHPSHOP_PRICE_FORM_CURRENCY' => 'Valuta',
	'PHPSHOP_PRICE_FORM_GROUP' => 'Kundgrupp',
	'PHPSHOP_LEAVE_BLANK' => '(l�mna TOM om du har <br />ingen individuell php-fil f�r det!)',
	'PHPSHOP_PRODUCT_FORM_ITEM_LBL' => 'Item',
	'PHPSHOP_PRODUCT_DISCOUNT_STARTDATE' => 'Startdatum f�r rabattperiod',
	'PHPSHOP_PRODUCT_DISCOUNT_STARTDATE_TIP' => 'Anger startdatum f�r den dag d� rabattperioden b�rjar',
	'PHPSHOP_PRODUCT_DISCOUNT_ENDDATE' => 'Slutdatum f�r rabattperioden',
	'PHPSHOP_PRODUCT_DISCOUNT_ENDDATE_TIP' => 'Anger slutdatum f�r rabattperioden',
	'PHPSHOP_FILEMANAGER_PUBLISHED' => 'Publicerad?',
	'PHPSHOP_FILES_LIST' => 'Filhanterare::Bilder/filer f�r',
	'PHPSHOP_FILES_LIST_FILENAME' => 'Filnamn',
	'PHPSHOP_FILES_LIST_FILETITLE' => 'Filtitel',
	'PHPSHOP_FILES_LIST_FILETYPE' => 'Fil typ',
	'PHPSHOP_FILES_LIST_FULL_IMG' => 'Full bild',
	'PHPSHOP_FILES_LIST_THUMBNAIL_IMG' => 'Tumnagel',
	'PHPSHOP_FILES_FORM' => 'Ladda upp fil f�r',
	'PHPSHOP_FILES_FORM_CURRENT_FILE' => 'Aktuell fil',
	'PHPSHOP_FILES_FORM_FILE' => 'Fil',
	'PHPSHOP_FILES_FORM_IMAGE' => 'Bild',
	'PHPSHOP_FILES_FORM_UPLOAD_TO' => 'Ladda upp till',
	'PHPSHOP_FILES_FORM_UPLOAD_IMAGEPATH' => 'Standard produkts�kv�g',
	'PHPSHOP_FILES_FORM_UPLOAD_OWNPATH' => 'Ange filens s�kv�g',
	'PHPSHOP_FILES_FORM_UPLOAD_DOWNLOADPATH' => 'S�kv�g till nedladdning(om man s�ljer nedladdningsbara varor!)',
	'PHPSHOP_FILES_FORM_AUTO_THUMBNAIL' => 'Skapa tumnagel automatiskt?',
	'PHPSHOP_FILES_FORM_FILE_PUBLISHED' => 'Filen �r publicerad?',
	'PHPSHOP_FILES_FORM_FILE_TITLE' => 'Filtitel (vad kunden ser)',
	'PHPSHOP_FILES_FORM_FILE_URL' => 'Fil URL (valfri)',
	'PHPSHOP_PRODUCT_FORM_AVAILABILITY_TOOLTIP1' => 'Skriv text h�r som kommer att visas till kunden p� flypage sidan.<br />t.ex: 24tim, 48 timmar, 3 - 5 dagar, efter order.....',
	'PHPSHOP_PRODUCT_FORM_AVAILABILITY_TOOLTIP2' => 'ELLER v�lj en bild at visa p� detaljsidan (flypage).<br />Bildrna sparas i biblioteket <i>%s</i><br />',
	'PHPSHOP_PRODUCT_FORM_CUSTOM_ATTRIBUTE_LIST_EXAMPLES' => '<h4>Exemplel p� extra attribut formatet:</h4>
        <span class="sectionname"><strong>Namn;Extra;</strong>...</span>',
	'PHPSHOP_IMAGE_ACTION' => 'Bildfunktion',
	'PHPSHOP_PARAMETERS_LBL' => 'Parametrar',
	'PHPSHOP_PRODUCT_TYPE_LBL' => 'Produkttyp',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_LIST_LBL' => 'Produkttyp lista f�r',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_FORM_LBL' => 'L�gg till produkttyp f�r',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_FORM_PRODUCT_TYPE' => 'Produkttyp',
	'PHPSHOP_PRODUCT_TYPE_FORM_NAME' => 'Produkttyp namn',
	'PHPSHOP_PRODUCT_TYPE_FORM_DESCRIPTION' => 'Produkttyp beskrivning',
	'PHPSHOP_PRODUCT_TYPE_FORM_PARAMETERS' => 'Parametrar',
	'PHPSHOP_PRODUCT_TYPE_FORM_LBL' => 'Produkttyp information',
	'PHPSHOP_PRODUCT_TYPE_FORM_PUBLISH' => 'Publicera?',
	'PHPSHOP_PRODUCT_TYPE_FORM_BROWSEPAGE' => 'Produkttyp bl�ddringsida',
	'PHPSHOP_PRODUCT_TYPE_FORM_FLYPAGE' => 'Produkttyp detaljsida',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_LIST_LBL' => 'V�rden f�r produkttyp',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_LBL' => 'Parameterinformation',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NOT_FOUND' => 'Produkttyp hittades inte!',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NAME' => 'Parameter namn',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NAME_DESCRIPTION' => 'Detta namn blir kolumnrubrik f�r tabellen. M�ste vara unikt och utan mellanslag.<br/>Till exempel: Bygg_materiel',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_LABEL' => 'Parameter etikett',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_INTEGER' => 'Heltal',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_TEXT' => 'Text',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_SHORTTEXT' => 'kort text',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_FLOAT' => 'Flyttal',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_CHAR' => 'Tecken',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_DATETIME' => 'Datum & Tid',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_DATE' => 'Datum',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_TIME' => 'Tid',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_BREAK' => 'Bryt rad',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_MULTIVALUE' => 'Multipla v�rden',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_VALUES' => 'M�jliga v�rden',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_MULTISELECT' => 'Visa M�jliga v�rden som multipla val?',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_VALUES_DESCRIPTION' => '<strong>Om M�jliga v�rden har angetts kan parametrar endast ha dessa v�rden. Exempel p� M�jliga v�rden:</strong><br/><span class="sectionname">St�l;Tr�;Plast;...</span>',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_DEFAULT' => 'Standardv�rde',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_DEFAULT_HELP_TEXT' => 'F�r parametrars standardv�rde anv�nds f�ljande format:<ul><li>Datum: ����-MM-DD</li><li>Tid: TT:MM:SS</li><li>Daum & Tid: ����-MM-DD TT:MM:SS</li></ul>',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_UNIT' => 'Enhet',
	'PHPSHOP_PRODUCT_CLONE' => 'Kopiera produkt',
	'PHPSHOP_HIDE_OUT_OF_STOCK' => 'Hide out of stock products',
	'PHPSHOP_FEATURED_PRODUCTS_LIST_LBL' => 'Featured & Discounted Products',
	'PHPSHOP_FEATURED' => 'Featured',
	'PHPSHOP_SHOW_FEATURED_AND_DISCOUNTED' => 'featured AND discounted',
	'PHPSHOP_SHOW_DISCOUNTED' => 'discounted products',
	'PHPSHOP_FILTER' => 'Filter',
	'PHPSHOP_PRODUCT_FORM_DISCOUNTED_PRICE' => 'Discounted Price',
	'PHPSHOP_PRODUCT_FORM_DISCOUNTED_PRICE_TIP' => 'Here you can override the discount setting fill in a special discount price for this product.<br/>
The Shop will create a new discount record from the discounted price.',
	'PHPSHOP_PRODUCT_LIST_QUANTITY_START' => 'Quantity Start',
	'PHPSHOP_PRODUCT_LIST_QUANTITY_END' => 'Quantity End',
	'VM_PRODUCTS_MOVE_LBL' => 'Move products from one category to another',
	'VM_PRODUCTS_MOVE_LIST' => 'You have chosen to move the following %s products',
	'VM_PRODUCTS_MOVE_TO_CATEGORY' => 'Move to the following category',
	'VM_PRODUCT_LIST_REORDER_TIP' => 'Select a product category to reorder products in a category',
	'VM_REVIEW_FORM_LBL' => 'Add Review',
	'PHPSHOP_REVIEW_EDIT' => 'Add/Edit a Review',
	'SEL_CATEGORY' => 'Select a category',
	'VM_PRODUCT_FORM_MIN_ORDER' => 'Minimum Purchase Quantity',
	'VM_PRODUCT_FORM_MAX_ORDER' => 'Maximum Purchase Quantity',
	'VM_DISPLAY_TABLE_HEADER' => 'Display Table Header',
	'VM_DISPLAY_LINK_TO_CHILD' => 'Link to child product from list',
	'VM_DISPLAY_INCLUDE_PRODUCT_TYPE' => 'Include Product Type With Child',
	'VM_DISPLAY_USE_LIST_BOX' => 'Use List box for child products',
	'VM_DISPLAY_LIST_STYLE' => 'List Style',
	'VM_DISPLAY_USE_PARENT_LABEL' => 'Use Parent Settings:',
	'VM_DISPLAY_LIST_TYPE' => 'List:',
	'VM_DISPLAY_QUANTITY_LABEL' => 'Quantity:',
	'VM_DISPLAY_QUANTITY_DROPDOWN_LABEL' => 'Drop Down Box Values',
	'VM_DISPLAY_CHILD_DESCRIPTION' => 'Display Child Description',
	'VM_DISPLAY_DESC_WIDTH' => 'Child Description Width',
	'VM_DISPLAY_ATTRIB_WIDTH' => 'Child Attribute Width',
	'VM_DISPLAY_CHILD_SUFFIX' => 'Child Class Suffix',
	'VM_INCLUDED_PRODUCT_ID' => 'Product IDs to include',
	'VM_EXTRA_PRODUCT_ID' => 'Extra IDs',
	'PHPSHOP_DISPLAY_RADIOBOX' => 'Use Radio Box',
	'PHPSHOP_PRODUCT_FORM_ITEM_DISPLAY_LBL' => 'Display Options',
	'PHPSHOP_DISPLAY_USE_PARENT' => 'Override Child products Display Values and use parents',
	'PHPSHOP_DISPLAY_NORMAL' => 'Standard Quantity Box',
	'PHPSHOP_DISPLAY_HIDE' => 'Hide Quantity Box',
	'PHPSHOP_DISPLAY_DROPDOWN' => 'Use Dropdown Box',
	'PHPSHOP_DISPLAY_CHECKBOX' => 'Use Check Box',
	'PHPSHOP_DISPLAY_ONE' => 'One Add to Cart Button',
	'PHPSHOP_DISPLAY_MANY' => 'Add to Cart Button for each Child',
	'PHPSHOP_DISPLAY_START' => 'Start Value',
	'PHPSHOP_DISPLAY_END' => 'End Value',
	'PHPSHOP_DISPLAY_STEP' => 'Step Value',
	'PRODUCT_WAITING_LIST_TAB' => 'Waiting List',
	'PRODUCT_WAITING_LIST_USERLIST' => 'Users waiting to be notified when this product is back in stock',
	'PRODUCT_WAITING_LIST_NOTIFYUSERS' => 'Notify these users now (when you have updated the number of products stock)',
	'PRODUCT_WAITING_LIST_NOTIFIED' => 'notified',
	'VM_PRODUCT_FORM_AVAILABILITY_SELECT_IMAGE' => 'Select Image',
	'VM_PRODUCT_RELATED_SEARCH' => 'Search for Products or Categories here:',
	'VM_FILES_LIST_ROLE' => 'Role',
	'VM_FILES_LIST_UP' => 'Up',
	'VM_FILES_LIST_GO_UP' => 'Go Up',
	'VM_CATEGORY_FORM_PRODUCTS_PER_ROW' => 'Show x products per row',
	'VM_CATEGORY_FORM_BROWSE_PAGE' => 'Category Browse Page',
	'VM_PRODUCT_CLONE_OPTIONS_TAB' => 'Clone Product Otions',
	'VM_PRODUCT_CLONE_OPTIONS_LBL' => 'Also clone these Child Items',
	'VM_PRODUCT_LIST_MEDIA' => 'Media',
	'VM_REVIEW_LIST_NAMEDATE' => 'Name/Date',
	'VM_PRODUCT_SELECT_ONE_OR_MORE' => 'Select one or more Products',
	'VM_PRODUCT_SEARCHING' => 'Searching...',
	'PHPSHOP_PRODUCT_FORM_ATTRIBUTE_LIST_EXAMPLES' => '<h4>Examples for the Attribute List Format:</h4>
Title = Color, Property = Red ; Click on New Property to add a new color: Green ; Then click on New attribute to add a new attribute, and so on.
<h4>Inline price adjustments for using the Advanced Attributes modification:</h4>
Price = +10 to add this amount to the configured price.<br />  Price = -10 to subtract this amount from the configured price.<br />  Price = 10 to set the product\'s price to this amount.'
); $VM_LANG->initModule( 'product', $langvars );
?>