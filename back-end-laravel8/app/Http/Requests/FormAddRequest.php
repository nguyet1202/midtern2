<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Name'=>'required|max:300|string',
            'Promotion Price'=>'required|numeric|min:10000',
            'Unit Price'=>'required|numeric|min:10000',
            'Description'=>'required|string',
            'Type'=>'required|string',
            'Image file'=>'required|filled|image|mimes:jpeg,png,jpg,gif,svg|max:25000',
        ];
 
    }
    public function messages()
    {
        return [
            'Name.required'=>'Bạn chưa nhập tên bánh',
            'Name.max'=>'Tên bánh chỉ có tối đa 300 ký tự',
            'Description.required'=>'Bạn chưa nhập mô tả phòng',
            'Promotion Price.required'=>'Bạn chưa nhập giá khuyến mãi',
            'Promotion Price.min'=>'Giá khuyến mãi phải lớn hơn 100000 đ',
            'Unit.required'=>'Bạn chưa nhập thông tin',
            'Unit.min'=>'Giá phải lớn hơn 100000 đ',
            'Type.required'=>'Bạn chưa nhập thông tin',
            'Type.string'=>'vui long kiem tra lai ',
            'Image file.required'=>'Bạn chưa chọn ảnh',
            'Image file.filled'=>'Bạn chưa chọn ảnh',
            'Image file.max'=>'Kích thước ảnh tối đa là 25Mb',
            'Image file.image'=>'File bạn upload không phải ảnh'
        ];
    }
}