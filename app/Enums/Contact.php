<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * お問い合わせフォームで使用
 * Class User
 * @package App\Enums
 */
final class Contact extends Enum
{
    const CONTACT_TYPE = [
        1 => '導入について',
        2 => '機能について',
        3 => '料金、お見積りについて',
        4 => 'パートナーに関するお問い合わせについて',
        5 => 'お客様へのご提案について',
        6 => 'その他のお問い合わせ',
    ];

    const EMPLOYEE_COUNT = [
        1 => '1名以上 - 30名以下',
        2 => '31名以上 - 50名以下',
        3 => '51名以上 - 100名以下',
        4 => '101名以上 - 500名以下',
        5 => '501名以上 - 2000名以下',
        6 => '2001名以上'
    ];
}
