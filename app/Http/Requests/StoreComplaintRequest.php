<?php

namespace App\Http\Requests;

use App\Models\Complaint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreComplaintRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('complaint_create');
    }

    public function rules()
    {
        return [
            'numar_intrare' => [
                'string',
                'required',
            ],
            'data_intrare' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'modul_preluare' => [
                'required',
            ],
            'localitate' => [
                'string',
                'required',
            ],
            'reclamant' => [
                'string',
                'required',
            ],
            'tip_client' => [
                'required',
            ],
            'tip_document' => [
                'string',
                'required',
            ],
            'continut' => [
                'string',
                'required',
            ],
            'concluzia_analizarii' => [
                'required',
            ],
            'masuri' => [
                'string',
                'required',
            ],
            'termen' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_contact' => [
                'string',
                'required',
            ],
            'responsabil' => [
                'string',
                'required',
            ],
            'raspuns' => [
                'string',
                'nullable',
            ],
        ];
    }
}
