<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SiteSetting;

class ContactInformationController extends Controller
{
    public function getContactInformation() {
        $settings = SiteSetting::get();

        return Helper::response($settings, 200);
    }
}
