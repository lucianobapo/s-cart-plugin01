<?php
#App\Plugins\Other\VideoPlugin\Admin\AdminController.php

namespace App\Plugins\Other\VideoPlugin\Admin;

use App\Http\Controllers\Controller;
use App\Plugins\Other\VideoPlugin\AppConfig;

class AdminController extends Controller
{
    public $plugin;

    public function __construct()
    {
        $this->plugin = new AppConfig;
    }
    public function index()
    {
        return view($this->plugin->pathPlugin.'::Admin',
            [
                
            ]
        );
    }
}
