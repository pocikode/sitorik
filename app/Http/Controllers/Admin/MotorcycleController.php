<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MotorcycleController extends Controller
{
    public function index()
    {
        return view('admin.motorcycle.index');
    }

    public function create(): View
    {
        $motorcycle = null;
        $brands = Brand::query()->select('id', 'name')->get()->all();
        return view('admin.motorcycle.form', compact('brands', 'motorcycle'));
    }

    public function store(Request $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->storePublicly('motorcycles');
        }

        DB::transaction(function () use ($request, $image) {
            $motorcycle = Motorcycle::create([
                'model' => $request->get('model'),
                'slug' => Str::slug($request->get('model')),
                'brand_id' => $request->get('brand_id'),
                'category' => $request->get('category'),
                'year' => $request->get('year'),
                'price' => $request->get('price'),
            ]);

            $motorcycle->specification()->create([
                'drive_type' => $request->get('drive_type'),
                'top_speed' => $request->get('top_speed'),
                'max_torque' => $request->get('max_torque'),
                'max_power' => $request->get('max_power'),
                'wheel_base' => $request->get('wheel_base'),
                'length' => $request->get('length'),
                'width' => $request->get('width'),
                'height' => $request->get('height'),
                'weight	' => $request->get('weight'),
                'seat_capacity' => $request->get('seat_capacity'),
                'transmission' => $request->get('transmission'),
                'gearbox' => $request->get('gearbox'),
                'front_suspension' => $request->get('front_suspension'),
                'rear_suspension' => $request->get('rear_suspension'),
                'type_tyre' => $request->get('type_tyre'),
                'front_tyre' => $request->get('front_tyre'),
                'rear_tyre' => $request->get('rear_tyre'),
                'front_wheel_size' => $request->get('front_wheel_size'),
                'rear_wheel_size' => $request->get('rear_wheel_size'),
                'front_brake' => $request->get('front_brake'),
                'rear_brake' => $request->get('rear_brake'),
                'battery_capacity' => $request->get('battery_capacity'),
                'battery_charging_time' => $request->get('battery_charging_time'),
                'battery_weight' => $request->get('battery_weight'),
                'battery_slot' => $request->get('battery_slot'),
            ]);

            $motorcycle->picture()->create([
                'motorcycle_id' => $motorcycle->id,
                'image' => $image,
            ]);
        });

        return redirect()
            ->route('admin.motorcycles')
            ->with('success', 'Motorcycle Created Successfully!');
    }

    public function edit(Motorcycle $motorcycle): View
    {
        $motorcycle->load(['brand', 'specification', 'picture']);
        $brands = Brand::query()->select('id', 'name')->get()->all();
        return view('admin.motorcycle.form', compact('brands', 'motorcycle'));
    }

    public function update(Motorcycle $motorcycle, Request $request): RedirectResponse
    {
//        dd($request->all());
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->storePublicly('motorcycles');
        }

        DB::transaction(function () use ($request, $image, $motorcycle) {
            $motorcycle->update([
                'model' => $request->input('model'),
                'slug' => Str::slug($request->input('model')),
                'brand_id' => $request->input('brand_id'),
                'category' => $request->input('category'),
                'year' => $request->input('year'),
                'price' => $request->input('price'),
            ]);

            $motorcycle->specification()->update([
                'drive_type' => $request->input('drive_type'),
                'top_speed' => $request->input('top_speed'),
                'max_torque' => $request->input('max_torque'),
                'max_power' => $request->input('max_power'),
                'wheel_base' => $request->input('wheel_base'),
                'length' => $request->input('length'),
                'width' => $request->input('width'),
                'height' => $request->input('height'),
                'weight' => $request->input('weight'),
                'seat_capacity' => $request->input('seat_capacity'),
                'transmission' => $request->input('transmission'),
                'gearbox' => $request->input('gearbox'),
                'front_suspension' => $request->input('front_suspension'),
                'rear_suspension' => $request->input('rear_suspension'),
                'type_tyre' => $request->input('type_tyre'),
                'front_tyre' => $request->input('front_tyre'),
                'rear_tyre' => $request->input('rear_tyre'),
                'front_wheel_size' => $request->input('front_wheel_size'),
                'rear_wheel_size' => $request->input('rear_wheel_size'),
                'front_brake' => $request->input('front_brake'),
                'rear_brake' => $request->input('rear_brake'),
                'battery_capacity' => $request->input('battery_capacity'),
                'battery_charging_time' => $request->input('battery_charging_time'),
                'battery_weight' => $request->input('battery_weight'),
                'battery_slot' => $request->input('battery_slot'),
            ]);

            if ($image) {
                $motorcycle->picture()->update([
                    'image' => $image,
                ]);
            }
        });

        return redirect()
            ->route('admin.motorcycles')
            ->with('success', 'Motorcycle Updated Successfully!');
    }
}
