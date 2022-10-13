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
        <h3 class="mb-4 text-xl">Step 2</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_2" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 3</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_3" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 4</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_4" />
            <x-ftopsis.result.table class="mt-5" :collection="$step_4_cal" />
        </div>
    </div>

    <div class="mb-12">
        <h3 class="mb-4 text-xl">Step 5</h3>

        <div class="overflow-x-scroll lg:overflow-auto">
            <x-ftopsis.result.table :collection="$step_5" />
            <x-ftopsis.result.table class="mt-5" :collection="$step_5_cal" />
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
