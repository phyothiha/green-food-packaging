@props([
    'result'
])

<table {{ $attributes->merge(['class' => 'w-full overflow-hidden rounded-lg shadow-lg']) }}>
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4 text-lg">Calculation Type</th>
            <th class="p-4 text-lg">Result</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $key => $value)
            <tr class=" odd:bg-white even:bg-gray-50">
                <td class="p-4 text-center">
                    {{ $key }}
                </td>
                <td class="p-4 text-center">
                    {{ $value }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
