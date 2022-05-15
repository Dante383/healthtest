<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard | Fields of practice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
            </div>
        </div>
    </div>
</x-app-layout>
