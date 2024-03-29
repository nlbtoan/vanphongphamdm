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
	'PHPSHOP_MODULE_LIST_ORDER' => 'Rekkef�lge',
	'PHPSHOP_PRODUCT_INVENTORY_LBL' => 'Produktinventar',
	'PHPSHOP_PRODUCT_INVENTORY_STOCK' => 'Nummer',
	'PHPSHOP_PRODUCT_INVENTORY_WEIGHT' => 'Vekt',
	'PHPSHOP_PRODUCT_LIST_PUBLISH' => 'Publiser',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE' => 'Produkts�k',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_PRODUCT' => 'endret',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_PRICE' => 'Med endret pris',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_WITHOUTPRICE' => 'Uten pris',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_AFTER' => 'Etter',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_BEFORE' => 'F�r',
	'PHPSHOP_PRODUCT_FORM_SHOW_FLYPAGE' => 'Se produktsiden i butikken',
	'PHPSHOP_PRODUCT_FORM_NEW_PRODUCT_LBL' => 'Nytt produkt',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_INFO_LBL' => 'Produktinformasjon',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_STATUS_LBL' => 'Produktstatus',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_DIM_WEIGHT_LBL' => 'Produktets dimensjoner og vekt',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_IMAGES_LBL' => 'Produktbilder',
	'PHPSHOP_PRODUCT_FORM_UPDATE_ITEM_LBL' => 'oppdater artikkel',
	'PHPSHOP_PRODUCT_FORM_ITEM_INFO_LBL' => 'Artikkelinformasjon',
	'PHPSHOP_PRODUCT_FORM_ITEM_STATUS_LBL' => 'Artikkelstatus',
	'PHPSHOP_PRODUCT_FORM_ITEM_DIM_WEIGHT_LBL' => 'Artikkelens dimensjoner og vekt',
	'PHPSHOP_PRODUCT_FORM_ITEM_IMAGES_LBL' => 'Artikkelbilder',
	'PHPSHOP_PRODUCT_FORM_IMAGE_UPDATE_LBL' => 'Skriv inn stien til aktuelt bilde for � oppdatere det.',
	'PHPSHOP_PRODUCT_FORM_IMAGE_DELETE_LBL' => 'Slett bilde',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_ITEMS_LBL' => 'Produkt artikler',
	'PHPSHOP_PRODUCT_FORM_ITEM_ATTRIBUTES_LBL' => 'Artikkel egenskaper',
	'PHPSHOP_PRODUCT_FORM_DELETE_PRODUCT_MSG' => 'Er du sikker p� at du vil slette dette produktet\og artikler relatert til det?',
	'PHPSHOP_PRODUCT_FORM_DELETE_ITEM_MSG' => 'Er du sikker p� at du vil slette denne artikkelen?',
	'PHPSHOP_PRODUCT_FORM_MANUFACTURER' => 'Produsent',
	'PHPSHOP_PRODUCT_FORM_SKU' => 'Varenummer',
	'PHPSHOP_PRODUCT_FORM_NAME' => 'Navn',
	'PHPSHOP_PRODUCT_FORM_CATEGORY' => 'Kategori',
	'PHPSHOP_PRODUCT_FORM_AVAILABLE_DATE' => 'Tilgjengelig dato',
	'PHPSHOP_PRODUCT_FORM_SPECIAL' => 'P� tilbud',
	'PHPSHOP_PRODUCT_FORM_DISCOUNT_TYPE' => 'Type rabatt',
	'PHPSHOP_PRODUCT_FORM_PUBLISH' => 'Publisere?',
	'PHPSHOP_PRODUCT_FORM_LENGTH' => 'Lengde',
	'PHPSHOP_PRODUCT_FORM_WIDTH' => 'Bredde',
	'PHPSHOP_PRODUCT_FORM_HEIGHT' => 'H�yde',
	'PHPSHOP_PRODUCT_FORM_DIMENSION_UOM' => 'M�leenhet',
	'PHPSHOP_PRODUCT_FORM_WEIGHT_UOM' => 'M�leenhet',
	'PHPSHOP_PRODUCT_FORM_FULL_IMAGE' => 'Stort bilde',
	'PHPSHOP_PRODUCT_FORM_WEIGHT_UOM_DEFAULT' => 'gram',
	'PHPSHOP_PRODUCT_FORM_DIMENSION_UOM_DEFAULT' => 'mm',
	'PHPSHOP_PRODUCT_FORM_PACKAGING' => 'Stk per pakke',
	'PHPSHOP_PRODUCT_FORM_PACKAGING_DESCRIPTION' => 'Her kan du fylle inn et nummer antall i pakken.(maks 65535)',
	'PHPSHOP_PRODUCT_FORM_BOX' => 'Ant. i pakken',
	'PHPSHOP_PRODUCT_FORM_BOX_DESCRIPTION' => 'Her kan du skrive inn antall i pakken (maks 65535)',
	'PHPSHOP_PRODUCT_DISPLAY_ADD_PRODUCT_LBL' => 'Resultater lagt til',
	'PHPSHOP_PRODUCT_DISPLAY_UPDATE_PRODUCT_LBL' => 'Resultater oppdatert',
	'PHPSHOP_PRODUCT_DISPLAY_ADD_ITEM_LBL' => 'Artikkel lagt til resultat',
	'PHPSHOP_PRODUCT_DISPLAY_UPDATE_ITEM_LBL' => 'Artikkel oppdatert resultat',
	'PHPSHOP_CATEGORY_FORM_LBL' => 'Kategori informasjon',
	'PHPSHOP_CATEGORY_FORM_NAME' => 'Kategorinavn',
	'PHPSHOP_CATEGORY_FORM_PARENT' => 'Over',
	'PHPSHOP_CATEGORY_FORM_DESCRIPTION' => 'Kategori beskrivelse',
	'PHPSHOP_CATEGORY_FORM_PUBLISH' => 'Publisere?',
	'PHPSHOP_CATEGORY_FORM_FLYPAGE' => 'Kategori beskrivelse',
	'PHPSHOP_ATTRIBUTE_LIST_LBL' => 'Egenskapsliste for',
	'PHPSHOP_ATTRIBUTE_LIST_NAME' => 'Egenskapsnavn',
	'PHPSHOP_ATTRIBUTE_LIST_ORDER' => 'Rekkef�lge',
	'PHPSHOP_ATTRIBUTE_FORM_LBL' => 'Egenskapsskjema',
	'PHPSHOP_ATTRIBUTE_FORM_NEW_FOR_PRODUCT' => 'Ny egenskap for produkt',
	'PHPSHOP_ATTRIBUTE_FORM_UPDATE_FOR_PRODUCT' => 'Oppdater egenskap for produkt',
	'PHPSHOP_ATTRIBUTE_FORM_NEW_FOR_ITEM' => 'Ny egenskap for artikkel',
	'PHPSHOP_ATTRIBUTE_FORM_UPDATE_FOR_ITEM' => 'Oppdater egenskap for artikkel',
	'PHPSHOP_ATTRIBUTE_FORM_NAME' => 'Egenskapsnavn',
	'PHPSHOP_ATTRIBUTE_FORM_ORDER' => 'Rekkef�lge',
	'PHPSHOP_PRICE_LIST_FOR_LBL' => 'Pris for',
	'PHPSHOP_PRICE_LIST_GROUP_NAME' => 'Gruppenavn',
	'PHPSHOP_PRICE_LIST_PRICE' => 'Pris',
	'PHPSHOP_PRODUCT_LIST_CURRENCY' => 'Valuta',
	'PHPSHOP_PRICE_FORM_LBL' => 'Prisinformasjon',
	'PHPSHOP_PRICE_FORM_NEW_FOR_PRODUCT' => 'Ny pris for produkt',
	'PHPSHOP_PRICE_FORM_UPDATE_FOR_PRODUCT' => 'Oppdater pris for produkt',
	'PHPSHOP_PRICE_FORM_NEW_FOR_ITEM' => 'Ny pris for artikkel',
	'PHPSHOP_PRICE_FORM_UPDATE_FOR_ITEM' => 'Oppdater pris for artikkel',
	'PHPSHOP_PRICE_FORM_PRICE' => 'Pris',
	'PHPSHOP_PRICE_FORM_CURRENCY' => 'Valuta',
	'PHPSHOP_PRICE_FORM_GROUP' => 'Kj�pergruppe',
	'PHPSHOP_LEAVE_BLANK' => '(la dette feltet st� tomt om du <br />ikke har en individuell php-fil for det!)',
	'PHPSHOP_PRODUCT_FORM_ITEM_LBL' => 'Artikkel',
	'PHPSHOP_PRODUCT_DISCOUNT_STARTDATE' => 'Startdato for rabatt',
	'PHPSHOP_PRODUCT_DISCOUNT_STARTDATE_TIP' => 'Spesifiser dagen for n�r rabatten starter.',
	'PHPSHOP_PRODUCT_DISCOUNT_ENDDATE' => 'Sluttdato for rabatt',
	'PHPSHOP_PRODUCT_DISCOUNT_ENDDATE_TIP' => 'Spesifiser dagen for n�r rabatten slutter.',
	'PHPSHOP_FILEMANAGER_PUBLISHED' => 'Publisert?',
	'PHPSHOP_FILES_LIST' => 'Filkontroll::Bilde/Fil Liste for',
	'PHPSHOP_FILES_LIST_FILENAME' => 'Filnavn',
	'PHPSHOP_FILES_LIST_FILETITLE' => 'Fil Tittel',
	'PHPSHOP_FILES_LIST_FILETYPE' => 'Fil Type',
	'PHPSHOP_FILES_LIST_FULL_IMG' => 'Stort Bilde',
	'PHPSHOP_FILES_LIST_THUMBNAIL_IMG' => 'Lite Bilde',
	'PHPSHOP_FILES_FORM' => 'Last opp en fil for',
	'PHPSHOP_FILES_FORM_CURRENT_FILE' => 'Gjeldende Fil',
	'PHPSHOP_FILES_FORM_FILE' => 'Fil',
	'PHPSHOP_FILES_FORM_IMAGE' => 'Bilde',
	'PHPSHOP_FILES_FORM_UPLOAD_TO' => 'Last opp til',
	'PHPSHOP_FILES_FORM_UPLOAD_IMAGEPATH' => 'Standard Produktbilde Sti',
	'PHPSHOP_FILES_FORM_UPLOAD_OWNPATH' => 'Spesifiser hvor filen er',
	'PHPSHOP_FILES_FORM_UPLOAD_DOWNLOADPATH' => 'Nedlastings Sti (eks. for n�r du selger nedlastbare ting!)',
	'PHPSHOP_FILES_FORM_AUTO_THUMBNAIL' => 'Atugenerer lite bilde?',
	'PHPSHOP_FILES_FORM_FILE_PUBLISHED' => 'Filen er publisert?',
	'PHPSHOP_FILES_FORM_FILE_TITLE' => 'Tittel for fil (Som kunden ser)',
	'PHPSHOP_FILES_FORM_FILE_URL' => 'Fil URL (valgfri)',
	'PHPSHOP_PRODUCT_FORM_AVAILABILITY_TOOLTIP1' => 'Fill in any text here that will be displayed to the customer on the product flypage.<br />e.g.: 24h, 48 hours, 3 - 5 days, On Order.....',
	'PHPSHOP_PRODUCT_FORM_AVAILABILITY_TOOLTIP2' => 'OR select an Image to be displayed on the Details Page (flypage).<br />The images reside in the directory <i>%s</i><br />',
	'PHPSHOP_PRODUCT_FORM_CUSTOM_ATTRIBUTE_LIST_EXAMPLES' => '<h4>Examples for the Custom attribute List Format:</h4>

        <pre>Name;Extras;...</pre>',
	'PHPSHOP_IMAGE_ACTION' => 'Bildebehandling',
	'PHPSHOP_PARAMETERS_LBL' => 'Parameters',
	'PHPSHOP_PRODUCT_TYPE_LBL' => 'Produkt type',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_LIST_LBL' => 'Produkt type for',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_FORM_LBL' => 'Legg til Produkt type for',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_FORM_PRODUCT_TYPE' => 'Produkt type',
	'PHPSHOP_PRODUCT_TYPE_FORM_NAME' => 'Produkt type Navn',
	'PHPSHOP_PRODUCT_TYPE_FORM_DESCRIPTION' => 'Produkt type Beskrivelse',
	'PHPSHOP_PRODUCT_TYPE_FORM_PARAMETERS' => 'Parameter',
	'PHPSHOP_PRODUCT_TYPE_FORM_LBL' => 'Produkt type Informasjon',
	'PHPSHOP_PRODUCT_TYPE_FORM_PUBLISH' => 'Publiser?',
	'PHPSHOP_PRODUCT_TYPE_FORM_BROWSEPAGE' => 'Produkt type Vis side',
	'PHPSHOP_PRODUCT_TYPE_FORM_FLYPAGE' => 'Produkt type Flypage',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_LIST_LBL' => 'Parameter for Produkt type',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_LBL' => 'Parameter Info',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NOT_FOUND' => 'Produkt type finnes ikke',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NAME' => 'Parameter Navn',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NAME_DESCRIPTION' => 'Dette vil bli kollone tittel. M� v�re et unikt navn uten mellomrom<br/>For eksempel: hoved_type',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_LABEL' => 'Parameter Etikett',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_INTEGER' => 'Integer',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_TEXT' => 'Tekst',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_SHORTTEXT' => 'Kort Tekst',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_FLOAT' => 'Flyt',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_CHAR' => 'Bokstav',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_DATETIME' => 'Dato & Tid',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_DATE' => 'Dato',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_TIME' => 'Tid',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_BREAK' => 'Break Line',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_MULTIVALUE' => 'Flere verdier',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_VALUES' => 'Mulige Verdier',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_MULTISELECT' => 'Vis mulige verdier som "Velg Flere"?',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_VALUES_DESCRIPTION' => '<strong>If Possible Values are set, Parameter can have only this values. Example for Possible Values:</strong><br/><span class="sectionname">Steel;Wood;Plastic;...</span>',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_DEFAULT' => 'Standar Verdi',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_DEFAULT_HELP_TEXT' => 'For Parameter Default Value use this format:<ul><li>Date: YYYY-MM-DD</li><li>Time: HH:MM:SS</li><li>Date & Time: YYYY-MM-DD HH:MM:SS</li></ul>',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_UNIT' => 'Enhet',
	'PHPSHOP_PRODUCT_CLONE' => 'Dupliser produkt',
	'PHPSHOP_HIDE_OUT_OF_STOCK' => 'Skul produkter som ikke er p� lager',
	'PHPSHOP_FEATURED_PRODUCTS_LIST_LBL' => 'Kommende og utg�tte produkter',
	'PHPSHOP_FEATURED' => 'Kommende',
	'PHPSHOP_SHOW_FEATURED_AND_DISCOUNTED' => 'kommende OG utg�tte',
	'PHPSHOP_SHOW_DISCOUNTED' => 'utg�tte produkter',
	'PHPSHOP_FILTER' => 'Filter',
	'PHPSHOP_PRODUCT_FORM_DISCOUNTED_PRICE' => 'Rabattert pris',
	'PHPSHOP_PRODUCT_FORM_DISCOUNTED_PRICE_TIP' => 'Her kan du overstyre rabattinstillingene, fyll inn en spesiell rabatt for dette produktet.<br/>

Nettbutikken vil automatisk generere en ny Record ut fra den rabatterte prisen.',
	'PHPSHOP_PRODUCT_LIST_QUANTITY_START' => 'Start Antall',
	'PHPSHOP_PRODUCT_LIST_QUANTITY_END' => 'Slutt Antall',
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