<?php

namespace Adminetic\Website\Contracts;

use Adminetic\Website\Models\Admin\Team;
use Adminetic\Website\Http\Requests\TeamRequest;

interface TeamRepositoryInterface
{
    public function indexTeam();

    public function createTeam();

    public function storeTeam(TeamRequest $request);

    public function showTeam(Team $Team);

    public function editTeam(Team $Team);

    public function updateTeam(TeamRequest $request, Team $Team);

    public function destroyTeam(Team $Team);
}
