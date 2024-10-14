<?php

namespace App\Constants;

/**
 * Global constants for app
 */
class Constants
{
    /*Alert status*/
    const ALERT_SUCCESS = 'Thành công';
    const ALERT_FAILED = 'Thất bại';

    /*User type*/
    const ADMIN_USER_TYPE = 'admin';
    const STANDARD_USER_TYPE = 'standard';
    const PREMIUM_USER_TYPE = 'premium';

    /*User status*/
    const ACTIVE_USER_STATUS = 'active';
    const INACTIVE_USER_STATUS = 'inactive';

    /*Transaction status*/
    const VERIFIED_TRANSACTION_STATUS = 'Đã xác minh';
    const UNVERIFIED_TRANSACTION_STATUS = 'Chưa xác minh';
    const INVALID_TRANSACTION_STATUS = 'Không hợp lệ';
}
