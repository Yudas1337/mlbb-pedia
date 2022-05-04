<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Mobile Legends Role List</h3>
            </div>
            <div class="col-lg-12">
                <form wire:submit.prevent="update">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="roleId" wire:model="roleId" readonly autocomplete="off"
                                            class="form-control  @error('roleId') is-invalid @enderror">
                                        @error('roleId')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>NAME</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="roleName" wire:model="roleName" autocomplete="off"
                                            class="form-control @error('roleName') is-invalid @enderror">
                                        @error('roleName')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </form>
            </div>
            <div class="col-lg-3">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <button wire:click="edit({{ $role->id }})"
                                        class="btn btn-sm btn-primary">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
