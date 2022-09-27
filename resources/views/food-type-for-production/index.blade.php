@extends('layouts.main')

@section('main')
<div class="mb-12">
    <h3 class="text-xl mb-10">Select a Food Type for Production</h3>

    <div
        class=""
        x-data="{
            foods: [
                'Soft drink',
                'Alcoholic Beverages',
                'Beer',
                'Wine ',
                'Liquor ',
                'Coffee ',
                'instant coffee',
                'dry mixes spices-',
                'processed baby foods',
                'dairy products',
                'sugar preserves ',
                'spreads',
                'syrups',
                'processed fruit, vegetables, fish and meat products',
            ],
            searchFood: '',
        }"
    >
        {{-- <div class="mb-5 text-right">
            <label class="relative ">
                <span class="sr-only">Search</span>
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <x-icons.hi-magnifying-glass class="h-4 w-4" />
                </span>
                <input class="placeholder:text-xs bg-white rounded-lg border-gray-200 py-3 pl-9 pr-3 shadow-sm focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 focus:ring-1 text-xs" placeholder="Search Food..." type="text" x-model="searchFood" />
            </label>
        </div> --}}

        <div class="mb-10 h-[450px] overflow-y-scroll shadow-lg rounded-lg">
            <table class="w-full text-sm overflow-hidden">
                <thead class="bg-teal-600 text-white">
                    <tr>
                        <th class="px-5 py-3.5"></th>
                        <th class="px-5 py-3.5">Type of Food</th>
                    </tr>
                </thead>

                <tbody>
                    <template x-for="food in foods">
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="text-center">
                                <input type="radio" class="appearance-none checked:bg-indigo-500" name="foobar" />
                            </td>
                            <td class="px-5 py-3.5" x-text="food"></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <div class="text-right">
        <x-theme.button-link :route="route('food-type-for-production.calculation')" class="p-4 bg-indigo-500 text-gray-100 hover:bg-indigo-700">
            <span class="text-sm">Go to calculation</span>

            <x-slot name="slot_after_text">
                <x-icons.hi-calculator class="w-5 h-5" />
            </x-slot>
        </x-theme.button-link>
    </div>
</div>
@endsection
