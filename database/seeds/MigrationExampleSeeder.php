<?php

use Illuminate\Database\Seeder;

class MigrationExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('migration_example')->insert([
            'integer_number' => 123
        ]);
    }
}
