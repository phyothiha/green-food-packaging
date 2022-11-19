<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use Illuminate\Http\Request;
use App\Services\FAHPService;
use App\Services\FTOPSISService;

class FAHPFTOPSISCalculationController extends Controller
{
    public function __construct(
        protected FTOPSISService $ftopsis_service,
        protected FAHPService $fahp_service,
    )
    {

    }

    public function store(Request $request)
    {
        // FAHP
        $type = $request->input('type.fahp');
        $this->fahp_service->calculate_fahp_phase_one($type);
        $this->fahp_service->calculate_fuzzy_number($type);
        $this->fahp_service->calculate_fuzzy_geometric_mean_value($type);
        $this->fahp_service->calculate_fuzzy_weight($type);

        // FTOPSIS
        $material = $request->input(['material']);
        $input = $request->input('type.ftopsis');
        $unselectedPackageMaterial = $request->input(['unselectedPackageMaterial']);
        $this->ftopsis_service->step_2($material, $input, $unselectedPackageMaterial);
        $this->ftopsis_service->step_3();
        $this->ftopsis_service->step_4();
        $this->ftopsis_service->step_4_cal();
        $this->ftopsis_service->step_5();
        $this->ftopsis_service->step_5_cal();
        $this->ftopsis_service->step_6();
        $this->ftopsis_service->step_7_a_star_result();
        $this->ftopsis_service->step_7_a_minus_result();
        $this->ftopsis_service->step_7_d_star_result();
        $this->ftopsis_service->step_7_d_minus_result();
        $this->ftopsis_service->step_8();
        $fahp_ftopsis = $this->ftopsis_service->ranking($material, $input);

        // FTOPSIS without FAHP weight calculations
        // $this->ftopsis_service->step_2($material, $input, $unselectedPackageMaterial);
        // $this->ftopsis_service->step_3();
        // $this->ftopsis_service->step_4();
        // $this->ftopsis_service->step_4_cal();
        $this->ftopsis_service->step_5();
        $this->ftopsis_service->step_5_cal();
        // $this->ftopsis_service->step_6();
        // $this->ftopsis_service->step_7_a_star_result();
        // $this->ftopsis_service->step_7_a_minus_result();
        // $this->ftopsis_service->step_7_d_star_result();
        // $this->ftopsis_service->step_7_d_minus_result();
        // $this->ftopsis_service->step_8();
        $pure_ftopsis = $this->ftopsis_service->ranking($material, $input);

        return view('fahp-ftopsis.result', [
            'material' => $material,
            'tbl' =>  $fahp_ftopsis,
            'pure_ftopsis' => $pure_ftopsis,
        ]);
    }
}
