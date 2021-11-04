<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * URL admin 直打ち してきた際にadmin.home に飛ばしてやる役割を持つclass
 */
class DashboardController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('admin.home');
    }
}
