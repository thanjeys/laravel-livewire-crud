<!-- Create Modal -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Student</h5>
                <button type="button" wire:click.prevent="cancel()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{-- @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        @endforeach
                    </ul>

                @endif --}}

                <form wire:submit.prevent="store">
                    <div class="form-group row">
                        <label for="student_id" class="col-3">Student ID</label>
                        <div class="col-9">
                            <input type="number" id="student_id" class="form-control" wire:model="student_id">
                            @error('student_id')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-3">Name</label>
                        <div class="col-9">
                            <input type="text" id="name" class="form-control" wire:model="name">
                            @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-3">Email</label>
                        <div class="col-9">
                            <input type="email" id="email" class="form-control" wire:model="email">
                            @error('email')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-3">Phone</label>
                        <div class="col-9">
                            <input type="number" id="phone" class="form-control" wire:model="phone">
                            @error('phone')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-3"></label>
                        <div class="col-9">
                            <button type="submit" class="btn btn-sm btn-primary">Add Student</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
