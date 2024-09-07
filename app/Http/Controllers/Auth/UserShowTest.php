<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class UserShowTest extends Controller
{
        public function show($id)
        {
            Log::info("getswift order sync: this merchant ");
            $firstquarter1 = array('January', 'February', 'March');
            $firstquarter = array('1', '2', $id);
           return view('travellist', ['visited' => $firstquarter1, 'togo' => $firstquarter ] );
        }

}
