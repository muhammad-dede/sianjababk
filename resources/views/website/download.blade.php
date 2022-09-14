@extends('website.layouts.app')

@section('title', __('Download'))

@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                <li>{{ __('Download') }}</li>
            </ol>
            <h2>{{ __('Download') }}</h2>

        </div>
    </section>
    <section id="faq" class="faq">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>{{ __('Download') }}</h2>
                <p>{{ __('Manual Aplikasi dan Pedoman') }}</p>
            </header>

            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion accordion-flush" id="faqlist1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">
                                    {{ __('Manual Aplikasi Anjab ABK') }}
                                </button>
                            </h2>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#manual1">
                                <div class="accordion-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('Manual Aplikasi (User SKPD)') }}</small>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-2">
                                    {{ __('Video Tutorial Anjab & ABK') }}
                                </button>
                            </h2>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#manual1">
                                <div class="accordion-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('Video User SKPD') }}</small>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="accordion accordion-flush" id="faqlist2">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2-content-1">
                                    {{ __('Pedoman Nama, Ikhtisar, Jabatan Dan Uraian Tugas Jabatan Fungsional Umum') }}
                                </button>
                            </h2>
                            <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <small>
                                                    {{ __('PERMENPAN RB NOMOR 25 TAHUN 2016 TENTANG NOMENKLATUR JABATAN PELAKSANA BAGI PEGAWAI NEGERI SIPIL DI LINGKUNGAN INSTANSI PEMERINTAH') }}
                                                </small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>
                                                    {{ __('PERGUB NO. 55 TAHUN 2015 PENCABUTAN PERGUB NO 19 TAHUN 2015 TATA CARA PENGISIAN JABATAN TINGGI PRATAMA') }}
                                                </small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>
                                                    {{ __('PERGUB NO 13 TAHUN 2015') }}
                                                </small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>
                                                    {{ __('PERKA BKN NOMOR 20 TAHUN 2015 URAIAN TUGAS JABATAN PELAKSANA DI LINGKUNGAN BKN') }}
                                                </small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>
                                                    {{ __('RINCIAN TUGAS PELAKSANA JFU') }}
                                                </small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>
                                                    {{ __('JABATAN PELAKSANA UNTUK DI SEKRETARIAT') }}
                                                </small>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2-content-2">
                                    {{ __('Pedoman Anjab & ABK') }}
                                </button>
                            </h2>
                            <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('PEDOMAN ANALISIS JABATAN') }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('PERMENDAGRI NO. 35 TH. 2012') }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('PERATURAN MENTERI NO.70') }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('KAMUS JABATAN FUNGSIONAL UMUM') }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('PERKA BKN NOMOR 3 TAHUN 2013') }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('PERKA BKN NOMOR 13 TAHUN 2013 PERUBAHAN ATAS PERKA BKN NOMOR 26 TAHUN 2010') }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('RUMPUN JABATAN FUNGSIONAL E-FORMASI MENPAN 2016') }}</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <small>{{ __('JABATAN FUNGSIONAL E-FORMASI MENPAN 2016') }}</small>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
@endsection
