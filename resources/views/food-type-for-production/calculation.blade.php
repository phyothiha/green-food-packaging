@extends('layouts.main')

@section('main')
<div class="mb-12" x-data="{
    tab: 'fahp'
}">
    <nav class="text-center mb-14">
        <h3 class="text-2xl mb-6">Select a Calculation</h3>

        {{-- <ul class="flex items-center justify-center gap-4">
            <li>
                <a href="{{ route('food-type-for-production.calculation.fahp') }}" class="block w-[120px] text-center p-2.5 border-2 rounded-lg text-sm transition ease-in-out duration-300 border-green-600 bg-white hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg">FAHP</a>
            </li>
            <li>
                <a href="#" class="block w-[120px] text-center p-2.5 border-2 rounded-lg text-sm transition ease-in-out duration-300 border-green-600 bg-white hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg">FTOPSIS</a>
            </li>
        </ul> --}}

        <ul class="flex items-center justify-center">
            <li class="pr-4">
                <a href="#" @click.prevent="tab = 'fahp'" class="block w-[120px] text-center p-2.5 border-2 rounded-lg text-sm transition ease-in-out duration-300 hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg" :class="tab === 'fahp' ? 'bg-green-800 border-green-800 text-white shadow-lg' : 'border-green-600 bg-white'">FAHP</a>
            </li>
            <li>
                <a href="#" @click.prevent="tab = 'ftopsis'" class="block w-[120px] text-center p-2.5 border-2 rounded-lg text-sm transition ease-in-out duration-300 hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg" :class="tab === 'ftopsis' ? 'bg-green-800 border-green-800 text-white shadow-lg' : 'border-green-600 bg-white'">FTOPSIS</a>
            </li>
        </ul>
    </nav>

    {{-- fahp --}}
    <div x-show="tab == 'fahp'">
        <div class="mb-12" x-data="{
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
            <h3 class="text-xl mb-4">Selection scale of criteria for prioritization environmental</h3>

            <form action="{{ route('food-type-for-production.calculation.fahp.store') }}" method="POST" class="">
                @method('POST')
                @csrf

                <table class="w-full rounded-lg shadow-lg mb-10 text-sm lg:w-[800px] overflow-hidden">
                    <thead class="bg-teal-600 text-white">
                        <tr>
                            <th class="p-4"></th>
                            <th class="p-4">Linguistic Scale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" x-bind:value="select.field_1" name="type[t1]">
                        <input type="hidden" x-bind:value="select.field_2" name="type[t2]">
                        <input type="hidden" x-bind:value="select.field_3" name="type[t3]">
                        <input type="hidden" x-bind:value="select.field_4" name="type[t4]">
                        <input type="hidden" x-bind:value="select.field_5" name="type[t5]">

                        <tr class="odd:bg-white even:bg-gray-50">

                            <td class="p-4">
                                Type of Materials
                            </td>

                            <td class="p-4">
                                <select class="w-full rounded-lg border-gray-200 text-sm appearance-none" name="type[t1]" x-model="select.field_1"
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
                                Type of Usage
                            </td>
                            <td class="p-4">
                                <select class="w-full rounded-lg border-gray-200 text-sm appearance-none" name="type[t2]" x-model="select.field_2"
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
                                <select class="w-full rounded-lg border-gray-200 text-sm appearance-none" name="type[t3]" x-model="select.field_3"
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
                                <select class="w-full rounded-lg border-gray-200 text-sm appearance-none" name="type[t4]" x-model="select.field_4"
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
                                <select class="w-full rounded-lg border-gray-200 text-sm appearance-none" name="type[t5]" x-model="select.field_5"
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

                {{-- <button
                    type="submit"
                    class="
                        rounded-lg bg-green-700 text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-green-800
                        disabled:bg-gray-300 disabled:cursor-not-allowed
                    "
                    x-bind:disabled="!checkAllSelected"
                >
                    Calculate
                </button> --}}

                <x-theme.button-submit :route="route('food-type-for-production.calculation')" class="p-4 bg-green-700 text-white hover:bg-green-800
                disabled:bg-gray-300 disabled:cursor-not-allowed" x-bind:disabled="!checkAllSelected">
                    <span class="text-sm">Calculate</span>

                    <x-slot name="slot_after_text">
                        <x-icons.hi-calculator class="w-5 h-5" />
                    </x-slot>
                </x-theme.button-submit>
            </form>
        </div>
    </div>

    <div x-show="tab == 'ftopsis'">
        <p>FTOPSIS Selection Table</p>
    </div>
</div>
@endsection