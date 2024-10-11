<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Thiago',
                    'email' => 'thiago@tdex.com',
                    'password' => bcrypt('abc123456'),
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Felipera',
                    'email' => 'felipe@tdex.com',
                    'password' => bcrypt('abc123456'),
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Caio',
                    'email' => 'caio@tdex.com',
                    'password' => bcrypt('abc123456'),
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Beatriz',
                    'email' => 'beatriz@tdex.com',
                    'password' => bcrypt('abc123456'),
                    'created_at' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
