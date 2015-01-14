<?php
class DomainsController extends BaseController
{

  public function handleBlogListingPage()
  {
    // get the blog posts by loading the model
    // $Blog = new Blog;
    // $blogPosts = $Blog->getBlogPost()->get();

    // // setting the view with content
    // $this->layout->content = View::make('blogger::blog-list')->with('blogposts', $blogPosts);
    print_r('hitu');
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
