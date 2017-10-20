<?php

namespace Runsite\Component\Feedback\Commands\Setup\Steps;

use Runsite\CMF\Models\Model\Model;
use Runsite\CMF\Models\Model\Dependency;

class CreateDependency
{
    public $message = 'Creating dependency';

    public function handle()
    {
        $root = Model::where('name', 'root')->first();
        $feedback = Model::where('name', 'feedback')->first();

        Dependency::create([
            'model_id' => $root->id,
            'depended_model_id' => $feedback->id,
        ]);
    }
}
