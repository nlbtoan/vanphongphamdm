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
	'PHPSHOP_MODULE_LIST_ORDER' => 'Luetteloj�rjestys',
	'PHPSHOP_PRODUCT_INVENTORY_LBL' => 'Tuoteinventaario',
	'PHPSHOP_PRODUCT_INVENTORY_STOCK' => 'Varastossa',
	'PHPSHOP_PRODUCT_INVENTORY_WEIGHT' => 'Paino',
	'PHPSHOP_PRODUCT_LIST_PUBLISH' => 'Julkaise',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE' => 'Etsi tuote',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_PRODUCT' => 'muokattu',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_PRICE' => 'muokattu hinta',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_TYPE_WITHOUTPRICE' => 'ilman hintaa',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_AFTER' => 'J�lkeen',
	'PHPSHOP_PRODUCT_LIST_SEARCH_BY_DATE_BEFORE' => 'Ennen',
	'PHPSHOP_PRODUCT_FORM_SHOW_FLYPAGE' => 'Katso tuotetta kaupan sivulla',
	'PHPSHOP_PRODUCT_FORM_NEW_PRODUCT_LBL' => 'Uusi tuote',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_INFO_LBL' => 'Tuotetiedot',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_STATUS_LBL' => 'Tuotteen tila',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_DIM_WEIGHT_LBL' => 'Tuotteen mitat ja paino',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_IMAGES_LBL' => 'Tuotekuvat',
	'PHPSHOP_PRODUCT_FORM_UPDATE_ITEM_LBL' => 'P�ivit� artikkeli',
	'PHPSHOP_PRODUCT_FORM_ITEM_INFO_LBL' => 'Artikkelin tiedot',
	'PHPSHOP_PRODUCT_FORM_ITEM_STATUS_LBL' => 'Artikkelin tila',
	'PHPSHOP_PRODUCT_FORM_ITEM_DIM_WEIGHT_LBL' => 'Artikkelin mitat ja paino',
	'PHPSHOP_PRODUCT_FORM_ITEM_IMAGES_LBL' => 'Artikkelin kuvat',
	'PHPSHOP_PRODUCT_FORM_IMAGE_UPDATE_LBL' => 'P�ivitt��ksesi varsinaista kuvaa, sy�t� polku uuteen kuvaan.',
	'PHPSHOP_PRODUCT_FORM_IMAGE_DELETE_LBL' => 'Sy�t� "none" poistaaksesi nykyisen kuvan.',
	'PHPSHOP_PRODUCT_FORM_PRODUCT_ITEMS_LBL' => 'Tuoteartikkelit',
	'PHPSHOP_PRODUCT_FORM_ITEM_ATTRIBUTES_LBL' => 'Artikkelin ominaisuudet',
	'PHPSHOP_PRODUCT_FORM_DELETE_PRODUCT_MSG' => 'Oletko varma ett� haluat poistaa t�m�n tuotteen ja siihen liittyv�t artikkelit?',
	'PHPSHOP_PRODUCT_FORM_DELETE_ITEM_MSG' => 'Oletko varma ett� haluat poistaa t�m�n artikkelin?',
	'PHPSHOP_PRODUCT_FORM_MANUFACTURER' => 'Valmistaja',
	'PHPSHOP_PRODUCT_FORM_SKU' => 'Tuotetunnus',
	'PHPSHOP_PRODUCT_FORM_NAME' => 'Nimi',
	'PHPSHOP_PRODUCT_FORM_CATEGORY' => 'Kategoria',
	'PHPSHOP_PRODUCT_FORM_AVAILABLE_DATE' => 'Saatavuusp�iv�',
	'PHPSHOP_PRODUCT_FORM_SPECIAL' => 'Erikoistuote(Feature)',
	'PHPSHOP_PRODUCT_FORM_DISCOUNT_TYPE' => 'Alennustyyppi',
	'PHPSHOP_PRODUCT_FORM_PUBLISH' => 'Julkaise?',
	'PHPSHOP_PRODUCT_FORM_LENGTH' => 'Pituus',
	'PHPSHOP_PRODUCT_FORM_WIDTH' => 'Leveys',
	'PHPSHOP_PRODUCT_FORM_HEIGHT' => 'Korkeus',
	'PHPSHOP_PRODUCT_FORM_DIMENSION_UOM' => 'Mittayksikk�',
	'PHPSHOP_PRODUCT_FORM_WEIGHT_UOM' => 'Mittayksikk�',
	'PHPSHOP_PRODUCT_FORM_FULL_IMAGE' => 'Iso kuva',
	'PHPSHOP_PRODUCT_FORM_WEIGHT_UOM_DEFAULT' => 'grammaa',
	'PHPSHOP_PRODUCT_FORM_DIMENSION_UOM_DEFAULT' => 'millimetri�',
	'PHPSHOP_PRODUCT_FORM_PACKAGING' => 'Kpl. pakkauksessa',
	'PHPSHOP_PRODUCT_FORM_PACKAGING_DESCRIPTION' => 'Voit m��ritt�� kuinka monta kappaletta on pakkauksessa. (max. 65535)',
	'PHPSHOP_PRODUCT_FORM_BOX' => 'Pakkausta laatikossa',
	'PHPSHOP_PRODUCT_FORM_BOX_DESCRIPTION' => 'Voit m��ritt�� pakkausm��r�n laatikossa. (max. 65535)',
	'PHPSHOP_PRODUCT_DISPLAY_ADD_PRODUCT_LBL' => 'Tuotteen lis�ystulokset',
	'PHPSHOP_PRODUCT_DISPLAY_UPDATE_PRODUCT_LBL' => 'Tuotteen p�ivitystulokset',
	'PHPSHOP_PRODUCT_DISPLAY_ADD_ITEM_LBL' => 'Artikkelin lis�ystulokset',
	'PHPSHOP_PRODUCT_DISPLAY_UPDATE_ITEM_LBL' => 'Artikkelin p�ivitystulokset',
	'PHPSHOP_CATEGORY_FORM_LBL' => 'Lis��/muokkaa kategorian tiedot',
	'PHPSHOP_CATEGORY_FORM_NAME' => 'Kategorian nimi',
	'PHPSHOP_CATEGORY_FORM_PARENT' => 'P��kategoria',
	'PHPSHOP_CATEGORY_FORM_DESCRIPTION' => 'Kategorian kuvaus',
	'PHPSHOP_CATEGORY_FORM_PUBLISH' => 'Julkaise?',
	'PHPSHOP_CATEGORY_FORM_FLYPAGE' => 'Kategorian sivu(flypage)',
	'PHPSHOP_ATTRIBUTE_LIST_LBL' => 'Ominaisuuslista:',
	'PHPSHOP_ATTRIBUTE_LIST_NAME' => 'Ominaisuuden nimi',
	'PHPSHOP_ATTRIBUTE_LIST_ORDER' => 'Luetteloj�rjestys',
	'PHPSHOP_ATTRIBUTE_FORM_LBL' => 'Ominaisuuslomake',
	'PHPSHOP_ATTRIBUTE_FORM_NEW_FOR_PRODUCT' => 'Uusi ominaisuus tuotteelle',
	'PHPSHOP_ATTRIBUTE_FORM_UPDATE_FOR_PRODUCT' => 'P�ivit� tuotteen ominaisuus',
	'PHPSHOP_ATTRIBUTE_FORM_NEW_FOR_ITEM' => 'Uusi ominaisuus artikkelille',
	'PHPSHOP_ATTRIBUTE_FORM_UPDATE_FOR_ITEM' => 'P�ivit� artikkelin ominaisuus',
	'PHPSHOP_ATTRIBUTE_FORM_NAME' => 'Ominaisuuden nimi',
	'PHPSHOP_ATTRIBUTE_FORM_ORDER' => 'Luetteloj�rjestys',
	'PHPSHOP_PRICE_LIST_FOR_LBL' => 'Hinta: ',
	'PHPSHOP_PRICE_LIST_GROUP_NAME' => 'Ryhm�n nimi',
	'PHPSHOP_PRICE_LIST_PRICE' => 'Hinta',
	'PHPSHOP_PRODUCT_LIST_CURRENCY' => 'Valuutta',
	'PHPSHOP_PRICE_FORM_LBL' => 'Hinnan tiedot',
	'PHPSHOP_PRICE_FORM_NEW_FOR_PRODUCT' => 'Uusi hinta tuotteelle',
	'PHPSHOP_PRICE_FORM_UPDATE_FOR_PRODUCT' => 'P�ivit� tuotteen hinta',
	'PHPSHOP_PRICE_FORM_NEW_FOR_ITEM' => 'Uusi hinta',
	'PHPSHOP_PRICE_FORM_UPDATE_FOR_ITEM' => 'P�ivit� artikkelin hinta',
	'PHPSHOP_PRICE_FORM_PRICE' => 'Hinta',
	'PHPSHOP_PRICE_FORM_CURRENCY' => 'Valuutta',
	'PHPSHOP_PRICE_FORM_GROUP' => 'Ostajaryhm�',
	'PHPSHOP_LEAVE_BLANK' => '(j�t� tyhj�ksi , jos sinulla ei ole <br />yksil�llist� tiedostoa!)',
	'PHPSHOP_PRODUCT_FORM_ITEM_LBL' => 'Artikkeli',
	'PHPSHOP_PRODUCT_DISCOUNT_STARTDATE' => 'Alennus alkaa',
	'PHPSHOP_PRODUCT_DISCOUNT_STARTDATE_TIP' => 'M��ritt�� alennuksen aloitusp�iv�m��r�n',
	'PHPSHOP_PRODUCT_DISCOUNT_ENDDATE' => 'Alennus p��ttyy',
	'PHPSHOP_PRODUCT_DISCOUNT_ENDDATE_TIP' => 'M��ritt�� alennuksen p��ttymisp�iv�m��r�n',
	'PHPSHOP_FILEMANAGER_PUBLISHED' => 'Julkaistu?',
	'PHPSHOP_FILES_LIST' => 'Tiedostonhallinta::Kuva/Tiedosto luettelo kohteelle',
	'PHPSHOP_FILES_LIST_FILENAME' => 'Tiedoston nimi',
	'PHPSHOP_FILES_LIST_FILETITLE' => 'Tiedoston nimike',
	'PHPSHOP_FILES_LIST_FILETYPE' => 'Tiedoston tyyppi',
	'PHPSHOP_FILES_LIST_FULL_IMG' => 'Iso kuva',
	'PHPSHOP_FILES_LIST_THUMBNAIL_IMG' => 'N�ytekuva',
	'PHPSHOP_FILES_FORM' => 'Lataa tiedosto kohteeseen',
	'PHPSHOP_FILES_FORM_CURRENT_FILE' => 'Nykyinen tiedosto',
	'PHPSHOP_FILES_FORM_FILE' => 'Tiedosto',
	'PHPSHOP_FILES_FORM_IMAGE' => 'Kuva',
	'PHPSHOP_FILES_FORM_UPLOAD_TO' => 'Lataa kohteeseen',
	'PHPSHOP_FILES_FORM_UPLOAD_IMAGEPATH' => 'Oletuspolku tuotekuvalle',
	'PHPSHOP_FILES_FORM_UPLOAD_OWNPATH' => 'M��rit� tiedoston sijainti',
	'PHPSHOP_FILES_FORM_UPLOAD_DOWNLOADPATH' => 'Latauspolku (esim. ladattavien tuotteiden myyntiin!)',
	'PHPSHOP_FILES_FORM_AUTO_THUMBNAIL' => 'Luo n�ytekuva automaattisesti?',
	'PHPSHOP_FILES_FORM_FILE_PUBLISHED' => 'Tiedosto on julkaistu?',
	'PHPSHOP_FILES_FORM_FILE_TITLE' => 'Tiedoston nimike (mink� asiakas n�kee)',
	'PHPSHOP_FILES_FORM_FILE_URL' => 'Tiedoston URL (valinnainen)',
	'PHPSHOP_PRODUCT_FORM_AVAILABILITY_TOOLTIP1' => 'Kirjoita t�h�n teksti, joka n�kyy tuotetiedoissa toimitusaikana.<br />esim.: 24h, 48 tuntia, 3 - 5 p�iv��',
	'PHPSHOP_PRODUCT_FORM_AVAILABILITY_TOOLTIP2' => 'TAI valitse kuva, joka n�kyy tuotetiedossa toimitusaikana.<br />Kuvat ovat hakemistossa <i>/components/com_virtuemart/shop_image/availability</i><br />',
	'PHPSHOP_PRODUCT_FORM_ATTRIBUTE_LIST_EXAMPLES' => '<h4>Esimerkkej� piirrelistan nimikkeist� (Attribute List Format):</h4>
        <pre>Koko,S[-2.99],M,XL[+1.99];V�ri,Punainen,Vihre�,Keltainen,Erikoisv�ri[=24.00];jne,..,..</pre>
        <h4>Hintam��ritykset:</h4>
        <pre>
        &#43; == Lis�� t�m� m��r� asetettuun hintaan.<br />
        &#45; == V�henn� t�m� m��r� asetetusta hinnasta.<br />
        &#61; == Aseta tuotteelle t�m� hinta.
      </pre>',
	'PHPSHOP_PRODUCT_FORM_CUSTOM_ATTRIBUTE_LIST_EXAMPLES' => '<h4>Esimerkkej� erityispiirrelistan sis�ll�st�:</h4>
        <pre>Nimi;Ekstra;...</pre>',
	'PHPSHOP_IMAGE_ACTION' => 'Kuvan toiminta',
	'PHPSHOP_PARAMETERS_LBL' => 'Muuttujat/parametrit',
	'PHPSHOP_PRODUCT_TYPE_LBL' => 'Tuotetyyppi',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_LIST_LBL' => 'Tyyppilista tuotteille:',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_FORM_LBL' => 'Lis�� tuotetyyppi kohtaan',
	'PHPSHOP_PRODUCT_PRODUCT_TYPE_FORM_PRODUCT_TYPE' => 'Tuotetyyppi',
	'PHPSHOP_PRODUCT_TYPE_FORM_NAME' => 'Tuotetyypin nimi',
	'PHPSHOP_PRODUCT_TYPE_FORM_DESCRIPTION' => 'Tuotetyypin kuvaus',
	'PHPSHOP_PRODUCT_TYPE_FORM_PARAMETERS' => 'Muuttujat/parametrit',
	'PHPSHOP_PRODUCT_TYPE_FORM_LBL' => 'Lis��/muokkaa tuotetyypin tiedot',
	'PHPSHOP_PRODUCT_TYPE_FORM_PUBLISH' => 'Julkaise?',
	'PHPSHOP_PRODUCT_TYPE_FORM_BROWSEPAGE' => 'Tuotetyyppien selailusivu',
	'PHPSHOP_PRODUCT_TYPE_FORM_FLYPAGE' => 'Tuotetyyppi-ikkuna',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_LIST_LBL' => 'Tuotetyypin muuttujat',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_LBL' => 'Muuttujatieto',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NOT_FOUND' => 'Tuotetyyppi� ei l�ydy!',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NAME' => 'Muuttujan nimi',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_NAME_DESCRIPTION' => 'T�m� nimi toimii taulukon sarakenimen�. Kirjoitetaan yhten�isin kirjaimin ja ilman v�lej�.<br />Esimerkiksi: main_material',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_LABEL' => 'Muuttujan otsake',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_INTEGER' => 'Numero',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_TEXT' => 'Teksti',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_SHORTTEXT' => 'Lyhyt teksti',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_FLOAT' => 'Kelluva',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_CHAR' => 'Merkki',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_DATETIME' => 'P�iv�m��r� ja aika',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_DATE' => 'P�iv�m��r�',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_TIME' => 'Aika',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_BREAK' => 'Rivinvaihto',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_TYPE_MULTIVALUE' => 'Useita arvoja',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_VALUES' => 'Mahdollisia arvoja',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_MULTISELECT' => 'N�ytet��nk� mahdollisia arvoja monivalintoja varten?',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_VALUES_DESCRIPTION' => '<strong>Jos valitaan *mahdolliset arvot*, muuttujat (parametrit) voivat saada vain niit� arvoja. Esimerkki mahdollisista muuttuja-arvoista:</strong><br /><span class=\"sectionname\">ter�s;puu;muovi;...</span>',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_DEFAULT' => 'Oletusarvo',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_DEFAULT_HELP_TEXT' => 'Muuttujan oletusarvon m��rittelyss� k�ytet��n seuraavaa muotoa:<ul><li>Pvm: YYYY-MM-DD</li><li>Aika: HH:MM:SS</li><li>Pvm & aika: YYYY-MM-DD HH:MM:SS</li></ul>',
	'PHPSHOP_PRODUCT_TYPE_PARAMETER_FORM_UNIT' => 'Yksikk�',
	'PHPSHOP_PRODUCT_CLONE' => 'Kopioi tuote',
	'PHPSHOP_HIDE_OUT_OF_STOCK' => 'Luettele tuotteet, jotka eiv�t ole loppuneet varastosta',
	'PHPSHOP_FEATURED_PRODUCTS_LIST_LBL' => 'Erikois- ja alennustuotteet',
	'PHPSHOP_FEATURED' => 'Erikoistuotteet',
	'PHPSHOP_SHOW_FEATURED_AND_DISCOUNTED' => 'Erikois- ja alennustuotteet',
	'PHPSHOP_SHOW_DISCOUNTED' => 'Alennustuotteet',
	'PHPSHOP_FILTER' => 'Rajaa',
	'PHPSHOP_PRODUCT_FORM_DISCOUNTED_PRICE' => 'Alennettu hinta',
	'PHPSHOP_PRODUCT_FORM_DISCOUNTED_PRICE_TIP' => 'T�ss� voit lis�t� alennuksen t�lle tuotteelle.<br />
	Kaupan alennusasetuksiin lis�t��n t�m� alennus.',
	'PHPSHOP_PRODUCT_LIST_QUANTITY_START' => 'Kappalem��r� alkaa',
	'PHPSHOP_PRODUCT_LIST_QUANTITY_END' => 'Kappalem��r� loppuu',
	'VM_PRODUCTS_MOVE_LBL' => 'Siirr� tuotteita kategoriasta toiseen',
	'VM_PRODUCTS_MOVE_LIST' => 'Olet valinnut siirrett�v�ksi %s tuotteet',
	'VM_PRODUCTS_MOVE_TO_CATEGORY' => 'Siirr� kategoriaan',
	'VM_PRODUCT_LIST_REORDER_TIP' => 'Valitse tuotekategoria',
	'VM_REVIEW_FORM_LBL' => 'Lis�� kommentti',
	'PHPSHOP_REVIEW_EDIT' => 'Lis��/muokkaa kommentti',
	'SEL_CATEGORY' => 'Valitse kategoria',
	'VM_PRODUCT_FORM_MIN_ORDER' => 'V�himm�isostosten m��r�',
	'VM_PRODUCT_FORM_MAX_ORDER' => 'Enimm�isostosten m��r�',
	'VM_DISPLAY_TABLE_HEADER' => 'N�yt� taulukon yl�tunniste',
	'VM_DISPLAY_LINK_TO_CHILD' => 'Linkki alatuotteeseen luettelosta',
	'VM_DISPLAY_INCLUDE_PRODUCT_TYPE' => 'Sis�llyt� alatuotetyyppi',
	'VM_DISPLAY_USE_LIST_BOX' => 'K�yt� luettelovalikkoa alatuotteisiin',
	'VM_DISPLAY_LIST_STYLE' => 'Luettelotyyli',
	'VM_DISPLAY_USE_PARENT_LABEL' => 'K�yt� p��tuotteen asetuksia alatuotteille:',
	'VM_DISPLAY_LIST_TYPE' => 'Luettelo:',
	'VM_DISPLAY_QUANTITY_LABEL' => 'M��r�:',
	'VM_DISPLAY_QUANTITY_DROPDOWN_LABEL' => 'Pudotusvalikon arvot',
	'VM_DISPLAY_CHILD_DESCRIPTION' => 'N�yt� alatuotteen kuvaus',
	'VM_DISPLAY_DESC_WIDTH' => 'Alatuotteen kuvauksen pituus',
	'VM_DISPLAY_ATTRIB_WIDTH' => 'Alatuotteen ominaisuuden pituus',
	'VM_DISPLAY_CHILD_SUFFIX' => 'Alatuotteen luokan etuliite',
	'VM_INCLUDED_PRODUCT_ID' => 'Tuotteeseen sis�ltyv�t ID:t',
	'VM_EXTRA_PRODUCT_ID' => 'Muut ID;t',
	'PHPSHOP_DISPLAY_RADIOBOX' => 'K�yt� Radiopainike valikkoa',
	'PHPSHOP_PRODUCT_FORM_ITEM_DISPLAY_LBL' => 'Ulkoasun asetukset',
	'PHPSHOP_DISPLAY_USE_PARENT' => 'Kumoa alatuotteiden n�ytt�asetukset ja k�yt� p��tuotteen asetuksia',
	'PHPSHOP_DISPLAY_NORMAL' => 'Perus kappalem��r� valikko',
	'PHPSHOP_DISPLAY_HIDE' => 'Piilota kappalem��r� valikko',
	'PHPSHOP_DISPLAY_DROPDOWN' => 'K�yt� pudotusvalikkoa',
	'PHPSHOP_DISPLAY_CHECKBOX' => 'K�yt� rastivalikkoa',
	'PHPSHOP_DISPLAY_ONE' => 'Yksi, Lis�� koriin painike',
	'PHPSHOP_DISPLAY_MANY' => 'Lis�� koriin painike, jokaiselle alatuotteelle',
	'PHPSHOP_DISPLAY_START' => 'Alkuarvo',
	'PHPSHOP_DISPLAY_END' => 'Loppuarvo',
	'PHPSHOP_DISPLAY_STEP' => 'Askelarvo',
	'PRODUCT_WAITING_LIST_TAB' => 'Odotuslista',
	'PRODUCT_WAITING_LIST_USERLIST' => 'Asiakkaat jotka odottavat ilmoitusta, kun tuote lis�t��n varastosaldoon',
	'PRODUCT_WAITING_LIST_NOTIFYUSERS' => 'L�het� ilmoitus automaattisesti n�ille asiakkaille(kun olet lis�nnyt tuotteen m��r�n varastosaldoon)',
	'PRODUCT_WAITING_LIST_NOTIFIED' => 'Ilmoitettu',
	'VM_PRODUCT_FORM_AVAILABILITY_SELECT_IMAGE' => 'Valitse kuva',
	'VM_PRODUCT_RELATED_SEARCH' => 'Etsi tuotteita tai kategorioita:',
	'VM_FILES_LIST_ROLE' => 'Tiedoston tarkoitus',
	'VM_FILES_LIST_UP' => 'Yl�s',
	'VM_FILES_LIST_GO_UP' => 'Mene yl�s',
	'VM_CATEGORY_FORM_PRODUCTS_PER_ROW' => 'N�yt� x tuotetta per rivi',
	'VM_CATEGORY_FORM_BROWSE_PAGE' => 'Kategorian sivu(browse)',
	'VM_PRODUCT_CLONE_OPTIONS_TAB' => 'Kopioi tuotteen asetukset',
	'VM_PRODUCT_CLONE_OPTIONS_LBL' => 'Kopioi my�s n�m� alatuotteet',
	'VM_PRODUCT_LIST_MEDIA' => 'Media',
	'VM_REVIEW_LIST_NAMEDATE' => 'Nimi/p�iv�ys',
	'VM_PRODUCT_SELECT_ONE_OR_MORE' => 'Valitse yksi tai useampi tuote',
	'VM_PRODUCT_SEARCHING' => 'Etsit��n...',
	'PHPSHOP_PRODUCT_FORM_ATTRIBUTE_LIST_EXAMPLES' => '<h4>Examples for the Attribute List Format:</h4>
Title = Color, Property = Red ; Click on New Property to add a new color: Green ; Then click on New attribute to add a new attribute, and so on.
<h4>Inline price adjustments for using the Advanced Attributes modification:</h4>
Price = +10 to add this amount to the configured price.<br />  Price = -10 to subtract this amount from the configured price.<br />  Price = 10 to set the product\'s price to this amount.'
); $VM_LANG->initModule( 'product', $langvars );
?>