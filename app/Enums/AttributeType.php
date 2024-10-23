<?php

namespace App\Enums;

enum AttributeType: string
{
    case TEXT = 'text';
    case DATE = 'date';
    case BOOLEAN = 'boolean';
    case NUMERIC = 'numeric';
}
