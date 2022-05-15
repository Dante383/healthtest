<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard | Field of practice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ Route::currentRouteName() == 'dashboard_field-of-practice' ? route('dashboard_field-of-practice.update', $field_of_practice->id) : route('dashboard_field-of-practice.store') }}">
                        @if (Route::currentRouteName() == 'dashboard_field-of-practice')
                            @method('patch')
                        @endif
                        @csrf

                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$field_of_practice->name" required/>
                        </div>

                        <div>
                            <x-label for="practice" :value="__('Practice')" />
                            <select id="practice" class="block mt-1 w-full" name="practice_id">
                                @if (isset($field_of_practice->practice))
                                    @foreach ($practices as $practice)
                                        <option value="{{ $practice->id }}" {{ $practice->id == $field_of_practice->practice->id ? "selected" : ""}}>{{ $practice->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($practices as $practice)
                                        <option value="{{ $practice->id }}">{{ $practice->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                            {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
