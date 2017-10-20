<?php

namespace Runsite\Component\Feedback\Commands\Setup\Steps;

use Artisan;

class Publishing
{
    public $message = 'Publishing';

    public function handle()
    {
        Artisan::call('vendor:publish', [
            '--provider' => 'Runsite\Component\Feedback\FeedbackComponentServiceProvider',
        ]);
    }
}
