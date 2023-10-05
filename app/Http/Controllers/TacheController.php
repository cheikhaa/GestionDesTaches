<?php

namespace App\Http\Controllers;

use App\Models\Taches;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function listeTache()
    {
        $taches = Taches::all();
        return view('tache.index', compact('taches'));
    }
    public function ajoutTache()
    {
        return view('tache.ajout');
    }
    public function traitement(Request $request)
    {
        $request->validate(
            [
                'titre' => 'required',
                'description' => 'required',
                'date_limite' => 'required',
                'status' => 'required',
            ]
        );

        $task = new Taches();
        $task->titre = $request->titre;
        $task->description = $request->description;
        $task->date_limite = $request->date_limite;
        $task->status = $request->status;
        $task->save();

        return redirect('tache/ajout')->with('status', 'Tache ajoutée avec succes!');
    }
    public function updateTache($id)
    {
        $task = Taches::find($id);
        return view('tache.update', compact('task'));
    }
    public function updateTraitement(Request $request)
    {
        $request->validate(
            [
                'titre' => 'required',
                'description' => 'required',
                'date_limite' => 'required',
                'status' => 'required',
            ]
        );
        $task = Taches::find($request->id);

        if (!$task) {
            // Tâche non trouvée, vous pouvez gérer cette situation ici.
        } else {
            // Mettez à jour la tâche
            $task->titre = $request->titre;
            $task->description = $request->description;
            $task->date_limite = $request->date_limite;
            $task->status = $request->status;
            $task->update();
        }


        return redirect('/')->with('status', 'Tache modifier avec succes!');
    }

    public function deleteTache($id)
    {
        $task = Taches::find($id);
        $task->delete();
        return redirect('/')->with('status', 'Tache suppimer avec succes!');
    }
}
