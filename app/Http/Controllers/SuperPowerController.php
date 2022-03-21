<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superpower; // Afegir la classe Model!!!!!!!!!!!!!!!!!!!
class SuperPowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $superPowers = SuperPower::all();
        $superPowers = SuperPower::Paginate (5);
        // Carreguem la vista planets/index.blade.php 
        // i li passem la llista de planetes
        return view('superPower.index',compact('superPowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("superPower.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Validació dels camps
       $request->validate([
        'description' => 'required',            
    ]);

    // Primera forma: breu,insegura, necessita tenir array $fillable al model
    Superpower::create($request->all());
 
    return redirect()->route('superPower.index')
                    ->with('success','Poder creat correctament.');
    }


    public function show($id)
    {
       
       $superpower = Superpower::findOrFail($id);
       
       return view('superPower.show',compact('superpower'));
    }

   
    public function edit($id)
    {
        $superpower = Superpower::findOrFail($id);
        return view('superPower.edit',compact('superpower'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',           
        ]);
    
        // Opcio 1
        $superpower = Superpower::findOrFail($id);
        $superpower->update($request->all());

        // Opcio 2
        // $planet->name = $request->name;
        // $planet->save();
    
        return redirect()->route('superPower.index')
                        ->with('success','Poder actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //  Obtenim el planeta que volem esborrar
       $superpower = Superpower::findOrFail($id);
       // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
       // es produiria un error en l'esborrat!!!!
       try {
           $result = $superpower->delete();
           
       }
       catch(\Illuminate\Database\QueryException $e) {
            return redirect()->route('superPower.index')
                       ->with('error','Error esborrant el poder');
       }   
       return redirect()->route('superPower.index')
                       ->with('success','Poder esborrat correctament.');
    }
}
