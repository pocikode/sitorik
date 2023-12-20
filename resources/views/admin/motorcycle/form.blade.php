<x-admin-layout>
    <div class="py-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4 px-4">
                @if($motorcycle)
                    {{ Breadcrumbs::render('motorcycles-edit', $motorcycle) }}
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Edit Motorcycle</h1>
                @else
                    {{ Breadcrumbs::render('motorcycles-create') }}
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Create Motorcycle</h1>
                @endif
            </div>

            @if($motorcycle)
                <form class="px-4 relative bg-white rounded-lg dark:bg-gray-800" action="{{ route('admin.motorcycles.edit', $motorcycle->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
            @else
                <form class="px-4 relative bg-white rounded-lg dark:bg-gray-800" action="{{ route('admin.motorcycles') }}" method="post" enctype="multipart/form-data">
                    @csrf
            @endif
                <!-- Basic Info -->
                <h3 class="mb-3 text-lg font-medium text-gray-900 dark:text-white">Basic Info</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="brands" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                        <select name="brand_id" id="brands" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $motorcycle?->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                        <input type="text" name="model" id="model" value="{{ $motorcycle?->model ?? old('model') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="NINJA E-1" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                        <input type="number" min="2000" max="2030" name="year" id="year" value="{{ $motorcycle?->year ?? old('year') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2023">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price (Rp)</label>
                        <input type="number" name="price" id="price" value="{{ $motorcycle?->price ?? old('price') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="146000000">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image</label>
                        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </div>
                </div>

                <!-- Engine & Performances -->
                <h3 class="mb-3 mt-10 text-lg font-medium text-gray-900 dark:text-white">Engine & Performances</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="drive_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Drive Type</label>
                        <select name="drive_type" id="drive_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option {{ $motorcycle?->specification?->drive_type === 'Belt Drive' ? 'selected' : '' }}>Belt Drive</option>
                            <option {{ $motorcycle?->specification?->drive_type === 'Chain Drive' ? 'selected' : '' }}>Chain Drive</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="top_speed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Top Speed (kmph)</label>
                        <input type="number" name="top_speed" id="top_speed" value="{{ $motorcycle?->specification?->top_speed ?? old('top_speed') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="60">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="max_torque" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maximum Torque (Nm)</label>
                        <input type="number" step="0.1" name="max_torque" id="max_torque" value="{{ $motorcycle?->specification?->max_torque ?? old('max_torque') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="40.5">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="max_power" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maximum Power (hp)</label>
                        <input type="number" step="0.1" name="max_power" id="max_power" value="{{ $motorcycle?->specification?->max_power ?? old('max_power') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="10.5">
                    </div>
                </div>

                <!-- Dimension -->
                <h3 class="mb-3 mt-10 text-lg font-medium text-gray-900 dark:text-white">Dimension</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="scooter" {{ $motorcycle?->category === 'scooter' ? 'selected' : '' }}>Scooter</option>
                            <option value="sport" {{ $motorcycle?->category === 'sport' ? 'selected' : '' }}>Sport</option>
                            <option value="moped" {{ $motorcycle?->category === 'moped' ? 'selected' : '' }}>Moped</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="wheel_base" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wheel Base (mm)</label>
                        <input type="number" name="wheel_base" id="wheel_base" value="{{ $motorcycle?->specification?->wheel_base ?? old('wheel_base') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1080">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="length" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Length (mm)</label>
                        <input type="number" name="length" id="length" value="{{ $motorcycle?->specification?->length ?? old('length') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1795">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="width" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Width (mm)</label>
                        <input type="number" name="width" id="width" value="{{ $motorcycle?->specification?->width ?? old('width') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1795">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height (mm)</label>
                        <input type="number" name="height" id="height" value="{{ $motorcycle?->specification?->height ?? old('height') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1795">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight (kg)</label>
                        <input type="number" name="weight" id="weight" value="{{ $motorcycle?->specification?->weight ?? old('weight') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="120">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="seat_capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seating Capacity</label>
                        <input type="number" name="seat_capacity" id="seat_capacity" value="{{ $motorcycle?->specification?->seat_capacity ?? old('seat_capacity') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2">
                    </div>
                </div>

                <!-- Gear & Transmission -->
                <h3 class="mb-3 mt-10 text-lg font-medium text-gray-900 dark:text-white">Gear & Transmission</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="transmission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transmission Type</label>
                        <select name="transmission" id="transmission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option {{ $motorcycle?->specification?->transmission === 'CVT' ? 'selected' : '' }}>CVT</option>
                            <option {{ $motorcycle?->specification?->transmission === 'Automatic' ? 'selected' : '' }}>Automatic</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="gearbox" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gear Box</label>
                        <select name="gearbox" id="gearbox" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option>Variable Speed</option>
                        </select>
                    </div>
                </div>

                <!-- Suspension -->
                <h3 class="mb-3 mt-10 text-lg font-medium text-gray-900 dark:text-white">Suspension</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="front_suspension" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Front Suspension</label>
                        <select name="front_suspension" id="front_suspension" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option {{ $motorcycle?->specification?->front_suspension === 'Telescopic Fork' ? 'selected' : '' }}>Telescopic Fork</option>
                            <option {{ $motorcycle?->specification?->front_suspension === 'Dual Shock' ? 'selected' : '' }}>Dual Shock</option>
                            <option {{ $motorcycle?->specification?->front_suspension === 'Mono Shock' ? 'selected' : '' }}>Mono Shock</option>
                            <option {{ $motorcycle?->specification?->front_suspension === 'Uni Trak Shock' ? 'selected' : '' }}>Uni Trak Shock</option>
                            <option {{ $motorcycle?->specification?->front_suspension === 'Swingarm' ? 'selected' : '' }}>Swingarm</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="rear_suspension" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rear Suspension</label>
                        <select name="rear_suspension" id="rear_suspension" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option {{ $motorcycle?->specification?->rear_suspension === 'Telescopic Fork' ? 'selected' : '' }}>Telescopic Fork</option>
                            <option {{ $motorcycle?->specification?->rear_suspension === 'Dual Shock' ? 'selected' : '' }}>Dual Shock</option>
                            <option {{ $motorcycle?->specification?->rear_suspension === 'Mono Shock' ? 'selected' : '' }}>Mono Shock</option>
                            <option {{ $motorcycle?->specification?->rear_suspension === 'Uni Trak Shock' ? 'selected' : '' }}>Uni Trak Shock</option>
                            <option {{ $motorcycle?->specification?->rear_suspension === 'Swingarm' ? 'selected' : '' }}>Swingarm</option>
                        </select>
                    </div>
                </div>

                <!-- Wheels & Tyres -->
                <h3 class="mb-3 mt-10 text-lg font-medium text-gray-900 dark:text-white">Wheels & Tyres</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="front_wheel_size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Front Wheel Size</label>
                        <select name="front_wheel_size" id="front_wheel_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R10' ? 'selected' : '' }}>R10</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R11' ? 'selected' : '' }}>R11</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R12' ? 'selected' : '' }}>R12</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R13' ? 'selected' : '' }}>R13</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R14' ? 'selected' : '' }}>R14</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R15' ? 'selected' : '' }}>R15</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R16' ? 'selected' : '' }}>R16</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R17' ? 'selected' : '' }}>R17</option>
                            <option {{ $motorcycle?->specification?->front_wheel_size === 'R18' ? 'selected' : '' }}>R18</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="front_tyre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Front Tyre</label>
                        <input type="text" name="front_tyre" id="front_tyre" value="{{ $motorcycle?->specification?->front_tyre ?? old('front_tyre') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="90/90">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="rear_wheel_size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rear Wheel Size</label>
                        <select name="rear_wheel_size" id="rear_wheel_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R10' ? 'selected' : '' }}>R10</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R11' ? 'selected' : '' }}>R11</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R12' ? 'selected' : '' }}>R12</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R13' ? 'selected' : '' }}>R13</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R14' ? 'selected' : '' }}>R14</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R15' ? 'selected' : '' }}>R15</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R16' ? 'selected' : '' }}>R16</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R17' ? 'selected' : '' }}>R17</option>
                            <option {{ $motorcycle?->specification?->rear_wheel_size === 'R18' ? 'selected' : '' }}>R18</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="rear_tyre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rear Tyre</label>
                        <input type="text" name="rear_tyre" id="rear_tyre" value="{{ $motorcycle?->specification?->rear_tyre ?? old('rear_tyre') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="90/90">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="type_tyre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tyre Type</label>
                        <select name="type_tyre" id="type_tyre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option>Radial</option>
                        </select>
                    </div>
                </div>

                <!-- Brake -->
                <h3 class="mb-3 mt-10 text-lg font-medium text-gray-900 dark:text-white">Brake</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="front_brake" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Front Brake</label>
                        <select name="front_brake" id="front_brake" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option>Disc</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="rear_brake" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rear Brake</label>
                        <select name="rear_brake" id="rear_brake" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option>Disc</option>
                        </select>
                    </div>
                </div>

                <!-- Electrical -->
                <h3 class="mb-3 mt-10 text-lg font-medium text-gray-900 dark:text-white">Electrical</h3>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="battery_capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Battery Capacity (Ah)</label>
                        <input type="number" step="0.1" name="battery_capacity" id="battery_capacity" value="{{ $motorcycle?->specification?->battery_capacity ?? old('battery_capacity') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="26.1 Ah">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="battery_charging_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Battery Charging Time (hours)</label>
                        <input type="number" step="0.1" name="battery_charging_time" id="battery_charging_time" value="{{ $motorcycle?->specification?->battery_charging_time ?? old('battery_charging_time') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="3 h">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="battery_weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Battery Weight (kg)</label>
                        <input type="number" step="0.1" name="battery_weight" id="battery_weight" value="{{ $motorcycle?->specification?->battery_weight ?? old('battery_weight') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="11.5 kg">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="battery_slot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Battery Slot</label>
                        <input type="number" min="1" max="2" name="battery_slot" id="battery_slot" value="{{ $motorcycle?->specification?->battery_slot ?? old('battery_weight') }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1">
                    </div>
                </div>

                <div class="items-center mt-6">
                    <button class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
