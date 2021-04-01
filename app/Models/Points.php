<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\Users;
use App\Models\Configs;

class Points extends Model
{
    use HasFactory;

    public static function updateByNewRefer(Users $refer) {

        $configModel = Configs::limit(1);
        if ($configModel->count() == 0) {
            Log::emergency("no avaiable configs");
            return false;
        }
        $config = $configModel->first();

        $refer->points += $config->first_award;
        $updateData = [
            [
                "userid" => $refer->id,
                "incr" => $config->first_award,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ],
        ];

        if ($refer->pid > 0) {
            $parent = Users::find($refer->pid);
            $parent->points += $config->second_award;

            array_push($updateData, [
                "userid" => $parent->id,
                "incr" => $config->second_award,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);

            return Points::insert($updateData) && $refer->save() && $parent->save();
        }

        return Points::insert($updateData) && $refer->save();
        
    }
}
