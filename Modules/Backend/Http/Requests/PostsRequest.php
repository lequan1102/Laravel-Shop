<?php

namespace Modules\Backend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            '%title%' => 'sometimes|string',
            '%body%'  => 'sometimes|string',
        ];
        
        RuleFactory::make($rules);
        
    }
    // return RuleFactory::make([
    //     'translations.%title%' => 'required|string',
    // ]);
    public function messages()
	  {
  		return [
  			'%title%.required'         => 'Tiêu đề không được để trống',
  			'%body%.required'          => 'Nội dung không được để trống',
  		];
    }

}
