<?php

use App\Models\Setting;

if(! function_exists('getSetting')){
    function getSetting($name) {
        return Setting::where('name', $name)->first()->value;
    }
}

if(! function_exists('setSetting')){
    function setSetting($name, $value) {
        return Setting::where('name', $name)->update(['value' => $value]);
    }
}


