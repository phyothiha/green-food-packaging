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

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Material "{{ $material }}" Ranking (FAHP - FTOPSIS)</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.final-rank-table :collection="$tbl" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Material "{{ $material }}" Ranking (PURE FTOPSIS)</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.final-rank-table :collection="$tbl" />
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
