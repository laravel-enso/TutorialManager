<?php

namespace LaravelEnso\Tutorials\Http\Controllers;

use Illuminate\Routing\Controller;
use LaravelEnso\Tutorials\Http\Requests\ValidateTutorialRequest;
use LaravelEnso\Tutorials\Models\Tutorial;

class Store extends Controller
{
    public function __invoke(ValidateTutorialRequest $request, Tutorial $tutorial)
    {
        $tutorial->fill($request->validated())->save();

        return [
            'message' => __('The tutorial was created!'),
            'redirect' => 'system.tutorials.edit',
            'param' => ['tutorial' => $tutorial->id],
        ];
    }
}
