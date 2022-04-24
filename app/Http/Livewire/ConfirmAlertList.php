<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Lists;

class ConfirmAlertList extends Component
{
    public $listId;

    public function render()
    {
        return view('livewire.confirm-alert-list');
    }
    public function destroy($listId)
    {
        $list = Lists::find($listId);
        $list->delete();
        return redirect()->route('lists.index');
    }
}
