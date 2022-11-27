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
        $material_type = MaterialType::where('type', $material)->get();
        $material_type_package_material = $material_type->pluck('package_material');


        return view('fahp-ftopsis.result', [
            'tbl_key' => $material_type_package_material,
            'material' => $material,

            'step_2' => $this->ftopsis_service->step_2($material, $input, $unselectedPackageMaterial),
            'step_3' => $this->ftopsis_service->step_3(),
            'step_4' => $this->ftopsis_service->step_4(),
            'step_4_cal' => $this->ftopsis_service->step_4_cal(),
            'step_5' => $this->ftopsis_service->step_5(),
            'step_5_cal' => $this->ftopsis_service->step_5_cal(),
            'step_6' => $this->ftopsis_service->step_6(),
            'step_7_a_star_result' => $this->ftopsis_service->step_7_a_star_result(),
            'step_7_a_minus_result' => $this->ftopsis_service->step_7_a_minus_result(),
            'step_7_d_star_result' => $this->ftopsis_service->step_7_d_star_result(),
            'step_7_d_minus_result' => $this->ftopsis_service->step_7_d_minus_result(),
            'step_8' => $this->ftopsis_service->step_8(),
            'tbl' =>  $this->ftopsis_service->ranking($material, $input),

            'pure_step_2' => $this->ftopsis_service->pure_step_2($material, $input, $unselectedPackageMaterial),
            'pure_step_3' => $this->ftopsis_service->pure_step_3(),
            'pure_step_4' => $this->ftopsis_service->pure_step_4(),
            'pure_step_4_cal' => $this->ftopsis_service->pure_step_4_cal(),
            'pure_step_5' => $this->ftopsis_service->pure_step_5($type),
            'pure_step_5_cal' => $this->ftopsis_service->pure_step_5_cal(),
            'pure_step_6' => $this->ftopsis_service->pure_step_6(),
            'pure_step_7_a_star_result' => $this->ftopsis_service->pure_step_7_a_star_result(),
            'pure_step_7_a_minus_result' => $this->ftopsis_service->pure_step_7_a_minus_result(),
            'pure_step_7_d_star_result' => $this->ftopsis_service->pure_step_7_d_star_result(),
            'pure_step_7_d_minus_result' => $this->ftopsis_service->pure_step_7_d_minus_result(),
            'pure_step_8' => $this->ftopsis_service->pure_step_8(),
            'pure_ftopsis' =>  $this->ftopsis_service->pure_ranking($material, $input),
        ]);
    }
}
