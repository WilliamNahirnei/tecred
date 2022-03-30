<?php

namespace App\BO\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\UserHasSystemRequest;

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
     * @param Request $params
     * @return array
     */
    public function prepareStore(Request $request)
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
     * @param Request $params
     * @return array
     */
    public function prepareUpdate(Request $request)
    {
        $requestObject              = $request['request'];
        $classObject                = $request['object'];

        $returnArray = [];
        // $returnArray['users_id'] = $requestObject->users_id ?? $classObject->users_id;
        // $returnArray['name']     = $requestObject->name ?? $classObject->name;

        return $returnArray;
    }

    /**
     * this method prepare data to disable category
     */
    public function prepareDisable()
    {
        return ['statusCategory' => 0];
    }
}
