<?php

namespace Ows\Domain\Services\Repo;

interface DomainRepositoryInterface
{

    public function getAll();

    public function findDomain($id);
    
    public function domain_pagination($paginateCountValue);
    
    public function create($data);

    public function domain_multiple_load($data = array());

    public function domain_count_multiple_load($data = array());

    public function domain_record_update($update, $condition = array());

    public function domain_delete($domain_id);
}
