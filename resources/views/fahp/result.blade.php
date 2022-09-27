@extends('layouts.main')

@section('main')
    <div class="mb-14">
        <a
            href="{{ route('food-type-for-production.calculation') }}"
            class="transition ease-in-out duration-300 text-xs p-3 rounded-lg inline-flex items-center gap-2 bg-indigo-200 text-gray-500 hover:bg-indigo-500 hover:text-gray-50"
            x-on:click="window.open('', '_blank', '');window.close();"
        >
            <x-icons.hi-arrow-left-circle class="w-4 h-4" />

            Back to Calculation Selection
        </a>
    </div>

    <div class="mb-12">
        <h3 class="text-xl mb-4">FAHP Phase 1</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fahp-phase-one :result="$calculate_fahp_phase_one" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="text-xl mb-4">Converting Fuzzy Number</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fuzzy-number :result="$calculate_fuzzy_number" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="text-xl mb-4">Calculate Fuzzy Geometric mean value (r)</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fuzzy-geometric-mean-value :result="$calculate_fuzzy_geometric_mean_value" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="text-xl mb-4">Calculate Fuzzy Weight (w)</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fuzzy-weight :result="$calculate_fuzzy_weight" />
        </div>
    </div>
@endsection
