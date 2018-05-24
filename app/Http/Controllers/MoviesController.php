<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Movie;


//sandra..ccc.jel se zove movieSs ili movie bez sSSS
class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*
        return Movie::search($request->title, $request->take);
        */
        return Movie::all( ); 
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
      /*
        $this->validate($request,[
         'title'=>'required',
         'director'=>'required',
         'imageUrl' => 'url',
         'duration' => 'required | integer:min=1,max=500',
         'releaseDate' => 'required'
      ]);

      */
        $movie = new Movie();
        $movie->name = $request->input('name');
        $movie->director = $request->input('director');
        $movie->image_url = $request->input('image_url');
        $movie->duration = $request->input('duration');
        $movie->release_date = $request->input('release_date');
        $movie->genres = $request->input('genres');
        
        $movie->save();
        return $movie;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::find($id);
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
       /*  $this->validate($request,[
         'title'=>'required',
         'director'=>'required',
         'imageUrl' => 'url',
         'duration' => 'required | integer:min=1,max=500',
         'releaseDate' => 'required'
      ]);*/
        $movie = Movie::find($id);
       
        $movie->name = $request->input('name');
        $movie->director = $request->input('director');
        $movie->image_url = $request->input('image_url');
        $movie->duration = $request->input('duration');
        $movie->release_date = $request->input('release_date');
        $movie->genres = $request->input('genres');
        
        $movie->save();
        return $movie;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return new JsonResponse(true);
    }
}