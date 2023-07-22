      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">Ürün & Kategori</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Ürünler
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürün Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('product.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ürünleri Listele</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Kategoriler
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Listele</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subCategory.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alt Kategori Ekle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('subCategory.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alt Kategori Listele</p>
                </a>
              </li>
            </ul>
        </li>


      </nav>
