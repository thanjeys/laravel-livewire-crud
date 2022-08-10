<!-- Show Modal -->
<div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Details</h5>
                <button type="button" class="close" wire:click.prevent="cancel()" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID: </th>
                            <td>{{ $student_id }}</td>
                        </tr>

                        <tr>
                            <th>Name: </th>
                            <td>{{ $name }}</td>
                        </tr>

                        <tr>
                            <th>Email: </th>
                            <td>{{ $email }}</td>
                        </tr>

                        <tr>
                            <th>Phone: </th>
                            <td>{{ $phone }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
