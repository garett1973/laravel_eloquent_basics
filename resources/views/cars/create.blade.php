@extends('layout.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">Create Car</h1>
        </div>
    </div>
    <div class="flex justify-center pt-20">
            <form action="/cars" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="block">
                    <label>
                        <input type="text"
                               class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                               name="name"
                               placeholder="Brand Name...">
                    </label>
                    <label>
                        <input type="text"
                               class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                               name="founded"
                               placeholder="Year Founded...">
                    </label>
                    <label>
                        <input type="text"
                               class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                               name="description"
                               placeholder="Description...">
                    </label>
                    <label>
                        <input type="file"
                               class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                               name="image">
                    </label>
                    <button type="submit"
                            class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                        Submit
                    </button>
                </div>
            </form>
    </div>
    @if($errors->any())
        <div class="w-4/5 m-auto text-center">
            @foreach($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif
@endsection
