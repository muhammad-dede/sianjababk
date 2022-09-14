<footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <img src="{{ asset('') }}logo.png" alt="">
                        <span>{{ config('app.logoname') }}</span>
                    </a>
                    <p>
                        {{ config('app.name') }}
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>{{ __('Link') }}</h4>
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{ route('index') }}">{{ __('Home') }}</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{ route('tentang') }}">{{ __('Tentang') }}</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{ route('download') }}">{{ __('Download') }}</a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="{{ route('kontak') }}">{{ __('Kontak') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>{{ __('Link Terkait') }}</h4>
                    <ul>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="https://bantenprov.go.id/home" target="_blank">
                                {{ __('Provinsi Banten') }}
                            </a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="https://biroorganisasi.bantenprov.go.id/" target="_blank">
                                {{ __('Biro Organisasi Sekretariat Daerah') }}
                            </a>
                        </li>
                        <li>
                            <i class="bi bi-chevron-right"></i>
                            <a href="http://bkd.bantenprov.go.id/" target="_blank">
                                {{ __('BKD') }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        Jl. Syech Nawawi Al-Bantani No.1
                        Kawasan Pusat Pemerintahan Provinsi Banten (KP3B)
                        Kec. Curug, Kota Serang, Provinsi Banten.
                        <br>
                        <br>
                        <strong>{{ __('Telepon') }}:</strong> (0254) 7039946<br>
                        <strong>{{ __('Fax') }}:</strong> (0254) 267041<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ config('app.logoname') }}</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>
