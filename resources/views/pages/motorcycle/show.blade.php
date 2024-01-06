<x-app-layout title="{{ $title }}">
    <div class="w-full shadow-lg">
        <div class="flex gap-x-5 container max-w-6xl mx-auto py-6">
            <div class="w-1/3">
                <img class="w-full rounded-3xl" src="{{ ($motorcycle->picture && $motorcycle->picture->image) ? Storage::url($motorcycle->picture->image) : 'https://placehold.co/600x400' }}" alt="{{ $motorcycle->model_with_brand }}">
            </div>
            <div class="w-2/3 relative">
                <h2 class="text-2xl mt-5 text-gray-800">{{ $motorcycle->model_with_brand }}</h2>
                <h3 class="text-2xl font-semibold text-gray-800">Rp {{ preg_replace("/\,?0+$/", "", number_format(($motorcycle->price / 1000000), 1, ',', '.')) }} Juta</h3>
                <div class="flex gap-x-10 mt-5">
                    <div class="flex flex-col items-center">
                        <svg class="w-10 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M9.585 2.568a.5.5 0 0 1 .226.58L8.677 6.832h1.99a.5.5 0 0 1 .364.843l-5.334 5.667a.5.5 0 0 1-.842-.49L5.99 9.167H4a.5.5 0 0 1-.364-.843l5.333-5.667a.5.5 0 0 1 .616-.09z"/>
                            <path d="M2 4h4.332l-.94 1H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h2.38l-.308 1H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2"/>
                            <path d="M2 6h2.45L2.908 7.639A1.5 1.5 0 0 0 3.313 10H2zm8.595-2-.308 1H12a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H9.276l-.942 1H12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"/>
                            <path d="M12 10h-1.783l1.542-1.639c.097-.103.178-.218.241-.34zm0-3.354V6h-.646a1.5 1.5 0 0 1 .646.646M16 8a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8"/>
                        </svg>
                        <span class="specification-highlight">{{ $motorcycle->specification->battery_capacity ?? '-' }}Ah</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <svg class="w-10 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3"/>
                        </svg>
                        <span class="specification-highlight">{{ $motorcycle->specification->top_speed ?? '-' }}kmph</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <svg class="w-10 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M14 10a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1zM2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2z"/>
                            <path d="M5 11.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M14 3a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/>
                            <path d="M5 4.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m-2 0a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                        <span class="specification-highlight">{{ $motorcycle->specification->max_power ?? '-' }}hp</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <svg class="w-10 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z"/>
                        </svg>
                        <span class="specification-highlight">{{ $motorcycle->specification->max_torque ?? '-' }}Nm</span>
                    </div>
                </div>
                <div class="flex gap-x-3 absolute bottom-0">
                    <button type="button" class="share__link share__link--facebook mb-2 flex items-center justify-center rounded w-7 h-7 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #1877f2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="h-5">
                            <path fill="currentColor" d="m279.14 288 14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                        </svg>
                    </button>
                    <button type="button" class="share__link share__link--twitter mb-2 flex items-center justify-center rounded w-7 h-7 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #1DA1F2">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                        </svg>
                    </button>
                    <button type="button" class="share__link share__link--whatsapp mb-2 flex items-center justify-center rounded w-7 h-7 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" style="background-color: #25D366">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex gap-x-5 py-5 w-full container max-w-6xl mx-auto">
        <div class="w-full shadow-lg rounded-lg py-3">
            <h2 class="ml-5 mb-2 text-xl font-bold text-gray-800">Spesifikasi {{ $motorcycle->model_with_brand }}</h2>

            <table class="table-spec">
                <tbody>
                <tr>
                    <th rowspan="4">PERFORMA</th>
                    <td class="spec-name">Jenis Penggerak</td>
                    <td class="spec-info">{{ $motorcycle->specification->drive_type }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Tenaga Maksimal</td>
                    <td class="spec-info">{{ $motorcycle->specification->max_power }} hp</td>
                </tr>
                <tr>
                    <td class="spec-name">Torsi Maksimal</td>
                    <td class="spec-info">{{ $motorcycle->specification->max_torque }} Nm</td>
                </tr>
                <tr>
                    <td class="spec-name">Kecepatan Maksimum</td>
                    <td class="spec-info">{{ $motorcycle->specification->top_speed }} kmph</td>
                </tr>
                </tbody>
            </table>
            <table class="table-spec">
                <tbody>
                <tr>
                    <th rowspan="7">DIMENSI</th>
                    <td class="spec-name">Kategori</td>
                    <td class="spec-info capitalize">{{ $motorcycle->category }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Panjang</td>
                    <td class="spec-info">{{ $motorcycle->specification->length }} mm</td>
                </tr>
                <tr>
                    <td class="spec-name">Tinggi</td>
                    <td class="spec-info">{{ $motorcycle->specification->height }} mm</td>
                </tr>
                <tr>
                    <td class="spec-name">Lebar</td>
                    <td class="spec-info">{{ $motorcycle->specification->width }} mm</td>
                </tr>
                <tr>
                    <td class="spec-name">Bobot</td>
                    <td class="spec-info">{{ $motorcycle->specification->weight }} kg</td>
                </tr>
                <tr>
                    <td class="spec-name">Wheelbase</td>
                    <td class="spec-info">{{ $motorcycle->specification->wheel_base }} mm</td>
                </tr>
                <tr>
                    <td class="spec-name">Kapasitas Tempat Duduk</td>
                    <td class="spec-info">{{ $motorcycle->specification->seat_capacity }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table-spec">
                <tbody>
                <tr>
                    <th rowspan="4">Elektrik</th>
                    <td class="spec-name">Kapasitas Baterai</td>
                    <td class="spec-info">{{ $motorcycle->specification->battery_capacity }} Ah {{ $motorcycle->specification->battery_slot != '1' ? 'x' . $motorcycle->specification->battery_slot : '' }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Durasi Pengisian Baterai</td>
                    <td class="spec-info">{{ $motorcycle->specification->battery_charging_time }} h {{ $motorcycle->specification->battery_slot != '1' ? 'x' . $motorcycle->specification->battery_slot : '' }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Berat Baterai</td>
                    <td class="spec-info">{{ $motorcycle->specification->battery_wight }} kg {{ $motorcycle->specification->battery_slot != '1' ? 'x' . $motorcycle->specification->battery_slot : '' }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Slot Baterai</td>
                    <td class="spec-info">{{ $motorcycle->specification->battery_slot }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table-spec">
                <tbody>
                <tr>
                    <th rowspan="2">Transmisi</th>
                    <td class="spec-name">Jenis Transmisi</td>
                    <td class="spec-info">{{ $motorcycle->specification->transmission }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Gear Box</td>
                    <td class="spec-info">{{ $motorcycle->specification->gearbox }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table-spec">
                <tbody>
                <tr>
                    <th rowspan="2">Suspensi</th>
                    <td class="spec-name">Suspensi Depan</td>
                    <td class="spec-info">{{ $motorcycle->specification->front_suspension }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Suspensi Belakang</td>
                    <td class="spec-info">{{ $motorcycle->specification->rear_suspension }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table-spec">
                <tbody>
                <tr>
                    <th rowspan="5">Ban</th>
                    <td class="spec-name">Ukuran Velg Depan</td>
                    <td class="spec-info">{{ $motorcycle->specification->front_wheel_size }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Ban Depan</td>
                    <td class="spec-info">{{ $motorcycle->specification->front_tyre }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Ukuran Velg Belakang</td>
                    <td class="spec-info">{{ $motorcycle->specification->rear_wheel_size }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Ban Belakang</td>
                    <td class="spec-info">{{ $motorcycle->specification->rear_tyre }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Jenis Ban</td>
                    <td class="spec-info">{{ $motorcycle->specification->type_tyre }}</td>
                </tr>
                </tbody>
            </table>
            <table class="table-spec">
                <tbody>
                <tr>
                    <th rowspan="2">Rem</th>
                    <td class="spec-name">Rem Depan</td>
                    <td class="spec-info">{{ $motorcycle->specification->front_brake }}</td>
                </tr>
                <tr>
                    <td class="spec-name">Rem Belakang</td>
                    <td class="spec-info">{{ $motorcycle->specification->rear_brake }}</td>
                </tr>
                </tbody>
            </table>

            <div class="px-5 py-3"><span class="font-bold">Disclaimer </span>Kami tidak dapat menjamin bahwa informasi di halaman ini 100% benar.</div>
        </div>
        <div class="flex flex-col flex-shrink-0 w-[22rem] h-full relative">
            <livewire:partials.latest-model-sidebar lazy />
        </div>
    </div>

    <div class="container max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold mt-3">Pertanyaan dan Komentar</h2>
        <div id="commento"></div>
    </div>

    @push('scripts')
        <script defer src="https://cdn.commento.io/js/commento.js"></script>
    @endpush
</x-app-layout>
