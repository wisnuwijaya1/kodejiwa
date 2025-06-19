<?php

namespace Database\Seeders;

use App\Models\Posts;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function getFakeData($faker)
    {
        $paragraphs = rand(8, 15);
        $i = 0;
        $ret = "";
        while ($i < $paragraphs) {
            $ret .=  $faker->paragraph(rand(2, 6)) ;
            $i++;
        }
        return $ret;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 250 ; $i++) {            
            $dt = new Posts();
            $dt->title = $faker->sentence();
            $dt->slug = Str::slug($dt->title, '-');
            $dt->html = $this->getFakeData($faker);
            $dt->status = 'publish';
            $dt->published_at = $faker->dateTimeBetween();
            $dt->save();
        }
    }
}