<?php

use Illuminate\Database\Seeder;
use App\Services\Migrator;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resolve = new Migrator;
        // $resolve->berita();
        $resolve->dokumenakademik();
    }
}
