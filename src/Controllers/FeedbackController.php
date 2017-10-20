<?php

namespace Runsite\Component\Feedback\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Illuminate\Http\Request;

class FeedbackController extends RunsiteCMFBaseController
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return $this->view('feedback.show');
    }

    /**
     * Sending message.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:512',
        ]);

        return redirect()->back();
    }
}
