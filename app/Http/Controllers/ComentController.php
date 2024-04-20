<?php


namespace App\Http\Controllers;

use App\Models\Coment;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ComentController extends Controller
{
    public function create($id, Request $request)
    {

        $coment = new Coment();
        $coment->name = $request->name;
        $coment->description = $request->description;
        $coment->product_id = $id;
        $coment->save();
        return Redirect::action([ProductsController::class, 'getProduct'], ['id' => $id]);
    }
}
