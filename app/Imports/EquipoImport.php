<?php

namespace App\Imports;

use App\Models\Equipo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class EquipoImport implements ToModel,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Equipo([
            // 'tipoequipo_id'=>$row[0],
            'codigo'=>$row[0],
            'serial'=>$row[1],
            'mac'=>$row[2],
            'estado'=>$row[3],
            
            'observacion'=>$row[4],
            'destino'=>$row[5],
           
        ]);
    }
    public function rules(): array
    {
        return [
            '2'=>['unique:equipos,mac'],
            '0'=>['unique:equipos,codigo'],
            '1'=>['unique:equipos,serial'],
            
        ];
    }
}
