@props([
    'collection'
])

<div id="ftopsis_selectedPackageMaterial">
    {{-- <div>testing</div>
    <div>123</div> --}}
</div>


<table class="w-full mb-10 overflow-hidden text-sm rounded-lg shadow-lg" id="ftopsis-calculation-table">
    <thead class="text-white bg-teal-600">
        <tr>
            <th class="p-4">Type of Materials</th>
            <th class="p-4">Type of Cost</th>
            <th class="p-4">Environmental Profile</th>
            <th class="p-4">Consumer/Marketing Issue</th>
            <th class="p-4">Properties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $fl_key => $fl_collection)
            <tr class="text-xs odd:bg-white even:bg-gray-50" data-id="{{ $fl_key }}">

                <td class="p-4">
                    {{ $fl_key }}
                </td>

                @foreach ($fl_collection as $sl_key => $sl_collection)
                    <td class="p-4">
                        <select class="w-full text-xs border-gray-200 rounded-lg appearance-none" name="type[{{$fl_key}}][]">
                            @foreach ($sl_collection as $item)
                                <option value="{{ $item }}">
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const ftopsis_form = document.getElementById('ftopsis-form');
    const inputsNode = document.getElementById('ftopsis_selectedPackageMaterial')
    const ftopsis_tbl_trCollection = document.querySelector('#ftopsis-calculation-table tbody').children;

    if (localStorage.getItem('defaultSelectedPackageMaterial')) {
        localStorage.removeItem('defaultSelectedPackageMaterial')
    }

    let result = [];

    for (ftopsis_tr of ftopsis_tbl_trCollection) {
        result.push(ftopsis_tr.dataset.id)
    }

    localStorage.setItem('defaultSelectedPackageMaterial', JSON.stringify(result))

    ftopsis_form.addEventListener('submit', function (e) {
        e.preventDefault();

        while (inputsNode.firstChild) {
            inputsNode.removeChild(inputsNode.firstChild);
        }

        if (localStorage.getItem('selectedPackageMaterial')) {
            const spm = JSON.parse(localStorage.getItem('selectedPackageMaterial'));
            const spmi = JSON.parse(localStorage.getItem('selectedPackageMaterialIndex'));
            const defaultSelected = JSON.parse(localStorage.getItem('defaultSelectedPackageMaterial'))
            if (spm.length) {
                const max_filter = defaultSelected.filter(x => !spm.includes(x))

                max_filter.forEach(el => {
                    const newHiddenInput = document.createElement('input')
                    newHiddenInput.type = 'hidden'
                    newHiddenInput.name = 'unselectedPackageMaterial[]'
                    newHiddenInput.value = el
                    inputsNode.appendChild(newHiddenInput);
                })

                spmi.forEach(el => {
                    const newHiddenInput = document.createElement('input')
                    newHiddenInput.type = 'hidden'
                    newHiddenInput.name = 'selectedPackageMaterialIndex[]'
                    newHiddenInput.value = el
                    inputsNode.appendChild(newHiddenInput);
                })
            }
        }

        ftopsis_form.submit();
    })
})
</script>
@endpush
