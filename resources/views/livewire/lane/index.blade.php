    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Mobile Legends Laning List</h3>
                </div>
                <div class="col-lg-12">
                    <form wire:submit.prevent="update">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="laneId" wire:model="laneId" readonly
                                                autocomplete="off"
                                                class="form-control  @error('laneId') is-invalid @enderror">
                                            @error('laneId')
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
                                            <input type="text" name="laneName" wire:model="laneName" autocomplete="off"
                                                class="form-control @error('laneName') is-invalid @enderror">
                                            @error('laneName')
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
                            @foreach ($lanes as $lane)
                                <tr>
                                    <td>{{ $lane->id }}</td>
                                    <td>{{ $lane->name }}</td>
                                    <td>
                                        <button wire:click="edit({{ $lane->id }})"
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
