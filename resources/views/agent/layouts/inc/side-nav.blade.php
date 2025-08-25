 <nav class="sidebar">
     <div class="sidebar-header">
         <a href="{{ route('agent.dashboard') }}" class="sidebar-brand">
             {{ explode(' ', Auth::user()->name)[0] }} <span>Agent</span>
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
                 <a href="{{ route('agent.dashboard') }}" class="nav-link">
                     <i class="link-icon" data-feather="box"></i>
                     <span class="link-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item nav-category">Package</li>
             <li class="nav-item">
                 <a href="{{ route('agent.all.plan') }}" class="nav-link">
                     <i class="link-icon" data-feather="box"></i>
                     <span class="link-title">Buy Package</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a href="{{ route('agent.package.purchase.history') }}" class="nav-link">
                     <i class="link-icon" data-feather="box"></i>
                     <span class="link-title">PUrchase History</span>
                 </a>
             </li>
             <li class="nav-item nav-category">property</li>

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
                             <a href="{{ route('agent.property.create') }}" class="nav-link">
                                 Add Poroperty </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('agent.property.index') }}" class="nav-link">
                                 All Poroperty </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('agent.active.property') }}" class="nav-link">
                                 Active Poroperty </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('agent.deactive.property') }}" class="nav-link">
                                 Deactive Poroperty </a>
                         </li>
                     </ul>
                 </div>
             </li>

         </ul>
     </div>
 </nav>
