@extends('website.layouts.app')

@section('title', __('Kontak'))

@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                <li>{{ __('Kontak') }}</li>
            </ol>
            <h2>{{ __('Kontak') }}</h2>

        </div>
    </section>
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2>{{ __('Kontak') }}</h2>
                <p>{{ __('Kontak Kami') }}</p>
            </header>
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>{{ __('Alamat') }}</h3>
                                <p>
                                    Jl. Syech Nawawi Al-Bantani No.1
                                    Kawasan Pusat Pemerintahan Provinsi Banten (KP3B)
                                    Kec. Curug, Kota Serang, Provinsi Banten.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>{{ __('Telepon') }}</h3>
                                <p>
                                    (0254) 7039946
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.691341606231!2d106.15625969999999!3d-6.1720654999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e42201e75e26f19%3A0xfac1c3ca4dcd23dc!2sBuilding%20Integrated%20SKPD!5e0!3m2!1sen!2sid!4v1662156763087!5m2!1sen!2sid"
                        width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
