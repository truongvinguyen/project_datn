<?php

/**
 * Global constants
 *
 */

/**
 * Account's roles
 * (Phân quyền tài khoản)
 * (!) usage example:  _ROLE::EMPLOYEE
 */
final class _ROLE
{
	public const OWNER = 4;		/*	Chủ sở hữu	*/
	public const DIRECTOR = 3;	/*	Giám đốc	*/
	public const MANAGER = 2;	/*	Quản lý	*/
	public const EMPLOYEE = 1;	/*	Nhân viên	*/
	public const CUSTOMER = 0;	/*	Khách hàng	*/
}

/**
 * Account's permissions
 * (Các quyền hạn tài khoản)
 * (!) usage example:  _ROLE::EMPLOYEE
 */
final class _PERMISSION
{
	public const ARTICLE_VIEW = 'ARTICLE_VIEW';
	public const ARTICLE_MANAGE = 'ARTICLE_MANAGE';
	public const ARTICLE_VIEW = 'ARTICLE_VIEW';
	public const ARTICLE_MANAGE = 'ARTICLE_MANAGE';
}

/**
 * Status of a data element
 * (Trạng thái được tuỳ chỉnh của một dữ liệu)
 * (!) usage example:  _STATUS::ACTIVED
 */
final class _STATUS
{
	public const PENDING = 2;	/*	Chờ được phê duyệt	*/
	public const ACTIVED = 1;	/*	Hiện (Được kích hoạt)	*/
	public const DISABLED = 0;	/*	Ẩn	*/
	public const DELETED = -1;	/*	Đã xoá {*unnecessary}	*/

	public const ACCEPTED = 0;	/*	Được chấp thuận	*/
	public const REJECTED = 1;	/*	Bị từ chối	*/
}

/**
 * State of a data element
 * (Trạng thái vốn có của một dữ liệu)
 * (!) usage example:  _STATE::NORMAL
 */
final class _STATE
{
	public const HOT = 2;
	public const NORMAL = 1;
	public const NEW = 0;
}

/**
 * Image dir paths
 * (Đường dẫn thư mục hình ảnh)
 * (!) usage example:  _IMAGE::USER
 */
final class _IMAGE
{
	public const USER = '/upload/user/';
	public const PRODUCT = '/upload/product/';
	public const CATEGORY = '/upload/category/';
	public const BRAND = '/upload/brand/';
	public const ARTICLE = '/upload/article/';
}

/**
 * File/dir paths
 * (Đường dẫn file/thư mục)
 * (!) usage example:  _PATH::JS
 */
final class _PATH
{
	public const CSS = '';
	public const JS = '';
	public const CSS_PRODUCT = '';
	public const JS_PRODUCT = '';
	public const CSS_USER = '';
	public const JS_USER = '';
	public const CSS_CATEGORY = '';
	public const JS_CATEGORY = '';
}
