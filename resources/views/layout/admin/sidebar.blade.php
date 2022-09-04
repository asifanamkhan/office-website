<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li >
                <a href="{{route('admin.dashboard')}}" class="{{ \Request::is('admin/dashboard') }}">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                </a>
            </li>

            <li class="app-sidebar__heading">Company</li>
            <li class="{{ \Request::is('admin/abouts*') || \Request::is('admin/abouts') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-home"></i>
                    About
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.abouts.index')}}" class="{{ \Request::is('admin/abouts') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All about
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.abouts.create')}} " class="{{ \Request::is('admin/abouts/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create about
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ \Request::is('admin/slides*') || \Request::is('admin/slides') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-photo"></i>
                    Slide
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.slides.index')}}" class="{{ \Request::is('admin/slides') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All slides
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.slides.create')}} " class="{{ \Request::is('admin/slides/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create slide
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ \Request::is('admin/services*') || \Request::is('admin/services') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-album"></i>
                    Service
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.services.index')}}" class="{{ \Request::is('admin/services') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All services
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.services.create')}} " class="{{ \Request::is('admin/services/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create service
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ \Request::is('admin/portfolios*') || \Request::is('admin/portfolios') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-portfolio"></i>
                    Portfolio
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.portfolios.index')}}" class="{{ \Request::is('admin/portfolios') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All portfolios
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.portfolios.create')}} " class="{{ \Request::is('admin/portfolios/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create portfolio
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ \Request::is('admin/teams*') || \Request::is('admin/teams') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-portfolio"></i>
                    Team
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.teams.index')}}" class="{{ \Request::is('admin/teams') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All members
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.teams.create')}} " class="{{ \Request::is('admin/teams/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create member
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ \Request::is('admin/techs*') || \Request::is('admin/techs') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-portfolio"></i>
                    Tech
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.techs.index')}}" class="{{ \Request::is('admin/techs') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All techs
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.techs.create')}} " class="{{ \Request::is('admin/techs/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create tech
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \Request::is('admin/testimonials*') || \Request::is('admin/testimonials') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-star"></i>
                    Testimonial
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.testimonials.index')}}" class="{{ \Request::is('admin/testimonials') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All testimonial
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.testimonials.create')}} " class="{{ \Request::is('admin/testimonials/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create testimonial
                        </a>
                    </li>
                </ul>
            </li>
            <li class="app-sidebar__heading">Audience</li>
            <li class="{{ \Request::is('admin/clients*') || \Request::is('admin/clients') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-user"></i>
                    Client
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.clients.index')}}" class="{{ \Request::is('admin/clients') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All clients
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.clients.create')}} " class="{{ \Request::is('admin/clients/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create client
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \Request::is('admin/contacts*') || \Request::is('admin/contacts') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-user"></i>
                    Contact
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.contacts.index')}}" class="{{ \Request::is('admin/contacts') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All contacts
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.contacts.create')}} " class="{{ \Request::is('admin/contacts/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create contact
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \Request::is('admin/newsletters*') || \Request::is('admin/newsletters') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-user"></i>
                    Newsletter
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.newsletters.index')}}" class="{{ \Request::is('admin/newsletters') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All newsletters
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.newsletters.create')}} " class="{{ \Request::is('admin/newsletters/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create newsletter
                        </a>
                    </li>
                </ul>
            </li>
            <li class="app-sidebar__heading">Blog</li>
            <li class="{{ \Request::is('admin/posts*') || \Request::is('admin/posts*') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-pen"></i>
                    Post
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.posts.index')}}" class="{{ \Request::is('admin/posts') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All posts
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.posts.create')}} " class="{{ \Request::is('admin/posts/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create post
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \Request::is('admin/comments*') || \Request::is('admin/comments') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-ribbon"></i>
                    Comment
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.comments.index')}}" class="{{ \Request::is('admin/comments') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All comments
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.comments.create')}} " class="{{ \Request::is('admin/comments/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create comments
                        </a>
                    </li>
                </ul>
            </li>
            <li class="app-sidebar__heading">Settings</li>
            <li class="{{ \Request::is('admin/categories*') || \Request::is('admin/categories') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-user"></i>
                    Category
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.categories.index')}}" class="{{ \Request::is('admin/categories') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All categories
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.categories.create')}} " class="{{ \Request::is('admin/categories/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create category
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ \Request::is('admin/tags*') || \Request::is('admin/tags') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-user"></i>
                    Tag
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <ul>
                        <li >
                            <a href="{{route('admin.tags.index')}}" class="{{ \Request::is('admin/tags') ? 'mm-active' : ''  }}">
                                <i class="metismenu-icon">
                                </i>All tags
                            </a>
                        </li>
                        <li >
                            <a href="{{route('admin.tags.create')}} " class="{{ \Request::is('admin/abouts/categories') ? 'mm-active' : ''  }}">
                                <i class="metismenu-icon">
                                </i>Create tag
                            </a>
                        </li>
                    </ul>
                </ul>
            </li>
            <li class="{{ \Request::is('admin/settings*') || \Request::is('admin/settings') ? 'mm-active' : ''  }}">
                <a href="#">
                    <i class="metismenu-icon pe-7s-user"></i>
                    Settings
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                    <li >
                        <a href="{{route('admin.settings.index')}}" class="{{ \Request::is('admin/settings') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>All settings
                        </a>
                    </li>
                    <li >
                        <a href="{{route('admin.settings.create')}} " class="{{ \Request::is('admin/settings/create') ? 'mm-active' : ''  }}">
                            <i class="metismenu-icon">
                            </i>Create setting
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>