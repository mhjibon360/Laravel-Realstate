<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            {{ explode(' ', Auth::user()->name)[0] }}
            <span>ADMIN</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a href="{{ route('admin.manage.banner') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Manage Banner</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.manage.video') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Manage Video</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title"> Testimonial</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonial.create') }}" class="nav-link">Add Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.testimonial.index') }}" class="nav-link">All Testimonial</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#choose" role="button" aria-expanded="false"
                    aria-controls="choose">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title"> Choose us</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="choose">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.us.create') }}" class="nav-link">Add Choose us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.us.index') }}" class="nav-link">All Choose us</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.manage.download') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Manage Download</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#platform" role="button" aria-expanded="false"
                    aria-controls="platform">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title"> Download Platform</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="platform">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.platform.create') }}" class="nav-link">Add Download Platform</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.platform.index') }}" class="nav-link">All Download Platform</a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item nav-category">property</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#propertycategory" role="button"
                    aria-expanded="false" aria-controls="propertycategory">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title"> Property-category</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="propertycategory">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.property-category.create') }}" class="nav-link">
                                Add Property-category</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.property-category.index') }}" class="nav-link">
                                All Property-category</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#location" role="button" aria-expanded="false"
                    aria-controls="location">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title"> Manage Location</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="location">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.location.create') }}" class="nav-link">
                                Add Location</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.location.index') }}" class="nav-link">
                                All Location</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#propertytype" role="button"
                    aria-expanded="false" aria-controls="propertytype">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title"> Poroperty Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="propertytype">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.property-type.create') }}" class="nav-link">
                                Add Poroperty Type</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.property-type.index') }}" class="nav-link">
                                All Poroperty Type</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false"
                    aria-controls="property">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Manage Poroperty </span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="property">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.property.create') }}" class="nav-link">
                                Add Poroperty </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.property.index') }}" class="nav-link">
                                All Poroperty </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.active.property') }}" class="nav-link">
                                Active Poroperty </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.deactive.property') }}" class="nav-link">
                                Deactive Poroperty </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">BLog/News & Article</li>
            <li class="nav-item">
                <a href="{{ route('admin.blog-category.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Blog Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#blogtag" role="button" aria-expanded="false"
                    aria-controls="blogtag">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Blog Tags </span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="blogtag">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-tag.create') }}" class="nav-link">
                                Add Tag </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-tag.index') }}" class="nav-link">
                                All Tag </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#blogpost" role="button" aria-expanded="false"
                    aria-controls="blogpost">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Blog Post </span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="blogpost">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-post.create') }}" class="nav-link">
                                Add Blog Post </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog-post.index') }}" class="nav-link">
                                All Blog Post </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">price/Package </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#pricing" role="button" aria-expanded="false"
                    aria-controls="pricing">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Choose Plan</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="pricing">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.package-plan.create') }}" class="nav-link">
                                Add Choose Plan </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.package-plan.index') }}" class="nav-link">
                                All Choose Plan </a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Admin/Agent/Customer </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#account" role="button" aria-expanded="false"
                    aria-controls="account">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Manage Accounts</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="account">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.all.agent.account') }}" class="nav-link"> Agent List </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.all.customer.account') }}" class="nav-link"> Customer List </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Seo/General Setting </li>
            <li class="nav-item">
                <a href="{{ route('admin.general.setting') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Manage Setting</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
