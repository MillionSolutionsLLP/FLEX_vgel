<?php

namespace B\TM\R;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class EditTender extends FormRequest
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
            $conection=\B\TM\Base::getConnection($id);
            $table=\B\TM\Base::getTable($id);
            $key='UniqId';
            $rules="exists:".$conection.".".$table.",".$key;

         
         return [
            'UniqId'=>"required|".$rules,
            'TenderTitle'=>"required",
            'TenderContent'=>"required",
            'TenderDate'=>"required",
            'TenderDateExp'=>"required",



          
          
            ];

    }

    protected function formatErrors(Validator $validator)
{
    
    
    return [
    'msg' => $validator->errors()  ,
   
    ];

   
}

}