@extends('layouts.main')

@section('main')
<div class="mb-12">
    <nav class="text-center mb-14">
        <h3 class="text-2xl mb-6">Select a Calculation</h3>

        <ul class="flex items-center justify-center gap-4">
            <li>
                <a href="{{ route('food-type-for-production.calculation.fahp') }}" class="block w-[120px] text-center p-2.5 border-2 rounded-lg text-sm transition ease-in-out duration-300 border-green-600 bg-white hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg">FAHP</a>
            </li>
            <li>
                <a href="#" class="block w-[120px] text-center p-2.5 border-2 rounded-lg text-sm transition ease-in-out duration-300 border-green-600 bg-white hover:bg-green-800 hover:border-green-800 hover:text-white hover:shadow-lg">FTOPSIS</a>
            </li>
        </ul>
    </nav>

    <div>
        <h3 class="text-xl mb-4">Suggestion scale for criteria in FAHP method</h3>

        <x-fahp.table-fuzzy-linguistic-variables/>
    </div>

    <div>
        <h3 class="text-xl mb-4">Suggestion scale for alternative in FTOPSIS method</h3>

        <x-ftopsis.table-fuzzy-linguistic-variables/>
    </div>


</div>
@endsection
