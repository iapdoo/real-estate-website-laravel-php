<?php

use Illuminate\Database\Seeder;
use App\Bu;
class buDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0;$i<60;$i++) {
            $add = new Bu;
            if ($i <= 10) {
                $add->bu_name = 'شقه ايجار';
            } elseif ($i > 10 && $i <= 20) {
                $add->bu_name = 'شاليه ايجار';
            } elseif ($i > 20 && $i <= 30) {
                $add->bu_name = 'فيله ايجار';
            } elseif ($i > 30 && $i <= 40) {
                $add->bu_name = 'شقه تمليك';
            } elseif ($i > 40 && $i <= 50) {
                $add->bu_name = 'فيله تمليك';
            } elseif ($i > 50 && $i <= 60) {
                $add->bu_name = 'شاليه تمليك';
            }

            $add->bu_price = '100' . rand(0, 9);
            if ($i <= 30) {
                $add->bu_rant = 'ايجار';
            } else
                $add->bu_rant = 'تمليك';
            $add->bu_square = '150' . +$i . rand(0, 9);
            if ($i <= 10 || ($i > 30 && $i <= 40)) {
                $add->bu_type = 'شقه';
            } elseif (($i > 10 && $i <= 20) || ($i > 50 && $i <= 60)){
                $add->bu_type='شاليه';
            }elseif (($i > 20 && $i <= 30 )||($i > 40 && $i <= 50 )){
                $add->bu_type='فيله';
            }

            $add->bu_small_dis='عقار جاهز بكل الامكانيات ';
            if ($i <= 10) {
                $add->bu_meta = 'شقه ايجار';
            } elseif ($i > 10 && $i <= 20) {
                $add->bu_meta = 'شاليه ايجار';
            } elseif ($i > 20 && $i <= 30) {
                $add->bu_meta = 'فيله ايجار';
            } elseif ($i > 30 && $i <= 40) {
                $add->bu_meta = 'شقه تمليك';
            } elseif ($i > 40 && $i <= 50) {
                $add->bu_meta = 'فيله تمليك';
            } elseif ($i > 50 && $i <= 60) {
                $add->bu_meta = 'شاليه تمليك';
            }
            $add->bu_langtude='10'.+ $i.rand(0,9);
            $add->bu_latetude='10'.+ $i.rand(0,9);
            $add->bu_large_dis= 'عقار جيد سعر مناسب ';
            $add->bu_status='مفعل';
            $add->bu_rooms= rand(2,32);
            $add->user_id='10'.rand(0,50);
            $add->bu_place=rand(0,25);
            $add->photo='';
            $add->save();


        }
    }
}
