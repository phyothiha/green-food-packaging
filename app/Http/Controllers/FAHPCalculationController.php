<?php

namespace App\Http\Controllers;

use App\Services\FAHPService;
use Illuminate\Http\Request;

class FAHPCalculationController extends Controller
{
    public function __construct(
        private FAHPService $fahp_service
    )
    {
        //
    }

    // public function create()
    // {
    //     return view('fahp.create');
    // }

    public function store(Request $request)
    {
        $type = $request->only(['type']);

        session(['fahp-type' => $type]);

        return view('fahp.result', [
            'calculate_fahp_phase_one' => $this->fahp_service->calculate_fahp_phase_one($type['type']),
            'calculate_fuzzy_number' => $this->fahp_service->calculate_fuzzy_number($type['type']),
            'calculate_fuzzy_geometric_mean_value' => $this->fahp_service->calculate_fuzzy_geometric_mean_value($type['type']),
            'calculate_fuzzy_weight' => $this->fahp_service->calculate_fuzzy_weight($type['type']),
        ]);

        // t1 - 1,2,3,4 | 0 (not require)

        // t2 - 2,3,4 | 1

        // t3 - 1,3,4 | 2

        // t4 - 1,2,4 | 3

        // t5 - 1,2,3 | 4
    }
}
