<?php
require_once("basic/header.php");
require_once("include/users.php");
?>
<nav class="navbar navbar-expand-md navbar-light navbar-instagram">
    <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="home.php">
                    <div><img src="svg/instagram.svg" style="height: 20px; border-right: 1px solid #333;" class="pr-3"></div>
                    <div class="pl-3">Instagram</div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <input class="search_box" type="text" size="40" id="search_box" placeholder="Type here to search..." data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="dropdown_box" id="results">
                          <ul id="list" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>[Search results will display here...]</li>
                          </ul>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="register.php">Register</a>
                                </li>


                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="profile/profile.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                    </form>
                                </div>
                            </li> -->

                    </ul>
                </div>
            </div>
        </nav>
