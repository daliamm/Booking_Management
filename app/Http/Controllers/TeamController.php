<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

        public function AllTeam(){
            $team=Team::latest()->get();
             return view('backend.team.all_team',compact('team'));
        }
    
    }
