<?php

namespace Database\Factories;

use App\Models\Follower;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Follower::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = rand(1, 503);
        $user2 = rand(1, 503);
        if($user==$user2){
            $user2 = rand(1, 503);
            $user = rand(1, 503);
        }
        $bucle = 0;
        $distinto = Follower::where('seguidor', $user)->where('seguido', $user2)->find(1);
        while($bucle==0){
            if($distinto==null){
                return [
                    'seguidor'=>$user,
                    'seguido'=>$user2
                ];
            }else{
                $user = rand(1, 503);
                $user2 = rand(1, 503);
                if($user==$user2){
                    $user2 = rand(1, 503);
                    $user = rand(1, 503);
                }
                $distinto = Follower::where('seguidor', $user)->where('seguido', $user2)->find(1);
            }
        }
    }
}
