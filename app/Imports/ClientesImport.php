<?php

namespace App\Imports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ClientesImport implements ToModel,WithValidation
{
    
   
    
    public function model(array $row)
    {
        // $inicio = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]);
        // $final = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[8]);

        return new Cliente([
           
            'ced'=>$row[0],
            'nombre'=>$row[1],
            'telefono'=>$row[2],
            'correo'=>$row[3],
            'municipio'=>$row[4],
            
            'calle'=>$row[5],
            'estrato'=>$row[6],
            // 'fecha_inicio'=>$row[7],
            // 'fecha_final'=>$row[8],
            'tipo_servicio'=>$row[7],

            'reuso'=>$row[8],
            'tecnologia'=>$row[9],
            'canon'=>$row[10],
            'estado'=>$row[11],

        ]);

    }

    public function rules(): array
        {
            return [
                '0'=>['unique:clientes,ced'],
                '3'=>['unique:clientes,correo'],
                
            ];
        }
}
