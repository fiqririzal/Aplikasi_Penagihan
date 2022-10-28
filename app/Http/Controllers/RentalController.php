<?php

namespace App\Http\Controllers;

use id;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class RentalController extends Controller
{
    public function index()
    {
        $data = [
            'script' => 'components.scripts.rental.rental'
        ];
        return view('pages.rental.index', $data);
    }
    public function store(Request $request)
    {
        if ($request->name_car == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama produk',
                'status'    => false
            ];
        } elseif ($request->price == NULL) {
            $json = [
                'msg'       => 'Mohon masukan price',
                'status'    => false
            ];
        } elseif ($request->description == NULL) {
            $json = [
                'msg'       => 'Mohon masukan price',
                'status'    => true
            ];
        } elseif ($request->file('image') == NULL) {
            $json = [
                'msg'       => 'Mohon masukan image',
                'status'    => true
            ];
        } elseif ($request->status == NULL) {
            $json = [
                'msg'       => 'Mohon masukan status',
                'status'    => true
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $image = strtotime(date('Y-m-d H:i:s')).'.'.$extension;
                    $destination = base_path('public/images/');
                    $request->file('image')->move($destination,$image);
                    DB::table('rental')->insert([
                        'created_at' => date('Y-m-d H:i:s'),
                        'name_car' => $request->name_car,
                        'price' => $request->price,
                        'description' => $request->description,
                        'image' => $image,
                        'status' => $request->status,

                    ]);
                });

                $json = [
                    'msg' => 'Produk berhasil ditambahkan',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg'       => 'error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }

        return Response::json($json);
    }
    public function show($id)
    {
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
        if ($request->name_car == NULL) {
            $json = [
                'msg'       => 'Mohon masukan nama produk',
                'status'    => false
            ];
        } elseif ($request->price == NULL) {
            $json = [
                'msg'       => 'Mohon masukan price',
                'status'    => false
            ];
        } elseif ($request->description == NULL) {
            $json = [
                'msg'       => 'Mohon masukan deskripsi',
                'status'    => false
            ];
        } elseif ($request->file('image') == NULL) {
            $json = [
                'msg'       => 'Mohon masukan image',
                'status'    => true
            ];
        } else {
            try {
                DB::transaction(function () use ($request, $id) {
                    DB::table('rental')->where('id', $id)->update([
                        'name_car' => $request->name_car,
                        'price' => $request->price,
                        'description' => $request->description,
                        'image' => $request->image,
                    ]);
                });

                $json =[
                    'msg'       => 'error',
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
        }
        return Response::json($json);
    }
    public function destroy($id)
    {
        try{
            DB::transaction(function()use($id)
            {
                DB::table('rental')->where('id',$id)->delete();
            });
            $json =[
                'msg'=>'Produk Berhasil Dihapus',
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
    // public function sewaUpdate(Request $request, $id)
    // {
    //     if ($request->name_car == NULL) {
    //         $json = [
    //             'msg'       => 'Mohon masukan nama produk',
    //             'status'    => false
    //         ];
    //     } elseif ($request->price == NULL) {
    //         $json = [
    //             'msg'       => 'Mohon masukan price',
    //             'status'    => false
    //         ];
    //     } elseif ($request->description == NULL) {
    //         $json = [
    //             'msg'       => 'Mohon masukan deskripsi',
    //             'status'    => false
    //         ];
    //     }
    //     elseif ($request->status == NULL) {
    //         $json = [
    //             'msg'       => 'Mohon masukan status',
    //             'status'    => false
    //         ];
    //     }
    //     else {
    //         try {
    //             DB::transaction(function () use ($request, $id) {
    //                 DB::table('rental')->where('id', $id)->update([
    //                     'name_car' => $request->name_car,
    //                     'price' => $request->price,
    //                     'description' => $request->description,
    //                     'image' => $request->image,
    //                     'status' => $request->status,
    //                 ]);
    //             });

    //             $json =[
    //                 'msg'       => 'error',
    //                 'status'    => true,
    //             ];
    //         } catch (Exception $e) {
    //             $json = [
    //                 'msg'       => 'error',
    //                 'status'    => false,
    //                 'line'         => $e->getLine(),
    //                 'e'         => $e->getMessage()
    //             ];
    //         }
    //     }
    //     return Response::json($json);
    // }
}
