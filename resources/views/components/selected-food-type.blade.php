@props([
    'materials'
])

<table class="w-full mb-10 overflow-hidden text-sm rounded-lg shadow-lg" id="package-material">
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4">Food Type</th>
            <th class="p-4">Package Material</th>
            <th class="p-4"></th>
        </tr>
    </thead>
    <tbody>
        <tr class="odd:bg-white even:bg-gray-50">
            <td class="p-4 text-center" rowspan="{{ count($materials) + 1 }}">
                {{ request()->q }}
            </td>
        </tr>
        @foreach ($materials as $material)
            <tr class="odd:bg-white even:bg-gray-50" data-id="{{ $material }}">
                <td class="p-4 text-center">
                    {{ $material }}
                </td>
                <td>
                    <input type="checkbox" class="appearance-none checked:bg-indigo-500" name="selectedFoodType" data-material-type="{{ $material }}" />
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const storageItem = localStorage.getItem('selectedPackageMaterial');

    let trCollection = document.querySelector('#package-material tbody').children

    if (storageItem) {
        for (tr of trCollection) {
            if (storageItem.includes(tr.dataset.id)) {
                tr.querySelector('input').checked = true
            }
        }
    }

    const table = document.getElementById('package-material')

    table.addEventListener('click', function (e) {
        let target = e.target

        if (target.tagName != 'INPUT') return

        let targetValue = target.dataset.materialType

        if (localStorage.getItem('selectedPackageMaterial')) {
            let elements = JSON.parse(localStorage.getItem('selectedPackageMaterial'))
            let result = [];
            if (elements.includes(targetValue)) {
                result = elements.filter(element => element != targetValue)
                localStorage.setItem('selectedPackageMaterial', JSON.stringify(result))
            } else {
                elements.push(targetValue);
                localStorage.setItem('selectedPackageMaterial', JSON.stringify(elements))
            }
        } else {
            let elements = [];
            elements.push(targetValue);
            localStorage.setItem('selectedPackageMaterial', JSON.stringify(elements))
        }
    })
}, false)
</script>
@endpush
