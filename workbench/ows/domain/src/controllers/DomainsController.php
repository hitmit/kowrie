<?php

namespace Ows\Domain\Controllers;

use Ows\Domain\Controllers\BaseController;
use Ows\Domain\Services\Repo\DomainRepositoryInterface;
use View;

class DomainsController extends BaseController
{
    protected $domain;

    function __construct(DomainRepositoryInterface $domain) {
        $this->domain = $domain;
        //parent::__construct();
    }
  public function getIndex()
  {
      $domains = $this->domain->getAll();
      return View::make('domain::index')->with('domains', $domains);
  }

  public function handleBlogSinglePage($blogId)
  {
    // get the blog posts by loading the model
    $Blog = new Blog;
    $blogPost = $Blog->getBlogPost($blogId)->first();

    // setting the view with content
    $this->layout->content = View::make('blogger::blog-fullview')->with('blogpost', $blogPost);
  }
}
