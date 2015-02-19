<?php
namespace Ows\Domain\Services\Repo;

use \DB;

class DbDomainThemeRepository implements DomainThemeRepositoryInterface
{
  public function findDomainTheme($id)
  {
    $query = DB::table('domain_theme')
      ->where('domain_id', '=', $id);
    return $query->first();
  }
}