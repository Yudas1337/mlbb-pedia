<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Mobile Legends Matchmaking List</h3>
            </div>
            <div class="col-lg-12">
                <form wire:submit.prevent="update">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="matchmakingId" wire:model="matchmakingId" readonly
                                            autocomplete="off"
                                            class="form-control  @error('matchmakingId') is-invalid @enderror">
                                        @error('matchmakingId')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Mode</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="matchmakingMode" wire:model="matchmakingMode"
                                            autocomplete="off"
                                            class="form-control @error('matchmakingMode') is-invalid @enderror">
                                        @error('matchmakingMode')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Ban</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="matchmakingTotalBan" wire:model="matchmakingTotalBan"
                                            autocomplete="off"
                                            class="form-control @error('matchmakingTotalBan') is-invalid @enderror">
                                        @error('matchmakingTotalBan')
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
                            <th scope="col">Mode</th>
                            <th scope="col">Total Hero Ban</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matchmakings as $matchmaking)
                            <tr>
                                <td>{{ $matchmaking->id }}</td>
                                <td>{{ $matchmaking->mode }}</td>
                                <td>{{ $matchmaking->total_ban }}</td>
                                <td>
                                    <button wire:click="edit({{ $matchmaking->id }})"
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
