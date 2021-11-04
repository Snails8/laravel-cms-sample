<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * 導入事例
 */
class CaseController extends Controller
{
    /**
     * 一覧
     * @return View
     */
    public function index(): View
    {
        $title = 'sample 導入事例 | HRT';
        $description = '導入事例一覧です。';

        $data = [
            'title' => $title,
            'description' => $description,
        ];

        return view('cases.index', $data);
    }

    /**
     * 詳細
     * @param int $caseId
     * @return View
     */
    public function show(int $caseId): View
    {
        $title = 'sample 導入事例 | HRT';
        $description = '導入事例一覧です。';

        $data = [
            'title' => $title,
            'description' => $description,
        ];

        return view('cases.show', $data);
    }
}
