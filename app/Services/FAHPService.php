<?php

namespace App\Services;

use App\Models\FahpFuzzyWeight;

class FAHPService
{
    // this order needs to sync with fahp input table column order
    public const MATERIAL = 'Type_of_Materials';
    public const USAGE = 'Type_of_Usage';
    public const PROFILE = 'Environmental_Profile';
    public const ISSUES = 'Consumer/Marketing_Issues';
    public const PROPERTIES = 'Properties';

    public function calculate_fahp_phase_one($types)
    {
        $result = [];

        $result[self::MATERIAL][0] = $types['t1']; // diagonal, selected input
        $result[self::MATERIAL][1] = '1/' . $types['t2'];
        $result[self::MATERIAL][2] = '1/' . $types['t3'];
        $result[self::MATERIAL][3] = '1/' . $types['t4'];
        $result[self::MATERIAL][4] = '1/' . $types['t5'];

        $result[self::USAGE][0] = $types['t2']; // selected input
        $result[self::USAGE][1] = $types['t1']; // diagonal
        $result[self::USAGE][2] = $types['t2'] . '/' . $types['t3'];
        $result[self::USAGE][3] = $types['t2'] . '/' . $types['t4'];
        $result[self::USAGE][4] = $types['t2'] . '/' . $types['t5'];

        $result[self::PROFILE][0] = $types['t3']; // selected input
        $result[self::PROFILE][1] = $types['t3'] . '/'. $types['t2'];
        $result[self::PROFILE][2] = $types['t1']; // diagonal
        $result[self::PROFILE][3] = $types['t3'] . '/'. $types['t4'];
        $result[self::PROFILE][4] = $types['t3'] . '/'. $types['t5'];

        $result[self::ISSUES][0] = $types['t4']; // selected input
        $result[self::ISSUES][1] = $types['t4'] . '/'. $types['t2'];
        $result[self::ISSUES][2] = $types['t4'] . '/'. $types['t3'];
        $result[self::ISSUES][3] = $types['t1']; // diagonal
        $result[self::ISSUES][4] = $types['t4'] . '/'. $types['t5'];

        $result[self::PROPERTIES][0] = $types['t5']; // selected input
        $result[self::PROPERTIES][1] = $types['t5'] . '/'. $types['t2'];
        $result[self::PROPERTIES][2] = $types['t5'] . '/'. $types['t3'];
        $result[self::PROPERTIES][3] = $types['t5'] . '/'. $types['t4'];
        $result[self::PROPERTIES][4] = $types['t1']; // diagonal

        return $result;
    }

    public function calculate_fuzzy_number($types)
    {
        $result = [];

        foreach ($types as $key => $value) {
            if ($value == 1) {
                $fixed = '1,1,2';

                switch ($key) {
                    case 't1':
                        $result[self::MATERIAL][0] = $fixed; // diagonal, selected input
                        $result[self::USAGE][1] = $fixed; // diagonal
                        $result[self::PROFILE][2] = $fixed; // diagonal
                        $result[self::ISSUES][3] = $fixed; // diagonal
                        $result[self::PROPERTIES][4] = $fixed; // diagonal
                        break;
                    case 't2':
                        $result[self::USAGE][0] = $fixed;
                        break;
                    case 't3':
                        $result[self::PROFILE][0] = $fixed;
                        break;
                    case 't4':
                        $result[self::ISSUES][0] = $fixed;
                        break;
                    case 't5':
                        $result[self::PROPERTIES][0] = $fixed;
                        break;
                }
            } elseif ($value == 9) {
                $fixed = '8,9,9';

                switch ($key) {
                    case 't1':
                        $result[self::MATERIAL][0] = $fixed;
                        $result[self::USAGE][1] = $fixed; // diagonal
                        $result[self::PROFILE][2] = $fixed; // diagonal
                        $result[self::ISSUES][3] = $fixed; // diagonal
                        $result[self::PROPERTIES][4] = $fixed; // diagonal
                        break;
                    case 't2':
                        $result[self::USAGE][0] = $fixed;
                        break;
                    case 't3':
                        $result[self::PROFILE][0] = $fixed;
                        break;
                    case 't4':
                        $result[self::ISSUES][0] = $fixed;
                        break;
                    case 't5':
                        $result[self::PROPERTIES][0] = $fixed;
                        break;
                }
            } else {
                $lower = $value - 1;
                $middle = $value;
                $upper = $value + 1;

                $lmu_value = "$lower,$middle,$upper";

                switch ($key) {
                    case 't1':
                        $result[self::MATERIAL][0] = $lmu_value;
                        $result[self::USAGE][1] = $lmu_value; // diagonal
                        $result[self::PROFILE][2] = $lmu_value; // diagonal
                        $result[self::ISSUES][3] = $lmu_value; // diagonal
                        $result[self::PROPERTIES][4] = $lmu_value; // diagonal
                        break;
                    case 't2':
                        $result[self::USAGE][0] = $lmu_value;
                        break;
                    case 't3':
                        $result[self::PROFILE][0] = $lmu_value;
                        break;
                    case 't4':
                        $result[self::ISSUES][0] = $lmu_value;
                        break;
                    case 't5':
                        $result[self::PROPERTIES][0] = $lmu_value;
                        break;
                }
            }
        }

        foreach ($types as $key => $value) {
            switch ($key) {
                case 't1':
                    $result[self::MATERIAL][1] = $this->print_comma_separated(
                        1, $this->method_lmu( $result[self::USAGE][0] )
                    );

                    $result[self::MATERIAL][2] = $this->print_comma_separated(
                        1, $this->method_lmu( $result[self::PROFILE][0] )
                    );

                    $result[self::MATERIAL][3] = $this->print_comma_separated(
                        1, $this->method_lmu( $result[self::ISSUES][0] )
                    );

                    $result[self::MATERIAL][4] = $this->print_comma_separated(
                        1, $this->method_lmu( $result[self::PROPERTIES][0] )
                    );

                    break;
                case 't2':
                    $result[self::USAGE][2] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::PROFILE][0] )
                    );

                    $result[self::USAGE][3] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::ISSUES][0] )
                    );

                    $result[self::USAGE][4] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::PROPERTIES][0] )
                    );

                    break;
                case 't3':
                    $result[self::PROFILE][1] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::USAGE][0] )
                    );

                    $result[self::PROFILE][3] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::ISSUES][0] )
                    );

                    $result[self::PROFILE][4] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::PROPERTIES][0] )
                    );

                    break;
                case 't4':
                    $result[self::ISSUES][1] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::USAGE][0] )
                    );

                    $result[self::ISSUES][2] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::PROFILE][0] )
                    );

                    $result[self::ISSUES][4] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::PROPERTIES][0] )
                    );

                    break;
                case 't5':
                    $result[self::PROPERTIES][1] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::USAGE][0] )
                    );

                    $result[self::PROPERTIES][2] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::PROFILE][0] )
                    );

                    $result[self::PROPERTIES][3] = $this->print_comma_separated(
                        $value, $this->method_lmu( $result[self::ISSUES][0] )
                    );

                    break;
            }
        }

        ksort($result[self::MATERIAL]);
        ksort($result[self::USAGE]);
        ksort($result[self::PROFILE]);
        ksort($result[self::ISSUES]);
        ksort($result[self::PROPERTIES]);

        return $result;
    }

    public function calculate_fuzzy_geometric_mean_value($types)
    {
        $result = $this->calculate_fuzzy_number($types);

        foreach ($result as $key => $values) {
            $addition = [];

            foreach ($values as $value) {
                [$val1, $val2, $val3] = explode(',', $value);
                // lower
                $addition[0][] = $this->calc_val($val1);
                // middle
                $addition[1][] = $this->calc_val($val2);
                // upper
                $addition[2][] = $this->calc_val($val3);
            }

            foreach ($addition as $index => $value) {
                // $addition[$index] = array_sum($value);
                $addition[$index] = round(array_sum($value), 6); // need to ask again
            }


            $result[$key][] = implode(',', $addition);
            // $result[$key][] = $addition;
        }

        return $result;
    }

    public function calculate_fuzzy_weight($types)
    {
        FahpFuzzyWeight::truncate();

        $result = $this->calculate_fuzzy_geometric_mean_value($types);

        $mean_value = [];
        $lmu_values = [];

        foreach ($result as $key => $values) {
            $mean_value[$key][] = $result[$key][count($values) - 1];
        }

        foreach ($mean_value as $key => $values) {
            $values = explode(',', $values[0]);

            foreach ($values as $index => $value) {
                $lmu_values[$index][] = $value;
            }
        }

        foreach ($lmu_values as $index => $value) {
            $lmu_values[$index] = round(array_sum($value), 6);
        }

        foreach ($mean_value as $key => $value) {
            $mean_value[$key][] = '(' . $mean_value[$key][0] . ')*(1/(' .  implode(',', $lmu_values) . '))';

            // final column
            [$val1, $val2, $val3] = explode(',', $mean_value[$key][0]);
            [$lower, $middle, $upper] = $lmu_values;

            $seg1 = round((float) $val1/$lower, 6);
            $seg2 = round((float) $val2/$middle, 6);
            $seg3 = round((float) $val3/$upper, 6);

            $mean_value[$key][] = $seg1 . ',' . $seg2 . ',' . $seg3;

            FahpFuzzyWeight::insert([
                'type' => $key,
                'seg1' => $seg1,
                'seg2' => $seg2,
                'seg3' => $seg3,
            ]);
        }



        return $mean_value;
    }

    // reverse values order
    private function method_lmu($value)
    {
        [$val3, $val2, $val1] = explode(',', $value);

        return [$val1, $val2, $val3];
    }

    private function print_comma_separated($numerator, array $arr_value)
    {
        $format = "$numerator/%s,$numerator/%s,$numerator/%s";

        return sprintf($format, ...$arr_value);
    }

    private function calc_val($value)
    {
        if (str_contains($value, '/')) {
            [$val1, $val2] = explode('/', $value);

            return $val1 / $val2;
        }

        return (int) $value;
    }
}
