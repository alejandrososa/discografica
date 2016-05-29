<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Albumes as Album;

class AlbumesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Album::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $fecha = $fecha = date('Y-m-d', strtotime($request->input('fecha')));

        $album = new Album();
        $album->titulo = $request->input('titulo');
        $album->fecha = $fecha;
        $album->save();

        return 'Album record successfully created with id ' . $album->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Album::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $fecha = date('Y-m-d', strtotime($request->input('fecha')));

        $album = Album::find($id);
        $album->titulo = $request->input('titulo');
        $album->fecha = $fecha;
        $album->save();

        return "Sucess updating user #" . $album->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id) {
        $album = Album::find($id);
        $album->delete();

        return "Album record successfully deleted #" . $id;
    }
}
