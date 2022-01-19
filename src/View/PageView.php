<?php
namespace App\View;

abstract class PageView implements Rendering
{
    public function render()
    {
        return
            $this->renderHead() .
            $this->renderBody();
    }

    public function renderHead()
    {
        return
            '<!doctype html>
                <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="">
                    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
                    <meta name="generator" content="Hugo 0.88.1">
                    <title>Blog Template · Bootstrap v5.1</title>
                    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
                          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                    <link rel="stylesheet" href="/css/myStyles.css">
                    <style>
                        .bd-placeholder-img {
                            font-size: 1.125rem;
                            text-anchor: middle;
                            -webkit-user-select: none;
                            -moz-user-select: none;
                            user-select: none;
                        }
                        @media (min-width: 768px) {
                            .bd-placeholder-img-lg {
                                font-size: 3.5rem;
                            }
                        }
                    </style>
                    <link href="/css/bootstrap/blog.css" rel="stylesheet">
                    <link href="/css/bootstrap/blog.rtl.css" rel="stylesheet">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script type="text/javascript" src="/js/ajax.js"></script>
                </head>';
    }

    public function renderBody()
    {
        return
            '<body>
                <div class="container">
                ' . $this->renderHeader() .
                $this->renderNavigation() .
                $this->renderContent() .
                $this->renderFooter() . '
                </div>
            </body>';
    }

    public function renderHeader()
    {
        return
            '<header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <a class="link-secondary" href="#">Subscribe</a>
                    </div>
                    <div class="col-4 text-center">
                        <a class="blog-header-logo text-dark" href="#">My first BlogSite</a>
                    </div>
                    ' . $this->renderHeaderCol4() . '
                </div>
            </header>';
    }

    public function renderHeaderCol4()
    {
        return
            '<div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
            </div>';
    }

    public function renderContent()
    {
        return
            'content';
    }

    public function renderNavigation()
    {
        return
            '<div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <a class="p-2 link-secondary" href="/">Main</a>
                    <a class="p-2 link-secondary" href="/admin">Admin</a>
                    <a class="p-2 link-secondary" href="/about">About Us</a>
                    <a class="p-2 link-secondary" href="/posts">Post</a>
                    <a class="p-2 link-secondary" href="test.php">Test</a>
                </nav>
            </div>';
    }

    public function renderFooter()
    {
        return
            '<footer class="blog-footer">
                <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
                <p>
                    <a href="#">Back to top</a>
                </p>
            </footer>';
    }
}