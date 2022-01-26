<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NumberTypesModel;

class NumberTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['id' => 1, 'type' => 'Mobile'],
            ['id' => 2, 'type' => 'Home'],
        ];

        foreach($types as $type){
            if(NumberTypesModel::query()->where('type',$type['type'])->exists()){
               continue; 
            }else{
                NumberTypesModel::create($type);
            }
        }
    }
}
