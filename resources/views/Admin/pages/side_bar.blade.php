<div class="page-sidebar">
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div><img class="img-60 rounded-circle lazyloaded blur-up"
                    src="{{ asset('assets/images/dashboard/man.png') }}" alt="#">
            </div>
            <h6 class="mt-3 f-14">JOHN</h6>
            <p>Ux Designer</p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="index.html"><i data-feather="home"></i><span>Dashboard</span></a></li>
            <li><a class="sidebar-header" href=""><i data-feather="users"></i><span>Client</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('client.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
                    <li><a href="{{ route('client.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="users"></i><span> Fournisseurs</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('fournisseur.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
                    <li><a href="{{ route('fournisseur.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
                </ul>
            </li>

            <li><a class="sidebar-header" href=""><i data-feather="gift"></i><span> Categorie</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('categorie.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
                    <li><a href="{{ route('categorie.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>
                        Produit</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('produit.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
                    <li><a href="{{ route('produit.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span> Slide</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('Slide.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li> 
                 <li><a href="{{ route('Slide.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
                </ul>
            </li>
           <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>
                        Pub</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('pub.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
                    <li><a href="{{ route('pub.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
                </ul>
            </li>
                {{-- Page --}}
            <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>
                        Page</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('page.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
                    <li><a href="{{ route('page.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
                </ul>
            </li>  

                    {{-- ####################Temoignage##################--}}
     <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>Temoignage</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('temoignage.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
            <li><a href="{{ route('temoignage.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
        </ul>
    </li>

                    {{-- ####################Partenaire##################--}}
     <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>Partenaire</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('partenaire.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
            <li><a href="{{ route('partenaire.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
        </ul>
    </li>

                    {{-- ####################Blog##################--}}
     <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>Blog</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('blog.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
            <li><a href="{{ route('blog.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
        </ul>
    </li>
                    {{-- ####################Equipe##################--}}
     <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>Equipe</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('equipe.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
            <li><a href="{{ route('equipe.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
        </ul>
    </li>
    
                    {{-- ####################Expertise##################--}}
     <li><a class="sidebar-header" href=""><i data-feather="shopping-bag"></i><span>Expertise</span><i class="fa fa-angle-right pull-right"></i></a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route('expertise.create') }}"><i class="fa fa-circle"></i>Ajouter</a></li>
            <li><a href="{{ route('expertise.index') }}"><i class="fa fa-circle"></i>Lister</a></li>
        </ul>
    </li>



            <li>
                <!-- Déconnexion -->
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <a class="sidebar-header" style="cursor: pointer;" href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i data-feather="log-in"></i><span>Logout</span>
                    </a>
                </form>
            </li>

        </ul>
    </div>
</div>
