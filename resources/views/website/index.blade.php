@extends('website.layouts.app')

@section('content')
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">{{ config('app.logoname') }}</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        {{ config('app.name') }}
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('login') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>{{ __('Login') }}</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('') }}website/assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>

    <main id="main">
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>{{ __('ALUR') }}</h2>
                    <p>{{ config('app.name') }}</p>
                </header>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="box" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ asset('') }}assets/ilustrations/login.svg" class="img-fluid" alt=""
                                style="height: 200px;">
                            <h3>{{ __('Login') }}</h3>
                            <p>
                                {{ __('Login dengan akun Anda') }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="400">
                            <img src="{{ asset('') }}assets/ilustrations/add-input.svg" class="img-fluid"
                                alt="" style="height: 200px;">
                            <h3>{{ __('Input Informasi Jabatan') }}</h3>
                            <p>
                                {{ __('Menginput informasi jabatan pada form analisa jabatan') }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="600">
                            <img src="{{ asset('') }}assets/ilustrations/input.svg" class="img-fluid" alt=""
                                style="height: 200px;">
                            <h3>{{ __('Input Data ABK') }}</h3>
                            <p>
                                {{ __('Menginput data untuk analisa beban kerja (ABK)') }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </main>
@endsection
