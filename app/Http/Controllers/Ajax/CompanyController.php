<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class CompanyController
 * @package App\Http\Controllers\Ajax
 */
class CompanyController extends Controller
{
    /**
     * @param Company $company
     * @param Request $request
     * @return JsonResponse
     */
    public function updateContractStatus(Company $company, Request $request): JsonResponse
    {
        try {
            $company->is_contract = (boolean)$request->data['is_contract'];
            $company->save();

        } catch (\Exception $e) {
            Log::critical($e->getMessage());

            return response()->json(['error_message' => '更新中にエラーが発生しました。']);
        }

        return response()->json($company);
    }
}
