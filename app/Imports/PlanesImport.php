<?php

namespace App\Imports;

use App\Models\Plan as ModelsPlan;
use App\Plan;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;

class PlanesImport implements ToModel,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ModelsPlan([
            // 'tipoequipo_id'=>$row[0],
            'id_plan'=>$row[0],
            'descripcion'=>$row[1],
            'cant_megas'=>$row[2],
            'vel_subida'=>$row[3],
            
            'vel_bajada'=>$row[4],
            'canon'=>$row[5],
            'globaal'=>$row[6],
        ]);
    }
    public function rules(): array
    {
        return [
            '0'=>['unique:plans,id_plan'], 
            '5'=>['required'],
            '4'=>['required'],
            '5'=>['required'],
            '6'=>['required'],           
        ];
    }
}
