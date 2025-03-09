<section>
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.car.update', ['car' => $car->id]) }}">
        @csrf
        @method('put')


        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg grid grid-cols-1" x-data>
            <!-- brand model year price -->
            <div class="mt-4 mx-4 flex gap-4">
                <div class="w-1/4">
                    <x-inputs.label-input for="brand" :value="__('Brand')" />
                    <x-inputs.text-input id="brand" class="block mt-1 w-full" type="text" name="brand" required autofocus autocomplete="brand" value="{{ $car->brand }}" />
                    <x-inputs.error-input :messages="$errors->get('brand')" class="mt-2" />
                </div>
            
                <div class="w-1/4">
                    <x-inputs.label-input for="model" :value="__('Model')" />
                    <x-inputs.text-input id="model" class="block mt-1 w-full" type="text" name="model" required autofocus autocomplete="model" value="{{ $car->model }}"/>
                    <x-inputs.error-input :messages="$errors->get('model')" class="mt-2" />    
                </div>
                <div class="w-1/4">
                    <x-inputs.label-input for="year" :value="__('Year')" />
                    <x-inputs.text-input id="year" class="block mt-1 w-full" type="text" name="year" required autofocus autocomplete="year" value="{{ $car->year }}"/>
                    <x-inputs.error-input :messages="$errors->get('year')" class="mt-2" />    
                </div>
                <div class="w-1/4">
                    <x-inputs.label-input for="price" :value="__('Price')" />
                    <x-inputs.text-input id="price" class="block mt-1 w-full" type="text" name="price" required autofocus autocomplete="price" value="{{ $car->price }}"/>
                    <x-inputs.error-input :messages="$errors->get('price')" class="mt-2" />    
                </div>
            </div>

            <!-- Description -->
            <div class="mt-4 mx-4">
                <x-inputs.label-input for="description" :value="__('Description')" />
                <textarea placeholder="..." id="description" name="description" required autofocus autocomplete="description" class="block mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-4 h-32 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">{{ $car->description }}</textarea>
                <x-inputs.error-input :messages="$errors->get('description')" class="mt-2" />
            </div>
        </div>
        
        <!-- File Input -->
        <div class="flex items-center justify-center mt-4">
            <x-buttons.primary-button class="ms-4">
                {{ __('update') }}
            </x-buttons.primary-button>
        </div>
    </form>
</section>

<section>
    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white text-center">Photos</h1>
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.car.photo.store') }}" >
                                @csrf

                                <th class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <input type="file" name="images[]" multiple class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300" />
                                </th>

                                <input type="hidden" name="id" value="{{ $car->id }}"/>

                                <th class="w-1/12 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <x-buttons.primary-button class="ms-4">
                                        {{ __('Add') }}
                                    </x-buttons.primary-button>
                                </th>
                            </tr>
                            </form>
                            
                        </thead>
                        <tbody>
                            @foreach ($car->photos as $item)
                            <tr class=" border-b-2 border-gray-200 dark:border-gray-700">
                                
                                <td class="w-9/12 px-7 py-4 text-sm whitespace-nowrap border-r-2 border-gray-200 dark:border-gray-700">
                                    <img controls id="photo" src="{{ asset('/storage/photos/' . $item->photo_path) }}" class="object-cover object-center lg:w-1/2 lg:mx-6 w-full h-96 rounded-lg lg:h-[36rem]"></img>
                                </td>
                                <td>

                                <form action="{{ route('admin.car.photo.destroy', ['id' => $item->id]) }}" class="flex items-center" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete sample {{ $item->id }} ?');" type="submit"
                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

