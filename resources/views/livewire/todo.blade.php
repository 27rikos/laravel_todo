<div>
    <x-slot:title>Todo</x-slot:title>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent='save'>
                <div class="mb-3">
                    <label for="todo" class="form-label">Activity</label>
                    <input type="text" class="form-control" id="todo" wire:model='todo' aria-describedby="error">
                    <div id="error" class="form- text-danger">
                        @error('todo')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary fs-5"><i class="ti ti-circle-plus"></i></button>
            </form>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3 d-flex justify-content-between justify-content-center gap-2"><label class="pt-2"
                        for="">Cari:</label><input type="search" wire:model.live='search' class="form-control">
                </div>
            </div>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todos as $item)
                        <tr>
                            <td><span
                                    class="{{ $item->is_complete == 1 ? 'text-decoration-line-through ' : '' }}">{{ $item->todo }}</span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary" wire:click='checklist({{ $item->id }})'><i
                                            class="ti ti-checkbox fs-5"></i></button>
                                    <button class="btn btn-danger" wire:click='delete({{ $item->id }})'>
                                        <i class="ti ti-square-rounded-x fs-5"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-danger"> Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $todos->links() }}
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl);
            });

            toastList.forEach(toast => toast.show());
        });
    </script>
</div>
