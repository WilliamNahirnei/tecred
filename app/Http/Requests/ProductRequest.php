<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRulesRequest;

class ProductRequest extends CustomRulesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return Bool
     */
    public function authorize(): Bool
    {
        return true;
    }

    /**
     * @return Array
     */
    public function validateDefault(): Array
    {
        return [
            // Your default validation
        ];
    }

    /**
     * @return Array
     */
    public function validateToStore(): Array
    {
        return [
            'nameProduct' => 'required|min:3|max:255',
            'quantityProduct' => 'required|integer|min:0',
            'idCategory' => 'required|exists:category,idCategory'
        ];
    }

    /**
     * @return Array
     */
    public function validateToUpdate(): Array
    {
        return [
            'nameProduct' => 'nullable|min:3|max:255',
            'quantityProduct' => 'nullable|integer|min:0',
            'idCategory' => 'nullabe|exists:category,idCategory'
        ];
    }

    /**
     * @return Array
     */
    public function validateToDestroy(): Array
    {
        return [
            // 'id' => 'required',
        ];
    }

    /**
     * @return Array
     */
    public function messages(): Array
    {
        return [
            // 'id.required' => 'O id é obrigatório!',
        ];
    }
}
