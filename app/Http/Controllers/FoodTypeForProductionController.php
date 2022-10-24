<?php

namespace App\Http\Controllers;

use App\Models\MaterialConsumerMarketingIssue;
use App\Models\MaterialCost;
use App\Models\MaterialEnvironmentalImpact;
use App\Models\MaterialProperties;
use App\Models\MaterialType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodTypeForProductionController extends Controller
{
    public function index(Request $request)
    {
        DB::statement("SET SQL_MODE=''");

        $materials = MaterialType::query();

        if ($request->filled('q')) {
            $q = $request->query('q');

            $materials = MaterialType::where('type', 'like', "%$q%");
        }

        $materials = $materials->groupBy('type')
                                ->paginate(10);

        return view('food-type-for-production.index', [
            'materials' => $materials,
        ]);
    }

    public function show(Request $request)
    {
        $food_type = $request->query('q');

        // FOR FTOPSIS
        $ftopsis_data = [];

        // Type of Materials
        $material_type = MaterialType::where('type', $food_type)->get();
        $material_type_package_material = $material_type->pluck('package_material');

        // Type of Cost
        // $material_cost = MaterialCost::query();
        // Environmental Profile
        // $environmental_impact = MaterialEnvironmentalImpact::query();
        // Consumer/Marketing Issues
        // $consumer_marketing_issue = MaterialConsumerMarketingIssue::query();
        // Properties
        // $properties = MaterialProperties::query();

        foreach ($material_type_package_material as $item) {
            $ftopsis_data[$item] = [
                'cost' => MaterialCost::where('package_material', $item)->get()->pluck('cost')->toArray(),
                'env' => MaterialEnvironmentalImpact::where('package_material', $item)->get()->pluck('impact')->toArray(),
                'cmi' => MaterialConsumerMarketingIssue::where('package_material', $item)->get()->pluck('issue')->toArray(),
                'prop' => MaterialProperties::where('package_material', $item)->get()->pluck('property')->toArray(),
            ];
        }

        return view('food-type-for-production.calculation', [
            'ftopsis_data' => $ftopsis_data,
            'material_type_package_material' => $material_type_package_material,
            // 'ftopsis_data' => [
            //     'Glass' => [
            //         'cost' => ['cost_glass', 'cost_glass', 'cost_glass'],
            //         'env' => ['env_glass', 'env_glass', 'env_glass'],
            //         'cmi' => ['cmi_glass', 'cmi_glass', 'cmi_glass'],
            //         'prop' => ['prop_glass', 'prop_glass', 'prop_glass'],
            //     ],
            //     'Tinplate' => [
            //         'cost' => ['cost_tinplate', 'cost_tinplate', 'cost_tinplate'],
            //         'env' => ['env_tinplate', 'env_tinplate', 'env_tinplate'],
            //         'cmi' => ['cmi_tinplate', 'cmi_tinplate', 'cmi_tinplate'],
            //         'prop' => ['prop_tinplate', 'prop_tinplate', 'prop_tinplate'],
            //     ],
            //     'Tin-free steel' => [
            //         'cost' => ['cost_tin-free-steel', 'cost_tin-free-steel', 'cost_tin-free-steel'],
            //         'env' => ['env_tin-free-steel', 'env_tin-free-steel', 'env_tin-free-steel'],
            //         'cmi' => ['cmi_tin-free-steel', 'cmi_tin-free-steel', 'cmi_tin-free-steel'],
            //         'prop' => ['prop_tin-free-steel', 'prop_tin-free-steel', 'prop_tin-free-steel'],
            //     ],
            // ]
        ]);
    }
}
