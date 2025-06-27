<?php

namespace App\Livewire\Boarding;

use Livewire\Component;

class Index extends Component
{
    public string $currentState = 'welcome';

    public function skipBoarding()
    {
        $team = currentTeam();
        if ($team) {
            $team->update(['show_boarding' => false]);
        }
        $this->currentState = 'skipped';
    }

    public function restartBoarding()
    {
        $team = currentTeam();
        if ($team) {
            $team->update(['show_boarding' => true]);
        }
        $this->currentState = 'welcome';
    }

    public function render()
    {
        return view('livewire.boarding.index');
    }
}
