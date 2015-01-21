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
  public function handleBlogListingPage()
  {
      print_r($this->domain->find(0));
    // get the blog posts by loading the model
    // $Blog = new Blog;
    // $blogPosts = $Blog->getBlogPost()->get();

    // // setting the view with content
    // $this->layout->content = View::make('blogger::blog-list')->with('blogposts', $blogPosts);
     return View::make('domain::layout.master');

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
