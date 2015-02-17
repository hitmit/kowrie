<?php

namespace Ows\Domain\Controllers;

use Ows\Domain\Controllers\BaseController;
use Ows\Domain\Services\Repo\DomainRepositoryInterface;
use View;
use Input;
use Redirect;

class DomainsController extends BaseController
{

    protected $domain;

    function __construct(DomainRepositoryInterface $domain)
    {
        $this->domain = $domain;
    }

    public function getIndex()
    {
        $data = $this->domain->domain_pagination(10);
        $domains = $data['domains'];
        $pagination = $data['pagination'];
        return View::make('domain::index')->with('domains', $domains)->with('pagination', $pagination);
    }

    /**
     * Create a machine name for a domain record.
     *
     * @param $subdomain
     *  The subdomain string of the record, which should be unique.
     *
     * @return
     *  A string with dot and colon transformed to underscore.
     */
    function domain_machine_name($subdomain)
    {
        return preg_replace('/[^a-z0-9_]+/', '_', $subdomain);
    }


    public function createDomain()
    {
        return View::make("domain::create");
    }

    public function create()
    {
        try {
            $input = Input::except('_token', '_method');
            $count = $this->domain->domain_count_multiple_load(array('is_default' => 1 ));
            if (!$count->count)
            {
                $input['is_default'] = 1;
            }

            // If this is the default domain, reset other domains.
            if (!empty($input['is_default']))
            {
                $this->domain->domain_record_update(array('is_default' => 0));
            }

            $this->domain->create($input);
            return Redirect::route('domains')->with('message', 'Domain Created Successfully');

        } catch (\Laracasts\Validation\FormValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function editDomain($domain_id)
    {
     $domain = $this->domain->findDomain($domain_id);
      return View::make("domain::edit")->with("domain", $domain);
    }

    public function update()
    {
      try {
        $input = Input::except('_token', '_method');
        $count = $this->domain->domain_count_multiple_load(array('is_default' => 1 ));
        if (!$count->count)
        {
          $input['is_default'] = 1;
        }

        // If this is the default domain, reset other domains.
        if (!empty($input['is_default']))
        {
          $this->domain->domain_record_update(array('is_default' => 0));
        }
        $domain_id = $input['domain_id'];
        unset($input['domain_id']);
        $this->domain->domain_record_update($input, array('domain_id' => array($domain_id, "=")));
        return Redirect::route('domains')->with('message', 'Domain Updated Successfully');

      } catch (\Laracasts\Validation\FormValidationException $e) {
        return Redirect::back()->withInput()->withErrors($e->getErrors());
      }
    }

}
