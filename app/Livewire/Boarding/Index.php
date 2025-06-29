<?php

namespace App\Livewire\Boarding;

use Livewire\Component;

class Index extends Component
{
    public string $currentState = 'welcome';

    public bool $serverReachable = true;

    public ?int $remoteServerPort = 22;

    public ?string $remoteServerUser = 'root';

    public array $privateKeys = [];

    public array $servers = [];

    public array $projects = [];

    public ?string $privateKeyType = null;

    public $createdServer = null;

    public string $minDockerVersion;

    protected $listeners = [
        'refreshBoardingIndex' => 'refreshComponent',
    ];

    public function mount(): void
    {
        $this->minDockerVersion = config('constants.docker.minimum_required_version', '20.10.0');
    }

    public function refreshComponent(): void
    {
        // Just refresh the component state
    }

    public function explanation(): void
    {
        $this->currentState = 'select-server-type';
    }

    public function setServerType(string $type): void
    {
        $this->currentState = 'private-key';
    }

    public function setPrivateKey(string $type): void
    {
        $this->privateKeyType = $type;
        $this->currentState = 'create-private-key';
    }

    public function selectExistingPrivateKey(): void
    {
        $this->currentState = 'select-existing-server';
    }

    public function savePrivateKey(): void
    {
        $this->currentState = 'select-existing-server';
    }

    public function createNewServer(): void
    {
        $this->currentState = 'create-server';
    }

    public function selectExistingServer(): void
    {
        $this->currentState = 'validate-server';
    }

    public function saveServer(): void
    {
        $this->currentState = 'validate-server';
    }

    public function installServer(): void
    {
        $this->currentState = 'create-project';
    }

    public function createNewProject(): void
    {
        $this->currentState = 'create-resource';
    }

    public function selectExistingProject(): void
    {
        $this->currentState = 'create-resource';
    }

    public function showNewResource()
    {
        return redirect()->route('project.resource.create');
    }

    public function skipBoarding()
    {
        if (currentTeam()) {
            currentTeam()->update(['show_boarding' => false]);
        }

        return redirect()->route('dashboard');
    }

    public function restartBoarding(): void
    {
        if (currentTeam()) {
            currentTeam()->update(['show_boarding' => true]);
        }
        $this->currentState = 'welcome';
    }

    public function render()
    {
        return view('livewire.boarding.index');
    }
}
