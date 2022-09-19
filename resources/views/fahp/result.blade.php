@extends('layouts.main')

@section('main')
    <div class="mb-12">
        <h3 class="text-2xl mb-4">FAHP Phase 1</h3>

        <x-fahp.result.table-fahp-phase-one :result="$calculate_fahp_phase_one" />
    </div>

    <div class="mb-12">
        <h3 class="text-2xl mb-4">Converting Fuzzy Number</h3>

        <x-fahp.result.table-fuzzy-number :result="$calculate_fuzzy_number" />
    </div>

    <div class="mb-12">
        <h3 class="text-2xl mb-4">Calculate Fuzzy Geometric mean value (r)</h3>

        <x-fahp.result.table-fuzzy-geometric-mean-value :result="$calculate_fuzzy_geometric_mean_value" />
    </div>

    <div class="mb-12">
        <h3 class="text-2xl mb-4">Calculate Fuzzy Weight (w)</h3>

        <x-fahp.result.table-fuzzy-weight :result="$calculate_fuzzy_weight" />
    </div>
@endsection
