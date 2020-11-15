<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'role' => "admin",
            'name'  => "MOH. SHOLIHUL FAUZAN",
            'email' => 'fauzan@ashid.com',
            'password'  => bcrypt('secret'),
            'remember_token' => Str::random(60)
        ]);

        \App\User::create([
            'role' => "admin",
            'name'  => "SAIFUR RIFQI ALI",
            'email' => 'ali@ashid.com',
            'password'  => bcrypt('secret'),
            'remember_token' => Str::random(60)
        ]);

        \App\User::create([
            'role' => "admin",
            'name'  => "ZIHAN MUHAMMAD AL GHIFARI I. Z",
            'email' => 'egik@ashid.com',
            'password'  => bcrypt('secret'),
            'remember_token' => Str::random(60)
        ]);

        \App\User::create([
            'role' => "admin",
            'name'  => "MUHAMMAD SADLI MUSHTHAFA",
            'email' => 'sadli@ashid.com',
            'password'  => bcrypt('secret'),
            'remember_token' => Str::random(60)
        ]);

        \App\User::create([
            'role' => "admin",
            'name'  => "MYLIAN GEDHE",
            'email' => 'mylian@ashid.com',
            'password'  => bcrypt('secret'),
            'remember_token' => Str::random(60)
        ]);

        \App\User::create([
            'role' => "admin",
            'name'  => "KHAMIM THOHARI WAKHID",
            'email' => 'khamim@ashid.com',
            'password'  => bcrypt('secret'),
            'remember_token' => Str::random(60)
        ]);

        \App\User::create([
            'role' => "users",
            'name'  => "AINI",
            'email' => 'aini@gmail.com',
            'password'  => bcrypt('mylian214'),
            'remember_token' => Str::random(60)
        ]);
    }
}
