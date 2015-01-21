<?php

namespace Ows\Domain\Services\Repo;

class DbDomainRepository implements DomainRepositoryInterface
{
    public function find($id)
    {
      $array = array(7,6,9,8);
      return $array[$id];
    }

    public function getAll()
    {
        return array(1,2,3,4,5);
    }

}
