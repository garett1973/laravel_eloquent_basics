@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <img class="m-auto w-3/5 mb-8 shadow-xl" src="{{ asset($car->image_path) }}" alt="">
            <h1 class="text-5xl uppercase bold">
                {{ $car->name }}
            </h1>
        </div>
    </div>
    <div class="w-5/6 py-10 m-auto text-center">
        <div class="m-auto">
            <span class="uppercase text-blue-500 font-bold text-xs italic">
                Founded: {{ $car->founded }}
            </span>

            <p class="text-lg text-gray-700 py-6">
                {{ $car->description }}
            </p>
            <table class="table-auto m-auto w-10/12">
                <tr class="bg-blue-100">
                    <th class="w-1/3 border-4 border-gray-500">Model</th>
                    <th class="w-1/3 border-4 border-gray-500">Engines</th>
                    <th class="w-1/3 border-4 border-gray-500">Production Date</th>
                </tr>

                @forelse($car->carModels as $model)
                    <tr>
                        <td class="border-4 border-gray-500 text-center">
                            {{ $model->model_name }}
                        </td>
                        <td class="border-4 border-gray-500 text-center">
                            @foreach($car->engines as $engine)
                                @if($model->id === $engine->car_model_id)
                                    {{ $engine->engine_name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="border-4 border-gray-500 text-center">
                            {{ $model->productionStartDate->production_start_date }}
                        </td>
                    </tr>
                @empty
                    <p class="italic text-lg text-gray-700 py-3">
                        N/A
                    </p>
                @endforelse
            </table>
            <p class="text-left mt-4">
                Product types:
                @forelse($car->products as $product)
                    <span class="italic text-lg text-gray-700 py-3">
                        <a href="#">{{ $product->name }}</a>
                    </span>
                @empty
                    <span class="italic text-lg text-gray-700 py-3">
                        N/A
                    </span>
                @endforelse
            </p>
            <hr class="mt-4 mb-8">
        </div>
    </div>
@endsection


