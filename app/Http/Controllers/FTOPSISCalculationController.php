<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
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
        $material = $request->input(['material']);

        $input = $request->input(['type']);

        $unselectedPackageMaterial = $request->input(['unselectedPackageMaterial']);

        $material_type = MaterialType::where('type', $material)->get();
        $material_type_package_material = $material_type->pluck('package_material');

        // dd($material, $input, $unselectedPackageMaterial, $material_type_package_material);
        // dd($unselectedPackageMaterial);

        $selected_package_material_index = $request->input(['selectedPackageMaterialIndex']);

        return view('ftopsis.result', [
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
            'step_8' => $this->ftopsis_service->step_8($selected_package_material_index),
            'tbl' =>  $this->ftopsis_service->ranking($material, $input),
            'x_bar' => $this->ftopsis_service->x_bar(),
            'mse' => $this->ftopsis_service->mse(),
            'rmse' => $this->ftopsis_service->rmse(),
            'mae' => $this->ftopsis_service->mae(),
        ]);
    }
}
