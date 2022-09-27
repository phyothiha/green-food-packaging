@extends('layouts.main')

@section('main')
    <table class="w-full rounded-lg shadow-lg text-sm overflow-hidden border-collapse border border-slate-500">
        <thead class="bg-teal-600 text-white">
            <tr>
                <th class="p-2.5">Type of Materials</th>
                <th class="p-2.5">Environmental Profile</th>
                <th class="p-2.5">Chemical</th>
                <th class="p-2.5">Properties</th>
                <th class="p-2.5">Cost</th>
                <th class="p-2.5">Consumer/Marketing Issues</th>
            </tr>
        </thead>

        <tbody>
            {{-- Glass --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="7">Glass</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Glass</td>
                <td class="p-2.5 border border-slate-300">lest toxic</td>
                <td class="p-2.5 border border-slate-300">Microwaveability</td>
                <td class="p-2.5 border border-slate-300">low-cost material but some whatcostly to transport</td>
                <td class="p-2.5 border border-slate-300">Transparent allows consumer to see product</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Heat treatability</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Can be colored for light-sensitive products</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Often contains recycled content</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Reduce overall impact</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">heavy and bulky to transport</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Transparency</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Decoration potential</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Imperviousness</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>


            {{-- Aluminum --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="6">Aluminum</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">non-toxic</td>
                <td class="p-2.5 border border-slate-300">Lightweight</td>
                <td class="p-2.5 border border-slate-300">Lower transportation costs</td>
                <td class="p-2.5 border border-slate-300">Easy to decorate</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Lightweight</td>
                <td class="p-2.5 border border-slate-300">contain Magnesium and Manganese</td>
                <td class="p-2.5 border border-slate-300">barrier to moisture, air, odors,light, and microorganisms</td>
                <td class="p-2.5 border border-slate-300">Relatively expensive,but value encourages recycling</td>
                <td class="p-2.5 border border-slate-300">lightweight</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Economic incentive to recycle</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Temperature</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Good portabilit</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">No disadvantages in rigid form</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Softer</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Not breakable</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Separation difficults in laminated form</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">High  quality surface for decorating or printing</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Tinplate --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="4">Tinplate</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">lest toxic</td>
                <td class="p-2.5 border border-slate-300">water vapor</td>
                <td class="p-2.5 border border-slate-300">cheaper than aluminum</td>
                <td class="p-2.5 border border-slate-300">Easy to decorate</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Magnetic, thus easily separated</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">light</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">typically requires a cn opener to access product</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Heavier than aluminum</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">heat-treated</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Tin-free steel --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="5">Tin-free steel</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">lest toxic</td>
                <td class="p-2.5 border border-slate-300">high strength-to-weight ratio</td>
                <td class="p-2.5 border border-slate-300">Cheaper than tinplate</td>
                <td class="p-2.5 border border-slate-300">Easy to decorate</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Magnetic, thus easily separated</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">electrolytic chromium plated steel</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">typically requires a cn opener to access product</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Heavier than aluminum</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">a thin layer of chromium </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"> a layer of chromium oxide deposited on the steel base </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Polyolefines --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="7">Polyolefines</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">Carcinogenic</td>
                <td class="p-2.5 border border-slate-300">Good wet and dry strength</td>
                <td class="p-2.5 border border-slate-300">low cost</td>
                <td class="p-2.5 border border-slate-300">lightweight</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">High-energy source for incineration</td>
                <td class="p-2.5 border border-slate-300">mutagenic or reprotoxic persistent</td>
                <td class="p-2.5 border border-slate-300">Microwavable    packaging</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">slight haze or translucency</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Easily recycled in semi-rigid form</td>
                <td class="p-2.5 border border-slate-300">bioaccumulative </td>
                <td class="p-2.5 border border-slate-300">Light weight</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Identification and separation more difficult for films</td>
                <td class="p-2.5 border border-slate-300"> toxic</td>
                <td class="p-2.5 border border-slate-300"> Rigid </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"> Chemical  resistance/  </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"> Heat-sealable to prevent leakage of contents  </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Polyester --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="8">Polyester</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">numerous toxic</td>
                <td class="p-2.5 border border-slate-300">mono-extruded</td>
                <td class="p-2.5 border border-slate-300">Inexpensive,but higher cost among plastics</td>
                <td class="p-2.5 border border-slate-300">High clarity</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Easily recycled in rigid form </td>
                <td class="p-2.5 border border-slate-300">the use of potentially harmful chemicals</td>
                <td class="p-2.5 border border-slate-300">co-extruded with other plastics</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Shatter resistant</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Identification and separation more difficult for films</td>
                <td class="p-2.5 border border-slate-300"> chemicals called adipates and Phthalates/</td>
                <td class="p-2.5 border border-slate-300">  injection molded </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">  foamed to produce a range of products  </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">  heat resistant/  </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">  solid state at room temperature//  </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"> a  thermoplastic substance/  </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Polyvinyl chloride --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="4">Polyvinyl chloride</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">numerous toxic</td>
                <td class="p-2.5 border border-slate-300">Heat sealable and serves/</td>
                <td class="p-2.5 border border-slate-300">Inexpensive</td>
                <td class="p-2.5 border border-slate-300">High clarity</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Contains chlorine</td>
                <td class="p-2.5 border border-slate-300">the use of potentially harmful chemicals</td>
                <td class="p-2.5 border border-slate-300">Flexible packaging</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Requires separating from other waste</td>
                <td class="p-2.5 border border-slate-300"> chemicals called adipates and Phthalates</td>
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Polystyrene --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="4">Polystyrene</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">Toxic</td>
                <td class="p-2.5 border border-slate-300">Heat sealable and serves/</td>
                <td class="p-2.5 border border-slate-300">Inexpensive</td>
                <td class="p-2.5 border border-slate-300">Good clarity</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Requires separating from other waste</td>
                <td class="p-2.5 border border-slate-300">pollutes the atmosphere, destroying the ozone layer</td>
                <td class="p-2.5 border border-slate-300">Flexible packaging</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"> the use of potentially harmful chemicals</td>
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Polyamide --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="6">Polyamide</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">Toxic</td>
                <td class="p-2.5 border border-slate-300">resistant to rust and chemically inert/</td>
                <td class="p-2.5 border border-slate-300">Inexpensive,but higher cost among plastics</td>
                <td class="p-2.5 border border-slate-300">Easy to decorate</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Requires separating from other waste</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">low coefficient of thermal expansion/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Toxic chemicals leach out of plastic/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">used in microwave and conventional cooking applications-/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">flexible packaging/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Ethylene vinyl alcohol --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="7">Ethylene vinyl alcohol</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300">the use of potentially harmful chemicals/</td>
                <td class="p-2.5 border border-slate-300">resistant to rust and chemically inert/</td>
                <td class="p-2.5 border border-slate-300">Inexpensive when used as thin film</td>
                <td class="p-2.5 border border-slate-300">Maintains product quality for oxygen-sensiive products</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Requires separating from other waste</td>
                <td class="p-2.5 border border-slate-300">ocean-borne toxic chemicals/</td>
                <td class="p-2.5 border border-slate-300">low coefficient of thermal expansion/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">long-lasting environmental damage/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Toxic chemicals leach out of plastic/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Exposure to them is related to cancer, birth defects, compromised immunity, disturbance of the endocrine and other disorders./</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">High barrier to gases and oils/fat</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">low moisture barrier</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"> </td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">low moisture sensitive</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Laminate and co-extrusions --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="5">Laminate and co-extrusions</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Often allows for source reduction </td>
                <td class="p-2.5 border border-slate-300">the use of potentially harmful chemicals/</td>
                <td class="p-2.5 border border-slate-300">resistant to rust and chemically inert/</td>
                <td class="p-2.5 border border-slate-300">Relatively expensive,but cost effective for purpose</td>
                <td class="p-2.5 border border-slate-300">Flexibility in design and characteristics</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Layer separation is required</td>
                <td class="p-2.5 border border-slate-300">ocean-borne toxic chemicals/</td>
                <td class="p-2.5 border border-slate-300">low coefficient of thermal expansion/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">environmental damage</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Toxic chemicals leach out of plastic/</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"> related to cancer</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Properties can be tailored for product needs</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

            {{-- Paper & Paperboard --}}
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300" rowspan="9">Paper & Paperboard</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Mase for renewable resources</td>
                <td class="p-2.5 border border-slate-300">non-toxic</td>
                <td class="p-2.5 border border-slate-300">Chemically resistant</td>
                <td class="p-2.5 border border-slate-300">low cost</td>
                <td class="p-2.5 border border-slate-300">Low-density material</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Recyclable</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Lightweightv</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Easily decorated</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300">Decay</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Optical properties</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Efficient, low-cost protection</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Heat sealable</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Moisture sensitive,losses strength with increasing humdit</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Easy to print</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Tears easily</td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Recycled content makes it unsuitable for food contact material</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Very good strength to weight characteristics</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>
            <tr class="odd:bg-white even:bg-gray-50">
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300">Poor barrier to light</td>
                <td class="p-2.5 border border-slate-300"></td>
                <td class="p-2.5 border border-slate-300"></td>
            </tr>

        </tbody>
    </table>
@endsection
