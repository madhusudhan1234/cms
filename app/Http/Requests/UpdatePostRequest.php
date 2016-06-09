<?php

namespace cms\Http\Requests;

use cms\Http\Requests\Request;

class UpdatePostRequest extends Request
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
        return [
            'title' => ['required'],
            'slug' => ['required'],
           // 'published_at' => ['date-format:y-m-d h:i:s'],
            'body' => ['required']
        ];
    }
}
