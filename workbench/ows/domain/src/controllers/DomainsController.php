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
        $data = $this->domain->domain_pagination(1);
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
            $input['machine_name'] = $input['sitename'];

            $count = $this->domain->domain_count_multiple_load(array('is_default' => 1 ));
            if (!$count->count)
            {
                $input['is_default'] = 1;
            }

            // Ensure we have a machine name.
            if (!isset($input['machine_name']))
            {
                $input['machine_name'] = $this->domain_machine_name($input['subdomain']);
            }

            // If this is the default domain, reset other domains.
            if (!empty($input['is_default']))
            {
                $this->domain->domain_record_update(array('is_default' => 1), array('machine_name' => array($input['machine_name'], '<>')));
                echo("<pre>"); print_R($input); die;
            }

            $id = $this->domain->create($input);
            return Redirect::route('domains')->with('message', 'Domain Created Successfully');
            
//            //Validation rules
//            $varidator = array(
//                'PackageStatus' => 'required',
//                'PackageName' => 'required|unique:tellytouch_dat_package',
//                'PackageTeaser' => 'required',
//                'PackagePrice' => 'required|numeric',
//                'PackageDescription' => 'required',
//                'PackageMaxChannels' => 'required',
//                'PackageLocations' => 'required',
//                'DesignID' => 'required',
//                'LogoImage' => 'required',
//                'PackageImage1' => 'image|image',
//                'PackageImage2' => 'image|image',
//                'PackageImage3' => 'image|image',
//                'PackageImage4' => 'image|image'
//            );
//            $messages = array(
//                'DesignID.required' => 'The design field is required',
//            );
//            $validator = Validator::make($input, $varidator, $messages);
//            //Validation check
//            if (!$validator->fails())
//            {
//                //If Data is valid
//                //Assign Required data
//                $input['CreatedDate'] = date('Y-m-d H:i:s');
//                $input['UpdatedDate'] = date('Y-m-d H:i:s');
//                $input['UpdatedUser'] = Sentry::getUser()->id;
//                $input['CreatedUser'] = Sentry::getUser()->id;
//                $input['IPAddress'] = $_SERVER['REMOTE_ADDR'];
//
//                //path for Package images
//                $path = public_path();
//                $path.="/img/packages/";
//                //'PackageImage' . $i will give the name of the image after each iteration
//                //Like PackageImage1, PackageImage2, PackageImage3 etc.
//                for ($i = 1; $i <= 4; $i++)
//                {
//                    if (Input::hasFile('PackageImage' . $i))
//                    {
//                        $ext = $input['PackageImage' . $i]->getClientOriginalExtension();
//                        $upperExt = strtoupper($ext);
//                        $imagename = $input['PackageImage' . $i]->getClientOriginalName();
//                        $imagename = explode(".", $imagename);
//                        $imagename = $imagename[0] . "-" . time() . "." . $ext;
//                        Input::file('PackageImage' . $i)->move($path, $imagename);
//                        $input['PackageImage' . $i] = $imagename;
//                    }
//                }
//
//                $this->package->create($input);
//                return Redirect::route('packages')->with('message', 'Package Created Successfully');
//            } else
//            {
//                //If data is not valid
//                return Redirect::back()->withInput()->withErrors($validator->messages());
//            }
        } catch (\Laracasts\Validation\FormValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

}
