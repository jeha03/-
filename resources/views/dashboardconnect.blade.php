<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.lk_home') }}
        </h2>
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="bg-white">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <div class="mx-auto max-w-2xl lg:mx-0">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                                    {{ __('messages.lk_connect_title') }}
                                </h2>
                                <p class="mt-3 text-lg leading-8 text-gray-600">
                                    {{ __('messages.lk_connect_descript') }}
                                </p>
                            </div>
                            <div class="mx-auto mt-10">

                            <table id="table_accounts" class="bg-gray-800 w-full text-sm text-left text-black dark:text-gray-400 border-collapse">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-4 border-b text-white"><span>№</span></th>
            <th scope="col" class="px-6 py-4 border-b text-white"><span>{{ __('messages.lk_connect_table_address') }}</span></th>
            <th scope="col" class="px-6 py-4 border-b text-white"><span>{{ __('messages.lk_connect_table_data') }}</span></th>
        </tr>
    </thead>
    <tbody>
        @if(isset($finish_result) && count($finish_result) > 0)
            @foreach($finish_result as $model)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td data-label="№" class="py-4 font-medium text-black whitespace-nowrap dark:text-white">{{ $model->id }}</td>
                    <td data-label="{{ __('messages.lk_connect_table_address') }}" class="py-4 text-black"><b>{{ $model->ip_address }}</b></td>
                    <td data-label="{{ __('messages.lk_connect_table_data') }}" class="py-4 text-black">{{ $model->email_verified_at }}</td>
                </tr>
            @endforeach
        @else
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td colspan="3" align="center" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                    {{ __('messages.no_data') }}
                </td>
            </tr>
        @endif
    </tbody>
</table>

                            </div>

                            <!-- More posts... -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/js/alertsMessages.js') }}"></script>
</x-app-layout>
