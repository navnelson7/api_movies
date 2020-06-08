<?php

namespace App\Http\Controllers;

use App\Movies;
use Illuminate\Http\Request;

/** 
 * @OA\Info(title="API Movies", version="1.0")
 * 
 * @OA\Server(url="http://localhost:8000")
*/

class MoviesController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /**
    * @OA\Get(
    *     path="/api/movies",
    *     summary="Show All Movies",
    *     operationId="showMovies",
    *     tags={"Show All Movie"},
    *     @OA\Response(
    *         response=200,
    *         description="Get All Movies."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="an error has occurred."
    *     )
    * )
    */

        //using index to return all movies records
        return Movies::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     

    public function store(Request $request)
    /**
     * @OA\Post(
     *      path="/api/movies/store?title=La%20bella%20y%20la%20bestia&description=Pelicula%20de%20un%20hombre%20convertido%20en%20bestia&image_url=pin8.jpg&stock=5&price_sale=3.0&price_rental=2.8&available=1&user_id=1",
     *      operationId="storeMovies",
     *      tags={"Movies Store"},
     *      summary="Store new Movie",
     *      description="Returns Movie data",
     *      @OA\RequestBody(
     *          required=true,
     *    
     *      ),
     *      @OA\Parameter(
    *         name="title",
    *         in="query",
    *         description="Title to Movie",
    *       ),
     *      @OA\Response(
     *          response=201,
     *          description="an error has occurred",
     *          
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    {
        //storing movies
        Movies::create($request->all());
        return 200;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    /**
    * @OA\Get(
    *     path="/api/movies/1",
    *     summary="Show on movie finding by id",
    *     operationId="showMovies",
    *     tags={"Show one Movie"},
    *     @OA\Response(
    *         response=200,
    *         description="Get one movie."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="an error has occurred."
    *     )
    * )
    */

        //fiding a movie
        $movie = Movies::findOrFail($id);
        return $movie;
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
    /**
    * @OA\Put(
    *     path="/api/movies/1",
    *     summary="Update movie finding by id",
    *     operationId="updatewMovies",
    *     tags={"Update one Movie"},
    *     @OA\Response(
    *         response=200,
    *         description="Update one movie finding by id methos put api."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="an error has occurred."
    *     )
    * )
    */
        //updating register into movies
        Movies::whereId($id)->update($request->toArray());
        //dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    /**
    * @OA\Delete(
    *     path="/api/movies/4",
    *     summary="Deleting a movie",
    *     @OA\Response(
    *         response=200,
    *         description="Delte movie method delete to api."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="an error has occurred."
    *     )
    * )
    */
        //deleting a movie
        $movie = Movies::findOrFail($id);
        $movie->delete();
        return 200;
    }
}
