<?php

namespace App\Http\Controllers;
use App\Models\state_model;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StatesController extends Controller
{
    function __construct() {
        $this->state_model = new State_model(); // access to model
    }
    public function index(){
        $state = $this->state_model->get_data();
        return $state;
    }
}
