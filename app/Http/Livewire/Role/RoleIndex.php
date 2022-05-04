<?php

namespace App\Http\Livewire\Role;

use App\Models\Role;
use Livewire\Component;

class RoleIndex extends Component
{
    public $roles, $roleId, $roleName;

    /**
     * render blade view
     *
     * @return view
     */

    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.role.index')
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
        $data = Role::findOrFail($id);
        $this->roleId       = $data->id;
        $this->roleName     = $data->name;
    }

    /**
     * realtime update 
     * 
     * @return void
     */

    public function update()
    {
        $this->validate([
            'roleId'     => 'required',
            'roleName'   => 'required',
        ]);

        Role::findOrFail($this->roleId)->update([
            'name'  => $this->roleName
        ]);

        return redirect()->route('role.homepage')->with('message', 'Data Berhasil Diupdate');
    }
}
