<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return string
     */
    public function generateRandomfirststring($length=10)
    {
        $firststring=array("陳","林","黃","張","李","王","吳","劉","蔡","楊","許","鄭","謝","郭","洪","曾","邱","廖","賴");
        $randomfirst='';
        $randomfirst .= $firststring[rand(0,18)];
        return $randomfirst;
    }

    public function generateRandomsecondstring($length=10)
    {
        $secondstring=array("怡","珠","文","婷","雅","佳","君","俊","嘉","家","宏");
        $randomsecond='';
        $randomsecond .=$secondstring[rand(0, 9)];
        return $randomsecond;
    }
    public function generateRandomlaststring($length=10)
    {
        $laststring=array("珠","芃","杏","川","梓","武","苑","藝","孜","然");
        $randomlast='';
        $randomlast .= $laststring[rand(0,9)];
        return $randomlast;
    }
    public function generateRandomTname()
    {
        $first_name =$this->generateRandomfirststring(rand(2,15));
        $second_name=$this->generateRandomsecondstring(rand(2,10));
        $last_name=$this->generateRandomlaststring(rand(2,10));
        $T_name=$first_name.$second_name.$last_name;
        return  $T_name;
    }
    public function generatestring($length =10)
    {
        $numbers='0123456789';
        $randomstring='';
        $numbersLength=strlen($numbers);
        for($i=0;$i<4;$i++)
            $randomstring .=$numbers[rand(0,$numbersLength-1)];
        return $randomstring;
    }
    public function generateRandomphone()
    {
        $first_number =$this->generatestring(rand(0,5));
        $last_number =$this->generatestring(rand(5,9));
        $phone =$first_number . $last_number;
        return $phone;
    }
    public  function generateRandomAID()
    {
        $first_number=$this->generatestring(rand(0,1));
        $second_number=$this->generatestring(rand(0,1));
        $A_ID=$first_number.$second_number;
        return $A_ID;
    }
    public function run()
    {
        //
        for($i=0;$i<61;$i++)
        {
       $T_name=$this->generateRandomTname();
        $phone=$this->generateRandomphone();
        $random_datetime =Carbon::now()->subMinutes(rand(1,55));
        DB::table('tenants')->insert(
            [
                'T_name'=>$T_name,
                'phone'=>$phone,
                'created_at'=>$random_datetime,
                'updated_at'=>$random_datetime,

            ]);
        }
    }
}
