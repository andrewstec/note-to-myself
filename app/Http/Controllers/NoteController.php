<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{

    public function image_count() {
        $note = Note::where('email', Auth::user()->email)->first();

        $image_count = 0;
        if( !is_null($note->image1) ) {
            $image_count += 1;
        }
        if( !is_null($note->image2) ) {
            $image_count += 1;
        }
        if( !is_null($note->image3) ) {
            $image_count += 1;
        }
        if( !is_null($note->image4) ) {
            $image_count += 1;
        }
        return $image_count;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo bcrypt('password');

        $image1 = null;
        $image2 = null;
        $image3 = null;
        $image4 = null;

        $note = Note::where('email', Auth::user()->email)->first();
<<<<<<< HEAD
        
=======
        if ( !is_null($note->image1)) {
            $image1 = $note->image1;
            echo true;
        }
        if ( !is_null($note->image1)) {
            $image2 = $note->image2;
                        echo "true";

        }
        if ( !is_null($note->image1)) {
            $image3 = $note->image3;
                        echo "true";

        }
        if ( !is_null($note->image1)) {
            $image4 = $note->image4;
                        echo "true";

        }

>>>>>>> 138f1aa3fa2906d1b22995fbda798a3a505a803a
        $image_count = $this->image_count();

        echo $image_count;
        echo "<br>";
        $converted = explode(";", $note->websites);
        echo $note->websites;
        echo "<br>";
        var_dump($converted);
        $JSON_serialized = json_encode($converted, JSON_FORCE_OBJECT);
        echo $JSON_serialized;

        return view('notes.index', ['image_count' => $image_count, 'tbd' => $note->tbd, 'note' => $note->note, 'websites' => $JSON_serialized ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images_full = false;

        //validating the data
        $this->validate($request, [
<<<<<<< HEAD
            'note' => 'required',
            'websites' => 'required', 
            'tbd' => 'required'
=======
            'image' => 'mimes:jpeg,jpg,gif'
>>>>>>> 138f1aa3fa2906d1b22995fbda798a3a505a803a
            ]);

        $note = Note::where('email', Auth::user()->email)->first();
        $note->note = $request->note;
        $note->websites = implode(";", array_filter($request->websites));
<<<<<<< HEAD


        switch (null) {
            case $note->image1:
                $note->image1 = $request->image;
                break;
            case $note->image2:
                $note->image2 = $request->image;
                break;
            case $note->image3:
                $note->image3 = $request->image;
                break;
            case $note->image4:
                $note->image4 = $request->image;
                break;
        }

        $note->tbd = $request->tbd;
=======
>>>>>>> 138f1aa3fa2906d1b22995fbda798a3a505a803a


        switch (null) {
            case $note->image1:
                $note->image1 = $request->image;
                break;
            case $note->image2:
                $note->image2 = $request->image;
                break;
            case $note->image3:
                $note->image3 = $request->image;
                break;
            case $note->image4:
                $note->image4 = $request->image;
                break;
        }

        $note->tbd = $request->tbd;
        $note->save();

        return redirect()->route('Notes.index');
        //insert into the server
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'You made it to the notes.show controller';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
