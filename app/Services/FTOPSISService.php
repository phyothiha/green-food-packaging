<?php

namespace App\Services;

use App\Models\FahpFuzzyWeight;
use App\Models\MaterialConsumerMarketingIssueLScale;
use App\Models\MaterialCostLScale;
use App\Models\MaterialEnvironmentalImpactLScale;
use App\Models\MaterialPropertiesLScale;
use App\Models\MaterialTypeLScale;

class FTOPSISService
{
    // this order needs to sync with ftopsis input table column order
    public const MATERIAL = 'Type_of_Materials';
    public const COST = 'Type_of_Cost';
    public const PROFILE = 'Environmental_Profile';
    public const ISSUES = 'Consumer/Marketing_Issues';
    public const PROPERTIES = 'Properties';


    public $gl_result = [];
    public $gl_step3_seg_str = [];
    public $gl_step3_find_min_max = [];
    public $gl_step4_cal = [];
    public $gl_step5 = [];
    public $gl_step5_cal = [];

    public function step_2($material, $collection)
    {
        $result = [];

        foreach ($collection as $pkg => $fl_collection) {
            foreach ($fl_collection as $key => $attr) {
                switch ($key) {
                    case 0:
                        $result[$pkg][] = MaterialTypeLScale::where([ ['type', $material], ['package_material', $pkg], ])->first()?->scale;
                        $result[$pkg][] = MaterialCostLScale::where([ ['cost', $attr], ['package_material', $pkg], ])->first()?->scale;
                        break;
                    case 1:
                        $result[$pkg][] = MaterialEnvironmentalImpactLScale::where([ ['impact', $attr], ['package_material', $pkg], ])->first()?->scale;
                        break;
                    case 2:
                        $result[$pkg][] = MaterialConsumerMarketingIssueLScale::where([ ['issue', $attr], ['package_material', $pkg], ])->first()?->scale;
                        break;
                    case 3:
                        $result[$pkg][] = MaterialPropertiesLScale::where([ ['property', $attr], ['package_material', $pkg], ])->first()?->scale;
                        break;
                }
            }
        }

        $this->gl_result = $result;

        return $result;
    }

    public function step_3()
    {
        $result = [];

        foreach ($this->gl_result as $pkg => $fl_collection) {
            foreach ($fl_collection as $key => $attr) {
                if ($attr == 1) {
                    $result[$pkg][] = '1,1,2';

                    $this->gl_step3_seg_str[$pkg][] = '1,1,2';

                    if ($key == 1) {
                        $this->gl_step3_find_min_max[$key][] = 1;
                    } else {
                        $this->gl_step3_find_min_max[$key][] = 2;
                    }
                } elseif ($attr == 9) {
                    $result[$pkg][] = '8,9,9';

                    $this->gl_step3_seg_str[$pkg][] = '8,9,9';

                    if ($key == 1) {
                        $this->gl_step3_find_min_max[$key][] = 8;
                    } else {
                        $this->gl_step3_find_min_max[$key][] = 9;
                    }
                } else {
                    $lower = $attr - 1;
                    $middle = $attr;
                    $upper = $attr + 1;

                    $result[$pkg][] = "$lower,$middle,$upper";

                    $this->gl_step3_seg_str[$pkg][] = "$lower,$middle,$upper";

                    if ($key == 1) {
                        $this->gl_step3_find_min_max[$key][] = $lower;
                    } else {
                        $this->gl_step3_find_min_max[$key][] = $upper;
                    }
                }
            }
        }

        return $result;
    }

    public function step_4()
    {
        $result = [];

        foreach ($this->gl_step3_find_min_max as $key => $collection) {
            if ($key == 1) {
                $this->gl_step3_find_min_max[$key] = min($collection);
            } else {
                $this->gl_step3_find_min_max[$key] = max($collection);
            }
        }

        foreach ($this->gl_step3_seg_str as $name_key => $collection) {
            foreach ($collection as $key => $item) {
                if ($key == 1) {
                    [$val3, $val2, $val1] = explode(',', $item);
                    $format = '%4$s/%1$s,%4$s/%2$s,%4$s/%3$s';
                } else {
                    [$val1, $val2, $val3] = explode(',', $item);
                    $format = '%1$s/%4$s,%2$s/%4$s,%3$s/%4$s';
                }
                $result[$name_key][] = sprintf($format, $val1, $val2, $val3, $this->gl_step3_find_min_max[$key]);
            }
        }

        $this->gl_step4_cal = $result;

        return $result;
    }

    public function step_4_cal()
    {
        $result = [];

        foreach ($this->gl_step4_cal as $name_key => $collection) {
            foreach ($collection as $key => $item) {
                if ($key == 1) {
                    [$val1, $val2, $val3] = explode(',', $item);

                    $val1_deno = explode('/', $val1)[1];
                    $val2_deno = explode('/', $val2)[1];
                    $val3_deno = explode('/', $val3)[1];

                    $val1 = round((float) $val1/$val1_deno, 3);
                    $val2 = round((float) $val2/$val2_deno, 3);
                    $val3 = round((float) $val3/$val3_deno, 3);
                } else {
                    [$val1, $val2, $val3] = explode(',', $item);

                    $val1 = round((float) $val1/$this->gl_step3_find_min_max[$key], 3);
                    $val2 = round((float) $val2/$this->gl_step3_find_min_max[$key], 3);
                    $val3 = round((float) $val3/$this->gl_step3_find_min_max[$key], 3);
                }

                $format = '%s,%s,%s';
                $result[$name_key][] = sprintf($format, $val1, $val2, $val3);

                $this->gl_step5[$name_key][] = [$val1, $val2, $val3];
            }
        }


        return $result;
    }

    public function step_5()
    {
        $result = [];

        $material = FahpFuzzyWeight::find(1);
        $cost = FahpFuzzyWeight::find(2);
        $profile = FahpFuzzyWeight::find(3);
        $issue = FahpFuzzyWeight::find(4);
        $properties = FahpFuzzyWeight::find(5);

        $format = '%s*%s,%s*%s,%s*%s';

        foreach ($this->gl_step5 as $name_key => $collection) {
            foreach ($collection as $key => $array) {
                switch ($key) {
                    case 0:
                        $result[$name_key][] = sprintf($format, $array[0], $material->seg1, $array[1], $material->seg2, $array[2], $material->seg3);
                        break;
                    case 1:
                        $result[$name_key][] = sprintf($format, $array[0], $cost->seg1, $array[1], $cost->seg2, $array[2], $cost->seg3);
                        break;
                    case 2:
                        $result[$name_key][] = sprintf($format, $array[0], $profile->seg1, $array[1], $profile->seg2, $array[2], $profile->seg3);
                        break;
                    case 3:
                        $result[$name_key][] = sprintf($format, $array[0], $issue->seg1, $array[1], $issue->seg2, $array[2], $issue->seg3);
                        break;
                    case 4:
                        $result[$name_key][] = sprintf($format, $array[0], $properties->seg1, $array[1], $properties->seg2, $array[2], $properties->seg3);
                        break;
                }
            }
        }

        $this->gl_step5_cal = $result;

        return $result;
    }

    public function step_5_cal()
    {
        $result = [];

        foreach ($this->gl_step5_cal as $name_key => $collection) {
            foreach ($collection as $key => $item) {
                [$val1, $val2, $val3] = explode(',', $item);

                $val1_lhs = (float) explode('*', $val1)[0];
                $val2_lhs = (float) explode('*', $val2)[0];
                $val3_lhs = (float) explode('*', $val3)[0];

                $val1_rhs = (float) explode('*', $val1)[1];
                $val2_rhs = (float) explode('*', $val2)[1];
                $val3_rhs = (float) explode('*', $val3)[1];

                $val1 = round($val1_lhs * $val1_rhs, 3);
                $val2 = round($val2_lhs * $val2_rhs, 3);
                $val3 = round($val3_lhs * $val3_rhs, 3);

                $format = '%s,%s,%s';
                $result[$name_key][] = sprintf($format, $val1, $val2, $val3);

                $this->gl_step5[$name_key][] = [$val1, $val2, $val3];
            }
        }


        return $result;
    }
}
