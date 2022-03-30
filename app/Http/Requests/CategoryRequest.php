<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRulesRequest;

class CategoryRequest extends CustomRulesRequest
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
            'nameCategory' => 'required|min:3|max:255',
        ];

    }

    /**
     * @return Array
     */
    public function validateToUpdate(): Array
    {
        return [
            // 'name' => 'max:60',
        ];
    }

    /**
     * @return Array
     */
    public function validateToDisable(): Array
    {
        return [
            'idCategory' => 'required',
        ];
    }

    /**
     * @return Array
     */
    public function messages(): Array
    {
        return [
            'idCategory.required' => 'id of category is required!',
            'nameCategory.required' => 'name of category is required',
            'nameCategory.min' => 'name of category need 3 or more caracters',
            'nameCategory.max' => 'name of category not suport more 255 caracters'
        ];
    }
}
