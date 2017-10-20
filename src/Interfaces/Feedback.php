<?php 

namespace Runsite\Component\Feedback\Interfaces;

use Illuminate\Http\Request;

interface Feedback {

    public function show();
    public function send(Request $request);
}
