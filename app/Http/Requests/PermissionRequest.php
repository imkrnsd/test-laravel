<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->routeIs('permissions.store')) {
            $id = 'required|numeric|between:1,100000|unique:permissions,id';
            $name = 'required|string|alpha_dash|between:2,50|unique:permissions,name';
        } elseif (request()->routeIs('permissions.update')) {
            $id = [
                'required',
                'numeric',
                'between:1,100000',
                Rule::unique('permissions', 'id')->ignore($this->id)
            ];
            $name = [
                'required',
                'string',
                'alpha_dash',
                'between:2,50',
                Rule::unique('permissions', 'name')->ignore($this->id)
            ];
        }

        return [
            'id' => $id,
            'name' => $name,
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama akses',
        ];
    }

    public function getValidatorInstance()
    {
        $this->reformatName();
        return parent::getValidatorInstance();
    }

    public function reformatName()
    {
        if ($this->request->has('name')) {
            $this->merge(['name' => str_replace(' ', '_', strtolower($this->request->get('name')))]);
        }
    }
}
