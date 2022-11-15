<?php

use Illuminate\Database\Seeder;
use App\User;
class userDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 60; $i++) {
            $add = new User;
            $add->id=$i+1;
            $add->name = 'name' . rand(0, 9);
            $add->email = 'ibrahim' . +$i . '@gmail.com';
            $add->password = '123456789';
            $add->admin = '0';
            $add->save();
        }
    }
}
