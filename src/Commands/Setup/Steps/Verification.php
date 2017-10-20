<?php

namespace Runsite\Component\Feedback\Commands\Setup\Steps;

use Runsite\CMF\Models\Model\Model;
use Runsite\CMF\Models\Node\Path;
use Exception;

class Verification
{
    public $message = 'Verification before installation';

    public function handle()
    {
        $model = Model::where('name', 'feedback')->first();
        if($model)
        {
            throw new Exception('The model "feedback" already exists. Remove your existing model and try again.');
        }

        $path = Path::where('name', '/feedback')->first();
        if($path)
        {
            throw new Exception('The path "/feedback" already exists. Remove your existing node with this path and try again.');
        }

        if(file_exists(app_path('Controllers\Http\FeedbackController.php')))
        {
            throw new Exception('The controller "FeedbackController" already exists in app\Controllers\Http. Remove existing controller and try again.');
        }
    }
}
