<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Exception;
use Session;
use Log;
use Auth;

class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            Log::info('listing the pets');
            // SELECT * FROM pets
            $pets = Pet::all();
            return view('pets', compact('pets'));
        } else {
            Session::flash('error', 'Only administrator users are allowed to open this page');
        }

        return redirect('/home');
    }

    public function showEditForm($id)
    {
        // SELECT * FROM pets WHERE id=$id
        $pet = Pet::find($id);
        if (!is_null($pet)) {
            return view('edit-pet', compact('pet'));
        }
        Session::flash('error', 'We cannot find the record you are looking for.');
        return redirect()->back();
    }

    public function showNewForm()
    {
        return view('new-pet-form');
    }

    public function savePetChanges(Request $request)
    {
        $validated = $request->validate([
            'pet_name' => 'required|max:150',
            'pet_owner' => 'required|max:150'
        ]);

        try {
            $id = $request->id;
            $pet = Pet::find($id);
            $pet->update([
                'pet_name' => $request->pet_name,
                'animal_type' => $request->animal_type,
                'pet_owner' => $request->pet_owner,
                'owner_address' => $request->owner_address
            ]);
            // $pet->setName($request->name);
            // $pet->setAddress($request->address);
            // $pet->setContactNumber($request->contact_number);
            // $pet->setType($request->type);
            // $pet->setWebsiteURL($request->website_url);

            Session::flash('message', 'Successfully updated pet');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later');
        }
        
        return redirect('/pets');
    }

    public function saveNewPet(Request $request)
    {
        $validated = $request->validate([
            'pet_name' => 'required|max:150',
            'pet_owner' => 'required|max:80'
        ]);

        try {
            $org = Pet::create([
                'pet_name' => $request->pet_name,
                'animal_type' => $request->animal_type,
                'pet_owner' => $request->pet_owner,
                'owner_address' => $request->owner_address
            ]);
            if (!is_null($org)) {
                Session::flash('message', 'Successfully added a new pet');
            } else {
                throw new Exception('Unable to create a new pet');
            }
            
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong, please try again later');
        }

        return redirect('/pets');
    }

    public function deletepet($id)
    {
        $pet = pet::find($id);
        $pet->delete();
        // DELETE FROM pets WHERE id=$id

        Session::flash('message', 'Successfully removed a record');
        return redirect('/pets');
    }
}
