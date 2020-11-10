<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
          'titulo' => 'required',
          'descricao' => 'required',
          'data' => 'required',
          'cidade' => 'required',
          'categoria_id' => 'required',
        ];
    }
    public function messages() {
      return [
        'required' => ':attribute deve ser preenchido'
      ];
    }

    public function attributes() {
      return[
        'titulo' => 'Título',
        'descricao' => 'Descrição',
        'data' => 'Data',
        'cidade' => 'Cidade',
        'categoria_id' => 'Categoria',
      ];
    }
}
