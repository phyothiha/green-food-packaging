@extends('layouts.main')

@section('main')
    <div class="mb-14">
        <a
            href="{{ route('food-type-for-production.calculation') }}"
            class="inline-flex items-center gap-2 p-3 text-xs text-gray-500 transition duration-300 ease-in-out bg-indigo-200 rounded-lg hover:bg-indigo-500 hover:text-gray-50"
            id="back-button"
        >
            <x-icons.hi-arrow-left-circle class="w-4 h-4" />

            Back to Calculation Selection
        </a>
    </div>

    {{-- <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 1</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_1" />
        </div>
    </div> --}}

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 2: </h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_2" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 3: </h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_3" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 4: </h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_4" />
            <x-ftopsis.result.table class="mt-5" :collection="$step_4_cal" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 5: </h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_5" />
            <x-ftopsis.result.table class="mt-5" :collection="$step_5_cal" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 6: Calculate the fuzzy Positive Ideal Solution(FPIS) and Fuzzy Negative Ideal Solution(FNIS)</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.step6 :collection="$step_6" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 7: Calculate the distance value from each alternative to the FPIS and to the FNIS</h3>

        <div class="space-y-5 overflow-x-scroll lg:overflow-auto">
            <div>
                <h3 class="mb-3 text-lg">A <sup>*</sup> result</h3>
                <x-ftopsis.result.table :collection="$step_7_a_star_result" />
            </div>
            <div>
                <h3 class="mb-3 text-lg">A <sup>-</sup> result</h3>
                <x-ftopsis.result.table class="mt-5" :collection="$step_7_a_minus_result" />
            </div>
            <div>
                <h3 class="mb-3 text-lg">d <sup>*</sup> result</h3>
                <x-ftopsis.result.d :collection="$step_7_d_star_result" name="d" sign="*" />
            </div>
            <div>
                <h3 class="mb-3 text-lg">d <sup>-</sup> result</h3>
                <x-ftopsis.result.d class="mt-5" :collection="$step_7_d_minus_result" name="d" sign="-" />
            </div>
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 8: Calculate the closeness coefficient for each alternative above the equation</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.step8 :collection="$step_8" :tbl_key="$tbl_key" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Material "{{ $material }}" Ranking</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.final-rank-table :collection="$tbl['res']" />

            <div class="p-3 mt-3 text-sm text-center bg-yellow-300 rounded-lg">
                {{ $tbl['first'] }} is suitable for reducing the envirnomental impact
            </div>
        </div>
    </div>

    <div x-data="{ open: false }">
        <button x-on:click="open = !open" class="p-3 text-xs text-gray-500 transition duration-300 ease-in-out bg-blue-200 rounded-lg hover:bg-blue-500 hover:text-gray-50">Show Performance Evaluation</button>

        <div x-show="open" class="mt-8">
            {{-- sample design --}}
            {{-- <div class="mb-12">
                <h3 class="mb-4 text-xl">X Bar</h3>

                {{ $x_bar['values_string'] . ' / ' . $x_bar['values_count'] }} = {{ $x_bar['value']}}
            </div> --}}

            <div class="mb-8">
                <h3 class="mb-4 text-xl">X Bar</h3>

                <x-ftopsis.result.pe class="mt-5" :result="$x_bar" title="x_bar" />
            </div>

            <div class="mb-8">
                <h3 class="mb-4 text-xl">Mean Squared Error (MSE)</h3>

                <x-ftopsis.result.pe class="mt-5" :result="$mse" title="MSE" />
            </div>

            <div class="mb-8">
                <h3 class="mb-4 text-xl">Root-Mean-Square Error (RMSE)</h3>

                <x-ftopsis.result.pe class="mt-5" :result="$rmse" title="RMSE" />
            </div>

            <div class="mb-8">
                <h3 class="mb-4 text-xl">Mean Absolute Error (MAE)</h3>

                <x-ftopsis.result.pe class="mt-5" :result="$mae" title="MAE" />
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('back-button').href = "{{ route('food-type-for-production.calculation') }}?q=" + localStorage.getItem('selectedMaterialType');

    if (JSON.parse(localStorage.getItem('selectedPackageMaterial')).length) {
        const tables = document.querySelectorAll('.table-result')
        const storageItem = localStorage.getItem('selectedPackageMaterial');

        Array.from(tables, (element, index) => {
            let trCollection = element.querySelector('tbody').children

            for (tr of trCollection) {
                if (! storageItem.includes(tr.dataset.id)) {
                    tr.classList.add('hidden')
                }
            }
        })
    }
});
</script>
@endpush
