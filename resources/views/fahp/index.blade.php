@extends('layouts.main')

@section('main')
    <h3 class="text-2xl mb-8">Select a calculation</h3>

    <div class="grid lg:grid-cols-4 gap-4">
        <div>
            <x-fahp.link-card :link="route('fahp.create')">
                FAHP Calculations
            </x-fahp.link-card>
        </div>

        <div>
            <x-fahp.link-card :link="route('fahp.create')">
                Some Calculations
            </x-fahp.link-card>
        </div>
    </div>
@endsection
