<?php

namespace Runsite\Component\Feedback\Controllers;

use Runsite\CMF\Http\Controllers\RunsiteCMFBaseController;
use Runsite\Component\Feedback\Interfaces\Feedback;
use Illuminate\{
    Http\Request,
    View\View,
    Http\Response
};

class FeedbackController extends RunsiteCMFBaseController implements Feedback
{
    /**
     * Display the specified resource.
     */
    public function show(): View
    {
        return $this->view('feedback.show');
    }

    /**
     * Sending message.
     */
    public function send(Request $request): Response
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:512',
        ]);

        return redirect()->back();
    }
}
