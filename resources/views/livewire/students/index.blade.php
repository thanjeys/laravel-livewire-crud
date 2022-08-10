@if (session('message'))
<div class="alert alert-success text-center">{{ session('message') }}</div>
@endif

<div class="row mb-3">
    <div class="col-md-12">
        <input type="search" class="form-control w-25" placeholder="search" wire:model="searchTerm"
            style="float: right;" />
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($students as $student)
        <tr>
            <td>{{ $student->student_id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td style="text-align: center;">Action
                <button class="btn btn-sm btn-secondary" wire:click="show({{ $student->id }})">View</button>
                <button class="btn btn-sm btn-primary" wire:click="edit({{ $student->id }})">Edit</button>
                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"wire:click="deleteConfirmation({{ $student->id }})">Delete</button>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align: center;"><small>No Student Found</small></td>
        </tr>
        @endforelse
    </tbody>
</table>
