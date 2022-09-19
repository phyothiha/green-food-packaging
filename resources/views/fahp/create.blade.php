@extends('layouts.main')

@section('main')
    <div class="mb-12">
        <h3 class="text-2xl mb-4">Fuzzy linguistic variables for the criteria</h3>

        <x-fahp.table-fuzzy-linguistic-variables/>
    </div>

    <div class="mb-12" x-data="{
        {{-- enable calculate button when all values are selected --}}
        data: [
            { field: 'field_0', value: 0, name: 'Select', isSelected: false },
            { field: 'field_1', value: 1, name: 'Equally Important', isSelected: false },
            { field: 'field_2', value: 3, name: 'Moderately more important', isSelected: false },
            { field: 'field_3', value: 5, name: 'Strongly more important', isSelected: false },
            { field: 'field_4', value: 7, name: 'Very Strongly more important', isSelected: false },
            { field: 'field_5', value: 9, name: 'Extremely more important', isSelected: false },
        ],
        selectNew: {
            field_1: { current: null, prev: null },
            field_2: { current: null, prev: null },
            field_3: { current: null, prev: null },
            field_4: { current: null, prev: null },
            field_5: { current: null, prev: null },
        },
        select: {
            field_1: null,
            field_2: null,
            field_3: null,
            field_4: null,
            field_5: null,
        },
        prevValue: null,
        prevSelected: {
            field: null,
            value: null,
        },
        get checkAllSelected() {
            {{-- return this.data.every(current => current.isSelected) --}}
            {{-- return this.data.every(current => current.value != 0 && current.isSelected) --}}
        },
        markedAsSelected(value, field) {
            let selected = []

            for (const property in this.select) {
                if (this.select[property] >= 1) {
                    selected.push({ value: this.select[property]})
                }
            }

            selected.forEach(element => {
                let found = this.data.find(item => item.value == element.value)
                found.isSelected = true
            })

            console.log(this.select)

            this.data.forEach(item => {
                {{-- if (element.value != this.select) --}}

                for (const property in this.select) {
                    if (this.select[property] != 1) {
                        selected.push({ value: this.select[property]})
                    }
                }
            })

            {{-- if (this.prevValue) {
                let found = this.data.find(item => item.value == this.prevValue)
                found.isSelected = false
            } --}}

            {{-- need to find solutions here --}}
            {{-- this.prevValue = value --}}

            {{-- selected.forEach(element => {
                let dick = this.data.find(item => item.value != element.value)

                dick.isSelected = false
            }) --}}
        },
        submit() {
            console.log(this.data)
            console.log(this.select)
        }
    }">
        <h3 class="text-2xl mb-4">FAHP Input</h3>

        <form action="{{ route('fahp.store') }}" method="POST">
            @method('POST')
            @csrf

            <table class="table-fixed w-full rounded-lg overflow-hidden shadow-lg w-[800px] mb-5">
                <thead class="bg-teal-600 text-white">
                    <tr>
                        <th class="p-4"></th>
                        <th class="p-4">Linguistic Scale</th>
                    </tr>
                </thead>
                <tbody >
                    <tr class="odd:bg-white even:bg-gray-50">
                        <td class="p-4">
                            Type of Materials
                        </td>
                        <td class="p-4">
                            <select class="w-full rounded-lg border-gray-200 text-sm" name="type[t1]" x-model="select.field_1"
                                x-on:change="markedAsSelected($el.value, 'field_1')"
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
                            <select class="w-full rounded-lg border-gray-200 text-sm" name="type[t2]" x-model="select.field_2"
                                x-on:change="markedAsSelected($el.value, 'field_2')"
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
                            <select class="w-full rounded-lg border-gray-200 text-sm" name="type[t3]" x-model="select.field_3"
                                x-on:change="markedAsSelected($el.value, 'field_3')"
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
                            {{-- <x-fahp.select-linguistic-scale-alpine name="type[t4]" /> --}}

                            <select class="w-full rounded-lg border-gray-200 text-sm" name="type[t4]" x-model="select.field_4"
                                x-on:change="markedAsSelected($el.value, 'field_4')"
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
                            <select class="w-full rounded-lg border-gray-200 text-sm" name="type[t5]" x-model="select.field_5"
                                x-on:change="markedAsSelected($el.value, 'field_5')"
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

            <button
                type="submit"
                class="
                    rounded-lg bg-green-700 text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-green-800
                    disabled:bg-gray-300 disabled:cursor-not-allowed
                "
                x-on:click.prevent="submit()"
            >
                Calculate
            </button>

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
        </form>
    </div>
@endsection
