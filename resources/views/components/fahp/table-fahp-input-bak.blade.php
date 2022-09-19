<table class="table-fixed w-full rounded-lg overflow-hidden shadow-lg w-[800px] mb-5">
    <thead class="bg-teal-600 text-white">
        <tr>
            <th class="p-4"></th>
            <th class="p-4">Linguistic Scale</th>
        </tr>
    </thead>
    <tbody x-data="{
        {{-- enable calculate button when all values are selected --}}
        data: [
            { value: 0, name: 'Select', isSelected: false },
            { value: 1, name: 'Equally Important', isSelected: false },
            { value: 3, name: 'Moderately more important', isSelected: false },
            { value: 5, name: 'Strongly more important', isSelected: false },
            { value: 7, name: 'Very Strongly more important', isSelected: false },
            { value: 9, name: 'Extremely more important', isSelected: false },
        ],
    }">
        {{-- <tr>
            <td>
                testing alpine

                <div x-show="open">
                    Content...
                </div>
            </td>
            <td>
                <button @click.prevent="open = ! open">Toggle Content</button>
            </td>
        </tr> --}}
        <tr class="odd:bg-white even:bg-gray-50">
            <td class="p-4">
                Type of Materials
                {{-- <input type="hidden" name="Type of Materials"  value="t1"> --}}
            </td>
            <td class="p-4">
                <x-fahp.select-linguistic-scale-alpine name="type[t1]" />
            </td>
        </tr>
        <tr class="odd:bg-white even:bg-gray-50">
            <td class="p-4">
                Type of Usage
                {{-- <input type="hidden" name="Type of Usage"  value="t2"> --}}
            </td>
            <td class="p-4">
                <x-fahp.select-linguistic-scale-alpine name="type[t2]" />
            </td>
        </tr>
        <tr class="odd:bg-white even:bg-gray-50">
            <td class="p-4">
                Environmental Profile
                {{-- <input type="hidden" name="Environmental Profile"  value="t3"> --}}
            </td>
            <td class="p-4">
                <x-fahp.select-linguistic-scale-alpine name="type[t3]" />
            </td>
        </tr>
        <tr class="odd:bg-white even:bg-gray-50">
            <td class="p-4">
                Consumer/Marketing Issues
                {{-- <input type="hidden" name="Consumer/Marketing Issues"  value="t4"> --}}
            </td>
            <td class="p-4">
                <x-fahp.select-linguistic-scale-alpine name="type[t4]" />
            </td>
        </tr>
        <tr class="odd:bg-white even:bg-gray-50">
            <td class="p-4">
                Properties
                {{-- <input type="hidden" name="Properties"  value="t5"> --}}
            </td>
            <td class="p-4">
                <x-fahp.select-linguistic-scale-alpine name="type[t5]" />
            </td>
        </tr>
    </tbody>
</table>
