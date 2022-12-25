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

    {{--  --}}
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
                <h3 class="mb-4 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}"</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.final-rank-table :collection="$tbl['ranking']" />

                    <h3 class="mt-6 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}" (User selected)</h3>

                    <div id="messages">
                        {{-- <div class="mt-8"> --}}
                            @foreach ($tbl['ranking'] as $key => $rank)
                                @if ($rank !== 1)
                                    <div class="p-3 mt-3 rounded-lg bg-slate-300" data-id="{{ $key }}">
                                        {{ $key }} is rank {{ $rank }}
                                    </div>
                                @endif
                            @endforeach
                        {{-- </div> --}}
                    </div>
                    @foreach ($tbl['ranking'] as $key => $rank)
                        @if ($rank == 1)
                            {{-- <div class="mt-8"> --}}
                                <h3 class="mt-6 text-xl font-bold text-teal-600">Recommended for "{{ $material }}"</h3>

                                <div class="p-3 mt-3 bg-yellow-300 rounded-lg">
                                    {{ $key }} is more suitable for reducing environmental impact
                                </div>
                            {{-- </div> --}}
                        @endif
                    @endforeach
                </div>
            </div>

            <div x-data="{ open: false }">
                <button x-on:click="open = !open" class="p-3 text-gray-500 transition duration-300 ease-in-out bg-blue-200 rounded-lg hover:bg-blue-500 hover:text-gray-50">Show Performance Evaluation (FAHP & FTOPSIS)</button>

                <div x-show="open" class="mt-8">
                    <div class="mb-8">
                        <h3 class="mb-4 text-xl">FAHP & FTOPSIS</h3>

                        <x-ftopsis.result.pe class="mt-5" :result="[
                            'Mean Squared Error (MSE)' => $mse,
                            'Root-Mean-Square Error (RMSE)' => $rmse,
                            'Mean Absolute Error (MAE)' => $mae
                        ]" />
                    </div>
                </div>
            </div>

            <div x-data="{ show: false }">
                <button x-on:click="show = !show" class="p-3 my-5 text-gray-500 transition duration-300 ease-in-out bg-blue-200 rounded-lg hover:bg-blue-500 hover:text-gray-50">Compare with FTOPSIS weight</button>

                <div x-show="show" class="mt-8">
                    <div class="mb-12">
                      <h3 class="mb-4 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}"</h3>

                      <div class="overflow-x-scroll lg:overflow-auto">
                          <x-ftopsis.result.final-rank-table :collection="$pure_ftopsis_tbl_ranking['ranking']" />

                          <h3 class="mt-6 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}" (User selected)</h3>

                          <div id="messagespure">
                              @foreach ($tbl['ranking'] as $key => $rank)
                                  @if ($rank !== 1)
                                      <div class="p-3 mt-3 rounded-lg bg-slate-300" data-id="{{ $key }}">
                                          {{ $key }} is rank {{ $rank }}
                                      </div>
                                  @endif
                              @endforeach
                          </div>
                          @foreach ($tbl['ranking'] as $key => $rank)
                              @if ($rank == 1)
                                  <h3 class="mt-6 text-xl font-bold text-teal-600">Recommended for "{{ $material }}"</h3>

                                  <div class="p-3 mt-3 bg-yellow-300 rounded-lg">
                                      {{ $key }} is more suitable for reducing environmental impact
                                  </div>
                              @endif
                          @endforeach
                      </div>
                    </div>

                    <div x-data="{ open: false }">
                        <button x-on:click="open = !open" class="p-3 text-gray-500 transition duration-300 ease-in-out bg-blue-200 rounded-lg hover:bg-blue-500 hover:text-gray-50">Show Performance Evaluation (FTOPSIS)</button>

                        <div x-show="open" class="mt-8">
                            <div class="mb-8">
                                <h3 class="mb-4 text-xl">FTOPSIS</h3>

                                <x-ftopsis.result.pe class="mt-5" :result="[
                                    'Mean Squared Error (MSE)' => $pure_mse,
                                    'Root-Mean-Square Error (RMSE)' => $pure_rmse,
                                    'Mean Absolute Error (MAE)' => $pure_mae
                                ]" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="tab == 'calc'">
            <div class="mb-12">
                <h3 class="mb-4 text-xl">Step 2: </h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.table :collection="$step_2" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Step 3: </h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.table :collection="$step_3" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Step 4: </h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.table :collection="$step_4" />
                    <x-ftopsis.result.table class="mt-5" :collection="$step_4_cal" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Step 5: </h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.table :collection="$step_5" />
                    <x-ftopsis.result.table class="mt-5" :collection="$step_5_cal" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Step 6: Calculate the fuzzy Positive Ideal Solution(FPIS) and Fuzzy Negative Ideal Solution(FNIS)</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.step6 :collection="$step_6" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Step 7: Calculate the distance value from each alternative to the FPIS and to the FNIS</h3>

                <div class="space-y-5 overflow-x-scroll lg:overflow-auto">
                    <div>
                        <h3 class="mb-3 text-lg">A <sup>*</sup> result</h3>
                        <x-ftopsis.result.table :collection="$step_7_a_star_result" />
                    </div>
                    <div>
                        <h3 class="mb-3 text-lg">A <sup>-</sup> result</h3>
                        <x-ftopsis.result.table class="mt-5" :collection="$step_7_a_minus_result" />
                    </div>
                    <div>
                        <h3 class="mb-3 text-lg">d <sup>*</sup> result</h3>
                        <x-ftopsis.result.d :collection="$step_7_d_star_result" name="d" sign="*" />
                    </div>
                    <div>
                        <h3 class="mb-3 text-lg">d <sup>-</sup> result</h3>
                        <x-ftopsis.result.d class="mt-5" :collection="$step_7_d_minus_result" name="d" sign="-" />
                    </div>
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl">Step 8: Calculate the closeness coefficient for each alternative above the equation</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.step8 :collection="$step_8" :tbl_key="$tbl_key" />
                </div>
            </div>

            <div class="mb-12">
                <h3 class="mb-4 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}"</h3>

                <div class="overflow-x-scroll lg:overflow-auto">
                    <x-ftopsis.result.final-rank-table :collection="$tbl['ranking']" />

                    <h3 class="mt-6 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}" (User selected)</h3>

                    <div id="messages">
                        {{-- <div class="mt-8"> --}}
                            @foreach ($tbl['ranking'] as $key => $rank)
                                @if ($rank !== 1)
                                    <div class="p-3 mt-3 rounded-lg bg-slate-300" data-id="{{ $key }}">
                                        {{ $key }} is rank {{ $rank }}
                                    </div>
                                @endif
                            @endforeach
                        {{-- </div> --}}
                    </div>
                    @foreach ($tbl['ranking'] as $key => $rank)
                        @if ($rank == 1)
                            {{-- <div class="mt-8"> --}}
                                <h3 class="mt-6 text-xl font-bold text-teal-600">Recommended for "{{ $material }}"</h3>

                                <div class="p-3 mt-3 bg-yellow-300 rounded-lg">
                                    {{ $key }} is more suitable for reducing environmental impact
                                </div>
                            {{-- </div> --}}
                        @endif
                    @endforeach
                </div>
            </div>

            <div x-data="{ open: false }">
                <button x-on:click="open = !open" class="p-3 text-gray-500 transition duration-300 ease-in-out bg-blue-200 rounded-lg hover:bg-blue-500 hover:text-gray-50">Show Performance Evaluation (FAHP & FTOPSIS)</button>

                <div x-show="open" class="mt-8">
                    <div class="mb-8">
                        <h3 class="mb-4 text-xl">FAHP & FTOPSIS</h3>

                        <x-ftopsis.result.pe class="mt-5" :result="[
                            'Mean Squared Error (MSE)' => $mse,
                            'Root-Mean-Square Error (RMSE)' => $rmse,
                            'Mean Absolute Error (MAE)' => $mae
                        ]" />
                    </div>
                </div>
            </div>

            {{-- pure ftopsis only --}}
            <div x-data="{ show: false }">
                <button x-on:click="show = !show" class="p-3 my-5 text-gray-500 transition duration-300 ease-in-out bg-blue-200 rounded-lg hover:bg-blue-500 hover:text-gray-50">Compare with FTOPSIS weight</button>

                <div x-show="show" class="mt-8">
                    <div class="mb-12">
                        <h3 class="mb-4 text-xl">Step 2: </h3>

                        <div class="overflow-x-scroll lg:overflow-auto">
                            <x-ftopsis.result.table :collection="$pure_step_2" />
                        </div>
                    </div>

                    <div class="mb-12">
                      <h3 class="mb-4 text-xl">Step 3: </h3>

                      <div class="overflow-x-scroll lg:overflow-auto">
                          <x-ftopsis.result.table :collection="$pure_step_3" />
                      </div>
                    </div>

                    <div class="mb-12">
                      <h3 class="mb-4 text-xl">Step 4: </h3>

                      <div class="overflow-x-scroll lg:overflow-auto">
                          <x-ftopsis.result.table :collection="$pure_step_4" />
                          <x-ftopsis.result.table class="mt-5" :collection="$pure_step_4_cal" />
                      </div>
                    </div>

                    <div class="mb-12">
                      <h3 class="mb-4 text-xl">Step 5: </h3>

                      <div class="overflow-x-scroll lg:overflow-auto">
                          <x-ftopsis.result.table :collection="$pure_step_5" />
                          <x-ftopsis.result.table class="mt-5" :collection="$pure_step_5_cal" />
                      </div>
                    </div>

                    <div class="mb-12">
                      <h3 class="mb-4 text-xl">Step 6: Calculate the fuzzy Positive Ideal Solution(FPIS) and Fuzzy Negative Ideal Solution(FNIS)</h3>

                      <div class="overflow-x-scroll lg:overflow-auto">
                          <x-ftopsis.result.step6 :collection="$pure_step_6" />
                      </div>
                    </div>

                    <div class="mb-12">
                      <h3 class="mb-4 text-xl">Step 7: Calculate the distance value from each alternative to the FPIS and to the FNIS</h3>

                      <div class="space-y-5 overflow-x-scroll lg:overflow-auto">
                          <div>
                              <h3 class="mb-3 text-lg">A <sup>*</sup> result</h3>
                              <x-ftopsis.result.table :collection="$pure_step_7_a_star_result" />
                          </div>
                          <div>
                              <h3 class="mb-3 text-lg">A <sup>-</sup> result</h3>
                              <x-ftopsis.result.table class="mt-5" :collection="$pure_step_7_a_minus_result" />
                          </div>
                          <div>
                              <h3 class="mb-3 text-lg">d <sup>*</sup> result</h3>
                              <x-ftopsis.result.d :collection="$pure_step_7_d_star_result" name="d" sign="*" />
                          </div>
                          <div>
                              <h3 class="mb-3 text-lg">d <sup>-</sup> result</h3>
                              <x-ftopsis.result.d class="mt-5" :collection="$pure_step_7_d_minus_result" name="d" sign="-" />
                          </div>
                      </div>
                    </div>

                    <div class="mb-12">
                      <h3 class="mb-4 text-xl">Step 8: Calculate the closeness coefficient for each alternative above the equation</h3>

                      <div class="overflow-x-scroll lg:overflow-auto">
                          <x-ftopsis.result.step8 :collection="$pure_step_8" :tbl_key="$tbl_key" />
                      </div>
                    </div>

                    <div class="mb-12">
                      <h3 class="mb-4 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}"</h3>

                      <div class="overflow-x-scroll lg:overflow-auto">
                          <x-ftopsis.result.final-rank-table :collection="$pure_ftopsis_tbl_ranking['ranking']" />

                          <h3 class="mt-6 text-xl font-bold text-teal-600">Material Ranking for "{{ $material }}" (User selected)</h3>

                          <div id="messagespure">
                              @foreach ($tbl['ranking'] as $key => $rank)
                                  @if ($rank !== 1)
                                      <div class="p-3 mt-3 rounded-lg bg-slate-300" data-id="{{ $key }}">
                                          {{ $key }} is rank {{ $rank }}
                                      </div>
                                  @endif
                              @endforeach
                          </div>
                          @foreach ($tbl['ranking'] as $key => $rank)
                              @if ($rank == 1)
                                  <h3 class="mt-6 text-xl font-bold text-teal-600">Recommended for "{{ $material }}"</h3>

                                  <div class="p-3 mt-3 bg-yellow-300 rounded-lg">
                                      {{ $key }} is more suitable for reducing environmental impact
                                  </div>
                              @endif
                          @endforeach
                      </div>
                    </div>

                    <div x-data="{ open: false }">
                      <button x-on:click="open = !open" class="p-3 text-gray-500 transition duration-300 ease-in-out bg-blue-200 rounded-lg hover:bg-blue-500 hover:text-gray-50">Show Performance Evaluation (FTOPSIS)</button>

                      <div x-show="open" class="mt-8">
                          <div class="mb-8">
                              <h3 class="mb-4 text-xl">FTOPSIS</h3>

                              <x-ftopsis.result.pe class="mt-5" :result="[
                                  'Mean Squared Error (MSE)' => $pure_mse,
                                  'Root-Mean-Square Error (RMSE)' => $pure_rmse,
                                  'Mean Absolute Error (MAE)' => $pure_mae
                              ]" />
                          </div>
                      </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
    {{--  --}}


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('back-button').href = "{{ route('food-type-for-production.calculation') }}?q=" + localStorage.getItem('selectedMaterialType');
    const storageItem = JSON.parse(localStorage.getItem('selectedPackageMaterial'));

    let messages = document.getElementById('messages').children

    if (messages) {
        for (div of messages) {
            if (storageItem.length && !storageItem.includes(div.dataset.id)) {
                div.classList.add('hidden')
            }
        }
    }

    let messagespure = document.getElementById('messagespure').children

    if (messagespure) {
        for (div of messagespure) {
            if (storageItem.length && !storageItem.includes(div.dataset.id)) {
                div.classList.add('hidden')
            }
        }
    }
});
</script>
@endpush
