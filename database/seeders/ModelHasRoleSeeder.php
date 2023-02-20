<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model_has_role_sql = base_path('database/sql/model_has_role.sql');

        DB::unprepared(
            file_get_contents($model_has_role_sql)
        );
    }
}
