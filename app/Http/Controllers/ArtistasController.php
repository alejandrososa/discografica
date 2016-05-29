<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Artistas as Artista;

class ArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return $this->listArtists();
        } else {
            return $this->findArtist($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $artista = new Artista();

        $artista->nombre = $request->input('nombre');
        $artista->instrumento = $request->input('instrumento');
        $artista->albumid = $request->input('albumid');
        $artista->save();

        return 'Artista record successfully created with id ' . $artista->id;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $artista = $this->findArtist($id);

        $artista->nombre = $request->input('nombre');
        $artista->instrumento = $request->input('instrumento');
        $artista->albumid = $request->input('albumid');
        $artista->save();

        return "Sucess updating artista #" . $artista->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id) {
        $artista = Artista::find($id);
        $artista->delete();

        return "Artista record successfully deleted #" . $id;
    }

    /**
     * Display all artists.
     *
     * @return Response
     */
    private function listArtists() {
        $list = Artista::all();
        return $list->load('album');
    }

    /**
     * Display one artists.
     * @param $id
     * @return $this
     */
    private function findArtist($id) {
        $artist = Artista::find($id);
        return $artist->load('album');
    }
}
