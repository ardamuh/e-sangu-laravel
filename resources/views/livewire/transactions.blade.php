<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        History Transaction
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No</th>
                        <th class="px-4 py-2">Created at</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">User Id</th>
                        <th class="px-4 py-2">Category</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $row->id }}</td>
                            <td class="border px-4 py-2">{{ $row->created_at }}</td>
                            <td class="border px-4 py-2">{{ $row->amount }}</td>
                            <td class="border px-4 py-2">{{ $row->user_id }}</td>
                            <td class="border px-4 py-2">{{ $row->category}}</td>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>