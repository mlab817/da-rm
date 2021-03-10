<x-slot name="header">
    <x-title>Compliance Review</x-title>
</x-slot>

<x-content>
    <x-table>
        <x-thead>
            <tr>
                <x-th>Section</x-th>
                <x-th>Findings</x-th>
                <x-th>Recommendation</x-th>
                <x-th>Remarks</x-th>
                <x-th>Actions</x-th>
            </tr>
        </x-thead>
        <x-tbody>
            <form>
                <x-tr>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                </x-tr>
            </form>
            @forelse($compliance_reviews as $item)
            @empty
                <x-tr>
                    <x-td colspan="5">No review added yet.</x-td>
                </x-tr>
            @endforelse
        </x-tbody>
    </x-table>
</x-content>
