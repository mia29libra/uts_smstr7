<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Absen;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Validator;


class AbsenController extends Controller
{    
    
    public function index()
    {
        $absen = Absen::all();

        return response()->json($absen);
    }
     public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama'     => 'required',
            'absen'     => 'required',
            'alasan'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $absen = Absen::create([
            'absen'     => $request->absen,
            'nama'     => $request->nama,
            'alasan'   => $request->alasan,
        ]);

        //return response
        return response()->json([
            'success'=>true,
            'mesage'=>'data berhasil ditambahkan',
            'data'  => $absen
        ]);
    }
}