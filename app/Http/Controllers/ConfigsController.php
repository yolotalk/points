<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configs;

class ConfigsController extends Controller
{

    public function index(Request $request) {
        $configModel = Configs::limit(1);
        if ($configModel->count() == 0) {
            $config = [
                "first_award" => 0,
                "second_award" => 0,
            ];
        }else{
            $configs = $configModel->first();
        }

        if (!$request->isMethod("post")) {

            return view("configs/index", [
                "configs" => $configs,
            ]);
        }
    }

    public function update(Request $request) {

        $configs = Configs::limit(1)->first();

        $request->validate([
            'first_award' => 'required|integer|min:0',
            'second_award' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        if ($configs instanceof Configs) {
            $configs->first_award = $data["first_award"];
            $configs->second_award = $data["second_award"];

            $msg = $configs->save() ? "succeed" : "failed";
        }else{
            $saved = Configs::create($data);
            $msg = $saved ? "succeed" : "failed";
        }

        return redirect('configs')->with('status', $msg);
        
    }
}
