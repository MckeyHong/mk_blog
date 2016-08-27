<?php

use Illuminate\Database\Seeder;
use App\Services\Registrar;
class UserSeeder extends Seeder{
    public function run(){
        $data = [
            'name' => '管理員',
            'email' => 'pnv200414@hotmail.com',
            'password' =>'3edcvfr4',
            'desc'=>'管理員'
        ];
        $register = new Registrar();
        $register->create($data);
    }
}