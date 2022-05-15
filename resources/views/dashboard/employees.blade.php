<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard | Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="float-right text-blue-500" href="{{ route('dashboard_employee.create') }}">Add new employee</a>
                    <table class="table-auto border-collapse w-full text-sm">
                      <thead>
                        <tr>
                          <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">First name</th>
                          <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Last name</th>
                          <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Practice</th>
                          <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Email</th>
                          <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Phone</th>
                          <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Action</th>
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
                          <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                            <form method="POST" action="{{ route('dashboard_employee.delete', $employee->id) }}">
                                @method('DELETE')
                                @csrf
                                <x-button type="submit">Delete</x-button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
