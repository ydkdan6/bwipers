<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            'description' => "Welcome to Simcherry Nigeria Limited, the proud home of CheriX Baby Wipes. With our headquarters nestled in the vibrant city of Port Harcourt, Nigeria, we are a diverse company engaged in various businesses, ranging from food to outdoor catering services and event management, to baby care products. At Simcherry, we are thrilled to introduce our latest offering to the Nigerian market – CheriX Baby Wipes. Crafted with utmost care, these wipes are specifically designed to pamper and protect your baby's delicate skin. Our commitment to excellence is reflected in every aspect of CheriX, from the premium materials used to the thoughtful infusion of moisture.",
            'short_des' => "Welcome to Simcherry Nigeria Limited, the proud home of CheriX Baby Wipes. With our headquarters nestled in the vibrant city of Port Harcourt, Nigeria, we are a diverse company engaged in various businesses, ranging from food to outdoor catering services and event management, to baby care products. At Simcherry, we are thrilled to introduce our latest offering to the Nigerian market – CheriX Baby Wipes. Crafted with utmost care, these wipes are specifically designed to pamper and protect your baby's delicate skin. Our commitment to excellence is reflected in every aspect of CheriX, from the premium materials used to the thoughtful infusion of moisture.",
            'photo' => "cherix.jpg",
            'logo' => 'cherix.jpg',
            'address' => "Headquarters Abuja, Nigeria ",
            'email' => " cherixhq@gmail.com",
            'phone' => "+2347046539854",
        );
        DB::table('settings')->insert($data);
    }
}
