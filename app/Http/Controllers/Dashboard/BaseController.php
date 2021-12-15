<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class BaseController extends Controller
{
    /**
     * Redirect after an action with alert
     *
     * @param $result
     * @param $route
     * @param $action
     * @param string $type
     * @return RedirectResponse
     */
    protected function redirectWithAlert($result, $route, $action, string $type = 'success'): RedirectResponse
    {
        $message = match ($action) {
            "create" => 'Successfully created',
            "update" => 'Successfully updated',
            "delete" => 'Successfully deleted',
        };

        if ($result) {
            return redirect()
                ->route('admin.' . $route . '.index')
                ->with([$type => $message]);
        } else {
            return back()
                ->with(['error' => 'Error, please contact your administrator'])
                ->withInput();
        }
    }
}
