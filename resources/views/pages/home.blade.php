<x-app-layout>
    <div class="banner">
        <!-- Source: https://www.oto.com/en/motor-listrik -->
        <img class="w-full" src="{{ Vite::asset('resources/images/banner.jpg') }}" alt="Banner">
    </div>

    <!-- About Section -->
    <section class="container max-w-5xl mx-auto">
        <h1 class="pt-12 pb-16 text-center font-bold text-3xl">Motor Listrik</h1>
        <div class="flex">
            <ul class="w-1/2">
                <li class="flex mb-8">
                    <div class="w-[36px]">
                        <x-icons.eco-friendly class="w-[36px] fill-current text-red-600"></x-icons.eco-friendly>
                    </div>
                    <div class="pl-4">
                        <h2 class="font-bold text-xl text-zinc-900">Lebih Ramah Lingkungan</h2>
                        <p class="text-zinc-600">Sepeda motor listrik mengandalkan baterai dan dinamo untuk menggerakkan roda, tanpa dibantu
                            oleh mesin konvensional dalam bentuk apapun.</p>
                    </div>
                </li>
                <li class="flex mb-8">
                    <div class="w-[36px]">
                        <x-icons.fuel class="w-[36px] fill-current text-red-600"></x-icons.fuel>
                    </div>
                    <div class="pl-4">
                        <h2 class="font-bold text-xl text-zinc-900">Tidak Perlu Isi Bensin</h2>
                        <p class="text-zinc-600">Tentu, absennya mesin konvensional SPBU jadi tidak perlu disambangi. Cukup cari soket listrik
                            untuk isi ulang baterai. Beberapa merek bahkan akan menyediakan sistem battery swap (tukar baterai).</p>
                    </div>
                </li>
                <li class="flex mb-8">
                    <div class="w-[36px]">
                        <x-icons.scooter class="w-[36px] fill-current text-red-600"></x-icons.scooter>
                    </div>
                    <div class="pl-4">
                        <h2 class="font-bold text-xl text-zinc-900">Pengendaraan Lebih Halus</h2>
                        <p class="text-zinc-600">Getaran mesin konvensional kerap jadi hal yang mengganggu. Lupakan hal tersebut jika sepeda
                            motor Anda berpenggerak dinamo listrik.</p>
                    </div>
                </li>
            </ul>
            <div class="w-2/3">
                <img src="{{ Vite::asset('resources/images/electric-bike.png') }}" alt="Electric Bike">
            </div>
        </div>
    </section>

    <!-- Latest Model Section -->
    <section class="container max-w-5xl mx-auto">
        <h2 class="pt-12 pb-6 text-center font-bold text-2xl">Model Terbaru</h2>
        <livewire:home.latest-model />
    </section>

    <!-- Electric Bike in Indonesia Section -->
    <section class="container max-w-5xl mx-auto">
        <h1 class="pt-12 mt-6 mb-3 text-center font-bold text-3xl">Motor Listrik di Indonesia</h1>
        <div>
            <p class="text-justify text-neutral-700 mb-3">Di Indonesia, sepeda motor dengan penggerak listrik belum jadi hal
                yang lumrah. Maklum, penjualnya juga belum banyak dan regulasi belum mengakomodir. Zero Motorcycle asal
                Amerika Serikat sempat hadir dengan motor listrik berdimensi besar. Meski tidak lama karena harganya
                luar biasa mahal.Tapi sejak 2019, saat pemerintah mengumumkan peraturan soal pajak berbasis emisi,
                pabrikan motor mulai tertarik untuk menjajakannya.</p>
            <p class="text-justify text-neutral-700 mb-3">Tidak hanya pabrikan besar seperti Honda dengan PCX Electric,
                tercatat ada pabrikan baru seperti Gesits yang 100 persen buatan Indonesia dan Viar dengan Q1 mencoba
                menggebrak. Dua merek terakhir itu bahkan sudah memperkenalkan produknya jauh sebelum peraturan disahkan
                oleh Presiden Joko Widodo.</p>
            <p class="text-justify text-neutral-700 mb-3">Namun karena sepeda motor listrik adalah hal baru, masih banyak
                yang ragu untuk menggunakannya. Paling sering terlihat Viar Q1. Itupun masih digunakan untuk moda
                transportasi di lingkungan setempat seperti kompleks perumahan. Padahal, seperti yang pernah kami coba,
                Q1 mumpuni untuk dikendarai sehari-hari. Paling tidak pergi dan pulang kantor dengan jarak 60 km.</p>
            <p class="text-justify text-neutral-700 mb-3">Tapi gebrakan paling mengejutkan datang dari Honda. Mereka resmi
                memasarkan PCX Electric meskipun terbatas untuk fleet, dan belum dijual umum. Tapi dengan adanya merek
                papan atas menjajakan motor seperti ini, tidak perlu lama untuk para produsen lain mendampingi Honda,
                Viar dan Gesits di pasar sepeda motor elektrik. Buktinya United, yang dikenal sebagai produsen sepeda
                mulai melihat pangsa pasar sepeda motor listrik. Ada juga skuter MiGo, yang saat ini belum bisa dibeli,
                tapi sudah bisa disewa.</p>
        </div>
        <div x-data="{selected: null}">
            <ul class="my-6">
                <li class="relative py-3 border-b border-gray-200">
                    <div class="w-full text-left" @click="selected !== 1 ? selected = 1 : selected = null">
                        <span class="cursor-pointer flex items-center justify-between">
                            <span>Mengapa sepeda motor listrik dianggap sebagai teknologi ramah lingkungan?</span>
                            <span class="text-3xl" x-text="selected == 1 ? '-' : '+'"></span>
                        </span>
                    </div>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="text-justify text-neutral-700 text-sm py-3 px-5 mb-3">
                            <p>Karena tidak menggunakan mesin dengan pembakaran dalam (internal combustion engine) yang mengeluarkan emisi gas buang ari proses pembakaran yang menggerakkan piston, untuk menjalankan motor.</p>
                        </div>
                    </div>
                </li>
                <li class="relative py-3 border-b border-gray-200">
                    <div class="w-full text-left" @click="selected !== 2 ? selected = 2 : selected = null">
                        <span class="cursor-pointer flex items-center justify-between">
                            <span>Berapa lama proses isi ulang baterai sepeda motor listrik?</span>
                            <span class="text-3xl" x-text="selected == 2 ? '-' : '+'"></span>
                        </span>
                    </div>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="text-justify text-neutral-700 text-sm py-3 px-5 mb-3">
                            <p>Tergantung kapasitas baterai dan kemampuan alat isi ulang (charger). Saat ini, paling cepat adalah 30 menit. Tapi para produsen berkomitmen untuk memangkas waktu isi ulang baterai ini.</p>
                        </div>
                    </div>

                </li>
                <li class="relative py-3 border-b border-gray-200">
                    <div class="w-full text-left" @click="selected !== 3 ? selected = 3 : selected = null">
                        <span class="cursor-pointer flex items-center justify-between">
                            <span>Mengapa sepeda motor listrik belum bisa diproduksi secara massal di indonesia?</span>
                            <span class="text-3xl" x-text="selected == 3 ? '-' : '+'"></span>
                        </span>
                    </div>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="text-justify text-neutral-700 text-sm py-3 px-5 mb-3">
                            <p>Karena berbagai hal. Mulai dari peraturan pemerintah soal kendaraan elektrik, kesiapan alat produksi, ketersediaan infrastruktur yang masih minim hingga pasar otomotif yang belum familiar dengan kendaraan seperti ini.</p>
                        </div>
                    </div>

                </li>
                <li class="relative py-3 border-b border-gray-200">
                    <div class="w-full text-left" @click="selected !== 4 ? selected = 4 : selected = null">
                        <span class="cursor-pointer flex items-center justify-between">
                            <span>Apakah motor listrik menggunakan oli?</span>
                            <span class="text-3xl" x-text="selected == 4 ? '-' : '+'"></span>
                        </span>
                    </div>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="text-justify text-neutral-700 text-sm py-3 px-5 mb-3">
                            <p>Tidak. Oli bukan cairan utama untuk melancarkan pergerakan komponen. Justru sistem pendingin yang jadi hal utama. Diperlukan untuk mendinginkan baterai dan dinamo penggerak utama.</p>
                        </div>
                    </div>

                </li>
                <li class="relative py-3 border-b border-gray-200">
                    <div class="w-full text-left" @click="selected !== 5 ? selected = 5 : selected = null">
                        <span class="cursor-pointer flex items-center justify-between">
                            <span>Apakah Indonesia sudah siap menerima kehadiran sepeda motor listrik?</span>
                            <span class="text-3xl" x-text="selected == 5 ? '-' : '+'"></span>
                        </span>
                    </div>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="text-justify text-neutral-700 text-sm py-3 px-5 mb-3">
                            <p>Tentu. Peraturan Pemerintah no 73 Tahun 2019 sudah terbit sejak Oktober 2019. Produsen otomotif dan instansi pemerintahan terkait diberi waktu hingga 2021 untuk mempersiapkan segalanya. Saat itu, PP 73 tersebut mulai diberlakukan.</p>
                        </div>
                    </div>

                </li>
                <li class="relative py-3 border-b border-gray-200">
                    <div class="w-full text-left" @click="selected !== 6 ? selected = 6 : selected = null">
                        <span class="cursor-pointer flex items-center justify-between">
                            <span>Seperti apa skema perpajakannya?</span>
                            <span class="text-3xl" x-text="selected == 6 ? '-' : '+'"></span>
                        </span>
                    </div>
                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 6 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                        <div class="text-justify text-neutral-700 text-sm py-3 px-5 mb-3">
                            <p>PPnBM untuk kendaraan berpenggerak listrik adalah 15 persen dengan dasar pengenaan pajak nol persen dari harga jual. Ini sesuai dengan Peraturan Pemerintah No. 73 tahun 2019, yang berlaku penuh pada 16 Oktober 2021.</p>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </section>

    <!-- Latest Article Section -->
    <section class="container max-w-5xl mx-auto pb-16">
        <h2 class="pt-12 pb-6 text-center font-bold text-2xl">Berita dan Artikel Terbaru</h2>
        <livewire:home.latest-article />
    </section>
</x-app-layout>
