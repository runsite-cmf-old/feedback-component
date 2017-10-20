<?php

namespace Runsite\CMF\Component\Feedback\Commands;

use Illuminate\Console\Command;

class Feedback-componentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feedback-component:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows the feedback-component package information';

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
        $this->line('Package created using Bootpack.');
    }
}
