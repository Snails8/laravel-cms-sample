<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * プラン一覧 (現状:静的)
 */
class PlanController extends Controller
{
    /**
     * Plan 一覧
     * @return View
     */
    public function index(): View
    {
        $title = 'プラン一覧|HRT';
        $description = 'プラン一覧です。';

        $data = [
            'title' => $title,
            'description' => $description,
        ];

        return view('plans.index', $data);
    }
}
