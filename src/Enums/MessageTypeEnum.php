<?php
namespace Sanmtos\Chat\Enums;

use  Sanmtos\Chat\Traits\HasEnumStaticMethods;

enum MessageTypeEnum:string
{
    use HasEnumStaticMethods;

    case Audio = 'audio';
    case File = 'file';
    case Text = 'text';
}