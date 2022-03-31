@foreach ($contacts as $key => $contact)
{{-- @dd($deposit->user_id) --}}
<tr>
    <td>{{ $key+1 }}</td>
    <td>{{$contact->name}}</td>
    <td>{{$contact->phone}}</td>
    <td>{{$contact->email}}</td>
    <td>{{$contact->message}}</td>
    <td>{{$contact->created_at}}</td>
    @if ($contact->is_read == 0)
    <td>
        {{-- <a class="btn btn-xs btn-danger btn-rounded"
        href="{{route('deposit.approve', $deposit->id)}}"> --}}
        <span class="top-0 start-100 badge bg-danger">
            New Message
        </span>
        </a>
    </td>
    @else
    <td class=""><span class="btn-xs btn-success">Read</span></td>
    @endif
    <td>
        @if ($contact->is_read == 0)
            <button class="btn btn-primary btn-sm read" onclick="mark_as_read(this, '{{ route('admin.contact.mark_read', $contact->id) }}')">Mark asread</button>
        @endif
        <button type="submit" class="btn btn-danger btn-sm delete" onclick="delete_msg(this, '{{ route('admin.contact.delete', $contact->id) }}')"><i class='far fa-times-circle'></i></button>
    </td>
</tr>
@endforeach