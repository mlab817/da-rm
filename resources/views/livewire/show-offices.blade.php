<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Acronym</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offices as $office)
                <tr @if($loop->even)class="bg-grey"@endif>
                    <td class="border px-4 py-2">{{ $office->name }}</td>
                    <td class="border px-4 py-2">{{$office->short_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
