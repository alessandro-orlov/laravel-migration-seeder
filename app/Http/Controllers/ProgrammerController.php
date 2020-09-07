<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programmer;

class ProgrammerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $programmers = Programmer::all();

      $programmers = Programmer::orderBy('created_at', 'desc')->get();

      return view('programmers.index', compact('programmers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('programmers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validazione
      $request->validate($this->validationData());

      // Metto nella variabile i dati passati dalla pagina 'create' che restituisce un array
      $requested_data = $request->all();

      // Creo una nuova istanza con i dati passati dall'array
      $newProgrammer = new Programmer();
      $newProgrammer->name = $requested_data['name'];
      $newProgrammer->lastname = $requested_data['lastname'];
      $newProgrammer->age = $requested_data['age'];
      $newProgrammer->tecnology = $requested_data['tecnology'];
      $newProgrammer->note = $requested_data['note'];

      // Salvo l'istanza nel database mySQL
      $newProgrammer->save();

      // Reindizrizzo alla nuova pagina creata
      return redirect()->route('programmers.show', $newProgrammer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Programmer $programmer)
    {
        return view('programmers.show', compact('programmer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Programmer $programmer)
    {
        return view('programmers.edit', compact('programmer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programmer $programmer)
    {
      // Validazione
      $request->validate($this->validationData());

      // Metto nella variabile i dati passati dalla pagina 'create' che restituisce un array
      $requested_data = $request->all();

      $programmer->update($requested_data);

      // Salvo l'istanza nel database mySQL
      $programmer->save();

      // Reindizrizzo alla nuova pagina creata
      return redirect()->route('programmers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programmer $programmer)
    {
        // Rimuovo il record selezionato ($programmer->id)
        $programmer->delete();

        // Redirect alla pagina principale
        return redirect()->route('programmers.index');

    }

    // Validazione
    protected function validationData() {
      return [
        'name' => 'required|max:255',
        'lastname' => 'required|max:255',
        'age' => 'required|integer|min:1|max:110',
        'tecnology' => 'required',
      ];
    }
}
