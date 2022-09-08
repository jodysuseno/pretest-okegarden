<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'User',
                'email'=>'user@mail.com',
                'role'=>'user',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Gardener',
                'email'=>'gardener@mail.com',
                'role'=> 'gardener',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Designer',
                'email'=>'designer@mail.com',
                'role'=>'designer',
                'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }

        $projects = [
            [
                'nama_project'=>'Tanam padi',
                'keterangan'=>'Project Kegiatan Pertanian',
                'status'=>1,
            ],
            [
                'nama_project'=>'Produksi Pupuk',
                'keterangan'=>'Project Kegiatan Pertanian',
                'status'=>1,
            ],
            [
                'nama_project'=>'Produksi hasil panen',
                'keterangan'=>'Project Kegiatan Pengelolaan',
                'status'=>1,
            ],
        ];

        foreach ($projects as $key => $project) {
            Project::create($project);
        }
    }
}
