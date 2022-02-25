<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\RealEstate;

class RealEstateController extends Controller
{
    /**
     * Store a new realEsate.
     *
     * @param  Request  $request
     * @return Response
     */
    public function createRealEstate(Request $request)
    {
        //validate incoming request 
            $this->validate($request, [
            'adress' => 'required|string',
            'price' => 'required',
            'expenses' => 'required',
            'description' => 'required|string',
            'numberOfViews' => 'required',
            'livingArea' => 'required',
            'landArea' => 'required',
            'livingRoomArea' => 'required',
            'roomNumber' => 'required',
            'bedroomNumber' => 'required',
            'bathroomNumber' => 'required',
            'toiletNumber' => 'required',
            'floorNumber' => 'required',



            'GES' => 'required',
            'DPE' => 'required',

            ]);

            try {
                $RealEstate = new RealEstate;
                $RealEstate->adress = $request->input('adress');
                $RealEstate->price = $request->input('price');
                $RealEstate->expenses = $request->input('expenses');
                $RealEstate->description = $request->input('description');
                $RealEstate->numberOfViews = $request->input('numberOfViews');
                $RealEstate->livingArea = $request->input('livingArea');
                $RealEstate->landArea = $request->input('landArea');
                $RealEstate->livingRoomArea = $request->input('livingRoomArea');
                $RealEstate->roomNumber = $request->input('roomNumber');
                $RealEstate->bedroomNumber = $request->input('bedroomNumber');
                $RealEstate->bathroomNumber = $request->input('bathroomNumber');
                $RealEstate->toiletNumber = $request->input('toiletNumber');
                $RealEstate->floorNumber = $request->input('floorNumber');
                $RealEstate->garage = false;
                $RealEstate->parking = false;
                $RealEstate->constructionYear = $request->input('constructionYear');
                $RealEstate->worksToBeDone = false;
                $RealEstate->GES = $request->input('GES');
                $RealEstate->DPE = $request->input('DPE');
                $RealEstate->archives = false;

                $RealEstate->save();
                
                 return response()->json(['RealEstate' => $RealEstate, 'message'=> 'le bien a été créé'], 201); 
           } catch(\Exception $e) {
                return response()->json(['message' => 'ça marche pas'], 404); 
            }
        }

  

    /**
     * Fonction deleteRealEstate
     * Mettre en archive le bien de la table RealEstate en fonction de l'id recherché, sinon renvoi un message d'erreur
     * @param Request $id du bien recherché
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation ainsi que le code HTML 200 ou 404
     */

    public function deleteRealEstate($id){
        try{
            $RealEstate = RealEstate::find($id);
            $RealEstate->update(['archives'=> 1]);
            return response()->json('Le fichier a été archivé',200);
        }catch(\Exception $e){
            return response()->json('bien non trouvé',404);
        }
    }

    /**
     * fonction showRealEstateDetail
     * Retrouve les informations d'un bien créées par l'utilisateur en fonction de l'id recherché et message d'erreur si l'id ne correspond pas à un bien de l'utilisateur
     * @param Request $id de la mise en gestion recherchée
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation avec le code HTML 200 ou 404
     */

    public function showRealEstateDetail($id){
        //try{
            $RealEstate = RealEstate::find($id);
            return response()->json($RealEstate);
        /* }catch(\Exception $e){
            return response()->json('bien non trouvé',404);
        } */
    }

// montre tous les biens
    public function showAllRealEstateDetail(){
            $RealEstate = RealEstate::all();
            return response()->json($RealEstate);
    }

   /**
     * fonction updateRealEstate
     * Met à jour le bien en fonction des paramètres, et de l'id. Message d'erreur si l'id ne correspond pas à un bien créé par l'utilisateur
     * Récupère la liste des biens créé par le proprietaire du TOKEN et si l'id ne correspond pas à l'un de cela on affiche une erreur
     * @param Request referencePublishing, houseApartment, SaleOrRental, title, fullText, coverImage, address, zip, city, complement, price, area, numberOfPieces, digicode, furniture, balcony, elevator, garden, garage, parking, cellar
     * @param Request $id du bien recherché
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation ainsi que le code HTML 201 ou 409
     */

    public function updateRealEstate($id, Request $request){
        try{
            $RealEstate = RealEstate::find($id);
            $RealEstate->update($request->all());
            return response()->json($RealEstate,200);
        }catch(\Exception $e){
            return response()->json('bien non trouvé',404);
        }
    }
}