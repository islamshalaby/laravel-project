<div class="sidebar" data-color="purple" data-background-color="black" data-image="/public/assets/img/sidebar-2.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item  ">
                <a class="nav-link" href="javascript:void(0)">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{isActive('categories')}} ">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item {{isActive('subcategories')}} ">
                <a class="nav-link" href="{{route('subcategories.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Sub categories</p>
                </a>
            </li>
            <li class="nav-item {{isActive('products')}} ">
                <a class="nav-link" href="{{route('products.index')}}">
                    <i class="material-icons">
                        redeem
                    </i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{isActive('contacts')}} ">
                <a class="nav-link" href="{{route('contacts.index')}}">
                    <i class="material-icons">
                        redeem
                    </i>
                    <p>Contacts</p>
                </a>
            </li>
            <li class="nav-item {{isActive('socialmedia')}} ">
                <a class="nav-link" href="{{route('socialmedia.edit', 1)}}">
                    <i class="material-icons">
                        redeem
                    </i>
                    <p>Social media</p>
                </a>
            </li>
        </ul>
        </ul>
    </div>
</div>
