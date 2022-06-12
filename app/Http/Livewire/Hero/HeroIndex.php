<?php

namespace App\Http\Livewire\Hero;

use App\Models\Hero;
use App\Models\Role;
use Livewire\Component;

class HeroIndex extends Component
{
    public $heroes, $roles;
    public $totalHeroes, $selectedRole;

    /**
     * mount the component
     *
     * @return void
     */

    public function mount(): void
    {
        $this->totalHeroes  = Hero::count();
        $this->heroes       = Hero::oldest('heroid')->get();
        $this->roles        = Role::all();
    }

    /**
     * render the blade view
     *
     * @return view
     */

    public function render()
    {
        return view('livewire.hero.index')
            ->extends('layouts.dashboard.main')
            ->section('content');
    }

    /**
     * fetch hero by role realtime
     *
     * @param int $id
     * 
     * @return void
     */
    public function getByRole(int $id)
    {
        if ($id == 0) {
            $this->heroes       = Hero::oldest('heroid')->get();
        } else {
            $this->selectedRole = $id;
            $this->heroes = Hero::where('hero_role', $id)->oldest('heroid')->get();
        }
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
        $data = Hero::findOrFail($id);
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
