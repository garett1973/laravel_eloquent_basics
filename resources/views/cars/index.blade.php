@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Cars</h1>
        </div>
    </div>
    <div class="">
        <div class="m-auto w-5/6">
            @foreach($cars as $car)
                <div class="m-auto">
                    @if (Auth::user() && Auth::user()->id == $car->user_id)
                    <div class="float-right">
                        <a href="/cars/{{ $car->id }}/edit"
                           class="border-b-2 pb-2 border-dotted italic font-bold text-green-700">
                            Edit &rarr;
                        </a>
                        <form class="pt-5" action="/cars/{{ $car->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="border-b-2 pb-2 border-dotted italic font-bold text-red-700">
                                Delete &rarr;
                            </button>
                        </form>
                    </div>
                    @endif
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                        <a href="/cars/{{ $car->id}}">
                            {{ $car->name }}
                        </a>
                    </h2>
                    <p class="text-lg text-gray-700 font-bold py-6">
                        Founded: {{ $car->founded }}
                    </p>
                    <p class="text-lg text-gray-700 py-2">
                        {{ $car->description }}
                    </p>
                    <hr class="mt-4 mb-8">
                    @endforeach
                </div>
                @if (Auth::user())
                    <div class="m-auto pb-10">
                        <span class="uppercase text-blue-500 font-bold text-xs italic">
                            Add a new car &rarr;
                        </span>
                        <a href="/cars/create"
                           class="border-b-2 pb-2 border-dotted italic text-gray-500">
                            Click here
                        </a>
                    </div>
                @else
                    <p class="m-auto text-center w-4/5 text-gray-500 mb-8">
                        If you want to add a new car, please login first.
                    </p>
                @endif
        </div>
@endsection
