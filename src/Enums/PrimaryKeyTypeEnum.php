<?php
namespace Sanmtos\Chat\Enums;

use  Sanmtos\Chat\Traits\HasEnumStaticMethods;

enum PrimaryKeyTypeEnum:string
{
    use HasEnumStaticMethods;

    case Integer = 'ingeter';
    case Uuid = 'uiid';
    case Ulid = 'ulid';
    case String = 'string';

}