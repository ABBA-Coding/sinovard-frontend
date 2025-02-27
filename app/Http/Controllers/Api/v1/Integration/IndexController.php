<?php

namespace App\Http\Controllers\Api\v1\Integration;

use App\Exceptions\BusinessException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 *  Integration
 */
class IndexController
{
    public function products(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'data' => 'required|array',
            'data.*.ref_id' => 'required|string',
            'data.*.name' => 'required|string',
            'data.*.vendor_code' => 'required|string',
            'data.*.price' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();
        try {
            $chunks = array_chunk($request->get('data'), 500); // По 300 записей за раз

            foreach ($chunks as $chunk) {
                DB::table('products')->insert($chunk);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new BusinessException($exception->getMessage());
        }

        return response()->json('success');
    }

    public function productsUpdate(Request $request)
    {
        $request->validate([
            'data' => 'required|array',
            'data.*.ref_id' => 'required|string',
            'data.*.name' => 'required|string',
            'data.*.vendor_code' => 'required|string',
            'data.*.price' => 'nullable|numeric',
        ]);

        DB::beginTransaction();
        try {
            foreach ($request->get('data') as $item) {
                DB::table('products')->updateOrInsert([
                    'ref_id' => $item['ref_id'],
                ],[
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'vendor_code' => $item['vendor_code'],
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new BusinessException($exception->getMessage());
        }

        return response()->json('success');
    }
}
