@extends('layouts.main')

@section('main')
    <div class="mb-14">
        <a
            href="{{ route('food-type-for-production.calculation') }}"
            class="inline-flex items-center gap-2 p-3 text-gray-500 transition duration-300 ease-in-out bg-indigo-200 rounded-lg hover:bg-indigo-500 hover:text-gray-50"
            id="back-button"
        >
            <x-icons.hi-arrow-left-circle class="w-4 h-4" />

            Back to Calculation Selection
        </a>

        {{-- <a
            href="{{ route('food-type-for-production.calculation') }}"
            class="inline-flex items-center gap-2 p-3 text-gray-500 transition duration-300 ease-in-out bg-indigo-200 rounded-lg hover:bg-indigo-500 hover:text-gray-50"
            id="back-button"
        >
            <x-icons.hi-arrow-left-circle class="w-4 h-4" />

            Back to Calculation Selection
        </a> --}}
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">FAHP Phase 1</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fahp-phase-one :result="$calculate_fahp_phase_one" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Converting Fuzzy Number</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fuzzy-number :result="$calculate_fuzzy_number" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Calculate Fuzzy Geometric mean value (r)</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fuzzy-geometric-mean-value :result="$calculate_fuzzy_geometric_mean_value" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Calculate Fuzzy Weight (w)</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-fahp.result.table-fuzzy-weight :result="$calculate_fuzzy_weight" />
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('back-button').href = "{{ route('food-type-for-production.calculation') }}?q=" + localStorage.getItem('selectedMaterialType');
    });
</script>
@endpush
