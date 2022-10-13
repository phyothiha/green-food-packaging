@extends('layouts.main')

@section('main')
<div class="mb-12">
    <div>
        <h3 class="mb-4 text-xl">Suggestion scale for criteria in FAHP method</h3>

        <x-fahp.table-fuzzy-linguistic-variables/>
    </div>

    <div>
        <h3 class="mb-4 text-xl">Suggestion scale for alternative in FTOPSIS method</h3>

        <x-ftopsis.table-fuzzy-linguistic-variables/>
    </div>
</div>
@endsection
