{{--
    OUR SERVICES
    Semua data OUR SERVICES berasal dari $services dari database/CRUD Admin.

    Perubahan versi ini:
    - Judul OUR SERVICES sedikit dinaikkan.
    - Nama layanan tetap berada di atas gambar.
    - Ditambahkan dot slider bulat di bawah gambar.
    - Informasi Deskripsi, Fungsi, Manfaat, dan Dampak tampil sebagai
      accordion: awalnya hanya judul, lalu setiap kotak dapat dibuka
      secara independen. Beberapa kotak bisa terbuka bersamaan.
    - Isi tetap mengikuti field *_active + *_judul + field isi dari CRUD.
    - LIHAT SELENGKAPNYA membuka produk berdasarkan kecocokan NAMA.
--}}

<section class="layanan-services section" id="layanan">

    <div class="container">

        <div class="layanan-services__heading scroll-reveal">
            <span class="layanan-services__label">{{ $servicePageSetting?->judul ?? 'OUR SERVICES' }}</span>
        </div>

        @if ($services->count() > 0)

            @php
                /*
                 * Project Admin berjalan di port 8001.
                 * Gambar layanan disimpan oleh Admin pada:
                 * public/uploads/services/
                 */
                $adminUrl = 'http://127.0.0.1:8001';

                $serviceNames = $services->pluck('nama')->values();
            @endphp

            <div class="layanan-services__showcase scroll-reveal">

                <div class="layanan-services__showcase-grid">

                    <div class="layanan-services__visual">

                        <div
                            class="layanan-services__product-name"
                            id="layananServicesServiceName"
                        >
                            {{ $services->first()->nama }}
                        </div>

                        <div class="layanan-services__image-controls">

                            <button
                                type="button"
                                class="layanan-services__slider-button layanan-services__slider-button--prev"
                                id="layananServicesPrev"
                                aria-label="Layanan sebelumnya"
                            >
                                <span aria-hidden="true">‹</span>
                            </button>

                            <div
                                class="layanan-services__image-frame"
                                id="layananServicesImageFrame"
                            >

                                @foreach ($services as $index => $service)

                                    @php
                                        $gambar = trim((string) $service->gambar);

                                        if ($gambar !== '') {
                                            if (
                                                str_starts_with($gambar, 'http://') ||
                                                str_starts_with($gambar, 'https://')
                                            ) {
                                                $gambarUrl = $gambar;
                                            } elseif (str_starts_with($gambar, 'storage/')) {
                                                $gambarUrl = $adminUrl . '/' . $gambar;
                                            } elseif (str_starts_with($gambar, '/storage/')) {
                                                $gambarUrl = $adminUrl . $gambar;
                                            } elseif (str_starts_with($gambar, 'uploads/')) {
                                                $gambarUrl = $adminUrl . '/' . $gambar;
                                            } elseif (str_starts_with($gambar, '/uploads/')) {
                                                $gambarUrl = $adminUrl . $gambar;
                                            } elseif (str_starts_with($gambar, 'services/')) {
                                                $gambarUrl = $adminUrl . '/uploads/' . $gambar;
                                            } elseif (str_starts_with($gambar, '/services/')) {
                                                $gambarUrl = $adminUrl . '/uploads' . $gambar;
                                            } else {
                                                $gambarUrl = $adminUrl . '/uploads/services/' . ltrim($gambar, '/');
                                            }
                                        } else {
                                            $gambarUrl = asset('images/10.png');
                                        }
                                    @endphp

                                    <div
                                        class="layanan-services__image-slide {{ $index === 0 ? 'is-active' : '' }}"
                                        data-index="{{ $index }}"
                                    >
                                        <img
                                            src="{{ $gambarUrl }}"
                                            alt="{{ $service->nama }}"
                                            class="layanan-services__main-image"
                                            loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                                            draggable="false"
                                        >
                                    </div>

                                @endforeach

                            </div>

                            <button
                                type="button"
                                class="layanan-services__slider-button layanan-services__slider-button--next"
                                id="layananServicesNext"
                                aria-label="Layanan berikutnya"
                            >
                                <span aria-hidden="true">›</span>
                            </button>

                        </div>

                        {{-- DOT SLIDER DI BAWAH GAMBAR --}}
                        <div
                            class="layanan-services__dots"
                            id="layananServicesDots"
                            aria-label="Pilih layanan"
                        >
                            @foreach ($services as $index => $service)
                                <button
                                    type="button"
                                    class="layanan-services__dot {{ $index === 0 ? 'is-active' : '' }}"
                                    data-index="{{ $index }}"
                                    aria-label="Tampilkan {{ $service->nama }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                ></button>
                            @endforeach
                        </div>

                    </div>

                    <div class="layanan-services__content">

                        <div
                            class="layanan-services__information"
                            id="layananServicesInformation"
                        >

                            @foreach ($services as $index => $service)

                                @php
                                    $informationItems = [
                                        [
                                            'title' => $service->deskripsi_judul,
                                            'content' => $service->deskripsi,
                                            'active' => $service->deskripsi_active,
                                        ],
                                        [
                                            'title' => $service->fungsi_judul,
                                            'content' => $service->fungsi,
                                            'active' => $service->fungsi_active,
                                        ],
                                        [
                                            'title' => $service->manfaat_judul,
                                            'content' => $service->manfaat,
                                            'active' => $service->manfaat_active,
                                        ],
                                        [
                                            'title' => $service->dampak_judul,
                                            'content' => $service->dampak,
                                            'active' => $service->dampak_active,
                                        ],
                                    ];

                                    $informationItems = collect($informationItems)
                                        ->filter(function ($item) {
                                            return (bool) $item['active']
                                                && trim((string) $item['title']) !== ''
                                                && trim((string) $item['content']) !== '';
                                        })
                                        ->values();
                                @endphp

                                <div
                                    class="layanan-services__product-panel {{ $index === 0 ? 'is-active' : '' }}"
                                    data-index="{{ $index }}"
                                >

                                    @if ($informationItems->count() > 0)

                                        @foreach ($informationItems as $itemIndex => $item)

                                            <article class="layanan-services__information-box">

                                                <button
                                                    type="button"
                                                    class="layanan-services__information-toggle"
                                                    aria-expanded="false"
                                                >
                                                    <span class="layanan-services__information-title">
                                                        {{ $item['title'] }}
                                                    </span>
                                                </button>

                                                <div class="layanan-services__information-body">

                                                    <div class="layanan-services__information-inner">

                                                        <div class="layanan-services__information-text">
                                                            {!! $item['content'] !!}
                                                        </div>

                                                                            @php
                                                            /*
                                                             * PENTING:
                                                             * Layanan dan Produk dicocokkan berdasarkan NAMA.
                                                             *
                                                             * Contoh:
                                                             * Layanan  : Pengadaan Barang dan Jasa
                                                             * Produk   : Pengadaan Barang dan Jasa
                                                             *
                                                             * Hanya produk dengan nama yang sama yang boleh
                                                             * menjadi tujuan tombol LIHAT SELENGKAPNYA.
                                                             */
                                                            $matchedProduct = null;

                                                            if (isset($products) && $products->count() > 0) {
                                                                $serviceNameNormalized = preg_replace(
                                                                    '/\\s+/',
                                                                    ' ',
                                                                    trim(mb_strtolower((string) $service->nama))
                                                                );

                                                                $matchedProduct = $products->first(
                                                                    function ($product) use ($serviceNameNormalized) {
                                                                        $productNameNormalized = preg_replace(
                                                                            '/\\s+/',
                                                                            ' ',
                                                                            trim(mb_strtolower((string) $product->nama))
                                                                        );

                                                                        return $productNameNormalized === $serviceNameNormalized;
                                                                    }
                                                                );
                                                            }
                                                        @endphp

                                                        @if ($matchedProduct)
                                                            <a
                                                                href="{{ route('produk.show', $matchedProduct->id) }}"
                                                                class="layanan-services__detail-link"
                                                            >
                                                                <span>LIHAT SELENGKAPNYA</span>
                                                                <span aria-hidden="true">↗</span>
                                                            </a>
                                                        @else
                                                            <span
                                                                class="layanan-services__detail-link layanan-services__detail-link--disabled"
                                                                aria-disabled="true"
                                                                title="Belum ada aplikasi dengan nama yang sama"
                                                            >
                                                                <span>LIHAT SELENGKAPNYA</span>
                                                                <span aria-hidden="true">↗</span>
                                                            </span>
                                                        @endif

                                                    </div>

                                                </div>

                                            </article>

                                        @endforeach

                                    @else

                                        <div class="layanan-services__empty-content">
                                            Informasi layanan belum tersedia.
                                        </div>

                                    @endif

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        @else

            <div class="layanan-services__empty">
                Belum ada layanan yang tersedia.
            </div>

        @endif

    </div>

</section>

<style>
    .layanan-services__detail-link {
        width: 100%;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 4px;
        margin-top: 8px;
        color: #0b78c8;
        text-decoration: none;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: .65px;
        line-height: 1.2;
        text-align: right;
    }

    .layanan-services__detail-link:hover {
        color: #073763;
        text-decoration: underline;
    }

    .layanan-services__detail-link span {
        font-size: 10px;
        line-height: 1;
    }

    .layanan-services__detail-link--disabled {
        justify-content: flex-end;
    }

    @media (max-width: 600px) {
        .layanan-services__detail-link {
            font-size: 8px;
            letter-spacing: .5px;
        }

        .layanan-services__detail-link span {
            font-size: 9px;
        }
    }

    .layanan-services__detail-link--disabled {
        cursor: not-allowed;
        opacity: .45;
        text-decoration: none;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const root = document.getElementById('layanan');

    if (!root) {
        return;
    }

    const slides = Array.from(
        root.querySelectorAll('.layanan-services__image-slide')
    );

    const panels = Array.from(
        root.querySelectorAll('.layanan-services__product-panel')
    );

    const productName = root.querySelector(
        '#layananServicesServiceName'
    );

    const previousButton = root.querySelector(
        '#layananServicesPrev'
    );

    const nextButton = root.querySelector(
        '#layananServicesNext'
    );

    const imageFrame = root.querySelector(
        '#layananServicesImageFrame'
    );

    const dots = Array.from(
        root.querySelectorAll('.layanan-services__dot')
    );

    const currentServiceNames = @json($serviceNames ?? []);

    if (!slides.length || !panels.length) {
        return;
    }

    let activeIndex = 0;

    function setImageSizeMode(image) {
        if (!image) {
            return;
        }

        const slide = image.closest(
            '.layanan-services__image-slide'
        );

        if (!slide) {
            return;
        }

        slide.classList.remove(
            'is-natural',
            'is-cover'
        );

        const isSmall =
            image.naturalWidth <= 1080 &&
            image.naturalHeight <= 800;

        slide.classList.add(
            isSmall ? 'is-natural' : 'is-cover'
        );
    }

    root.querySelectorAll(
        '.layanan-services__main-image'
    ).forEach(function (image) {
        if (image.complete) {
            setImageSizeMode(image);
        }

        image.addEventListener(
            'load',
            function () {
                setImageSizeMode(image);
            },
            { once: false }
        );
    });

    function closeAllAccordions(panel) {
        const scope = panel || root;

        scope.querySelectorAll(
            '.layanan-services__information-box.is-open'
        ).forEach(function (box) {
            box.classList.remove('is-open');

            const toggle = box.querySelector(
                '.layanan-services__information-toggle'
            );

            if (toggle) {
                toggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    function showProduct(index) {
        if (index >= slides.length) {
            index = 0;
        }

        if (index < 0) {
            index = slides.length - 1;
        }

        activeIndex = index;

        slides.forEach(function (slide, slideIndex) {
            slide.classList.toggle(
                'is-active',
                slideIndex === activeIndex
            );
        });

        panels.forEach(function (panel, panelIndex) {
            const isActive = panelIndex === activeIndex;

            panel.classList.toggle(
                'is-active',
                isActive
            );

            if (isActive) {
                closeAllAccordions(panel);
            }
        });

        if (productName) {
            productName.textContent =
                currentServiceNames[activeIndex] ?? '';
        }

        dots.forEach(function (dot, dotIndex) {
            const isActive = dotIndex === activeIndex;

            dot.classList.toggle(
                'is-active',
                isActive
            );

            dot.setAttribute(
                'aria-current',
                isActive ? 'true' : 'false'
            );
        });
    }

    function buttonFeedback(button) {
        if (!button) {
            return;
        }

        button.classList.remove('is-pressed');
        void button.offsetWidth;
        button.classList.add('is-pressed');

        window.setTimeout(function () {
            button.classList.remove('is-pressed');
        }, 180);
    }

    if (previousButton) {
        previousButton.addEventListener('click', function () {
            buttonFeedback(previousButton);
            showProduct(activeIndex - 1);
        });
    }

    if (nextButton) {
        nextButton.addEventListener('click', function () {
            buttonFeedback(nextButton);
            showProduct(activeIndex + 1);
        });
    }

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            const index = Number(dot.dataset.index);

            if (Number.isNaN(index)) {
                return;
            }

            showProduct(index);
        });
    });

    root.querySelectorAll(
        '.layanan-services__information-toggle'
    ).forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const box = toggle.closest(
                '.layanan-services__information-box'
            );

            if (!box) {
                return;
            }

            const isOpen = box.classList.toggle('is-open');

            toggle.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );
        });
    });

    let touchStartX = 0;
    let touchStartY = 0;

    if (imageFrame) {
        imageFrame.addEventListener(
            'touchstart',
            function (event) {
                const touch = event.changedTouches[0];

                touchStartX = touch.screenX;
                touchStartY = touch.screenY;
            },
            { passive: true }
        );

        imageFrame.addEventListener(
            'touchend',
            function (event) {
                const touch = event.changedTouches[0];

                const differenceX =
                    touchStartX - touch.screenX;

                const differenceY =
                    touchStartY - touch.screenY;

                if (
                    Math.abs(differenceX) < 50 ||
                    Math.abs(differenceX) <= Math.abs(differenceY)
                ) {
                    return;
                }

                if (differenceX > 0) {
                    showProduct(activeIndex + 1);
                } else {
                    showProduct(activeIndex - 1);
                }
            },
            { passive: true }
        );
    }

    showProduct(0);
});
</script>
