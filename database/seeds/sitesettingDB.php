<?php

use Illuminate\Database\Seeder;
use App\SitSetting;
class sitesettingDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $add = new SitSetting;
            $add->namesetting = 'namesetting' . rand(0, 9);
            $add->slug = 'slug' . +$i . 'slug';
            $add->type = '1';
            $add->value = 'value' .rand(0,9);
            $add->save();
        }
    }
}
