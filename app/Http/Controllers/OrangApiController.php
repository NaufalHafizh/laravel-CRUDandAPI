<?php

namespace App\Http\Controllers;

use App\Models\orang;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class OrangApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [

            'message' => "data berhasil di load",
            'data_orang' => orang::get()
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {

            $orang = orang::create($request->all());

            $response = [

                'pesan' => 'Data Berhasil Di Masukan',
                'data' => $orang
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {

            return response()->json([

                'pesan' => 'Data Gagal Di Masukan' . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $response = [
            'pesan' => "data berhasil di load",
            'data' => orang::findOrFail($id)
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orang = orang::findOrFail($id);

        $validator = Validator::make($request->all(), [

            'nama' => ['required'],
            'jenis_kelamin' => ['required'],
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {

            $orang->update($request->all());

            $response = [

                'pesan' => 'Data Berhasil Di Update',
                'data' => $orang
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {

            return response()->json([

                'pesan' => 'Data Gagal Di Masukan' . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orang = orang::findOrFail($id);


        try {

            $orang->delete();

            $response = [

                'pesan' => 'Data Berhasil Di Delete',
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {

            return response()->json([

                'pesan' => 'Data Gagal Di Masukan' . $e->errorInfo
            ]);
        }
    }
}
