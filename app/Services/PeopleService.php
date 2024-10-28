<?php

namespace App\Services;

use App\Contracts\PeopleContract;
use App\Data\AttributeValueData;
use App\Data\PeopleData;
use App\Enums\AttributeType;
use App\Factories\AttributeValueModelFactory;
use App\Models\Attribute;
use App\Models\People;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PeopleService implements PeopleContract
{
    public function create(PeopleData $data): People
    {
        /** @var People $newPeople */
        $newPeople = People::create();

        /** @var AttributeValueData $attribute */
        foreach ($data->attributes as $attribute) {
            $attributeModel = AttributeValueModelFactory::getModel(
                AttributeType::from($attribute->attributeData->type)
            );

            $attributeModel->people()->associate($newPeople);
            $attributeModel->attribute()->associate(Attribute::find($attribute->attributeData->id));
            $attributeModel->value = $attribute->value;

            $attributeModel->save();
        }

        $newPeople->attributes = $newPeople->attributeValues();

        return $newPeople;
    }

    public function allByPaginate(): LengthAwarePaginator
    {
        $result = People::query()->paginate(4);

        foreach ($result->items() as $peopleItem) {
            $peopleItem->attributes = $peopleItem->attributeValues();
        }

        return $result;
    }

    public function getById(int $id): People
    {
        /** @var People $people */
        $people = People::findOrFail($id);

        $people->attributes = $people->attributeValues();

        return $people;
    }
}
