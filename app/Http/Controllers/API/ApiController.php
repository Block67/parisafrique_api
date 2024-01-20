<?php

namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    // Inscription d'utilisateur (POST, formdata)
    public function register(Request $request){
        
        // Validation des données
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        // Modèle d'utilisateur
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        // Réponse
        return response()->json([
            "status" => true,
            "message" => "Utilisateur inscrit avec succès"
        ]);
    }

    // Connexion de l'utilisateur (POST, formdata)
    public function login(Request $request){
        
        // Validation des données
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        // JWTAuth
        $token = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        if(!empty($token)){

            return response()->json([
                "status" => true,
                "message" => "Utilisateur connecté avec succès",
                "token" => $token
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Détails invalides"
        ]);
    }

    // Profil de l'utilisateur (GET)
    public function profile(){

        $donneesUtilisateur = auth()->user();

        return response()->json([
            "status" => true,
            "message" => "Données du profil",
            "data" => $donneesUtilisateur
        ]);
    } 

    // Déconnexion de l'utilisateur (POST)
    public function logout(){
        
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "Utilisateur déconnecté avec succès"
        ]);
    }
}
