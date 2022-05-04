<?php

namespace App\Http\Livewire\Lane;

use App\Models\Lane;
use Livewire\Component;

class LaneIndex extends Component
{
    public $lanes, $laneId, $laneName;

    /**
     * render blade view
     *
     * @return view
     */

    public function render()
    {
        $this->lanes = Lane::all();
        return view('livewire.lane.index')
            ->extends('layouts.dashboard.main')
            ->section('content');
    }

    /**
     * realtime edit
     *
     * @param int $id
     * 
     * @return void
     */

    public function edit(int $id): void
    {
        $data = Lane::findOrFail($id);
        $this->laneId       = $data->id;
        $this->laneName     = $data->name;
    }

    /**
     * realtime update 
     * 
     * @return void
     */

    public function update()
    {
        $this->validate([
            'laneId'     => 'required',
            'laneName'   => 'required',
        ]);
        Lane::findOrFail($this->laneId)->update([
            'name'  => $this->laneName
        ]);

        return redirect()->route('lane.homepage')->with('message', 'Data Berhasil Diupdate');
    }
}
