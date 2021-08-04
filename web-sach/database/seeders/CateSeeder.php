<?php

namespace Database\Seeders;

use App\Models\Cate;
use Illuminate\Database\Seeder;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = new Cate();
        $cate->name = 'Comedy';
        $cate->save();

        $cate = new Cate();
        $cate->name = 'Fantasy';
        $cate->save();

        $cate = new Cate();
        $cate->name = 'Action';
        $cate->save();

        $cate = new Cate();
        $cate->name = 'Sciencefiction';
        $cate->save();

        $cate = new Cate();
        $cate->name = 'Detective';
        $cate->save();
    }
}
