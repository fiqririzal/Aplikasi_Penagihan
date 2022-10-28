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

    public function show($id)
    {
        if (is_numeric($id)) {
            $data = DB::table('users')->where('id', $id)->first();
            return Response::json($data);
        }
        $data = DB::table('users')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->select([
                'users.*'
            ])
            ->where('model_has_roles.role_id', 2)
            ->orderBy('users.id', 'desc');
        return DataTables::of($data)
            ->addColumn(
                'pinjaman',
                function ($row) {
                    $hasTransaction = DB::table('transaksi')
                        ->where('id_user', $row->id)
                        ->orderBy('created_at', 'desc')
                        ->first();
                    if ($hasTransaction) {
                        return $hasTransaction->hari . ' hari';
                    }
                    return '-';
                }
            )
            ->addColumn(
                'name_car',
                function () {
                    $hasTransaction = DB::table('rental')
                        ->orderBy('created_at', 'desc')
                        ->first();

                    if ($hasTransaction) {
                        return $hasTransaction->name_car;
                    }

                    return '-';
                }
            )
            ->addColumn(
                'total',
                function ($row) {
                    $hasTransaction = DB::table('transaksi')
                        ->where('id_user', $row->id)
                        ->orderBy('created_at', 'desc')
                        ->first();

                    if ($hasTransaction) {
                        return $hasTransaction->total;
                    }

                    return '-';
                }
            )
            ->addColumn(
                'status',
                function ($row) {
                    $hasTransaction = DB::table('transaksi')
                        ->where('id_user', $row->id)
                        ->orderBy('created_at', 'desc')
                        ->first();

                    if ($hasTransaction) {
                        return $hasTransaction->status;
                    }

                    return '-';
                }
            )
            ->addIndexColumn()
            ->make(true);
    }
}
