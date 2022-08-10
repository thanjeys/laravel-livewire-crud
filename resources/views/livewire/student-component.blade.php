<div>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h3><strong>Students CRUD with Modal</strong></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>All Students</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#createModal">Add New Student</button>
                    </div>
                    <div class="card-body">
                        @include('livewire.students.index');
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.students.create')
    @include('livewire.students.update')
    @include('livewire.students.show')
    @include('livewire.students.delete')
</div>

@push('scripts')
<script>
    window.livewire.on('closeModal', () => {
        $('#createModal').modal('hide');
        $('#updateModal').modal('hide');
        $('#deleteModal').modal('hide');
    })
    window.livewire.on('showUpdateModal', () => {
        $('#updateModal').modal('show');
    })
    window.livewire.on('showModal', () => {
        $('#showModal').modal('show');
    })
</script>
@endpush
