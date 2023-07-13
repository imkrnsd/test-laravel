<?php

namespace App\Http\Requests;

use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        $permissionNames = implode(',', Permission::orderBy('name')->pluck('name')->toArray());
        $menuIds = implode(',', Menu::orderBy('id')->pluck('id')->toArray());
        if (request()->routeIs('roles.store')) {
            $id = 'required|numeric|between:1,100|unique:roles,id';
            $name = 'required|string|between:2,50|unique:roles,name|regex:/^[a-zA-Z0-9\s]+$/';
        } elseif (request()->routeIs('roles.update')) {
            $id = [
                'sometimes',
                'numeric',
                'between:1,100',
                Rule::unique('roles', 'id')->ignore(dekrip($this->id))
            ];
            $name = [
                'required',
                'string',
                'between:2,50',
                'regex:/^[a-zA-Z0-9\s]+$/',
                Rule::unique('roles', 'name')->ignore(dekrip($this->id))
            ];
        }

        return [
            'id' => $id,
            'name' => $name,
            'permissions' => "required|array|min:1|in:{$permissionNames}",
            'menus' => "required|array|min:1|in:{$menuIds}",
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama role',
            'permissions' => 'Permission',
            'menus' => 'Menu',
        ];
    }

    public function messages()
    {
        return [
            'permissions.required' => 'Permission wajib dipilih minimal 1.',
            'menus.required' => 'Menu wajib dipilih minimal 1.',
            'name.regex' => 'Nama role hanya boleh diisi menggunakan huruf, angka atau spasi saja.'
        ];
    }
}
