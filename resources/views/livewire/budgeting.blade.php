<x-slot name="header">
<h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Budgeting 
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            
            <button wire:click="create()" class="bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Buat Budget</button>
            @if($isModal)
            @include('livewire.create')
            @endif
            
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <!-- <th class="px-4 py-2 w-20">No.</th> -->
                        <th class="px-4 py-2">Month</th>
                        <th class="px-4 py-2">Year</th>
                        <th class="px-4 py-2">User ID</th>
                        <th class="px-4 py-2">Remaining Budget</th>
                        <th class="px-4 py-2">Total Expenses</th>
                        <th class="px-4 py-2">Total Budget</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($budgetings as $row)
                    <tr>
                        <!-- <td class="border px-4 py-2">{{ $row->id }}</td> -->
                        <td class="border px-4 py-2">{{ $row->month }}</td>
                        <td class="border px-4 py-2">{{ $row->year}}</td>
                        <td class="border px-4 py-2">{{ $row->user_id }}</td>
                        <td class="border px-4 py-2">{{ $row->remaining_budget }}</td>
                        <td class="border px-4 py-2">{{ $row->total_expenses}}</td>
                        <td class="border px-4 py-2">{{ $row->total_budget}}</td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



