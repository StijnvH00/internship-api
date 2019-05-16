<?php

namespace App\Http\Controllers;

use App\Internship;
use Illuminate\Http\Request;
use App\Http\Resources\Internship  as InternshipResource;
use Validator;
use \Illuminate\Support\Facades\Auth;

class InternshipController extends Controller
{

    function __construct()
    {
        $this->middleware("auth:api");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internships = Internship::paginate(30);

        return InternshipResource::collection($internships);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $internship = new Internship();

        $validator = Validator::make($request->all(), [
            'intern' => 'required|string|max:255',
            'assignment' => 'required|string|max:255',
            'start' => 'required|date_format:Y-m-d|after:yesterday',
            'end' => 'required|date_format:Y-m-d|after:' .$request->input('start') .''
        ]);

        if($validator->fails())
        {
            return response()->json($validator->messages(), 200);
        }

        $internship->fill($request->all());
        $internship->save();

        return new InternshipResource($internship);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function show(Internship $internship)
    {
        return new InternshipResource($internship);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internship $internship)
    {
        $validator = Validator::make($request->all(), [
            'intern' => 'string|max:255',
            'assignment' => 'string|max:255',
            'start' => 'after:yesterday|date_format:Y-m-d',
            'end' => 'date_format:Y-m-d|after:' .$request->input('start') .''
        ]);

        if($validator->fails())
        {
            return response()->json($validator->messages(), 200);
        }

        $internship->update($request->all());

        return new InternshipResource($internship);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internship $internship)
    {
        if($internship->delete())
        {
            return new InternshipResource($internship);
        }
        else
        {
            return response()->json("Could not remove", 200);
        }
    }
}
