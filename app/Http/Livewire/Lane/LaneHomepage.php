<?php

namespace App\Http\Livewire\Lane;

use App\Services\LaneService;
use Livewire\Component;

class LaneHomepage extends Component
{
    public $lanes, $laneId, $laneName;
    private $service;

    public function boot(LaneService $laneService)
    {
        $this->service = $laneService;
    }

    /**
     * render blade view
     *
     * @return view
     */

    public function render()
    {
        $this->lanes = $this->service->getAll();
        return view('livewire.lane.index')
            ->extends('layouts.dashboard.main')
            ->section('content');
    }

    public function edit($id)
    {
        $data = $this->service->getById($id);
        $this->laneId       = $data->id;
        $this->laneName     = $data->name;
    }

    public function update()
    {
        $this->validate([
            'laneId'     => 'required',
            'laneName'   => 'required',
        ]);
        $this->service->getById($this->laneId)->update([
            'name'  => $this->laneName
        ]);

        return redirect()->route('lane.homepage')->with('message', 'Data Berhasil Diupdate');
    }
}
