<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    /*
     * $table->increments("id");
            $table->char("name",255);
            $table->enum("status",["A","I"]);
            $table->date("due_date");
            $table->enum("account_type",["P","R","F"]);
            $table->double("value");
            $table->text("description");
            $table->char("tags",50);
            $table->char("financial_classification",255);
            $table->char("cost_center",255);

     * */
    //
    protected $table = 'financials';

    public $fillable = ['due_date', 'value', 'description', 'date_ini', 'project_id'];


    public function rules(){

    return [
        'name'                     => 'required',
        'status'                   => 'required',
        'due_date'                 => 'required|date',
        'account_type'             => 'required',
        'value'                    => 'required|numeric',
        'description'              => 'nullable',
        'tags'                     => 'required',
        'financial_classification' => 'required',
        'cost_center'              => 'required'
    ];
    }

    public function messages(){
        return [
            'name.required'            => 'Preencher o campo Nome.',
            'status.required'          => 'Selecionar o status da conta.',
            'due_date.required'        => 'Preencher o campo Data de Vencimento.',
            'due_date.date'            => 'Data de Vencimento foi preenchida de forma incorreta.',
            'account_type.required'    => 'Selecionar o tipo da conta.',
            'value.required'           => 'Preencher o campo Valor.',
            'value.required.numeric'   => 'Valor foi preenchido de forma incorreta.',
            'tags.required'            => 'Preencher o campo Tags.',
            'financial_classification.required' => 'Preencher o campo Classificação financeira.',
            'cost_center.required'     => 'Preencher o campo Centro de Custo.'
        ];
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}