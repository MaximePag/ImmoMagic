<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\RealEstate;

class RealEstateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:RealEstate', ['except' => ['showAllRealEstateDetail']]);
    }
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
            
            return response()->json(['API_response' => 'Cr??ation effectu??e'], 201);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Cr??ation impossible'], 409);
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
            
            return response()->json(['API_response' => 'Modification effectu??e', 'API_data' => $realestate], 200);
        }
        catch (\Exception $e){
            return response()->json(['API_response' => 'Non trouv??'], 404);
        }
    }

    /**
     * Fonction deleteRealEstate
     * Mettre en archive le bien de la table RealEstate en fonction de l'id recherch??, sinon renvoi un message d'erreur
     * @param Request $id du bien recherch??
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation ainsi que le code HTML 200 ou 404
     */

    public function deleteRealEstate($id){
        try{
            $realestate = realestate::find($id);
            $realestate->update(['archived'=> 1]);
            return response()->json('Le fichier a ??t?? archiv??',200);
        }catch(\Exception $e){
            return response()->json('bien non trouv??',404);
        }
    }

    /**
     * fonction showRealEstateDetail
     * Retrouve les informations d'un bien cr????es par l'utilisateur en fonction de l'id recherch?? et message d'erreur si l'id ne correspond pas ?? un bien de l'utilisateur
     * @param Request $id de la mise en gestion recherch??e
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation avec le code HTML 200 ou 404
     */

    public function showRealEstateDetail($id){
        //try{
            $RealEstate = RealEstate::find($id);
            return response()->json($RealEstate);
        /* }catch(\Exception $e){
            return response()->json('bien non trouv??',404);
        } */
    }

// montre tous les biens
    public function showAllRealEstateDetail(){
            $RealEstate = RealEstate::all();
            return response()->json($RealEstate);
    }

   /**
     * fonction updateRealEstate
     * Met ?? jour le bien en fonction des param??tres, et de l'id. Message d'erreur si l'id ne correspond pas ?? un bien cr???? par l'utilisateur
     * R??cup??re la liste des biens cr???? par le proprietaire du TOKEN et si l'id ne correspond pas ?? l'un de cela on affiche une erreur
     * @param Request referencePublishing, houseApartment, SaleOrRental, title, fullText, coverImage, address, zip, city, complement, price, area, numberOfPieces, digicode, furniture, balcony, elevator, garden, garage, parking, cellar
     * @param Request $id du bien recherch??
     * @param User TOKEN in header
     * @return json Retourne un message de confirmation ainsi que le code HTML 201 ou 409
     */

    public function updateRealEstate($id, Request $request){
        try{
            $RealEstate = RealEstate::find($id);
            $RealEstate->update($request->all());
            return response()->json($RealEstate,200);
        }catch(\Exception $e){
            return response()->json('bien non trouv??',404);
        }
    }
}