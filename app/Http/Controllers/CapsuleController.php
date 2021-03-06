<?php

namespace App\Http\Controllers;

use App\Models\Capsules;
use Illuminate\Http\Request;

class CapsuleController extends Controller
{

    /**
     * @OA\Get (
     *     tags={"capsules"},
     *     path="/api/capsules/",
     *     security={{"Bearer":{}}},
     *     description="Status bilgisi verilenleri gösterir => status= active , retired , unknown , etc ",
     *      @OA\Parameter(
     *      name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *     @OA\Response(response="200", description="Ok"),
     *     @OA\Response(response="400", description="Bad Request"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="500", description="Server Error"),
     * )
     */
    public function index(){
        return 0;
    }






    /**
     * @OA\Get (
     *     tags={"capsules"},
     *     path="/api/capsules",
     *     security={{"Bearer":{}}},
     *     description="Tüm Kapsülleri Gösterir",
     *     @OA\Response(response="200", description="Ok"),
     *     @OA\Response(response="400", description="Bad Request"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="500", description="Server Error"),
     * )
     */


    public function getAll(Request $request){
        if (isset($request->status) && $request->status == "active"){
            $activeCapsules = Capsules::where('status',$request->status)->with('missions')->get();
            return response()->json($activeCapsules);
        }
        if (isset($request->status) && $request->status == "retired"){
            $activeCapsules = Capsules::where('status',$request->status)->with('missions')->get();
            return response()->json($activeCapsules);
        }
        if (isset($request->status) && $request->status == "unknown"){
            $activeCapsules = Capsules::where('status',$request->status)->with('missions')->get();
            return response()->json($activeCapsules);
        }
        if (isset($request->status) && $request->status == "etc"){
            $activeCapsules = Capsules::where('status',$request->status)->with('missions')->get();
            return response()->json($activeCapsules);
        }
        $allCapsules = Capsules::with('missions')->get();
        return response()->json([
            'error' => 'Geçerli bir status vermediğiniz için tüm veriler getiriliyor..',
            "tüm kapsüller" =>$allCapsules,
        ]);
    }


    /**
     * @OA\Get (
     *     tags={"capsules"},
     *     path="/api/capsules/{serial_no}",
     *     security={{"Bearer":{}}},
     *     description="Serial numarası girilenin bilgilerini getirir.",
     *      @OA\Parameter(
     *      name="serial_no",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *      ),
     *     @OA\Response(response="200", description="Ok"),
     *     @OA\Response(response="400", description="Bad Request"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="404", description="Not Found"),
     *     @OA\Response(response="500", description="Server Error"),
     * )
     */
    public function serialApi($serail){
        $activeCapsules = Capsules::where('capsule_serial',$serail)->with('missions')->get();
        return response()->json($activeCapsules);
    }
}
