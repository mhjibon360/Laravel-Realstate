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
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title"> E-mail</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/email/read.html" class="nav-link">Read</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
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
                <a class="nav-link" data-bs-toggle="collapse" href="#propertytype" role="button" aria-expanded="false"
                    aria-controls="propertytype">
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
        </ul>
    </div>
</nav>
