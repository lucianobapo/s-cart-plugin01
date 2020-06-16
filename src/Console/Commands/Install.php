<?php

namespace ErpNET\SCartVideoPlugin\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Install extends Command
{
    protected $progressBar;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'erpnet:s-cart-video-plugin:install
                                {--timeout=300} : How many seconds to allow each process to run.
                                {--debug} : Show process output or not. Useful for debugging.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $provider = 'ErpNET\SCartVideoPlugin\Providers\TServiceProvider';
    protected $title = 'ErpNET\SCartVideoPlugin';
    protected $description = 'ErpNET\SCartVideoPlugin install and execute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {        
        $this->info($this->title." installation started. Please wait...");
        $this->progressBar = $this->output->createProgressBar(1);
        $this->progressBar->setMessage('Task is in progress...');
        $this->progressBar->start();
        
        //

        //$this->info('Publishing files');
        $this->callSilent('vendor:publish', ['--force' => true, '--tag' => 'erpnetVideoPlugin']);
        
        $this->progressBar->setMessage('Publishing files');
        $this->progressBar->advance();

        $this->progressBar->finish();
        $this->info($this->title." installation finished.");
    }

}
