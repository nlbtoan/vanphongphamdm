<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version : vietnamese.php 1071 2007-12-03 08:42:28Z thepisu $
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
	'CHARSET' => 'UTF-8',
	'PHPSHOP_USER_FORM_FIRST_NAME' => 'Tên họ',
	'PHPSHOP_USER_FORM_LAST_NAME' => 'Tên đệm',
	'PHPSHOP_USER_FORM_MIDDLE_NAME' => 'Tên',
	'PHPSHOP_USER_FORM_COMPANY_NAME' => 'Tên công ty',
	'PHPSHOP_USER_FORM_ADDRESS_1' => 'Địa chỉ 1',
	'PHPSHOP_USER_FORM_ADDRESS_2' => 'Địa chỉ 2',
	'PHPSHOP_USER_FORM_CITY' => 'Thành phố',
	'PHPSHOP_USER_FORM_STATE' => 'Quận/huyện/vùng',
	'PHPSHOP_USER_FORM_ZIP' => 'Zip/ Mã bưu điện',
	'PHPSHOP_USER_FORM_COUNTRY' => 'Quốc gia',
	'PHPSHOP_USER_FORM_PHONE' => 'Điện thoại',
	'PHPSHOP_USER_FORM_PHONE2' => 'Mobile',
	'PHPSHOP_USER_FORM_FAX' => 'Fax',
	'PHPSHOP_ISSHIP_LIST_PUBLISH_LBL' => 'Kích hoạt',
	'PHPSHOP_ISSHIP_FORM_UPDATE_LBL' => 'Phương pháp xác định cấu hình giao hàng',
	'PHPSHOP_STORE_FORM_FULL_IMAGE' => 'Xem hình đầy đủ',
	'PHPSHOP_STORE_FORM_UPLOAD' => 'Tải ảnh lên',
	'PHPSHOP_STORE_FORM_STORE_NAME' => 'Tên cửa hàng',
	'PHPSHOP_STORE_FORM_COMPANY_NAME' => 'Tên cửa hàng công ty',
	'PHPSHOP_STORE_FORM_ADDRESS_1' => 'Địa chỉ 1',
	'PHPSHOP_STORE_FORM_ADDRESS_2' => 'Địa chỉ 2',
	'PHPSHOP_STORE_FORM_CITY' => 'Thành phố',
	'PHPSHOP_STORE_FORM_STATE' => 'Quận/huyện/vùng',
	'PHPSHOP_STORE_FORM_COUNTRY' => 'Quốc gia',
	'PHPSHOP_STORE_FORM_ZIP' => 'Zip/Mã bưu điện',
	'PHPSHOP_STORE_FORM_CURRENCY' => 'tiền tệ',
	'PHPSHOP_STORE_FORM_LAST_NAME' => 'Tên đệm',
	'PHPSHOP_STORE_FORM_FIRST_NAME' => 'Tên họ',
	'PHPSHOP_STORE_FORM_MIDDLE_NAME' => 'Tên',
	'PHPSHOP_STORE_FORM_TITLE' => 'Chức danh',
	'PHPSHOP_STORE_FORM_PHONE_1' => 'Điện thoại 1',
	'PHPSHOP_STORE_FORM_PHONE_2' => 'Điện thoại 2',
	'PHPSHOP_STORE_FORM_DESCRIPTION' => 'Mô tả',
	'PHPSHOP_PAYMENT_METHOD_LIST_LBL' => 'Danh sách phương thức thanh toán',
	'PHPSHOP_PAYMENT_METHOD_LIST_NAME' => 'Tên',
	'PHPSHOP_PAYMENT_METHOD_LIST_CODE' => 'Mã',
	'PHPSHOP_PAYMENT_METHOD_LIST_SHOPPER_GROUP' => 'Nhóm Shopper',
	'PHPSHOP_PAYMENT_METHOD_LIST_ENABLE_PROCESSOR' => 'Cách thanh toán',
	'PHPSHOP_PAYMENT_METHOD_FORM_LBL' => 'Form cách thanh toán',
	'PHPSHOP_PAYMENT_METHOD_FORM_NAME' => 'Tên cách thanh toán',
	'PHPSHOP_PAYMENT_METHOD_FORM_SHOPPER_GROUP' => 'Nhóm Shopper',
	'PHPSHOP_PAYMENT_METHOD_FORM_DISCOUNT' => 'Bớt tiền',
	'PHPSHOP_PAYMENT_METHOD_FORM_CODE' => 'Mã',
	'PHPSHOP_PAYMENT_METHOD_FORM_LIST_ORDER' => 'Danh sách đơn hàng',
	'PHPSHOP_PAYMENT_METHOD_FORM_ENABLE_PROCESSOR' => 'Thanh toán tiền bằng',
	'PHPSHOP_PAYMENT_FORM_CC' => 'Thẻ tín dụng',
	'PHPSHOP_PAYMENT_FORM_USE_PP' => 'Sử dụng xử lý thanh toán',
	'PHPSHOP_PAYMENT_FORM_BANK_DEBIT' => 'Ghi nợ ngân hàng',
	'PHPSHOP_PAYMENT_FORM_AO' => 'Địa chỉ / Tiền mặt trên Phân Phối',
	'PHPSHOP_STATISTIC_STATISTICS' => 'Thống kê',
	'PHPSHOP_STATISTIC_CUSTOMERS' => 'Khách hàng',
	'PHPSHOP_STATISTIC_ACTIVE_PRODUCTS' => 'Sản phẩm đã kích hoạt',
	'PHPSHOP_STATISTIC_INACTIVE_PRODUCTS' => 'Sản phẩm chưa kích hoạt',
	'PHPSHOP_STATISTIC_NEW_ORDERS' => 'Đơn hàng mới',
	'PHPSHOP_STATISTIC_NEW_CUSTOMERS' => 'Khách hàng mới',
	'PHPSHOP_CREDITCARD_NAME' => 'Tên Thẻ tín dụng',
	'PHPSHOP_CREDITCARD_CODE' => 'Mã ngắn',
	'PHPSHOP_YOUR_STORE' => 'Shop',
	'PHPSHOP_CONTROL_PANEL' => 'Bảng điều khiển',
	'PHPSHOP_CHANGE_PASSKEY_FORM' => 'Hiện / Thay đổi Mật khẩu / khóa Giao dịch',
	'PHPSHOP_TYPE_PASSWORD' => 'Xin vui lòng nhập Mật khẩu Thành viên của bạn',
	'PHPSHOP_CURRENT_TRANSACTION_KEY' => 'Hiện tại giao dịch chủ chốt',
	'PHPSHOP_CHANGE_PASSKEY_SUCCESS' => 'Giao dịch thành công chủ chốt đã được thay đổi.',
	'VM_PAYMENT_CLASS_NAME' => 'Tên lớp thanh toán',
	'VM_PAYMENT_CLASS_NAME_TIP' => '(ví dụ: <strong> ps_netbanx </ strong>): <br /> 
 mặc định: ps_payment <br /> 
 <i> Để trống nếu bạn không chắc chắn những gì để điền vào!</i>',
	'VM_PAYMENT_EXTRAINFO' => 'Thông tin Thanh toán thêm',
	'VM_PAYMENT_EXTRAINFO_TIP' => 'Được hiển thị trên đơn hàng Xác nhận Trang. Có thể là: HTML Mẫu Mã số của bạn từ thanh toán cung cấp dịch vụ, khách hàng hints để vv',
	'VM_PAYMENT_ACCEPTED_CREDITCARDS' => 'Chấp nhận loại thẻ tín dụng',
	'VM_PAYMENT_METHOD_DISCOUNT_TIP' => 'Bật giảm giá thành một khoản phí, sử dụng một phủ định giá trị đây (Ví dụ: <strong> -2,00 </ strong>).',
	'VM_PAYMENT_METHOD_DISCOUNT_MAX_AMOUNT' => 'Tối đa số tiền giảm giá',
	'VM_PAYMENT_METHOD_DISCOUNT_MIN_AMOUNT' => 'Tối thiểu số tiền giảm giá',
	'VM_PAYMENT_FORM_FORMBASED' => 'Hình thức dựa HTML (ví dụ: PayPal)',
	'VM_ORDER_EXPORT_MODULE_LIST_LBL' => 'Danh sách đơn hàng xuất ra',
	'VM_ORDER_EXPORT_MODULE_LIST_NAME' => 'Tên',
	'VM_ORDER_EXPORT_MODULE_LIST_DESC' => 'Mô tả',
	'VM_STORE_FORM_ACCEPTED_CURRENCIES' => 'Chấp nhận danh sách các loại ngoại tệ',
	'VM_STORE_FORM_ACCEPTED_CURRENCIES_TIP' => 'Danh sách này xác định tất cả các loại tiền tệ bạn chấp nhận khi người dân đang có mua một cái gì đó trong cửa hàng của bạn. <strong> Lưu ý: </ strong> Tất cả các loại tiền tệ được lựa chọn ở đây có thể được sử dụng tại khách sạn kiểm tra! Nếu bạn không muốn rằng, chỉ cần chọn loại tiền tệ của nước bạn (= mặc định).',
	'VM_EXPORT_MODULE_FORM_LBL' => 'Thêm đơn hàng xuất ra',
	'VM_EXPORT_MODULE_FORM_NAME' => 'Tên xuất ra',
	'VM_EXPORT_MODULE_FORM_DESC' => 'Mô tả',
	'VM_EXPORT_CLASS_NAME' => 'Loại tên xuất ra',
	'VM_EXPORT_CLASS_NAME_TIP' => '(ví dụ: <strong>ps_orders_csv</strong>): <br />mặc định: ps_xmlexport <br /> <i>Để trống nếu bạn không chắc chắn những gì để điền vào!</ i>',
	'VM_EXPORT_CONFIG' => 'Cấu hình Xuất nhập khẩu thêm ',
	'VM_EXPORT_CONFIG_TIP' => 'Mặt hàng xuất khẩu Xác định cấu hình cho người dùng xác định mô-đun, hàng xuất khẩu hoặc xác định bổ sung cấu hình. Mã số phải được hợp lệ PHP-code.',
	'VM_SHIPPING_MODULE_LIST_NAME' => 'Tên',
	'VM_SHIPPING_MODULE_LIST_E_VERSION' => 'Phiên bản',
	'VM_SHIPPING_MODULE_LIST_HEADER_AUTHOR' => 'Tác giả',
	'PHPSHOP_STORE_ADDRESS_FORMAT' => 'Định dạng địa chỉ cửa hàng',
	'PHPSHOP_STORE_ADDRESS_FORMAT_TIP' => 'Bạn có thể sử dụng sau đây giữ nơi đây',
	'PHPSHOP_STORE_DATE_FORMAT' => 'Định dạng ngày Cửa hàng',
	'VM_PAYMENT_METHOD_ID_NOT_PROVIDED' => 'Lỗi: Phương thức thanh toán không được cung cấp ID.',
	'VM_SHIPPING_MODULE_CONFIG_LBL' => 'Cấu hình module Vận chuyển',
	'VM_SHIPPING_MODULE_CLASSERROR' => 'Không thể instantiate Class {shipping_module}'
); 
$VM_LANG->initModule( 'store', $langvars );
?>