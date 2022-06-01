<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = Product::all();
        $customer = Customer::create([
            'name' => "Lê Nhất Đăng",
            'phone' => "0922333555",
            'person_id' => "0355999555",
            'address' => "Hà Nội",
            'permanent_residence' => "Hà Nội",
        ]);

        foreach ($products as $product) {
            $numberLength = rand(1, 5);

            $customerOrder = $customer->customerOrders()->create([
                'name' => "Lê Nhất Đăng",
                'phone' => "0922333555",
                'person_id' => "0355999555",
                'address' => "Hà Nội",
                'permanent_residence' => "Hà Nội",
            ]);

            for ($i = 0; $i < $numberLength; $i++) {

                $productOrder = $product->productOrders()->create([
                    'name' => $product->name,
                    'color' => $product->color,
                    'km' => $product->km,
                    'year' => $product->year,
                    'price' => $product->price,
                    'thumbnail' => $product->thumbnail,
                    'other_parameters' => $product->other_parameters,
                    'license_plates' => $product->license_plates,
                    'brand_id' => $product->brand_id,
                    'overtime_price' => $product->overtimePrice,
                    'over_km_price' => $product->overKmPrice,
                    'deposit_price' => $product->depositPrice,
                    'number_of_seats' => $product->numberSeats,
                ]);

                $time = Carbon::now()->subDays(rand(1, 10))->timestamp;
                $order = $customerOrder->orders()->create([
                    'name' => 'Yêu cầu thuê xe - ' . $product->name . ' - ' . $product->license_plates . ' - ' . $customer->name,
                    'code' => 'YCTX' . $time . $i . $product->id,
                    'pick_date' => $time,
                    'drop_date' => Carbon::now()->addDays(rand(1, 10))->timestamp,
                    'price_deposits' => $productOrder->deposit_price,
                    'product_order_id' => $productOrder->id,
                    'status' => rand(2, 4),
                ]);

                if ($order->status == Order::STATUS['contract']) {
                    $contract = new Contract();
                    $contract->name = 'Hợp đồng thuê xe  - ' . $product->name . ' - ' . $product->license_plates . ' - ' . $customer->name;
                    $contract->code = $this->generateUniqueCode();
                    $contract->pick_date = $order->pick_date;
                    $contract->drop_date = $order->drop_date;
                    $contract->price_total = $order->totalPrice;
                    $contract->price_hour = $product->price;
                    $contract->hour = $order->totalHours;
                    $contract->price_deposits = $order->price_deposits;
                    $contract->customer_id = $customerOrder->id;
                    $contract->product_order_id = $productOrder->id;
                    $contract->status = Contract::STATUS['deposited'];
                    $contract->order_id = $order->id;

                    if ($contract->save()) {

                        $contract->load(['productOrder', 'customerOrder']);
                        $contract->content = view('admin.contract.contract', ['contract' => $contract]);
                        $contract->save();
                    }

                }

            }
        }
    }

    private function generateUniqueCode(): string
    {
        $text = 'ABCDEFGHILKMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($text), 0, 5). '-' . rand(10000, 99999);

        if (Contract::query()->where('code', $code)->exists()) {
            return $this->generateUniqueCode();
        }

        return $code;
    }
}
