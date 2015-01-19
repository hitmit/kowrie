<?php

namespace Ows\Domain\Services\Repo;

class DbDomainRepository implements DomainRepositoryInterface
{
    public function find($id)
    {
        return Domain::findOrFail($id);
    }

    public function getAll()
    {
        return Domain::all();
    }

}