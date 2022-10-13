@extends('layouts.main')

@section('main')
<div class="mb-12">
    <h3 class="mb-10 text-xl" id="page-anchor">Select a Food Type for Production</h3>

    <div class="mb-10">
        <form action="{{ route('food-type-for-production.index') }}#page-anchor" class="flex gap-4 mb-5 text-right" method="GET">
            <div class="flex-1">
                <label class="relative">
                    <span class="sr-only">Search</span>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <x-icons.hi-magnifying-glass class="w-4 h-4" />
                    </span>
                    <input class="w-full py-3 pr-3 text-xs bg-white border-gray-200 rounded-lg shadow-sm placeholder:text-xs pl-9 focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-1" placeholder="Search Food..." type="text" value="{{ request()->q }}" name="q" />
                </label>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="w-20 px-4 text-xs font-bold text-gray-100 transition duration-300 ease-in-out bg-blue-500 rounded-lg hover:bg-blue-700">
                    Search
                </button>
                <a href="{{ route('food-type-for-production.index') }}#page-anchor" class="flex items-center justify-center w-20 px-4 text-xs font-bold text-gray-700 transition duration-300 ease-in-out rounded-lg outline outline-gray-500 hover:bg-gray-700 hover:text-gray-100">
                    Clear
                </a>
            </div>
        </form>

        <div class="hidden p-3 mb-6 text-xs text-white bg-red-500 rounded-lg shadow" id="error-message">
            Please select a type of Food.
        </div>

        <div class="hidden p-3 mb-6 text-xs text-white rounded-lg shadow bg-slate-500" id="selected-material-type"></div>

        <div class="mb-5 h-[450px] overflow-y-scroll shadow-lg rounded-lg bg-white">
            <table class="w-full overflow-hidden text-sm table-fixed" id="table">
                <thead class="text-white bg-teal-600">
                    <tr>
                        <th class="px-5 py-3.5 w-28"></th>
                        <th class="px-5 py-3.5">Type of Food</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($materials as $material)
                        <tr class="odd:bg-white even:bg-gray-50" data-id="{{ $material->type }}">
                            <td class="text-center">
                                <input type="radio" class="appearance-none checked:bg-indigo-500" name="selectedFoodType" data-material-type="{{ $material->type }}" />
                            </td>
                            <td class="px-5 py-3.5">
                                {{ $material->type }}
                            </td>
                        </tr>
                    @empty
                    <tr class="bg-gray-50">
                        <td class="px-5 py-3.5 text-center text-gray-500 italic" colspan="2">
                            No data found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{
            $materials->withQueryString()
                    ->fragment('page-anchor')
                    ->onEachSide(0)
                    ->links()
        }}
    </div>

    <div class="text-right">
        <x-theme.button-link :route="route('food-type-for-production.calculation')" class="p-4 text-gray-100 bg-indigo-500 hover:bg-indigo-700" id="calculation-btn">
            <span class="text-sm">Go to calculation</span>

            <x-slot name="slot_after_text">
                <x-icons.hi-calculator class="w-5 h-5" />
            </x-slot>
        </x-theme.button-link>
    </div>
</div>
@endsection


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const storageItem = localStorage.getItem('selectedMaterialType');

    let trCollection = document.querySelector('tbody').children

    for (tr of trCollection) {
        if (tr.dataset.id == storageItem) {
            tr.querySelector('input').checked = true
        }
    }

    const table = document.getElementById('table')
    const calculationBtn = document.getElementById('calculation-btn')
    const selectedMaterialTypeDiv = document.getElementById('selected-material-type')
    const errorMessageDiv = document.getElementById('error-message')

    if (storageItem) {
        selectedMaterialTypeDiv.classList.remove('hidden')
        selectedMaterialTypeDiv.innerHTML = `Selected Food: <b>${storageItem}</b>`
    }

    table.addEventListener('click', function (e) {
        let target = e.target

        if (target.tagName != 'INPUT') return

        let targetValue = target.dataset.materialType

        selectedMaterialTypeDiv.classList.remove('hidden')
        selectedMaterialTypeDiv.innerHTML = `Selected Food: <b>${targetValue}</b>`

        errorMessageDiv.classList.add('hidden')
        localStorage.setItem('selectedMaterialType', targetValue)
    })

    calculationBtn.addEventListener('click', function (e) {
        e.preventDefault()

        if (! storageItem) {
            errorMessageDiv.classList.remove('hidden')
            location.href = "{{ route('food-type-for-production.index') }}#page-anchor"
        } else {
            location.href = "{{ route('food-type-for-production.calculation') }}?q=" + localStorage.getItem('selectedMaterialType');
        }
    })
}, false)
</script>
@endpush
