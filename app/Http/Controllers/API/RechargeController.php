<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recharge;

class RechargeController extends Controller
{
    public function getRechargesEnCours()
    {
        $rechargesEnCours = Recharge::where('statut', 'en_cours')->paginate(15);

        return response()->json([
            'recharges_en_cours' => $rechargesEnCours,
        ]);
    }

    public function getRechargesValides()
    {
        $rechargesValides = Recharge::where('statut', 'valide')->paginate(15);

        return response()->json([
            'recharges_valides' => $rechargesValides,
        ]);
    }

    public function getRechargesEchoues()
    {
        $rechargesEchoues = Recharge::where('statut', 'echoue')->paginate(15);

        return response()->json([
            'recharges_echoues' => $rechargesEchoues,
        ]);
    }

    public function getRechargesEnCoursUtilisateur()
    {
        $user = Auth::user();
        $rechargesEnCoursUtilisateur = Recharge::where('user_id', $user->id)
            ->where('statut', 'en_cours')
            ->paginate(15);

        return response()->json([
            'recharges_en_cours_utilisateur' => $rechargesEnCoursUtilisateur,
        ]);
    }

    public function getRechargesValidesUtilisateur()
    {
        $user = Auth::user();
        $rechargesValidesUtilisateur = Recharge::where('user_id', $user->id)
            ->where('statut', 'valide')
            ->paginate(15);

        return response()->json([
            'recharges_valides_utilisateur' => $rechargesValidesUtilisateur,
        ]);
    }

    public function getRechargesEchouesUtilisateur()
    {
        $user = Auth::user();
        $rechargesEchouesUtilisateur = Recharge::where('user_id', $user->id)
            ->where('statut', 'echoue')
            ->paginate(15);

        return response()->json([
            'recharges_echoues_utilisateur' => $rechargesEchouesUtilisateur,
        ]);
    }
}
