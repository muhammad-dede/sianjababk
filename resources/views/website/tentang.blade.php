@extends('website.layouts.app')

@section('title', __('Tentang'))

@section('content')
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                <li>{{ __('Tentang') }}</li>
            </ol>
            <h2>{{ __('Tentang') }}</h2>

        </div>
    </section>
    <section id="features" class="features">

        <div class="container" data-aos="fade-up">
            <div class="row feture-tabs mt-0" data-aos="fade-up">
                <div class="col-lg-6">
                    <h3>{{ __('Tentang Anjab & ABK') }}</h3>
                    <ul class="nav nav-pills mb-3">
                        <li>
                            <a class="nav-link active" data-bs-toggle="pill" href="#tab1">
                                {{ __('Analisis Jabatan') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#tab2">
                                {{ __('Analisis Beban Kerja') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" data-bs-toggle="pill" href="#tab3">
                                {{ __('Dasar Hukum') }}
                            </a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tab1">
                            <p>
                                {{ __('Yaitu proses, metode dan teknik untuk mendapatkan data jabatan yg diolah menjadi informasi jabatan guna penyusunan kebijakan, program kebijakan, program pembianaan/penataan lembaga, ketatalaksanaan dan kepegawaian, perencanaan kebutuhan diklat serta serta umpan balik bagi organisasi') }}
                            </p>
                        </div>

                        <div class="tab-pane fade show" id="tab2">
                            <p>
                                {{ __('Analisis Beban Kerja (ABK) adalah suatu teknik manajemen yang dilakukan secara sistematis untuk mengukur dan menghitung beban kerja setiap jabatan/unit kerja serta memperoleh informasi mengenai tingkat efektivitas dan efisiensi kerja organisasi berdasarkan volume kerja guna meningkatkan kapasitas organisasi yang profesional, transparan, proporsional dan rasional.') }}
                            </p>
                        </div>

                        <div class="tab-pane fade show" id="tab3">
                            <ol>
                                <li>{{ __('UNDANG-UNDANG NO.43 TAHUN 1999 TENTANG POKOK-POKOK KEPEGAWAIAN.') }}</li>
                                <li>{{ __('UNDANG-UNDANG NO.32 TAHUN 2004 TENTANG PEMERINTAHAN DAERAH.') }}</li>
                                <li>{{ __('PERATURAN PEMERINTAH NOMOR 37 TAHUN 2007 TENTANG PEMBAGIAN URUSAN PEMERINTAHAN ANTARA PEMERINTAH, PEMERINTAH PROPINSI, DAN PEMERINTAH KABUPATEN/ KOTA.') }}
                                </li>
                                <li>{{ __('PERATURAN PEMERINTAH NOMOR 41 TAHUN 2007 TENTANG PEDOMAN ORGANISASI PERANGKAT DAERAH.') }}
                                </li>
                                <li>{{ __('KEPUTUSAN MENTERI DALAM NEGERI NOMOR 6,7,8 TAHUN 2003 TENTANG PEMBINAAN,PENYIDIKAN DAN DIKLAT PNS.') }}
                                </li>
                                <li>{{ __(' PERATURAN MENTERI DALAM NEGERI NOMOR 12 TAHUN 2008 TENTANG PEDOMAN ANALISIS JABATAN DI LINGKUNGAN DEPDAGRI DAN PEMDA') }}
                                </li>
                            </ol>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6">
                    <img src="{{ asset('') }}website/assets/img/features-2.png" class="img-fluid" alt="">
                </div>

            </div>
            <!-- End Feature Tabs -->

        </div>

    </section>
@endsection
