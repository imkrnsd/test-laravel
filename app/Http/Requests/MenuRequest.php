<?php

namespace App\Http\Requests;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
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
        $roleIds = implode(',', Role::orderBy('id')->pluck('id')->toArray());
        $menuIds = implode(',', Menu::orderBy('id')->pluck('id')->toArray());
        if (request()->routeIs('menus.store')) {
            $id = 'required|numeric|between:1,100000|unique:menus,id';
            $name = 'required|string|between:2,50|unique:menus,name|regex:/^[a-zA-Z0-9\s]+$/';
        } elseif (request()->routeIs('menus.update')) {
            $id = [
                'sometimes',
                'numeric',
                'between:1,100000',
                Rule::unique('menus', 'id')->ignore(dekrip($this->id))
            ];
            $name = [
                'required',
                'string',
                'between:2,50',
                'regex:/^[a-zA-Z0-9\s]+$/',
                Rule::unique('menus', 'name')->ignore(dekrip($this->id))
            ];
        }

        return [
            'id' => $id,
            'name' => $name,
            'route' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'order' => 'required|numeric|min:1',
            'parent_id' => "required|numeric|min:0|in:0,{$menuIds}",
            'roles' => "required|array|min:1|in:{$roleIds}",
            'roles.*' => "required|numeric",
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nama menu',
            'route' => 'Route',
            'icon' => 'Icon',
            'order' => 'Order',
            'roles' => 'Role',
            'parent_id' => 'Parent',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'Nama menu hanya boleh diisi menggunakan huruf, angka atau spasi saja.'
        ];
    }
}
