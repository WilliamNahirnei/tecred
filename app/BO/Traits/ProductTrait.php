<?php

namespace App\BO\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\UserHasSystemRequest;
use App\Models\CustomModel;
use App\Resources\Traits\PrepareTrait;

/**
 * Product trait
 *
 */
trait ProductTrait
{
    use PrepareTrait;

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $params
     * @return void
     */
    public function prepareStore(array $params)
    {
        $requestObject              = $params['request'];
        $classObject                = $params['object'];

        $returnArray = [
            'nameProduct'     => $requestObject->nameProduct ?? $classObject->nameProduct,
            'quantityProduct' => $requestObject->quantityProduct ?? $classObject->quantityProduct,
            'statusProduct'   => CustomModel::RECORD_STATUS_ACTIVE,
            'idCategory'      => $requestObject->idCategory ?? $classObject->idCategory
        ];

        return array_filter($returnArray);
    }

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $params
     * @return void
     */
    public function prepareUpdate(array $params)
    {
        $requestObject              = $params['request'];
        $classObject                = $params['object'];

        $returnArray = [
            'nameProduct'     => $requestObject->nameProduct ?? $classObject->nameProduct,
            'quantityProduct' => $requestObject->quantityProduct ?? $classObject->quantityProduct,
            'idCategory'      => $requestObject->idCategory ?? $classObject->idCategory
        ];

        return $returnArray;
    }

    /**
     * this method prepare data to disable category
     */
    public function prepareDisable()
    {
        return ['statusProduct' => CustomModel::RECORD_STATUS_INACTIVE];
    }

    /**
     * this method prepare data to enable category
     */
    public function prepareEnable()
    {
        return ['statusProduct' => CustomModel::RECORD_STATUS_ACTIVE];
    }
}
