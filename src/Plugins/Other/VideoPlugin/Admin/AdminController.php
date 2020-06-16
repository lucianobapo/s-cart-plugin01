<?php
#App\Plugins\Other\TigresaTemplate\Admin\AdminController.php

namespace App\Plugins\Other\TigresaTemplate\Admin;

use App\Http\Controllers\Controller;
use App\Plugins\Other\TigresaTemplate\AppConfig;

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
