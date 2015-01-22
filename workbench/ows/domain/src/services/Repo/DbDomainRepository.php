<?php

namespace Ows\Domain\Services\Repo;

use \DB;

class DbDomainRepository implements DomainRepositoryInterface
{
    public function find($id)
    {
      $array = array(7,6,9,8);
      return $array[$id];
    }

    public function getAll()
    {
        $domains = DB::table('domain')->get();
        return $domains;
    }

}
