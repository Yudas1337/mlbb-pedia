<?php

namespace App\Http\Livewire\Matchmaking;

use App\Models\MatchMaking;
use Livewire\Component;

class MatchmakingIndex extends Component
{
    public $matchmakings, $matchmakingId, $matchmakingMode, $matchmakingTotalBan;

    /**
     * render blade view
     *
     * @return view
     */

    public function render()
    {
        $this->matchmakings = MatchMaking::all();
        return view('livewire.matchmaking.index')
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
        $data = MatchMaking::findOrFail($id);
        $this->matchmakingId        = $data->id;
        $this->matchmakingMode      = $data->mode;
        $this->matchmakingTotalBan  = $data->total_ban;
    }

    /**
     * realtime update 
     * 
     * @return void
     */

    public function update()
    {
        $this->validate([
            'matchmakingId'         => 'required|numeric',
            'matchmakingMode'       => 'required',
            'matchmakingTotalBan'   => 'required|numeric'
        ]);

        MatchMaking::findOrFail($this->matchmakingId)->update([
            'mode'          => $this->matchmakingMode,
            'total_ban'     => $this->matchmakingTotalBan
        ]);

        return redirect()->route('matchmaking.homepage')->with('message', 'Data Berhasil Diupdate');
    }
}
