@props([
    'materials'
])

<table class="w-full mb-10 overflow-hidden rounded-lg shadow-lg" id="package-material">
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4 text-lg">Food Type</th>
            <th class="p-4 text-lg">Package Material</th>
            <th class="p-4 text-lg"></th>
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
    const storageItem = localStorage.getItem('selectedPackageMaterial') ? JSON.parse(localStorage.getItem('selectedPackageMaterial')) : [];
    const ftopsis_tbl_trCollection = document.querySelector('#ftopsis-calculation-table tbody').children;

    let trCollection = document.querySelector('#package-material tbody').children

    if (storageItem.length != 0) {
        for (tr of trCollection) {
            if (storageItem.includes(tr.dataset.id)) {
                tr.querySelector('input').checked = true
            }
        }

        for (ftopsis_tr of ftopsis_tbl_trCollection) {
            if (storageItem.includes(ftopsis_tr.dataset.id)) {
                ftopsis_tr.classList.remove('hidden')
            } else {
                ftopsis_tr.classList.add('hidden')
            }
        }
    } else {
        for (ftopsis_tr of ftopsis_tbl_trCollection) {
            ftopsis_tr.classList.remove('hidden')
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

        let elements = JSON.parse(localStorage.getItem('selectedPackageMaterial'))

        for (ftopsis_tr of ftopsis_tbl_trCollection) {
            if (elements.includes(ftopsis_tr.dataset.id)) {
                ftopsis_tr.classList.remove('hidden')
            } else {
                ftopsis_tr.classList.add('hidden')
            }
        }

        if (elements.length == 0) {
            for (ftopsis_tr of ftopsis_tbl_trCollection) {
                ftopsis_tr.classList.remove('hidden')
            }
        }
    })
}, false)
</script>
@endpush
