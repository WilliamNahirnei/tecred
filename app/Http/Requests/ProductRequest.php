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
            'nameProduct'     => 'required|min:3|max:255',
            'quantityProduct' => 'required|integer|min:0',
            'idCategory'      => 'required|exists:category,idCategory'
        ];
    }

    /**
     * @return Array
     */
    public function validateToUpdate(): Array
    {
        return [
            'nameProduct'     => 'min:3|max:255',
            'quantityProduct' => 'integer|min:0',
            'idCategory'      => 'exists:category,idCategory'
        ];
    }

    /**
     * @return Array
     */
    public function validateToDisable(): Array
    {
        return [
            'idProduct' => 'required',
        ];
    }

    /**
     * @return Array
     */
    public function validateToenable(): Array
    {
        return [
            'idProduct' => 'required',
        ];
    }

    /**
     * @return Array
     */
    public function messages(): Array
    {
        return [
            'idProduct.required'       => 'id of product is required!',
            'idCategory.required'      => 'id category is required',
            'nameProduct.required'     => 'name of product is required',
            'nameProduct.min'          => 'name of product need 3 or more caracters',
            'nameProduct.max'          => 'name of product not suport more 255 caracters',
            'quantityProduct.required' => 'quantity product is required',
            'quantityProduct.integer'  => 'quantity product need integer value',
            'quantityProduct.min'      => 'quantity product need zero or positive value',
        ];
    }
}
