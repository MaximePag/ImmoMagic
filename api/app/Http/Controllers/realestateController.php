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
    public function create(Request $request)
    {
    //validate incoming request 
        $this->validate($request, [
            'address' => 'required|string',
            'price' => 'required',
            'expenses' => 'required',
            'description' => 'required|string',
            'numberOfViews' => 'required',
            'livingArea' => 'required',
            'landArea' => 'required',
            'roomNumber' => 'required',
            'bedroomNumber' => 'required',
            'bathroomNumber' => 'required',
            'toiletNumber' => 'required',
            'floorNumber' => 'required',
            'GES' => 'required',
            'DPE' => 'required',
            'id_g5e1D_typeOfRealEstate' => 'required',
            'id_g5e1D_typeOfWaterEvacuation' => 'required',
            'id_g5e1D_typeOfContract' => 'required',
            'id_g5e1D_cities' => 'required',
            'id_g5e1D_status' => 'required',

        ]);

        try {
            $realestate = new RealEstate;
            
            $realestate->address = $request->input('address');
            $realestate->price = $request->input('price');
            $realestate->expenses = $request->input('expenses');
            $realestate->description = $request->input('description');
            $realestate->numberOfViews = $request->input('numberOfViews');
            $realestate->livingArea = $request->input('livingArea');
            $realestate->landArea = $request->input('landArea');
            $realestate->roomNumber = $request->input('roomNumber');
            $realestate->bedroomNumber = $request->input('bedroomNumber');
            $realestate->bathroomNumber = $request->input('bathroomNumber');
            $realestate->toiletNumber = $request->input('toiletNumber');
            $realestate->floorNumber = $request->input('floorNumber');
            $realestate->constructionYear = $request->input('constructionYear');
            $realestate->worksToBeDone = false;
            $realestate->GES = $request->input('GES');
            $realestate->DPE = $request->input('DPE');
            $realestate->id_g5e1D_typeOfRealEstate = $request->input('id_g5e1D_typeOfRealEstate');
            $realestate->id_g5e1D_typeOfWaterEvacuation = $request->input('id_g5e1D_typeOfWaterEvacuation');
            $realestate->id_g5e1D_typeOfContract = $request->input('id_g5e1D_typeOfContract');
            $realestate->id_g5e1D_cities = $request->input('id_g5e1D_cities');
            $realestate->id_g5e1D_status = $request->input('id_g5e1D_status');
            $realestate->archived = false;

            $realestate->save();
            
            return response()->json(['API_response' => 'Création effectuée'], 201);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Création impossible'], 409);
        }
    }

    public function update(Request $request, $id){

        //validate incoming request 
        $this->validate($request, [
            'address' => 'required|string',
            'price' => 'required',
            'expenses' => 'required',
            'description' => 'required|string',
            'numberOfViews' => 'required',
            'livingArea' => 'required',
            'landArea' => 'required',
            'roomNumber' => 'required',
            'bedroomNumber' => 'required',
            'bathroomNumber' => 'required',
            'toiletNumber' => 'required',
            'floorNumber' => 'required',
            'GES' => 'required',
            'DPE' => 'required',
            'id_g5e1D_typeOfRealEstate' => 'required',
            'id_g5e1D_typeOfWaterEvacuation' => 'required',
            'id_g5e1D_typeOfContract' => 'required',
            'id_g5e1D_cities' => 'required',
            'id_g5e1D_status' => 'required',

        ]);

        try {
            $realestate = RealEstate::findOrFail($id);

            $realestate->address = $request->input('address');
            $realestate->price = $request->input('price');
            $realestate->expenses = $request->input('expenses');
            $realestate->description = $request->input('description');
            $realestate->numberOfViews = $request->input('numberOfViews');
            $realestate->livingArea = $request->input('livingArea');
            $realestate->landArea = $request->input('landArea');
            $realestate->roomNumber = $request->input('roomNumber');
            $realestate->bedroomNumber = $request->input('bedroomNumber');
            $realestate->bathroomNumber = $request->input('bathroomNumber');
            $realestate->toiletNumber = $request->input('toiletNumber');
            $realestate->floorNumber = $request->input('floorNumber');
            $realestate->constructionYear = $request->input('constructionYear');
            $realestate->worksToBeDone = false;
            $realestate->GES = $request->input('GES');
            $realestate->DPE = $request->input('DPE');
            $realestate->id_g5e1D_typeOfRealEstate = $request->input('id_g5e1D_typeOfRealEstate');
            $realestate->id_g5e1D_typeOfWaterEvacuation = $request->input('id_g5e1D_typeOfWaterEvacuation');
            $realestate->id_g5e1D_typeOfContract = $request->input('id_g5e1D_typeOfContract');
            $realestate->id_g5e1D_cities = $request->input('id_g5e1D_cities');
            $realestate->id_g5e1D_status = $request->input('id_g5e1D_status');
            $realestate->archived = false;

            $realestate->save();
            
            return response()->json(['API_response' => 'Modification effectuée', 'API_data' => $realestate], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouvé'], 404);
        }
    }

    /**
     * Fonction deleterealestate
     * Mettre en archive le bien de la table realestate en fonction de l'id recherché, sinon renvoi un message d'erreur
     * @param Request $id du bien recherché
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation ainsi que le code HTML 200 ou 404
     */

    public function deleterealestate($id){
        try{
            $realestate = realestate::find($id);
            $realestate->update(['archived'=> 1]);
            return response()->json('Le fichier a été archivé',200);
        }catch(\Exception $e){
            return response()->json('bien non trouvé',404);
        }
    }

    /**
     * fonction showrealestateDetail
     * Retrouve les informations d'un bien créées par l'utilisateur en fonction de l'id recherché et message d'erreur si l'id ne correspond pas à un bien de l'utilisateur
     * @param Request $id de la mise en gestion recherchée
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation avec le code HTML 200 ou 404
     */

    public function showrealestateDetail($id){
        //try{
            $realestate = realestate::find($id);
            return response()->json($realestate);
        /* }catch(\Exception $e){
            return response()->json('bien non trouvé',404);
        } */
    }

// montre tous les biens
    public function showAllrealestateDetail(){
            $realestate = realestate::all();
            return response()->json($realestate);
    }

   /**
     * fonction updaterealestate
     * Met à jour le bien en fonction des paramètres, et de l'id. Message d'erreur si l'id ne correspond pas à un bien créé par l'utilisateur
     * Récupère la liste des biens créé par le proprietaire du TOKEN et si l'id ne correspond pas à l'un de cela on affiche une erreur
     * @param Request referencePublishing, houseApartment, SaleOrRental, title, fullText, coverImage, address, zip, city, complement, price, area, numberOfPieces, digicode, furniture, balcony, elevator, garden, garage, parking, cellar
     * @param Request $id du bien recherché
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation ainsi que le code HTML 201 ou 409
     */

    public function updaterealestate($id, Request $request){
        try{
            $realestate = realestate::find($id);
            $realestate->update($request->all());
            return response()->json($realestate,200);
        }catch(\Exception $e){
            return response()->json('bien non trouvé',404);
        }
    }
}