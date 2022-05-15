<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard | Practice') }}
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
                    <form method="POST" action="{{ Route::currentRouteName() == 'dashboard_practice' ? route('dashboard_practice.update', $practice->id) : route('dashboard_practice.store') }}" enctype="multipart/form-data">
                        @if (Route::currentRouteName() == 'dashboard_practice')
                            @method('patch')
                        @endif
                        @csrf

                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$practice->name" required/>
                        </div>

                        <div>
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$practice->email"/>
                        </div>

                        <div>
                            <x-label for="website_url" :value="__('Website URL')" />
                            <x-input id="website_url" class="block mt-1 w-full" type="text" name="website_url" :value="$practice->website_url"/>
                        </div>

                        @if ($practice->logo)
                        <a href="/{{ $practice->logo }}"><img class="w-20" src="/{{ $practice->logo }}"/></a>
                        @endif

                        <div>
                            <x-label for="logo" :value="__('Logo')" />
                            <x-input id="logo" class="block mt-1 w-full" type="file" name="logo"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                            {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

                    @if (isset($employees))
                        <h2>Employees</h2>
                        <table class="table-auto border-collapse w-full text-sm mb-10">
                          <thead>
                            <tr>
                              <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">First name</th>
                              <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Last name</th>
                              <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Practice</th>
                              <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Email</th>
                              <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Phone</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white dark:bg-slate-800">
                            @foreach ($employees as $employee)
                            <tr>
                              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-blue-500 dark:text-blue-400"><a href="{{ route('dashboard_employee', $employee->id) }}">{{ $employee->first_name }}</a></td>
                              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $employee->last_name }}</td>
                              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-blue-500 dark:text-blue-400"><a href="{{ route('dashboard_practice', $employee->practice->id) }}">{{ $employee->practice->name }}</a></td>
                              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $employee->email }}</td>
                              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $employee->phone }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      {{ $employees->links() }}
                  @endif

                  @if (isset($fields_of_practice))
                      <h2>Fields of practice</h2>
                      <table class="table-auto border-collapse w-full text-sm">
                          <thead>
                            <tr>
                              <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white dark:bg-slate-800">
                            @foreach ($fields_of_practice as $field_of_practice)
                            <tr>
                              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-blue-500 dark:text-blue-400"><a href="{{ route('dashboard_field-of-practice', $field_of_practice->id) }}">{{ $field_of_practice->name }}</a></td>
                            </tr>
                            @endforeach
                          </tbody>
                      </table>
                      {{ $fields_of_practice->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
