<?php

namespace Ows\Domain\Services\Repo;

interface DomainRepositoryInterface
{

    public function getAll();

    public function find($id);

}
