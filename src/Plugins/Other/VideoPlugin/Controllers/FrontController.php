<?php
#App\Plugins\Other\VideoPlugin\Controllers\FrontController.php
namespace App\Plugins\Other\VideoPlugin\Controllers;

use App\Plugins\Other\VideoPlugin\AppConfig;
use App\Http\Controllers\GeneralController;
class FrontController extends GeneralController
{
    public $plugin;

    public function __construct()
    {
        parent::__construct();
        $this->plugin = new AppConfig;
    }

    public function index() {
        return view($this->plugin->pathPlugin.'::Front',
            [
                //
            ]
        );
    }

    public function processOrder(){
        // Function require if plugin is payment method
    }
}
