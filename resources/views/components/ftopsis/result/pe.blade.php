@props([
    'title',
    'result'
])

<table {{ $attributes->merge(['class' => 'w-full overflow-hidden text-sm rounded-lg shadow-lg']) }}>
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4">Calculation</th>
            <th class="p-4">Result</th>
        </tr>
    </thead>
    <tbody>
        <tr class="text-xs odd:bg-white even:bg-gray-50">
            <td class="p-4 text-center">
                {{ $title }}
            </td>
            <td class="p-4 text-center">
                {{ $result }}
            </td>
        </tr>
    </tbody>
</table>
