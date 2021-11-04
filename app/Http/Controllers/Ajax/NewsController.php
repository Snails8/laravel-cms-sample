<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * 公開判定
 * Class NewsController
 * @package App\Http\Controllers\Ajax
 */
class NewsController extends Controller
{
    /**
     * is-public 判定
     * @param News $news
     * @param Request $request
     * @return JsonResponse
     */
    public function updatePublicStatus(News $news, Request $request): JsonResponse
    {
        try {
            $news->is_public = (boolean)$request->data['is_public'];
            $news->save();

        } catch (\Exception $e) {
            Log::critical($e->getMessage());
            return response()->json(['error_message' => '更新中にエラーが発生しました。']);
        }

        return response()->json($news);
    }
}
