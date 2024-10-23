<?php

declare(strict_types=1);

namespace App\Factories;

use App\Contracts\AttributeValueContract;
use App\Enums\AttributeType;
use App\Models\BooleanAttribute;
use App\Models\DateAttribute;
use App\Models\NumericAttribute;
use App\Models\StringAttribute;
use Illuminate\Database\Eloquent\Model;

class AttributeValueModelFactory
{
    /**
     *
     * @param AttributeType $type
     * @return Model
     */
    public static function getModel(AttributeType $type): Model&AttributeValueContract
    {
        return match ($type) {
            AttributeType::TEXT => new StringAttribute(),
            AttributeType::BOOLEAN => new BooleanAttribute(),
            AttributeType::DATE => new DateAttribute(),
            AttributeType::NUMERIC => new NumericAttribute(),
        };
    }
}

