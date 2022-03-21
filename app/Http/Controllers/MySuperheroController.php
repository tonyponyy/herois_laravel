<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero; // Afegir la classe Model!!!!!!!!!!!!!!!!!!!
use App\Models\Planet;
use App\Models\Superpower;
use Auth;

class MySuperheroController extends Controller
{

   
    public function index(Request $request)
    {
        // $filters serà un array de la forma ['searchName'=>'Spider-Man','searchGender=>'Male']

        $filters = $request->all('searchName', 'searchGender');

        
        // Preparo una consulta sobre el model Superhero, indicant que voldrè carregar també els 
        // models Planet associats, per evitar el problema N+1
        //$query = Superhero::with('planet');
        $query = auth()->user()->superheroes();
        // o bé podríem haver fet, si iniciem una consulta sense cap mètode inicial
        // $query = Superhero::Query();

      // Si s'ha enviat el paràmetre searchName
      if ($request->has('searchName')) {
        $query->where('heroname','like','%'.$filters['searchName'].'%');
      }

      // Si s'ha enviat el pàrametre i té valor
      if ($request->filled('searchGender')) {
          $query->where('gender',$filters['searchGender']);
      }
        
        $superheroes = $query->paginate(5)->withQueryString();
        // El withQueryString serveix per a que al paginar s'afegeixin també els paràmetres GET 
        // que hi ha en la crida a la URL actual. En aquest exemple ?searchName=valor$searchGender=valor
        
        return view('mysuperhero.index',compact('superheroes','filters'));
           
    }



    public function edit_superpower($id,$id_power,Request $level)
    {
       

        $superhero = Superhero::findOrFail($id);
        $superhero->superpowers()->updateExistingPivot($id_power, ["amount" => $level->level]);
        //$powers = Superpowers::all();
       // poders($id);
        $superhero->load("superpowers");
        $superpowers = SuperPower::all();
        $superpowers = Superpower::all();
        return view('mysuperhero.poders',compact('superpowers','superhero'));
    }

    public function delete_superpower($id,$id_power)
    {
       
        $superhero = Superhero::findOrFail($id);
        $superhero->superpowers()->detach($id_power);

        $superhero->load("superpowers");
        $superpowers = Superpower::all();
        return view('mysuperhero.poders',compact('superpowers','superhero'));


    }
    public function add_superpower($id,Request $id_power)
    {
       
        $superhero = Superhero::findOrFail($id);
       


        try {
            $superhero->superpowers()->attach($id_power->id_power);;
            
        }
        catch(\Illuminate\Database\QueryException $e) {
            $superhero->load("superpowers");
            $superpowers = Superpower::all();
            return redirect()->route('mysuperhero.poders',compact('superpowers','superhero','id'))->with('error','Error al afegir poder.');
        }   

        //$powers = Superpowers::all();
       // poders($id);
        $superhero->load("superpowers");
        $superpowers = Superpower::all();
        return redirect()->route('mysuperhero.poders',compact('superpowers','superhero','id'))->with('success','Poder afegit correctament.');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planets = Planet::all();
        return view('mysuperhero.create',compact('planets'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'heroname' => 'required',
            'realname' => 'required',
            'planet_id' => 'required',
            'gender' => 'required',            
        ]);

        //$request->attributes['user_id'] = Auth::user()->id;
        //Superhero::create($request->all());
        Auth::user()->superheroes()->create($request->all());
    
        return redirect()->route('mysuperhero.index')
                        ->with('success','Heroi creat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $superhero = Superhero::findOrFail($id);
        $superhero->load("superpowers");
        return view('mysuperhero.show',compact('superhero'));
    }

    public function poders($id)
    {
        
        $superhero = Superhero::findOrFail($id);
        $superhero->load("superpowers");
        $superpowers = Superpower::all();
        return view('mysuperhero.poders',compact('superpowers','superhero'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superhero = Superhero::findOrFail($id);
        $planets = Planet::all();
        return view('mysuperhero.edit',compact('superhero','planets'));
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
        $request->validate([
            'heroname' => 'required',
            'realname' => 'required',
            'planet_id' => 'required',
            'gender' => 'required',             
        ]);

        $hero = Superhero::findOrFail($id);
        $hero->update($request->all());

    
        return redirect()->route('mysuperhero.index')
                        ->with('success','Heroi actualitzat correctament');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Auth::user()->superheroes()->findOrFail($id);

        try {
            $result = $hero->delete();
            
        }
        catch(\Illuminate\Database\QueryException $e) {
             return redirect()->route('mysuperhero.index')
                        ->with('error','Error esborrant el heroi');
        }   
        return redirect()->route('mysuperhero.index')
                        ->with('success','Heroi esborrat correctament.');
    }
}

