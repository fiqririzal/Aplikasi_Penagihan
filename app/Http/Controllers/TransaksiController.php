<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function store($id)
    {
        // $kendaraan = DB::table('rental')->where('id', $id)->first();
        // $date = $kendaraan->lama_sewa;

        if (is_numeric($id)) {
            $data = DB::table('rental')->where('id', $id)->first();
            $data->price = intval($data->price);
            return Response::json($data);
        }
        $data = DB::table('rental')->orderBy('rental.id', 'desc');
        return DataTables::of($data)
            ->addColumn(
                'action',
                function ($row) {
                    $data = [
                        'id' => $row->id
                    ];
                    return view('components.buttons.rental', $data);
                }
            )
            ->addIndexColumn()
            ->make(true);
    }
    public function update(Request $request, $id)
    {

        if($request->status == NULL) {
            $json = [
                'msg'       => 'Mohon masukan status',
                'status'    => true
            ];
        } elseif($request->lama_sewa == NULL) {
            $json = [
                'msg'       => 'Mohon masukan lama sewa',
                'status'    => true
            ];
        }
        else{
            try {
                DB::transaction(function () use ($request, $id) {
                    $kendaraan = DB::table('rental')->where('id', $id)->first();

                    $total = ($kendaraan->price * $request->lama_sewa);

                    // $date = $kendaraan->lama_sewa;
                    // $datework = Carbon::createFromDate($date);
                    // $now = Carbon::now();
                    // $testdate = $datework->diffInDays($now);

                    // dd($testdate);

                    // $dob = Carbon::parse($kendaraan['lama_sewa']);
                    //  $now = Carbon::now();
                    //  $testdate = $dob->diffInDays($now);
                    // $deadline = $dob->$lama_sewa;

                    // $datework = Carbon::createFromDate('Y-m-d H', '2022-10-25 22');
                    // $now = Carbon::now();
                    // $testdate = $datework->diffInDays($now);

                    // dd($testdate);


                    DB::table('transaksi')->insert([
                        'created_at' => date('Y-m-d H:i:s'),
                        'id_user' => Auth::user()->id,
                        'id_rental' => $id,
                        'hari' => $request->lama_sewa,
                        'total' => $total,
                        'status' => 'pending',
                        'created_at' => $request->created_at,
                    ]);
                });

                $json = [
                    'msg' => 'Produk berhasil ditambahkan',
                    'status' => true
                ];
            } catch (Exception $e) {
                dd($e);
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }

        return Response::json($json);
    }
    public function show(Request $request, $id)
    {
            try {
                DB::transaction(function () use ($request, $id) {
                    DB::table('transaksi')
                    ->where('id', $id)
                    ->update([
                        'status' => 'paid',
                    ]);
                });
                $json =[
                    'msg'       => 'berhasil',
                    'status'    => true,
                ];
            } catch (Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'line'         => $e->getLine(),
                    'e'         => $e->getMessage()
                ];
            }
        return Response::json($json);
    }
    public function destroy($id)
    {
        try{
            DB::transaction(function()use($id)
            {
                DB::table('transaksi')->where('id',$id)->delete();
            });
            $json =[
                'msg'=>'Member Berhasil Dihapus',
                'status'=>true

            ];
        }catch(Exception $e){
                $json =[
                    'msg'=>'error',
                    'status'=>false,
                    'e'=>$e,
                ];
            };
        return Response::json($json);
    }
}
