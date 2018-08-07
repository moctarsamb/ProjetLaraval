<?php

namespace App\Http\Controllers;

use App\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    //
    /**
     * Fonction d'ajput
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request){
        $this->validate($request,[
            'prenom' => 'required',
            'nom' => 'required',
        ]);
        $etudiant = new Etudiant();
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->email = $request->input('email');
        $etudiant->telephone = $request->input('telephone');
        $etudiant->ddn = $request->input('ddn');
        try{
            $etudiant->save();
        }
        catch (\Exception $e){
            return back()->with('error',trans('etudiant.msgenregistrementfail'));

        }
        return back()->with('status',trans('etudiant.msgenregistrementok'));
    }

    /**
     * Function to show an etudiant
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show($id){
        $etudiant = Etudiant::findorfail($id);

        return view('etudiant.show',compact('etudiant'));
    }

    /**
     * Function to edit
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id){
        $etudiant = Etudiant::findorfail($id);

        return view('etudiant.edit',compact('etudiant')) ;
    }

    /**
     * Function to update in the database
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id){
        $this->validate($request,[
            'prenom' => 'required',
            'nom' => 'required',
        ]);
        $etudiant = Etudiant::findorfail($id);
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->email = $request->input('email');
        $etudiant->telephone = $request->input('telephone');
        $etudiant->ddn = $request->input('ddn');
        try{
            $etudiant->save();
        }
        catch (\Exception $e){
            return redirect('/')->with('error',trans('etudiant.miseajourfail'));

        }
        return redirect('/')->with('status',trans('etudiant.miseajourok'));
    }

    /**
     * Function to delete
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $etudiant = Etudiant::destroy($id);
        return redirect('/')->with('status',trans('etudiant.supprok'));
    }

}
