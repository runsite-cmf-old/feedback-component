<?php

namespace Runsite\Component\Feedback\Commands\Setup\Steps;

use Runsite\CMF\Models\Model\Model;

class CreateMethod
{
    public $message = 'Creading feedback model methods';

    public function handle()
    {
        $feedback = Model::where('name', 'feedback')->first();

        $feedback->methods->get = 'FeedbackController@show';
        $feedback->methods->post = 'FeedbackController@send';
        $feedback->methods->save();
    }
}
