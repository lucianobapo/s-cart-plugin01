<?php
#App\Plugins\Other\VideoPlugin\Models\PluginModel.php
namespace App\Plugins\Other\VideoPlugin\Models;

use Illuminate\Database\Eloquent\Model;

class PluginModel extends Model
{
    public $timestamps    = false;
    public $table = SC_DB_PREFIX.'video_plugin_files';
    protected $connection = SC_CONNECTION;
    protected $guarded    = [];

    public function uninstallExtension()
    {
        $return = ['error' => 0, 'msg' => 'Uninstall modules success'];
        if (Schema::hasTable($this->table)) {            
            try {
                Schema::drop($this->table);
            }
            catch (\Exception $e) {
                $return = ['error' => 1, 'msg' => $e->getMessage()];
            }
        } else {
            $return = ['error' => 1, 'msg' => 'Table ' . $this->table . ' not exist!'];
        }
        return $return;
    }

    public function installExtension()
    {
        $return = ['error' => 0, 'msg' => 'Install modules success'];
        if (!Schema::hasTable($this->table)) {
            try {
                Schema::create($this->table, function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('filename', 100)->nullable();
                    $table->tinyInteger('status')->default(0);
                });

            } catch (\Exception $e) {
                $return = ['error' => 1, 'msg' => $e->getMessage()];
            }
        } else {
            $return = ['error' => 1, 'msg' => 'Table ' . $this->table . ' exist!'];
        }
        return $return;
    }
    
}
