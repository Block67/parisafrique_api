<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Retrait;

class RetraitController extends Controller
{

    public function getRetraitsEnCours()
    {
        $retraitsEnCours = Retrait::where('statut', 'en_cours')->paginate(15);

        return response()->json([
            'retraits_en_cours' => $retraitsEnCours,
        ]);
    }


    public function getRetraitsValides()
    {
        $retraitsValides = Retrait::where('statut', 'valide')->paginate(15);

        return response()->json([
            'retraits_valides' => $retraitsValides,
        ]);
    }

    public function getRetraitsEchoues()
    {
        $retraitsEchoues = Retrait::where('statut', 'echoue')->paginate(15);

        return response()->json([
            'retraits_echoues' => $retraitsEchoues,
        ]);
    }

    public function getRetraitsEnCoursUtilisateur()
    {
        $user = Auth::user();
        $retraitsEnCoursUtilisateur = Retrait::where('user_id', $user->id)
            ->where('statut', 'en_cours')
            ->paginate(15);

        return response()->json([
            'retraits_en_cours_utilisateur' => $retraitsEnCoursUtilisateur,
        ]);
    }

    public function getRetraitsValidesUtilisateur()
    {
        $user = Auth::user();
        $retraitsValidesUtilisateur = Retrait::where('user_id', $user->id)
            ->where('statut', 'valide')
            ->paginate(15);

        return response()->json([
            'retraits_valides_utilisateur' => $retraitsValidesUtilisateur,
        ]);
    }

    public function getRetraitsEchouesUtilisateur()
    {
        $user = Auth::user();
        $retraitsEchouesUtilisateur = Retrait::where('user_id', $user->id)
            ->where('statut', 'echoue')
            ->paginate(15);

        return response()->json([
            'retraits_echoues_utilisateur' => $retraitsEchouesUtilisateur,
        ]);
    }
}

