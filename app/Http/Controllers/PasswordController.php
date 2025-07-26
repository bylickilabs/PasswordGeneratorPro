<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;

class PasswordController extends Controller
{
    public function index() {
        return Password::orderByDesc('created_at')->get();
    }

    public function store(Request $request) {
        return Password::create([
            'password' => $request->password,
            'strength' => $request->strength,
            'favorite' => $request->favorite ?? false
        ]);
    }

    public function update(Request $request, $id) {
        $pw = Password::findOrFail($id);
        $pw->favorite = $request->favorite;
        $pw->save();
        return $pw;
    }

    public function destroy($id) {
        Password::destroy($id);
        return response()->json(['deleted' => true]);
    }
}
