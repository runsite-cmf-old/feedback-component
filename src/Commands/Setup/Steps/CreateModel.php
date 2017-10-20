<?php

namespace Runsite\Component\Feedback\Commands\Setup\Steps;

use Runsite\CMF\Models\Model\Model;
use Runsite\CMF\Models\Model\Field\Field;

class CreateModel
{
    public $message = 'Creading feedback model';

    public function handle()
    {
        $model = Model::create(['name' => 'feedback', 'display_name' => 'Feedback', 'display_name_plural' => 'Feedbacks']);

        Field::create(['model_id'=>$model->id, 'type_id'=>Field::getTypeId('string'), 'name'=>'name', 'display_name'=>'Name']);
        Field::create(['model_id'=>$model->id, 'type_id'=>Field::getTypeId('textarea'), 'name'=>'emails', 'display_name'=>'Emails']);
        Field::create(['model_id'=>$model->id, 'type_id'=>Field::getTypeId('textarea'), 'name'=>'content', 'display_name'=>'Content']);
    }
}
