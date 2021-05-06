<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;

class ApartmentController extends Controller
{
    public function welcome() {
        $apartments = Apartment::get();
        $covers = Apartment::orderBy('created_at', 'asc')->limit(3)->get();
        $latests = Apartment::orderBy('created_at', 'desc')->limit(5)->get();

        return view('welcome', [
            'apartments' => $apartments,
            'covers' => $covers,
            'latests' => $latests
        ]);
    }

    public function index() {
        return view('userDashboard.addPropertyForm');
    }

    public function show(Request $request) {
        $users = DB::table('apartments')->where('user_id', $request->id)->paginate(10);

        return view('userDashboard.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request) {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'house_number' => 'required|string|max:11',
        //     'house_image' => 'required',
        //     'road' => 'required|integer|max:2',
        //     'area' => 'required|max:255|string',
        //     'thana' => 'required|max:255|string',
        //     'district' => 'required|max:255|string',
        //     'division' => 'required|max:255|string',
        //     'zip_code' => 'required'
        // ]);

        $apartment = new Apartment();

        $aparts = [];
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $apart)
            {
                $name = time().rand(1,100).'.'.$apart->extension();
                $apart->move(public_path('uploads/apartments'), $name);
                $aparts[] = $name;
            }
        }

        $apartment->name = strtolower(preg_replace('/\s+/', '', $request->name));
        $apartment->user_id = $request->id;
        $apartment->description = $request->description;
        $apartment->house_number = $request->house_number;
        $apartment->house_image = json_encode($aparts);
        $apartment->road = $request->road;
        $apartment->area = $request->area;
        $apartment->thana = strtolower(preg_replace('/\s+/', '', $request->thana));
        $apartment->district = strtolower(preg_replace('/\s+/', '', $request->district));
        $apartment->division = strtolower(preg_replace('/\s+/', '', $request->division));
        $apartment->zip_code = $request->zip_code;
        $apartment->rent = $request->rent;
        $apartment->beds = $request->beds;
        $apartment->baths = $request->baths;
        $apartment->garage = $request->garage;
        $apartment->balcony = $request->balcony;

        $apartment->save();

        return redirect('/')->with('msg', 'Apartment is added');
    }

    public function shoWSingleApartment(Request $request) {
        $user = Apartment::where('id', $request->id)->first();
        $images = json_decode($user->house_image);
        $agent = User::where('id', $user->user_id)->first();
        $apartment_id = $request->id;

        return view('userDashboard.property-single', [
            'user' => $user,
            'images' => $images,
            'agent' => $agent,
            'apartment_id' => $apartment_id
        ]);
    }

    public function showAllApartments() {
        $apartments = Apartment::orderby('created_at', 'asc')->limit(6)->paginate();

        return view('all_apartments', [
            'apartments' => $apartments
        ]);
    }

    public function search(Request $request) {
        $apartments = Apartment::

        when($request->key, function($query) use ($request){
            if($request->key == null) {
                return;
            }   else {
                $query->where('name', 'like', '%'. strtolower(preg_replace('/\s+/', '', $request->key)) . '%');
            }
        })
        ->when($request->thana, function($query) use ($request){
            if($request->thana == null) {
                return;
            }   else {
                $query->where('thana', 'like', '%'. strtolower(preg_replace('/\s+/', '', $request->thana)). '%');
            }
        })
        ->when( $request->city, function($query) use ($request){
            if($request->city == null) {
                return;
            }   else {
                $query->where('city', 'like', '%'. strtolower(preg_replace('/\s+/', '', $request->city)) .'%');
            }
        })
        ->when( $request->beds, function($query) use ($request){
            if($request->beds == '*') {
                return;
            }   else {
                $query->where('beds', 'like', '%'. strtolower(preg_replace('/\s+/', '', $request->beds)) .'%');
            }
        })
        ->when( $request->garage, function($query) use ($request){
            if($request->garage == 0) {
                return;
            }   else {
                $query->where('beds', 'like', '%'. strtolower(preg_replace('/\s+/', '', $request->garage)) .'%');
            }
        })
        ->when( $request->rents, function($query) use ($request){
            if($request->rents == null) {
                return;
            }   else {
                $query->where('rents', '<=', $request->rent);
            }
        })
        ->get();

        return view('apartment-search', [
            'apartments' => $apartments
        ]);
    }
}
