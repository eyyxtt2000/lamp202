<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreFriendlyLink extends Request
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

            //链接标题必须填写，且唯一
            'title'=>'required | unique:friendlylinks',

            //链接地址必须填写
            'friendly_https'=>'required',

            //链接 图片必须填写 且格式正确
            'image'=>'required | image ',
        ];
    }

    //自定义错误信息
    public function messages()
    {
        return [
            'title.required'=>'请填写链接标题',
            'title.unique'=>'链接标题已存在',
            'friendly_https.required'=>'链接地址必须填写',
            'image.required'=>'请点击上传logo',
            'image.image'=>'请上传正确图片格式',
        ];
    }
}
