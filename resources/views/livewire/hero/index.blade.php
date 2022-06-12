<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Mobile Legends Hero List</h3>
            </div>
            <div class="col-lg-12">
                <h3>Total Hero : {{ $totalHeroes }}</h3>
            </div>
            <div class="col-lg-3">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-12">

                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button wire:click="getByRole(0)" class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">All</button>
                    </li>
                    @foreach ($roles as $role)
                        <li class="nav-item" role="presentation">
                            <button wire:click="getByRole({{ $role->id }})" class="nav-link"
                                id="{{ $role->id }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $role->id }}"
                                type="button" role="tab" aria-controls="profile"
                                aria-selected="false">{{ $role->name }}</button>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="tab-pane fade show active" id="{{ $selectedRole }}" role="tabpanel"
                            aria-labelledby="{{ $selectedRole }}-tab">
                            <div class="row">
                                @foreach ($heroes as $list)
                                    <div class="col-lg-2 mt-3 text-center">
                                        <img style="width: 100px" class="img-fluid rounded-circle"
                                            src="{{ $list->picture }}" alt="{{ $list->name }}">
                                        <p class="mt-3">{{ $list->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
