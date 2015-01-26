<?php

namespace Ows\Domain\Services\Repo;

use \DB;

class DbDomainRepository implements DomainRepositoryInterface
{

    public function find($id)
    {
        $array = array(7, 6, 9, 8);
        return $array[$id];
    }

    public function getAll()
    {
        $domains = DB::table('domain')->get();
        return $domains;
    }

    public function domain_pagination($paginateCountValue)
    {
        $domains = DB::table('domain')->paginate($paginateCountValue);

        //To show pagination controls
        $pagination = $domains->appends([])->links();

        return array('domains' => $domains, 'pagination' => $pagination);
    }

    public function create($data)
    {
        return DB::table('domain')->insertGetId($data);
    }

    public function domain_multiple_load($data = array())
    {
        $query = DB::table('domain');
        foreach($data as $key => $value)
        {
           $query->where($key, '=', $value);
        }
        return $query->get();
    }

    public function domain_count_multiple_load($data = array())
    {
        $query = DB::table('domain')
            ->select(DB::raw('count(*) as count'));
        foreach($data as $key => $value)
        {
            $query->where($key, '=', $value);
        }
        return $query->first();
    }

    public function domain_record_update($update, $condition = array())
    {
        $query = DB::table('domain');
        foreach($condition as $key => $value)
        {
            $query->where($key,$value[1], $value[0]);
        }
        echo "<pre>";print_r($query); die;
        $query->update($update);
    }
}
