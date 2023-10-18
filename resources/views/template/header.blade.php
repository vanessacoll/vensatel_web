<nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-dark"
    data-navbar-darken-on-scroll="data-navbar-darken-on-scroll">
    <div class="container"><a class="navbar-brand" href="/"><span
                class="text-white dark__text-white">Vensatel</span></a><button class="navbar-toggler collapsed"
            type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
            <ul class="navbar-nav mt-2" data-top-nav-dropdowns="data-top-nav-dropdowns">
                <li class="nav-item dropdown"><a class="nav-link" href="#home_page">Home</a></li>

                <li class="nav-item dropdown"><a class="nav-link" href="#about_page">Nosotros</a></li>


                <li class="nav-item dropdown"><a class="nav-link" href="#services_page">Servicios</a></li>


                <li class="nav-item dropdown"><a class="nav-link" href="#coberture_page">Zona de Cobertura</a></li>


                <li class="nav-item dropdown"><a class="nav-link" href="#contact_page">Contactanos</a></li>
            </ul>


            <ul class="navbar-nav ms-auto mt-2">
                <!-- settings-->
                <li class="nav-item d-flex align-items-center me-2">
                    <div class="nav-link theme-switch-toggle fa-icon-wait p-0"><input
                            class="form-check-input ms-0 theme-switch-toggle-input" id="themeControlToggle"
                            type="checkbox" data-theme-control="theme" value="dark"><label
                            class="mb-0 theme-switch-toggle-label theme-switch-toggle-light" for="themeControlToggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span
                                class="fas fa-sun"></span></label><label
                            class="mb-0 py-2 theme-switch-toggle-light d-lg-none" for="themeControlToggle"><span>Switch
                                to light theme</span></label><label
                            class="mb-0 theme-switch-toggle-label theme-switch-toggle-dark" for="themeControlToggle"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span
                                class="fas fa-moon"></span></label><label
                            class="mb-0 py-2 theme-switch-toggle-dark d-lg-none" for="themeControlToggle"><span>Switch
                                to dark theme</span></label></div>
                </li>

                <!--login-->
                <li class="nav-item dropdown"><a class="nav-link" id="navbarDropdownLogin" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                    <div class="dropdown-menu dropdown-caret dropdown-menu-end dropdown-menu-card"
                        aria-labelledby="navbarDropdownLogin">
                        <div class="card shadow-none navbar-card-login">
                            <div class="card-body fs--1 p-4 fw-normal">
                                <div class="row text-start justify-content-between align-items-center mb-2">
                                    <div class="col-auto">
                                        <h5 class="mb-1">Iniciar session</h5>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                                            type="email" required placeholder="Email" value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            name="password" type="password" required placeholder="Password" />
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" id="modal-checkbox"
                                                    name="remember" />
                                                <label class="form-check-label mb-0"
                                                    for "modal-checkbox">Recuérdame</label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a class="fs--1"
                                                href="../pages/authentication/simple/forgot-password.html">¿Olvidaste tu
                                                contraseña?</a>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                            name="submit">Iniciar sesión</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>
                </li>

                <!--register-->
                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Solicitar Servicio</a></li>

            </ul>
        </div>
    </div>
</nav>
