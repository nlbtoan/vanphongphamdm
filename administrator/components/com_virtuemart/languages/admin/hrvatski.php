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
	'PHPSHOP_USER_LIST_LBL' => 'Lista Korisnika',
	'PHPSHOP_USER_LIST_USERNAME' => 'Korisni�ko Ime',
	'PHPSHOP_USER_LIST_FULL_NAME' => 'Puno Ime',
	'PHPSHOP_USER_LIST_GROUP' => 'Grupa',
	'PHPSHOP_USER_FORM_LBL' => 'Dodavanje/Ure�ivanje informacija o korisniku',
	'PHPSHOP_USER_FORM_PERMS' => 'Dozvole',
	'PHPSHOP_USER_FORM_CUSTOMER_NUMBER' => 'Broj Kupca / ID',
	'PHPSHOP_MODULE_LIST_LBL' => 'Lista Modula',
	'PHPSHOP_MODULE_LIST_NAME' => 'Dozvole Modula',
	'PHPSHOP_MODULE_LIST_PERMS' => 'Dozvole Modula',
	'PHPSHOP_MODULE_LIST_FUNCTIONS' => 'Funkcije',
	'PHPSHOP_MODULE_FORM_LBL' => 'Podaci o modulu',
	'PHPSHOP_MODULE_FORM_MODULE_LABEL' => 'Etiketa modula (za gornji izbornik)',
	'PHPSHOP_MODULE_FORM_NAME' => 'Naziv Modula',
	'PHPSHOP_MODULE_FORM_PERMS' => 'Dozvole Modula',
	'PHPSHOP_MODULE_FORM_HEADER' => 'Zaglavlje modula',
	'PHPSHOP_MODULE_FORM_FOOTER' => 'Podno�je modula',
	'PHPSHOP_MODULE_FORM_MENU' => 'Prika�i modul u administratorskom izborniku?',
	'PHPSHOP_MODULE_FORM_ORDER' => 'Redoslijed',
	'PHPSHOP_MODULE_FORM_DESCRIPTION' => 'Opis modula',
	'PHPSHOP_MODULE_FORM_LANGUAGE_CODE' => 'Jezi�ni Kod',
	'PHPSHOP_MODULE_FORM_LANGUAGE_FILE' => 'Language File',
	'PHPSHOP_FUNCTION_LIST_LBL' => 'Lista Funkcija',
	'PHPSHOP_FUNCTION_LIST_NAME' => 'Naziv Funkcije',
	'PHPSHOP_FUNCTION_LIST_CLASS' => 'Naziv klase',
	'PHPSHOP_FUNCTION_LIST_METHOD' => 'Metoda klase',
	'PHPSHOP_FUNCTION_LIST_PERMS' => 'Dozvole',
	'PHPSHOP_FUNCTION_FORM_LBL' => 'Podaci o funkciji',
	'PHPSHOP_FUNCTION_FORM_NAME' => 'Naziv funkcije',
	'PHPSHOP_FUNCTION_FORM_CLASS' => 'Naziv klase',
	'PHPSHOP_FUNCTION_FORM_METHOD' => 'Metoda klase',
	'PHPSHOP_FUNCTION_FORM_PERMS' => 'Dozvole funkcije',
	'PHPSHOP_FUNCTION_FORM_DESCRIPTION' => 'Opis funkcije',
	'PHPSHOP_CURRENCY_LIST_LBL' => 'Lista Valuta',
	'PHPSHOP_CURRENCY_LIST_NAME' => 'Naziv Valute',
	'PHPSHOP_CURRENCY_LIST_CODE' => 'Oznaka Valute',
	'PHPSHOP_COUNTRY_LIST_LBL' => 'Lista Dr�ava',
	'PHPSHOP_COUNTRY_LIST_NAME' => 'Naziv Dr�ave',
	'PHPSHOP_COUNTRY_LIST_3_CODE' => 'Oznaka Dr�ave (3)',
	'PHPSHOP_COUNTRY_LIST_2_CODE' => 'Oznaka Dr�ave (2)',
	'PHPSHOP_STATE_LIST_MNU' => 'Lista Regija',
	'PHPSHOP_STATE_LIST_LBL' => 'Lista Regija ',
	'PHPSHOP_STATE_LIST_ADD' => 'Dodavanje/Ure�ivanje Regije',
	'PHPSHOP_STATE_LIST_NAME' => 'Naziv regije',
	'PHPSHOP_STATE_LIST_3_CODE' => 'Kod regije (3)',
	'PHPSHOP_STATE_LIST_2_CODE' => 'Kod regije (2)',
	'PHPSHOP_ADMIN_CFG_GLOBAL' => 'Osnovne Postavke',
	'PHPSHOP_ADMIN_CFG_SITE' => 'Stranica',
	'PHPSHOP_ADMIN_CFG_SHIPPING' => 'Dostava',
	'PHPSHOP_ADMIN_CFG_CHECKOUT' => 'Blagajna',
	'PHPSHOP_ADMIN_CFG_DOWNLOADABLEGOODS' => 'Downloadi',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE' => 'Koristiti samo kao katalog',
	'PHPSHOP_ADMIN_CFG_USE_ONLY_AS_CATALOGUE_EXPLAIN' => 'Ovime se onemogu�uje funkcionalnost ko�arice.',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES' => 'Prikazati cijene',
	'PHPSHOP_ADMIN_CFG_SHOW_PRICES_EXPLAIN' => 'Isklju�ite ovo ako �elite koristiti katalog funkcionalnost - bez prikazivanja cijena.',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX' => 'Virtualni Porez',
	'PHPSHOP_ADMIN_CFG_VIRTUAL_TAX_EXPLAIN' => '�elite li ura�unati porez na proizvode �ija je te�ina nula. Ovo mo�ete prilagoditi u ps_checkout.php->calc_order_taxable().',
	'PHPSHOP_ADMIN_CFG_TAX_MODE' => 'Porezna stopa:',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_SHIP' => 'Bazirano na adresi kupca',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_VENDOR' => 'Bazirano na adresi du�ana',
	'PHPSHOP_ADMIN_CFG_TAX_MODE_EXPLAIN' => 'Ovdje odre�ujete po kojoj poreznoj stopi se izra�unava porez:<br />
                                                <ul><li>porez dr�ave iz koje je kupac</li><br/>
                                                <li>porez dr�ave iz koje je vlasnik du�ana.</li></ul>',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE' => 'Omogu�iti vi�estruke porezne stope?',
	'PHPSHOP_ADMIN_CFG_MULTI_TAX_RATE_EXPLAIN' => 'Ozna�ite ovo ako imate razli�ite porezne stope za razli�ite proizvode (npr. 7% za knjige i hranu, 16% za ostale stvari)',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE' => 'Odbiti popuste prije ura�unavanja poreza/dostave?',
	'PHPSHOP_ADMIN_CFG_REVIEW' => 'Omogu�iti recenziranje/ocjenjivanje proizvoda',
	'PHPSHOP_ADMIN_CFG_REVIEW_EXPLAIN' => 'Ako je uklju�eno, kupci mogu <strong>ocjenjivati proizvode</strong> i napisati <strong>svoje mi�ljenje</strong> o njima. <br />Tako kupci mogu svoje mi�ljenje o proizvodu podijeliti s drugim (potencijalnim) kupcima.<br />',
	'PHPSHOP_ADMIN_CFG_SUBSTRACT_PAYEMENT_BEFORE_EXPLAIN' => 'Ako je uklju�eno, odre�uje da se popust odbija od ukupnog iznosa <b>PRIJE</b> ura�unavanja poreza i pristojbe za dostavu.',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS' => 'Obavezni pristanak na uvjete kori�tenja',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_EXPLAIN' => 'Ozna�ite ako �elite da kupac mora pristati na uvjete kori�tenja prilikom registracije.',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK' => 'Provjera zaliha',
	'PHPSHOP_ADMIN_CFG_CHECK_STOCK_EXPLAIN' => 'Provjerava stanje zaliha pri dodavanju artikla u ko�aricu.
                                                     Ako je ovo uklju�eno, kupac ne�e mo�i dodati u ko�aricu vi�e artikala nego �to ih je na skladi�tu.',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE' => 'Suradni�ki program',
	'PHPSHOP_ADMIN_CFG_ENABLE_AFFILIATE_EXPLAIN' => 'Ovo omogu�ava pra�enje suradnika u shop-frontendu. Omogu�ite ako ste u backendu dodali suradnike.',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT' => 'Format Emaila narud�be:',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_TEXT' => 'Tekst mail',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_HTML' => 'HTML email',
	'PHPSHOP_ADMIN_CFG_MAIL_FORMAT_EXPLAIN' => 'Ovo odre�uje format emaila s detaljima o narud�bi:<br />
                                                      <ul><li>kao jednostavni tekstualni Email</li>
                                                      <li>ili kao html Email sa slikama.</li></ul>',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN' => 'Admin pristup za frontend korisnike',
	'PHPSHOP_ADMIN_CFG_FRONTENDAMDIN_EXPLAIN' => 'Ovime mo�ete omogu�iti Frontend Administriranje korisnicima koji su administratori du�ana, ali ne mogu pristupiti Joomla Administraciji (npr. Registriran / Urednik).',
	'PHPSHOP_ADMIN_CFG_URLSECURE' => 'SSL url',
	'PHPSHOP_ADMIN_CFG_URLSECURE_EXPLAIN' => 'SSL url va�e stranice.',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE' => 'Naslovnica',
	'PHPSHOP_ADMIN_CFG_HOMEPAGE_EXPLAIN' => 'Ovo je po�etna stranica du�ana.',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE' => 'Stranica za Gre�ke',
	'PHPSHOP_ADMIN_CFG_ERRORPAGE_EXPLAIN' => 'Ovo je standardna stranica za prikazivanje poruka o gre�kama.',
	'PHPSHOP_ADMIN_CFG_DEBUG' => 'DEBUG ?',
	'PHPSHOP_ADMIN_CFG_DEBUG_EXPLAIN' => 'DEBUG?	Uklju�uje debug output. Zbog ovoga se DEBUGPAGE pojavljuje na dnu svake stranice. Korisno tijekom perioda razvoja jer prikazuje sadr�aj ko�arice, vrijednosti polja u obrascu i sl.',
	'PHPSHOP_ADMIN_CFG_FLYPAGE' => 'FLYPAGE',
	'PHPSHOP_ADMIN_CFG_FLYPAGE_EXPLAIN' => 'Standardna stranica za prikazivanje detalja o proizvodima.',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE' => 'Predlo�ak Kategorije',
	'PHPSHOP_ADMIN_CFG_CATEGORY_TEMPLATE_EXPLAIN' => 'Ovo definira primarni predlo�ak kategorije za prikaz proizvoda u kategoriji.<br />Mo�ete napraviti nove predlo�ke prilagodbom ve� postoje�ih <br />(koji se nalaze u direktoriju <strong>PUTANJA_KOMPONENTE/html/templates/</strong> i po�inju sa browse_)',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW' => 'Standardni broj proizvoda u retku.',
	'PHPSHOP_ADMIN_CFG_PRODUCTS_PER_ROW_EXPLAIN' => 'Ovo odre�uje broj proizvoda u retku. <br />Primjer: Ako ga postavite na 4, Predlo�ak kategorije �e prikazati 4 proizvoda u svakom retku',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE' => '"no image" slika',
	'PHPSHOP_ADMIN_CFG_NOIMAGEPAGE_EXPLAIN' => 'Ova slika se koristi kada slika proizvoda nije dostupna.',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION' => 'Prikazati "powered by VirtueMart" ?',
	'PHPSHOP_ADMIN_CFG_SHOWPHPSHOP_VERSION_EXPLAIN' => 'Prikazuje powered-by-VirtueMart logo na dnu du�ana.',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_STANDARD' => 'Primarni Dostavni modul sa individualno konfiguriranim dostavlja�ima i transportnim tro�kovima. <strong>PREPORU�ENO !</strong>',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_ZONE' => 'Zone Shipping Modul Country Version 1.0<br />Za vi�e informacija o ovom modulu posjetite <a href="http://ZephWare.com">http://ZephWare.com</a><br />Za detalje <a href="mailto:zephware@devcompany.com">ZephWare.com</a><br /> Ozna�ite ovo za aktiviranje transportnih zona',
	'PHPSHOP_ADMIN_CFG_STORE_SHIPPING_METHOD_DISABLE' => 'Onemogu�uje izbor na�ina dostave. Odaberite ako va�i kupci kupuju usluge ili proizvode koje se ne dostavljaju fizi�ki.',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR' => 'Omogu�i Checkout Bar',
	'PHPSHOP_ADMIN_CFG_ENABLE_CHECKOUTBAR_EXPLAIN' => 'Ozna�ite ovo ako �elite da \'checkout-bar\' bude prikazan kupcima za vrijeme procesa kupnje ( 1 - 2 - 3 - 4 sa grafikom).',
	'PHPSHOP_ADMIN_CFG_CHECKOUT_PROCESS' => 'Izaberite na�in kupnje za va� du�an',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS' => 'Omogu�i Downloade',
	'PHPSHOP_ADMIN_CFG_ENABLE_DOWNLOADS_EXPLAIN' => 'Obavezno ako nudite digitalne proizvode i �elite omogu�iti kupcima da, nakon pla�anja, mogu skinuti (downloadati) kupljeni proizvod sa va�eg servera.',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS' => 'Status narud�be koji omogu�ava download',
	'PHPSHOP_ADMIN_CFG_ORDER_ENABLE_DOWNLOADS_EXPLAIN' => 'Odaberite koji status mora imati narud�ba da bi se kupcu poslala email obavijest da je njihova narud�ba spremna za download.',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS' => 'Status narud�be koji onemogu�ava download',
	'PHPSHOP_ADMIN_CFG_ORDER_DISABLE_DOWNLOADS_EXPLAIN' => 'Odaberite koji status mora imati narud�ba da bi se kupcu onemogu�io download.',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT' => 'DOWNLOADROOT',
	'PHPSHOP_ADMIN_CFG_DOWNLOADROOT_EXPLAIN' => 'Fizi�ka putanja do datoteka za download.<br>
        <span class="message">Zbog sigurnosti va�eg du�ana, uvijek kada je to mogu�e, koristite direktorij IZVAN WEBROOT-a</span>',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX' => 'Maksimalno Downloada',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_MAX_EXPLAIN' => 'Odre�uje maksimalni broj dozvoljenih downloada za jednu narud�bu.',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE' => 'Download je Istekao',
	'PHPSHOP_ADMIN_CFG_DOWNLOAD_EXPIRE_EXPLAIN' => 'Odre�uje vremenski raspon <strong>u sekundama</strong> u kojemu je kupcima omogu�en download.
  Ovaj raspon po�inje prvim downloadom! Kad istekne vrijeme Download-ID se deaktivira.<br />Napomena: 86400sek=24sata.',
	'PHPSHOP_COUPONS' => 'Kuponi',
	'PHPSHOP_COUPONS_ENABLE' => 'Uklju�i Kori�tenje Kupona',
	'PHPSHOP_COUPONS_ENABLE_EXPLAIN' => 'Ako uklju�ite upotrebu kupona, dopustit �ete kupcima da upi�u brojeve kupona kako bi ostvarili popust na kupnju.',
	'PHPSHOP_ADMIN_CFG_PDF_BUTTON' => 'PDF - Dugme',
	'PHPSHOP_ADMIN_CFG_PDF_BUTTON_EXPLAIN' => 'PDF - Dugme u Du�anu',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_ONORDER' => 'Uvjeti kori�tenja kod SVAKE NARUD�BE',
	'PHPSHOP_ADMIN_CFG_AGREE_TERMS_ONORDER_EXPLAIN' => 'Ozna�ite ako �elite da kupac mora pristati na uvjete kori�tenja prilikom SVAKE NARUD�BE.',
	'PHPSHOP_ADMIN_CFG_SHOW_OUT_OF_STOCK_PRODUCTS' => 'Prikazati proizvode kojih nema na zalihama',
	'PHPSHOP_ADMIN_CFG_SHOW_OUT_OF_STOCK_PRODUCTS_EXPLAIN' => 'Kada je omogu�eno, proizvodi kojih nema na zalihama su ipak prikazani. Ina�e su takvi proizvodi skriveni.',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE' => 'Du�an je Neaktivan',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE_TIP' => 'Ako je ovo uklju&#269;eno, Du&#263;an &#263;e prikazivati poruku o neaktivnosti',
	'PHPSHOP_ADMIN_CFG_SHOP_OFFLINE_MSG' => 'Poruka o neaktivnosti',
	'PHPSHOP_ADMIN_CFG_TABLEPREFIX' => 'Prefiks mysql tablica ove komponente',
	'PHPSHOP_ADMIN_CFG_TABLEPREFIX_TIP' => 'Primarni je <strong>vm</strong> ',
	'PHPSHOP_ADMIN_CFG_NAV_AT_TOP' => 'Navigacijska Traka na vrhu liste proizvoda?',
	'PHPSHOP_ADMIN_CFG_NAV_AT_TOP_TIP' => 'Mo�ete uklju�iti ili isklju�iti prikazivanje Navigacijske Trake na vrhu liste proizvoda.',
	'PHPSHOP_ADMIN_CFG_SHOW_PRODUCT_COUNT' => 'Prikazati broj proizvoda',
	'PHPSHOP_ADMIN_CFG_SHOW_PRODUCT_COUNT_TIP' => 'Prikazati broj proizvoda u kategoriji kao Kategorija (4)?',
	'PHPSHOP_ADMIN_CFG_DYNAMIC_THUMBNAIL_RESIZING' => 'Dinami�na promjena veli�ine miniSlika?',
	'PHPSHOP_ADMIN_CFG_DYNAMIC_THUMBNAIL_RESIZING_TIP' => 'Omogu�uje dinami�nu promjenu veli�ine slika. Zna�i da �e sve miniSlike biti one veli�ine koju navedete ispod.
        Koristi se GD2 funkcija (mo�ete provjeriti imate li instaliranu GD2 podr�ku "Sustav" -> "Informacije" -> "PHP Info" -> gd.)
        Na ovaj na�in je kvaliteta miniSlika puno bolja nego kada im veli�inu pode�ava internet preglednik. Novo stvorene slike se spremaju u /shop_image/prduct/resized direktorij.',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_WIDTH' => '�irina miniSlika',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_WIDTH_TIP' => 'Ciljna <strong>�irina</strong> miniSlike.',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_HEIGHT' => 'Visina miniSlika',
	'PHPSHOP_ADMIN_CFG_THUMBNAIL_HEIGHT_TIP' => 'Ciljna <strong>visina</strong> miniSlike.',
	'PHPSHOP_ADMIN_CFG_SHIPPING_NO_SELECTION' => 'Popunite bar jednu ku�icu u Konfiguraciji Dostave!',
	'PHPSHOP_ADMIN_CFG_PRICE_CONFIGURATION' => 'Konfiguracija Cijena',
	'PHPSHOP_ADMIN_CFG_PRICE_ACCESS_LEVEL' => 'Grupe korisnika koji mogu vidjeti cijene',
	'PHPSHOP_ADMIN_CFG_PRICE_ACCESS_LEVEL_TIP' => '�lanovi odabrane grupe i svih grupa iznad mogu vidjeti cijene proizvoda.',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_INCLUDINGTAX' => 'Prikazati (uklju�uju�i XX% poreza)',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_INCLUDINGTAX_TIP' => 'Kada je ovo uklju�eno, kupci �e vidjeti tekst "(uklju�uju�i XX% poreza)" uz cijene koje su prikazane s uklju�enim porezom.',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_PACKAGING_PRICELABEL' => 'Prikazati cijenu Pakovanja',
	'PHPSHOP_ADMIN_CFG_PRICE_SHOW_PACKAGING_PRICELABEL_TIP' => 'Ako je ovo uklju&#269;eno cijena &#263;e biti izra&#269;unata iz vrijednosti jedinice proizvoda i komada u Pakovanju:<br/>
<strong>Cijena po jedinici (10 komada)</strong><br/>
Ako je ovo isklju&#269;eno cijene se prikazuju normalno: <strong>Cijena: $xx.xx</strong>',
	'PHPSHOP_ADMIN_CFG_MORE_CORE_SETTINGS' => 'Dodatne Postavke',
	'PHPSHOP_ADMIN_CFG_CORE_SETTINGS' => 'Dodatne Postavke',
	'PHPSHOP_ADMIN_CFG_FRONTEND_FEATURES' => 'Frontend Postavke',
	'PHPSHOP_ADMIN_CFG_TAX_CONFIGURATION' => 'Konfiguracija Poreza',
	'PHPSHOP_ADMIN_CFG_USER_REGISTRATION_SETTINGS' => 'Postavke Registracije Korisnika',
	'PHPSHOP_ADMIN_CFG_ALLOW_REGISTRATION' => 'Dozvoliti registraciju novih korisnika?',
	'PHPSHOP_ADMIN_CFG_ACCOUNT_ACTIVATION' => 'Potrebna aktivacija novih korisnika?',
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