<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard | Employee') }}
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
                    <form method="POST" action="{{ Route::currentRouteName() == 'dashboard_employee' ? route('dashboard_employee.update', $employee->id) : route('dashboard_employee.store') }}">
                        @if (Route::currentRouteName() == 'dashboard_employee')
                            @method('patch')
                        @endif
                        @csrf

                        <div>
                            <x-label for="first_name" :value="__('First name')" />
                            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$employee->first_name" required/>
                        </div>

                        <div>
                            <x-label for="last_name" :value="__('Last name')" />
                            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$employee->last_name" required/>
                        </div>

                        <div>
                            <x-label for="practice" :value="__('Practice')" />
                            <select id="practice" class="block mt-1 w-full" name="practice_id">
                                @if (isset($employee->practice))
                                    @foreach ($practices as $practice)
                                        <option value="{{ $practice->id }}" {{ $practice->id == $employee->practice->id ? "selected" : ""}}>{{ $practice->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($practices as $practice)
                                        <option value="{{ $practice->id }}">{{ $practice->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        
                        <div>
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$employee->email"/>
                        </div>

                        <div>
                            <x-label for="phone" :value="__('Phone')" />
                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$employee->phone"/>
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
