@extends('layouts.main')

@section('main')
<div class="mb-12">
    <div class="mb-14">
        <a
            href="{{ route('food-type-for-production.index') }}"
            class="inline-flex items-center gap-2 p-3 text-xs text-gray-500 transition duration-300 ease-in-out bg-indigo-200 rounded-lg hover:bg-indigo-500 hover:text-gray-50"
        >
            <x-icons.hi-arrow-left-circle class="w-4 h-4" />

            Back to Food Type Selection
        </a>
    </div>

    <div>
        <x-selected-food-type :materials="$material_type_package_material"></x-selected-food-type>
    </div>

    {{-- combine below two divs ui & function --}}
    <form action="{{ route('food-type-for-production.calculation.fahp-ftopsis.store') }}" method="POST" id="form" x-data="{
        data: [
            { value: 0, name: 'Select', isSelected: false },
            { value: 1, name: 'Equally Important', isSelected: false },
            { value: 3, name: 'Moderately more important', isSelected: false },
            { value: 5, name: 'Strongly more important', isSelected: false },
            { value: 7, name: 'Very Strongly more important', isSelected: false },
            { value: 9, name: 'Extremely more important', isSelected: false },
        ],
        select: {
            field_1: null,
            field_2: null,
            field_3: null,
            field_4: null,
            field_5: null,
        },
        get dataValues() {
            return this.data.map(element => element.value)
        },
        get checkAllSelected() {
            const data = this.data.slice(1);
            return data.every(current => current.isSelected)
        },
        markedAsSelected() {
            let selected = []
            let dataValues = this.dataValues

            for (const property in this.select) {
                if (this.select[property] >= 1) {
                    selected.push(parseInt(this.select[property]))
                }
            }

            selected.forEach(element => {
                let found = this.data.find(item => item.value == element)
                found.isSelected = true
            })

            let difference = _.difference(dataValues, selected)

            difference.forEach(element => {
                let found = this.data.find(item => item.value == element)
                found.isSelected = false
            })
        },
    }">
        @csrf
        @method('POST')


        {{-- ftopsis --}}
        <div>
            <h3 class="mb-4 text-xl">
                Table for "{{ request()->q }}" Food Type
            </h3>

            <div class="" id="ftopsis-form">
                <input type="hidden" name="material" value="{{ request()->q }}">
                <x-ftopsis.calculation-table :collection="$ftopsis_data"></x-ftopsis.calculation-table>
            </div>
        </div>

        {{-- fahp --}}
        <div>
            <h3 class="mb-4 text-xl">
                Selection scale of criteria for prioritization environmental
            </h3>

            <table class="w-full rounded-lg shadow-lg mb-10 text-sm lg:w-[800px] overflow-hidden">
                <thead class="text-white bg-teal-600">
                    <tr>
                        <th class="p-4"></th>
                        <th class="p-4">Linguistic Scale</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" x-bind:value="select.field_1" name="type[fahp][t1]">
                    <input type="hidden" x-bind:value="select.field_2" name="type[fahp][t2]">
                    <input type="hidden" x-bind:value="select.field_3" name="type[fahp][t3]">
                    <input type="hidden" x-bind:value="select.field_4" name="type[fahp][t4]">
                    <input type="hidden" x-bind:value="select.field_5" name="type[fahp][t5]">

                    <tr class="odd:bg-white even:bg-gray-50">

                        <td class="p-4">
                            Type of Materials
                        </td>

                        <td class="p-4">
                            <select class="w-full text-sm border-gray-200 rounded-lg appearance-none" name="type[fahp][t1]" x-model="select.field_1"
                                x-on:change="markedAsSelected()"
                            >
                                <template x-for="item in data">
                                    <option
                                        x-bind:value="item.value"
                                        x-text="item.name"
                                        x-bind:disabled="item.isSelected"
                                    ></option>
                                </template>
                            </select>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-4">
                            Type of Cost
                        </td>
                        <td class="p-4">
                            <select class="w-full text-sm border-gray-200 rounded-lg appearance-none" name="type[fahp][t2]" x-model="select.field_2"
                                x-on:change="markedAsSelected()"
                            >
                                <template x-for="item in data">
                                    <option
                                        x-bind:value="item.value"
                                        x-text="item.name"
                                        x-bind:disabled="item.isSelected"
                                    ></option>
                                </template>
                            </select>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-4">
                            Environmental Profile
                        </td>
                        <td class="p-4">
                            <select class="w-full text-sm border-gray-200 rounded-lg appearance-none" name="type[fahp][t3]" x-model="select.field_3"
                                x-on:change="markedAsSelected()"
                            >
                                <template x-for="item in data">
                                    <option
                                        x-bind:value="item.value"
                                        x-text="item.name"
                                        x-bind:disabled="item.isSelected"
                                    ></option>
                                </template>
                            </select>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-4">
                            Consumer/Marketing Issues
                        </td>
                        <td class="p-4">
                            <select class="w-full text-sm border-gray-200 rounded-lg appearance-none" name="type[fahp][t4]" x-model="select.field_4"
                                x-on:change="markedAsSelected()"
                            >
                                <template x-for="item in data">
                                    <option
                                        x-bind:value="item.value"
                                        x-text="item.name"
                                        x-bind:disabled="item.isSelected"
                                    ></option>
                                </template>
                            </select>
                        </td>
                    </tr>
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-4">
                            Properties
                        </td>
                        <td class="p-4">
                            <select class="w-full text-sm border-gray-200 rounded-lg appearance-none" name="type[fahp][t5]" x-model="select.field_5"
                                x-on:change="markedAsSelected()"
                            >
                                <template x-for="item in data">
                                    <option
                                        x-bind:value="item.value"
                                        x-text="item.name"
                                        x-bind:disabled="item.isSelected"
                                    ></option>
                                </template>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <x-theme.button-submit class="p-4 text-white bg-green-700 hover:bg-green-800 disabled:bg-gray-300 disabled:cursor-not-allowed" x-bind:disabled="!checkAllSelected">
            <span class="text-sm">Calculate</span>

            <x-slot name="slot_after_text">
                <x-icons.hi-calculator class="w-5 h-5" />
            </x-slot>
        </x-theme.button-submit>
    </form>
</div>
@endsection
