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
                'title' => 'Task per page',
                'value' => 5
            ]
        ];

        foreach($settings as $setting){
            Setting::create($setting);
        }
    }
}
