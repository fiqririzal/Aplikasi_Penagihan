<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public function index()
    {
        $data = [
            'script' => 'components.scripts.member.member'
        ];
        return view('pages.member.index', $data);
    }
    // public function store(Request $request){
    //         if ($request->name == NULL) {
    //             $json = [
    //                 'msg'       => 'Mohon masukan nama produk',
    //                 'status'    => false
    //             ];
    //         } elseif ($request->address == NULL) {
    //             $json = [
    //                 'msg'       => 'Mohon masukan price',
    //                 'status'    => false
    //             ];
    //         } elseif ($request->phone == NULL) {
    //             $json = [
    //                 'msg'       => 'Mohon masukan price',
    //                 'status'    => true
    //             ];
    //         } else {
    //             try {
    //                 DB::transaction(function () use ($request) {
    //                     DB::table('member')->insert([
    //                         'created_at' => date('Y-m-d H:i:s'),
    //                         'name' => $request->name,
    //                         'address' => $request->address,
    //                         'phone' => $request->phone,
    //                         // 'image' => $image,
    //                         // 'status' => $request->status,

    //                     ]);
    //                 });

    //                 $json = [
    //                     'msg' => 'Produk berhasil ditambahkan',
    //                     'status' => true
    //                 ];
    //             } catch (Exception $e) {
    //                 $json = [
    //                     'msg'       => 'error',
    //                     'status'    => false,
    //                     'e'         => $e
    //                 ];
    //             }
    //         }

    //         return Response::json($json);
    //     }
    // }

    public function show($id)
     {
            if (is_numeric($id)) {
                $data = DB::table('users')->where('id', $id)->first();
                // $data->price = intval($data->price);
                return Response::json($data);
            }
            $data = DB::table('users')
                ->join('model_has_roles', 'model_has_roles.model_id','=','users.id')
                ->select([
                    'users.*'
                ])
                ->where('model_has_roles.role_id', 2)
                ->orderBy('users.id', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

