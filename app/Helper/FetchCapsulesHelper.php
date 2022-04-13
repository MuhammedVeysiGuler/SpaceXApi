<?php

namespace App\Helper;

use App\Models\Capsules;
use App\Models\Missions;
use League\Uri\Http;

class FetchCapsulesHelper{


    public static function fetch($function){
        switch ($function){
            case "all":
                FetchCapsulesHelper::getAllCapsules();
                dd("all çalıştı");
                break;
            default:
                dd("Böyle bir komut bulunamadı");
                break;
        }
    }

    public static function getAllCapsules(){
        $url = "https://api.spacexdata.com/v3/capsules";
        $result = \Illuminate\Support\Facades\Http::withHeaders(
            [
                'Content-Type' => 'application/json'
            ]
        )->get($url);
        $result = json_decode($result->body());
        foreach ($result as $capsule){
            if(Capsules::where('capsule_serial',$capsule->capsule_serial)->first()){
                $new_capsule = Capsules::where('capsule_serial',$capsule->capsule_serial)->first();
                $new_capsule->capsule_id = $capsule->capsule_id;
                $new_capsule->capsule_serial = $capsule->capsule_serial;
                $new_capsule->status = $capsule->status;
                if (isset($capsule->original_launch)){
                    $capsule->original_launch = date('Y-m-d h:i:s', strtotime($capsule->original_launch));
                    $new_capsule->original_launch = $capsule->original_launch;
                }
                if (isset($capsule->original_launch_unix)){
                    $new_capsule->original_launch_unix = $capsule->original_launch_unix;
                }
                if (isset($capsule->landings)){
                    $new_capsule->landings = $capsule->landings;
                }
                if (isset($capsule->type)){
                    $new_capsule->type = $capsule->type;
                }
                if (isset($capsule->details)){
                    $new_capsule->details = $capsule->details;
                }
                if (isset($capsule->reuse_count)){
                    $new_capsule->reuse_count = $capsule->reuse_count;
                }
                $new_capsule->save();
                if (isset($capsule->missions)){
                    foreach ($capsule->missions as $mission){
                        $new_missions = Missions::where('capsule_id',$new_capsule->id)->first();
                        $new_missions->name = $mission->name;
                        $new_missions->flight = $mission->flight;
                        $new_missions->capsule_id = $new_capsule->id;
                        $new_missions->save();
                    }
                }
            }
            else{
                $new_capsule = new Capsules();
                $new_capsule->capsule_id = $capsule->capsule_id;
                $new_capsule->capsule_serial = $capsule->capsule_serial;
                $new_capsule->status = $capsule->status;
                if (isset($capsule->original_launch)){
                    $capsule->original_launch = date('Y-m-d h:i:s', strtotime($capsule->original_launch));
                    $new_capsule->original_launch = $capsule->original_launch;
                }
                if (isset($capsule->original_launch_unix)){
                    $new_capsule->original_launch_unix = $capsule->original_launch_unix;
                }
                if (isset($capsule->landings)){
                    $new_capsule->landings = $capsule->landings;
                }
                if (isset($capsule->type)){
                    $new_capsule->type = $capsule->type;
                }
                if (isset($capsule->details)){
                    $new_capsule->details = $capsule->details;
                }
                if (isset($capsule->reuse_count)){
                    $new_capsule->reuse_count = $capsule->reuse_count;
                }
                $new_capsule->save();
                if (isset($capsule->missions)){
                    foreach ($capsule->missions as $mission){
                        $new_missions = new Missions();
                        $new_missions->name = $mission->name;
                        $new_missions->flight = $mission->flight;
                        $new_missions->capsule_id = $new_capsule->id;
                        $new_missions->save();
                    }
                }
            }
        }

    }
}
