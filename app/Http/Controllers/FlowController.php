<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * 導入の流れ
 */
class FlowController extends Controller
{
    /**
     * index
     * @GET
     * @return View
     */
    public function index(): View
    {
        $title       = 'sample flow';
        $description = 'sample description';

        $data = [
            'title' => $title,
            $description => $description,
        ];

        return view('flows.index', $data);
    }
}
