<x-app-layout>
    <section class="container px-4 mx-auto ">

        <div class="flex justify-end mt-8 ">

            <a href="{{ route('admin.car.create') }}">
                <x-buttons.primary-button>
                    + Create new car
                </x-buttons.primary-button>
            </a>
        
        </div>

        <div class="flex justify-center mt-6">
            <div class="w-full overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col" class="w-1/6 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Brand
                                    </th>
                                    <th scope="col" class="w-1/6 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Model
                                    </th>
                                    <th scope="col" class="w-1/6 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Year
                                    </th>
                                    <th scope="col" class="w-1/6 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Price
                                    </th>
                                    <th scope="col" class="w-2/6 py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <div class="flex justify-end">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($cars as $car)
                                <tr>
                                    <td class="w-1/6 px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <a href="{{ route('admin.car.show', ['car' => $car->id]) }}" class="font-medium text-gray-800 dark:text-white">
                                            {{ $car->brand }}
                                        </a>
                                    </td>
                                    
                                    <td class="w-1/6 px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        {{ $car->model }}
                                    </td>
        
                                    <td class="w-1/6 px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        {{ $car->year }}
                                    </td>
        
                                    <td class="w-1/6 px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        {{ $car->price }}
                                    </td>
        
                                    <td class="w-2/6 px-4 py-4 text-sm whitespace-nowrap">
                                        <div class="flex justify-end gap-x-6">
                                            <!-- View -->
                                            <a href="{{ route('admin.car.show', ['car' => $car->id]) }}"
                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-blue-500 dark:text-gray-300 hover:text-blue-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 16 16" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg>
                                            </a>
        
                                            <!-- Edit -->
                                            <a href="{{ route('admin.car.edit', ['car' => $car->id]) }}"
                                                class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                            
                                            <!-- Delete -->
                                            <form
                                                action="{{ route('admin.car.destroy', ['car' => $car->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Delete car {{ $car->id }} ?');"
                                                    type="submit"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
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
</x-app-layout>
