@extends('layouts.main')

@section('main')
    <div class="mb-14">
        <a
            href="{{ route('food-type-for-production.calculation') }}"
            class="inline-flex items-center gap-2 p-3 text-gray-500 transition duration-300 ease-in-out bg-indigo-200 rounded-lg hover:bg-indigo-500 hover:text-gray-50"
            id="back-button"
        >
            <x-icons.hi-arrow-left-circle class="w-4 h-4" />

            Back to Calculation Selection
        </a>
    </div>

    <div x-data="{
        tab: 'res'
    }">
        <nav class="text-center mb-14">
            <ul class="flex items-center justify-center">
                <li class="pr-4">
                    <a href="#" @click.prevent="tab = 'res'" class="block text-center p-2.5 border-2 rounded-lg transition ease-in-out duration-300 hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg" :class="tab === 'res' ? 'bg-green-800 border-green-800 text-white shadow-lg' : 'border-green-600 bg-white'">Result</a>
                </li>
                <li>
                    <a href="#" @click.prevent="tab = 'calc'" class="block text-center p-2.5 border-2 rounded-lg transition ease-in-out duration-300 hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg" :class="tab === 'calc' ? 'bg-green-800 border-green-800 text-white shadow-lg' : 'border-green-600 bg-white'">Result with Calculation Steps</a>
                </li>
            </ul>
        </nav>

        <div x-show="tab == 'res'">
            <div class="mb-12">
                <h3 class="mb-4 text-xl">Calculate Fuzzy Weight (w)</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <table class="w-full overflow-hidden rounded-lg shadow-lg">
                        <thead class="text-white bg-teal-600">
                            <tr>
                                <th class="p-4 text-lg"></th>
                                <th class="p-4 text-lg">(w)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($calculate_fuzzy_weight as $heading => $items)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="p-4">
                                        {{ Str::replace('_', ' ', $heading) }}
                                    </td>
                                    @foreach ($items as $item)
                                        @if (! $loop->last)
                                            @continue
                                        @else
                                            <td class="p-4">
                                                ({{ $item }})
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-show="tab == 'calc'">
            <div class="mb-12">
                <h3 class="mb-4 text-xl">FAHP Phase 1</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-fahp.result.table-fahp-phase-one :result="$calculate_fahp_phase_one" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Converting Fuzzy Number</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-fahp.result.table-fuzzy-number :result="$calculate_fuzzy_number" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Calculate Fuzzy Geometric mean value (r)</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-fahp.result.table-fuzzy-geometric-mean-value :result="$calculate_fuzzy_geometric_mean_value" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Calculate Fuzzy Weight (w)</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-fahp.result.table-fuzzy-weight :result="$calculate_fuzzy_weight" />
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('back-button').href = "{{ route('food-type-for-production.calculation') }}?q=" + localStorage.getItem('selectedMaterialType');
    });
</script>
@endpush
