  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link collapsed" href="index.html">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->





          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-text"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('product.create') }}">
                          <i class="bi bi-circle"></i><span>Add Product</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('product.index') }}">
                          <i class="bi bi-circle"></i><span>Products</span>
                      </a>
                  </li>

              </ul>
          </li><!-- End Forms Nav -->


          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-bar-chart"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ url('saller/orders') }}">
                          <i class="bi bi-circle"></i><span>Orders</span>
                      </a>
                  </li>

              </ul>
          </li><!-- End Charts Nav -->

          {{-- <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-gem"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{url('admin/brand') }}">
                          <i class="bi bi-circle"></i><span>Brands</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{url('admin/colore') }}">
                          <i class="bi bi-circle"></i><span> Colore</span>
                      </a>
                  </li>
                  <li>
                      <a href="icons-boxicons.html">
                          <i class="bi bi-circle"></i><span>Boxicons</span>
                      </a>
                  </li>
              </ul>
          </li> --}}

          <!-- End Icons Nav -->

          <li class="nav-heading">Pages</li>

          <li class="nav-item">
              <a class="nav-link collapsed" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
              </a>
          </li><!-- End Profile Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-contact.html">
                  <i class="bi bi-envelope"></i>
                  <span>Contact</span>
              </a>
          </li><!-- End Contact Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>F.A.Q</span>
              </a>
          </li><!-- End F.A.Q Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-register.html">
                  <i class="bi bi-card-list"></i>
                  <span>Register</span>
              </a>
          </li><!-- End Register Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-login.html">
                  <i class="bi bi-box-arrow-in-right"></i>
                  <span>Login</span>
              </a>
          </li><!-- End Login Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="pages-error-404.html">
                  <i class="bi bi-dash-circle"></i>
                  <span>Error 404</span>
              </a>
          </li><!-- End Error 404 Page Nav -->

          <li class="nav-item">
              <a class="nav-link " href="pages-blank.html">
                  <i class="bi bi-file-earmark"></i>
                  <span>Blank</span>
              </a>
          </li><!-- End Blank Page Nav -->

      </ul>

  </aside><!-- End Sidebar-->
