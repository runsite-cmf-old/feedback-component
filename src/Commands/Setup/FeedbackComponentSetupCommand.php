<?php

namespace Runsite\Component\Feedback\Commands\Setup;

use Illuminate\Console\Command;
use Runsite\Component\Feedback\Commands\Setup\Steps\Verification;
use Runsite\Component\Feedback\Commands\Setup\Steps\CreateModel;
use Runsite\Component\Feedback\Commands\Setup\Steps\CreateMethod;
use Runsite\Component\Feedback\Commands\Setup\Steps\CreateDependency;
use Runsite\Component\Feedback\Commands\Setup\Steps\CreateNode;
use Runsite\Component\Feedback\Commands\Setup\Steps\Publishing;

class FeedbackComponentSetupCommand extends Command
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

    protected $steps = [
        Verification::class,
        CreateModel::class,
        CreateMethod::class,
        CreateDependency::class,
        CreateNode::class,
        Publishing::class,
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Installation...');

        $bar = $this->output->createProgressBar(count($this->steps));
        $bar->setFormatDefinition('runsite', '  %current%/%max% [%bar%] %percent:3s%% -- %message%');
        $bar->setFormat('runsite');
        $bar->setMessage('Preparing');
        $bar->start();

        foreach($this->steps as $class)
        {
          $class = new $class;
          $bar->setMessage($class->message);
          $bar->advance();
          $class->handle();
        }

        $bar->setMessage('Installation complete!');
        $bar->finish();

        $this->comment('');
        $this->comment('Keep in mind that for the component to work properly, you must have a properly configured mail driver.');
    }
}
