<?php

namespace Runsite\Component\Feedback\Commands;

use Illuminate\Console\Command;

class FeedbackComponentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feedback-component:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup feedback-component';

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
