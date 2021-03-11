<x-slot name="header">
    <x-title>Compliance Review</x-title>
</x-slot>

<x-content>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <div>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Roadmap Version Information
                            </h3>
                        </div>
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Commodity
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $roadmap_version->roadmap->commodity->name }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Date (as of)
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $roadmap_version->date }}
                                    </dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Attachments
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <!-- Heroicon name: solid/paper-clip -->
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                Report
                                            </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                    <a target="_blank" href="{{ $roadmap_version->report->upload->url ?? '#' }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                        View
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                <div class="w-0 flex-1 flex items-center">
                                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ml-2 flex-1 w-0 truncate">
                                                Roadmap
                                            </span>
                                                </div>
                                                <div class="ml-4 flex-shrink-0">
                                                    <a target="_blank" href="{{ $roadmap_version->url }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                        View
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">

            <x-jet-modal wire:model="addComplianceDialog">
                <form class="w-full bg-white">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="">
                            <div class="mb-4">
                                <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Section:</label>
                                <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Select Section" wire:model="outline_item_id">
                                    <option value="">Select Section</option>
                                    @foreach ($outline_items as $item)
                                        <option value="{{ $item->id }}">{{ $item->item_number . '. ' . $item->title }}</option>
                                    @endforeach
                                </select>
                                @error('outline_item_id') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Findings:</label>
                                <textarea rows="3"
                                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          id="exampleFormControlInput2"
                                          wire:model="findings"
                                          placeholder="Findings"></textarea>
                                @error('findings') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Recommendations:</label>
                                <textarea rows="3"
                                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          id="exampleFormControlInput2"
                                          wire:model="recommendations"
                                          placeholder="Recommendations"></textarea>
                                @error('recommendations') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                            <div class="mb-4">
                                <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Remarks:</label>
                                <textarea rows="3"
                                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          id="exampleFormControlInput2"
                                          wire:model="remarks"
                                          placeholder="Remarks"></textarea>
                                @error('remarks') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-jet-button class="ml-2" wire:click.prevent="store()">Submit</x-jet-button>

                        <x-jet-secondary-button wire:click.prevent="resetInputFields()" wire:loading.attr="disabled">
                            Reset
                        </x-jet-secondary-button>
                    </div>
                </form>
            </x-jet-modal>

            <div class="bg-white w-full px-3 py-3">
                <div class="flex flex-row justify-between my-2">
                    <span class="text-uppercase font-weight-bold">Compliance Review</span>
                    <x-jet-button wire:click="showAddCompliance()">Add</x-jet-button>
                </div>
                <x-table>
                    <thead>
                        <tr>
                            <x-th>No</x-th>
                            <x-th>Section</x-th>
                            <x-th>Findings</x-th>
                            <x-th>Recommendations</x-th>
                        </tr>
                    </thead>
                    <x-tbody>
                        @forelse($compliance_reviews as $item)
                            <tr>
                                <td class="text-center text-sm px-2 py-4">{{ $item->id }}</td>
                                <td class="text-sm px-2 py-4">{{ $item->outline_item->item_number . '. ' . $item->outline_item->title ?? '' }}</td>
                                <td class="text-sm px-2 py-4">{{ $item->findings }}</td>
                                <td class="text-sm px-2 py-4">{{ $item->recommendations }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-sm text-center" colspan="4">
                                    <div class=" px-3 py-3">No reviews found.</div>
                                </td>
                            </tr>
                        @endforelse
                    </x-tbody>
                </x-table>
            </div>
        </div>
    </div>
    <div class="">

    </div>
</x-content>
