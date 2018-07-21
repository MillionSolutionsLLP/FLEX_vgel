<?php

namespace B\NM\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class EditNews extends FormRequest
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




            $id=2;
            $conection=\B\NM\Base::getConnection($id);
            $table=\B\NM\Base::getTable($id);
            $key='UniqId';
            $rules="exists:".$conection.".".$table.",".$key;

         
         return [
            'UniqId'=>"required|".$rules,
            'NewsTitle'=>"required",
            'NewsContent'=>"required",
            'NewsDate'=>"required",
            'NewsDateExp'=>"required",



          
          
            ];

    }

    protected function formatErrors(Validator $validator)
{
    
    
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}