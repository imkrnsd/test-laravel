<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Models\Master\UnitKerja;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $unkerIds = implode(',', UnitKerja::aktif()->orderBy('id_unit_kerja')->pluck('id_unit_kerja')->toArray());
        $roleIds = implode(',', Role::orderBy('id')->pluck('id')->toArray());
        if (request()->routeIs('manajemen-user.store')) {
            $nrik = 'required|digits:8|unique:users,nrik';
            $email = 'required|email|unique:users,email';
        } elseif (request()->routeIs('manajemen-user.update')) {
            $nrik = [
                'required',
                'digits:8',
                Rule::unique('users', 'nrik')->ignore(dekrip($this->id))
            ];
            $email = [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(dekrip($this->id))
            ];
        }

        return [
            'id_role' => "required|array|min:1|in:{$roleIds}",
            'id_role.*' => "required|numeric",
            'name' => 'required|regex:/^[a-zA-Z0-9.,\s]+$/',
            'nrik' => $nrik,
            'email' => $email,
            'tanggal_lahir' => 'nullable|date',
            'id_unit_kerja' => "required|numeric|in:{$unkerIds}",
        ];
    }

    public function attributes()
    {
        return [
            'id_role' => 'Role',
            'name' => 'Nama',
            'nrik' => 'NRIK',
            'email' => 'Email',
            'tanggal_lahir' => 'Tanggal lahir',
            'id_unit_kerja' => 'Unit kerja',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => ':attribute hanya bisa diisi menggunakan huruf, titik, koma dan/atau spasi saja.'
        ];
    }
}
