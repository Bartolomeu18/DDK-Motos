<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email','bartolomeunhongo@gmail.com')->first()){
            User::create([
                'name' => 'Bartolomeu Nhongo Sebastião',
                'email' => 'bartolomeunhongo@gmail.com',
                'telefone' => '937812687',
                'bi_passaporte' => '02007792LA050' ,
                'endereco' => 'Talatona/Luanda',
                'password'=> 'eu_MasterUser01',
                'role' => 'Admin',
            ]);
        }
    }
}
