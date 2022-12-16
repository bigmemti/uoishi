<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings=[
            [
                'name' => 'task_per_page',
                'en_title' => 'task per page',
                'fa_title' => 'تعداد تسک در صفحه',
                'value' => 5
            ]
        ];

        foreach($settings as $setting){
            Setting::create($setting);
        }
    }
}
