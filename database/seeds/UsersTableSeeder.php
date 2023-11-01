<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pegawai;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert user pertama
        $user= new User;
        $user->id_user_pegawai = '3';
        $user->username = 'yuwan';
        $user->password = Hash::make('12345');
        $user->save();

        //insert juga ke relasinya 
        $pegawai = Pegawai::where('id', 2)->first();
        $user->$pegawai()->associate($pegawai);
        $user->save();

    }
}
