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

    public $keys = [];
    public $tbl = [];
    public $gl_result = [];
    public $gl_step3_seg_str = [];
    public $gl_step3_find_min_max = [];
    public $gl_step4_cal = [];
    public $gl_step5 = [];
    public $gl_step5_cal = [];
    public $gl_step6_cal = [];
    public $gl_a_star_result = [];
    public $gl_a_minus_result = [];
    public $gl_step7_a_star_result = [];
    public $gl_step7_a_minus_result = [];
    public $gl_step8_d_star_result = [];
    public $gl_step8_d_minus_result = [];
    public $ranking = [];
    public $gl_cgi = [];
    public $gl_cgi_total = 0;
    public $gl_mse = [];

    public function step_2($material, $collection, $unselectedPackageMaterial)
    {
        $result = [];

        foreach ($collection as $pkg => $fl_collection) {
            if ($unselectedPackageMaterial && in_array($pkg, $unselectedPackageMaterial)) {
                foreach ($fl_collection as $key => $attr) {
                    switch ($key) {
                        case 0:
                            $result[$pkg][] = MaterialTypeLScale::where([ ['type', $material], ['package_material', $pkg], ])->first()?->scale;
                            $result[$pkg][] = MaterialCostLScale::where('package_material', $pkg)->orderBy('scale', 'desc')->first()?->scale;
                            break;
                        case 1:
                            $result[$pkg][] = MaterialEnvironmentalImpactLScale::where('package_material', $pkg)->orderBy('scale', 'desc')->first()?->scale;
                            break;
                        case 2:
                            $result[$pkg][] = MaterialConsumerMarketingIssueLScale::where('package_material', $pkg)->orderBy('scale', 'desc')->first()?->scale;
                            break;
                        case 3:
                            $result[$pkg][] = MaterialPropertiesLScale::where('package_material', $pkg)->orderBy('scale', 'desc')->first()?->scale;
                            break;
                    }
                }
            } else {
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

                    $val1 = round((float) $val1/$val1_deno, 6);
                    $val2 = round((float) $val2/$val2_deno, 6);
                    $val3 = round((float) $val3/$val3_deno, 6);
                } else {
                    [$val1, $val2, $val3] = explode(',', $item);

                    $val1 = round((float) $val1/$this->gl_step3_find_min_max[$key], 6);
                    $val2 = round((float) $val2/$this->gl_step3_find_min_max[$key], 6);
                    $val3 = round((float) $val3/$this->gl_step3_find_min_max[$key], 6);
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

                $val1 = round($val1_lhs * $val1_rhs, 6);
                $val2 = round($val2_lhs * $val2_rhs, 6);
                $val3 = round($val3_lhs * $val3_rhs, 6);

                $format = '%s,%s,%s';
                $result[$name_key][] = sprintf($format, $val1, $val2, $val3);
                $this->gl_step6_cal[$name_key][] = [$val1, $val2, $val3];

                $this->gl_step5[$name_key][] = [$val1, $val2, $val3];
            }
        }

        return $result;
    }

    public function step_6()
    {
        $result = [];
        $result_temp = [];
        $a_star_result = [];
        $a_minus_result = [];

        foreach ($this->gl_step6_cal as $material_key => $collection) {
            foreach ($collection as $collection_key => $material_item_collection) {
                switch ($collection_key) {
                    case 0:
                        $result['tom'][] = $material_item_collection;
                        break;
                    case 1:
                        $result['mc'][] = $material_item_collection;
                        break;
                    case 2:
                        $result['ep'][] = $material_item_collection;
                        break;
                    case 3:
                        $result['cmi'][] = $material_item_collection;
                        break;
                    case 4:
                        $result['p'][] = $material_item_collection;
                        break;
                }
            }
        }

        //

        foreach ($result as $name_key => $collection) {
            foreach ($collection as $collection_key => $item) {
                foreach ($item as $key => $value) {

                    switch ($key) {
                        case 0:
                            $result_temp[$name_key]['l'][] = $result[$name_key][$collection_key][$key];
                            break;
                        case 1:
                            $result_temp[$name_key]['m'][] = $result[$name_key][$collection_key][$key];
                            break;
                        case 2:
                            $result_temp[$name_key]['u'][] = $result[$name_key][$collection_key][$key];
                            break;
                    }
                }
            }
        }

        // die();

        //

        // A*
        foreach ($result_temp as $collection) {
            $temp = [];
            foreach ($collection as $value) {
                $temp[] = max($value);
            }

            $format = '%s,%s,%s';
            $a_star_result[] = sprintf($format, ...$temp);
        }

        // A-
        foreach ($result_temp as $collection) {
            $temp = [];
            foreach ($collection as $value) {
                $temp[] = min($value);
            }

            $format = '%s,%s,%s';
            $a_minus_result[] = sprintf($format, ...$temp);
        }

        $this->gl_a_star_result = $a_star_result;
        $this->gl_a_minus_result = $a_minus_result;

        return [
            'a_star' => $a_star_result,
            'a_minus' => $a_minus_result,
        ];
    }

    public function step_7_a_star_result()
    {
        $result = [];

        foreach ($this->gl_step6_cal as $material_key => $collection) {
            foreach ($collection as $key => $material_item_collection) {
                [$a1, $b1, $c1] = $material_item_collection;
                [$a2, $b2, $c2] = explode(',', $this->gl_a_star_result[$key]);

                $result[$material_key][] = round(
                    sqrt(
                        1/3 * (
                            pow(($a1 - (float) $a2), 2) +
                            pow(($b1 - (float) $b2), 2) +
                            pow(($c1 - (float) $c2), 2)
                        )
                    )
                    , 6
                );
            }
        }

        $this->gl_step7_a_star_result = $result;

        return $result;
    }

    public function step_7_a_minus_result()
    {
        $result = [];

        foreach ($this->gl_step6_cal as $material_key => $collection) {
            foreach ($collection as $key => $material_item_collection) {
                [$a1, $b1, $c1] = $material_item_collection;
                [$a2, $b2, $c2] = explode(',', $this->gl_a_minus_result[$key]);

                $result[$material_key][] = round(
                    sqrt(
                        1/3 * (
                            pow(($a1 - (float) $a2), 2) +
                            pow(($b1 - (float) $b2), 2) +
                            pow(($c1 - (float) $c2), 2)
                        )
                    )
                    , 6
                );
            }
        }

        $this->gl_step7_a_minus_result = $result;

        return $result;
    }

    public function step_7_d_star_result()
    {
        $result = $this->gl_step7_a_star_result;

        foreach ($result as $key => $value) {
            $result[$key][] = array_sum($value);
            $this->gl_step8_d_star_result[] = array_sum($value);
        }


        return $result;
    }

    public function step_7_d_minus_result()
    {
        $result = $this->gl_step7_a_minus_result;

        foreach ($result as $key => $value) {
            $result[$key][] = array_sum($value);
            $this->gl_step8_d_minus_result[] = array_sum($value);
        }

        return $result;
    }

    public function step_8($selected_package_material_index)
    {
        $result = [];
        $to_rank = [];
        $cp_to_rank = [];
        $tmp_cgi = [];

        foreach ($this->gl_step8_d_star_result as $key => $value) {
            $result[$key][] = $this->gl_step8_d_star_result[$key];
            $result[$key][] = $this->gl_step8_d_minus_result[$key];
        }

        foreach ($this->gl_step8_d_star_result as $key => $value) {
            $r = round(
                $this->gl_step8_d_minus_result[$key] / ($this->gl_step8_d_minus_result[$key] + $value),
                6
            );

            // this is the key point
            $tmp_cgi[] = $r;

            // if ($selected_package_material_index && in_array($key, $selected_package_material_index)) {
            //     $this->gl_cgi[] = $r;
            // } else {
            //     $this->gl_cgi[] = $r;
            // }

            $result[$key][] = $r;
            $to_rank[] = $r;
            $cp_to_rank[] = $r;
        }

        if ($selected_package_material_index) {
            foreach ($selected_package_material_index as $value) {
                $this->gl_cgi[] = $tmp_cgi[$value];
            }
        } else {
            $this->gl_cgi = $tmp_cgi;
        }


        foreach ($to_rank as $key => $value) {
            $max = max($cp_to_rank);
            $max_key = array_search($max, $cp_to_rank);
            $rank = $key;

            $h =  ++$rank;
            $result[$max_key][] = $h;
            $this->ranking[$max_key] = $h;

            if ($key != (count($to_rank) - 1)) {
                unset($cp_to_rank[$max_key]);
            }
        }

        return $result;
    }

    public function ranking($material, $collection)
    {
        $keys = array_keys($collection);

        $result = [];

        foreach ($collection as $pkg => $fl_collection) {
            foreach ($fl_collection as $key => $attr) {
                switch ($key) {
                    case 0:
                        $result['res'][$pkg][] = MaterialTypeLScale::where([ ['type', $material], ['package_material', $pkg], ])->first()?->package_material;
                        break;
                }
            }
        }

        // foreach ($keys as $key => $value) {
        //     $result['res'][$value][] = $this->ranking[$key];

        //     switch ($this->ranking[$key]) {
        //         case 1:
        //             $result['first'] = $value;
        //             break;
        //     }
        // }

        foreach ($keys as $key => $value) {
            $result['res'][$value][] = $this->ranking[$key];

            switch ($this->ranking[$key]) {
                case 1:
                    $result['ranking'][$value] = 1;
                    break;
                case 2:
                   $result['ranking'][$value] = 2;
                    break;
                case 3:
                   $result['ranking'][$value] = 3;
                    break;
                case 4:
                   $result['ranking'][$value] = 4;
                    break;
                case 5:
                   $result['ranking'][$value] = 5;
                    break;
                case 6:
                   $result['ranking'][$value] = 6;
                    break;
                case 7:
                   $result['ranking'][$value] = 7;
                    break;
            }
        }

        return $result;
    }

    public function x_bar()
    {
        // ksort($this->gl_cgi);

        $count = count($this->gl_cgi);

        $value = round(
            array_sum($this->gl_cgi) / $count,
            6
        );

        $this->gl_cgi_total = $value;

        return $value;

        return [
            'value' => $value,
            'values_string' => implode(' + ', $this->gl_cgi),
            'values_count' => $count,
        ];
    }

    public function mse()
    {
        // ksort($this->gl_cgi);

        $count = count($this->gl_cgi);
        $values = [];

        foreach ($this->gl_cgi as $value) {
            $values[] = round(
                pow(($value - $this->gl_cgi_total), 2),
                6
            );
        }

        $this->gl_mse = $values;

        $value = round(array_sum($values) / $count, 6);

        return $value;

        return [
            'value' => $value,
            'values_string' => implode(' + ', $values),
            'values_count' => $count,
        ];
    }

    public function rmse()
    {
        // ksort($this->gl_cgi);

        $count = count($this->gl_cgi);
        $values = [];

        foreach ($this->gl_cgi as $value) {
            $values[] = round(
                pow(($value - $this->gl_cgi_total), 2),
                6
            );
        }

        $this->gl_mse = $values;

        $value = round(
            sqrt(array_sum($values) / $count),
            6
        );

        return $value;

        return [
            'value' => $value,
            'values_string' => implode(' + ', $values),
            'values_count' => $count,
        ];
    }

    public function mae()
    {
        $count = count($this->gl_cgi);
        $values = [];

        foreach ($this->gl_cgi as $value) {
            $values[] = round(
                abs( pow(($value - $this->gl_cgi_total), 2) ),
                6
            );
        }

        $value = round(
            sqrt(array_sum($values) / $count),
            6
        );

        return $value;

        return [
            'value' => $value,
            'values_string' => implode(' + ', $values),
            'values_count' => $count,
        ];
    }
}

// abs( pow((1.107 - 1.752933) , 2) )
