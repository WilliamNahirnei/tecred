<?php

namespace App\BO\Traits;

use App\Http\Requests\UserHasSystemRequest;
use App\Models\CustomModel;
use App\Resources\Traits\PrepareTrait;

/**
 * Category trait
 *
 */
trait CategoryTrait
{
    use PrepareTrait;

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $request
     * @return array
     */
    public function prepareStore(array $request)
    {
        $requestObject              = $request['request'];
        $classObject                = $request['object'];

        $returnArray = [
            'nameCategory'   => $requestObject->nameCategory ?? $classObject->nameCategory,
            'statusCategory' => 1
        ];

        return array_filter($returnArray);
    }

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $params
     * @return array
     */
    public function prepareUpdate(array $request)
    {
        $requestObject              = $request['request'];
        $classObject                = $request['object'];

        $returnArray = [
            'nameCategory'   => $requestObject->nameCategory ?? $classObject->nameCategory,
        ];

        return $returnArray;
    }

    /**
     * this method prepare data to disable category
     */
    public function prepareDisable()
    {
        return ['statusCategory' => CustomModel::RECORD_STATUS_INACTIVE];
    }

    /**
     * this method prepare data to enable category
     */
    public function prepareEnable()
    {
        return ['statusCategory' => CustomModel::RECORD_STATUS_ACTIVE];
    }
}
