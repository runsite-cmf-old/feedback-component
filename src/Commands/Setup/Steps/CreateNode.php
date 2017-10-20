<?php

namespace Runsite\Component\Feedback\Commands\Setup\Steps;

use Runsite\CMF\Models\Model\Model;
use Runsite\CMF\Models\Node\Node;
use Runsite\CMF\Models\Dynamic\Language;

class CreateNode
{
    public $message = 'Creading feedback node';

    public function handle()
    {
        $model = Model::where('name', 'feedback')->first();

        $node = Node::create(['parent_id'=>1, 'model_id'=>$model->id], 'Feedback');

        // saving node
        foreach(Language::get() as $language)
        {
            $node->{$language->locale}->is_active = true;
            $node->{$language->locale}->name = 'Feedback';
            $node->{$language->locale}->emails = "example1@mail.com\nexample2@mail.com";
            $node->{$language->locale}->content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas laborum sapiente illum doloremque accusantium necessitatibus, beatae expedita velit reprehenderit, voluptates in rem vitae delectus atque, ducimus sequi unde. Deleniti, nihil?';
            $node->{$language->locale}->save();
        }
    }
}
