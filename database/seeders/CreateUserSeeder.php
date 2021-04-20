<?php

namespace Database\Seeders; //untuk akun khusus admin 

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'nisn'=> '1234567890',
        'jk' => 'perempuan',
        'tempat_lahir' => 'amsterdam',
        'tanggal_lahir' => '2004-08-18',
        'alamat' => 'Cipaok village',
        'no_hp' => '082110478135',
        'asal_sekolah' => 'SMP PGRI 1 Ciawi',
        'tahun_lulus' => '1945',
        'agama' => 'islam',
        'jurusan' => 'RPL',  
        'is_admin' => '1',  
        'password' => bcrypt('12345678'),
            
             ]
        ];
        foreach($user as $key => $val) //menggunakan tb user untuk memasukan isi diatas dan jika atasnya dolar maka harus ada foreach
        {
            User::create($val); 
        }
    }
}
