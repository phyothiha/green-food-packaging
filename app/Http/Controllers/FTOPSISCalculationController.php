<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FTOPSISService;

class FTOPSISCalculationController extends Controller
{
    public function __construct(
        protected FTOPSISService $ftopsis_service
    )
    {

    }

    public function store(Request $request)
    {
        $material = $request->only(['material']);
        $input = $request->only(['type']);

        return view('ftopsis.result', [
            'step_2' => $this->ftopsis_service->step_2($material, $input['type']),
            'step_3' => $this->ftopsis_service->step_3(),
            'step_4' => $this->ftopsis_service->step_4(),
            'step_4_cal' => $this->ftopsis_service->step_4_cal(),
            'step_5' => $this->ftopsis_service->step_5(),
            'step_5_cal' => $this->ftopsis_service->step_5_cal(),
        ]);
    }
}
