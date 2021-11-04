<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * hr company で使用
 * Class User
 * @package App\Enums
 */
final class HrCompany extends Enum
{
    const ROLES = [
        1 => 'Free',
        2 => 'Standard',
        3 => 'Premium',
    ];

    const ROLES_TEXT = [
        'Master'   => 1,
        'Standard' => 2,
        'Light'    => 3,
    ];

    const CONTRACT_TYPE = [
        '契約中',
        '解約済'
    ];
}
