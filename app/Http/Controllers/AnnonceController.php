<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AnnonceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search !== "") {
            $annonces = Annonce::where(function ($query) use ($search) {
                $query->where('id', 'like', '%'.$search.'%')
                    ->orWhere('title', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            })->orderBy('id', 'DESC')->paginate(8);

            $annonces->appends(['q' => $search]);
        } else {
            $annonces = Annonce::orderBy('id', 'DESC')->paginate(8);
        }

        return view('annonces.index', compact('annonces'));
    }

    public function showCreateAnnonce()
    {
        return view('annonces.create');
    }

    public function createAnnonce(Request $request)
    {
        $rules = [
            'title' => 'required | max:50',
//            'image'         => 'required | mimes:jpeg,jpg,png,gif,bmp,tiff | max:10000',
            'description' => 'required | max:200',
            'price' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'Tout les champs doit être remplie et valide!');
        }

//        $path = Str::random(6) .'.'.$request->file('image')->getClientOriginalExtension();
//        $request->file('image')->move(('storage/images'), $path);

        $annonce = new Annonce;
        $annonce->title = $request->input('title');
        $annonce->description = $request->input('description');
        $annonce->price = str_replace(".", "", $request->input('price'));
//        $annonce->image = $path;
        $annonce->user_id = auth()->user()->id;
        $annonce->save();


        return redirect()
            ->route('annonce.show', ['id' => $annonce->id])
            ->with('success', 'Votre annonce a été crée avec success!');
    }

    public function showAnnonce($id)
    {
        $annonce = Annonce::where('id', $id)->firstOrFail();

        return view('annonces.show', compact('annonce'));
    }

    public function deleteAnnonce($id)
    {
        $annonce = Annonce::where('id', $id)->firstOrFail();

        $annonce->delete();

        return redirect()->back();
    }

    public function editAnnonce($id)
    {
        $annonce = Annonce::where('id', $id)->firstOrFail();

        return view('annonces.edit', compact('annonce'));
    }
    public function updateAnnonce(Request $request, $id)
    {
        $annonce = Annonce::where('id', $id)->firstOrFail();

        $rules = [
            'title' => 'required | max:50',
            'image' => 'nullable | mimes:jpeg,jpg,png,gif,bmp,tiff',
            'images' => 'nullable | max:5',
            'images.*' => 'nullable | mimes:jpeg,jpg,png,gif,bmp,tiff',
            'description' => 'required | max:200',
            'price' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->with('error', 'faut tout remplir sinon ça marche pas');
        }

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $name = 'storage/images/' . Str::random(6) . '.' . $file->extension();
                $file->move(public_path() . 'storage/images/', $name);
                $data[] = $name;
            }
        }


        $annonce->title = $request->input('title');
        $annonce->description = $request->input('description');
        $annonce->price = str_replace(".", "", $request->input('price'));
        $annonce->user_id = auth()->user()->id;
        $annonce->save();


        return redirect()
            ->route('annonce.show', ['id' => $annonce->id])
            ->with('success', 'Votre annonce a été modifié avec success!');
    }

}
