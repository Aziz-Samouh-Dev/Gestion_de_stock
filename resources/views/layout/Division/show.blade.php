@extends('layout.layout')

@section('title', 'Informations sur le division')

@section('content')
    <div class="border-2 rounded-lg shadow-lg bg-white">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-3">
            <div class="flex items-center justify-center mb-5">
                <div class="w-full p-3">
                    <div class="px-4">
                        <h1 class="text-2xl font-bold antialiased pb-3 pt-6 text-green-600">
                            Informations sur le Division
                        </h1>
                    </div>
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadowdark:bg-gray-800 ">
                        <dl class="max-w-md text-gray-900 divide-y divide-gray-200 ">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Division :</dt>
                                <dd class="text-lg font-semibold">{{ $division->lable }}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Services:</dt>
                                <dd class="text-lg font-semibold">
                                    @foreach ($division->services as $service)
                                        <li>{{ $service->nom_service }}</li>
                                    @endforeach
                                </dd>
                            </div>

                        </dl>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
